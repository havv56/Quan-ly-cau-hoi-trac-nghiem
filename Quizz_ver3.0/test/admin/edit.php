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
$imemconfrm=$row['memconfrm'];
$loguser=$row['user'];
$imgroup=$row['mgroup'];
$imname=$row['mname'];

}

if($loguser=="admin"){
?>
<html>
<head>
<title>
Setting

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

<font color="green">
<?php
@$ititle=$_POST['title'];
@$ifooter=$_POST['footer'];
@$memconfrm=$_POST['memconfrm'];
@$mgroup=$_POST['mgroup'];
@$mname=$_POST['mname'];




if($ititle!="")
{
mysql_query("UPDATE dadmin SET title='$ititle' WHERE user='admin' "); 
echo "Title text updated!<br>";

} 





 if($ifooter!="")
{
mysql_query("UPDATE dadmin SET footer='$ifooter' WHERE  user='admin'  "); 
echo "Footer text updated!<br>";


}

 if($memconfrm!="")
{
mysql_query("UPDATE dadmin SET memconfrm='$memconfrm' WHERE  user='admin'  "); 
echo "Member Confirmation setting updated!<br>";


}



 if($mgroup!="")
{
mysql_query("UPDATE dadmin SET mgroup='$mgroup' WHERE  user='admin'  "); 


}

 if($mname!="")
{
mysql_query("UPDATE dadmin SET mname='$mname' WHERE  user='admin'  "); 


}

?>





<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Basic Configuration</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table><br>




<form method="post" action="edit.php">





<font color="999999" size="3">

Page Title text:<br> <input type="text" name="title" size="35" value="<?php echo $title;?>">&nbsp;&nbsp;&nbsp;&nbsp;
<br>
<br>


Footer text: <br><input type="text" name="footer" size="35" value="<?php echo $footer;?>">&nbsp;&nbsp;&nbsp;&nbsp;
<br>
<br>

Member Confirmation: <br>



<select name="memconfrm">
<option value="">Select</option>
<option value="0" <?php if($imemconfrm=="0"){ echo "selected";}?>  >Don't Confirm by any Method</option>
<option value="1" <?php if($imemconfrm=="1"){ echo "selected";}?>  >Confirm by sending activation email to Member</option>
<option value="2" <?php if($imemconfrm=="2"){ echo "selected";}?>  >Confirm by sending activation email to Administrator</option>
</select>
<br>
<br>
<b>
Mandatory Field during signup: <br><br></b>

Full Name: 
<select name="mname">
<option value="">Select</option>
<option value="0" <?php if($imname=="0"){ echo "selected";}?>  >No</option>
<option value="1" <?php if($imname=="1"){ echo "selected";}?>  >Yes</option>
</select>
<br>
<br>

Group Name: 
<select name="mgroup">
<option value="">Select</option>
<option value="0" <?php if($imgroup=="0"){ echo "selected";}?>  >No</option>
<option value="1" <?php if($imgroup=="1"){ echo "selected";}?>  >Yes</option>
</select>
<br>
<br>

<input type="image" src="images/submit.jpg" alt="Submit button">

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
