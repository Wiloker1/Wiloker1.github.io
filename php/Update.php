<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Device shop</title>
	<link rel="stylesheet" href="../css/Admin.css">
</head>
<body>
	<header>
		<div id="Logo">
			<div class="wrap">
				<div class="logo">
					<a href="../index.php">
						<img href="index.php" src="../images/Logo.png" />
					</a>
				</div>
				<div class="A1">
					<ul class="menu" >
						<li ><a href="../index.php" >Магазин</a></li>
						<li><a class="C1" href="../Autorization.php">Личный кабинет</a></li>
					</ul>
				</div>
			</div>
		</div>
	</header>
	<div id="update">
		<div class="update_device_shop">
			<br>
			<br>
			<br>
			<form>
				<fieldset>
	            	<legend>Выберете товар</legend>
		            <select name="Device_shop" id="Device_shop">
		                <option value="1" placeholder='Выберете товар'></option>
		                <?php 
		                	define('DB_HOST', 'localhost');
						    define('DB_USER', 'root');
						    define('DB_PASSWORD', 'root');
						    define('DB_NAME', 'device_shop');

		                    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		                    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
		                    $mysqli->set_charset('utf8');

		                    $result_set = $mysqli->query('SELECT * FROM `proto`');

		                        while (($row = $result_set->fetch_assoc()) != false) {
		                            echo "<option name='old_product'>".$row['name']."</option>";
		                        }
		                ?>
		            </select>
		            <input type="submit" name="update" value="Обновить">
	            </fieldset>
	            <?php 
	            @$oldProduct = $mysqli->real_escape_string($_GET['Device_shop']);
	            if (isset($_GET['update'])) {

	            	$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name`='$oldProduct'");

	            	while (($row = $result_set->fetch_assoc()) != false) {
	            		$text = str_replace("\r\n", "<br>", $row['text']);
						echo "<div class='update'>
							<input type='text' name='old_name_product' id='old_name_product' value='".$row['name']."' readonly>
							<input type='text' name='name' id='name' value='".$row['name']."'>
							<br>
							<input type='number' name='cena' id='cena' value='".$row['cena']."'>
							<br>
							
							<textarea name='text' id='text' cols='30' rows='10'>".$text."</textarea>
						</div>";
	            	}

	            	echo "<div class='select_update'>";
		            	$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name`='$oldProduct'");
		            	$result_select = $mysqli->query("SELECT * FROM `kategory`");
		            	while (($row = $result_set->fetch_assoc()) != false) {
			            	echo "<select name='kategory_Device_shop' id='kategory_Device_shop'>
				                <option value='1' placeholder='Выберете товар'>".$row['kategory_name']."</option>";
				                while (($sel = $result_select->fetch_assoc()) != false) {
				                	echo "<option name='kategory_Device'>".$sel['kategory_name']."</option>";
				                }
				            echo "</select>";
			        	}

			        	$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name`='$oldProduct'");
		            	$result_select = $mysqli->query("SELECT * FROM `proizvoditel`");

			        	while (($row = $result_set->fetch_assoc()) != false) {
			            	echo "<select name='proizvod_Device_shop' id='proizvod_Device_shop'>
				                <option value='1' placeholder='Выберете товар'>".$row['proizvod_name']."</option>";
				                while (($sel = $result_select->fetch_assoc()) != false) {
				                	echo "<option name='proizvod_Device'>".$sel['proizvod_name']."</option>";
				                }
				            echo "</select>";
			        	}

			        	$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name`='$oldProduct'");
		            	$result_select = $mysqli->query("SELECT * FROM `country`");

			        	while (($row = $result_set->fetch_assoc()) != false) {
			            	echo "<select name='country_Device_shop' id='country_Device_shop'>
				                <option value='1' placeholder='Выберете товар'>".$row['country_name']."</option>";
				                while (($sel = $result_select->fetch_assoc()) != false) {
				                	echo "<option name='country_Device'>".$sel['country_name']."</option>";
				                }
				            echo "</select>";
			        	}
		        	echo "<br>";
				echo "<input type='submit' name='new_product' value='записать'>";
		        echo "</div>";

	            }
	            if (isset($_GET['new_product'])) {
	            	$old = $mysqli->real_escape_string($_GET['old_name_product']);
	            	$newName = $mysqli->real_escape_string($_GET['name']);
	            	$newKategory = $mysqli->real_escape_string($_GET['kategory_Device_shop']);
	            	$newProizvoditel = $mysqli->real_escape_string($_GET['proizvod_Device_shop']);
	            	$newCountry = $mysqli->real_escape_string($_GET['country_Device_shop']);
	            	$newCena = $mysqli->real_escape_string($_GET['cena']);
	            	$newText = $mysqli->real_escape_string($_GET['text']);

	            	$query = $mysqli->query("UPDATE `proto` SET `name` = '$newName', `kategory_name` = '$newKategory', `proizvod_name` = '$newProizvoditel', `country_name` = '$newCountry', `cena` = '$newCena', `text` = '$newText' WHERE `proto`.`name` = '$old'");

	            	$result = $mysqli->query($query);

	            }

	            $mysqli->close();
	            ?>
			</form>
		</div>
		<div class="update_device_shop">
			<form>
				<fieldset>
	            	<legend>Выберете категорию</legend>
		            <select name="kategory" id="kategory">
		                <option value="1" placeholder='Выберете категорию'></option>
		                <?php 

		                    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		                    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
		                    $mysqli->set_charset('utf8');

		                    $result_set = $mysqli->query('SELECT * FROM `kategory`');

		                        while (($row = $result_set->fetch_assoc()) != false) {
		                            echo "<option name='old_kategory'>".$row['kategory_name']."</option>";
		                        }
		                ?>
		            </select>
		            <input type="submit" name="update_kategory_button" value="Обновить">
	            </fieldset>
	            <?php 
	            @$oldProduct = $mysqli->real_escape_string($_GET['kategory']);
	            if (isset($_GET['update_kategory_button'])) {

	            	$result_set = $mysqli->query("SELECT * FROM `kategory` WHERE `kategory_name`='$oldProduct'");

	            	while (($row = $result_set->fetch_assoc()) != false) {
						echo "<div class='update'>
							<input type='text' name='old_name_kategory' id='old_name_kategory' value='".$row['kategory_name']."' readonly>
							<input type='text' name='new_name_kategory' id='new_name_kategory' value='".$row['kategory_name']."'>
							<br>
							<input type='submit' name='new_kategory' value='записать'>
						</div>";
	            	}

	            }
	            if (isset($_GET['new_kategory'])) {
	            	$oldKategory = $mysqli->real_escape_string($_GET['old_name_kategory']);
	            	$newNameKategory = $mysqli->real_escape_string($_GET['new_name_kategory']);

	            	$query = $mysqli->query("UPDATE `kategory` SET `kategory_name` = '$newNameKategory' WHERE `kategory`.`kategory_name` = '$oldKategory'");

	            	$result = $mysqli->query($query);

	            }

	            $mysqli->close();
	            ?>
			</form>
		</div>
		<div class="update_device_shop">
			<form>
				<fieldset>
	            	<legend>Выберете производителя</legend>
		            <select name="proizvoditel" id="proizvoditel">
		                <option value="1" placeholder='Выберете производителя'></option>
		                <?php 

		                    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		                    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
		                    $mysqli->set_charset('utf8');

		                    $result_set = $mysqli->query('SELECT * FROM `proizvoditel`');

		                        while (($row = $result_set->fetch_assoc()) != false) {
		                            echo "<option name='old_proizvoditel'>".$row['proizvod_name']."</option>";
		                        }
		                ?>
		            </select>
		            <input type="submit" name="update_proizvoditel_button" value="Обновить">
	            </fieldset>
	            <?php 
	            @$oldProduct = $mysqli->real_escape_string($_GET['proizvoditel']);
	            if (isset($_GET['update_proizvoditel_button'])) {

	            	$result_set = $mysqli->query("SELECT * FROM `proizvoditel` WHERE `proizvod_name`='$oldProduct'");

	            	while (($row = $result_set->fetch_assoc()) != false) {
						echo "<div class='update'>
							<input type='text' name='old_name_proizvoditel' id='old_name_proizvoditel' value='".$row['proizvod_name']."' readonly>
							<input type='text' name='new_name_proizvoditel' id='new_name_proizvoditel' value='".$row['proizvod_name']."'>
							<br>
							<input type='submit' name='new_proizvoditel' value='записать'>
						</div>";
	            	}

	            }
	            if (isset($_GET['new_proizvoditel'])) {
	            	$oldKategory = $mysqli->real_escape_string($_GET['old_name_proizvoditel']);
	            	$newNameKategory = $mysqli->real_escape_string($_GET['new_name_proizvoditel']);

	            	$query = $mysqli->query("UPDATE `proizvoditel` SET `proizvod_name` = '$newNameKategory' WHERE `proizvoditel`.`proizvod_name` = '$oldKategory'");

	            	$result = $mysqli->query($query);

	            }

	            $mysqli->close();
	            ?>
			</form>
		</div>
		<div class="update_device_shop">
			<form>
				<fieldset>
	            	<legend>Выберете страну производства</legend>
		            <select name="country" id="country">
		                <option value="1" placeholder='Выберете страну производства'></option>
		                <?php 

		                    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		                    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
		                    $mysqli->set_charset('utf8');

		                    $result_set = $mysqli->query('SELECT * FROM `country`');

		                        while (($row = $result_set->fetch_assoc()) != false) {
		                            echo "<option name='old_country'>".$row['country_name']."</option>";
		                        }
		                ?>
		            </select>
		            <input type="submit" name="update_country_button" value="Обновить">
	            </fieldset>
	            <?php 
	            @$oldProduct = $mysqli->real_escape_string($_GET['country']);
	            if (isset($_GET['update_country_button'])) {

	            	$result_set = $mysqli->query("SELECT * FROM `country` WHERE `country_name`='$oldProduct'");

	            	while (($row = $result_set->fetch_assoc()) != false) {
						echo "<div class='update'>
							<input type='text' name='old_name_country' id='old_name_country' value='".$row['country_name']."' readonly>
							<input type='text' name='new_name_country' id='new_name_country' value='".$row['country_name']."'>
							<br>
							<input type='submit' name='new_country' value='записать'>
						</div>";
	            	}

	            }
	            if (isset($_GET['new_country'])) {
	            	$oldcountry = $mysqli->real_escape_string($_GET['old_name_country']);
	            	$newNamecountry = $mysqli->real_escape_string($_GET['new_name_country']);

	            	$query = $mysqli->query("UPDATE `country` SET `country_name` = '$newNamecountry' WHERE `country`.`country_name` = '$oldcountry'");

	            	$result = $mysqli->query($query);

	            }

	            $mysqli->close();
	            ?>
			</form>
		</div>
	</div>
	<?php  ?>
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