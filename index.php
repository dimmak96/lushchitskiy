<?php require_once('templates/top.php');
if($_GET['url']){
$file=$_GET['url'];
}else{
$file='index';
}
	$query="SELECT * FROM $tbl_maintext WHERE url='$file'";
	$cat=mysql_query($query);
	if(!$cat){
	exit($query);
	}
	
	$tbl_text=mysql_fetch_array($cat);
	echo "<h2>".$tbl_text['name']."</h2>";
	echo "<h2>".$tbl_text['body']."</h2>";
	
require_once('templates/bottom.php');?>