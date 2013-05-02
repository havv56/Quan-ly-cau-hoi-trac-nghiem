<?php
//session_start();
if(isset($_SESSION['id'])){
include 'dbc.php';
$id=$_SESSION['id'];
include 'dbc.php';


$query = "SELECT id FROM dmember WHERE id='$id' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{
?>

<html>
<head>
<title>
Menu User

</title>
<body>

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




<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="32" >
<a href="account.php"><img src="admin/images/home.jpg" border="0"></a>
</td><td width="107" >
<a href="account.php">
<font color="666666" size="3">
<b>HomePage</b></a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="118"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Test</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="avail.php"><img src="admin/images/viewtest.jpg" border="0"></a>
</td><td width="117" >
<a href="avail.php"><font color="000000" size="3">Available</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="118"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Results</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="testhis.php"><img src="admin/images/result.jpg" border="0"></a>
</td><td width="117" >
<a href="testhistory.php"><font color="000000" size="3">View Results</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="118"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Account</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="testhis.php"><img src="admin/images/actimem.jpg" border="0"></a>
</td><td width="117" >
<a href="edit.php"><font color="000000" size="3">My Account</a>
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="testhis.php"><img src="admin/images/help.png" border="0"></a>
</td><td width="117" >
<a href="help.php"><font color="000000" size="3">Help</a>
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="testhis.php"><img src="admin/images/FAQ.jpg" border="0"></a>
</td><td width="117" >
<a href="faq.php"><font color="000000" size="3">FAQ</a>
</td>
</tr></table>

<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="118"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Logout</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="32" >
<a href="logout.php"><img src="admin/images/logout.gif" border="0"></a>
</td><td width="107" >
<a href="logout.php">
<font color="666666" size="3">
<b>Logout</b></a>
</td>
</tr></table>




<br>


<br>





<br>



</body>
</html>

<?php

}


}

else{
	
?>

echo "login error!";
<?php
}


?>

