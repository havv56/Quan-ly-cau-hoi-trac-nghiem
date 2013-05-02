<html>
<head>
<title>
<?php
include 'dbc.php';

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$adminemail=$row['email'];

//$logo=$row['logo'];
$banner=$row['banner'];
$title=$row['title'];
$footer=$row['footer'];
$memconfrm=$row['memconfrm'];
}
?><?php echo $title;?>
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
//$logo=$row['logo'];
$memconfrm=$row['memconfrm'];
$adminemail=$row['email'];
}
?>

<table width="980" height="60" bgcolor="ffffff"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980" valign=top >
<img src="admin/logo/logo.gif<?php echo $banner;?>" >


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
//$reemail=$_POST['reemail'];

if(isset($_POST['reemail'])){ $user = $_POST['reemail']; }
else{$reemail = NULL;}

if($reemail!=""){
$msg="";
$query = "SELECT email FROM dmember WHERE email='$reemail' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
{
$msg="<font color=red>Email ID doesn't exist!<br></font>";
echo $msg;

}
else
{
	function createRandomPassword() {
		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;

		while ($i <= 7){
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}
	// Usage
	$npass=createRandomPassword();
	$epass=md5($npass);
	// send e-mail to ...
	$to=$reemail;
	// Your subject
	$subject="Password restored ";
	// From
	$header="From: ".$adminemail;
	// Your message
	$message="Hi,  \r\n";
	$message.="Your password has been reset. \r\n";
	$message.="New password:  $npass \r\n";
	// send email
	$sentmail = mail($to,$subject,$message,$header);
	mysql_query("UPDATE dmember SET pass='$epass' WHERE  email='$remail'  "); 
	echo "Your password has been restored and new password sent by email.<br>";
	}




}
?>

<br>
<font color="666666" size="3"><b>Forget Passwork:</b><br><br><form method="post" action="forgot.php">
Require enter Email: <br><input type="text" name="reemail" size="35">
<input type="submit" value="Submit">
</form>

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
