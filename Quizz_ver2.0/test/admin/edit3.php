<?php
session_start();
if(isset($_SESSION['id'])){
$user=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dadmin WHERE id='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{
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
$loguser=$row['user'];
}

if($loguser=="admin"){

?>
<html>
<head>
<title>
SavSoft online test script

</title>
</head>

<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<center>




<?php
include 'header.php';
?>


<table bgcolor="ffffff" width="980"  border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="980"  >








<table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>


<td width="100"  >
</td>
<td width="880" valign=top >




<br>





























<br>
<?php

$opass=$_POST['opass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];

if($npass!=""){

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$pass=$row['pass'];
}


$encryopass=md5($opass);

if($encryopass==$pass){
if($cpass==$npass){
$encrynpass=md5($npass);

mysql_query("UPDATE dadmin SET pass='$encrynpass' WHERE user='admin' "); 

echo "<font color=green>Password changed!<br>";
}
else
{
echo "<font color=red>Confirm password didn't match!<br>";


}

}


if($encryopass!=$pass){
echo "<font color=red>Wrong current password!<br>";
}


}

?>








<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Change Password</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table><br>








<form method="post" action="edit3.php">


<font color="666666" size="3">
Current Password: 

<br><input type="password" name="opass" value="" size="33"><br><br>

<font color="666666" size="3">
New Password: 
<br>
<input type="password" name="npass" value="" size="33">
<br><br>
Confirm Password: 
<br>
<input type="password" name="cpass" value="" size="33">
<br><br>

<input type="image" src="images/submit.jpg" alt="Submit button">
</form><br><br>
<br>
<br>



































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
