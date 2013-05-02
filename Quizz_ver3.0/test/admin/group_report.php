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
@$group=$_GET['group'];
@$testcode=$_GET['testcode'];
?>
<html>
<head>
<title>
Group Report

</title>


<script>
function selectOtherOne(thisObj)
{
var currentVal = thisObj.value;
var otherDropDown = document.getElementById("select2");
var otherDropDown2 = document.getElementById("select3");


switch(currentVal)
{	
<?php
$query="SELECT * FROM dresult "; 
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
?>case "<?php echo $row['groupname'];?>":
					otherDropDown.value = "<?php echo $row['testname'];?>";
				
				
				break;

				

<?php
}
?>



			}
		}
</script>




<script type="text/javascript"><!--
    function doAction(val){
        //Forward browser to new url
        window.location='group_report.php?group=' + val;
    }
--></script>


<script type="text/javascript"><!--
    function doActiont(val){
        //Forward browser to new url
        window.location='group_report.php?group=<?php echo $group;?>&testcode=' + val;
    }
--></script>




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

<br>









<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Generate Report</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table><br>


<?php
$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$username=$row['user'];
$groupname=$row['groupname'];
}

if($username=='admin'){

?>
<form method="POST" action="generate.php">

<font color="666666" size="3">Generate Report of Group 

<select name="reportgroup" onchange="doAction(this.value);">


<option value="">Select group</option>

<?php
$query="SELECT * FROM dgroup "; 
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
?><option value="<?php $fgroup=$row['groupname']; echo $row['groupname'];?>" <?php if($fgroup=="$group"){ echo "selected";}?> ><?php
echo $row['groupname']; ?></option>
<?php

}
?>
</select>


&nbsp;&nbsp;&nbsp;



<?php if($group!=""){
?>
<select name="reporttest" onchange="doActiont(this.value);">
<option value="">
Select Test</option>
<?php

$query = "SELECT * FROM dtest WHERE groupname='$group' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
?><option value="<?php $ftestcode=$row['testcode']; echo $row['testcode'];?>"  <?php if($ftestcode=="$testcode"){ echo "selected";}?>  ><?php
echo $row['testname']; ?></option>
<?php

}


?>
</select>
<?php
}
else
{

?>
<select name="reporttest" onchange="doActiont(this.value);">
<option value="">
Select Test</option>
<?php

$query = "SELECT * FROM dtest ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
?><option value="<?php $ftestcode=$row['testcode']; echo $row['testcode'];?>"  <?php if($ftestcode=="$testcode"){ echo "selected";}?>  ><?php
echo $row['testname']; ?></option>
<?php

}


?>
</select>
<?php
}

?>




<br>
<br>

<input type="image" src="images/generate.jpg" alt="Submit button">



</form>

<?php
}
if($username!='admin'){
?>
<form method="POST" action="generate.php">
<font color="666666" size="3">Generate Report of Group 
<select name="reportgroup" >
<option value="">Select group</option>
<option value="<?php echo $groupname;?>"><?php
echo $groupname; ?></option>
</select>

&nbsp;&nbsp;
<select name="reporttest">
<option value="">
Select Test</option>
<?php

$query = "SELECT * FROM dtest WHERE groupname='$groupname' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
?><option value="<?php $ftestcode=$row['testcode']; echo $row['testcode'];?>"  <?php if($ftestcode=="$testcode"){ echo "selected";}?>  ><?php
echo $row['testname']; ?></option>
<?php

}

?>
</select>
<br>
<br>
<input type="image" src="images/generate.jpg" alt="Submit button">
</form>
<?php
}
?>


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


