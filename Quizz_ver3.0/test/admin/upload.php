<?php



$testcode=$_GET['testcode'];

$qno=$_GET['qno'];




?>

<form enctype="multipart/form-data" action="upload2.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>" method="POST">
    <font color="666666" size="3">Upload file: <input name="userfile" type="file" />


    <input type="submit" value="Upload" />
</form>















