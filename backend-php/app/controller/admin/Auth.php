<?php
namespace app\controller\admin;

use app\BaseController;
use app\model\Admins;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use think\Request;

/**
 * 管理员认证控制器
 */
class Auth extends BaseController
{
    /**
     * 登录
     */
    public function login(Request $request)
    {
        $username = $request->param('username');
        $password = $request->param('password');

        if (empty($username) || empty($password)) {
            return json([
                'code' => 400,
                'message' => '用户名和密码不能为空',
                'data' => null
            ]);
        }

        $admin = Admins::where('username', $username)->find();

        if (!$admin) {
            return json([
                'code' => 401,
                'message' => '用户名或密码错误',
                'data' => null
            ]);
        }

        if (!$admin->is_active) {
            return json([
                'code' => 403,
                'message' => '账号已被禁用',
                'data' => null
            ]);
        }

        // 验证密码
        if (!password_verify($password, $admin->password)) {
            return json([
                'code' => 401,
                'message' => '用户名或密码错误',
                'data' => null
            ]);
        }

        // 生成JWT Token
        $payload = [
            'iss' => env('JWT_ISS', 'kangli-digital'),
            'iat' => time(),
            'exp' => time() + intval(env('JWT_EXPIRE', 7200)),
            'uid' => $admin->id,
            'username' => $admin->username,
            'role' => $admin->role
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        // 更新登录信息
        $admin->last_login_at = date('Y-m-d H:i:s');
        $admin->last_login_ip = $request->ip();
        $admin->save();

        return json([
            'code' => 200,
            'message' => '登录成功',
            'data' => [
                'token' => $token,
                'user' => [
                    'id' => $admin->id,
                    'username' => $admin->username,
                    'name' => $admin->name,
                    'role' => $admin->role
                ]
            ]
        ]);
    }

    /**
     * 验证Token
     */
    public static function checkToken(Request $request)
    {
        $authorization = $request->header('authorization');
        
        if (empty($authorization)) {
            return false;
        }

        // 提取Token
        if (strpos($authorization, 'Bearer ') === 0) {
            $token = substr($authorization, 7);
        } else {
            $token = $authorization;
        }

        try {
            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));
            $request->adminId = $decoded->uid;
            $request->adminUsername = $decoded->username;
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}


