<?php
	include 'dbc.php';
	include 'function.php';
	
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	
	if($user!=""){
		$encrypass=md5($pass);
		$encodeuser=encodeuser($pass);
		
		$query = "SELECT user, pass FROM dmember WHERE user='$user' and pass='$encrypass' ";
		   $result = mysql_query($query) or die(mysql_error());     
		   
		if(mysql_num_rows($result)==1){
		
			$query = "SELECT * FROM dmember WHERE user='$user' ";
			$result=mysql_query($query);
			
			while($row = mysql_fetch_array($result)){
				extract($row);
				encodepassword($encodeuser,$user, $email);
			}
			
			if($actstatustmp=="1"){
				if($actstatus=="1"){
					session_start();
					$_SESSION['id']=$id;
					$confrm='1';
				}
			}

			if($actstatustmp!="1"){ $confrm='3';}
			
			if($actstatustmp=="1"){
				if($actstatus!="1"){
					$confrm='2';
				}
			}

		}
		else{$confrm='0';}
	}
?>

<?php
	if($confrm=="1"){
		header( 'Location: avail.php' ) ;
	}
?>

<?php
	include 'dbc.php';

	$query = "SELECT * FROM dadmin WHERE user='admin' ";
	   $result=mysql_query($query);

	while($row = mysql_fetch_array($result)){
		$banner=$row['banner'];
		$title=$row['title'];
		$footer=$row['footer'];
		$memconfrm=$row['memconfrm'];
	}
?>

<html>
	<head>
		<title><?php echo $title;?></title>
		<!-- Banner hai bên  -->
	</head>
	
<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<center>

	<table width="980" height="60" bgcolor="ffffff"  border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="980" valign=top >
			<img src="admin/<?php echo $banner;?>" >
			<!-- <img src="admin/logo/logo.gif" > -->

			<!-- <img src="admin/logo/logo.gif<?php echo $banner;?>" > -->

			</td>
		</tr>
	</table>

	<table width="980" height="35" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td width="11"  background="admin/images/bgn2.jpg"> </td>
			<td width="958"  background="admin/images/bgn1.jpg">
				<font color="ffffff" size="3">
				<font color="666666" size="3">
				<b>Demo Login for User<?php echo $title;?></b>
			</td>
			<td width="11"  background="admin/images/bgn3.jpg"> </td>
		</tr>
	</table>

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

	if($confrm=="1"){?>


	<table bgcolor="ffffff" width="400"  border="0" cellspacing="0" cellpadding="0">
	<tr>
	<td width="90"  >
	</td>
	<td width="160"  >
	<font color="green" size="3"> &nbsp;&nbsp; Loading</font>

	<br>

	</td><td width="40"  ><img src="admin/images/wait.gif" border="0">
	</td><td width="110"  >
	</td>
	</tr></table>


</center>
<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=account.php">


<?php


}

if($confrm=="0"){?>

<br>
<table bgcolor="ff6666" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="390"  >

<font color=ffffff size=3> Wrong username or password <br>

</td>
</tr></table></center>

<?php

}

if($confrm=="2"){?>

<center><br>
<table bgcolor="ff6666" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="390"  >

<font color=ffffff size=3>Inactive accounts<br>

</td>
</tr></table></center>

<?php

}


if($confrm=="3"){?>

<center><br>
<table bgcolor="ff6666" width="400"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="390"  >

<font color=ffffff size=3>Account locked please contact Administrator.<br>

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

Login
</center><font color="999999" size="3">
<form method="post" action="login.php">
<br>
User name: <input type="text" name="user" size="25" >&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
Password: &nbsp;<input type="password" name="pass" size="25" >&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
 
<a href="signup.php"><font color="999999" size="3">Registration</a>&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;


<input type="image" src="admin/images/login.jpg" alt="Submit button">


&nbsp;&nbsp;

<a href="forgot.php"><font color="666666" soze="3">Forgot password ?</a>

<br>


<br>



</td>

<td width="180"  valign=top><br>


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
