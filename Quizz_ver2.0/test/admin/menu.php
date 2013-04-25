<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];

include 'dbc.php';
?>
<html>
<head>
<title>
B&#7843;ng qu&#7843;n tr&#7883; trang tr&#7855;c nghi&#7879;m tr&#7921;c tuy&#7871;n
</title>
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


<?php


$query = "SELECT * FROM dadmin WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$chuser=$row['user'];
}

if($chuser=="admin"){



?>


<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="32" >
<a href="account.php"><img src="images/home.jpg" border="0"></a>
</td><td width="107" >
<a href="account.php">
<font color="666666" size="3">
<b>Trang ch&#7911;</b></a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>QL &#272;&#7873; v&#224; b&#224;i</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="avail.php"><img src="images/viewtest.jpg" border="0"></a>
</td><td width="117" >
<a href="avail.php"><font color="000000" size="3">Danh s&#227;gs</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="createtestm.php"><img src="images/newtest.jpg" border="0"></a>
</td><td width="117" >
<a href="createtestm.php"><font color="000000" size="3">T&#7841;o m&#7899;i</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Th&#224;nh vi&#234;n</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="activate.php"><img src="images/actimem.jpg" border="0"></a>
</td><td width="117" >
<a href="activate.php"><font color="000000" size="3">K&#237;ch ho&#7841;t TK m&#7899;i</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="member.php"><img src="images/viewmem.jpg" border="0"></a>
</td><td width="117" >
<a href="member.php"><font color="000000" size="3">Danh s&#225;ch th&#224;nh vi&#234;n</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="deactimem.php"><img src="images/suspended.jpg" border="0"></a>
</td><td width="117" >
<a href="deactimem.php"><font color="000000" size="3">Ph&#7841;t t&#224;i kho&#7843;n</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>K&#7871;t qu&#7843;/B&#225;o c&#225;o</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="testhis.php"><img src="images/result.jpg" border="0"></a>
</td><td width="117" >
<a href="testhis.php"><font color="000000" size="3">Xem k&#7871;t qu&#7843;</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="group_report.php"><img src="images/report.jpg" border="0"></a>
</td><td width="117" >
<a href="group_report.php"><font color="000000" size="3">Xem b&#225;o c&#225;o</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>B&#7843;o m&#7853;t</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="hack.php"><img src="images/hacker.jpg" border="0"></a>
</td><td width="117" >
<a href="hack.php"><font color="000000" size="3"> Hackers</a>


(<?php
$query = "SELECT * FROM dmember WHERE actstatustmp='1' AND hack='1' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$rmem=mysql_num_rows($result);
echo "<font color=red>";
echo $rmem;
}
else
{
echo "0";
}
?><font color=000000 size=3>)

</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="backup.php"><img src="images/database.jpg" border="0"></a>
</td><td width="117" >
<a href="backup.php"><font color="000000" size="3">Sao l&#432;u</a>
</td>
</tr></table>



<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Nh&#243;m</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit4.php"><img src="images/group.jpg" border="0"></a>
</td><td width="117" >
<a href="edit4.php"><font color="000000" size="3">T&#7841;o m&#7899;i</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit41.php"><img src="images/vgroup.jpg" border="0"></a>
</td><td width="117" >
<a href="edit41.php"><font color="000000" size="3">Xem nh&#243;m</a>
</td>
</tr></table>



<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Ng&#432;&#7901;i &#273;i&#7873;u h&#224;nh</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit5.php"><img src="images/group.jpg" border="0"></a>
</td><td width="117" >
<a href="edit5.php"><font color="000000" size="3">T&#7841;o m&#7899;i</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit51.php"><img src="images/vgroup.jpg" border="0"></a>
</td><td width="117" >
<a href="edit51.php"><font color="000000" size="3">Danh s&#225;ch</a>
</td>
</tr></table>

<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>C&#224;i &#273;&#7863;t</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit.php"><img src="images/setting.png" border="0"></a>
</td><td width="117" >
<a href="edit.php"><font color="000000" size="3">C&#417; b&#7843;n</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit2.php"><img src="images/banner.jpg" border="0"></a>
</td><td width="117" >
<a href="edit2.php"><font color="000000" size="3">Logo</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit3.php"><img src="images/pass.jpg" border="0"></a>
</td><td width="117" >
<a href="edit3.php"><font color="000000" size="3">M&#7853;t kh&#7849;u</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Help</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="help.php"><img src="images/help.png" border="0"></a>
</td><td width="117" >
<a href="help.php"><font color="000000" size="3">Script help</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="error.php"><img src="images/error.png" border="0"></a>
</td><td width="117" >
<a href="error.php"><font color="000000" size="3">Report error</a>
</td>
</tr></table>



<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Logout</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="32" >
<a href="logout.php"><img src="images/logout.gif" border="0"></a>
</td><td width="107" >
<a href="logout.php">
<font color="666666" size="3">
<b>Tho&#225;t</b></a>
</td>
</tr></table>




<br>


<br>


<?php
}
else
{


?>


<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="32" >
<a href="account.php"><img src="images/home.jpg" border="0"></a>
</td><td width="107" >
<a href="account.php">
<font color="666666" size="3">
<b>Home</b></a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Online Test</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="avail.php"><img src="images/viewtest.jpg" border="0"></a>
</td><td width="117" >
<a href="avail.php"><font color="000000" size="3">Available</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="createtestm.php"><img src="images/newtest.jpg" border="0"></a>
</td><td width="117" >
<a href="createtestm.php"><font color="000000" size="3">Create new</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Member</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="activate.php"><img src="images/actimem.jpg" border="0"></a>
</td><td width="117" >
<a href="activate.php"><font color="000000" size="3">Activate new</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="member.php"><img src="images/viewmem.jpg" border="0"></a>
</td><td width="117" >
<a href="member.php"><font color="000000" size="3">Member list</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="deactimem.php"><img src="images/suspended.jpg" border="0"></a>
</td><td width="117" >
<a href="deactimem.php"><font color="000000" size="3">Deactivated</a>
</td>
</tr></table>




<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Result/Report</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="testhis.php"><img src="images/result.jpg" border="0"></a>
</td><td width="117" >
<a href="testhis.php"><font color="000000" size="3">View result</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="group_report.php"><img src="images/report.jpg" border="0"></a>
</td><td width="117" >
<a href="group_report.php"><font color="000000" size="3">Generate report </a>
</td>
</tr></table>



<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Logout</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="32" >
<a href="logout.php"><img src="images/logout.gif" border="0"></a>
</td><td width="107" >
<a href="logout.php">
<font color="666666" size="3">
<b>Logout</b></a>
</td>
</tr></table>




<br>


<br>



<?php
}
?>
</body>
</html>

<?php

}

else{
	
echo "Login Error";
}


?>
