<?php
include 'dbc.php';
include 'function.php';
$user=$_POST['user'];
$pass=$_POST['pass'];
if($user!=""){
$encrypass=md5($pass);
$encodeuser=encodeuser($pass);
$query = "SELECT user, pass FROM dadmin WHERE user='$user' and pass='$encrypass' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{



$query = "SELECT * FROM dadmin WHERE user='$user' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
 {
extract($row);
encodepassword($encodeuser,$user, $email);
}
session_start();
$_SESSION['id']=$id;
$confrm='1';
}
else
{
$confrm='0';
}}?>
<?php
if($confrm=="1"){
header( 'Location: account.php' ) ;
}
?>
<?php
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
Quiz - Nhom 6
</title>
</head>
<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<center>

<br><br>

<table width="480" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="458"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">

<font color="666666" size="3">
<b>

Login admin</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>










<table bgcolor="ffffff" width="480"  border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="480"  >

<table align="center" bgcolor="ffffff" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="480"  >



<table align="center" bgcolor="ffffff" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>

<td width="470"  >

<?php

if($confrm=="1"){?>

<center>

<table bgcolor="ffffff" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="90"  >
</td>
<td width="160"  >
<font color="green" size="3"> &nbsp;&nbsp; Please wait a moment</font>

<br>

</td><td width="40"  ><img src="images/wait.gif" border="0">
</td><td width="110"  >
</td>
</tr></table>


</center>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=account.php">


<?php


}

if($confrm=="0"){?>

<center><br>
<table bgcolor="ff6666" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="390"  >

<font color=ffffff size=3>user name & password is incorrect !<br>

</td>
</tr></table></center>

<?php

}



?>





</td>

</tr></table>














<table align="center" bgcolor="ffffff" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>

<td width="470" ><br>

</center><font color="999999" size="3">
<form method="post" action="login.php">
<br>
User name: <input type="text" name="user" size="25" >&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
Password: &nbsp;<input type="password" name="pass" size="25" >&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
 
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;

<input type="image" src="images/login.jpg" alt="Submit button">



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
