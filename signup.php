<?php
$dbc = mysqli_connect('localhost', 'root', '', 'lesson') OR DIE('Помилка');
if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($dbc, trim($_POST['name']));
	$last_name = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	$username = mysqli_real_escape_string($dbc, trim($_POST['username']));
	$password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
	$password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));
	if(!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
		$query = "SELECT * FROM `signup` WHERE username = '$username'";
		$data = mysqli_query($dbc, $query);
		if(mysqli_num_rows($data) == 0) {
			$query ="INSERT INTO `signup` (name, last_name, username, password) VALUES ('$name', '$last_name', '$username', SHA('$password2'))";
			mysqli_query($dbc,$query);
			mysqli_close($dbc);
			exit(require('index.php'));
		}
		else {
			echo 'Логін вже присутній';
		}

	}
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="style/style.css" rel="stylesheet">
</head>
<body>
<header>
<ul>
	<li><a href="/">Головна</a></li>

</ul>
</header>
<content>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<label for="username">Введіть ім'я:</label>
	<input type="text" name="name">
	<label for="username">Введіть прізвище:</label>
	<input type="text" name="last_name">
	<label for="username">Введіть логін:</label>
	<input type="text" name="username">
	<label for="password">Введіть пароль:</label>
	<input type="password" name="password1">
	<label for="password">Повтори пароль:</label>
	<input type="password" name="password2">
	<button type="submit" name="submit">Вход</button>
	</form>
</content>
<footer class="clear">
	<p>Бойко М.В.</p>
	<p>Прикарпатський національний університет ім.В.Стефаника </p>
	<p>2017р.</p>
</footer>

</body>

</html>