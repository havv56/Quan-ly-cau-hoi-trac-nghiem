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


<table align="center" width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>


<td width="150"  valign=top >
<?php
include 'menu.php';
?>



</td><td width="100"  >
</td>

<td width="730" valign=top ><br>







<?php

$testcode=$_GET['testcode'];
$testend=$_GET['testend'];

$query = "SELECT user FROM dmember WHERE id='$id' ";
   $result = mysql_query($query);         
while($row = mysql_fetch_array($result))
{
$user=$row['user'];
}

if($testend=="1"){

$query = "SELECT * FROM dresult WHERE testcode='$testcode' AND user='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))
{
$cans=$row['cans'];
$maxmar=$row['maxmar'];
}

if($cans>=1){
$aper=$cans/$maxmar;
$aper=$aper*100;
if($aper!="100"){
$aper=substr($aper, 0, 2 );
}
else{
$aper=100;
}
}
else
{
$aper=0;
}


mysql_query("UPDATE dresult SET tob='$aper' WHERE user='$user' AND testcode='$testcode' "); 



}

include 'dbc.php';

$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {


$name=$row['name'];

$user=$row['user'];


}




?>








<?php







$query = "SELECT * FROM dresult WHERE user='$user' AND testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {

$testcode=$row['testcode'];
$date=$row['date'];
$cans=$row['cans'];
$starttime=$row['starttime'];
$lasttime=$row['lasttime'];
$sresult=$row['result'];

}


$time1 = $starttime;
$time2 = $lasttime;
 

$t1=explode(':',$time1);
$t2=explode(':',$time2);

$ta1=$t1[0];
$tb1=$t1[1];
$tc1=$t1[2];

$ta2=$t2[0];
$tb2=$t2[1];
$tc2=$t2[2];

if($ta2>=$ta1){
$ac=$ta2-$ta1;}
if($ta2<$ta1){
$ac=$ta1-$ta2;}


if($tb2>=$tb1){
$bc=$tb2-$tb1;}
if($tb2<$tb1){
$bc=$tb1-$tb2;}


if($tc2>=$tc1){
$cc=$tc2-$tc1;}
if($tc2<$tc1){
$cc=$tc1-$tc2;}








$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$testname=$row['testname'];
$totalquestions=$row['totalquestions'];
$maxmar=$row['maxmar'];
$pass=$row['pass'];
$ansview=$row['ansview'];

}


?>














<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="558"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Result ( <?php echo $user;?> )</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>
<table width="580" height="240" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="admin/images/g1.jpg"  >
</td>
<td width="575"  bgcolor="E9E9E9"  >
<font color="666666" size="3">
<center>
<table width="575" height="240" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;T&#234;n b&#224;i
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $testname;?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;Ng&#224;y/gi&#7901;
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php echo $date;?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;Y&#234;u c&#7847;u
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >

<?php echo $pass;?> %
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;T&#7893;ng s&#7889;
</td>
<td width="200" height="30" bgcolor="cococo"  >

<?php echo $totalquestions;?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;T&#7889;i &#273;a
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php echo $maxmar;?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;Marks Obtained
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php 

$cans=substr($cans, 0, 3 );
echo $cans; 
?>
&nbsp;&nbsp;( <?php
if($cans>="1"){
$per=($cans/$maxmar)*100;
}
else
{
$per=0;
}

$per=substr($per, 0, 4 );
echo $per;
?>% )
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="e9e9e9"  >
&nbsp;Th&#7901;i gian
</td>
<td width="200" height="30" bgcolor="e9e9e9"  >
<?php if($ac!="00"){echo $ac; echo "h:";} if($bc!="00"){echo $bc; echo "m:";} if($cc!="00"){echo $cc; echo "s";}?>
</td>
</tr>
<tr>
<td width="275" height="30" bgcolor="cococo"  >
&nbsp;K&#7871;t qu&#7843;
</td>
<td width="200" height="30" bgcolor="cococo"  >
<?php 
$per=($cans/$maxmar)*100;

if($per>=$pass)
{
echo "PASS";
mysql_query("UPDATE dresult SET result='PASS' WHERE user='$user' AND testcode='$testcode' "); 
}
else
{
echo "FAIL";
mysql_query("UPDATE dresult SET result='FAIL' WHERE user='$user' AND testcode='$testcode' "); 
}



?>

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





















<br>
<?php 
if($ansview=="1"){
?>
<a href="mresult.php?testcode=<?php echo $testcode;?>"><img src="admin/images/answer.jpg" border="0"></a><br><br>
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
