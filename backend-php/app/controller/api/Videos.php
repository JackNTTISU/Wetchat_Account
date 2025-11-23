<?php
namespace app\controller\api;

use app\BaseController;
use app\model\Videos as VideosModel;
use think\Request;

/**
 * 视频API控制器
 */
class Videos extends BaseController
{
    /**
     * 获取视频列表
     */
    public function index(Request $request)
    {
        $page = $request->param('page', 1);
        $limit = $request->param('limit', 20);
        $category = $request->param('category', '');
        $keyword = $request->param('keyword', '');
        $is_featured = $request->param('is_featured', '');

        $where = ['is_published' => 1];
        
        if (!empty($category)) {
            $where['category'] = $category;
        }

        if (!empty($keyword)) {
            $where[] = ['title', 'like', "%{$keyword}%"];
        }

        if ($is_featured !== '') {
            $where['is_featured'] = $is_featured;
        }

        $list = VideosModel::where($where)
            ->field('id,title,thumbnail_url as thumbnail,duration,views,category,video_url as url,created_at as date')
            ->order('is_featured', 'desc')
            ->order('sort_order', 'desc')
            ->order('created_at', 'desc')
            ->paginate([
                'list_rows' => $limit,
                'page' => $page
            ]);

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => [
                'list' => $list->items(),
                'total' => $list->total(),
                'page' => $page,
                'limit' => $limit
            ]
        ]);
    }

    /**
     * 获取视频详情
     */
    public function read($id)
    {
        $video = VideosModel::where(['id' => $id, 'is_published' => 1])
            ->find();

        if (!$video) {
            return json([
                'code' => 404,
                'message' => '视频不存在',
                'data' => null
            ]);
        }

        $data = [
            'id' => $video->id,
            'title' => $video->title,
            'thumbnail' => $video->thumbnail_url,
            'url' => $video->video_url,
            'duration' => $video->duration,
            'views' => $video->views,
            'date' => $video->created_at,
            'category' => $video->category,
            'description' => $video->description,
            'created_at' => $video->created_at
        ];

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }

    /**
     * 记录视频播放
     */
    public function play($id)
    {
        $video = VideosModel::find($id);
        
        if (!$video) {
            return json([
                'code' => 404,
                'message' => '视频不存在',
                'data' => null
            ]);
        }

        $video->views += 1;
        $video->save();

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => null
        ]);
    }
}

