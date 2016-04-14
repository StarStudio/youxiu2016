<?php

@$con = mysql_connect("localhost","root","");

if (!$con)
  {
  die('error' . mysql_error());
  }
  mysql_select_db("biaozhang",$con);
  mysql_query("SET NAMES 'UTF8'");

  
 function filter($data){
	 if (get_magic_quotes_gpc())
  {
  $data = stripslashes($data);
  }
	//$data = addslashes($data);
	//$data=htmlspecialchars($data);
	 $data=mysql_real_escape_string($data);
	 return $data;
}

function trimall($str)//删除空格
{
    $qian=array(" ","　","\t","\n","\r");$hou=array("","","","","");
    return str_replace($qian,$hou,$str);    
}