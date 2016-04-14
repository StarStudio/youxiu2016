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
$id=$_GET['id'];
include 'conn.php';
  $sql="select * from article2 where id=$id";
  $result=mysql_query($sql); 
  $row=mysql_fetch_array($result);
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
<li role="prenstation"><a href="article2.php">成长</a></li>
<li role="prenstation"><a href="article3.php">奔跑</a></li>
<li role="prenstation"><a href="roll.php">滚动新闻</a></li>
</ul>
</div>
<div class="rows">
<ul class="nav nav-tabs col-md-offset-2">
<li role="prenstation">成长</li>
</ul>
</div>
  </br>
<div class="panel panel-default col-xs-offset-2 col-xs-8">
<div class="panel-heading">编辑</div>
<form class="form-horizontal col-xs-9" name="input" action="update.php" method="post">
<div class="form-group">
    <label class="col-xs-offset-2 control-label">标题</label>
    <div class="col-xs-offset-2">
      <input type="text" class="form-control" id="title" placeholder="<?php echo "$row[title]" ?>" name="title">
    </div>
	</div>
	<div class="form-group">
    <label class="col-xs-offset-2 control-label">摘要</label>
    <div class="col-xs-offset-2">
      <textarea class="form-control" id="remark" placeholder="<?php echo "$row[remark]" ?>" name="remark" rows="6"></textarea>
    </div>
	</div>
	<div class="form-group">
	<label class="col-xs-offset-2 control-label">内容</label>
	<div class="col-xs-offset-2">
	<textarea id="editor_id" class="form-control" placeholder="" name="content" rows="6"></textarea>
	</div>
	</div>
	<div class="form-group">
	<div class="col-xs-offset-2">
      <button type="submit" class="btn btn-default">更新</button>
    </div>
	<div><input type="hidden" class="form-control" value="<?php echo $id; ?>" name="id"></div>
	<div><input type="hidden" class="form-control" value="article2" name="table"></div>
</form>
</div>
<a type='button' class='btn btn-default' id='delete'>删除</a>
</body>
<script charset="utf-8" src="../editor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="../editor/lang/zh-CN.js"></script>
<script>
        KindEditor.ready(function(K) {
                var editor = K.create('#editor_id',{
					resizeType : 1,
					allowPreviewEmoticons : false,
					allowImageUpload : false,
					items : ['bold', '|','removeformat','|','quickformat']
				});
						editor.html('<?php 
						$str = str_replace("\r\n", "<br>&nbsp;&nbsp;", $row['content']);
						$str = str_replace("\n\r", "<br>&nbsp;&nbsp;", $str);
						$str = str_replace("\t", "&nbsp;&nbsp;&nbsp;&nbsp;",$str);
						$str = str_replace(" ", "&nbsp;",$str);
						$str = str_replace('"', '\"',$str);
						$str = str_replace("'", "\'",$str);
						$str = str_replace("\"", "\\" + "\"",$str);
						
						echo "$str"; ?>');
        });
$(document).ready(function(){
    $("#title").val("<?php echo $row['title']; ?>");
	$("#remark").val("<?php echo $row['remark']; ?>");
});
</script>
	<script>
	var confirm = "<div class='alert alert-warning' role='alert'>确认删除吗？</div></br></br>";
	var yes = "<a type='button' class='btn btn-default' href='delete.php?id=<?php echo $id; ?>&table=article2&choice=y'>确认</a>"; 
	var no = "<a type='button' class='btn btn-default' href='delete.php?id=<?php echo $id; ?>&table=article2&choice=n'>取消</a>";
	$(document).ready(function(){
  $("#delete").click(function(){
  $(this).after(confirm,yes,no);
   $("#delete").unbind('click');
   }
   );
});
	</script>
</html>