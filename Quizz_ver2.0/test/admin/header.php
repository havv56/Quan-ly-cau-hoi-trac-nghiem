<?php
//session_start(); da su dung ham session_start() o trong acount.php
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	include 'dbc.php';
?>

<html>
<head>
<title>

</title>

<link rel="stylesheet" type="text/css" href="anylinkmenu.css" />

<script type="text/javascript" src="menucontents.js"></script>

<script type="text/javascript" src="anylinkmenu.js">

</script>

<script type="text/javascript">

//anylinkmenu.init("menu_anchors_class") //Pass in the CSS class of anchor links (that contain a sub menu)
anylinkmenu.init("menuanchorclass")

</script>


</head>

<body>




<table width="980" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="958"  background="images/bgn1.jpg"  >
<?php
$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
 {
$chuser=$row['user'];
}
if($chuser=="admin"){
?>
<table height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td ><center>
<a href="account.php"><font face=arial  color=666666 size=2 >Home</a> 
</td>
<td><font face=arial  face=arial color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu1" ><font face=arial  color=666666 size=2 >
Online Test</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu2" ><font face=arial  color=666666 size=2 >
Members</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu3" ><font face=arial  color=666666 size=2 >
Result/Report</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu4" ><font face=arial  color=666666 size=2 >
Security</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu5" ><font face=arial  color=666666 size=2 >
Group </a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu6" ><font face=arial  color=666666 size=2 >
Operator</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu7" ><font face=arial  color=666666 size=2 >
Setting </a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td>
<center>
<a href="" class="menuanchorclass" rel="anylinkmenu8" ><font face=arial  color=666666 size=2 >
Help </a></td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td>
<a href="logout.php"><font face=arial  color=666666 size=2 >
Logout</a></td>
</tr>
</table>
<?php

}
else
{
?>

<table height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td ><center>
<a href="account.php"><font face=arial  color=666666 size=2 >Home</a> 
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu1" ><font face=arial  color=666666 size=2 >
Online Test</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu2" ><font face=arial  color=666666 size=2 >
Members</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td><center>
<a href="" class="menuanchorclass" rel="anylinkmenu3" ><font face=arial  color=666666 size=2 >
Result/Report</a>
</td>
<td><font face=arial  color=666666 size=2 > &nbsp; | &nbsp; </td>
<td>
<a href="logout.php"><font face=arial  color=666666 size=2 >
Logout</a></td>
</tr>
</table>




<?php
}
?>
<font face=arial  color="666666" size="3">

</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>


</body>
</html>
<?php

}

else{
	
echo "Login Error";
}


?>
