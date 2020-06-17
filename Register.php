<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Simple design</title>
	<link rel="stylesheet" href="css/Register.css">
</head>
<body>
	<header>
		<div id="Logo">
			<div class="wrap">
				<div class="logo">
					<a href="index.php">
						<img href="index.php" src="images/Logo.png" />
					</a>
				</div>
				<div class="A1">
					<ul class="menu" >
						<li ><a href="index.php" >Магазин</a></li>
						<li><a href="Autorization.php">Войти</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<div id="content">
		<div class="info">
			<div class="register">
				<?php 
					define('DB_HOST', 'localhost');
				    define('DB_USER', 'root');
				    define('DB_PASSWORD', 'root');
				    define('DB_NAME', 'device_shop');

				    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
				    $mysqli->set_charset('utf8');

				    @$login = $mysqli->real_escape_string(htmlspecialchars($_POST['login']));
				    @$password = $mysqli->real_escape_string(htmlspecialchars($_POST['password']));
				    @$password_void = htmlspecialchars($_POST['password_void']);

				    $Log = '/[A-Z0-9][A-Za-z0-9]/';

				    $filterLogin = preg_match($Log, $login);


				    if (isset($_POST['button'])) {
				    	/*$name = $mysqli->real_escape_string(htmlspecialchars($_POST['name']));
				    	$email = $mysqli->real_escape_string(htmlspecialchars($_POST['email']));*/

				    	/*$filterEmail = filter_var($email, FILTER_VALIDATE_EMAIL);*/

				        	if ($filterLogin) {
								$query = "INSERT INTO `user`
						        (`login`, `password`)
						        VALUES ('$login', MD5('$password'))";
						        $result = $mysqli->query($query);
							}else echo "<p>Неверно введены данные</p>";
					}

					
				?>
				<?php if (isset($result)) { ?>
                    <?php if ($result) { ?>
                        <p>Регистрация прошла успешно!</p>
                    <?php } else { ?>
                        <p>Ошибка при регистрации!</p>
                    <?php } ?>
                <?php } ?>
				<form name="myform" method="post">
					<!-- <div class="wrap">
						<input type="text" name="name" id="name" placeholder="Name">
						<input type="text" name="email" id="email" placeholder="Email">
					</div> -->
					<input type="text" name="login" id="login" placeholder="Введите логин">
					<input type="password" name="password" id="password" placeholder="Введите пароль">
					<?php 
						if ($password !== $password_void) {
							echo "<p style='color: #770000;'>Пароли не совпадают</p>";
						}
					 ?>
					<input type="password" name="password_void" id="password_void" placeholder="Повторите пароль">
					<input type="submit" name="button" value="Создать профиль">
				</form>
			</div>
		</div>
	</div>
	<footer>
		<div class="wrap">
			<div class="copyright">
				<p>&copy 2020  Все права защищены.</p>
			</div>
			<div class="Email">
				
			</div>
			<div class="messenger">
				<ul>
					<li>Facebook</li>
					<li>Twitter</li>
					<li>Instagram</li>
					<li>Dribbble</li>
				</ul>
			</div>
		</div>
	</footer>
</body>
</html>
<?php 
	$mysqli-> close();
 ?>