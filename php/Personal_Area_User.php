<?php 
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');
		
        $result_set = $mysqli->query('SELECT * FROM `user`');

        while (($row = $result_set->fetch_assoc()) != false) {
    		
	        if (isset($_POST['logout'])) {
	            unset($_SESSION['login']);
	            unset($_SESSION['password']);
       		}
    	}

    $mysqli->close();
?>
<div id="Personal_Area">
	<div class="people">
		<div class="photo">
			<div class="img">
				<?php
					$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
				    $mysqli->set_charset('utf8');

					$user = $_SESSION['login'];

					$result_set = $mysqli->query("SELECT * FROM `user` WHERE `login`='$user'");

					while (($row = $result_set->fetch_assoc()) != false) {
						
						$user_photo = $row['photo'];
						if ($user_photo == false) {
							echo "<img src='../uploads/User.png' alt='Admin'>";
						}else echo "<img src='../uploads/".$row['photo']."' alt='Admin'>";
					}

				?>
			</div>
			<div class="login">
				<p><?=$_SESSION['login']?></p>
			</div>
		</div>
		<div class="database">
			<form action="Autorization.php" name="logout" method="post">
				<input type="submit" name="logout" value="Выйти" />
			</form>
		</div>
	</div>
	<div class="info">
		<div class="personal_data">
			<div class="info_login">
				<?php 
					$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
					$mysqli->set_charset('utf8');

					$user = $_SESSION['login'];

					$result_set = $mysqli->query("SELECT * FROM `user` WHERE `login`='$user'");

					while (($row = $result_set->fetch_assoc()) != false) {
						echo "<p>your login:</p>
						<div class='row'>
							<p>&bull;".$row['login']."</p>
						</div>
						<p>your name:</p>
						<div class='row'>
							<p>&bull;".$row['name']."</p>	
						</div>
						<p>your email:</p>
						<div class='row'>
							<p>&bull;".$row['email']."</p>	
						</div>
						<p>your phone:</p>
						<div class='row'>
							<p>&bull;".$row['phone']."</p>
						</div>
						<p>info:</p>
						<div class='row'>
							<p>&bull;".$row['info']."</p>
						</div>";
					}	

				?>
			</div>
			<div class="block_update">
				<div class="Product_Edit_Buttons">
					<script>
					  	$(document).ready(function(){
					      	$(".button").click(function(){ // запускаем функцию при клике
					        $("div.update_user_info:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
					        $("div.update_photo_user:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
					      	$("div.update_user_info:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
					      	});
					  	});
					</script>
					<script>
					  	$(document).ready(function(){
					      	$(".photo_user").click(function(){ // запускаем функцию при клике
					        $("div.update_photo_user:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
					        $("div.update_user_info:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
					      	$("div.update_photo_user:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд

					      	});
					  	});
					</script>
					<button name="button" class="button">
						<div class="block">
							<img src="../images/update.png" alt="Plus">
						</div>
					</button>
					<button name="photo_user" class="photo_user">
						<div class="block">
							<img src="../images/add-photo.png" alt="Plus">
						</div>
					</button>
				</div>
				<div class="update_user_info">
					<?php 
						$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
					    $mysqli->set_charset('utf8');

							$user = $_SESSION['login'];

				            $result_set = $mysqli->query("SELECT * FROM `user` WHERE `login`='$user'"); // выводим данные таблицы для изменения 

				            while (($row = $result_set->fetch_assoc()) != false) { // вызываем форму с данными при нажатии на кнопку "Выбрать"
				                echo "<form>
				                    <input type='text' name='new_name' value='".$row['name']."' placeholder='Введите имя'>
				                    <br>
				                    <input type='text' name='new_email' value='".$row['email']."' placeholder='Введите Email'>
				                    <br>
				                    <input type='text' name='new_login' value='".$row['login']."' placeholder='Введите логин'>
				                    <br>
				                    <input type='text' name='new_phone' value='".$row['phone']."' placeholder='Введите телефон'>
				                    <br>
				                    <textarea name='new_info' rows='10' placeholder='раскажите о себе'>".$row['info']."</textarea>
				                    <br>
				                    <input type='submit' name='update' value='Записать'>
				                </form>";
				            }
				        
				        if (isset($_GET['update'])) { // при нажатии на кнопку "Записать" записываем значения полей в переменные 
				        	$login = $_SESSION['login'];
				            $newName = $mysqli->real_escape_string($_GET['new_name']);
				            $newEmail = $mysqli->real_escape_string($_GET['new_email']);
				            $newLogin = $mysqli->real_escape_string($_GET['new_login']);
				            $newPhone = $mysqli->real_escape_string($_GET['new_phone']);
				            $newInfo = $mysqli->real_escape_string($_GET['new_info']);

				            $result_set = $mysqli->query("UPDATE `user` SET `name` = '$newName', `email` = '$newEmail', `login` = '$newLogin', `phone` = '$newPhone', `info` = '$newInfo' WHERE `user`.`login` = '$login'");
				        }

				        $mysqli->close();
					?>	
				</div>
				<div class="update_photo_user">
					<?php 

						$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
					    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
					    $mysqli->set_charset('utf8');

					    $login = $_SESSION['login'];

						if (isset($_POST['upload'])) {
					        $blacklist = ['.php', '.phtml', '.php3', '.php4', '.html', '.htm']; // массив с расширениями
					        foreach ($blacklist as $item) {
					            if (preg_match("/$item$/", $_FILES['photo']['name'])) exit('Расширение файла не подходит!'); // запрет на расширения
					        }

					        $type = getimagesize($_FILES['photo']['tmp_name']); // проверка типа файла

					        if ($type && ($type['mime'] != 'image/png' || 
					        $type['mime'] != 'image/jpg' || $type['mime'] != 'image/jpeg')) {
					            if ($_FILES['photo']['size'] < 1024 * 1000) { // размер файла

					                $upload = 'uploads/'.$_FILES['photo']['name']; // путь для загрузки файла

					                if (move_uploaded_file($_FILES['photo']['tmp_name'], $upload)) {
					                    echo 'Файл успешно загружен!'; // загрузка файла в папку
					                    $photo = $mysqli->real_escape_string(htmlspecialchars($_FILES['photo']['name']));
					                }else echo 'Ошибка при загрузке файла';
					            }
					            else echo "Размер файла превышен!";
					        }
					        else echo "Тип файла не подходит";
					        /*$photo = $mysqli->real_escape_string(htmlspecialchars($_FILES['photo']['name']));*/

					        $query = $mysqli->query("UPDATE `user` SET `photo` = '$photo' WHERE `user`.`login` = '$login'");

					        $res = $mysqli->query($query);
					    }
					?>
					<form name="upload" method="post" enctype="multipart/form-data">
					    <?php if (isset($res)) { ?>
					        <?php if ($res) { ?>
					            <p>Товар добавлен</p>
					        <?php } else { ?>
					            <p color="red">Ошибка при добавлении!</p>
					        <?php } ?>
					    <?php } ?>
					    <p>
					        <input type="file" name="photo" id="photo" />
					    </p>
					    <p>
					        <input type="submit" name="upload" value="Отправить" />
					    </p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>