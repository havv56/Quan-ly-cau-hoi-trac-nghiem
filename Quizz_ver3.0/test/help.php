<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';
?><?php
include 'dbc.php';

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$banner=$row['banner'];
$title=$row['title'];
$footer=$row['footer'];
$memconfrm=$row['memconfrm'];
}
?>
<html>
<head>
<title>
<?php echo $title;?>
</title>
</head>

<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<center>

<table width="980" height="60" bgcolor="ffffff"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980" valign=top >
<img src="admin/<?php echo $banner;?>" >


</td>
</tr></table>

<table width="980" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="958"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b><?php echo $title;?></b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>










<table bgcolor="ffffff" width="980"  border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="980"  >


<table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>


<td width="150" valign=top>
<?php
include 'menu.php';
?>



</td><td width="100"  >
</td>

<td width="730" valign=top ><br>

<iframe src="contact2.php" width="700" height="320" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>












</td>
</tr></table>



</td>
</tr></table>

</td>
</tr></table>

<center><font color="666666">

<?php
include 'footer.php';
?>

</body>
</html>

<?php

}

else{
	
?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php">

<?php
}


?>
