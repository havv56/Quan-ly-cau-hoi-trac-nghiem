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
<?php echo $title;?>

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

<table align="center" width="100%" height=330 border="0" cellspacing="0" cellpadding="0">
<tr>


<td width="150"  valign=top >
<?php
include 'menu.php';
?>



</td><td width="100"  >
</td>

<td width="730" valign=top >








<font color="666666" size="3">


<font color="green" size="3">


<?php

$testcode=$_GET['testcode'];


include 'dbc.php';

$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$user=$row['user'];


}











mysql_query("DELETE FROM daoptions WHERE testcode='809354' "); 
mysql_query("DELETE FROM dresult WHERE testcode='809354' ");
mysql_query("DELETE FROM danswer WHERE testcode='809354' ");





$query = "SELECT * FROM dresult WHERE user='$user' AND testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
{


$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {



?>



<br>

<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="558"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Test Detail</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table><br>







<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >


				
<tr>
<th width="170" bgcolor="990000"><font color="ffffff" size="3">
Test Name: </th>
					

<td>&nbsp;&nbsp; <?php echo $row['testname'];?>

</td>
</tr>






<tr>
<th width="170" bgcolor="990000"><font color="ffffff" size="3">
Total Questions: </th>
					
<td>&nbsp;&nbsp;  <?php echo $row['totalquestions'];?>
</td>
</tr>







<tr>
<th width="170" bgcolor="990000"><font color="ffffff" size="3">
Total Marks: </th>
<td>&nbsp;&nbsp;  <?php echo $row['maxmar'];?>

</td>
</tr>





<tr>
<th width="170" bgcolor="990000"><font color="ffffff" size="3">
Pass Marks: </th>
<td>&nbsp;&nbsp;  <?php echo $row['pass'];?> %

</td>
</tr>






<tr>
<th width="170" bgcolor="990000"><font color="ffffff" size="3">
Time: </th>
					
<td>&nbsp;&nbsp; <?php echo $row['ti'];?> Minutes</td>
				</tr>





</td>
</table>




<br>

<font color="990000" size="3">Description:<br>

<font color="666666" size="3">

<?php echo $row['description']; ?>



<hr>



<br>



<table width="100" border="1" cellspacing="0" cellpadding="0">
<tr><td  background="admin/images/t1.png"   width=100 ><center>


<a href="taketest2.php?testcode=<?php echo $testcode;?>&qno=1&testend=0"><b>
<font color="990000" size="3">Start Test</center></b>
</a>


</td>

</tr></table>







<br><br>

<?php
}

}



$query = "SELECT * FROM dresult WHERE user='$user' AND testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{


?>
<br>


<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="558"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Notification</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>
<table width="580" height="60" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="admin/images/g1.jpg"  >
</td>
<td width="575"  bgcolor="ffffff"  >
<font color="666666" size="3">
<center>
<table width="575" height="60" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="575" height="60" bgcolor="ffffff"  >
<font color="red">
You already appeared from this test.
</td>

</tr>



</table>


</td>
<td width="2"  background="admin/images/g2.jpg"  >
</td>
</tr></table>
<table width="580" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="580"  background="admin/images/g3.jpg">
</td>
</tr></table>
<br><br>


<?php

}








?>


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