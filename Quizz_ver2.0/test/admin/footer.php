
<?php
include 'dbc.php';

$query = "SELECT * FROM dadmin WHERE user='admin' ";
   $result=mysql_query($query);

while($row = mysql_fetch_array($result))

 {

$footer=$row['footer'];
}


?>
<center><font color="666666">


<table width="980" height="20"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="980"  >
<font color="666666" size="3">
<center>

<?php echo $footer;?>
</td>
<td width="200"  >

</td>
</tr></table>


<br>
<br>
