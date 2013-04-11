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



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="speechbubbles.css" />	
<script type="text/javascript" src="speechbubbles.js">
</script>


<script type="text/javascript">

jQuery(function($){ //on document.ready
 	//Apply tooltip to links with class="addspeech", plus look inside 'speechdata.txt' for the tooltip markups
	$('a.addspeech').speechbubble({url:''})
})

</script>

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



<table bgcolor="ffffff" width="980" border="1" cellspacing="0" cellpadding="0">
<tr>
<td width="980">








<table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980" valign=top >





<font color="green" size="3">


<br>









<?php


$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$username=$row['user'];
$groupname=$row['groupname'];

}

if($username=="admin"){


?>



<table width="980" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="440" valign=top >

<center>

<table width="400" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="378"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Notification</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>


<table width="400" height="60" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="images/g1.jpg"  >
</td>
<td width="395"  bgcolor="ffffff"  >
<font color="666666" size="3">
<center>
<table width="395" height="60" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="10" height="60" bgcolor="ffffff"  >
<font color="666666">

</td>
<td width="385" height="60" bgcolor="ffffff"  valign=top >
<font color="666666">
Update Available : 0


</td>

</tr>



</table>


</td>
<td width="2"  background="images/g2.jpg"  >
</td>
</tr></table>
<table width="400" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="400"  background="images/g3.jpg">
</td>
</tr></table>
<br><br>



<table width="400" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="378"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Member Statistic</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="400" height="120" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="images/g1.jpg"  >
</td>
<td width="395"  bgcolor="E9E9E9"  >
<font color="666666" size="3">
<center>
<table width="395" height="120" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="195" height="30" bgcolor="E9E9E9"  >
&nbsp;<a href="activate.php"><font color=000000>Member Requests</a>
</td>
<td width="200" height="30" bgcolor="E9E9E9"  >
<a href="activate.php"><font color=000000><?php
$query = "SELECT * FROM dmember WHERE actstatustmp='1' AND actstatus='0' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$rmem=mysql_num_rows($result);
echo $rmem;
}
else
{
echo "0";
}
?></a>
</td>
</tr>

<tr>
<td width="195" height="30" bgcolor="cococo"  >
&nbsp;<a href="member.php"><font color=000000>Active Members</a>
</td>
<td width="200" height="30" bgcolor="cococo"  ><a href="member.php"><font color=000000>
<?php
$query = "SELECT * FROM dmember WHERE actstatustmp='1' AND actstatus='1' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$acmem=mysql_num_rows($result);
echo $acmem;
}
else
{
echo "0";
}
?></a>
</td>
</tr>
<tr>
<td width="195" height="30" bgcolor="E9E9E9"  >
&nbsp;<a href="deactimem.php"><font color=000000>Deactive Members</a>
</td>
<td width="200" height="30" bgcolor="E9E9E9"  ><a href="deactimem.php"><font color=000000>
<?php
$query = "SELECT * FROM dmember WHERE actstatustmp='0' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$demem=mysql_num_rows($result);
echo $demem;
}
else
{
echo "0";
}
?></a>
</td>
</tr>

<tr>
<td width="195" height="30" bgcolor="cococo"  >
&nbsp;Total Members
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php
$query = "SELECT * FROM dmember ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$totmem=mysql_num_rows($result);
echo $totmem;
}
else
{
echo "0";
}
?> 

</td>
</tr>
</table>


</td>
<td width="2"  background="images/g2.jpg"  >
</td>
</tr></table>
<table width="400" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="400"  background="images/g3.jpg">
</td>
</tr></table>
<br><br>








<table width="400" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="388"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Test Statistic</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="400" height="90" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="images/g1.jpg"  >
</td>
<td width="395"  bgcolor="E9E9E9"  >
<font color="666666" size="3">
<center>
<table width="395" height="90" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="195" height="30" bgcolor="E9E9E9"  >
&nbsp;<a href="avail.php"><font color=000000>Active test</a>
</td>
<td width="200" height="30" bgcolor="E9E9E9"  ><a href="avail.php"><font color=000000>
<?php
$query = "SELECT * FROM dtest WHERE status='1' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$atest=mysql_num_rows($result);
echo $atest;
}
else
{
echo "0";
}
?></a>
</td>
</tr>

<tr>
<td width="195" height="30" bgcolor="cococo"  >
&nbsp;<a href="avail.php"><font color=000000>Deactive test</a>
</td>
<td width="200" height="30" bgcolor="cococo"  ><a href="avail.php"><font color=000000>
<?php
$query = "SELECT * FROM dtest WHERE  status='0' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$dtest=mysql_num_rows($result);
echo $dtest;
}
else
{
echo "0";
}
?></a>
</td>
</tr>
<tr>
<td width="195" height="30" bgcolor="E9E9E9"  >
&nbsp;<a href="avail.php"><font color=000000>Total Test</a> 
</td>
<td width="200" height="30" bgcolor="E9E9E9"  ><a href="avail.php"><font color=000000>
<?php
$query = "SELECT * FROM dtest ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$ttest=mysql_num_rows($result);
echo $ttest;
}
else
{
echo "0";
}
?></a>
</td>
</tr>

</table>


</td>
<td width="2"  background="images/g2.jpg"  >
</td>
</tr></table>
<table width="400" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="400"  background="images/g3.jpg">
</td>
</tr></table>
<br><br>






</td>
<td width="50"  >
</td>
<td width="440" valign=top>

<font color="666666" size="3">
<b>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

Result statistics</b><br>
<center>


<?php
include 'importgraphdata.php';
include 'graph.php';
?>


<br>
<br><br>






<table width="400" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="388"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Other Statistic</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>

<table width="400" height="60" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="images/g1.jpg"  >
</td>
<td width="395"  bgcolor="E9E9E9"  >
<font color="666666" size="3">
<center>
<table width="395" height="60" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="195" height="30" bgcolor="E9E9E9"  >
&nbsp;<a href="edit41.php"><font color=000000>Total Groups</a>
</td>
<td width="200" height="30" bgcolor="E9E9E9"  ><a href="edit41.php"><font color=000000>
<?php
$query = "SELECT * FROM dgroup ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$tgroup=mysql_num_rows($result);
echo $tgroup;
}
else
{
echo "0";
}
?></a>
</td>
</tr>

<tr>
<td width="195" height="30" bgcolor="cococo"  >
&nbsp;<a href="edit51.php"><font color=000000>Total Operators</a>
</td>
<td width="200" height="30" bgcolor="cococo"  ><a href="edit51.php"><font color=000000>
<?php
$query = "SELECT * FROM dadmin WHERE user!='admin' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$topr=mysql_num_rows($result);
echo $topr;
}
else
{
echo "0";
}
?></a>
</td>
</tr>


</table>


</td>
<td width="2"  background="images/g2.jpg"  >
</td>
</tr></table>
<table width="400" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="400"  background="images/g3.jpg">
</td>
</tr>
</table>
<br><br>

</td>

</tr>
</table>

<?php
}
?>















 <br> <br>

</td><td width="50"  >
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
