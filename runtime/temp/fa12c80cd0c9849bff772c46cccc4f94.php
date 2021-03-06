<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:53:"D:/team/tp5/application/admin/view/Menu\menuList.html";i:1480905870;s:53:"D:\team\tp5/application/admin\view\public\header.html";i:1480905960;}*/ ?>
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
		<div class="admin-main animated fadeInRight">
			<blockquote class="layui-elem-quote">
				<a href="<?php echo url('menu/addMenu'); ?>" class="layui-btn layui-btn-small" id="add">
					<i class="layui-icon">&#xe608;</i> 添加菜单
				</a>
			</blockquote>
			<fieldset class="layui-elem-field">
				<legend>数据列表</legend>
				<div class="layui-field-box">
					<table class="site-table table-hover">
						<thead>
							<tr>
								<th><input type="checkbox" id="selected-all"></th>
								<th>所属分类</th>
								<th>标题</th>
								<th>作者</th>
								<th>创建时间</th>
								<th>浏览量</th>
								<th>状态</th>
								<th>排序值</th>
								<th>置顶</th>
								<th>操作</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="checkbox"></td>
								<td>Layui</td>
								<td>
									<a href="/manage/article_edit_1">演示站点发布成功啦。</a>
								</td>
								<td>Beginner</td>
								<td>2016-11-16 11:50</td>
								<td>1298</td>
								<td>正常</td>
								<td>99</td>
								<td style="text-align:center;"><i class="layui-icon" style="color:green;"></i></td>
								<td>
									<a href="/detail-1" target="_blank" class="layui-btn layui-btn-normal layui-btn-mini">预览</a>
									<a href="/manage/article_edit_1" class="layui-btn layui-btn-mini">编辑</a>
									<a href="javascript:;" data-id="1" data-opt="del" class="layui-btn layui-btn-danger layui-btn-mini">删除</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</fieldset>
			<div class="admin-table-page">
				<div id="page" class="page">
				</div>
			</div>
		</div>
		<script>
			layui.config({
				base: '/static/admin/plugins/layui/modules/'
			});
			layui.use(['icheck', 'laypage','layer'], function() {
				var $ = layui.jquery,
					laypage = layui.laypage,
					layer = parent.layer === undefined ? layui.layer : parent.layer;
				$('input').iCheck({
					checkboxClass: 'icheckbox_flat-green'
				});
			});
		</script>
	</body>

</html>