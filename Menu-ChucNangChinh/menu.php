<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];

include 'dbc.php';
?>

<html>
	<head>
		<title>
			Quan Ly Cau Hoi Trac Nghiem
		</title>
		<style>
			a {text-decoration:none;} 
		</style>
		<style>
			a:link, a:visited, a:active {
			text-decoration: none}
			a:hover {
			text-decoration: underline}
		</style>
	</head>
	
<?php

	$query = "SELECT * FROM dl WHERE id='$id' ";
		$result=mysql_query($query);
		
//truyền giá trị cho user
	while(@$row = mysql_fetch_array($result)){
		$chuser = $row['user'];
	}
	
//gia tri - id vào là admin, thiết kế các chức năng
if(@$chuser=="admin"){
?>

<!-- Tạo thanh trang chủ -->
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11" > </td>
		<td width="32" > <a href="account.php"> <img src="images/home.jpg" border="0"> </a> </td>
		<td width="107" > <a href="account.php"> <font color="666666" size="3"> <b>Home page</b> </a> </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng Quản lý bài giảng và bài kiểm tra -->
<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"  background="images/bgn2.jpg" > </td>
		<td 
			width="118"  background="images/bgn1.jpg" >
			<font color="ffffff" size="3">
			<font color="666666" size="3">
			<b>Management Exam & Test</b>
		</td>
		<td width="11"  background="images/bgn3.jpg" > </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng xem danh sách bài giảng và bài kiểm tra -->
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11" > </td>
		<td width="22" > <a href="avail.php"> <img src="images/viewtest.jpg" border="0"> </a> </td>
		<td width="117" > <a href="avail.php"><font color="000000" size="3"> List </a> </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng tạo bài giảng và bài kiểm tra -->
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"> </td>
		<td width="22" > <a href="createtestm.php"> <img src="images/newtest.jpg" border="0"> </a> </td>
		<td width="117" > <a href="createtestm.php"> <font color="000000" size="3"> Creat New </a> </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng Quản lý thành viên -->
<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"  background="images/bgn2.jpg" > </td>
		<td width="118"  background="images/bgn1.jpg" > <font color="ffffff" size="3"> <font color="666666" size="3" > <b> Members </b> </td>
		<td width="11"  background="images/bgn3.jpg"  > </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng kick hoạt tài khoản cho thành viên mới -->
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"> </td>
		<td width="22"> <a href="activate.php"><img src="images/actimem.jpg" border="0"> </a> </td>
		<td width="117"> <a href="activate.php"><font color="000000" size="3"> Active New Account </a></td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng danh sách các thành viên đã đăng ký -->
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"> </td>
		<td width="22"> <a href="member.php"><img src="images/viewmem.jpg" border="0"> </a> </td>
		<td width="117"> <a href="member.php"><font color="000000" size="3">List Members </a> </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng Quản lý các thành viên bị khóa, hoặc trong danh sách đen -->
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"> </td>
		<td width="22"> <a href="deactimem.php"><img src="images/suspended.jpg" border="0"> </a> </td>
		<td width="117"> <a href="deactimem.php"><font color="000000" size="3"> Warning Member </a> </td>
	</tr>
</table>

<!-- Tạo thanh thực hiện chức năng Quản lý kết quả/báo cáo -->
<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"  background="images/bgn2.jpg"> </td>
		<td width="118"  background="images/bgn1.jpg"> <font color="ffffff" size="3"> <font color="666666" size="3"> <b> Effect/To Report </b> </td>
		<td width="11"  background="images/bgn3.jpg"> </td>
	</tr>
</table>

<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="11"> </td>
		<td width="22"> <a href="testhis.php"><img src="images/result.jpg" border="0"> </a> </td>
		<td width="117"> <a href="testhis.php"><font color="000000" size="3">View </a> </td>
	</tr>
</table>
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
<a href="backup.php"><font color="000000" size="3">BackUp</a>
</td>
</tr></table>



<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Group</b>
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
<a href="edit4.php"><font color="000000" size="3">Create New</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit41.php"><img src="images/vgroup.jpg" border="0"></a>
</td><td width="117" >
<a href="edit41.php"><font color="000000" size="3">View Team</a>
</td>
</tr></table>



<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Moderators/Managerment</b>
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
<a href="edit5.php"><font color="000000" size="3">Create New</a>
</td>
</tr></table>
<table width="140" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11">
</td><td width="22" >
<a href="edit51.php"><img src="images/vgroup.jpg" border="0"></a>
</td><td width="117" >
<a href="edit51.php"><font color="000000" size="3">List</a>
</td>
</tr></table>

<table width="140" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="118"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Install</b>
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
<a href="edit.php"><font color="000000" size="3">Basic</a>
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
<a href="edit3.php"><font color="000000" size="3">Password</a>
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
