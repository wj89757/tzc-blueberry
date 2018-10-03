<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- 分别为：屏幕宽度和设备一直，初始缩放比例，最大缩放比例和禁止用户缩放 -->
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>贪吃蓝莓君-查找你的信息</title>
	<link rel="stylesheet" type="text/css" href="/tzc-blueberry/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/tzc-blueberry/Public/css/style.css" />
</head>
<body>
	<div class="container BlueberryForm">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" method="post" action=<?php echo U('Index/alter');?>>
					<h3 style="margin-top:150px;"><输入您的手机号码查找></h3>
					<div class="input-group input-group-lg">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-earphone">
							</span>
						</div>
						<input id="telphone" type="text" placeholder="请输入您的电话号码" class="form-control" name="yourtel" />
					</div><br>
					<input type="submit" class="btn btn-primary btn-block btn-lg" value="查找"/>
					<a class="btn btn-primary btn-block btn-lg" href=<?php echo U('Index/index');?>>返回预约首页</a>
				</form>	
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/tzc-blueberry/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/tzc-blueberry/Public/js/bootstrap.min.js"></script>
</body>
</html>