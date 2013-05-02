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



$qty=$_GET['qty'];

$testcode=$_GET['testcode'];

$qno=$_GET['qno'];
?>
<html>
<head>
<title>
Edit Quest TesT

</title>

<script type="text/javascript" src="editor.js"></script>



<script language="JavaScript" type="text/javascript" src="html2xhtml.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="richtext_compressed.js"></script>




<script type="text/javascript"><!--
    function doAction(val){
        //Forward browser to new url
        window.location='editques2.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>&qty=<?php echo $qty;?>&txop=' + val;
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














<?php














@$updateimg=$_POST['updateimg'];
@$submi=$_POST['submi'];

@$qtype=$_POST['qtype'];
@$nob=$_POST['nob'];
@$ques=$_POST['hiddencontent'];
@$obno=$_POST['obno'];
@$answer=$_POST['answer'];
@$m=$_POST['m'];
@$mr=$_POST['mr'];
@$imageno=$_POST['imageno'];
@$qpost=$_POST['qpost'];













if($qpost=="1")
{

if($ques!=""){
$fne="";
$qech=$ques;

$qech=str_replace("<br>", "", $qech);

if($qech==""){
$fne="<br><font color=red size=3> Question field empty!<br>";
}






if($fne==""){



if($answer!=""){

$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];
$maxmar=$row['maxmar'];
}



$totalquestions+=1;

mysql_query("UPDATE dtest SET totalquestions='$totalquestions' WHERE testcode='$testcode' ");




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



$totalquestions+=1;

mysql_query("UPDATE dtest SET totalquestions='$totalquestions' WHERE testcode='$testcode' ");





$query = mysql_query("INSERT INTO dquestions(qno, ques, nob, submi, testcode)
      VALUES  ('$qno','$ques','$nob','$submi','$testcode')");

$k=0;

for ( $counter = 1; $counter<=$nob; $counter++)
{
  if ($_POST['ob'.$counter]>'')
  {
    $ob=$_POST['ob'.$counter];
    $m=$_POST['m'.$counter];
   
if($m>='1'){
$k+=$m;
}

$query = mysql_query("INSERT INTO doptions(qno, obno, ob, m, testcode)
      VALUES  ('$qno','$counter','$ob','$m','$testcode')");

  }
}


$maxmar+=$k;

mysql_query("UPDATE dtest SET maxmar='$maxmar' WHERE testcode='$testcode' ");

mysql_query("UPDATE dquestions SET m='$k' WHERE testcode='$testcode' AND qno='$qno'  ");


?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=edittest0.php?testcode=<?php echo $testcode;?>">
<br><font color=666666 size=3>If this page appears for more than five seconds, <a href="edittest0.php?testcode=<?php echo $testcode;?>"><font color=666666 size=3>click here to redirect.</a><br><br>
<?php

}
}

else
{

echo $fne;
echo "</font>";


}
}

}









if($qtype=="text"){
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


<form name="RTEDemo" action="editques2.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>" method="post" onsubmit="return submitForm();">

<?php

echo "<br>Question No. $qno)";



?>

<input type="hidden" name="qtype" value="<?php echo $qtype;?>" >


<input type="hidden" name="qpost" value="1" >






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
    displayEditor('content', '<?php echo $ques;?>', 495, 150); 
//-->
</script>
</td>
</tr></table>









 



<br><br>




Answer: <input type="text" name="answer" size="38"  value="<?php echo $answer;?>" ><br><br>


Points for correct answer <select name=m>
   

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
   <option value='0' selected>0</option>
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
   <option value='0' selected>0</option>
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
if($imageno!=""){
?>

<iframe src="upload.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>" width="700" height="120" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>
<input type="hidden" name="updateimg" value="1">

<?php


}?>

<br>
<input type="image" src="images/submit.jpg" alt="Submit button"> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>
 </form>




<br><br>
<?php

}

if($qtype=="objective"){



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






<form name="RTEDemo" action="editques2.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>" method="post" onsubmit="return submitForm();">

<?php

echo "<br>Question No. $qno)";



?>


<input type="hidden" name="qtype" value="<?php echo $qtype;?>" >


<input type="hidden" name="qpost" value="1" >






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
    displayEditor('content', '<?php echo $ques;?>', 495, 150); 
//-->
</script>
</td>
</tr></table>






 
<input type="hidden" name="nob" value="<?php echo $nob;?>">
<br><br>
<?php
    for ($i=1; $i<=$nob; $i++)
    {
echo "Option $i)";

?> <br>


<textarea rows="2" cols="55" name="<?php echo "ob".$i;?>" ></textarea>




Points <select name=<?php echo "m".$i;?>>
   

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
   <option value='0' selected>0</option>
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
   ?>
<?php
if($imageno!=""){

?><iframe src="upload.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>" width="700" height="120" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" hspace="0" allowtransparency="true"></iframe>
<input type="hidden" name="updateimg" value="1">
<?php
}?>
<input type="hidden" name="submi" value="<?php echo $submi;?>">
<br>

<input type="image" src="images/submit.jpg" alt="Submit button"> &nbsp; &nbsp; &nbsp; &nbsp;
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>
 
</form>













<?php

}












if($qty=="1"){

@$txop=$_GET['txop'];

?>
<form method="post" action="editques2.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>">




<br>

<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Question Configuration</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>

<font color=666666 size=3>

Select question type: 
<select onchange="doAction(this.value);">

<option value="">Select One</option>
<option value="text" <?php
if($txop=="text"){ echo "selected";}
?> >Text field</option>
<option value="objective" <?php
if($txop=="objective"){ echo "selected";}
?> >Optional (MCQ)</option></select>
<br><br>

<?php
if($txop=="text"){
?>
<input type="hidden" name="qtype" value="text">



Attach any file ( jpg, gif, png, flv, wmv, mp3 )  
<select name="imageno">
<option value='yes'>Yes</option>
<option value=''>No</option>
    
   </select>
<?php
}
if($txop=="objective"){

?>
<input type="hidden" name="qtype" value="objective">

Select no. of options required 
<input type="hidden" name="qno" value="<?php echo $qno;?>">
<select name="nob">
<?php
    for ($i=2; $i<=100; $i++)
    {
     echo "<option value='$i'>$i</option>";
    }
   ?>
   </select>



<br><br>


Select options type 
<select name="submi">
<option value='0'>Single selection</option>
<option value='1'>Multiple-selection</option>
    
   </select>
<br><font color=cococo size=3>

Single selection allows user to choose one option as answer<br>
Multiple selection allows user to choose more than one options as answer

<br><br>
<font color=666666 size=3>


Attach any file ( jpg, gif, png, flv, wmv, mp3 )  
<select name="imageno">
<option value='yes'>Yes</option>
<option value=''>No</option>
    
   </select>

<?php
}
?>
<br><br>
<?php
if($txop!=""){?>
<input type="image" src="images/next.jpg" alt="Submit button">
<?php
}
?>
&nbsp;
<a href="edittest0.php?testcode=<?php echo $testcode;?>"><img src="images/back.jpg" border="0"></a>


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
