<?php
/**
 * Admin模块配置文件
 * @author guoerqiang <guoerqiang@51talk.com>
 * @copyright (c) 2016-208, guoerqiang
 * @deprecated since version 1.0
 */
return [
    //权限认证配置项
    'auth' => [
        'auth_on' => 1, // 权限开关
        'auth_type' => 1, // 认证方式，1为实时认证；2为登录认证。
        'auth_group' => 'auth_group', // 用户组数据不带前缀表名
        'auth_group_access' => 'auth_group_access', // 用户-用户组关系不带前缀表名
        'auth_rule' => 'auth_rule', // 权限规则不带前缀表名
        'auth_user' => 'auth_member', // 用户信息不带前缀表名
        'auth_password'=>'r$#tq@*&' //用户密码混淆字符串
    ],
    'admin_menu' =>[
        [
            'title' =>'',
        ],
    ]
];
