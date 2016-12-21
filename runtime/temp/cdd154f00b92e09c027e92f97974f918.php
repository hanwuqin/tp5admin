<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"D:/team/tp5/application/admin/view/Index\index.html";i:1481014798;s:53:"D:\team\tp5/application/admin\view\public\header.html";i:1480905960;s:53:"D:\team\tp5/application/admin\view\public\footer.html";i:1480757759;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
		<title>后台管理</title>
		<meta name="renderer" content="webkit">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="format-detection" content="telephone=no">
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>css/global.css" media="all">
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>css/table.css" />
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>css/animate.min.css" />
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>plugins/font-awesome/css/font-awesome.min.css">
		<script type="text/javascript" src="<?php echo STATIC_PATH;?>plugins/layui/layui.js"></script>
</head>
	
<script type="text/javascript" src="<?php echo STATIC_PATH;?>datas/nav.js" ></script>
<script src="<?php echo STATIC_PATH;?>js/index.js"></script>	
	<body>
		<div class="layui-layout layui-layout-admin">
			<div class="layui-header header header-demo">
				<div class="layui-main">
					<div class="admin-login-box">
						<a class="logo" style="left: 0;" href="">
							<span style="font-size: 22px;">后台管理平台</span>
						</a>
						<div class="admin-side-toggle">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</div>
					<ul class="layui-nav admin-header-item">
                                            <?php foreach($menu_list as $k => $v):?>
						<li class="layui-nav-item <?php if($k == 0):?>layui-this<?php endif;?>">
							<a href="javascript:;"><?= $v['menu_name']?></a>
						</li>
                                            <?php endforeach;?>
						<li class="layui-nav-item">
							<a href="javascript:;" class="admin-header-user">
								<img src="<?php echo STATIC_PATH;?>images/0.jpg" />
								<span>beginner</span>
							</a>
							<dl class="layui-nav-child">
								<dd>
									<a href="javascript:;"><i class="fa fa-user-circle" aria-hidden="true"></i> 个人信息</a>
								</dd>
								<dd>
									<a href="javascript:;"><i class="fa fa-gear" aria-hidden="true"></i> 设置</a>
								</dd>
								<dd>
									<a href="<?php echo Url('AdminLogin/loginOut')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
								</dd>
							</dl>
						</li>
					</ul>
					<ul class="layui-nav admin-header-item-mobile">
						<li class="layui-nav-item">
							<a href="login.html"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="layui-side layui-bg-black" id="admin-side">
				<div class="layui-side-scroll" id="admin-navbar-side" lay-filter="side"></div>
			</div>
			<div class="layui-body" style="bottom: 0;border-left: solid 2px #1AA094;" id="admin-body">
				<div class="layui-tab admin-nav-card layui-tab-brief" lay-filter="admin-tab">
					<ul class="layui-tab-title">
						<li class="layui-this">
							<i class="fa fa-dashboard" aria-hidden="true"></i>
							<cite>控制面板</cite>
						</li>
					</ul>
					<div class="layui-tab-content" style="min-height: 150px; padding: 5px 0 0 0;">
						<div class="layui-tab-item layui-show">
							<iframe src="main.html"></iframe>
						</div>
					</div>
				</div>
			</div>
<div class="layui-footer footer footer-demo" id="admin-footer">
	<div class="layui-main">
		<p>2016 &copy;
						<a href="http://beginner.zhengjinfan.cn/demo/beginner_admin/">beginner.zhengjinfan.cn</a> LGPL license
					</p>
				</div>
			</div>
			<div class="site-tree-mobile layui-hide">
				<i class="layui-icon">&#xe602;</i>
			</div>
			<div class="site-mobile-shade"></div>
		</div>
	</body>
</html>			