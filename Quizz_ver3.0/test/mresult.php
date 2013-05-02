<?php
session_start();
if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
include 'dbc.php';

$query = "SELECT id FROM dmember WHERE id='$id' ";
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


<td width="150"  valign=top>
<?php
include 'menu.php';
?>



</td><td width="30"  >
</td>

<td width="430" valign=top ><br>







<?php

$testcode=$_GET['testcode'];


include 'dbc.php';

$query = "SELECT * FROM dmember WHERE id='$id' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$user=$row['user'];
}



$qno=$_GET['qno'];
$view=$_GET['view'];

?>


<table width="580" height="35" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="11"  background="admin/images/bgn2.jpg"  >
</td>
<td width="558"  background="admin/images/bgn1.jpg"  >
<font color="ffffff" size="3">
<font color="666666" size="3">
<b>Tr&#7843; l&#7901;i</b>
</td>
<td width="11"  background="admin/images/bgn3.jpg"  >
</td>
</tr></table><br>


<font color=666666>



<?php
if($view!=""){













$query = "SELECT * FROM dtest WHERE testcode = '$view' ";
   $result=mysql_query($query);
while($row = mysql_fetch_array($result))

 {
$totalquestions=$row['totalquestions'];

}



$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$view' AND userid='$user' LIMIT 1";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$answer=$row['answer'];

}



$query = "SELECT * FROM danswer WHERE qno='$qno' AND testcode='$view' AND userid='$user' LIMIT 1";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
$answer=$row['answer'];
$m=$row['m'];

}




if($m>0)
{
echo " <img src=admin/images/Check-icon.png border=0><br>"; 

echo "<font color=green>You have Positive ";
echo " Point ( ". $m." )"; 

}

if($m<=0)
{

echo " <img src=admin/images/delete.png border=0><br>"; 

echo "<font color=red>You have Negative or Zero ";
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
&#272;&#225;p &#225;n &#273;&#250;ng: <b><?php echo $ans;?></b><br><br>

B&#7841;n ch&#7885;n: <b><?php echo $answer;?>
<?php

?>
<br><br>
</b>
&#272;i&#7875;m cho c&#226;u &#273;&#250;ng: <b><?php echo $m;?></b><br>
&#272;i&#7875;m cho c&#226;u sai: <b><?php echo $mr;?></b><br>

<br><br><?php

if($answer==""){

echo "<font color=red >Kh&#244;ng thu th&#7853;p &#273;&#432;&#7907;c d&#7919; li&#7879;u!</font>";

}



}

if($ans==""){







$query = "SELECT * FROM doptions WHERE qno='$qno' AND testcode='$view'  ORDER BY ABS(obno) ASC ";
   $result=mysql_query($query);


while($row = mysql_fetch_array($result))

 {
echo "". $row['obno'] .") ";?>

<?php
echo " <b>". $row['ob'] . "</b><br> Marks: <b>".$row['m']." </b><br><br>" ;
$nob=$row['nob'];

  }

?>
B&#7841;n ch&#7885;n:<br><b>
<?php

$query = "SELECT * FROM daoptions WHERE qno='$qno' AND testcode='$view' AND userid='$user'  ORDER BY ABS(obno) ASC  ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {
echo $row['obno'].") ";
echo $row['ob']."<br>";
}

$query = "SELECT * FROM daoptions WHERE qno='$qno' AND testcode='$view' AND userid='$user'  ORDER BY ABS(obno) ASC  ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)==0)
 {
echo "<font color=red >Kh&#244;ng thu th&#7853;p &#273;&#432;&#7907;c!</font>";
}
?>



<br><br>


<?php

}


?></b>
<?php if($qno!=1){?></b>

<a href="mresult.php?view=<?php echo $view;?>&qno=<?php $hqno=$qno;$hqno-=1; echo $hqno;?>">
<img src="admin/images/back.jpg" border="0"></a>


&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
}
?>
<?php if($qno<$totalquestions){?>

<a href="mresult.php?view=<?php echo $view;?>&qno=<?php $iqno=$qno;$iqno+=1; echo $iqno;?>">
<img src="admin/images/next.jpg" border="0"></a>
<?php
}
?><br><br>
<a href="mresult.php?testcode=<?php echo $view;?>"><u><font color="maroon">V&#7873; trang ch&#7911;</u></a>


<br><br><?php









}

if($view==""){

$query="SELECT * FROM dquestions WHERE testcode='$testcode' ORDER BY ABS(qno) ASC "; 
$result=mysql_query($query);


?>
<table border="0" bordercolor="990000">
<tr>
<th bgcolor="000000" width="50"><font color="ffffff">S&#7889; c&#226;u.</th>
<th bgcolor="000000" width="330"><font color="ffffff">C&#226;u h&#7887;i</th>
<th bgcolor="000000" width="50"><font color="ffffff">Xem</th>
</tr>

<?php

while($row = mysql_fetch_array($result))

 {



echo "<tr>
 
  <td bgcolor='cccccc'><center>" . $row['qno'] . "</td>
  <td bgcolor='ffff99'> " ;?> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['ques'] . "</td>
 
  <td bgcolor='cccccc'><center>";?>

  <center><a href="mresult.php?view=<?php echo $row['testcode'];?>&qno=<?php echo $row['qno'];?>">
<font color="990000" size="3"><img src="admin/images/view.jpg"  border="0"></a> 

<?php

echo "</td>";

echo "</tr>";

  }


?>

</table>
<?php
}
?>


</td>

<td width="370" valign=top ><br>



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
