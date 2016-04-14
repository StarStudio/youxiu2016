<?php
  session_start(); 
  $id=$_GET['id'];
  $table=$_GET['table'];
  if(!isset($_SESSION['username']))
  {	
	   $data ="Please Login";
	   header("Refresh: 1; url=index.php");
	   exit($data);
  }
else
{
$choice=$_GET["choice"];
if($choice=="n")
{
	header("Location: index.php"); 
}
else
{
	include 'conn.php';
  mysql_query("DELETE FROM $table WHERE id=$id");
  mysql_close($con);
  header("Location: index.php");
}
}
?>