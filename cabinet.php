<?php
require_once('templates/top.php');
if($_SESSION ['id_user_position']){
$query="SELECT * FROM $tbl_user WHERE id=".$_SESSION['id_user_position'];
$cat=mysql_query($query);
if(!$cat){
exit($query);
}
$tbl_user=mysql_fetch_array($cat);


}else{
echo 'Ошибка входа';
}
?>
<div class = 'col-md-3'>
<div class = 'menu'>
<?php

					$query = "SELECT * FROM $tbl_catalog WHERE showhide='show'";
					$cat = mysql_query($query);
					if(!$cat){
					exit($query);
					}
					while($category=mysql_fetch_array($cat)){
					echo "<a href='cat.php?id=".$category['id']."&url=".$category['url']."' class='btn btn-primary'>".$category['name']."</a>";
					}
					?>
	</div>
	</div>
<div class = 'col-md-9'>
<?php
echo "<h3>".$tbl_user['login']."</h3>";
echo "<h3>".$tbl_user['email']."</h3>";
	?>
	</div>
	




<?php require_once('templates/bottom.php');?>
