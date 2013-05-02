<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dmember WHERE id='$id' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{
?>
<?php
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

<td width="730"  valign=top  ><br>






<?php

@$editpost=$_GET['editpost'];
if($editpost=="1"){

@$fullname=$_POST['fullname'];
@$gender=$_POST['gender'];
@$mn=$_POST['mn'];
@$dt=$_POST['dt'];
@$yr=$_POST['yr'];
@$groupname=$_POST['groupname'];
$ndob=$dt."-".$mn."-".$yr;

mysql_query("UPDATE dmember SET name='$fullname' WHERE id='$id' "); 
mysql_query("UPDATE dmember SET gender='$gender' WHERE id='$id' "); 
mysql_query("UPDATE dmember SET dob='$ndob' WHERE id='$id' "); 
mysql_query("UPDATE dmember SET groupname='$groupname' WHERE id='$id' "); 

echo "<font color=green>Th&#224;nh c&#244;ng!<br>";

}


if($editpost=="2"){

$email=$_POST['email'];
$country=$_POST['country'];
$city=$_POST['city'];
$address=$_POST['address'];


mysql_query("UPDATE dmember SET country='$country' WHERE id='$id' "); 

mysql_query("UPDATE dmember SET city='$city' WHERE id='$id' "); 

mysql_query("UPDATE dmember SET address='$address' WHERE id='$id' "); 


mysql_query("UPDATE dmember SET email='$email' WHERE id='$id' "); 



echo "<font color=green>Th&#224;nh c&#244;ng!<br>";



}



if($editpost=="3"){

$opass=$_POST['opass'];
$npass=$_POST['npass'];


$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$pass=$row['pass'];
}


$encryopass=md5($opass);

if($encryopass==$pass){

$encrynpass=md5($npass);

mysql_query("UPDATE dmember SET pass='$encrynpass' WHERE id='$id' "); 

echo "<font color=green>Password changed!<br>";

}


if($encryopass!=$pass){
echo "<font color=red>Wrong current password!<br>";
}


}


@$edit=$_GET['edit'];
@$editbasic=$_GET['editbasic'];
@$editcontact=$_GET['editcontact'];
@$editpass=$_GET['editpass'];


?>

























<?php
if($edit!="1"){

?>


<font color="990000" size="3">Account: <br>

<?php

$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {


?><br><font color="666666" size="3">Basic Information: 

<a href="edit.php?edit=1&editbasic=1">
<img src="admin/images/edit.png" border="0"></a> 


<br>
<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >


<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
User Name: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['user'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Full Name: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['name'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Sex: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['gender'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Birth Day:</b>  
</td><td>&nbsp;&nbsp;
<?php echo $row['dob'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Group: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['groupname'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Last Update:</b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['date'];?>
</td></tr>


</table>
<?php
}


$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {


?><br><font color="666666" size="3">Contact:
<a href="edit.php?edit=1&editcontact=1">
<img src="admin/images/edit.png" border="0"></a> 
<br>
<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >


<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
E-mail: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['email'];?>
</td></tr>


<tr><td width="170" height="35" bgcolor="990000" valign=top><font color="ffffff" size="3"><b>&nbsp;
Adress: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['address'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Provinces/Cities: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['city'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Country: </b> 
</td><td>&nbsp;&nbsp;
<?php echo $row['country'];?>
</td></tr>



</table><br>
<?php
}

?>





<font color="666666" size="3">M&#7853;t kh&#7849;u:
<a href="edit.php?edit=1&editpass=1">
<img src="admin/images/edit.png" border="0"></a> 
<br>
<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >


<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Passwork: </b> 
</td><td>&nbsp;&nbsp;
*******
</td></tr>





</table><br><br>



<?php

}

?>



<?php

if($editpass=="1"){
?>


<font color="990000" size="3">Edit Account: <br>
<form method="post" action="edit.php?editpost=3">

<br><font color="666666" size="3">Change Password:<br>
<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >
<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Current Password:</b> 
</td><td>
<input type="password" name="opass" value="" size="33">

</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
New Password: </b> 
</td><td>
<input type="password" name="npass" value="" size="33">

</td></tr>

</table><br>

<input type="image" src="admin/images/submit.jpg" alt="Submit button">
<a href="edit.php"><img src="admin/images/back.jpg" border="0"></a>
</form><br><br>

<?php
}
?>



<?php

if($editcontact=="1"){
?>


<font color="990000" size="3">Edit Account: <br>
<form method="post" action="edit.php?editpost=2">


<?php
$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {


?><br><font color="666666" size="3">Updated Information:
 
<br>
<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >


<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
E-mail: </b> 
</td><td>
<input type="text" name="email" value="<?php echo $row['email'];?>" size="33">

</td></tr>


<tr><td width="170" bgcolor="990000" valign=top><font color="ffffff" size="3"><b>&nbsp;
Address: </b> 
</td><td>
<input type="text" name="address" value="<?php echo $row['address'];?>" size="33">


</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
City: </b> 
</td><td><input type="text" name="city" value="<?php echo $row['city'];?>" size="33">


</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Country: </b> 
</td><td>


<select name="country" class="f-name" autocomplete="off" tabindex="14" >
				
                                <option value="<?php echo $row['country'];?>">
<?php $cn=$row['country']; if($cn==""){ echo "Select Country"; } if($cn!=""){ echo $cn;} ?>
</option>
				<option value=Albania>Albania</option>
				<option value=Algeria>Algeria</option>
				<option value=Andorra>Andorra</option>
				<option value=Angola>Angola</option>
				<option value=Anguilla>Anguilla</option>
				<option value=Argentina>Argentina</option>
				<option value=Armenia>Armenia</option>
				<option value=Aruba>Aruba</option>
				<option value=Australia>Australia</option>
				<option value=Austria>Austria</option>
				<option value=Bahamas>Bahamas</option>
				<option value=Bahrain>Bahrain</option>
				<option value=Barbados>Barbados</option>
				<option value=Belgium>Belgium</option>
				<option value=Belize>Belize</option>
				<option value=Benin>Benin</option>
				<option value=Bermuda>Bermuda</option>
				<option value=Bhutan>Bhutan</option>
				<option value=Bolivia>Bolivia</option>
				<option value=Botswana>Botswana</option>
				<option value=Brazil>Brazil</option>
				<option value=Brunei>Brunei</option>
				<option value=Bulgaria>Bulgaria</option>
				<option value=Burkina Faso>Burkina Faso</option>
				<option value=Burundi>Burundi</option>
				<option value=Cambodia>Cambodia</option>
				<option value=Canada>Canada</option>
				<option value=Cape Verde>Cape Verde</option>
				<option value=Cayman Islands>Cayman Islands</option>
				<option value=Chad>Chad</option>
				<option value=Chile>Chile</option>
				<option value=China Worldwide>China Worldwide</option>
				<option value=Colombia>Colombia</option>
				<option value=Comoros>Comoros</option>
				<option value=Cook Islands>Cook Islands</option>
				<option value=Costa Rica>Costa Rica</option>
				<option value=Croatia>Croatia</option>
				<option value=Cyprus>Cyprus</option>
				<option value=Czech Republic>Czech Republic</option>
				<option value=Denmark>Denmark</option>
				<option value=Djibouti>Djibouti</option>
				<option value=Dominica>Dominica</option>
				<option value=Dominican Republic>Dominican Republic</option>
				<option value=Ecuador>Ecuador</option>
				<option value=El Salvador>El Salvador</option>
				<option value=Eritrea>Eritrea</option>
				<option value=Estonia>Estonia</option>
				<option value=Ethiopia>Ethiopia</option>
				<option value=Falkland Islands>Falkland Islands</option>
				<option value=Faroe Islands>Faroe Islands</option>
				<option value=Fiji>Fiji</option>
				<option value=Finland>Finland</option>
				<option value=France>France</option>
				<option value=French Guiana>French Guiana</option>
				<option value=French Polynesia>French Polynesia</option>
				<option value=Gabon Republic>Gabon Republic</option>
				<option value=Gambia>Gambia</option>
				<option value=Germany>Germany</option>
				<option value=Gibraltar>Gibraltar</option>
				<option value=Greece>Greece</option>
				<option value=Greenland>Greenland</option>
				<option value=Grenada>Grenada</option>
				<option value=Guadeloupe>Guadeloupe</option>
				<option value=Guatemala>Guatemala</option>
				<option value=Guinea>Guinea</option>
				<option value=Guinea Bissau>Guinea Bissau</option>
				<option value=Guyana>Guyana</option>
				<option value=Honduras>Honduras</option>
				<option value=Hong Kong>Hong Kong</option>
				<option value=Hungary>Hungary</option>
				<option value=Iceland>Iceland</option>
				<option value=India>India</option>
				<option value=Indonesia>Indonesia</option>
				<option value=Ireland>Ireland</option>
				<option value=Israel>Israel</option>
				<option value=Italy>Italy</option>
				<option value=Jamaica>Jamaica</option>
				<option value=Japan>Japan</option>
				<option value=Jordan>Jordan</option>
				<option value=Kazakhstan>Kazakhstan</option>
				<option value=Kenya>Kenya</option>
				<option value=Kiribati>Kiribati</option>
				<option value=Kuwait>Kuwait</option>
				<option value=Kyrgyzstan>Kyrgyzstan</option>
				<option value=Laos>Laos</option>
				<option value=Latvia>Latvia</option>
				<option value=Lesotho>Lesotho</option>
				<option value=Liechtenstein>Liechtenstein</option>
				<option value=Lithuania>Lithuania</option>
				<option value=Luxembourg>Luxembourg</option>
				<option value=Madagascar>Madagascar</option>
				<option value=Malawi>Malawi</option>
				<option value=Malaysia>Malaysia</option>
				<option value=Maldives>Maldives</option>
				<option value=Mali>Mali</option>
				<option value=Malta>Malta</option>
				<option value=Marshall Islands>Marshall Islands</option>
				<option value=Martinique>Martinique</option>
				<option value=Mauritania>Mauritania</option>
				<option value=Mauritius>Mauritius</option>
				<option value=Mayotte>Mayotte</option>
				<option value=Mexico>Mexico</option>
				<option value=Mongolia>Mongolia</option>
				<option value=Montserrat>Montserrat</option>
				<option value=Morocco>Morocco</option>
				<option value=Mozambique>Mozambique</option>
				<option value=Namibia>Namibia</option>
				<option value=Nauru>Nauru</option>
				<option value=Nepal>Nepal</option>
				<option value=Netherlands>Netherlands</option>
				<option value=New Caledonia>New Caledonia</option>
				<option value=New Zealand>New Zealand</option>
				<option value=Nicaragua>Nicaragua</option>
				<option value=Nigeria>Nigeria</option>
				<option value=Niue>Niue</option>
				<option value=Norfolk Island>Norfolk Island</option>
				<option value=Norway>Norway</option>
				<option value=Oman>Oman</option>
				<option value=Palau>Palau</option>
				<option value=Panama>Panama</option>
				<option value=Papua New Guinea>Papua New Guinea</option>
				<option value=Peru>Peru</option>
				<option value=Philippines>Philippines</option>
				<option value=Pitcairn Islands>Pitcairn Islands</option>
				<option value=Poland>Poland</option>
				<option value=Portugal>Portugal</option>
				<option value=Qatar>Qatar</option>
				<option value=Reunion>Reunion</option>
				<option value=Romania>Romania</option>
				<option value=Russia>Russia</option>
				<option value=Rwanda>Rwanda</option>
				<option value=Samoa>Samoa</option>
				<option value=San Marino>San Marino</option>
				<option value=São Tomé and Príncipe>São Tomé and Príncipe</option>
				<option value=Saudi Arabia>Saudi Arabia</option>
				<option value=Senegal>Senegal</option>
				<option value=Seychelles>Seychelles</option>
				<option value=Sierra Leone>Sierra Leone</option>
				<option value=Singapore>Singapore</option>
				<option value=Slovakia>Slovakia</option>
				<option value=Slovenia>Slovenia</option>
				<option value=Solomon Islands>Solomon Islands</option>
				<option value=Somalia>Somalia</option>
				<option value=South Africa>South Africa</option>
				<option value=South Korea>South Korea</option>
				<option value=Spain<>Spain</option>
				<option value=Sri Lanka>Sri Lanka</option>
				<option value=St. Helena>St. Helena</option>
				<option value=St. Kitts and Nevis>St. Kitts and Nevis</option>
				<option value=St. Lucia>St. Lucia</option>
				<option value=Suriname>Suriname</option>
				<option value=Swaziland>Swaziland</option>
				<option value=Sweden>Sweden</option>
				<option value=Switzerland>Switzerland</option>
				<option value=Taiwan>Taiwan</option>
				<option value=Tajikistan>Tajikistan</option>
				<option value=Tanzania>Tanzania</option>
				<option value=Thailand>Thailand</option>
				<option value=Togo>Togo</option>
				<option value=Tonga>Tonga</option>
				<option value=Trinidad and Tobago>Trinidad and Tobago</option>
				<option value=Tunisia>Tunisia</option>
				<option value=Turkey>Turkey</option>
				<option value=Turkmenistan>Turkmenistan</option>
				<option value=Tuvalu>Tuvalu</option>
				<option value=Uganda>Uganda</option>
				<option value=Ukraine>Ukraine</option>
				<option value=United Kingdom>United Kingdom</option>
				<option value=United States>United States</option>
				<option value=Uruguay>Uruguay</option>
				<option value=Vanuatu>Vanuatu</option>
				<option value=Vatican City State>Vatican City State</option>
				<option value=Venezuela>Venezuela</option>
				<option value=Vietnam>Vietnam</option>
				<option value=Yemen>Yemen</option>
				<option value=Zambia>Zambia</option>
				</select>

</td></tr>



</table><br>
<?php
}
?>

<input type="image" src="admin/images/submit.jpg" alt="Submit button">
<a href="edit.php"><img src="admin/images/back.jpg" border="0"></a>
</form><br><br>

<?php

}
?>




<?php

if($editbasic=="1"){
?>


<font color="990000" size="3">Edit Account: <br>
<form method="post" action="edit.php?editpost=1">


<?php

$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {


?><br><font color="666666" size="3">Edit Basic information: 

</a> 


<br>
<table width="400" cellspacing="0" cellpadding="0" border="1" bordercolor="cc0000" >


<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
User Name: </b> 
</td><td>
<?php echo $row['user'];?>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Full Name: </b> 
</td><td>
<input type="text" name="fullname" value="<?php echo $row['name'];?>" size="33">
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Gender: </b> 
</td><td>

<select name="gender">
<option value="<?php echo $row['gender'];?>" Selected>
<?php $gen=$row['gender']; if($gen==""){ echo "Select Gender"; } if($gen!=""){ echo $gen;} ?>
</option>
<option value="Male">
Male
</option>
<option value="Female">
Female</option>
</select>


</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Date of Birth:</b>  
</td><td>
<?php $dob=$row['dob'];
$update=$row['date'];
if($dob!=""){

$dobb=explode('-',$dob);

$dt=$dobb[0];
$mn=$dobb[1];
$yr=$dobb[2];

}

?>

<select name="dt">
<option value='<?php if($dob!=""){ if($dt!=""){ echo $dt; } } ?>' selected >
<?php if($dob!=""){ if($dt!=""){ echo $dt; } } if($dob==""){ echo "D"; } ?>
</option>
   <?php
    for ($i=1; $i<=31; $i++)
    {
     echo "<option value='$i'>$i</option>";
    }
   ?>
   </select>

<select name="mn">
<option value='<?php if($dob!=""){ if($mn!=""){ echo $mn; } } ?>' selected>
<?php if($dob!=""){ if($mn!=""){ echo $mn; } } if($dob==""){ echo "M"; } ?>
</option>
   <?php
    for ($i=1; $i<=12; $i++)
    {
     echo "<option value='$i'>$i</option>";
    }
   ?>
   </select>



<select name="yr">
<option value='<?php if($dob!=""){ if($yr!=""){ echo $yr; } } ?>' selected>
<?php if($dob!=""){ if($yr!=""){ echo $yr; } } if($dob==""){ echo "Year"; } ?>
</option>
   <?php
    for ($i=2010; $i>=1910; $i--)
    {
     echo "<option value='$i'>$i</option>";
    }
   ?>
   </select>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Group: </b> 
</td><td>
<select name="groupname">
<option value="<?php echo $row['groupname'];?>" Selected>
<?php $ger=$row['groupname']; if($ger==""){ echo "Select Group"; } if($ger!=""){ echo $ger;} ?>
</option>
<?php

$query = "SELECT * FROM dgroup ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
?>

<option value="<?php echo $row['groupname'];?>"><?php
echo $row['groupname']; ?></option>
<?php

}

?>
</select>
</td></tr>

<tr><td width="170" bgcolor="990000"><font color="ffffff" size="3"><b>&nbsp;
Last updation in profile:</b> 
</td><td>&nbsp;&nbsp;
<?php echo $update;?>
</td></tr>


</table>
<?php
}


?>
<br>

<input type="image" src="admin/images/submit.jpg" alt="Submit button">
<a href="edit.php"><img src="admin/images/back.jpg" border="0"></a>
</form><br><br>
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
@$logo=$row['logo'];
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
