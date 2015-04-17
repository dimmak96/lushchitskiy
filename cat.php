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
	
	$query="SELECT * FROM $tbl_catalog WHERE id=".$_GET['id'];
	
	$cat=mysql_query($query);
	if(!$cat){
	exit($query);
	}
	$category=mysql_fetch_array($cat);
	echo "<h2>".$category['name']."</h2>";
	$query="SELECT * FROM $tbl_tovars WHERE cat_id=".$_GET['id'];
	
	$tov=mysql_query($query);
	if(!$tov){
	exit($query);
	}
	while ($tovar=mysql_fetch_array($tov)){
	if($tovar['picture']){
	$picture="<a href='#'data=".$tovar['id']." class='picture'>
	<img src ='Media/images/".$tovar['picturesmall']."'/></a>";
	}else{
	$picture="-";
	}
	
	echo "<div class='tovar'>";
	echo $picture;
	echo $tovar['name'];
	echo $tovar['price'];
	echo "</div>";
	}
	
	?>
	
	<script>
	$(function(){
	var fx={
	"initModal":function(){
	if($('.model-window').length==0){
	
	$('<div>').attr('id','jquery-overlay').fadeIn(500).appendTo('body');
	return $('<div>').addClass('model-window').appendTo('body');//создается селектор
	}else{
	return $('.model-window');//селектор
	}
		}
	}
	$('.picture').bind('click',function(e){
	e.preventDefault();
	var data=$(this).attr('data');
	model=fx.initModal();
	$.ajax({
	type:'POST',
	
	url:'ajax.php',
	data:'id='+data,
	success:function(data){
	model.append(data);
	},
	error:function(msg){
	model.append(msg);//вызываем элемент
	}
	});
	$('<a>').attr('href','#').addClass('model-close-btn').html('&times').click(function(event){
	$('#jquery-overlay').fadeOut(500,function(){
	$(this).remove();
	});
	model.fadeOut(500,function(){
	$(this).remove();
	});
	
	
	
	}).fadeIn(500).appendTo(model);
	});
	});
	</script>
	<?php
require_once('templates/bottom.php');?>