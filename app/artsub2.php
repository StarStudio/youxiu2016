<?php
  session_start(); 
  if(!isset($_SESSION['username']))
  {
	   //header('Refresh: 1; url=index.php');
	   exit("Please Login");
  }
  require 'conn.php';
  $title = filter($_POST["title"]);
  $content = filter($_POST["content"]);
  $remark = filter($_POST["remark"]);

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else{
	if ($_FILES["file"]["type"] == "image/jpeg")
	{
		$filename=time()."."."jpg";
		if (file_exists("../upload/" .$filename))
      {
			echo $filename . " already exists. ";
      }
		else
      {
			move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $filename);
	    $sql="select   *  from   article2   order   by   id   desc   limit   1 ";
		if($result=mysql_query($sql,$con))
		{
		$row = mysql_fetch_array($result);
		$ordernum=$row['ordernum']+1;
		}
		else{
		$ordernum=0;
		}
		$sql="INSERT INTO article2 (title, remark,content,image,ordernum)
		VALUES
		('".$title."','".$remark."','".$content."','".$filename."','".$ordernum."')";
		if (!mysql_query($sql,$con)){
			die('Error: ' . mysql_error());
		}
		else{
			echo "Stored in: " . "upload/" . $filename;
			echo "</br>Success";
			mysql_close($con);
			header('location:article2.php');
			}

      }
	}
	else
  {
	echo "Invalid file";
  }
}




  
  
?>