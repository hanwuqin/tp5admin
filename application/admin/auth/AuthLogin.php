<?php
/**
 * 后台登录验证类
 * @author guoerqiang <guoerqiang@51talk.com>
 * @deprecated since version 1.0
 * @copyright (c) 2016-2017, guoerqiang
 */
namespace app\admin\auth;

use think\Db;
use think\Config;
use think\Session;
use think\Request;
use think\Loader;

class AuthLogin
{

    /**
     * @var object 对象实例
     */
    protected static $instance;

    /**
     * 当前请求实例
     * @var Request
     */
    protected $request;
    //默认配置
    protected $config = [
        'auth_user' => 'auth_member', // 用户信息表
    ];
    protected $error = '';

    /**
     * 类架构函数
     * Auth constructor.
     */
    public function __construct()
    {
        //可设置配置项 auth, 此配置项为数组。
        if ($auth = Config::get('auth')) {
            $this->config = array_merge($this->config, $auth);
        }
        // 初始化request
        $this->request = Request::instance();
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
     * 检查用户是否登录
     * @return bool 如果用户已经登录返回用户登录的ID否返回false
     */
    public function isLogin()
    {
        $admin_id = Session::get("admin_user_id");
        if ($admin_id){
            return $admin_id;
       } else{
            return false;
       }
    }
    /**
     * 验证用户登录信息
     * @param string $user_name 用户名
     * @param string $pasword 用户密码
     */
    public function checkLogin($user_name, $password){
        $row = Db::name($this->config['auth_user'])->where('user_name',$user_name)->find();
        $password = md5($this->config['auth_password'].$password);
        if($row['password'] == $password){
            session("admin_user_id",$row['id']);
            session("admin_user_name",$row['user_name']);
            session("admin_nick_name",$row['nickname']);
            return true;
        }else{
            $this->error = "用户密码错误！";
            return false;
        }
    }

    /**
     * 后台用户退出方法
     */
    public function loginOut(){
        session(null);
    }

    
    /**
     * 获取错误信息
     */
    public function getErrorInfo(){
        return $this->error;
    }

    /**
     * 根据用户id获取用户组,返回值为数组
     * @param  $uid int     用户id
     * @return array       用户所属的用户组 array(
     *     array('uid'=>'用户id','group_id'=>'用户组id','title'=>'用户组名称','rules'=>'用户组拥有的规则id,多个,号隔开'),
     *     ...)
     */
    public function getGroups($uid)
    {
        static $groups = [];
        if (isset($groups[$uid])) {
            return $groups[$uid];
        }
        // 转换表名
        $auth_group_access = Loader::parseName($this->config['auth_group_access'], 1);
        $auth_group        = Loader::parseName($this->config['auth_group'], 1);
        // 执行查询
        $user_groups       = Db::view($auth_group_access, 'uid,group_id')
                ->view($auth_group, 'title,rules', "{$auth_group_access}.group_id={$auth_group}.id", 'LEFT')
                ->where("{$auth_group_access}.uid='{$uid}' and {$auth_group}.status='1'")
                ->select();
        $groups[$uid]      = $user_groups ? : [];

        return $groups[$uid];
    }

    /**
     * 获得权限列表
     * @param integer $uid 用户id
     * @param integer $type
     * @return array
     */
    protected function getAuthList($uid, $type)
    {
        static $_authList = []; //保存用户验证通过的权限列表
        $t                = implode(',', (array) $type);
        if (isset($_authList[$uid . $t])) {
            return $_authList[$uid . $t];
        }
        if (2 == $this->config['auth_type'] && Session::has('_auth_list_' . $uid . $t)) {
            return Session::get('_auth_list_' . $uid . $t);
        }
        //读取用户所属用户组
        $groups = $this->getGroups($uid);
        $ids    = []; //保存用户所属用户组设置的所有权限规则id
        foreach ($groups as $g) {
            $ids = array_merge($ids, explode(',', trim($g['rules'], ',')));
        }
        $ids = array_unique($ids);
        if (empty($ids)) {
            $_authList[$uid . $t] = [];
            return [];
        }
        $map      = array(
            'id' => ['in', $ids],
            'type' => $type,
            'status' => 1,
        );
        //读取用户组所有权限规则
        $rules    = Db::name($this->config['auth_rule'])->where($map)->field('condition,name')->select();
        //循环规则，判断结果。
        $authList = []; //
        foreach ($rules as $rule) {
            if (!empty($rule['condition'])) {
                //根据condition进行验证
                $user    = $this->getUserInfo($uid); //获取用户信息,一维数组
                $command = preg_replace('/\{(\w*?)\}/', '$user[\'\\1\']', $rule['condition']);
                //dump($command); //debug
                @(eval('$condition=(' . $command . ');'));
                if ($condition) {
                    $authList[] = strtolower($rule['name']);
                }
            } else {
                //只要存在就记录
                $authList[] = strtolower($rule['name']);
            }
        }
        $_authList[$uid . $t] = $authList;
        if (2 == $this->config['auth_type']) {
            //规则列表结果保存到session
            Session::set('_auth_list_' . $uid . $t, $authList);
        }

        return array_unique($authList);
    }

    /**
     * 获得用户资料,根据自己的情况读取数据库
     */
    protected function getUserInfo($uid)
    {
        static $userinfo = [];

        $user = Db::name($this->config['auth_user']);
        // 获取用户表主键
        $_pk  = is_string($user->getPk()) ? $user->getPk() : 'uid';
        if (!isset($userinfo[$uid])) {
            $userinfo[$uid] = $user->where($_pk, $uid)->find();
        }

        return $userinfo[$uid];
    }

}
