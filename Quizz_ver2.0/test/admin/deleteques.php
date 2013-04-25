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

<table width="980" height="60" bgcolor="ffffff"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980" valign=top >
<img src="<?php echo $banner;?>" >


</td>
</tr></table>
 
<table width="980" height="20" bgcolor="ff6600"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980"  >
<font color="ffffff" size="3">
&nbsp;<?php echo $title;?>

</td>
</tr></table>


<table bgcolor="ffffff" width="980"  border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="980"  >








<table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>


<td width="100"  >
</td>
<td width="880" valign=top >













<?php

$eqno=$_GET['eqno'];

$testcode=$_GET['testcode'];



$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];

$a=$row['speed_limit'];
$b=$row['crossroads'];
$c=$row['traffic_marks'];
$d=$row['traffic_situations'];
$e=$row['traffic_patrolman'];
$f=$row['alltype'];


}


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$eqno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$sub=$row['sub'];

}


mysql_query("DELETE FROM dquestions WHERE testcode='$testcode' AND qno='$eqno' ");




mysql_query("UPDATE dquestions SET qno=qno-1 WHERE testcode='$testcode' AND qno > $eqno ");

$totalquestions-=1;

mysql_query("UPDATE dtest SET totalquestions='$totalquestions' WHERE testcode='$testcode' ");

if($sub=="speed_limit"){

$a-=1;
mysql_query("UPDATE dtest SET  speed_limit='$a' WHERE testcode='$testcode' ");


}



if($sub=="traffic_situations"){


$d-=1;
mysql_query("UPDATE dtest SET  traffic_situations='$d' WHERE testcode='$testcode' ");


}


if($sub=="crossroads"){

$b-=1;
mysql_query("UPDATE dtest SET  crossroads='$b' WHERE testcode='$testcode' ");

}


if($sub=="traffic_marks"){

$c-=1;
mysql_query("UPDATE dtest SET  traffic_marks='$c' WHERE testcode='$testcode' ");


}


if($sub=="traffic_patrolman"){
$e-=1;

mysql_query("UPDATE dtest SET  traffic_patrolman='$e' WHERE testcode='$testcode' ");


}



if($sub=="alltype"){

$f-=1;
mysql_query("UPDATE dtest SET  alltype='$f' WHERE testcode='$testcode' ");


}

?>



<br><br>
<font color="green" size="3">Question Deleted.<br>
</font>
<font color="666666" size="3">Please wait Redirecting......<br>

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
