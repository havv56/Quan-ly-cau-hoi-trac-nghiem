<?php
session_start();
if(isset($_SESSION['id'])){
include 'dbc.php';
session_destroy();

}

?>

<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=login.php">

