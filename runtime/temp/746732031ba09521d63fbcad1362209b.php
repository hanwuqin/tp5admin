<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:/team/tp5/application/admin/view/AdminLogin\login.html";i:1480752441;}*/ ?>
<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>登录</title>
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>plugins/layui/css/layui.css" media="all" />
		<link rel="stylesheet" href="<?php echo STATIC_PATH;?>css/login.css" />
	</head>

	<body class="beg-login-bg">
		<div class="beg-login-box">
			<header>
				<h1>后台登录</h1>
			</header>
			<div class="beg-login-main">
				<form id="loginForm" action="<?php echo Url('adminLogin/doLogin')?>" class="layui-form" method="post">
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe612;</i>
                    </label>
						<input type="text" name="userName" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
					</div>
					<div class="layui-form-item">
						<label class="beg-login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
						<input type="password" name="password" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
					</div>
					<div class="layui-form-item">
						<div class="beg-pull-right">
							<button class="layui-btn layui-btn-primary" lay-submit lay-filter="login">
                            <i class="layui-icon">&#xe650;</i> 登录
                        </button>
						</div>
						<div class="beg-clear"></div>
					</div>
				</form>
			</div>
			<footer>
				<p>Beginner © xy631606923@163.com</p>
			</footer>
		</div>
		<script type="text/javascript" src="<?php echo STATIC_PATH;?>plugins/layui/layui.js"></script>
		<script type="text/javascript">
			layui.use(['layer', 'form'], function() {
				var layer = layui.layer,
				$ = layui.jquery,
				form = layui.form();		
				form.on('submit',function(data){
					var url = $("#loginForm").attr("action");
					var postData = data.field;
					$.post(url,{"user_name":postData.userName,"password":postData.password},function(res){
						if(res.status == 1){
							location.href = res.url;
						}else{
							 layer.msg(res.message);
						}
					},'json');
					return false;
				});
			});
		</script>
	</body>

</html>