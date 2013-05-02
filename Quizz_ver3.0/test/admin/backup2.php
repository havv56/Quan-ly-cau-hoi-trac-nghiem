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
$backup=$row['backup'];
}
?>
<html>
<head>
<title>
BackUp

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








<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Processing </b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>

<?php

$cbackup=$_GET['cbackup'];
$restore=$_GET['restore'];
$update=$_GET['update'];

if($cbackup!=""){



$query = mysql_query("CREATE TABLE z_dadmin LIKE dadmin");
$query = mysql_query("CREATE TABLE z_danswer LIKE danswer");
$query = mysql_query("CREATE TABLE z_daoptions LIKE daoptions");
$query = mysql_query("CREATE TABLE z_dgroup LIKE dgroup");
$query = mysql_query("CREATE TABLE z_dimages LIKE dimages");
$query = mysql_query("CREATE TABLE z_dmember LIKE dmember");
$query = mysql_query("CREATE TABLE z_doptions LIKE doptions");
$query = mysql_query("CREATE TABLE z_dquestions LIKE dquestions");
$query = mysql_query("CREATE TABLE z_dresult LIKE dresult");
$query = mysql_query("CREATE TABLE z_dsubject LIKE dsubject");
$query = mysql_query("CREATE TABLE z_dtest LIKE dtest");



$query = mysql_query("INSERT z_dadmin SELECT * FROM dadmin");
$query = mysql_query("INSERT z_danswer SELECT * FROM danswer");
$query = mysql_query("INSERT z_daoptions SELECT * FROM daoptions");
$query = mysql_query("INSERT z_dgroup SELECT * FROM dgroup");
$query = mysql_query("INSERT z_dimages SELECT * FROM dimages");
$query = mysql_query("INSERT z_dmember SELECT * FROM dmember");
$query = mysql_query("INSERT z_doptions SELECT * FROM doptions");
$query = mysql_query("INSERT z_dquestions SELECT * FROM dquestions");
$query = mysql_query("INSERT z_dresult SELECT * FROM dresult");
$query = mysql_query("INSERT z_dsubject SELECT * FROM dsubject");
$query = mysql_query("INSERT z_dtest SELECT * FROM dtest");

mysql_query("UPDATE dadmin SET backup='1' WHERE  user='admin'  "); 



?>
<font color="green" size="3">Database Backup created Successfully. <a href="backup.php"><font color=666666 >Back</a>

<?php
}


if($restore!=""){


mysql_query("DELETE FROM dadmin "); 
mysql_query("DELETE FROM danswer "); 
mysql_query("DELETE FROM daoptions "); 
mysql_query("DELETE FROM dgroup "); 
mysql_query("DELETE FROM dimages "); 
mysql_query("DELETE FROM dmember "); 
mysql_query("DELETE FROM doptions "); 
mysql_query("DELETE FROM dquestions "); 
mysql_query("DELETE FROM dresult "); 
mysql_query("DELETE FROM dsubject "); 
mysql_query("DELETE FROM dtest "); 




$query = mysql_query("INSERT dadmin SELECT * FROM z_dadmin");
$query = mysql_query("INSERT danswer SELECT * FROM z_danswer");
$query = mysql_query("INSERT daoptions SELECT * FROM z_daoptions");
$query = mysql_query("INSERT dgroup SELECT * FROM z_dgroup");
$query = mysql_query("INSERT dimages SELECT * FROM z_dimages");
$query = mysql_query("INSERT dmember SELECT * FROM z_dmember");
$query = mysql_query("INSERT doptions SELECT * FROM z_doptions");
$query = mysql_query("INSERT dquestions SELECT * FROM z_dquestions");
$query = mysql_query("INSERT dresult SELECT * FROM z_dresult");
$query = mysql_query("INSERT dsubject SELECT * FROM z_dsubject");
$query = mysql_query("INSERT dtest SELECT * FROM z_dtest");


mysql_query("UPDATE dadmin SET backup='1' WHERE  user='admin'  "); 

?>
<font color="green" size="3">Database restored Successfully. <a href="backup.php"><font color=666666 >Back</a>

<?php
}



if($update!=""){


mysql_query("DELETE FROM z_dadmin "); 
mysql_query("DELETE FROM z_danswer "); 
mysql_query("DELETE FROM z_daoptions "); 
mysql_query("DELETE FROM z_dgroup "); 
mysql_query("DELETE FROM z_dimages "); 
mysql_query("DELETE FROM z_dmember "); 
mysql_query("DELETE FROM z_doptions "); 
mysql_query("DELETE FROM z_dquestions "); 
mysql_query("DELETE FROM z_dresult "); 
mysql_query("DELETE FROM z_dsubject "); 
mysql_query("DELETE FROM z_dtest "); 






$query = mysql_query("INSERT z_dadmin SELECT * FROM dadmin");
$query = mysql_query("INSERT z_danswer SELECT * FROM danswer");
$query = mysql_query("INSERT z_daoptions SELECT * FROM daoptions");
$query = mysql_query("INSERT z_dgroup SELECT * FROM dgroup");
$query = mysql_query("INSERT z_dimages SELECT * FROM dimages");
$query = mysql_query("INSERT z_dmember SELECT * FROM dmember");
$query = mysql_query("INSERT z_doptions SELECT * FROM doptions");
$query = mysql_query("INSERT z_dquestions SELECT * FROM dquestions");
$query = mysql_query("INSERT z_dresult SELECT * FROM dresult");
$query = mysql_query("INSERT z_dsubject SELECT * FROM dsubject");
$query = mysql_query("INSERT z_dtest SELECT * FROM dtest");

mysql_query("UPDATE dadmin SET backup='1' WHERE  user='admin'  "); 





















?>
<font color="green" size="3">Database Backup updated Successfully. <a href="backup.php"><font color=666666 >Back</a>

<?php
}


?>

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


