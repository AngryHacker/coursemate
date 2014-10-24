<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="css/bootstrap/css/bootstrap_icon.css" rel="stylesheet">
        <title>CourseMate</title>

		<script src="js/jquery-1.11.1.min.js"></script>
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <script src="http://cdn.bootcss.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/site_mob.css">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
	</head>

<body>
    <nav class="navbar navbar-fixed-top nav-container">
      <h4 class='text-center'>CourseMate</h4>
       <div class='container'>
             <ul class='nav nav-pills nav-justified tabs' role='tablist'>
                <li role='presentation' class="text-center">
                    <a href="?r=site/logout"><span class="glyphicon glyphicon-remove-circle"></span> 注销</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=course/index"><span class="glyphicon glyphicon-th-large"></span> 我的主页</a></li>
                <li role='presentation' class="text-center">
                    <a href="?r=student/view"><span class="glyphicon glyphicon-hand-right"></span> 我的资料</a></li>
             </ul>
       </div>
    </nav>

		<div class="content" data-role='content'>
          <div class='fix_mob hidden-md hidden-lg'></div>
		<?php
			echo $content;
		?>
		</div>
		<div class="clearfix"></div>
		<div class="footer nav-container navbar navbar-fixed-bottom" id='footer'>
			<center>
			<p>course 团队技术支持</p>
			<p>&copy;coursemate All right resevred.</p>
			</center>
		</div>

</body>
</html>
