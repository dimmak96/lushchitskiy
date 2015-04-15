<?php
 require_once('templates/top.php');
 require_once('utils/utils.users.php'); 
 
$name=new field_text('name', 'Логин',true ,$_POST['name']);
$pass=new field_password('pass','Пароль', true, $_REQUEST['pass']);



$form=new form(array('name'=>$name,'pass'=>$pass),'Вход','field');
if($_POST){  //обработка формы
$error = $form->check() ;                     
$query = "SELECT COUNT(*) FROM $tbl_user WHERE login ='{$form->fields['name']->value}'";
$query1 = "SELECT COUNT(*) FROM $tbl_user WHERE password ='{$form->fields['pass']->value}'";
$usr = mysql_query($query);
$usr1 = mysql_query($query1);
if (!$usr) {
if (!$usr1) {
exit ($query);
exit ($query1);
}
}


if (!mysql_result($usr, 0) || !mysql_result($usr1, 0) ){
$error[] = "Ошибка входа. Некорректные данные!";
}

if (!$error){
enter($form->fields['name']->value,$form->fields['pass']->value);
?>



			 
		
			<script>
				document.location.href='index.php';
			</script>	
	<?php			
		}
		if ($error){
		foreach ($error as $err)
		{
		echo "<span style = 'color:green'>";
		echo $err;
		echo "</span><br/>";
}
}
}

$form->print_form();



require_once('templates/bottom.php');?>