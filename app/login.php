<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="../bootstrap.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="../js/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="../js/bootstrap.min.js"></script>
	<style>
	.container {margin-top:10%;}
	</style>
</head>
<title>Login</title>

<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">星辰工作室-后台登录</div>
	<form class="form-horizontal panel-body" name="input" action="" method="post">
  <div class="rows">
  <div class="form-group">
    <label class="col-md-4 control-label">Username</label>
    <div class="col-md-4">
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
	<?php
	session_start();
	if(@$_SESSION[username]){
		echo "already signed in";
		header('location:index.php');
	}
$username = $password = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = test_input($_POST["password"]);

include 'conn.php';
  
  $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
  $result = mysql_query($sql);
  $row=mysql_fetch_array($result);
  check($row,$con,$username);
}
	function check($row,$con,$username)
	{
	if(!$row) {
	echo "<span class='alert alert-warning' role='alert'>用户名或密码错误</span>";
	mysql_close($con);
}
else
{
	$_SESSION["username"]=$username;
	header('location:article1.php');
	mysql_close($con);
}
  }
?>
</div>
  </div>
  <div class="form-group">
    <label class="col-md-4 control-label">Password</label>
    <div class="col-md-4">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-4 col-md-4">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
</div>
</div>
</html>