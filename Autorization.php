<?php 
	session_start();
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'device_shop');

    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');

    	$result_set = $mysqli->query('SELECT * FROM `user`');

    	@$login = $mysqli->real_escape_string(htmlspecialchars($_POST['login']));
		@$password = $mysqli->real_escape_string(htmlspecialchars($_POST['password']));

    	while (($row = $result_set->fetch_assoc()) != false) {
    		$error = false;
	        $log = false;
        	$admin = false;
	        if (isset($_POST['button'])) {
	        	if ($row['login'] = $login && $row['password'] = $password) {
	        		$log = true;
	            	$error = false;	
	        	}
		        $_SESSION['login'] = $login;
		        $_SESSION['password'] = md5($password);
	        }

	        if (isset($_POST['logout'])) {
	            unset($_SESSION['login']);
	            unset($_SESSION['password']);
       		}


        	$isset = isset($_SESSION['login']) && isset($_SESSION['password']);

	        if ($isset && $_SESSION['login'] === 'Admin' && $_SESSION['password'] === md5('54321')) {
	            $admin = true;
	            $log = false;
	            $error = false;
        	}
    	}

    $mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Device shop</title>
	<link rel="stylesheet" href="../css/Personal_Area.css">
	<link rel="icon" href="images/logo.ico">
	<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
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
						<li><a class="C1" href="Autorization.php">Личный Кабинет</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
<?php if($admin) {
	require_once 'php/Personal_Area_Admin.php';
} elseif($log) {
	require_once 'php/Personal_Area_User.php';					
} else { ?>
	<div id="content">
		<div class="info">
			<div class="register">
				<?php if ($error == true) { ?><p style="font-family: MM;
				    font-size: 120%;
				    text-align: center;
				    color: #540000;
				">Неверные логин и/или пароль!</p><?php } ?>
					<form name="myform" method="post">
						<input type="text" name="login" id="login" placeholder="Login">
						<input type="password" name="password" id="password" placeholder="Password">
						<div class="wrap">
							<input type="submit" name="button" value="Войти">
							<a href="Register.php">Регистрация</a>
						</div>
					</form>
			</div>
		</div>
	</div>
<?php } ?>
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