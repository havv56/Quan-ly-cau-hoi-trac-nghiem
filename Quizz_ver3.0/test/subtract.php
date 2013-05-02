<?php
 



$query = "SELECT starttime FROM dresult WHERE user='$user' AND testcode='$testcode' ";
$result=mysql_query($query);
while($row = mysql_fetch_array($result))
{
$starttime=$row['starttime'];
}


// FUNCTION TO SUBTRACT TIMES
function subtract_times($time1, $time2)
{
// SEPARATE HOURS, MINS, SECS http://us.php.net/manual/en/function.explode.php
   $t1 = explode(':', $time1);
   $t2 = explode(':', $time2);
 
// MAKE TIMESTAMPS http://us.php.net/manual/en/function.mktime.php
   $ts1 = mktime($t1[0], $t1[1], $t1[2]);
   $ts2 = mktime($t2[0], $t2[1], $t2[2]);
 
// COMPUTE TIME DIFFERENCE IN SECONDS
   $dif = abs($ts1 - $ts2);
 
// GET THE NUMBER OF HOURS
   $h = (int)($dif / (60*60));
 
// REMOVE THE HOURS FROM THE ELAPSED TIME
   $dif = $dif - ($h * (60*60));
 
// GET THE NUMBER OF MINUTES
   $m = (int)($dif / 60);
 
// REMOVE THE MINUTES FROM THE ELAPSED TIME
   $s = $dif - ($m * 60);
 
// LEADING ZEROS
   $h = str_pad("$h", 2, '0', STR_PAD_LEFT);
   $m = str_pad("$m", 2, '0', STR_PAD_LEFT);
   $s = str_pad("$s", 2, '0', STR_PAD_LEFT);
 
// IF NEGATIVE ELAPSED TIME PREPEND A MINUS SIGN
   if ($ts1 < $ts2) $h = '-' . $h;
 
   return "$h:$m:$s";
}
 


include 'servertime.php';
 
 if($starttime==""){
$starttime=$servertime;
}

$time1 = $starttime;

$time2 = $servertime;
 



// SAMPLE USAGE
$c=subtract_times($time2, $time1);


?>