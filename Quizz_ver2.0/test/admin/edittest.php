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

<script language="JavaScript" type="text/javascript" src="html2xhtml.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="richtext_compressed.js"></script>

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



<?php
$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$username=$row['user'];
$groupname=$row['groupname'];
}

?>







<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Test Configuration</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>


<?php

$testcode=$_GET['testcode'];

$query="SELECT * FROM dtest WHERE testcode='$testcode' "; 
$result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$description=$row['description'];

?><font color=666666 size=3>


<form method="post"  name="RTEDemo" onsubmit="return submitForm();" action="createtestm01.php">
Test Name: <input type="text" name="testname" size="15" value="<?php echo $row['testname'];?>"> <br><br>

<input type="hidden" name="testcode" value="<?php echo $row['testcode'];?>">



 Time (in Minutes) <select name="ti">
   <option value="<?php echo $row['ti'];?>" selected ><?php echo $row['ti'];?></option>
<?php
    for ($i=0; $i<=1000; $i++)
    {
     echo "<option value='$i'>$i</option>";
    }
   ?>
   </select><br><br>


 Percentage Required to pass <select name="pass">
  <option value="<?php echo $row['pass'];?>" selected ><?php echo $row['pass'];?> %</option>
 <?php
    for ($i=1; $i<=100; $i++)
    {
     echo "<option value='$i'>$i %</option>";
    }
   ?>
   </select><br><br>

Description:<br>

<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync for all rtes before submitting form
	updateRTEs();
	
	return true;
}

//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML, encHTML)
initRTE("images/", "", "", true);
//-->
</script>



<script language="JavaScript" type="text/javascript">
<!--
//build new richTextEditor
var rte1 = new richTextEditor('rte1');








<?php
function rteSafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	return $tmpString;
}
?>

<?php


//format content for preloading
if (!(isset($description))){
	$content = "here's the " . chr(13) . "\"preloaded <b>content</b>\"";
	$content = rteSafe($content);
} else {
	//retrieve posted value
	$content = rteSafe($description);
}


?>




rte1.html = '<?php echo $content;?>';
//rte1.toggleSrc = false;
rte1.build();
//-->
</script>

<br><br>

Allow users to view correct answers after submitted their test: <select name="ansview">
<option value="<?php echo $row['ansview'];?>" selected><?php $rr=$row['ansview']; if($rr=="1"){echo "Yes";} if($rr=="0"){echo "No";} ?></option>
<option value="1">Yes</option>
<option value="0">No</option>
</select><br><br>


<?php

if($username=='admin'){

?>

Assign to Group:&nbsp;&nbsp;
<select name="groupname">

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
</select><br><br>

<?php
}
?>


<?php

if($username!='admin'){

?>

Assign to Group:&nbsp;&nbsp;
<select name="groupname">

<option value="<?php echo $groupname;?>"><?php
echo $groupname; ?></option>
</select><br><br>

<?php
}
?>






<input type="image" src="images/submit.jpg" alt="Submit button">


&nbsp;
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>
</form>



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

