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
<?php echo $title;?>

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

<td width="50"  >
</td>
<td width="930" valign=top >





<font color="green" size="3">


<?php

$dtestcode=$_GET['dtestcode'];
$testcode=$_GET['testcode'];
$vall=$_GET['vall'];
$search=$_POST['search'];


$status=$_GET['status'];






if($_POST['delctest']>""){
foreach($_POST['delctest'] as $key => $delctest){
if($dtestcode!="809354"){
mysql_query("DELETE FROM dquestions WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM dtest WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM doptions WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM daoptions WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM dresult WHERE testcode='$delctest' ");


$query = "SELECT * FROM dimages WHERE testcode='$delctest' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$imageaddress=$row['imageaddress'];

$dlimg=unlink($imageaddress);
}
 
mysql_query("DELETE FROM dimages WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM danswer WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM dpoll WHERE testcode='$delctest' "); 
mysql_query("DELETE FROM dvote WHERE testcode='$delctest' "); 


}
}
echo "Tests removed successfully!";

}




if($dtestcode!="")
{
if($dtestcode!="809354"){
mysql_query("DELETE FROM dquestions WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM dtest WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM doptions WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM daoptions WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM dresult WHERE testcode='$dtestcode' ");


$query = "SELECT * FROM dimages WHERE testcode='$dtestcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$imageaddress=$row['imageaddress'];

$dlimg=unlink($imageaddress);
}
 
mysql_query("DELETE FROM dimages WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM danswer WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM dpoll WHERE testcode='$dtestcode' "); 
mysql_query("DELETE FROM dvote WHERE testcode='$dtestcode' "); 

echo "Removed";
}
else
{
echo "<font color=red >You can't delete by default created test. <br>create new test and then try this function.";
}
}


echo "<font color=green size=3 >";

if($status!="")
{
if($status=="1"){

mysql_query("UPDATE dtest SET status='$status' WHERE testcode='$testcode' ");

echo "Enabled";
}
if($status=="0"){

mysql_query("UPDATE dtest SET status='$status' WHERE testcode='$testcode' ");

echo "Disabled";
}


}
?>




<?php

$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$username=$row['user'];
$groupname=$row['groupname'];
}
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

if($search==""){

?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
<b>Available test</b> &nbsp;&nbsp;&nbsp;&nbsp;
</td>
<form method="post" action="avail.php">
<td width="186"  background="images/bgn1.jpg" valign=center>
<input type="text" name="search" size="25" value="Search" onclick="this.value='';">
</td>
<td width="20"  background="images/bgn1.jpg" >
<input type="image" src="images/search.jpg" alt="Submit button">
</td></form>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>

<form method="post" action="avail.php">

<?php

$query="SELECT * FROM dtest WHERE type='test'  ORDER BY date DESC LIMIT $page, 10 "; 
$result=mysql_query($query);
?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35" width="30"><font id="font2">&nbsp;&nbsp;</font></td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Questions</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Max. marks</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Time</td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Group</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Edit</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Delete</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Status</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>
</tr>
<?php
while($row = mysql_fetch_array($result))
{
?>
<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
<td ><center></td>
<td ><center><input type="checkbox" name="delctest[]" value="<?php echo $row['testcode']; ?>" ></center></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['testname'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['totalquestions'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['maxmar'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['ti'];?> Min.</a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['groupname'];?></a></td>
<td ><center><font color=666666><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color="990000" size="3"><img src="images/edit.png" border="0"></a> </td>
<td ><center><font color=666666><a href="avail.php?dtestcode=<?php echo $row['testcode']; ?>">
<font color="990000" size="3"><img src="images/delete.png" border="0"></a> </td>
<td ><center>

<?php if($row['status']=="1"){?>
<font color=666666><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=0">
<font color="990000" size="3"><font color=maroon size=3>Enabled</a> 
<?php
}
if($row['status']=="0"){?>
  <a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=1">
<font color="990000" size="3"><font color=maroon size=3>Disabled</a> 
<?php
}
?></td><td ><center></td>

</tr>

<?php

}


?>
</table>
<br><font color="666666" size="3">

<?php


$query="SELECT * FROM dtest "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);
$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="avail.php?page=0" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="avail.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Test ";

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
<a href="avail.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="avail.php?page=<?php echo $plast;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}

?>

<input type="submit" value="Delete Selected">
</form>











<?php
}

if($search!=""){
?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
Search for <b>
<?php echo $search;?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Result found <b>

<?php
$query="SELECT * FROM dtest WHERE testname='$search' OR testcode='$search' OR totalquestions='$search' OR groupname='$search' OR date='$search' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$resultfound=mysql_num_rows($result);
echo $resultfound;
}?>
</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="avail.php"><font color="666666" size="3">Back</a>



</td><form method="post" action="avail.php">
<td width="186"  background="images/bgn1.jpg" valign=center>

<input type="text" name="search" size="25"  value="Search again!" onclick="this.value='';">
</td>
<td width="20"  background="images/bgn1.jpg" >
<input type="image" src="images/search.jpg" alt="Submit button">

</td></form>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>

<?php
$query="SELECT * FROM dtest WHERE testname='$search' OR testcode='$search' OR totalquestions='$search' OR groupname='$search' OR date='$search' ";
$result=mysql_query($query);
?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Questions</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Max. marks</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Time</td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Group</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Edit</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Delete</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Status</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>
</tr>
<?php
while($row = mysql_fetch_array($result))
{
?>
<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
<td ><center></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['testname'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['totalquestions'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['maxmar'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['ti'];?> Min.</a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['groupname'];?></a></td>
<td ><center><font color=666666><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color="990000" size="3"><img src="images/edit.png" border="0"></a> </td>
<td ><center><font color=666666><a href="avail.php?dtestcode=<?php echo $row['testcode']; ?>">
<font color="990000" size="3"><img src="images/delete.png" border="0"></a> </td>
<td ><center>

<?php if($row['status']=="1"){?>
<font color=666666><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=0">
<font color="990000" size="3"><font color=maroon size=3>Enabled</a> 
<?php
}
if($row['status']=="0"){?>
  <font color=666666><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=1">
<font color="990000" size="3"><font color=maroon size=3>Disabled</a> 
<?php
}
?></td><td ><center></td>

</tr>

<?php

}
?>
</table>
<br><br>

<?php
}

}

















if($username!="admin"){

if($search==""){

?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
<b>Available test</b> &nbsp;&nbsp;&nbsp;&nbsp;
</td>
<form method="post" action="avail.php">
<td width="186"  background="images/bgn1.jpg" valign=center>
<input type="text" name="search" size="25" value="Search" onclick="this.value='';">
</td>
<td width="20"  background="images/bgn1.jpg" >
<input type="image" src="images/search.jpg" alt="Submit button">
</td></form>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br><form method="post" action="avail.php">

<?php

$query="SELECT * FROM dtest WHERE type='test' AND groupname='$groupname' ORDER BY date DESC LIMIT $page, 10 "; 
$result=mysql_query($query);
?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35" width="30"><font id="font2">&nbsp;&nbsp;</font></td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Questions</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Max. marks</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Time</td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Group</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Edit</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Delete</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Status</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>
</tr>
<?php
while($row = mysql_fetch_array($result))
{
?>
<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
<td ><center></td>
<td ><center><input type="checkbox" name="delctest[]" value="<?php echo $row['testcode']; ?>" ></center></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font colo=666666><?php echo $row['testname'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font colo=666666><?php echo $row['totalquestions'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['maxmar'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['ti'];?> Min.</a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font colo=666666><?php echo $row['groupname'];?></a></td>
<td ><center><font colo=666666><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color="990000" size="3"><img src="images/edit.png" border="0"></a> </td>
<td ><center><font colo=666666><a href="avail.php?dtestcode=<?php echo $row['testcode']; ?>">
<font color="990000" size="3"><img src="images/delete.png" border="0"></a> </td>
<td ><center>

<?php if($row['status']=="1"){?>
<center><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=0">
<font color="990000" size="3"><font color=maroon size=3>Enabled</a> 
<?php
}
if($row['status']=="0"){?>
  <center><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=1">
<font color="990000" size="3"><font color=maroon size=3>Disabled</a> 
<?php
}
?></td><td ><center></td>

</tr>

<?php

}


?>
</table>
<br><font color="666666" size="3">

<?php


$query="SELECT * FROM dtest WHERE groupname='$groupname' "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);
$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="avail.php?page=0" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="avail.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Test ";

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
<a href="avail.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="avail.php?page=<?php echo $plast;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}

?>




<input type="submit" value="Delete Selected">
</form>









<?php
}

if($search!=""){
?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
Search for <b>
<?php echo $search;?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Result found <b>

<?php
$query="SELECT * FROM dtest WHERE groupname='$groupname' AND testname='$search' OR testcode='$search' OR totalquestions='$search' OR groupname='$search' OR date='$search' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$resultfound=mysql_num_rows($result);
echo $resultfound;
}?>
</b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="avail.php"><font color="666666" size="3">Back</a>



</td><form method="post" action="avail.php">
<td width="186"  background="images/bgn1.jpg" valign=center>

<input type="text" name="search" size="25"  value="Search again!" onclick="this.value='';">
</td>
<td width="20"  background="images/bgn1.jpg" >
<input type="image" src="images/search.jpg" alt="Submit button">

</td></form>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>

<?php
$query="SELECT * FROM dtest WHERE testname='$search' OR testcode='$search' OR totalquestions='$search' OR groupname='$search' OR date='$search' ";
$result=mysql_query($query);
?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Questions</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Max. marks</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Time</td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Group</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Edit</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Delete</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Status</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>
</tr>
<?php
while($row = mysql_fetch_array($result))
{
?>
<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
<td ><center></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font colo=666666><?php echo $row['testname'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font colo=666666><?php echo $row['totalquestions'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['maxmar'];?></a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color=666666><?php echo $row['ti'];?> Min.</a></td>
<td ><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font colo=666666><?php echo $row['groupname'];?></a></td>
<td ><center><font colo=666666><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>"><font color="990000" size="3"><img src="images/edit.png" border="0"></a> </td>
<td ><center><font colo=666666><a href="avail.php?dtestcode=<?php echo $row['testcode']; ?>">
<font color="990000" size="3"><img src="images/delete.png" border="0"></a> </td>
<td ><center>

<?php if($row['status']=="1"){?>
<center><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=0">
<font color="990000" size="3"><font color=maroon size=3>Enabled</a> 
<?php
}
if($row['status']=="0"){?>
  <center><a href="avail.php?testcode=<?php echo $row['testcode']; ?>&status=1">
<font color="990000" size="3"><font color=maroon size=3>Disabled</a> 
<?php
}
?></td><td ><center></td>

</tr>

<?php

}
?>
</table>
<br><br>

<?php
}

}
?>
















 <br> <br>

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


<br><br>

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
