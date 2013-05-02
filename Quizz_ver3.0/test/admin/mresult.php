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
?>
<html>
<head>
<title>
Results

</title>
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

$testcode=$_GET['testcode'];




$user2=$_GET['member'];


$qno=$_GET['qno'];
$view=$_GET['view'];

?>

<br>
<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="images/bgn2.jpg"  >
</td>
<td width="558"  background="images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Answers</b>
</td>
<td width="11"  background="images/bgn3.jpg"  >
</td>
</tr></table>
<br>


<?php
if($view!=""){













$query = "SELECT * FROM dtest WHERE testcode = '$view' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];

}



$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$view' AND userid='$user2' LIMIT 1";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$answer=$row['answer'];

}



$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$view' AND userid='$user2' LIMIT 1";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$answer=$row['answer'];
$m=$row['m'];

}




if($m>0)
{
echo " <img src=images/Check-icon.png border=0><br>"; 

echo "<font color=green>User have Positive ";
echo " Point ( ". $m." )"; 

}

if($m<=0)
{

echo " <img src=images/delete.png border=0><br>"; 

echo "<font color=red>User have Negative or Zero ";
echo " Point ( ". $m." )"; 


}


?>
<br><br>

<font color="666666">

<?php
$query = "SELECT * FROM dquestions WHERE qno='$qno' AND testcode='$view' LIMIT 1";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
echo "Q".  $qno ." ) " .$row['ques'] . "<br><br>" ; 
$ob=$row['ob'];
$ans=$row['ans'];
$m=$row['m'];
$mr=$row['mr'];

  }





$query = "SELECT * FROM dimages WHERE qno='$qno' AND testcode='$view' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{


$query = "SELECT * FROM dimages WHERE qno='$qno' AND testcode='$view' ";
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
Correct Answer: <b><?php echo $ans;?></b><br><br>

"<?php echo $user2;?>" selected: <b><?php echo $answer;?>
<?php

?>
<br><br>
</b>
Marks for correct answer: <b><?php echo $m;?></b><br>
Marks for wrong answer: <b><?php echo $mr;?></b><br>

<br><br><?php

if($answer==""){

echo "<font color=red >You didn't attempt this question!</font>";

}


}

if($ans==""){







$query = "SELECT * FROM doptions WHERE qno='$qno' AND testcode='$view' ORDER BY ABS(obno) ASC  ";
   $result=mysql_query($query);


while($row = mysql_fetch_array($result))

 {
echo "". $row['obno'] .") ";?>

<?php
echo " <b>". $row['ob'] . "</b><br> Marks: <b>".$row['m']." </b><br><br>" ;
$nob=$row['nob'];

  }

?>
"<?php echo $user2;?>" selected:<br><b>
<?php

$query = "SELECT * FROM daoptions WHERE qno='$qno' AND testcode='$view' AND userid='$user2'  ORDER BY ABS(obno) ASC  ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
echo $row['obno'].") ";
echo $row['ob']."<br>";
}


$query = "SELECT * FROM daoptions WHERE qno='$qno' AND testcode='$view' AND userid='$user2'  ORDER BY ABS(obno) ASC  ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
 {
echo "<font color=red >You didn't attempt this question!</font>";
}


?>

<br><br>


<?php

}


?></b>
<?php if($qno!=1){?></b>

<a href="mresult.php?view=<?php echo $view;?>&qno=<?php $hqno=$qno;$hqno-=1; echo $hqno;?>&member=<?php echo $user2;?>">
<img src="images/back.jpg" border="0"></a>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}
?>
<?php if($qno<$totalquestions){?>

<a href="mresult.php?view=<?php echo $view;?>&qno=<?php $iqno=$qno;$iqno+=1; echo $iqno;?>&member=<?php echo $user2;?>">
<img src="images/next.jpg" border="0"></a>
<?php
}
?><br><br>
<a href="mresult.php?testcode=<?php echo $view;?>&member=<?php echo $user2;?>"><u><font color="maroon">Back to index</u></a>


<br><br><?php









}

if($view==""){

$query="SELECT * FROM dquestions WHERE testcode='$testcode' ORDER BY ABS(qno) ASC "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<th bgcolor="000000" width="50"><font color="ffffff">Q no.</th>
<th bgcolor="000000" width="330"><font color="ffffff">Question</th>
<th bgcolor="000000" width="50"><font color="ffffff">View</th>
</tr>

<?php

while($row = mysql_fetch_array($result))

 {

?>

<tr onMouseOver="this.bgColor = '#e9e9e9'"
    onMouseOut ="this.bgColor = '#FFFFcc'"
    bgcolor="#FFFFcc">
 
<td ><center><a href="mresult.php?view=<?php echo $row['testcode'];?>&qno=<?php echo $row['qno'];?>&member=<?php echo $user2;?>">
<font color="666666" size="3"><?php echo $row['qno'];?> </a></td>
<td >&nbsp;&nbsp;<a href="mresult.php?view=<?php echo $row['testcode'];?>&qno=<?php echo $row['qno'];?>&member=<?php echo $user2;?>">
<font color="666666" size="3"><?php echo $row['ques'];?> </a></td>
<td ><center><a href="mresult.php?view=<?php echo $row['testcode'];?>&qno=<?php echo $row['qno'];?>&member=<?php echo $user2;?>">
<font color="666666" size="3"><img src="images/view.jpg" border="0"></a></td>


<?php

echo "</tr>";

  }


?>

</table>
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

