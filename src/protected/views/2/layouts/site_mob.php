<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/jquery.mobile-1.4.3.min.css">
		<link href="css/bootstrap/css/bootstrap_icon.css" rel="stylesheet">
		<link rel="stylesheet" href="css/site_mob.css">
        <title>CourseMate</title>

        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/jquery.mobile-1.4.3.min.js"></script>
		<script src="css/bootstrap/js/bootstrap.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	</head>
<body data-role="none">
	<div data-role="page" data-theme="a">
        <div data-role='header'data-theme='a'>
            <h1>CourseMate</h1>
            <div data-role="navbar" data-theme='b'>
              <ul>
                <li><a href="#" data-rel="back" data-icon="arrow-l" data-theme='b' class="nav">返回</a></li>
                <li><a href="?r=course/index" data-icon="home"  data-theme='b' class="nav" data-prefetch="ture">我的主页</a></li>
                <li><a href="?r=student/view" data-icon="arrow-r" data-theme='b' class="nav" data-prefetch="ture">我的资料</a></li>
              </ul>
            </div>
        </div>
		<div class="content" data-role='content'>
		<?php
			echo $content;
		?>
		</div>
		<div class="clear"></div>
		<div class="footer nav-container navbar" id='footer'>
			<center>
			<p>course 团队技术支持</p>
			<p>&copy;coursemate All right resevred.</p>
			</center>
		</div>
	</div>
	<script charset="utf-8">
			//$.mobile.page.prototype.options.domCache=false;
	</script>
</body>
</html>
