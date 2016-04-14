<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>成电优秀百科</title>
<link rel="stylesheet" type="text/css" href="pages.css">
</head>
<?php
require 'app/conn.php';
$id=trimall(filter($_GET['id']));
  $sql="select * from article2 where id = $id";
  $result=mysql_query($sql); 
  @$row=mysql_fetch_array($result);
?>
<body>
<div id="banner">
		<img src="images/title.png">
	</div>
	<div id="container">
	<div id="news">
	<div id="header">
	<h1><?php echo $row['title']; ?></h1>
	</div>
	<div id="main" style="height:2900px">
		<img src="upload/<?php echo "$row[image]"; ?>" >
		<div id="body">
<p>
<?php echo "$row[content]"; ?>
	</p>
	</div>

	</div>
	<div id="foot">
	Copyright ?2015 [电子科技大学] Powered By [star studio] Version 1.0.0
</div>
	
</body>
</html>