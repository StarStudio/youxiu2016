<!DOCTYPE html>
<?php
  $table=$_GET['table'];
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
	<title>后台</title>
</head>
<body>
<div class="container">
	<div class="panel panel-default col-md-8 col-md-offset-2">
	<div class="panel-heading">修改顺序（输入框中为顺序号，留空则不改变顺序）</div>
	<form class="form-horizontal panel-body" name="input" action="orderchange.php?table=<?php echo $table; ?>" method="post">
  <div class="rows">
  <?php

  include 'conn.php';
  $sql="SELECT title,ordernum,id FROM $table ORDER BY ordernum";
  $result=mysql_query($sql); 
   while($row=mysql_fetch_array($result)){
  echo "<div class='form-group'>
    <label class='col-md-4 control-label'>$row[title]</label>
    <div class='col-md-4'>
      <input type='text' class='form-control' placeholder='$row[ordernum]' name='$row[id]'>
    </div>
	</div>
	";
	}
	?>
			<div class="form-group">
	<div class="col-xs-offset-6">
      <button type="submit" class="btn btn-default">保存</button>
    </div>
	</div>
  <a type='button' class='btn btn-default' href='<?php echo $table;?>.php' >返回</a>
	</form>
</div>
</div>
</body>
</html>