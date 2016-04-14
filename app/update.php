<?php
include 'conn.php';
$postid=$_POST['id'];
$title=$_POST['title'];
$remark=$_POST['remark'];
$content=$_POST['content'];
$table=$_POST['table'];
$sql="UPDATE $table SET title='$title',remark='$remark',content='$content' WHERE id=$postid";
mysql_query($sql); 
mysql_close($con);
header('location:index.php');
?>