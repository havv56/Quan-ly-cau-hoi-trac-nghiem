<?php
$query = "SELECT * FROM dtest ";
   $result = mysql_query($query) or die(mysql_error());         
		if(mysql_num_rows($result)>=1){
			$maxtest = mysql_num_rows($result);
			$tob="";
			$query = "SELECT * FROM dtest ORDER BY date DESC LIMIT 10 ";
			$result=mysql_query($query);
			while($row = mysql_fetch_array($result)){
				$tos=$row['testname']."&".$tos;
			}
		}

	if( $maxtest >= 10 ){
		$toss=explode("&",$tos);
		$tos1a=$toss[0];
		$tos1b=$toss[1];
		$tos1c=$toss[2];
		$tos1d=$toss[3];
		$tos1e=$toss[4];
		$tos1f=$toss[5];
		$tos1g=$toss[6];
		$tos1h=$toss[7];
		$tos1i=$toss[8];
		$tos1j=$toss[9];
	}
	else{
		if($maxtest>1){
			$toss=explode("&",$tos);

			if($maxtest>="2"){
				$tos1a=$toss[0];
				$tos1b=$toss[1];
			}
			if($maxtest>="3"){ $tos1c=$toss[2];}
			if($maxtest>="4"){ $tos1d=$toss[3];}
			if($maxtest>="5"){ $tos1e=$toss[4];}
			if($maxtest>="6"){ $tos1f=$toss[5];}
			if($maxtest>="7"){ $tos1g=$toss[6];}
			if($maxtest>="8"){ $tos1h=$toss[7];}
			if($maxtest>="9"){ $tos1i=$toss[8];}
			if($maxtest>="10"){ $tos1j=$toss[9];}
		}
		else{
			$tos1a=explode("&",$toss);
			$tos1a=$tos1a[0];
		}
	}









if($tos1a!=""){
	$query = "SELECT * FROM dresult WHERE testname='$tos1a' ";
	$result = mysql_query($query) or die(mysql_error());   
	
		if(mysql_num_rows($result)>=1){
			$maxres1a=mysql_num_rows($result);
			$query = "SELECT * FROM dresult WHERE testname='$tos1a' AND result='PASS' ";
			$result = mysql_query($query) or die(mysql_error());         
				if(mysql_num_rows($result)>=1){ $taken1a=mysql_num_rows($result);}
					else{ $taken1a=0;}
		}
	else
	{
	$maxres1a=0;
	}
	if($taken1a!="0" AND $maxres1a!="0"){
	$per1a=$taken1a/$maxres1a;
	$per1a=$per1a*100;
	$per1a=substr($per1a, 0, 4 );
	}
	else
	{
	$per1a=0;
	}
	$per1b=100-$per1a;

}
else
{
$per1a=0;
$per1b=100;
}



if($tos1b!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1b' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1b=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1b' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1b=mysql_num_rows($result);
}
else
{
$taken1b=0;
}
}
else
{
$maxres1b=0;
}
if($taken1b!="0" AND $maxres1b!="0"){
$per1b=$taken1b/$maxres1b;
$per1b=$per1b*100;
$per2a=substr($per1b, 0, 4 );
}
else
{
$per2a=0;
}
$per2b=100-$per2a;

}
else
{
$per2a=0;
$per2b=100;
}







if($tos1c!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1c' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1c=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1c' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1c=mysql_num_rows($result);
}
else
{
$taken1c=0;
}
}
else
{
$maxres1c=0;
}
if($taken1c!="0" AND $maxres1c!="0"){

$per1c=$taken1c/$maxres1c;
$per1c=$per1c*100;
$per3a=substr($per1c, 0, 4 );
}
else
{
$per3a=0;
}
$per3b=100-$per3a;

}
else
{
$per3a=0;
$per3b=100;
}







if($tos1d!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1d' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1d=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1d' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1d=mysql_num_rows($result);
}
else
{
$taken1d=0;
}
}
else
{
$maxres1d=0;
}
if($taken1d!="0" AND $maxres1d!="0"){

$per1d=$taken1d/$maxres1d;
$per1d=$per1d*100;
$per4a=substr($per1d, 0, 4 );
}
else
{
$per4a=0;
}
$per4b=100-$per4a;

}
else
{
$per4a=0;
$per4b=100;
}






if($tos1e!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1e' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1e=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1e' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1e=mysql_num_rows($result);
}
else
{
$taken1e=0;
}
}
else
{
$maxres1e=0;
}
if($taken1e!="0" AND $maxres1e!="0"){

$per1e=$taken1e/$maxres1e;
$per1e=$per1e*100;
$per5a=substr($per1e, 0, 4 );
}
else
{
$per5a=0;
}
$per5b=100-$per5a;

}
else
{
$per5a=0;
$per5b=100;
}






if($tos1f!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1f' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1f=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1f' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1f=mysql_num_rows($result);
}
else
{
$taken1f=0;
}
}
else
{
$maxres1f=0;
}
if($taken1f!="0" AND $maxres1f!="0"){

$per1f=$taken1f/$maxres1f;
$per1f=$per1f*100;
$per6a=substr($per1f, 0, 4 );
}
else
{
$per6a=0;
}
$per6b=100-$per6a;

}
else
{
$per6a=0;
$per6b=100;
}







if($tos1g!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1g' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1g=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1g' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1g=mysql_num_rows($result);
}
else
{
$taken1g=0;
}
}
else
{
$maxres1g=0;
}
if($taken1g!="0" AND $maxres1g!="0"){

$per1g=$taken1g/$maxres1g;
$per1g=$per1g*100;
$per7a=substr($per1g, 0, 4 );
}
else
{
$per7a=0;
}
$per7b=100-$per7a;

}
else
{
$per7a=0;
$per7b=100;
}







if($tos1h!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1h' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1h=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1h' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1h=mysql_num_rows($result);
}
else
{
$taken1h=0;
}
}
else
{
$maxres1h=0;
}
if($taken1h!="0" AND $maxres1h!="0"){

$per1h=$taken1h/$maxres1h;
$per1h=$per1h*100;
$per8a=substr($per1h, 0, 4 );
}
else
{
$per8a=0;
}
$per8b=100-$per8a;

}
else
{
$per8a=0;
$per8b=100;
}






if($tos1i!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1i' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1i=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1i' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1i=mysql_num_rows($result);
}
else
{
$taken1i=0;
}
}
else
{
$maxres1i=0;
}
if($taken1i!="0" AND $maxres1i!="0"){

$per1i=$taken1i/$maxres1i;
$per1i=$per1i*100;
$per9a=substr($per1i, 0, 4 );
}
else
{
$per9a=0;
}
$per9b=100-$per9a;

}
else
{
$per9a=0;
$per9b=100;
}






if($tos1j!=""){
$query = "SELECT * FROM dresult WHERE testname='$tos1j' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$maxres1j=mysql_num_rows($result);
$query = "SELECT * FROM dresult WHERE testname='$tos1j' AND result='PASS' ";
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=1)
{
$taken1j=mysql_num_rows($result);
}
else
{
$taken1j=0;
}
}
else
{
$maxres1j=0;
}
if($taken1j!="0" AND $maxres1j!="0"){

$per1j=$taken1j/$maxres1j;
$per1j=$per1j*100;
$per10a=substr($per1j, 0, 4 );
}
else
{
$per10a=0;
}
$per10b=100-$per10a;
}
else
{
$per10a=0;
$per10b=100;
}























?>