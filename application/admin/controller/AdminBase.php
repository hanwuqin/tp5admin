<?php

/**
 * 后台所有继承的基础类
 * @author guoerqiang <guoerqiang@51talk.com>
 * @deprecated since version 1.0
 * @copyright (c) 2016-2017, guoerqiang
 */

namespace app\admin\controller;

use think\Controller;
use think\auth\Auth;
use think\Url;
use app\admin\auth\AuthLogin;

class AdminBase extends Controller
{

    private $auth_login;
    private $auth;

    /**
     * 初始化调用
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function _initialize()
    {
        $this->auth_login = AuthLogin::instance();
        $this->auth       = Auth::instance();
        $admin_id         = $this->auth_login->isLogin();
        if ($admin_id){
            define("LAYUI_ADMIN_ID", $admin_id);
        } else{
            $this->redirect(Url::build('AdminLogin/login'));
        }
    }

    /**
     * AJAX JSON格式化输出
     * @param $code 1代表成功 2代表失败
     * @param $message 提示信息
     * @param $data 返回的数据
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function returnJson($status = 1, $message = '', $data = [])
    {
        $jsonData = [
            'status' => $status,
            'message' => $message,
            'data' => $data
        ];
        echo json_encode($jsonData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

}
