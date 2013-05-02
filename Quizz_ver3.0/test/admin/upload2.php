<?php



$uploaddir = 'upload/';
$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";

$qno=$_GET['qno'];
$testcode=$_GET['testcode'];



include 'dbc.php';




srand(time());
$random = (rand()%999999);
$ddd    = date('d-m-Y');
$f_type    = trim(strtolower(end    (explode( '.', basename($_FILES['userfile']['name'] )))));
        
$n_file='upload/' . $random .'-Date-'.$ddd .'.'. $f_type;
rename($uploadfile,$n_file);

$query = mysql_query("INSERT INTO dimages(qno, imageaddress, testcode, filetype)
VALUES
('$qno','$n_file','$testcode','$f_type')");


?>
<form method=post action="upload.php?qno=<?php echo $qno;?>&testcode=<?php echo $testcode;?>">
<input type="submit" value="Add another file"></form> or

<?php
} else {
   echo "<font color=666666 size=3>Upload failed";
}




?> 













