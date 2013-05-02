
<html>
<head>
<title>
SavSoft online test script

</title>
<body>
</head>

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


<table width="500" height="20"  border="0" cellspacing="0" cellpadding="0">
<tr>

<td width="300"  >
<font color="666666" size="3">



</td>
<td width="200"  ><font color="666666" size="3">

<?php echo $footer;?>
</td>
</tr></table>


</body>
</html>
