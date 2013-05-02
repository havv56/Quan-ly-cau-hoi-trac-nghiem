<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dmember WHERE id='$id' ";
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
Test History

</title>
</head>

<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<center>

<table width="980" height="60" bgcolor="ffffff"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980" valign=top >
<img src="admin/<?php echo $banner;?>" >


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


<table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>


<td width="150"  valign=top >
<?php
include 'menu.php';
?>
<?php


@$page=$_GET['page'];
if($page==""){
$page=0;
}
if($page!=""){
if($page<"0"){
$page-=$page;
}
}

?>



</td><td width="100"  >
</td>

<td width="730" valign=top ><br>




<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="558"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Test History</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table><br>






<?php

$query = "SELECT user FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$user=$row['user'];
}


$query="SELECT * FROM dresult WHERE user='$user' ORDER BY date DESC LIMIT $page, 10 "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="admin/images/bgn22.jpg" height="35" width="1"></td>
<td background="admin/images/bgn21.jpg" width="150"><font color="666666"><center>Test Name</td>
<td background="admin/images/bgn21.jpg" width="150"><font color="666666"><center>Qustions</td>
<td background="admin/images/bgn21.jpg" width="180"><font color="666666"><center>Date/time</td>
<td background="admin/images/bgn21.jpg" width="180"><font color="666666"><center>Result</td>
<td background="admin/images/bgn23.jpg" height="35" width="1"></td>

</tr>

<?php

while($row = mysql_fetch_array($result))

 {


?>
<tr  onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc"><td ><center></td>

<td ><a href="result.php?testcode=<?php echo $row['testcode'] ;?>">
<font color="666666" size="3"><center><?php echo $row['testname'];?></center></a></td>
<td ><a href="result.php?testcode=<?php echo $row['testcode'] ;?>">
<font color="666666" size="3"><center><?php echo $row['totalquestions'];?></center></a></td>
<td ><a href="result.php?testcode=<?php echo $row['testcode'] ;?>">
<font color="666666" size="3"><center><?php echo $row['date'];?></center></a></td>
<td ><a href="result.php?testcode=<?php echo $row['testcode'] ;?>">
<font color="666666" size="3"><center><?php echo $row['result'];?></center></a><?php
echo "</td><td ><center></td>";

echo "</tr>";

  }

?>







</table><br><font color=666666 size=3>
<?php


$query="SELECT * FROM dresult WHERE user='$user' "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);

$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="testhistory.php?page=0" ><font color="666666" size="3"><img src="admin/images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="testhistory.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>" ><font color="666666" size="3"><img src="admin/images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
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
<a href="testhistory.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>" ><font color="666666" size="3"><img src="admin/images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="testhistory.php?page=<?php echo $plast;?>" ><font color="666666" size="3"><img src="admin/images/plast.jpg" border="0" title="Last"></a>
<?php
}

}

?><br><br>

<a href="account.php"><img src="admin/images/graph_icon.jpg" border="0" width="80" height="80"><font color="666666" size="3">View Bar-Graph of previous result</a>
<br><br>

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

