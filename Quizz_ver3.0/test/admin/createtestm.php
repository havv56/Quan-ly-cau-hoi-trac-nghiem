<?php
session_start();
if(isset($_SESSION['id'])){
$user=$_SESSION['id'];
include 'dbc.php';
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
Create Test

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

<font color="666666" size="3">

<form method="post" name="RTEDemo" onsubmit="return submitForm();" action="createtestm01.php">
Test Name: <input type="text" name="testname" size="15"> (eg: Math, English)<br><br>
<?php

srand(time());
$testcode = (rand()%999999);
?>
<input type="hidden" name="testcode" value="<?php echo $testcode;?>">






 Time (in Minutes) <select name="ti">
   <?php
    for ($i=0; $i<=1000; $i++)
    {
     echo "<option value='$i'>$i</option>";
    }
   ?>
   </select><br><br>



 Percentage Required to pass <select name="pass"><option value='50' selected >50 %</option>
   <?php
    for ($i=1; $i<=100; $i++)
    {
     echo "<option value='$i'>$i %</option>";
    }
   ?>
   </select><br><br>

Description:<BR>




















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








rte1.html = '';
//rte1.toggleSrc = false;
rte1.build();
//-->
</script>













<br><br>
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


Allow users to view correct answers after submitted their test: <select name="ansview">
<option value="1">Yes</option>
<option value="0">No</option>
</select><br><br>

<input type="image" src="images/next.jpg" alt="Submit button">

&nbsp;
<a href="account.php"><img src="images/back.jpg" border="0"></a>

</form>
















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

else{
	
?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php">

<?php
}


?>.
