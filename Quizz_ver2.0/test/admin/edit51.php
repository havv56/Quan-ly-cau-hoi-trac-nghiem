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
}
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


$deluser=$_GET['deluser'];

if($deluser!="")
{
mysql_query("DELETE FROM dadmin WHERE id='$deluser' "); 
echo "<font color=green>Operator Deleted!";
}


?>









<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Available Operators</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table><br>




<?php


$query="SELECT * FROM dadmin WHERE user!='admin' "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td  background="images/bgn21.jpg" width="150"><font color="666666"><center>User</td>
<td  background="images/bgn21.jpg" width="200"><font color="666666"><center>Name</td>
<td  background="images/bgn21.jpg" width="130"><font color="666666"><center>Group assigned</td>
<td  background="images/bgn21.jpg" width="60"><font color="666666"><center></td>
<td background="images/bgn23.jpg" height="35" width="1"></td>

</tr>

<?php

while($row = mysql_fetch_array($result))

 {



?><tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc"><td ><center></td>
 
  <?php echo "<td ><center>" . $row['user'] . "</td>
  <td ><center>" . $row['name'] . "</td>
  <td ><center>" . $row['groupname'] . "</td>
  <td>" ; ?>
  <a href="edit51.php?deluser=<?php echo $row['id']; ?>">
<font color="990000" size="3"><center><img src="images/delete.png" border="0"></center>
</a>


<?php
echo "</td><td bgcolor='ffffcc'><center></td>";

echo "</tr>";

  }


?>


</table>

<br>
<br>



























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
