<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson') OR DIE('Помилка');
if (!dbc) {
	echo "проблеми з базою";
	}
	$userMsg = $_POST['usermsg'];

	$charSql ="INSERT INTO  `lesson`.`message` (`id` ,`mess`)VALUES (NULL ,  '$userMsg')";
	mysqli_query($dbc, $charSql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Chat - Customer Module</title>
<link type="text/css" rel="stylesheet" href="css/style_chat.css" />
</head>
 
<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?php echo $_COOKIE['name']; ?></b></p>
        <p class="logout"><a id="exit" href="index_stud.php">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox"> 
    <?php
    $sql = "SELECT * FROM `message`";
    $result = mysqli_query($dbc, $sql);
    while($row = mysqli_fetch_assoc($result)) {
    	 echo $_COOKIE['name']. $row['mess'].'</br>';
    }
    ?>
    </div>
        <form name="messag" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <input name="usermsg" type="text" id="usermsg" size="63" style="overflow: auto"/>
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