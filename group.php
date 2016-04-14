<!DOCTYPE html>

<html lang="en">
<?php
include 'app/conn.php';
  $sql="select * from article2 ORDER BY ordernum";
  $result=mysql_query($sql); 
?>
<head>

	<meta charset="UTF-8">

	<title>Document</title>

	<link rel="stylesheet" type="text/css" href="css.css">

</head>


<body>

	
	<div id="grhd" class="chd">
 </div>
<div id="row">
<?php 
for($i=0;$i<3;$i++){ 
@$row=mysql_fetch_array($result);
echo "<a target='_blank' href='article2.php?id=$row[id]'>
<div class='stars middle'>
<img src='upload/$row[image]' height='140' width='220'>
<div class='content'>
<div style='position:relative;top:5px'>$row[title]</div>
</div>
<div class='insider'>
&nbsp;&nbsp;&nbsp;&nbsp;$row[remark]</div>
</div>
</a>
";
}
@$row=mysql_fetch_array($result);
echo "<a target='_blank' href='article2.php?id=$row[id]'>
<div class='stars'>
<img src='upload/$row[image]' height='140' width='220'>
<div class='content'>
<div style='position:relative;top:5px'>$row[title]</div>
</div>
<div class='insider'>
&nbsp;&nbsp;&nbsp;&nbsp;$row[remark]</div>
</div>
</a>
";
?>

</div>
<div id="row">
<?php 
for($i=0;$i<3;$i++){ 
@$row=mysql_fetch_array($result);
echo "<a target='_blank' href='article2.php?id=$row[id]'>
<div class='stars middle'>
<img src='upload/$row[image]' height='140' width='220'>
<div class='content'>
<div style='position:relative;top:5px'>$row[title]</div>
</div>
<div class='insider'>
&nbsp;&nbsp;&nbsp;&nbsp;$row[remark]</div>
</div>
</a>
";
}
@$row=mysql_fetch_array($result);
echo "<a target='_blank' href='article2.php?id=$row[id]'>
<div class='stars'>
<img src='upload/$row[image]' height='140' width='220'>
<div class='content'>
<div style='position:relative;top:5px'>$row[title]</div>
</div>
<div class='insider'>
&nbsp;&nbsp;&nbsp;&nbsp;$row[remark]</div>
</div>
</a>
";
?>
</div>

</body>

</html>
