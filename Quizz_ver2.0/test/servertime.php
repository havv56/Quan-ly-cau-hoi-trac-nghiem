<?php
$thetimeis = getdate(time());
$thehour = $thetimeis['hours'];
$theminute = $thetimeis['minutes'];
$thesecond = $thetimeis['seconds'];
$servertime=$thehour.":".$theminute.":".$thesecond;
?>    