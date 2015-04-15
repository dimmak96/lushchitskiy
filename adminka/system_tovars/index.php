<?php

  error_reporting(E_ALL & ~E_NOTICE);

  // Устанавливаем соединение с базой данных
  require_once("../../config/config.php");
  // Подключаем блок авторизации
  require_once("../authorize.php");
  // Подключаем SoftTime FrameWork
  require_once("../../config/class.config.dmn.php");
  // Подключаем блок отображения текста в окне браузера
  require_once("../utils/utils.print_page.php");

  // Данные переменные определяют название страницы и подсказку.
  $title = 'Управление блоком "Текстовое наполнение сайта"';
  $pageinfo = '<p class=help>Здесь можно добавить
               товарный блок, отредактировать или
               удалить уже существующий блок.</p>';

  // Включаем заголовок страницы
  require_once("../utils/top.php");

  try
  {
?>
<table width=100% border="0" cellpadding="0" cellspacing="0">
<tr>
<td width=50% class='menu_right'>
<?
    // Добавить блок
    echo "<a href=newsadd.php?page=$_GET[page]
             title='Добавить товар'>
		<img border=0 src='../utils/img/add.gif' align='absmiddle' />
             Добавить товар</a>";
?>
</td>
<td width=50%>
</td>
</tr>
</table>
<?php
  $page_link = 3; 
  $pnumber = 20; 
  $obj = new pager_mysql ($tbl_tovars, '', 'ORDER BY id DESC', $pnumber, page_link);
  $news = $obj->get_page();
  echo $obj;
  if(!empty($news)) {
  ?>
  <table width=100% class= 'table' border=0>
  <tr class = 'header' align = 'center'>
  <td>Изображение </td>
  <td> Наименование </td>
  <td> Содержимое </td>
  <td> Дейсвия</td>
  </tr>
  <?php
  for ($i=0;$i<count($news); $i++){
  $url = "?id=".$news[$i]['id']."&page=".$_GET['page'];
if($news[$i]['showhide']=='hide'){
$showhide = "<a href='newsshow.php$url'
title = 'Отобразить'>
<img src= '../utils/img/show.gif'
border = 0 align ='absmiddle'/>
Отобразить</a>";
} else {
$showhide = "<a href='newshide.php$url'
title = 'Скрыть'>
<img src= '../utils/img/folder_locked.gif'
border = 0 align ='absmiddle'/>
Скрыть</a>";
}
  if ($news[$i]['picturesmall']!= '-'){
  $pic = "<img src='../../Media/images/" . $news[$i]['picturesmall']."'/>";
  }else {
  $pic = '-';
  }
  echo "<tr>
  <td>".$pic."</td> 
  <td>".$news[$i]['name']."</td> 
  <td>".$news[$i]['price']."</td>
<td class='menu' valign='top'> $showhide
<a href = 'newsedit.php$url'
title = 'Редактировать'>
<img src = '../utils/img/kedit.gif'
border =0 align = 'absmiddle'/>
Редактировать </a>
<a href = '#' onclick = \"delete_position('newsdel.php$url', 'Вы действительно хотите удалить товар?');\"
title = 'Удалить'>
<img src = '../utils/img/editdelete.gif' 
align = 'absmiddle'/>Удалить</a>
</td>
</tr>"; 
  }
  ?>
  </table>
  <?php
  }
  

   
  }
  catch(ExceptionMySQL $exc)
  {
    require("../utils/exception_mysql.php"); 
  }

  // Включаем завершение страницы
  require_once("../utils/bottom.php");

echo "";
?>