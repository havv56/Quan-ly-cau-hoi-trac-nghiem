<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dmember WHERE id='$id' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==1)
{


$testcode=$_GET['testcode'];
$query = "SELECT ti FROM dtest WHERE testcode='$testcode' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))
{
$ti=$row['ti'];
}


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
?>
<?php

$testcode=$_GET['testcode'];


$qno=$_GET['qno'];

$answer2=$_POST['answer2'];
$nob2=$_POST['nob2'];






$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$user=$row['user'];
$groupname=$row['groupname'];
}



$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
{

mysql_query("UPDATE dmember SET hack='1' WHERE user='$user' AND id='$id' "); 

mysql_query("UPDATE dmember SET hackreason='Edit test url' WHERE user='$user' AND id='$id' "); 

}



$query = "SELECT * FROM dquestions WHERE qno='$qno' AND testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
{

mysql_query("UPDATE dmember SET hack='1' WHERE user='$user' AND id='$id' "); 

mysql_query("UPDATE dmember SET hackreason='Edit test url' WHERE user='$user' AND id='$id' "); 


}
$query = "SELECT * FROM dtest WHERE testcode='$testcode' ";
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$testname=$row['testname'];
$chrd=$row['chrd'];
$testcode=$row['testcode'];
$totalquestions=$row['totalquestions'];
$ti=$row['ti'];
$maxmar=$row['maxmar'];
}


$query = "SELECT * FROM dresult WHERE user='$user' AND testcode='$testcode' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
{

include 'servertime.php';
$starttime=$servertime;


$sql="INSERT INTO dresult(user, testname, testcode, maxmar, starttime, lasttime, ti, totalquestions, attempt)
VALUES
('$user','$testname','$testcode','$maxmar','$starttime','$starttime','$ti','$totalquestions','1')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

mysql_query("UPDATE dresult SET cans='0' WHERE user='$user' AND testcode='$testcode' "); 
mysql_query("UPDATE dresult SET groupname='$groupname' WHERE user='$user' AND testcode='$testcode' "); 
mysql_query("UPDATE dresult SET result='N/A' WHERE user='$user' AND testcode='$testcode' "); 





}






if($nob2!=""){


$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)!=0)
{


$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$di=$row['m'];
}

$query = "SELECT * FROM dresult WHERE testcode='$testcode' AND user='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$cans=$row['cans'];
}
$cans-=$di;

mysql_query("UPDATE dresult SET cans='$cans' WHERE user='$user' AND testcode='$testcode' "); 



mysql_query("DELETE FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' "); 
mysql_query("DELETE FROM daoptions WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' "); 

}



$sql="INSERT INTO danswer(userid, qno, m, testcode)
VALUES
('$user','$qno','0','$testcode')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$query = "SELECT * FROM dquestions WHERE qno='$qno' AND testcode='$testcode' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$submi=$row['submi'];
}

if($submi=="1"){


for ( $counter = 1; $counter<=$nob2; $counter++)
{
  if ($_POST['ans'.$counter]>'')
  {
    $ans=$_POST['ans'.$counter];
    $tmb=$_POST['tmb'.$counter];
$sql="INSERT INTO daoptions(userid, qno, obno, ob, m, testcode)
VALUES
('$user','$qno','$counter','$tmb','$ans','$testcode')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



$query = "SELECT m FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$m=$row['m'];
}
$m+=$ans;

mysql_query("UPDATE danswer SET m='$m' WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ");


}

}


}
if($submi=="0"){


  
    $ans=$_POST['ans'];
    



$query = "SELECT * FROM doptions WHERE qno='$qno' AND obno='$ans' AND testcode='$testcode' ";
   $result=mysql_query($query);


while($row = mysql_fetch_array($result))

 { 

$ob=$row['ob'];
$mk=$row['m'];


}




$sql="INSERT INTO daoptions(userid, qno, obno, ob, m, testcode)
VALUES
('$user','$qno','$ans','$ob','$mk','$testcode')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



$query = "SELECT m FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$m=$row['m'];
}
$m+=$mk;

mysql_query("UPDATE danswer SET m='$m' WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ");





}



$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$mi=$row['m'];
}

include 'servertime.php';
$ltime=$servertime;

mysql_query("UPDATE dresult SET lasttime='$ltime' WHERE user='$user' AND testcode='$testcode' "); 

$query = "SELECT * FROM dresult WHERE testcode='$testcode' AND user='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$cans=$row['cans'];
}
$cans+=$mi;

mysql_query("UPDATE dresult SET cans='$cans' WHERE user='$user' AND testcode='$testcode' "); 

$qno+=1;


}



if($answer2!=""){




$query = "SELECT * FROM dquestions WHERE testcode = '$testcode' AND qno='$qno' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$answer=$row['ans'];
$mr=$row['mr'];
$m=$row['m'];

}


$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)!=0)
{


$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$di=$row['m'];
}

$query = "SELECT * FROM dresult WHERE testcode='$testcode' AND user='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$cans=$row['cans'];
}
$cans-=$di;

mysql_query("UPDATE dresult SET cans='$cans' WHERE user='$user' AND testcode='$testcode' "); 

mysql_query("DELETE FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' "); 

}




if($answer2=="$answer"){

$sql="INSERT INTO danswer(userid, qno, answer, m, testcode)
VALUES
('$user','$qno','$answer2','$m','$testcode')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }

$qno+=1;

include 'servertime.php';
$ltime=$servertime;

mysql_query("UPDATE dresult SET lasttime='$ltime' WHERE user='$user' AND testcode='$testcode' "); 

$query = "SELECT * FROM dresult WHERE testcode='$testcode' AND user='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$cans=$row['cans'];
}
$cans+=$m;

mysql_query("UPDATE dresult SET cans='$cans' WHERE user='$user' AND testcode='$testcode' "); 
 

}


if($answer2!="$answer"){

$sql="INSERT INTO danswer(userid, qno, answer, m, testcode)
VALUES
('$user','$qno','$answer2','$mr','$testcode')";
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
$qno+=1;
include 'servertime.php';

$ltime=$servertime;

mysql_query("UPDATE dresult SET lasttime='$ltime' WHERE user='$user' AND testcode='$testcode' "); 

$query = "SELECT * FROM dresult WHERE testcode='$testcode' AND user='$user' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$cans=$row['cans'];
}

$cans+=$mr;

mysql_query("UPDATE dresult SET cans='$cans' WHERE user='$user' AND testcode='$testcode' "); 

}

}



include 'subtract.php';
include 'timeleft.php';


?>



<html>
<head>
<title>
<?php echo $title;?>

</title>

<script type="text/javascript">
//<![CDATA[
var time = null;
window.onload = function() {
	timerDisplay = document.getElementById('timer');
	time = parseFloat(timerDisplay.innerHTML);
        time = <?php echo $timeleft;?>;
	timerDisplay.innerHTML = time.toFixed(2).replace('.', ':');
	setInterval(countdown, 1000);
}
function countdown() {
	if(time > 0.01) {
		time -= 0.01;
		if(time%1 > 0.59) time = Math.floor(time) + 0.59;
		timerDisplay.innerHTML = time.toFixed(2).replace('.', ':');
	} else timerDisplay.innerHTML = "0:00";
}
//]]>
</script>


</head>

<body bgcolor="#E9E9E9" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

<center>
<?php
if($timeleft>0){?>
<meta http-equiv="Refresh" content="<?php echo $rtimeleft;?>; URL=taketest2.php?testcode=<?php echo $testcode;?>">
<?php
}
?>

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






<?php

if($timeleft>0){


if($qno<=$totalquestions)
{


?>




<table align="center" width="100%" height=330 border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10"  >
</td>


<td width="60" valign=top >




<table width="72" height="25" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="32" >
<a href="account.php"><img src="admin/images/home.jpg" border="0"></a>
</td><td width="40" >
<a href="account.php">
<font color="666666" size="3">
<b>Home</b></a>
</td>
</tr></table>



<br>





<?php


$query="SELECT * FROM dquestions WHERE testcode='$testcode' ORDER BY ABS(qno) ASC "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<th bgcolor="000000" width="50"><font color="ffffff">Q no.</th>
</tr>

<?php

while($row = mysql_fetch_array($result))

 {



echo "<tr>";?>
 
  <td <?php if($qno==$row['qno']){?>  bgcolor=ffcccc  <?php } 

if($qno!=$row['qno']){

?>
bgcolor=ccff99 
<?php

}

?>
><center>

  <center><a href="taketest2.php?testcode=<?php echo $row['testcode'];?>&qno=<?php echo $row['qno'];?>&testend=0"><font color="666666">
<?php echo $row['qno'];?></a>
<?php

echo "</td>";

echo "</tr>";

  }




?>








</table>
<br>
<a href="result.php?testcode=<?php echo $testcode;?>&testend=1"><font color=maroon size="3"><img src="admin/images/end.png" border="0"></a>


</td>

<td width="110" valign=top >
</td>
<td width="800" valign=top >

Time left: <span id="timer"><?= $timeleft ?></span>  Minutes



<br>
<br>

<?php
if($_GET['testend']>''){
$testend=$_GET['testend'];
if($testend=="1"){
echo "<font color=red size=3 style=arial >Click on <b>End Test</b> Button to submit your test.<br></font>";


}
}
?>
<br>

<form method="post" action="taketest2.php?testcode=<?php echo $testcode;?>&qno=<?php echo $qno;?>&testend=0">

<?php




$query = "SELECT * FROM dquestions WHERE qno='$qno' AND testcode='$testcode' LIMIT 1";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
echo "Q".  $row['qno'] ." )<br><br> " .$row['ques'] . "<br><br>" ; 


$ans=$row['ans'];


$nob=$row['nob'];

  }





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
  <param name="movie" value="admin/<?php echo $imgadr;?>" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
     <embed src="admin/<?php echo $imgadr;?>"
      quality="high"
      type="application/x-shockwave-flash"
      WMODE="transparent"
      width="735"
      height="150"
      pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object><br><br>

<?php
}


if($filetype=="txt"){
?>


<textarea rows="15" cols="75" name="filedata" ><?php $myFile="admin/".$imgadr; 

$fh = fopen($myFile, 'r');
$theData = fread($fh, 5000);
fclose($fh);
echo $theData;

?></textarea><br><br>

<?php
}


if($filetype=="mp3" OR $filetype=="wmv" OR $filetype=="flv"){
?>

<embed src="admin/<?php echo $imgadr;?>" autostart="true" loop="false"><br><br>


<?php
}


 }

}


if($ans!=""){


?>
Answer: <input type="text" size="35" name="answer2" value="
<?php  
$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);
if(mysql_num_rows($result)!=0)
 {

$query = "SELECT answer FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$ansp=$row['answer'];
}
echo $ansp;
}
 ?>


"><br><br><br><?php
}

if($ans==""){




$query = "SELECT * FROM dquestions WHERE qno='$qno' AND testcode='$testcode' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$submi=$row['submi'];
}




if($submi=="1"){


$query = "SELECT * FROM doptions WHERE qno='$qno' AND testcode='$testcode' ORDER BY ABS(obno) ASC ";
   $result=mysql_query($query);


while($row = mysql_fetch_array($result))

 { 
echo "". $row['obno'] .") ";

 
?>
<input type="checkbox" name="ans<?php echo $row['obno']; ?>"  value="<?php echo $row['m']; ?>">
<input type="hidden" name="tmb<?php echo $row['obno']; ?>" value="<?php echo $row['ob']; ?>">
<?php
echo "". $row['ob'] . "<br><br>" ;





  }




}
if($submi=="0"){


$query = "SELECT * FROM doptions WHERE qno='$qno' AND testcode='$testcode' ORDER BY ABS(obno) ASC ";
   $result=mysql_query($query);


while($row = mysql_fetch_array($result))

 { 
echo "". $row['obno'] .") ";

 

?>

<input type="radio" name="ans"  value="<?php echo $row['obno']; ?>">


<?php
echo "". $row['ob'] . "<br><br>" ;



}

}







$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)!=0)
{
?><br>
You selected:<br><br>
 




<?php



$query = "SELECT * FROM daoptions WHERE qno='$qno' AND testcode='$testcode' AND userid='$user' ORDER BY ABS(obno) ASC  ";
   $result=mysql_query($query);


while($row = mysql_fetch_array($result))

 { 
echo "". $row['obno'] .") ";
echo "". $row['ob'] ."<br><br>";

}

}

}

?>

<input type=hidden name=nob2 value="<?php echo $nob;?>">


<input type="image" src="admin/images/submit.jpg" alt="Submit button">


</form>



<br>



<table bgcolor="ffffff" width="700"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="350"  >



</td>
<td width="350"  >


</td></tr></table>





<br><br>

<?php
}
if($qno>$totalquestions)
{
?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=taketest2.php?testcode=<?php echo $testcode;?>&qno=1&testend=1">

<?php


}
}
if($timeleft<=0)
{
?>
<br>
<center>

<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="558"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b></b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table>
<table width="580" height="60" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="3"  background="admin/images/g1.jpg"  >
</td>
<td width="575"  bgcolor="ffffff"  >
<font color="666666" size="3">
<center>
<table width="575" height="60" border="0" cellspacing="0" cellpadding="0">


<tr>
<td width="575" height="60" bgcolor="ffffff"  >
<font color="red">
Time over!
<br>
<a href="result.php?testcode=<?php echo $testcode;?>&testend=1"><font color=666666 size="3">View result</a>
&nbsp;&nbsp;
<a href="account.php"><font color=666666 size="3">Go to home</a>
<br><br>
</td>

</tr>



</table>


</td>
<td width="2"  background="admin/images/g2.jpg"  >
</td>
</tr></table>
<table width="580" height="2" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="580"  background="admin/images/g3.jpg">
</td>
</tr></table>
<br><br>




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