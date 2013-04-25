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




<script type="text/javascript"><!--
    function doAction(val){
        //Forward browser to new url
        window.location='testhistory.php?group=' + val;
    }
--></script>



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








<?php


$search=$_POST['search'];
 $dtest=$_GET['dtest'];
 $group=$_GET['group'];
$delhis=$_GET['delhis'];
$testcode=$_GET['testcode'];

$page=$_GET['page'];
if($page==""){
$page=0;
}
if($page!=""){
if($page<"0"){
$page-=$page;
}
}

$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$username=$row['user'];
$groupname=$row['groupname'];

}





if($username=="admin"){

?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="152"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
<b>Test History</b> &nbsp;&nbsp;&nbsp;&nbsp;
</td>
<form method="post" action="testhistory.php">

<td width="200"  background="images/bgn1.jpg"  >
<select onchange="doAction(this.value);">
<option value="">
Select group</option>
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
</select>


</td></form>
<form method="post" action="testhistory.php">
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




<font color="green" size="3">
<?php


if($dtest!="")
{
mysql_query("DELETE FROM dresult"); 
mysql_query("DELETE FROM danswer"); 
mysql_query("DELETE FROM daoptions"); 
echo "Cleared";
}



if($delhis!="")
{
mysql_query("DELETE FROM dresult WHERE testcode='$testcode' AND user='$delhis'"); 
mysql_query("DELETE FROM danswer WHERE testcode='$testcode' AND userid='$delhis'"); 
mysql_query("DELETE FROM daoptions WHERE testcode='$testcode' AND userid='$delhis'"); 
echo "Cleared";
}








if($group!="")
{


$query="SELECT * FROM dresult WHERE groupname='$group' ORDER BY date DESC LIMIT $page, 10 "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="170"><font color="666666"><center>Date / Time</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Result</td>
<td background="images/bgn21.jpg" height="35"  width="90"><font color="666666"><center>Delete</td>
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
<td><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['user'];?></a></td>
<td><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['testname'];?></a></td>
<td><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['date'];?></a></td>
<td><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['result'];?></a></td>
<td><a href="testhistory.php?testcode=<?php echo $row['testcode'] ;?>&delhis=<?php echo $row['user'] ;?>"><img src="images/delete.png" border=0></a>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }

?>
</table><br><font color=666666 size=3>
<?php


$query="SELECT * FROM dresult WHERE groupname='$group' "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);

$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="testhistory.php?page=0&group=<?php echo $group;?>" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="testhistory.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>&group=<?php echo $group;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Results ";

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
<a href="testhistory.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>&group=<?php echo $group;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="testhistory.php?page=<?php echo $plast;?>&group=<?php echo $group;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}








}




if($search!="")
{


$query="SELECT * FROM dresult WHERE groupname='$search' OR testname='$search' OR user='$search'  ORDER BY date DESC LIMIT 10 "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="170"><font color="666666"><center>Date / Time</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Result</td>
<td background="images/bgn21.jpg" height="35"  width="90"><font color="666666"><center>Delete</td>
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
<td> <a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['user'];?></a></td>
<td> <a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['testname'];?></a></td>
<td> <a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['date'];?></a></td>
<td> <a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><?php echo $row['result'];?></a></td>
<td><center><a href="testhistory.php?testcode=<?php echo $row['testcode'] ;?>&delhis=<?php echo $row['user'] ;?>"><img src="images/delete.png" border=0></a>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }

?>
</table>


<?php





}



}
?>






<?php

if($username!="admin"){

?>
<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="352"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
<b>Test History</b> &nbsp;&nbsp;&nbsp;&nbsp;
</td>
<form method="post" action="testhistory.php">

<td width="200"  background="images/bgn1.jpg"  >
<select onchange="doAction(this.value);">
<option value="">
Select group</option>
<option value="<?php echo $groupname;?>"><?php
echo $groupname; ?></option>

</select>


</td></form>
<form method="post" action="testhistory.php">
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




<font color="green" size="3">
<?php


if($dtest!="")
{
mysql_query("DELETE FROM dresult"); 
mysql_query("DELETE FROM danswer"); 
mysql_query("DELETE FROM daoptions"); 
echo "Cleared";
}



if($delhis!="")
{
mysql_query("DELETE FROM dresult WHERE testcode='$testcode' AND user='$delhis'"); 
mysql_query("DELETE FROM danswer WHERE testcode='$testcode' AND userid='$delhis'"); 
mysql_query("DELETE FROM daoptions WHERE testcode='$testcode' AND userid='$delhis'"); 
echo "Cleared";
}



if($group!="")
{


$query="SELECT * FROM dresult WHERE groupname='$groupname' ORDER BY date DESC LIMIT $page, 10 "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="170"><font color="666666"><center>Date / Time</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Result</td>
<td background="images/bgn21.jpg" height="35"  width="90"><font color="666666"><center>Delete</td>
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
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666" size=3><center><?php echo $row['user'];?></a></td>
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><center><?php echo $row['testname'];?></a></td>
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><center><?php echo $row['date'];?></a></td>
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><center><?php echo $row['result'];?></a></td>
<td><center><a href="testhistory.php?testcode=<?php echo $row['testcode'] ;?>&delhis=<?php echo $row['user'] ;?>"><img src="images/delete.png" border=0></a>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }

?>
</table><br><font color=666666 size=3>
<?php


$query="SELECT * FROM dresult WHERE groupname='$groupname' "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);

$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="testhistory.php?page=0&group=<?php echo $groupname;?>" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="testhistory.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>&group=<?php echo $groupname;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Results ";

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
<a href="testhistory.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>&group=<?php echo $groupname;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="testhistory.php?page=<?php echo $plast;?>&group=<?php echo $groupname;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}








}




if($search!="")
{


$query="SELECT * FROM dresult WHERE groupname='$search' OR testname='$search' OR user='$search'  ORDER BY date DESC LIMIT 10 "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="170"><font color="666666"><center>Date / Time</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Result</td>
<td background="images/bgn21.jpg" height="35"  width="90"><font color="666666"><center>Delete</td>
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
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666" size=3><center><?php echo $row['user'];?></a></td>
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><center><?php echo $row['testname'];?></a></td>
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><center><?php echo $row['date'];?></a></td>
<td><center><a href="result.php?testcode=<?php echo $row['testcode'] ;?>&member=<?php echo $row['user'] ;?>"><font color="666666"><center><?php echo $row['result'];?></a></td>
<td><center><a href="testhistory.php?testcode=<?php echo $row['testcode'] ;?>&delhis=<?php echo $row['user'] ;?>"><img src="images/delete.png" border=0></a>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }

?>
</table>
<?php





}



}

?>









<br><br>
<a href="testhistory.php?dtest=clear">
<font color="990000" size="3"><u>Clear All Test History</u>
</a>




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


