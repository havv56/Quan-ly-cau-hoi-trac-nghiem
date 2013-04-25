<?php
$query = "SELECT * FROM dresult WHERE user='$user' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres=mysql_num_rows($result);
/*
if(isset($_POST['tob'])){ $tob = $_POST['tob']; }
else{ $tob = NULL; }
*/
$tob="";

$query = "SELECT * FROM dresult WHERE user='$user' ORDER BY date DESC LIMIT 10 ";
   $result=@mysql_query($query);

while($row = mysql_fetch_array($result))
{
	$tob=$row['tob']."z".$tob;
}

}
//Khai bao cac bien
$maxres="";
$tob="";
$tob1a="";
$tob2a="";
$tob3a="";
$tob4a="";
$tob5a="";
$tob6a="";
$tob7a="";
$tob8a="";
$tob9a="";
$tob10a="";
if($maxres>=10){

$tobs=explode("z",$tob);
$tob1a=$tobs[0];
$tob2a=$tobs[1];
$tob3a=$tobs[2];
$tob4a=$tobs[3];
$tob5a=$tobs[4];
$tob6a=$tobs[5];
$tob7a=$tobs[6];
$tob8a=$tobs[7];
$tob9a=$tobs[8];
$tob10a=$tobs[9];

}
else
{
if($maxres>1){

$tobs=explode("z",$tob);

if($maxres>="2"){
$tob1a=$tobs[0];
$tob2a=$tobs[1];
}
if($maxres>="3"){
$tob3a=$tobs[2];
}
if($maxres>="4"){
$tob4a=$tobs[3];
}
if($maxres>="5"){
$tob5a=$tobs[4];
}
if($maxres>="6"){
$tob6a=$tobs[5];
}
if($maxres>="7"){
$tob7a=$tobs[6];
}
if($maxres>="8"){
$tob8a=$tobs[7];
}
if($maxres>="9"){
$tob9a=$tobs[8];
}
if($maxres>="10"){
$tob10a=$tobs[9];
}


}
else
{
$tob1a=explode("z",$tob);
$tob1a=$tob1a[0];
}



}

if($tob1a!=""){
$tob1b=100-$tob1a;
}
else
{
$tob1a=0;
$tob1b=100-$tob1a;

}


if($tob2a!=""){
$tob2b=100-$tob2a;

}
else
{
$tob2a=0;
$tob2b=100-$tob2a;

}

if($tob3a!=""){
$tob3b=100-$tob3a;
}
else
{
$tob3a=0;
$tob3b=100-$tob3a;
}



if($tob4a!=""){
$tob4b=100-$tob4a;
}
else
{
$tob4a=0;
$tob4b=100-$tob4a;
}


if($tob5a!=""){
$tob5b=100-$tob5a;
}
else
{
$tob5a=0;
$tob5b=100-$tob5a;
}


if($tob6a!=""){
$tob6b=100-$tob6a;
}
else
{
$tob6a=0;
$tob6b=100-$tob6a;
}


if($tob7a!=""){
$tob7b=100-$tob7a;
}
else
{
$tob7a=0;
$tob7b=100-$tob7a;
}


if($tob8a!=""){
$tob8b=100-$tob8a;
}
else
{
$tob8a=0;
$tob8b=100-$tob8a;
}


if($tob9a!=""){
$tob9b=100-$tob9a;
}
else
{
$tob9a=0;
$tob9b=100-$tob9a;
}

if($tob10a!=""){
$tob10b=100-$tob10a;
}
else
{
$tob10a=0;
$tob10b=100-$tob10a;
}






?>