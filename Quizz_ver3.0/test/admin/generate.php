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
Generate

</title>
</head>

<body bgcolor="#ffffff" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">




<?php

$reportgroup=$_POST['reportgroup'];
$reporttest=$_POST['reporttest'];




?>



<br>
<table width="886" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="800"  background="images/bgn1.jpg"  >
<font color="666666" size="3">
Report generated for <?php if($reportgroup!=""){ echo "Group ";   echo "<b>".$reportgroup."</b>"; }?>, <?php if($reporttest!=""){ 
$query = "SELECT * FROM dtest ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$testname=$row['testname'];
}


echo "Test Name "; echo "<b>".$testname."</b>"; }?>
</td><td width="64"  background="images/bgn1.jpg"  >

<a href="#" onclick="javascript:window.print();"><font color="666666">Print</a>

</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>







<table border="0" bordercolor="990000">
<tr>
<td background="images/bgn22.jpg" height="35" width="1"></td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>User</td>
<td background="images/bgn21.jpg" height="35" width="170"><font color="666666"><center>Date / Time</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Test Name</td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>Total Questions</td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>Maximum Marks</td>
<td background="images/bgn21.jpg" height="35"  width="120"><font color="666666"><center>Obtained Marks</td>
<td background="images/bgn21.jpg" height="35"  width="100"><font color="666666"><center>Result</td>
<td background="images/bgn23.jpg" height="35" width="1"></td>

</tr>

<?php
if($reportgroup!="" AND $reporttest==""){
$query="SELECT * FROM dresult WHERE groupname='$reportgroup' ORDER BY date DESC "; 
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
 {
?>
<tr onMouseOver="this.bgColor = '#ffffcc'"
    onMouseOut ="this.bgColor = '#ffffff'"
    bgcolor="#ffffff">
<td ><center></td>
<td><font color="666666"><center><?php echo $row['user'];?></td>
<td><font color="666666"><center><?php echo $row['date'];?></td>
<td><font color="666666"><center><?php echo $row['testname'];?></td>
<td><font color="666666"><center><?php echo $row['totalquestions'];?></td>
<td><font color="666666"><center><?php echo $row['maxmar'];?></td>
<td><font color="666666"><center><?php echo $row['cans'];?></td>
<td><font color="666666"><center><?php echo $row['result'];?></td>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }
}

if($reportgroup=="" AND $reporttest!=""){
$query="SELECT * FROM dresult WHERE testcode='$reporttest' ORDER BY date DESC "; 
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
 {
?>
<tr onMouseOver="this.bgColor = '#ffffcc'"
    onMouseOut ="this.bgColor = '#ffffff'"
    bgcolor="#ffffff">
<td ><center></td>
<td><font color="666666"><center><?php echo $row['user'];?></td>
<td><font color="666666"><center><?php echo $row['date'];?></td>
<td><font color="666666"><center><?php echo $row['testname'];?></td>
<td><font color="666666"><center><?php echo $row['totalquestions'];?></td>
<td><font color="666666"><center><?php echo $row['maxmar'];?></td>
<td><font color="666666"><center><?php echo $row['cans'];?></td>
<td><font color="666666"><center><?php echo $row['result'];?></td>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }
}


if($reportgroup!="" AND $reporttest!=""){
$query="SELECT * FROM dresult WHERE testcode='$reporttest' AND groupname='$reportgroup' ORDER BY date DESC "; 
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
 {
?>
<tr onMouseOver="this.bgColor = '#ffffcc'"
    onMouseOut ="this.bgColor = '#ffffff'"
    bgcolor="#ffffff">
<td ><center></td>
<td><font color="666666"><center><?php echo $row['user'];?></td>
<td><font color="666666"><center><?php echo $row['date'];?></td>
<td><font color="666666"><center><?php echo $row['testname'];?></td>
<td><font color="666666"><center><?php echo $row['totalquestions'];?></td>
<td><font color="666666"><center><?php echo $row['maxmar'];?></td>
<td><font color="666666"><center><?php echo $row['cans'];?></td>
<td><font color="666666"><center><?php echo $row['result'];?></td>
</td>
<td ><center></td>
  <?php echo "</tr>";

  }
}




?>
</table>
<br><br>


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


