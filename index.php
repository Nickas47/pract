<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson');
if(!isset($_COOKIE['user_id'])) {
	if(isset($_POST['submit'])) {
		$user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
		$user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
		if(!empty($user_username) && !empty($user_password)) {
			$query = "SELECT * FROM `signup` WHERE username = '$user_username' AND password = SHA('$user_password')";
			$data = mysqli_query($dbc,$query);
			if(mysqli_num_rows($data) == 1) {
				$row = mysqli_fetch_assoc($data);
				setcookie('name', $row['name'], time() + (60*60*24*30));
				setcookie('last_name', $row['last_name'], time() + (60*60*24*30));
				setcookie('user_id', $row['user_id'], time() + (60*60*24*30));
				setcookie('username', $row['username'], time() + (60*60*24*30));
				$home_url = 'http://' . $_SERVER['HTTP_HOST'];
				header('Location: '. $home_url);
			}
			else {
				echo 'Яка математика, ви пароль чи логін не можете правильно ввести';
			}
		}
		else {
			echo 'Поля заповнені не правильно';
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style/styles.css" rel="stylesheet">
</head>
<body>
<header>
<ul>
	<li><a href="/">Вхід</a></li>
</ul>
</header>
<content>
<?php
	if(empty($_COOKIE['username'])) {
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class = "log">
		<label for="username">Логін:</label>
	<input type="text" name="username" id='name'>
	<label for="password">Пароль:</label>
	<input type="password" name="password" id='password'><br>
    <button type="submit" name="submit">Вхід</button>
	<a href="signup.php">Регістрація</a>
	</form>

<section>
<?php
}
else {
	?>
<div class=prof>
     <p><?php echo $_COOKIE['name']; ?></p>
	 <p><?php echo $_COOKIE['last_name']; ?></p>
	<img class="avatar" src="images/avatar.png" >
	<p><a href="exit.php">Вийти</a></p>
</div>
<div class=dzen>
    <label for="stud"><input name="dzen" type="radio" id="stud" required/>Студент</label><br><br><br>
	<label for="teach"><input name="dzen" type="radio" id="teach" required/>Викладач</label><br><br><br>
    <input type="button" id="w" value="Тик">
</div>
<?php	
}
?>
</section></content>
<footer class="clear">
	<p>Бойко М.В.</br>
	Прикарпатський національний університет ім.В.Стефаника </br>
2017р.</p>
</footer>
<script>
  document.getElementById("w").onclick = function(){
if(document.getElementById('stud').checked) {
   top.location='index_stud.php'
}else if(document.getElementById('teach').checked) {
    alert("має переходи по другій силці")/*top.location='index_teacher.html';*/
}  
}
  </script>
</body>

</html>