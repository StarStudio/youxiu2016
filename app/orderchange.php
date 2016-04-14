<?php
$table=$_GET['table'];
include 'conn.php';
//var_dump($_POST);
foreach ($_POST as $id => $ordernum){
	if($ordernum){
	$id=(int)$id;
	$ordernum=(int)$ordernum;
	$sql="UPDATE $table SET ordernum=$ordernum WHERE id=$id";
	//echo $sql;
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
	}
}
mysql_close($con);
header('location:index.php');
