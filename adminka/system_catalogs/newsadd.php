<?php

  error_reporting(E_ALL & ~E_NOTICE);
  require_once("../../utils/utils.resizeimg.php");

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем классы формы
  require_once("../../config/class.config.dmn.php");

  if(empty($_POST))
  {
    // Отмечаем флажок hide
    $_REQUEST['hide'] = true;
  }
  try
  {
	$query="SELECT * FROM catalogs ";
	$cat=mysql_query($query);
	if(!$cat){
	exit($query);
	}
	$catalogs=array();
	while($cc=mysql_fetch_array($cat)){
	$catalogs[$cc['id']]=$cc['name'];
	}
	
	
    $name        = new field_text("name",
                                  "Название",
                                  true,
                                  $_POST['name']);						  
	
    
									  
	$url        = new field_text("url",
                                  "Значение",
                                  true,
                                  $_POST['url']);
	
	
	$hide        = new field_checkbox("hide",
                                      "Отображать",
                                      $_REQUEST['hide']);
  
    $form = new form(array(
	                       "name" => $name, 
							"url" => $url,						   
                           "hide" => $hide),
                           "Добавить");

    // Обработчик HTML-формы
    if(!empty($_POST))
    {
      // Проверяем корректность заполнения HTML-формы
      // и обрабатываем текстовые поля
      $error = $form->check();
	  if($form->fields['urltext']->value == "-")
	  {
	  $error[] = "Вы не выбрали раздел";
	  }
      if(empty($error))
      {
       if($form->fields['hide']->value){
	   $showhide='show';
	   }else{
	   $showhide='hide';
	   }
	   $query="INSERT INTO catalogs VALUES(null,
	   '{$form->fields['name']->value}',
	   '$showhide',
	   '{$form->fields['url']->value}')";
	   $cat=mysql_query($query);
	   if(!$cat){
	   exit($query);
	   }
        ?>
		<script>
		 document.location.href="index.php";
		</script>
		<?
      }
    }
    // Начало страницы
    $title     = 'Добавление категории';
    $pageinfo  = '<p class=help></p>';
    // Включаем заголовок страницы
    require_once("../utils/top.php");
?>
<div align=left>
<FORM>
<INPUT class="button" TYPE="button" VALUE="На предыдущую страницу" 
onClick="history.back()">
</FORM> 
</div>
<?
    // Выводим сообщения об ошибках, если они имеются
    if(!empty($error))
    {
      foreach($error as $err)
      {
        echo "<span style=\"color:red\">$err</span><br>";
      }
    }
?>
<div class="table_user">
<?
    // Выводим HTML-форму 
    $form->print_form();
?>
</div>
<?
  }
  catch(ExceptionObject $exc) 
  {
    require("../utils/exception_object.php"); 
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }
  catch(ExceptionMember $exc)
  {
    require("../utils/exception_member.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");
?>
