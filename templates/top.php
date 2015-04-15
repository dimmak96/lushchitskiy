<?php
session_start();
require_once('config/config.php');
require_once('config/class.config.php');

?>
<!Doctype html>
	<html>
		<head>
			<meta charset = 'utf-8'>
			<title>Название проекта</title>
			<meta name = 'description' content ='1-2'>
			<meta name = 'keywords' content = ', ,'>
			<link type = 'text/css' rel = 'stylesheet' href = 'Media/bootstrap/css/bootstrap.min.css'>
			<link type = 'text/css' rel = 'stylesheet' href = 'Media/css/style.css'>
		
		</head>
		<body>
				<div id = 'header'>
	
				<div id = 'logo'>
					<img src = 'Media/img/logo.png'/>
				</div>
				
				<div id = 'headlinks'>
					
					<?php
					if($_SESSION['id_user_position']){
					?>
					<a href = 'logout.php'>Выход</a>
					<a href = 'cabinet.php'>Кабинет</a>
					<?php
					}else{
					?>
					<a href = 'login.php'>Вход</a>
					<a href = 'reg.php'>Регистрация</a>
					<?php
								}
								?>
					
				</div>
				</div>
				
				
	
				<div class = 'topmenu'>
					<a href = 'index.php?url=main'>Главная</a>
					<a href = 'index.php?url=about'>О компании</a>
					<a href = 'index.php?url=vacations'>Вакансии</a>
					<a href = 'index.php?url=contacts'>Контакты</a>
				</div>
				
				<div class = 'col-md-2'>
					       
					</div>
					
					<div class = 'col-md-6'>
					<script src='/Media/js/javascript.js'>
					</script>
					
					<script>
					$(function(){
					$('.topmenu a:eq(0)').bind('mouseover',function(){
						$('#header').css({
						'background':'url(../Media/img/index.jpg)'
						});
						
					});
					$('.topmenu').bind('mouseout',function(){
						$('#header').css({
						'background':'url(../Media/img/fon.jpg)'
						});
						});
					
					});
					
					$(function(){
					$('.topmenu a:eq(1)').bind('mouseover',function(){
						$('#header').css({
						'background':'url(../Media/img/index.jpg)'
						});
					});
					
					});
					
					$(function(){
					$('.topmenu a:eq(2)').bind('mouseover',function(){
						$('#header').css({
						'background':'url(../Media/img/index.jpg)'
						});
					});
					
					});
					
					$(function(){
					$('.topmenu a:eq(3)').bind('mouseover',function(){
						$('#header').css({
						'background':'url(../Media/img/index.jpg)'
						});
					});
					
					});
					
					
					
					</script>
					
					