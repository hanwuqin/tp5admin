<?php
/**
 * 后台菜单管理
 * @author guoerqiang <guoerqiang@51talk.com>
 * @deprecated since version 1.0
 * @copyright (c) 2016-2017, guoerqiang
 */
namespace app\admin\controller;
use app\admin\dataModel\AuthMenu;
class Menu extends AdminBase
{
    /**
     * 后台菜单列表
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function menuList()
    {

        return $this->fetch();
    }
    /**
     * 后台菜单添加
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function addMenu()
    {
        $menu_list = AuthMenu::instance()->getMenuList();
        $this->assign("menu_list", $menu_list);
        return $this->fetch();
    }

    /**
     * 后台菜单保存
     * @author guoerqiang <guoerqiang@51talk.com>
     */
    public function saveMenu()
    {
       print_r(request()->post());
    }
}
