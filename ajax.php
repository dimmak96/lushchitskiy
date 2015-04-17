<?php
require_once('config/config.php');
$query="SELECT * FROM $tbl_tovars WHERE id=".$_POST['id'];
$cat=mysql_query($query);
if(!$cat){
exit($query);
}
$tov=mysql_fetch_array($cat);
	if(!$tov){
	exit($query);
	}
	if($tov['picture']){
	$pict="<img src ='Media/images/".$tov['picturesmall']."'/>";
	
	}else{
	$pict='-';
	}
	
	echo $pict;
	echo"<h2>".$tov['name']."<h2>";
	echo $tov['price'];