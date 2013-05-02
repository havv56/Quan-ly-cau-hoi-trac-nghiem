<?php
session_start();
if(isset($_SESSION['id'])){
$user=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dadmin WHERE id='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{
$ti=$_POST['ti'];
$pass=$_POST['pass'];
$testcode=$_POST['testcode'];
$testname=$_POST['testname'];
$ansview=$_POST['ansview'];
$groupname=$_POST['groupname'];

$description=$_POST['rte1'];


$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
{

$query = mysql_query("INSERT INTO dtest(testname, testcode, ti, pass, totalquestions, status)
VALUES
('$testname','$testcode','$ti','$pass','0','1')");



mysql_query("UPDATE dtest SET ansview='$ansview' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET groupname='$groupname' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET maxmar='0' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET description='$description' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET type='test' WHERE testcode='$testcode' ");


}


else
{



mysql_query("UPDATE dtest SET testname='$testname' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET pass='$pass' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET ti='$ti' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET ansview='$ansview' WHERE testcode='$testcode' ");


mysql_query("UPDATE dtest SET description='$description' WHERE testcode='$testcode' ");



mysql_query("UPDATE dtest SET groupname='$groupname' WHERE testcode='$testcode' ");



}


header( "Location: edittest0.php?testcode=$testcode" ) ;

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

