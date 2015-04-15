<?php
 require_once('templates/top.php');
 
 
 
$name=new field_text('name', 'Логин',true ,$_POST['name']);
$email=new field_text_email('email', 'E-mail', true, $_POST['email']);
$pass=new field_password('pass','Пароль', true, $_REQUEST['pass']);
$repeat=new field_password('repeat','Повторите пароль', true, $_REQUEST['repeat']);


$form=new form(array('name'=>$name,'email'=>$email,'pass'=>$pass,'repeat'=>$repeat),'Регистрация','field');
if($_POST){                            //обработка формы
$error=$form->check();
	if($form->fields['pass']->value!=$form->fields['repeat']->value){
	$error[]='Пароли не совпадают';
}
$query="SELECT COUNT(*) FROM $tbl_user WHERE login='{$form->fields['name']->value}'";
$cat=mysql_query($query);
if(!$cat){
exit($query);
}
if(mysql_result($cat,0)){
$error[]='Пользователь с таким именем уже существует';
}

$query="SELECT COUNT(*) FROM $tbl_user WHERE email='{$form->fields['email']->value}'";
$cat=mysql_query($query);
if(!$cat){
exit($query);
}
if(mysql_result($cat,0)){
$error[]='Пользователь с таким почтовым ящиком уже существует';
}
	if(!$error){
		$query="INSERT INTO $tbl_user VALUES(NULL,
		'{$form->fields['name']->value}',
		'{$form->fields['email']->value}',
		'{$form->fields['pass']->value}' ,
		'unblock',
		NOW(),
		NOW())"	;
		$cat=mysql_query($query);
		if(!$cat){
		exit($query);
		}
		?>
			<script>
				document.location.href='index.php';
			</script>
			<?php
}
		if($error){
			foreach($error as $err){
			echo "<span style='color:red'>";
		echo $err;
		echo "</span><br/>";
		}
		}
}
$form->print_form();

	
require_once('templates/bottom.php');?>
