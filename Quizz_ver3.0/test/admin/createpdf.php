<?php
include 'dbc.php';
$groupname=$_POST['groupname'];
$groupname= str_replace('<','',$groupname);
$groupname= str_replace('>','',$groupname);
$testcode=$_POST['testname'];
$testcode= str_replace('<','',$testcode);
$testcode= str_replace('>','',$testcode);
include ('class.ezpdf.php');
$pdf =& new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');


$pdf->ezText("Test name",8);


$query = "SELECT * FROM dresult WHERE groupname='$groupname' AND testname='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$testcode=$row['testcode'];
$testname=$row['testname'];
$date=$row['date'];
$cans=$row['cans'];

$pdf->ezText($testname . $date . $cans ."\n",8);


}



$pdf->output();
$pdf->ezStream();
?>
