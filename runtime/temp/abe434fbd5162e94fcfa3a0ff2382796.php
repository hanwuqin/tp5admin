<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:52:"D:/team/tp5/application/admin/view/Menu\addMenu.html";i:1481018238;s:53:"D:\team\tp5/application/admin\view\public\header.html";i:1480905960;}*/ ?>
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
	
<body>
		<div style="margin: 15px;">
			<form class="layui-form" action="<?php echo Url('admin/menu/saveMenu')?>" method="post">
				<div class="layui-form-item">
					<label class="layui-form-label">菜单名称</label>
					<div class="layui-input-block">
						<input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入菜单名称" class="layui-input">
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">链接地址</label>
					<div class="layui-input-block">
						<input type="text" name="username" lay-verify="url" placeholder="请输入url地址" autocomplete="off" class="layui-input">
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">上级分类</label>
					<div class="layui-input-block">
						<select name="interest" lay-filter="aihao">
							<option value="0">顶级分类</option>
							<?php foreach($menu_list as $k => $v):?>
							<option value="<?= $v['id']?>"><?=$v['menu_name']?></option>
						<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="layui-form-item">
					<div class="layui-input-block">
						<button class="layui-btn" lay-submit>立即提交</button>
						<button type="reset" class="layui-btn layui-btn-primary">重置</button>
					</div>
				</div>
			</form>
		</div>
		<script>
		layui.config({
			base: '/public/static/admin/js/'
		});
		layui.use(['form','common'], function() {
				var form = layui.form(),
					$ = layui.jquery,
					layer = layui.layer;
				//自定义验证规则
				form.verify({
					title: function(value) {
						if(value == '') {
							return '请填写名称！';
						}
					},
				});
				//监听提交
				form.on('submit', function(data) {
					layui.common.msgError('哈哈哈');
					return false;
				});
			});
		</script>
	</body>
</html>