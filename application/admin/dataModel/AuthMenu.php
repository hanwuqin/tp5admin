<?php
/**
 * 数据库操作层 think_auth_menu表
 * @author guoerqiang <guoerqiang@51talk.com>
 * @deprecated since version 1.0
 * @copyright (c) 2016-2017, guoerqiang
 */
namespace app\admin\dataModel;

use think\Db;
class AuthMenu
{

    /**
     * @var object 对象实例
     */
    protected static $instance;
    //默认配置
    protected $tableName = "auth_menu";
    protected $error = '';

    /**
     * 类架构函数
     * Auth constructor.
     */
    public function __construct()
    {
    }

    /**
     * 初始化
     * @access public
     * @param array $options 参数
     * @return \think\Request
     */
    public static function instance($options = [])
    {
        if (is_null(self::$instance)) {
            self::$instance = new static($options);
        }
        return self::$instance;
    }
   /**
    * 根据tree_id 获取菜单数据
    * @param int $tree_id 父ID
    * @author guoerqiang <guoerqiang@51talk.com>
    */
   public function getMenuByPid($tree_id = 0){
      $list = Db::name($this->tableName)->where('tree_id', $tree_id)->select();
      return $list;
   }
   
    /**
    * 获取所有的菜单数据
    * @author guoerqiang <guoerqiang@51talk.com>
    */
   public function getMenuList(){
      $list = Db::name($this->tableName)->field(["id","menu_name","tree_id","menu_url","menu_icon","concat(cat_id,'-',id) as cat_order"])->order("cat_order")->select();
      foreach($list as $k => $v){
          $space = str_repeat("|__", count ( explode ( '-', $v ['cat_order'] ) ) - 1);
          $list[$k]['menu_name'] = $space.$v["menu_name"];
      }
      return $list;
   }

}
