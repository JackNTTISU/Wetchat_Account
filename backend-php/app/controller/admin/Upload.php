<?php
namespace app\controller\admin;

use app\BaseController;
use app\model\Uploads as UploadsModel;
use think\Request;
use think\facade\Filesystem;
use OSS\OssClient;
use OSS\Core\OssException;

/**
 * 文件上传控制器
 */
class Upload extends BaseController
{
    /**
     * 上传文件
     */
    public function index(Request $request)
    {
        // 验证Token
        if (!Auth::checkToken($request)) {
            return json([
                'code' => 401,
                'message' => '未授权',
                'data' => null
            ]);
        }

        $file = $request->file('file');
        $type = $request->param('type', 'image');

        if (!$file) {
            return json([
                'code' => 400,
                'message' => '请选择文件',
                'data' => null
            ]);
        }

        // 验证文件
        $validate = [
            'size' => env('UPLOAD_MAX_SIZE', 10485760),
            'ext' => env('UPLOAD_ALLOWED_EXT', 'jpg,jpeg,png,gif,mp4,pdf')
        ];

        if (!$file->validate($validate)) {
            return json([
                'code' => 400,
                'message' => '文件验证失败: ' . $file->getError(),
                'data' => null
            ]);
        }

        try {
            // 上传到阿里云OSS
            $ossResult = $this->uploadToOSS($file);

            // 记录上传信息
            $uploadData = [
                'filename' => $file->getOriginalName(),
                'file_path' => $ossResult['path'],
                'file_url' => $ossResult['url'],
                'file_type' => $type,
                'mime_type' => $file->getOriginalMime(),
                'file_size' => $file->getSize(),
                'uploaded_by' => $request->adminId ?? 0
            ];

            // 如果是图片，获取尺寸
            if (strpos($file->getOriginalMime(), 'image') !== false) {
                $imageInfo = getimagesize($file->getRealPath());
                if ($imageInfo) {
                    $uploadData['width'] = $imageInfo[0];
                    $uploadData['height'] = $imageInfo[1];
                }
            }

            UploadsModel::create($uploadData);

            return json([
                'code' => 200,
                'message' => '上传成功',
                'data' => [
                    'url' => $ossResult['url'],
                    'filename' => $file->getOriginalName(),
                    'size' => $file->getSize()
                ]
            ]);

        } catch (\Exception $e) {
            return json([
                'code' => 500,
                'message' => '上传失败: ' . $e->getMessage(),
                'data' => null
            ]);
        }
    }

    /**
     * 上传到阿里云OSS
     */
    private function uploadToOSS($file)
    {
        $accessKeyId = env('OSS_ACCESS_KEY_ID');
        $accessKeySecret = env('OSS_ACCESS_KEY_SECRET');
        $endpoint = env('OSS_ENDPOINT');
        $bucket = env('OSS_BUCKET');
        $cdnDomain = env('OSS_CDN_DOMAIN');

        if (empty($accessKeyId) || empty($accessKeySecret)) {
            throw new \Exception('OSS配置不完整');
        }

        try {
            $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);

            // 生成OSS文件路径
            $ext = $file->extension();
            $filename = date('Y/m/d') . '/' . md5($file->getOriginalName() . time()) . '.' . $ext;

            // 上传文件
            $ossClient->uploadFile($bucket, $filename, $file->getRealPath());

            // 生成访问URL
            if (!empty($cdnDomain)) {
                $url = rtrim($cdnDomain, '/') . '/' . $filename;
            } else {
                $url = 'https://' . $bucket . '.' . $endpoint . '/' . $filename;
            }

            return [
                'path' => $filename,
                'url' => $url
            ];

        } catch (OssException $e) {
            throw new \Exception('OSS上传失败: ' . $e->getMessage());
        }
    }
}

