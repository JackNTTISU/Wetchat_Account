<?php
namespace app\controller\api;

use app\BaseController;
use app\model\ContactMessages;
use app\model\ContactPoints;
use think\Request;

/**
 * 联系我们API控制器
 */
class Contact extends BaseController
{
    /**
     * 获取联系信息
     */
    public function info()
    {
        $contacts = ContactPoints::where('is_active', 1)
            ->order('sort_order', 'desc')
            ->select();

        return json([
            'code' => 200,
            'message' => 'success',
            'data' => [
                'contacts' => $contacts
            ]
        ]);
    }

    /**
     * 提交留言
     */
    public function submit(Request $request)
    {
        $data = $request->only([
            'name',
            'phone',
            'email',
            'company',
            'message'
        ]);

        // 验证必填字段
        if (empty($data['name']) || empty($data['phone']) || empty($data['message'])) {
            return json([
                'code' => 400,
                'message' => '姓名、手机号和留言内容不能为空',
                'data' => null
            ]);
        }

        // 验证手机号格式
        if (!preg_match('/^1[3-9]\d{9}$/', $data['phone'])) {
            return json([
                'code' => 400,
                'message' => '手机号格式不正确',
                'data' => null
            ]);
        }

        // 添加IP和用户代理
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->header('user-agent');
        $data['status'] = 0; // 待处理

        $message = ContactMessages::create($data);

        if ($message) {
            // TODO: 可以在这里发送通知邮件给管理员
            
            return json([
                'code' => 200,
                'message' => '提交成功，我们会尽快与您联系',
                'data' => null
            ]);
        }

        return json([
            'code' => 500,
            'message' => '提交失败，请稍后重试',
            'data' => null
        ]);
    }
}

