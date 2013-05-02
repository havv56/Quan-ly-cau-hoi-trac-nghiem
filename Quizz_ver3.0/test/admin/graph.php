

<table bgcolor="ffffff" width="300" height="250" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="28" height="250" valign=top ><br><br>


<img src="images/passed.png" border="0" title="Percentage of passed in test" >


</td>
<td width="20" height="250" valign=top >
<table width="20" height="250" border="0" cellspacing="0" cellpadding="0">
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">100</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">90</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">80</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">70</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">60</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">50</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">40</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">30</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">20</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2">10</font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2"></font></td></tr>
<tr><td bgcolor="ffffff" width="20" height="20" ><font color="666666" size="2"></font></td></tr>
</table>

</td>
<td width="252" height="250" valign=top >
<table bgcolor="ffffff" width="252" height="10" border="0" cellspacing="0" cellpadding="0">
<tr><td bgcolor="ffffff" width="252" height="10" ><font color="666666" size="2"></font></td></tr></table>


<table background="images/gbarbg.png" width="252" height="203" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="1" height="200" ></td>
<td width="250" height="200" >

<table width="250" height="200" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td  width="25" height="<?php echo $per1b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per1a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per1a>=2){ $per1a-=2; echo $per1a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1a; ?> <br> Passed Members: <?php echo $taken1a; ?><br>Appeared Meambers: <?php echo $maxres1a; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per1a=substr($per1a, 0, 2 );
if($per1a!="0"){ echo $per1a;?>% <?php } ?> </a> 
</td>
</tr>
</table>

</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per2b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per2a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per2a>=2){ $per2a-=2; echo $per2a;}else{ echo "1";} ?>%"   valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1b; ?> <br> Passed Members: <?php echo $taken1b; ?><br>Appeared Meambers: <?php echo $maxres1b; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per2a=substr($per2a, 0, 2 );
 if($per2a!="0"){ echo $per2a;?>% <?php } ?> </a> 



</td>

</tr>
</table>

</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per3b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per3a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per3a>=2){ $per3a-=2; echo $per3a;}else{ echo "1";} ?>%"  valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1c; ?> <br> Passed Members: <?php echo $taken1c; ?><br>Appeared Meambers: <?php echo $maxres1c; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per3a=substr($per3a, 0, 2 );
 if($per3a!="0"){ echo $per3a;?>% <?php } ?> </a> 


</td>

</tr>
</table>

</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per4b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per4a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per4a>=2){ $per4a-=2; echo $per4a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1d; ?> <br> Passed Members: <?php echo $taken1d; ?><br>Appeared Meambers: <?php echo $maxres1d; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per4a=substr($per4a, 0, 2 );
if($per4a!="0"){ echo $per4a;?>% <?php } ?> </a> 
</td>
</tr></table>


</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per5b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per5a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per5a>=2){ $per5a-=2; echo $per5a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1e; ?> <br> Passed Members: <?php echo $taken1e; ?><br>Appeared Meambers: <?php echo $maxres1e; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per5a=substr($per5a, 0, 2 );
if($per5a!="0"){ echo $per5a;?>% <?php } ?> </a> 
</td>
</tr></table>

</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per6b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per6a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per6a>=2){ $per6a-=2; echo $per6a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1f; ?> <br> Passed Members: <?php echo $taken1f; ?><br>Appeared Meambers: <?php echo $maxres1f; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per6a=substr($per6a, 0, 2 );
if($per6a!="0"){ echo $per6a;?>% <?php } ?> </a> 
</td>
</tr></table>



</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per7b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per7a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per7a>=2){ $per7a-=2; echo $per7a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1g; ?> <br> Passed Members: <?php echo $taken1g; ?><br>Appeared Meambers: <?php echo $maxres1g; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per7a=substr($per7a, 0, 2 );
if($per7a!="0"){ echo $per7a;?>% <?php } ?> </a> 
</td>
</tr></table>


</td>
<td width="25" height="200" >


<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per8b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per8a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per8a>=2){ $per8a-=2; echo $per8a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1h; ?> <br> Passed Members: <?php echo $taken1h; ?><br>Appeared Meambers: <?php echo $maxres1h; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per8a=substr($per8a, 0, 2 );
if($per8a!="0"){ echo $per8a;?>% <?php } ?> </a> 
</td>
</tr></table>


</td>
<td width="25" height="200" >

<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per9b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per9a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per9a>=2){ $per9a-=2; echo $per9a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1i; ?> <br> Passed Members: <?php echo $taken1i; ?><br>Appeared Meambers: <?php echo $maxres1i; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per9a=substr($per9a, 0, 2 );
if($per9a!="0"){ echo $per9a;?>% <?php } ?> </a> 
</td>
</tr></table>

</td>
<td width="25" height="200" >
<table width="25" height="200" border="0" cellspacing="0" cellpadding="0">
<tr><td   width="25" height="<?php echo $per10b;?>%" ></td></tr>
<tr><td background="images/gbar1.png" width="25" height="<?php if($per10a>=2){ echo "2";}else{echo "0";} ?>%" ></td></tr>
<tr><td background="images/gbar2.png" width="25" height="<?php if($per10a>=2){ $per10a-=2; echo $per10a;}else{ echo "1";} ?>%" valign="top" >

<a class="addspeech" href="" title="Test Name: <?php echo $tos1j; ?> <br> Passed Members: <?php echo $taken1j; ?><br>Appeared Meambers: <?php echo $maxres1j; ?>" >
<font size="1" color="3366cc" face="arial" >
<?php $per10a=substr($per10a, 0, 2 );
if($per10a!="0"){ echo $per10a;?>% <?php } ?> </a> 
</td>
</tr>

</table>

</td>
</tr></table>
</td>
<td width="1" height="200" ></td>
</tr></table>
<table width="250" height="20" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25" height="20" ><center><font color=666666 size=2>1</td>
<td width="25" height="20" ><center><font color=666666 size=2>2</td>
<td width="25" height="20" ><center><font color=666666 size=2>3</td>
<td width="25" height="20" ><center><font color=666666 size=2>4</td>
<td width="25" height="20" ><center><font color=666666 size=2>5</td>
<td width="25" height="20" ><center><font color=666666 size=2>6</td>
<td width="25" height="20" ><center><font color=666666 size=2>7</td>
<td width="25" height="20" ><center><font color=666666 size=2>8</td>
<td width="25" height="20" ><center><font color=666666 size=2>9</td>
<td width="25" height="20" ><center><font color=666666 size=2>10</td>
</tr></table>
<font color=666666 size=2>
Last 10 Tests
