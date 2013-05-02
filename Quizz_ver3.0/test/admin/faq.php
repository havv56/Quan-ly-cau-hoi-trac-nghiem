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
FAQ

</title>
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









<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>FAQ</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table><br>










<?php

if(@$_POST['fid']>''){
foreach($_POST['fid'] as $key => $fid) {
$question=$_POST['question'][$key];
$answer=$_POST['answer'][$key];

if($fid=="new"){
if($question!="Q"){
mysql_query("INSERT INTO dfaq(question, answer)
      VALUES ('$question','$answer')");
}
}
else
{
if($question!=""){

mysql_query("UPDATE dfaq SET question='$question', answer='$answer' WHERE fid='$fid' ");
}
else
{
mysql_query("DELETE FROM dfaq WHERE fid='$fid' "); 


}

}

}
}

?>










<font color="999999" size="3">

<form method="post" action="faq.php">


<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">

<?php

$query = "SELECT * FROM dfaq ORDER BY ABS(fid) ASC ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
?>

<tr>
<td width="80" valign="top" >
<input type="text" name="fid[]" value="<?php echo $row['fid'];?>" size="5" readonly >
</td>
<td width="500" valign="top" >


<textarea rows="2" cols="55" name="question[]" ><?php echo $row['question'];?></textarea><br>
<textarea rows="2" cols="55" name="answer[]" ><?php echo $row['answer'];?></textarea>


</td>
</tr>

<tr>
<td width="80">
<br></td>
<td width="500">
</td>
</tr>

<?php
}
?>
<tr>
<td width="80">
<input type="hidden" name="fid[]" value="new" size="5" >

<br></td>
<td width="500">


<textarea rows="2" cols="55" name="question[]" >Q<?php echo $row['question'];?></textarea><br>
<textarea rows="2" cols="55" name="answer[]" >A<?php echo $row['answer'];?></textarea>


</td>
</tr>
</table>


<br>

<input type="submit" value="Submit"></form>

<br>
<br>


<br>
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
