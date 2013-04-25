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

$testcode=$_GET['testcode'];
$qtype=$_GET['qtype'];

?>
<html>
<head>
<title><?php echo $title;?>
</title>

<script type="text/javascript"><!--
    function doAction(val){
        //Forward browser to new url
        window.location='importquestion.php?testcode=<?php echo $testcode;?>&qtype=' + val;
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
<form method="post" action="importquestion.php?qtype=<?php echo $qtype;?>&testcode=<?php echo $testcode;?>" enctype="multipart/form-data" >

<?php
if($qtype==""){?>

<font id="font1">

Select Question type <select name="qtype" onchange="doAction(this.value);">
<option value="" >Select</option>
<option value="MCQ" <?php if($qtype!=""){if($qtype=="MCQ"){echo "selected";}}?> >MCQ (Multiple answer)</option>
<option value="short" <?php if($qtype!=""){if($qtype=="short"){echo "selected";}}?> >Short Answer</option>
</select><br><br>




<?php
}

if($qtype=="MCQ"){
?>



<?php
if($_FILES['xlsfile']['name']>''){

$targets = "xls/";
$targets = $targets . basename( $_FILES['xlsfile']['name']);
$docadd=($_FILES['xlsfile']['name']);
if(move_uploaded_file($_FILES['xlsfile']['tmp_name'], $targets))
{
 
$docadd="xls/".$docadd;



$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$totqno=$row['totalquestions'];
$maxmar=$row['maxmar'];
}

require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->read($docadd);

error_reporting(E_ALL ^ E_NOTICE);




for ($j = 1; $j < $data->sheets[0]['numRows']; $j++)
		 {


	$data1=$data->sheets[0]['cells'][$j+1][1];

	$data2=$data->sheets[0]['cells'][$j+1][2];

	$data3=$data->sheets[0]['cells'][$j+1][3];

	$data4=$data->sheets[0]['cells'][$j+1][4];

	$data5=$data->sheets[0]['cells'][$j+1][5];

	$data6=$data->sheets[0]['cells'][$j+1][6];

$data7=$data->sheets[0]['cells'][$j+1][7];

$data8=$data->sheets[0]['cells'][$j+1][8];

$data9=$data->sheets[0]['cells'][$j+1][9];

$data10=$data->sheets[0]['cells'][$j+1][10];

$data11=$data->sheets[0]['cells'][$j+1][11];

$data12=$data->sheets[0]['cells'][$j+1][12];

$data13=$data->sheets[0]['cells'][$j+1][13];


if($data2!=""){

$totqno+=1;
}


$totmark=0;
$opno=0;

	if($data4!=""){	

$data4=str_replace("'","",$data4);
$data4=str_replace("&#65533", "", $data4);
$data4=strip_tags($data4);
$data4=preg_replace("/<.*?>/", "", $data4);
$data4=str_replace(";", "", $data4);


$data4=rtrim($data4);

$opno+=1;

mysql_query("INSERT INTO doptions(qno, ob, m, obno, testcode)
      VALUES ('$totqno','$data4','$data5','$opno','$testcode')");
if($data5>="1"){
$maxmar+=$data5;
$totmark+=$data5;
}
}




if($data6!=""){


$data6=str_replace("'","",$data6);
$data6=str_replace("&#65533", "", $data6);
$data6=strip_tags($data6);
$data6=preg_replace("/<.*?>/", "", $data6);
$data6=str_replace(";", "", $data6);

$data6=rtrim($data6);

$opno+=1;

mysql_query("INSERT INTO doptions(qno, ob, m, obno, testcode)
      VALUES ('$totqno','$data6','$data7','$opno','$testcode')");
if($data7>="1"){
$maxmar+=$data7;
$totmark+=$data7;
}
}




if($data8!=""){


$data8=str_replace("'","",$data8);
$data8=str_replace("&#65533", "", $data8);
$data8=strip_tags($data8);
$data8=preg_replace("/<.*?>/", "", $data8);
$data8=str_replace(";", "", $data8);

$data8=rtrim($data8);

$opno+=1;

mysql_query("INSERT INTO doptions(qno, ob, m, obno, testcode)
      VALUES ('$totqno','$data8','$data9','$opno','$testcode')");
if($data9>="1"){
$maxmar+=$data9;
$totmark+=$data9;
}
}

if($data10!=""){


$data10=str_replace("'","",$data10);
$data10=str_replace("&#65533", "", $data10);
$data10=strip_tags($data10);
$data10=preg_replace("/<.*?>/", "", $data10);
$data10=str_replace(";", "", $data10);

$data10=rtrim($data10);

$opno+=1;

mysql_query("INSERT INTO doptions(qno, ob, m, obno, testcode)
      VALUES ('$totqno','$data10','$data11','$opno','$testcode')");
if($data11>="1"){
$maxmar+=$data11;
$totmark+=$data11;
}
}


if($data12!=""){


$data12=str_replace("'","",$data12);
$data12=str_replace("&#65533", "", $data12);
$data12=strip_tags($data12);
$data12=preg_replace("/<.*?>/", "", $data12);
$data12=str_replace(";", "", $data12);

$data12=rtrim($data12);

$opno+=1;

mysql_query("INSERT INTO doptions(qno, ob, m, obno, testcode)
      VALUES ('$totqno','$data12','$data13','$opno','$testcode')");
if($data13>="1"){
$maxmar+=$data13;
$totmark+=$data13;
}
}



if($data2!=""){


$data2=str_replace("'","",$data2);
$data2=str_replace("&#65533", "", $data2);
$data2=strip_tags($data2);
$data2=preg_replace("/<.*?>/", "", $data2);
$data2=str_replace(";", "", $data2);
$data2=rtrim($data2);

$data3=strtoupper($data3);

if($data3=="MULTIPLE SELECTION"){
$submi=1;
}
if($data3=="SINGLE SELECTION"){
$submi=0;
}


mysql_query("INSERT INTO dquestions(qno, ques, m, nob, testcode, submi)
      VALUES ('$totqno','$data2','$totmark','$opno','$testcode','$submi')");




		}

}



mysql_query("UPDATE dtest SET totalquestions='$totqno', maxmar='$maxmar' WHERE testcode='$testcode' ");



$query=unlink($docadd);

?>
<table bgcolor="ffff99" width="300"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="290"  >
<font color=green size="3" style=arial >Questions added successfully.</font><br>
</td>
</tr></table><br>
<?php
 }
else {
//Gives and error if its not
echo "Sorry, there is a problem to uploading excel file.<br>";
}

}


?>

<font color=666666 size=3 style=arial >

<br><br>
<font id="font1">Upload Excel file ( .xls only )</font> <br><br>
<input type="hidden" name="size" value="3500000">
<input type="file" name="xlsfile" ><br><br>
<input type="image" src="images/submit.jpg" alt="Submit button">  <a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>
</form>
<?php


}
if($qtype=="short"){





if($_FILES['xlsfile']['name']>''){

$targets = "xls/";
$targets = $targets . basename( $_FILES['xlsfile']['name']);
$docadd=($_FILES['xlsfile']['name']);
if(move_uploaded_file($_FILES['xlsfile']['tmp_name'], $targets))
{
 
$docadd="xls/".$docadd;


$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$totqno=$row['totalquestions'];
$maxmar=$row['maxmar'];
}


require_once 'Excel/reader.php';
$data = new Spreadsheet_Excel_Reader();
$data->read($docadd);

error_reporting(E_ALL ^ E_NOTICE);

for ($j = 1; $j <= $data->sheets[0]['numRows']; $j++)
		 {
	$data1=$data->sheets[0]['cells'][$j+1][1];

	$data2=$data->sheets[0]['cells'][$j+1][2];

	$data3=$data->sheets[0]['cells'][$j+1][3];

	$data4=$data->sheets[0]['cells'][$j+1][4];

	$data5=$data->sheets[0]['cells'][$j+1][5];


$opno=1;


if($data2!=""){
$totqno+=1;



$data2=str_replace("'"," ",$data2);

$data2=rtrim($data2);


mysql_query("INSERT INTO dquestions(qno, ques, ans, m, mr, testcode)
      VALUES ('$totqno','$data2','$data3','$data4','$data5','$testcode')");
$maxmar+=$data4;

		}
}



mysql_query("UPDATE dtest SET totalquestions='$totqno', maxmar='$maxmar' WHERE testcode='$testcode' ");

$query=unlink($docadd);

?>
<table bgcolor="ffff99" width="300"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>
<td width="290"  >
<font color=green size="3" style=arial >Questions added successfully.</font><br>
</td>
</tr></table><br>
<?php
 }
else {
//Gives and error if its not
echo "Sorry, there is a problem to uploading excel file.<br>";
}

}


?>
<font color=666666 size=3 style=arial >

<br><br>
<font id="font1">Upload Excel file ( .xls only )</font> <br><br>
<input type="hidden" name="size" value="3500000">
<input type="file" name="xlsfile" ><br><br>
<input type="image" src="images/submit.jpg" alt="Submit button"> <a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>
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
