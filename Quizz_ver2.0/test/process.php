<?php
$to=$_POST['aemail'] ;
$subject = "Message";
$email=$_POST['email'] ;
$message=$_POST['message'] ;
$headers="From: ".$email;
$sent = mail($to, $subject, $message, $headers) ;
if($sent)
{print "Your message sent successfully"; }
else
{print "We encountered an error sending your mail"; }
?>
