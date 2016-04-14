<!DOCTYPE html>
<html lang="zh-CN">
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap.min.css">

	<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="../js/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="../js/bootstrap.min.js"></script>
	
</head>
<?php
include 'conn.php';
  $sql="select id,title from article2 ORDER BY ordernum";
  $result=mysql_query($sql); 
  
?>
<title>后台</title>
<body class="container-fluid">
<div class="rows">
<?php
session_start();
if(!isset($_SESSION['username']))
{
	echo "<div class='btn-group col-md-offset-2' role='group' aria-label='...'>";
	echo "<a type='button' class='btn btn-default' href='login.php'>登录</a>";
}
else{
	echo "<div class='btn-group col-md-offset-2' role='group' aria-label='...'>";
	echo "<span type='button' class='btn btn-default'>$_SESSION[username]</span>";
	echo "<a type='button' class='btn btn-default col-md-offset-2' href='logout.php'>注销</a>";
}
?>
</div>
</br>
</br>
<div class="rows">
<ul class="nav nav-tabs col-xs-offset-2">
<li role="prenstation"><a href="index.php">首页</a></li>
<li role="prenstation"><a href="article1.php">青春</a></li>
<li role="prenstation" class="active"><a href="article2.php">成长</a></li>
<li role="prenstation"><a href="article3.php">奔跑</a></li>
<li role="prenstation"><a href="roll.php">滚动新闻</a></li>
</ul>
</div>

<ul class="list-group list-group-item col-xs-offset-2" style="max-width:600px;" >
<?php 
$i=1;
  while($row=mysql_fetch_array($result))
  {
		echo " <li class='list-group-item'><span scope='row'>$i</span>&nbsp;&nbsp;&nbsp;<a   href='../article2.php?id=$row[id]'><h4 style='display:inline;' >$row[title]</h4></a></li><a style='padding-left: 400px;' type='button' href='edit2.php?id=$row[id]'>编辑</a></br>"; 
		$i++;
 }
       
 ?>
   <a type='button' class='btn btn-default' href='order.php?table=article2' >顺序修改</a>
</ul>
  </br>

  </br>
<div class="panel panel-default col-xs-offset-2 col-xs-8">
<div class="panel-heading">发表</div>
<form class="form-horizontal col-xs-9" name="input"  enctype="multipart/form-data" action="artsub2.php" method="post">
<div class="form-group">
    <label class="col-xs-offset-2 control-label">标题</label>
    <div class="col-xs-offset-2">
      <input type="text" class="form-control" placeholder="Title" name="title">
    </div>
	</div>
	<div class="form-group">
    <label class="col-xs-offset-2 control-label">摘要</label>
    <div class="col-xs-offset-2">
      <textarea class="form-control" placeholder="摘要" name="remark" rows="6"></textarea>
    </div>
	</div>
	 <div class="form-group">
	<label class="col-md-4 control-label">上传</label>
		<div class="col-md-4">
	<input type="file" name="file" size="20" /></span>
		</div>
	</div>
	<div class="form-group">
	<label class="col-xs-offset-2 control-label">内容</label>
	<div class="col-xs-offset-2">
	<textarea id="editor_id" class="form-control" placeholder="Content" name="content" rows="6"></textarea>
	</div>
	</div>
	<div class="form-group">
	<div class="col-xs-offset-2">
      <button type="submit" class="btn btn-default">发表</button>
    </div>
</form>
</div>
</body>
<script charset="utf-8" src="../editor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="../editor/lang/zh-CN.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id',{
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : ['bold', '|','removeformat','|','quickformat']
				});
        });
		
</script>
</html>