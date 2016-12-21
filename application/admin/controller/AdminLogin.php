<?php
/**
 * 后台登录首页
 * @author guoerqiang <guoerqiang@51talk.com>
 * @deprecated since version 1.0
 * @copyright (c) 2016-2017, guoerqiang
 */
namespace app\admin\controller;

use think\Controller;
use think\Url;
use app\admin\auth\AuthLogin;
class AdminLogin extends Controller
{
    
    /**
     * 后台登录页面
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function login()
    {
        return $this->fetch();
    }

    /**
     * 后台登录验证
     */
    public function doLogin()
    {
        $user_name = request()->post('user_name');
        $password = request()->post('password');
        $result = AuthLogin::instance()->checkLogin($user_name, $password);
        if($result){
            $result = [
                'status'=>1,
                'message'=>'登录成功',
                'url' => Url::build("Index/index")
                ];
        }else{
            $result =[
                'status' => 0,
                'message' => AuthLogin::instance()->getErrorInfo()
            ];
        }
        echo json_encode($result, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    /**
     * 后台登录注销
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function loginOut()
    {
        AuthLogin::instance()->loginOut();
        $this->redirect(Url::build('AdminLogin/login'));
    }

}
