<!DOCTYPE html>
<?php
session_start();
  if(!isset($_SESSION['username']))
{
header('location:login.php');
}
?>

<html lang="zh-CN">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="../js/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="../js/bootstrap.min.js"></script>
	<style>
<link rel="stylesheet" type="text/css" href="style.css" />
<style>
#id {
  position: fixed;
  bottom: 0;
}
</style>
</head>
<title>后台</title>
<body class="container-fluid">
<h2 align="center">后台</h2>
<div class="rows">
<?php
if(!isset($_SESSION['username']))
{
	echo "<div class='btn-group col-xs-offset-2' role='group' aria-label='...'>";
	echo "<a type='button' class='btn btn-default' href='login.php'>登录</a>";
	echo "</div>";
}
else{
	echo "<div class='btn-group col-xs-offset-2' role='group' aria-label='...'>";
	echo "<span type='button' class='btn btn-default'>$_SESSION[username]</span>";
	echo "<a type='button' class='btn btn-default col-xs-offset-2' href='logout.php'>注销</a>";
}
?>
</div>
</br>
</br>
<div class="rows">
<ul class="nav nav-tabs col-xs-offset-2">
<li role="prenstation"><a href="index.php">首页</a></li>
<li role="prenstation"><a href="article1.php">青春</a></li>
<li role="prenstation"><a href="article2.php">成长</a></li>
<li role="prenstation"><a href="article3.php">奔跑</a></li>
<li role="prenstation"><a href="roll.php">滚动新闻</a></li>
</ul>
</div>
</br>
</br>
</br>
<p class="col-xs-offset-2">
Tips:发布的时候，如果是事先写好复制过来的，请先清除格式再一键排版
图片格式限定为jpg格式
</p>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

</body>
</html>