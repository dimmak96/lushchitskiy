<?php
	$dblocation='localhost';
	$dbname='lushchitskiy';
	$dbuser='root';
	$dbpassword='';
	$tbl_catalog='catalogs';
	$tbl_user='users';
	$tbl_tovars='tovars';
	$tbl_accounts='system_accounts';
	//таблица
	$tbl_maintext='maintexts';
	$dbcnx=mysql_connect($dblocation,$dbuser,$dbpassword);
	if(!$dbcnx){
	exit('no connect to server MySQL');
	}
	$dbuse=mysql_select_db($dbname,$dbcnx);
	if(!$dbuse){
	exit('no DB');
	}
	@mysql_query("SET NAMES 'utf-8'");
	