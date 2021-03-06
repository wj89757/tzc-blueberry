<?php if (!defined('THINK_PATH')) exit();?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<!-- 分别为：屏幕宽度和设备一直，初始缩放比例，最大缩放比例和禁止用户缩放 -->
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<title>贪吃蓝莓君-我要预约</title>
	<link rel="stylesheet" type="text/css" href="/tzc-blueberry/Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/tzc-blueberry/Public/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/tzc-blueberry/Public/css/bootstrap-datetimepicker.css" />
</head>
<body>
	<!-- 水平排列 标签和文本框一行 -->

	<div class="container BlueberryForm">
		<div class="row">
			<div class="col-md-12">
				<form class="form-horizontal" method="post" action=<?php echo U('Index/add');?>>
					<div class="container">
						<div class="row">
							<div>
								<h3><我要预约></h3>
								<h5>当前预约人数/限制总人数 ：<b class="blod"><?php echo ($youralready); ?>/150</b></h5>
							</div>
							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-user">
									</span>
								</div>
								<input type="text" id="username" placeholder="请输入您的姓名" class="form-control" name="yourname" msg="姓名">
							</div>
							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-earphone">
									</span>
								</div>
								<input id="telphone" type="text" placeholder="请输入您的联系方式" class="form-control" name="yourtel" msg="联系方式"/>
							</div>
							<div class="input-group input-group-lg">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-calendar">
									</span>
								</div>
								<!-- <input type="text" name="youraptime" class="form-control" value="<?php echo ($yourtime); ?>" id="datetimepicker" data-date-format="yyyy-mm-dd hh:ii" readonly> -->
								<select class="form-control" name="youraptime" id="select">
									<option  value="第一次活动当天上午">当天上午</option>
							        <option value="第一次活动当天下午">当天下午</option>
								</select>
							</div>
							<div class="input-group input-group-lg">
						      <div class="input-group-addon">
									<span class="glyphicon glyphicon-stats">
									</span>
								</div>
								<input id="totalpeople" type="text" name="yourtotal" placeholder="请输入大人的人数（填数字即可）" class="form-control" msg="出行人数">
						   </div>
						   <div class="input-group input-group-lg">
						      <div class="input-group-addon">
									<span class="glyphicon glyphicon-leaf">
									</span>
								</div>
								<input id="childnum" type="text" name="yourchild" placeholder="请输入低于1米2小孩人数（填数字即可）" class="form-control" msg="儿童人数(可以是0)">
						   </div>
						   <input type="submit" class="btn btn-primary btn-lg btn-block btn-top-px" value="预约" onclick="return checkNull()"/>
						   <a class="btn btn-primary btn-lg btn-block" href=<?php echo U('Index/find');?>>已预约/修改信息</a>
						</div>
					</div>
				</form>	
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="/tzc-blueberry/Public/js/jquery.min.js"></script>
	<script type="text/javascript" src="/tzc-blueberry/Public/js/custom.js"></script>
	<script type="text/javascript" src="/tzc-blueberry/Public/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/tzc-blueberry/Public/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="/tzc-blueberry/Public/js/bootstrap-datetimepicker.zh-CN.js"></script>
	<script type="text/javascript">
		$('#datetimepicker').datetimepicker({
			language: 'zh-CN',  
		});
	</script>
</body>
</html>