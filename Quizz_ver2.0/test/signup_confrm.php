<html>
<head>
<title>
<?php
include 'dbc.php';

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))
 {

@$logo=$row['logo'];
$banner=$row['banner'];
$title=$row['title'];
$footer=$row['footer'];
$memconfrm=$row['memconfrm'];
}
//tieude
?><?php echo "Register".$title;?>
</title>
</head>
<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<center>
<?php
include 'dbc.php';
$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
@$logo=$row['logo'];
$memconfrm=$row['memconfrm'];
$adminemail=$row['email'];
}
?>

<table width="980" height="60" bgcolor="ffffff"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980" valign=top >
<img src="images/logo.png<?php echo $banner;?>" >


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
<table align="center" bgcolor="ffffff" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="980"  >
<table align="center" bgcolor="ffffff" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="970"  >
<?php
include 'dbc.php';
@$cemail=$_GET['cemail'];
@$ademail=$_GET['ademail'];
$rgd=$_GET['rgd'];
if($cemail!=""){
echo "<br><br><font color=green size=3>Your Registration completed successfully!<br><br>";
echo "we sent an activation email to your email address.";
echo "<br>Please check your email inbox of $cemail ";
}
if($ademail=="1"){
echo "<br><br><font color=green size=3>Your Registration completed successfully!<br><br>";
echo "Aministrator conformation required to activate your membership.";
echo "<br>Please wait while Aministrator conform your membership.";
}
if($rgd=="1"){
echo "<br><br><font color=green size=3>Your Registration completed successfully!<br><br>";
echo "<a href=login.php><font color=maroon size=3>Click here</a><font color=666666 size=3> to login";
}
?>
<font color="990000" size="3"><br><br><br>
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
