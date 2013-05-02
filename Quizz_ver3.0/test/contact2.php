<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dmember WHERE id='$id' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{
?>
<?php
include 'dbc.php';

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$aemail=$row['email'];
$logo=$row['logo'];
$banner=$row['banner'];
$title=$row['title'];
$footer=$row['footer'];
$memconfrm=$row['memconfrm'];
}
?>

<html>
<head>




<title>
<?php echo $title;?></title>

<style>
<!--
a {text-decoration:none;}
//-->
</style>




</head>
<body height="50" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" link="ffffff" vlink="ffffff" alink="ffffff">



<font color="666666">


<?php
include 'dbc.php';
$query = "SELECT email FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$email=$row['email'];
}
?>

<form method="post" action="process.php">
Email: &nbsp;&nbsp;&nbsp;<?php echo $email;?><br>


<input type="hidden" size="40" name="aemail" value="<?php echo $aemail;?>">
<input type="hidden" size="40" name="email" value="<?php echo $email;?>">

<br>
N&#7897;i dung:<br>
<textarea rows="8" cols="30" name="message"></textarea><br><br>
<input type="submit" value="Send">
</form>






</body>
</html>
<?php

}
else
{
?>

<center>
<table bgcolor="ffffff" width="500" height="100" border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="500" valign=top><center>

<?php
$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$logo=$row['logo'];
}
?>
<table width="500" height="20" bgcolor="ff6600"  border="0" cellspacing="0" cellpadding="0">
<tr><td width="500"  >
<font color="ffffff" size="3">
&nbsp;<?php echo $logo;?></td>
</tr></table>
<br>

<table bgcolor="ff6666" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="390"  ><center>

<font color=ffffff size=3>Login session is not valid!<br>
</center>
</td>
</tr></table>
<center>
<a href=logout.php><font color=maroon size=3>Click here</a><font color=666666 size=3> to login again. </center>
</td>
</tr></table></center>


<?php

}

}

else{
	
?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php">

<?php
}


?>
