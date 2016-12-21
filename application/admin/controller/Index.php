<?php
/**
 * 后台登录首页
 * @author guoerqiang <guoerqiang@51talk.com>
 * @deprecated since version 1.0
 * @copyright (c) 2016-2017, guoerqiang
 */
namespace app\admin\controller;
use app\admin\dataModel\AuthMenu;
class Index extends AdminBase
{
    /**
     * 后台登录首页
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function index()
    {
        $menu_list = AuthMenu::instance()->getMenuByPid();
        $this->assign("menu_list", $menu_list);
        return $this->fetch();
    }
    
    public function main(){
        
    }
}
