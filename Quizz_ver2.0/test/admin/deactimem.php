<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dadmin WHERE id='$id' ";
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

<style>
<!--
a {text-decoration:none;}
//-->
</style>

<style>
a:link, a:visited, a:active {
text-decoration: none}
a:hover {
text-decoration: underline}
</style>
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
<font color="666666" size="3">











<?php
$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$username=$row['user'];
$groupname=$row['groupname'];

}




$search=$_POST['search'];
$v=$_GET['v'];
$vall=$_GET['vall'];
$activate=$_GET['activate'];
$email=$_GET['email'];
$reactivate=$_GET['reactivate'];
$deactivate=$_GET['deactivate'];



$page=$_GET['page'];
if($page==""){
$page=0;
}
if($page!=""){
if($page<"0"){
$page-=$page;
}
}




if($username=="admin"){



?>
<font color="green" size="3">


<?php


if($email!="")
{
mysql_query("DELETE FROM dmember WHERE id='$email' "); 
echo "Removed";
}



if($reactivate!="")
{

mysql_query("UPDATE dmember SET actstatustmp='1' WHERE  id='$reactivate'  "); 
mysql_query("UPDATE dmember SET hack='0' WHERE  id='$reactivate'  "); 
echo "Activated<br>";

}

if($deactivate!="")
{

mysql_query("UPDATE dmember SET actstatustmp='0' WHERE  id='$deactivate'  "); 

echo "Deactivated<br>";

}




?>



<font color="990000" size="3">

<?php
if($v=="")
{

?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
<b>Deactivated members</b> &nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td width="186"  background="images/bgn1.jpg" valign=center>
</td>
<td width="20"  background="images/bgn1.jpg" >
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>
<?php

$query="SELECT * FROM dmember WHERE actstatustmp='0' ORDER BY date DESC LIMIT $page, 10 "; 

$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35"  width="150"><font color="666666"><center>Name</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>e-mail</td>
<td background="images/bgn21.jpg" height="35"  width="80"><font color="666666"><center>Group</td>
<td background="images/bgn21.jpg" height="35"  width="80"><font color="666666"><center>Country</td>
<td background="images/bgn21.jpg" height="35"  width="80"><font color="666666"><center>&nbsp;&nbsp;</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>
</tr>

<?php

while($row = mysql_fetch_array($result))

 {

?>

<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
<td><center></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['user'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['name'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['email'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['groupname'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['country'];?></u></a></td>
<td><center><a href="deactimem.php?email=<?php echo $row['id']; ?>"><center><img src="images/delete.png" border="0"></center></a></td>
<td><center></td>
</tr>

<?php
  

  }

echo "</table><br><font color=666666 size=3>";




$query="SELECT * FROM dmember  WHERE actstatustmp='0'  "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);
$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="deactimem.php?page=0" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="deactimem.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Members ";

echo " ";
 
$p2=$page;
$p2+=1;

echo $p2;
$p2-=1;
$p2+=10;
if($p2<=$totmem){
echo " to ";
echo $p2;
}
else
{
echo " to ";

echo $totmem;

}
echo " of ";

echo $totmem;



echo " ";

if($page<$plast){
?>&nbsp;
<a href="deactimem.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="deactimem.php?page=<?php echo $plast;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}
echo "<br><br>";

}

}













if($username!="admin"){



?>
<font color="green" size="3">


<?php


if($email!="")
{
mysql_query("DELETE FROM dmember WHERE id='$email' "); 
echo "Removed";
}



if($reactivate!="")
{

mysql_query("UPDATE dmember SET actstatustmp='1' WHERE  id='$reactivate'  "); 
echo "Activated<br>";

}

if($deactivate!="")
{

mysql_query("UPDATE dmember SET actstatustmp='0' WHERE  id='$deactivate'  "); 

echo "Deactivated<br>";

}




?>



<font color="990000" size="3">

<?php
if($v=="")
{

?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
<b>Deactivated members</b> 
</td>
<td width="186"  background="images/bgn1.jpg" valign=center>
</td>
<td width="20"  background="images/bgn1.jpg" >
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>
<?php

$query="SELECT * FROM dmember WHERE actstatustmp='0' AND groupname='$groupname' ORDER BY date DESC LIMIT $page, 10"; 

$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35"  width="150"><font color="666666"><center>Name</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>e-mail</td>
<td background="images/bgn21.jpg" height="35"  width="80"><font color="666666"><center>Group</td>
<td background="images/bgn21.jpg" height="35"  width="80"><font color="666666"><center>Country</td>
<td background="images/bgn21.jpg" height="35"  width="80"><font color="666666"><center>&nbsp;&nbsp;</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>
</tr>

<?php

while($row = mysql_fetch_array($result))

 {

?>

<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
<td><center></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['user'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['name'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['email'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['groupname'];?></u></a></td>
<td><a href="deactimem.php?v=<?php echo $row['id']; ?>"><font color="666666"><?php echo $row['country'];?></u></a></td>
<td><center><a href="deactimem.php?email=<?php echo $row['id']; ?>"><center><img src="images/delete.png" border="0"></center></a></td>
<td><center></td>
</tr>

<?php
  

  }

echo "</table><br><font color=666666 size=3>";




$query="SELECT * FROM dmember  WHERE actstatustmp='0' AND groupname='$groupname' "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);
$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="deactimem.php?page=0" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="deactimem.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Members ";

echo " ";
 
$p2=$page;
$p2+=1;

echo $p2;
$p2-=1;
$p2+=10;
if($p2<=$totmem){
echo " to ";
echo $p2;
}
else
{
echo " to ";

echo $totmem;

}
echo " of ";

echo $totmem;



echo " ";

if($page<$plast){
?>&nbsp;
<a href="deactimem.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="deactimem.php?page=<?php echo $plast;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}
echo "<br><br>";



}


 





}









if($v!="")
{

?>

<a href="deactimem.php"><img src="images/back.jpg" border="0"></a><br>

<?php


$query = "SELECT * FROM dmember WHERE id='$v' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {


?><br>






<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Member Information</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="580" height="90" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="images/g1.jpg"  >
</td>
<td width="575"  bgcolor="E9E9E9"  >
<font color="666666" size="3">
<center>
<table width="575" height="300" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;User name
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $row['user'];?>
</td>
</tr>

<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;Full Name
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php echo $row['name'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;E-mail
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $row['email'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;Group
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php echo $row['groupname'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;Gender
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $row['gender'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;Date of Birth
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php echo $row['dob'];?>
</td>
</tr>



<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;Address
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $row['address'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;City
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php echo $row['city'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;Country
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $row['country'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;Last updation in profile
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php echo $row['date'];?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;Status
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php $acts=$row['actstatus']; $actstatustmp=$row['actstatustmp']; if($acts=="0"){?>
New registration (<a href="deactimem.php?activate=<?php echo $row['id']; ?>&v=<?php echo $row['id']; ?>">
<font color="990000" size="3"><u>Activate now</u>
</a>)
<?php }
if($acts=="1" AND $actstatustmp=="1"){echo "Activated";

?> (
<a href="member.php?deactivate=<?php echo $row['id']; ?>&v=<?php echo $row['id']; ?>">
<font color="990000" size="3"><u>De-Activate now</u>
</a>
)<?php

}
if($acts=="1" AND $actstatustmp=="0"){echo "De-Activated";

?> (
<a href="deactimem.php?reactivate=<?php echo $row['id']; ?>&v=<?php echo $row['id']; ?>">
<font color="990000" size="3"><u>Re-Activate now</u>
</a>
)<?php
}

?>
</td>
</tr>

</table>


</td>
<td width="2"  background="images/g2.jpg"  >
</td>
</tr></table>
<table width="580" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="580"  background="images/g3.jpg">
</td>
</tr></table><br><br>

<?php

}
}



?>





</td>
</tr></table>


</td>
</tr></table>

</td>
</tr></table>

<center>

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


