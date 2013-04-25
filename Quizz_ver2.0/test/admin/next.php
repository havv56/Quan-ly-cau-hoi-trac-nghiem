
$page=$_GET['page'];
if($page==""){
$page=0;
}
if($page!=""){
if($page<"0"){
$page-=$page;
}
}


 LIMIT $page, 10



$query="SELECT * FROM dmember  WHERE actstatus='1' AND groupname='$groupname'  "; 
   $result = mysql_query($query) or die(mysql_error());         
              if(mysql_num_rows($result)>=0)
{
$totmem=mysql_num_rows($result);
$plast=$totmem; $plast-=10; 
}
if($page>='0'){

if($page>='1'){?>
<a href="member.php?page=0" ><font color="666666" size="3"><img src="images/pfirst.jpg" border="0" title="First"></a>&nbsp;&nbsp;
<a href="member.php?page=<?php $pageb=$page; $pageb-=10; echo $pageb;?>" ><font color="666666" size="3"><img src="images/pback.jpg" border="0" title="Back"></a>&nbsp;&nbsp;
<?php
}

?>
&nbsp;

<?php
echo "Members ";

echo " ";
 
$p2=$page;
$p2+=1;

echo $p2;
$p2-=1;
$p2+=10;
if($p2<=$totmem){
echo " to ";
echo $p2;
}
else
{
echo " to ";

echo $totmem;

}
echo " of ";

echo $totmem;



echo " ";

if($page<$plast){
?>&nbsp;
<a href="member.php?page=<?php $pagen=$page; $pagen+=10; echo $pagen;?>" ><font color="666666" size="3"><img src="images/pnext.jpg" border="0" title="Next"></a>

&nbsp;
<a href="member.php?page=<?php echo $plast;?>" ><font color="666666" size="3"><img src="images/plast.jpg" border="0" title="Last"></a>
<?php
}

}