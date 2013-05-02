<?php
$cexp=explode(":",$c);
$cexp1=$cexp[0];
$cexp2=$cexp[1];
$cexp3=$cexp[2];

if($cexp1 > 0){
$cexp1=$cexp1*60;
}

$timepassed1=$cexp1+$cexp2;
$timepassed=$timepassed1.".".$cexp3;

$timeleft=$ti-$timepassed1;

if($cexp3 > 0){

$timeleft-=1;
$cexpd=60-$cexp3;
}
else
{
$cexpd=0;
}
$rtimeleft=$timeleft;
$rtimeleft=$rtimeleft*60;
$rtimeleft=$rtimeleft+$cexpd;
if($cexpd<10){
$cexpd="0".$cexpd;
}

$timeleft=$timeleft.".".$cexpd;

if($timeleft > 0){
$timeover=1;
}


?>