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
Edit Test

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






<?php


@$deleteqno=$_GET['deleteqno'];

@$testcode=$_GET['testcode'];

@$odr=$_GET['odr'];

@$reqno=$_GET['reqno'];


if($odr!=""){


if($odr=="1"){

$reqno2=$reqno;
$reqno2-=1;


mysql_query("UPDATE dquestions SET qno='tmp' WHERE testcode='$testcode' AND qno='$reqno2' ");

mysql_query("UPDATE dimages SET qno='tmp' WHERE testcode='$testcode' AND qno='$reqno2' ");

mysql_query("UPDATE doptions SET qno='tmp' WHERE testcode='$testcode' AND qno='$reqno2' ");


mysql_query("UPDATE dquestions SET qno='$reqno2' WHERE testcode='$testcode' AND qno='$reqno' ");

mysql_query("UPDATE dimages SET qno='$reqno2' WHERE testcode='$testcode' AND qno='$reqno' ");

mysql_query("UPDATE doptions SET qno='$reqno2' WHERE testcode='$testcode' AND qno='$reqno' ");



mysql_query("UPDATE dquestions SET qno='$reqno' WHERE testcode='$testcode' AND qno='tmp' ");

mysql_query("UPDATE dimages SET qno='$reqno' WHERE testcode='$testcode' AND qno='tmp' ");

mysql_query("UPDATE doptions SET qno='$reqno' WHERE testcode='$testcode' AND qno='tmp' ");


}




if($odr=="2"){

$reqno2=$reqno;
$reqno2+=1;


mysql_query("UPDATE dquestions SET qno='tmp' WHERE testcode='$testcode' AND qno='$reqno2' ");

mysql_query("UPDATE dimages SET qno='tmp' WHERE testcode='$testcode' AND qno='$reqno2' ");

mysql_query("UPDATE doptions SET qno='tmp' WHERE testcode='$testcode' AND qno='$reqno2' ");


mysql_query("UPDATE dquestions SET qno='$reqno2' WHERE testcode='$testcode' AND qno='$reqno' ");

mysql_query("UPDATE dimages SET qno='$reqno2' WHERE testcode='$testcode' AND qno='$reqno' ");

mysql_query("UPDATE doptions SET qno='$reqno2' WHERE testcode='$testcode' AND qno='$reqno' ");



mysql_query("UPDATE dquestions SET qno='$reqno' WHERE testcode='$testcode' AND qno='tmp' ");

mysql_query("UPDATE dimages SET qno='$reqno' WHERE testcode='$testcode' AND qno='tmp' ");

mysql_query("UPDATE doptions SET qno='$reqno' WHERE testcode='$testcode' AND qno='tmp' ");


}







}



if($deleteqno!=""){

$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];
$maxmar=$row['maxmar'];

}


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$deleteqno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$m=$row['m'];

}


$maxmar-=$m;

mysql_query("DELETE FROM dquestions WHERE testcode='$testcode' AND qno='$deleteqno' ");

mysql_query("DELETE FROM doptions WHERE testcode='$testcode' AND qno='$deleteqno' ");



$query = "SELECT * FROM dimages WHERE testcode='$testcode' AND qno='$deleteqno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$imageaddress=$row['imageaddress'];

$dlimg=unlink($imageaddress);
}


mysql_query("DELETE FROM dimages WHERE testcode='$testcode' AND qno='$deleteqno' ");



mysql_query("UPDATE dquestions SET qno=qno-1 WHERE testcode='$testcode' AND qno > $deleteqno ");


mysql_query("UPDATE dimages SET qno=qno-1 WHERE testcode='$testcode' AND qno > $deleteqno ");

mysql_query("UPDATE doptions SET qno=qno-1 WHERE testcode='$testcode' AND qno > $deleteqno ");


mysql_query("UPDATE dtest SET maxmar='$maxmar' WHERE testcode='$testcode' ");


$totalquestions-=1;

mysql_query("UPDATE dtest SET totalquestions='$totalquestions' WHERE testcode='$testcode' ");


echo "<font color=green>Removed</font>";

}

?>

<br>





<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Edit Test</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>


<br>

<?php


$query="SELECT * FROM dtest WHERE testcode='$testcode'"; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35" width="120"><font color="666666"><center>Total Ques.</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Max. marks</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>% Required</td>
<td background="images/bgn21.jpg" height="35" width="100"><font color="666666"><center>Time</td>
<td background="images/bgn21.jpg" height="35" width="180"><font color="666666"><center>Assigned to Group</td>
<td background="images/bgn21.jpg" height="35" width="80"><font color="666666"><center>Edit</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>

</tr>

<?php

while($row = mysql_fetch_array($result))

 {




?>
<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
 <?php

  echo "<td><center></td>";?>

 
<td><center>
<a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><?php echo $row['testname']; ?></a></td>
  

 <td><center>
<a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><?php echo $row['totalquestions'];?></a></td>


 <td><center>
<a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><?php echo $row['maxmar'];?></a></td>
 <td><center>
<a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><?php echo $row['pass'];?>%</a></td>
 <td><center>
<a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><?php echo $row['ti'];?> Min.</a></td>


 <td><center>
<a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><?php echo $row['groupname'];?></a></td>

  <td>


  <center><a href="edittest.php?testcode=<?php echo $row['testcode'];?>">
<font color="666666" size="3"><img src="images/edit.png" alt=edit border="0"></a> 

<?php

echo "</td><td><center></td>";

echo "</tr>";

  }




?>



<?php

$query = "SELECT * FROM dquestions WHERE testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$rown=mysql_num_rows($result);
}

$query="SELECT * FROM dquestions WHERE testcode='$testcode' ORDER BY ABS(qno) ASC "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<th bgcolor="000000" width="50"><font color="ffffff">Q no.</th>
<th bgcolor="000000" width="410"><font color="ffffff">Question</th>
<th bgcolor="000000" width="80"><font color="ffffff">Ques. type</th>
<th bgcolor="000000" width="50"><font color="ffffff">edit</th>
<th bgcolor="000000" width="70"><font color="ffffff">Delete</th>
<th bgcolor="000000" width="80"><font color="ffffff">Re-Order</th>

</tr>

<?php

while($row = mysql_fetch_array($result))

 {

?>
<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
 <?php

  echo "<td >";?>
<center><?php echo $row['qno'];?></td>

  <td > &nbsp;&nbsp;&nbsp;&nbsp;
<?php $ques=$row['ques']; $sques=substr($ques, 0, 120 ) . '...'; $ssques=strip_tags($sques); echo $ssques; ?>

</td>

 <td ><center><?php if($row['ans']==""){echo "Optional";} if($row['ans']>''){echo "Text field";} ?> </td>
  <td ><center>

  <center><a href="editques.php?testcode=<?php echo $row['testcode'];?>&qno=<?php echo $row['qno'];?>">
<font color="990000" size="3"><img src="images/edit.png"  border="0"></a> 

</td><td >

  <center><a href="edittest0.php?testcode=<?php echo $row['testcode'];?>&deleteqno=<?php echo $row['qno'];?>">
<font color="990000" size="3"><img src="images/delete.png"  border="0"></a> 

<?php

echo "</td><td ><center>";?>

  <center><?php $qc=$row['qno']; if($qc!="1"){?>
<a href="edittest0.php?testcode=<?php echo $row['testcode'];?>&reqno=<?php echo $row['qno'];?>&odr=1">
<font color="990000" size="3"><img src="images/up.jpg" width="17" height="23" alt=up border="0"></a>
<?php
}
if($qc=="1")
{?>
&nbsp;&nbsp;&nbsp;
<?php
}

if($qc!=$rown){

?>
<a href="edittest0.php?testcode=<?php echo $row['testcode'];?>&reqno=<?php echo $row['qno'];?>&odr=2">
<font color="990000" size="3"><img src="images/dwn.jpg" width="17" height="23" alt=up border="0"></a> 

<?php
}
if($qc==$rown){
?>
&nbsp;&nbsp;&nbsp;
<?php
}

echo "</td>";

echo "</tr>";

  }




?>







<br>










</td>
</tr></table>


<br><?php


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$rown=mysql_num_rows($result);
}

$rown+=1;
?>


<font color="666666" size=3>
<a href="editques2.php?testcode=<?php echo $testcode;?>&qno=<?php echo $rown;?>&qty=1">
<img src="images/addques.jpg" border="0"></a>

&nbsp;
<a href="importquestion.php?testcode=<?php echo $testcode;?>" ><img src="images/impques.jpg" border="0"></a>
&nbsp;


<a href="avail.php"><img src="images/back.jpg" border="0"></a>
&nbsp;
&nbsp;

<a href="sample_excel.zip" target="new"><font color="red" size="3">Download sample excel file</font></a>


<br><br>
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

