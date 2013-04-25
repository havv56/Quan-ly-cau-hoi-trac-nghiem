<?php

include 'dbc.php';

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);

	while($row = mysql_fetch_array($result)){
		$domain=$row['domain'];
		$banner=$row['banner'];
		$adminemail=$row['email'];
		$title=$row['title'];
		$footer=$row['footer'];
		$mgroup=$row['mgroup'];
		$mname=$row['mname'];
		$memconfrm=$row['memconfrm'];
	}
?>
<html>
<head>
<title>
<?php echo $title;?>
</title>


<link rel="stylesheet" href="css/form-field-tooltip.css" media="screen" type="text/css">
	<script type="text/javascript" src="js/rounded-corners.js"></script>
	<script type="text/javascript" src="js/form-field-tooltip.js"></script>
	
	

</head>








<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<center>

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

include 'dbc.php';

//gan cac gia tri 
if(isset($_POST['user'])){ $user = $_POST['user']; }
else{ $user = NULL; }
if(isset($_POST['pass'])){ $pass = $_POST['pass']; }
else{ $pass = NULL; }
if(isset($_POST['cpass'])){ $cpass = $_POST['cpass']; }
else{ $cpass = NULL; }
if(isset($_POST['email'])){ $email = $_POST['email']; }
else{ $email = NULL; }
if(isset($_POST['name'])){ $name = $_POST['name']; }
else{ $name = NULL; }
if(isset($_POST['group'])){ $group = $_POST['group']; }
else{ $group = NULL; }
if(isset($_POST['msg'])){ $msg = $_POST['msg']; }
else{ $msg = NULL; }
/*
else{
  $user = NULL;
  $pass = NULL;
  $cpass = NULL;
  $email = NULL;
  $name = NULL;
  $group = NULL;
  $msg = NULL;
}  */
/*
$user=$_POST['user'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$email=$_POST['email'];
$name=$_POST['name'];
$group=$_POST['group'];
*/
if($user!=""){
echo "<br>";
$msg="";
$query = "SELECT user FROM dmember WHERE user='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{$msg=$msg."User name already exist!<br>";}


if($email==""){$msg=$msg."Email field empty!<br>";}
if($email!=""){
$query = "SELECT email FROM dmember WHERE email='$email' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{$msg=$msg."Email ID already exist!<br>";}}

if($pass==""){$msg=$msg."Password field empty!<br>";}
if($pass!=""){
if($pass!=$cpass){$msg=$msg."Confirm Password didn't match!<br>";}
}

if($name==""){$msg=$msg."Name field empty!<br>";}
if($group==""){$msg=$msg."Please select atleast one group!<br>";}


if(@eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$",$email)) {
}
else {

  $msg=$msg."Invalid email ID<br>";

}


if($msg==""){


$query="SELECT * FROM dmember "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);
}
$random = (rand()%999999);
$totmem+=1;
$uid=$random."0".$totmem;
$epass=md5($pass);


$sql="INSERT INTO dmember(id, user, pass, email)
VALUES
('$uid','$user','$epass','$email')";
if (!mysql_query($sql,$con))
{
  die('Error: ' . mysql_error());
  }



mysql_query("UPDATE dmember SET name='$name', groupname='$group' WHERE  user='$user'  "); 


if($memconfrm=="1"){
$cemail=explode('@',$email);
$cemail0=$cemail[0];
$cemail1=$cemail[1];







// send e-mail to ...
$to=$email;

// Your subject
$subject="Action Required to Activate Membership ";

// From
$header="From: ".$adminemail;

// Your message

$message="Dear $user,  \r\n";
$message.="Thank you for registering at the  $domain \r\n";
$message.="To complete your registration, please visit this URL: \r\n";
$message.="$domain/confrm.php?activateid=$random";

// send email
$sentmail = mail($to,$subject,$message,$header);

mysql_query("UPDATE dmember SET actstatus='0' WHERE  user='$user'  "); 

mysql_query("UPDATE dmember SET actstatustmp='1' WHERE  user='$user'  "); 

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=signup_confrm.php?cemail=<?php echo $cemail1;?>">

<?php

}


if($memconfrm=="2"){



// send e-mail to ...
$to=$adminemail;

// Your subject
$subject="Action Required to Activate Membership";

// From
$header="From: ".$email;

// Your message

$message="Please confirm a new member registration  for  $domain \r\n";
// send email
$sentmail = mail($to,$subject,$message,$header);

mysql_query("UPDATE dmember SET actstatus='0' WHERE  user='$user'  "); 

mysql_query("UPDATE dmember SET actstatustmp='1' WHERE  user='$user'  "); 

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=signup_confrm.php?ademail=1">

<?php

}


if($memconfrm=="0"){


mysql_query("UPDATE dmember SET actstatus='1' WHERE  user='$user'  "); 

mysql_query("UPDATE dmember SET actstatustmp='1' WHERE  user='$user'  "); 


?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=signup_confrm.php?rgd=1">

<?php

}

}


}

if($msg!=""){?>
<center>
<table bgcolor="ff6666" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="390"  >

<font color=ffffff size=3><?php echo $msg;?>

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

<td width="310"  >





<font color="990000" size="3">

<br>

&#272;&#259;ng k&#253; th&#224;nh vi&#234;n:


<form name="dForm" method="post" action="signup.php">
</center><br>
<font color="990000" size="3">
*<font color="999999" size="3">
User name: <br><input type="text" name="user" size="35" value="<?php echo $user;?>" tooltipText="User name already exists, please re-enter another name ">&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
<font color="990000" size="3">
*<font color="999999" size="3">
M&#7853;t kh&#7849;u: &nbsp;<br><input type="password" name="pass" size="35"  value="<?php echo $pass;?>" tooltipText="Strong password, for eg. Ksa$567vFT " >&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>

<font color="990000" size="3">
*<font color="999999" size="3">
Nh&#7853;p l&#7841;i: &nbsp; <br><input type="password" name="cpass" size="35" tooltipText="Password must match the password above" >&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
<font color="990000" size="3">
*<font color="999999" size="3">
e-mail: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><input type="text" name="email" size="35"  value="<?php echo $email;?>" tooltipText="Please enter a valid email id,  eg. abcd@yahoo.com" > 
<br><br>
<?php


if($mname=="1"){
?>
<font color="990000" size="3">
*<font color="999999" size="3">


<?php
}

?>

H&#7885; t&#234;n:&nbsp;&nbsp;&nbsp;&nbsp; <br><input type="text" name="name" size="35"  value="<?php echo $name;?>" tooltipText="Your full name" > 
<br><br>

<?php

$query = "SELECT * FROM dgroup ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{

?>
<?php


if($mgroup=="1"){
?>
<font color="990000" size="3">
*<font color="999999" size="3">


<?php
}

?>

Ch&#7885;n nh&#243;m:&nbsp;&nbsp;
<br><select name="group">

<?php

$query = "SELECT * FROM dgroup ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
?><option value="<?php echo $row['groupname'];?>"><?php
echo $row['groupname']; ?></option>
<?php

}

?>
</select><br><br>
<?php
}
?>

<a href="login.php"><font color="999999" size="3">&#272;&#259;ng nh&#7853;p</a>
 &nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;

<input type="image" src="admin/images/signup.jpg" alt="Submit button">

<br>


<br>


</td>

<td width="180"  valign=top><br>*<font color="999999" size="3"> Avatar <br><br><br>

<img src="admin/images/people.png" border="0">

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


<script type="text/javascript">
var tooltipObj = new DHTMLgoodies_formTooltip();
tooltipObj.setTooltipPosition('right');
tooltipObj.setPageBgColor('#EEEEEE');
tooltipObj.setTooltipCornerSize(15);
tooltipObj.initFormFieldTooltip();
</script>


</body>
</html>
