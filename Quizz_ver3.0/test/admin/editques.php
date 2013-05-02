<?php
session_start();
if(isset($_SESSION['id'])){
$user=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dadmin WHERE id='$user' ";
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
Edit Quest

</title>
<script type="text/javascript">
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
</script>

<script type="text/javascript" src="editor.js"></script>






</head>

<body  bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

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














<?php

$qno=$_GET['qno'];
$testcode=$_GET['testcode'];



$query = "SELECT ans FROM dquestions WHERE testcode='$testcode' AND qno='$qno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$ans=$row['ans'];
}
if($ans==""){
$qtype="objective";
}
if($ans!=""){
$qtype="text";
}


$nob=$_POST['nob'];
$submi=$_POST['submi'];
$ques=$_POST['hiddencontent'];

if($ques!=""){
$ques=strip_tags($ques);
$ques=preg_replace("/<.*?>/", "", $ques);
$ques=str_replace("<", "", $ques);
$ques=str_replace(">", "", $ques);
}

$obno=$_POST['obno'];
$answer=$_POST['answer'];
$m=$_POST['m'];
$mr=$_POST['mr'];
$imageno=$_POST['imageno'];

$srno=$_GET['srno'];


if($srno!=""){



$query = "SELECT * FROM dimages WHERE srno='$srno' AND testcode='$testcode' AND qno='$qno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$imageaddress=$row['imageaddress'];
}

mysql_query("DELETE FROM dimages WHERE srno='$srno' AND testcode='$testcode' AND qno='$qno' ");


$dlimg=unlink($imageaddress);

 

echo "<font color=green>Deleted</font>";
}




if($ques!=""){



if($answer!=""){




$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];
$maxmar=$row['maxmar'];
}

$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno'  ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$mold=$row['m'];
}
$maxmar-=$mold;


mysql_query("DELETE FROM dquestions WHERE testcode='$testcode' AND qno='$qno' ");




$query = mysql_query("INSERT INTO dquestions(qno, ques, ans, m, mr, testcode)
VALUES
('$qno','$ques','$answer','$m','$mr','$testcode')");


$maxmar+=$m;

mysql_query("UPDATE dtest SET maxmar='$maxmar' WHERE testcode='$testcode' ");



?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=edittest0.php?testcode=<?php echo $testcode;?>">
<br><font color=666666 size=3>If this page appears for more than five seconds, 
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><font color=666666 size=3>click here to redirect.</a><br><br>
<?php
}




if($answer==""){


$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];
$maxmar=$row['maxmar'];
}

$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno'  ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$mold=$row['m'];
}

$maxmar-=$mold;

mysql_query("DELETE FROM dquestions WHERE testcode='$testcode' AND qno='$qno' ");
mysql_query("DELETE FROM doptions WHERE testcode='$testcode' AND qno='$qno' ");




$query = mysql_query("INSERT INTO dquestions(qno, ques, nob, submi, testcode)
      VALUES  ('$qno','$ques','$nob','$submi','$testcode')");

$k=0;

for ( $counter = 1; $counter<=$nob; $counter++)
{
  if ($_POST['ob'.$counter]>'')
  {
    $ob=$_POST['ob'.$counter];
    $m=$_POST['m'.$counter];
   

 
if($m>="1"){
$k+=$m;
}



$query = mysql_query("INSERT INTO doptions(qno, obno, ob, m, testcode)
      VALUES  ('$qno','$counter','$ob','$m','$testcode')");

  }
}

$maxmar+=$k;

mysql_query("UPDATE dtest SET maxmar='$maxmar' WHERE testcode='$testcode' ");
mysql_query("UPDATE dquestions SET m='$k' WHERE testcode='$testcode' AND qno='$qno' ");


?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=edittest0.php?testcode=<?php echo $testcode;?>">
<br><font color=666666 size=3>If this page appears for more than five seconds, 
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><font color=666666 size=3>click here to redirect.</a><br><br>
<?php

}
}








if($qtype=="text"){


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$ques=$row['ques'];

}

?>
<br>




<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Text field question</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>
<font color=666666 size=3>


<form name="RTEDemo" action="editques.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>" method="post" onsubmit="return submitForm();">


<?php

echo "<br>Question No. $qno)";




?> 




<br><br>





<table bgcolor="e9e9e9" width=500 border=0 ><tr>

<td width=30 ><a href= "javascript:editorCommand('content', 'bold', '')" ><img src="images/bold.gif" width="25" height="24" alt="Bold" title="Bold"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'underline', '')" ><img  src="images/underline.gif" width="25" height="24" alt="Underline" title="Underline"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'italic', '')" ><img  src="images/italic.gif" width="25" height="24" alt="Italic" title="Italic"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'justifyleft', '')" ><img  src="images/j_left.gif" width="25" height="24" alt="Align Left" title="Align Left"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'justifycenter', '')" ><img src="images/j_center.gif" width="25" height="24" alt="Align Center" title="Align Center"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'justifyright', '')" ><img src="images/j_right.gif" width="25" height="24" alt="Align Right" title="Align Right"></a> </li>

<td width=380 >
</tr>
</table>
<table width=600 height=150 border=0 >
<tr><td width=600 height=150 >

<script language= "JavaScript" type= "text/javascript" >
<!--
function submitForm() {
 updateEditor('content');
  return true;
}

initiateEditor();
//-->
</script>
<script language= "JavaScript" type= "text/javascript" >
    //this calles displayEditor function. Parametars are (textarea name, textarea  width, textarea  height)
    displayEditor('content','<?php echo $ques;?>', 495, 150); 
//-->
</script>
</td>
</tr></table>








<br><br>


<?php


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {

?>

Answer: <input type="text" name="answer" size="38" value=<?php echo $row['ans'];?>><br><br>


Points for correct answer <select name=m>
   
<option value="<?php echo $row['m'];?>" selected ><?php echo $row['m'];?></option>

     <option value='-10'>-10</option>
   <option value='-9'>-9</option>
   <option value='-8'>-8</option>
   <option value='-7'>-7</option>
   <option value='-6'>-6</option>
   <option value='-5'>-5</option>
   <option value='-4'>-4</option>
   <option value='-3'>-3</option>
   <option value='-2'>-2</option>
   <option value='-1'>-1</option>

   <option value='-0.5'>-0.5</option>
   <option value='-0.3'>-0.3</option>
   <option value='0'>0</option>
   <option value='1'>1</option>
   <option value='2'>2</option>
    <option value='3'>3</option>
   <option value='4'>4</option>
    <option value='5'>5</option>
   <option value='6'>6</option>
    <option value='7'>7</option>
   <option value='8'>8</option>
    <option value='9'>9</option>
   <option value='10'>10</option>
      
   </select>
&nbsp;&nbsp;&nbsp;

Points for wrong answer <select name=mr>
   
<option value="<?php echo $row['mr'];?>" selected ><?php echo $row['mr'];?></option>

     <option value='-10'>-10</option>
   <option value='-9'>-9</option>
   <option value='-8'>-8</option>
   <option value='-7'>-7</option>
   <option value='-6'>-6</option>
   <option value='-5'>-5</option>
   <option value='-4'>-4</option>
   <option value='-3'>-3</option>
   <option value='-2'>-2</option>
   <option value='-1'>-1</option>

   <option value='-0.5'>-0.5</option>
   <option value='-0.3'>-0.3</option>
   <option value='0'>0</option>
   <option value='1'>1</option>
   <option value='2'>2</option>
    <option value='3'>3</option>
   <option value='4'>4</option>
    <option value='5'>5</option>
   <option value='6'>6</option>
    <option value='7'>7</option>
   <option value='8'>8</option>
    <option value='9'>9</option>
   <option value='10'>10</option>
      
   </select><br><br>
<?php





$query = "SELECT * FROM dimages WHERE qno='$qno' AND testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{


$query = "SELECT * FROM dimages WHERE qno='$qno' AND testcode='$testcode' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$imgadr=$row['imageaddress'];
$filetype=$row['filetype'];

if($filetype=="jpg" OR $filetype=="JPG" OR $filetype=="png" OR $filetype=="PNG" OR $filetype=="bmp" OR $filetype=="BMP"){

echo "<img src=admin/". $imgadr ." width=300 height=250 border=0><br><br> " ; 

}

if($filetype=="swf"){
?>

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="735" height="150">
  <param name="movie" value="<?php echo $imgadr;?>" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
     <embed src="<?php echo $imgadr;?>"
      quality="high"
      type="application/x-shockwave-flash"
      WMODE="transparent"
      width="735"
      height="150"
      pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object><br><br>

<a href="editques.php?srno=<?php echo $row['srno'];?>&testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>"><img src="images/delete.png" border="0"></a>
<br><br>

<?php
}


if($filetype=="txt"){
?>


<textarea rows="15" cols="75" name="filedata" ><?php $myFile=$imgadr; 

$fh = fopen($myFile, 'r');
$theData = fread($fh, 5000);
fclose($fh);
echo $theData;

?></textarea><br><br>

<a href="editques.php?srno=<?php echo $row['srno'];?>&testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>"><img src="images/delete.png" border="0"></a>
<br><br>

<?php
}


if($filetype=="mp3" OR $filetype=="wmv" OR $filetype=="flv"){
?>

<embed src="<?php echo $imgadr;?>" autostart="true" loop="false"><br><br>

<a href="editques.php?srno=<?php echo $row['srno'];?>&testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>"><img src="images/delete.png" border="0"></a>
<br><br>

<?php
}


 }

}












?>
<iframe src="upload.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>" width="700" height="120" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>

<br>
<input type="image" src="images/submit.jpg" alt="Submit button">

&nbsp;&nbsp;&nbsp;
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>


<br><br>
<?php

}

}

if($qtype=="objective"){




$restorequestion=$_GET['restorequestion'];
if($restorequestion=="1"){


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno' limit 1 ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$ques=$row['ques'];
}

$ques=strip_tags($ques);
$ques=preg_replace("/<.*?>/", "", $ques);
$ques=str_replace("<", "", $ques);
$ques=str_replace(">", "", $ques);

if($ques==""){
$ques="Question was empty, please retype your question here!";
}

mysql_query("UPDATE dquestions SET ques='$ques' WHERE testcode='$testcode' AND qno='$qno' ");



}




$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno' limit 1 ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {

$nob=$row['nob'];

$ques=$row['ques'];

}

?><br>




<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Optional type question</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>
<font color=666666 size=3>



<form name="RTEDemo" action="editques.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>" method="post" onsubmit="return submitForm();">


<?php

echo "<br>Question No. $qno)";


if($restorequestion=="1"){
echo "<br><br>";
?>

<textarea rows=5 cols=60 >
<?php
echo $ques;?>
</textarea><br><br>
<?php
echo "<font color=red >Copy above question and paste in below text box!</font>";
}
?> 


<br><br>

<table bgcolor="e9e9e9" width=500 border=0 ><tr>

<td width=30 ><a href= "javascript:editorCommand('content', 'bold', '')" ><img src="images/bold.gif" width="25" height="24" alt="Bold" title="Bold"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'underline', '')" ><img  src="images/underline.gif" width="25" height="24" alt="Underline" title="Underline"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'italic', '')" ><img  src="images/italic.gif" width="25" height="24" alt="Italic" title="Italic"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'justifyleft', '')" ><img  src="images/j_left.gif" width="25" height="24" alt="Align Left" title="Align Left"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'justifycenter', '')" ><img src="images/j_center.gif" width="25" height="24" alt="Align Center" title="Align Center"></a> </li>

<td width=30 ><a href= "javascript:editorCommand('content', 'justifyright', '')" ><img src="images/j_right.gif" width="25" height="24" alt="Align Right" title="Align Right"></a> </li>

<td width=380 >
</tr>
</table>

<?php
if($restorequestion!="1"){


$ques=strip_tags($ques);
$ques=preg_replace("/<.*?>/", "", $ques);
$ques=str_replace("<", "", $ques);
$ques=str_replace(">", "", $ques);


?>

<table width=600 height=150 border=0 >
<tr><td width=600 height=150 >

<script language= "JavaScript" type= "text/javascript" >
<!--
function submitForm() {
 updateEditor('content');
  return true;
}

initiateEditor();
//-->
</script>
<script language= "JavaScript" type= "text/javascript" >
    //this calles displayEditor function. Parametars are (textarea name, textarea  width, textarea  height)
    displayEditor('content','<?php echo $ques;?>', 495, 150); 
//-->
</script>
</td>
</tr></table>

<?php
}
if($restorequestion=="1"){
?>

<table width=600 height=150 border=0 >
<tr><td width=600 height=150 >

<script language= "JavaScript" type= "text/javascript" >
<!--
function submitForm() {
 updateEditor('content');
  return true;
}

initiateEditor();
//-->
</script>
<script language= "JavaScript" type= "text/javascript" >
    //this calles displayEditor function. Parametars are (textarea name, textarea  width, textarea  height)
    displayEditor('content','', 495, 150); 
//-->
</script>
</td>
</tr></table>

<?php
}
?>

<a href="editques.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>&restorequestion=1"><font color=red>Click here</a><font color=666666 >, Only if question is not visible.</br>


<font color=666666 >

<?php


$query = "SELECT * FROM dquestions WHERE testcode='$testcode' AND qno='$qno' limit 1 ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {

$nob=$row['nob'];


?> 
<input type="hidden" name="nob" value="<?php echo $row['nob'];?>">
<input type="hidden" name="submi" value="<?php echo $row['submi'];?>">
<br><br>

 <?php

}



    for ($i=1; $i<=$nob; $i++)
    {
echo "Option $i)";



$query = "SELECT * FROM doptions WHERE testcode='$testcode' AND qno='$qno' AND obno='$i' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {

?> <br>

<textarea rows="2" cols="55" name="<?php echo "ob".$i;?>" ><?php 

$ob=$row['ob'];
$ob=str_replace("&#65533", "", $ob);
$ob=strip_tags($ob);
$ob=preg_replace("/<.*?>/", "", $ob);
$ob=str_replace(";", "", $ob);

echo $ob; ?></textarea>



Points <select name=<?php echo "m".$i;?>>
   
<option value="<?php echo $row['m'];?>" selected ><?php echo $row['m'];?></option>

     <option value='-10'>-10</option>
   <option value='-9'>-9</option>
   <option value='-8'>-8</option>
   <option value='-7'>-7</option>
   <option value='-6'>-6</option>
   <option value='-5'>-5</option>
   <option value='-4'>-4</option>
   <option value='-3'>-3</option>
   <option value='-2'>-2</option>
   <option value='-1'>-1</option>

   <option value='-0.5'>-0.5</option>
   <option value='-0.3'>-0.3</option>
   <option value='0'>0</option>
   <option value='1'>1</option>
   <option value='2'>2</option>
    <option value='3'>3</option>
   <option value='4'>4</option>
    <option value='5'>5</option>
   <option value='6'>6</option>
    <option value='7'>7</option>
   <option value='8'>8</option>
    <option value='9'>9</option>
   <option value='10'>10</option>
      
   </select><br><br>




<?php



 }
}


   ?>
<?php





$query = "SELECT * FROM dimages WHERE qno='$qno' AND testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{


$query = "SELECT * FROM dimages WHERE qno='$qno' AND testcode='$testcode' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$imgadr=$row['imageaddress'];
$filetype=$row['filetype'];

if($filetype=="jpg" OR $filetype=="JPG" OR $filetype=="png" OR $filetype=="PNG" OR $filetype=="bmp" OR $filetype=="BMP"){

echo "<img src=". $imgadr ." width=300 height=250 border=0><br><br> " ; 

}

if($filetype=="swf"){
?>

<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="735" height="150">
  <param name="movie" value="<?php echo $imgadr;?>" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
     <embed src="<?php echo $imgadr;?>"
      quality="high"
      type="application/x-shockwave-flash"
      WMODE="transparent"
      width="735"
      height="150"
      pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object><br><br>

<a href="editques.php?srno=<?php echo $row['srno'];?>&testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>"><img src="images/delete.png" border="0"></a>
<br><br>

<?php
}


if($filetype=="txt"){
?>


<textarea rows="15" cols="75" name="filedata" ><?php $myFile=$imgadr; 

$fh = fopen($myFile, 'r');
$theData = fread($fh, 5000);
fclose($fh);
echo $theData;

?></textarea><br><br>

<a href="editques.php?srno=<?php echo $row['srno'];?>&testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>"><img src="images/delete.png" border="0"></a>
<br><br>

<?php
}


if($filetype=="mp3" OR $filetype=="wmv" OR $filetype=="flv"){
?>

<embed src="<?php echo $imgadr;?>" autostart="true" loop="false"><br><br>

<a href="editques.php?srno=<?php echo $row['srno'];?>&testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>"><img src="images/delete.png" border="0"></a>
<br><br>

<?php
}


 }

}










?><iframe src="upload.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>" width="700" height="120" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>

<br><input type="image" src="images/submit.jpg" alt="Submit button">

&nbsp;&nbsp;&nbsp;

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

