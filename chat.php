<?php
$db = mysqli_connect('localhost', 'root', '', 'messages') OR DIE('Помилка');
if(isset($_POST['mess']) && $_POST['mess']!="" && $_POST['mess']!=" ")
{
//Стартуем сессию для записи логина пользователя
session_start();
//Принимаем переменную сообщения
$mess=$_POST['mess'];
//Переменная с логином пользователя
$login=$_SESSION['login'];
//Подключаемся к базе
include("bd.php");
//Добавляем все в таблицу
$res=mysql_query("INSERT INTO `messages` (`login`,`message`) VALUES ('$login','$mess') ");
}
?>
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Чат</title>
<link type="text/css" rel="stylesheet" href="css/style_chat.css" />
</head>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Привіт, <b><?php echo $_COOKIE['name'];?></b></p>
        <p class="logout"><a id="exit" href="index_stud.php">Вийти</a></p>
        <div style="clear:both"></div>
    </div>
     
    <div id="chatbox"></div>
     
    <form name="message" action="">
        <input name="usermsg" type="text" id="usermsg" size="63" />
        <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
    </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
 
});
</script>
</body>
</html>