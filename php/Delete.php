<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'device_shop');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');

    $result_set = $mysqli->query('SELECT * FROM `proto`');

    // удаление
	if (isset($_GET['delete'])) {
	    $Name = $mysqli->real_escape_string($_GET['name']);
	    $query = "DELETE FROM `proto` WHERE `proto`.`name` = '$Name'";

	    $result = $mysqli->query($query);
	}

	if (isset($_GET['delete_kategory'])) {
	    $kategoryname = $mysqli->real_escape_string($_GET['kategory']);
	    $query = "DELETE FROM `kategory` WHERE `kategory`.`kategory_name` = '$kategoryname'";

	    $resultkategory = $mysqli->query($query);
	}

	if (isset($_GET['delete_proizvod'])) {
	    $proizvoditelname = $mysqli->real_escape_string($_GET['proizvoditel']);
	    $query = "DELETE FROM `proizvoditel` WHERE `proizvoditel`.`proizvod_name` = '$proizvoditelname'";

	    $resultproizvoditel = $mysqli->query($query);
	}

	if (isset($_GET['delete_country'])) {
	    $countryname = $mysqli->real_escape_string($_GET['country']);
	    $query = "DELETE FROM `country` WHERE `country`.`country_name` = '$countryname'";

	    $resultcountry = $mysqli->query($query);
	}

    $mysqli->close();
?>
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
                        <li><a class="C1" href="../Autorization.php">Личный Кабинет</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header> 
    <div id="DataBase" name="DataBase">
    	<div class="block">
        <div class="add" name="add">
            <h3>Удалить товар</h3>
            <?php if (isset($result)) { ?>
                <?php if ($result) { ?>
                    <p>Товар удалён</p>
                <?php } else { ?>
                    <p color="red">Ошибка при удалении!</p>
                <?php } ?>
            <?php } ?>
            <form>
                <fieldset>
                	<legend>Выберете товар</legend>
	                <select name="name" id="name">
	                    <option value="1"></option>
	                    <?php 
	                        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	                        if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
	                        $mysqli->set_charset('utf8');

	                        $result_set = $mysqli->query('SELECT * FROM `proto`');

	                            while (($row = $result_set->fetch_assoc()) != false) {
	                                echo "<option>".$row['name']."</option>";
	                            }

	                        $mysqli->close();
	                    ?>
	                </select>
            	</fieldset>
            	<input type="submit" name="delete" value="Удалить">
            </form>
        </div>
        <div class="add" name="add">
            <h3>Удалить категорию</h3>
            <?php if (isset($resultkategory)) { ?>
                <?php if ($resultkategory) { ?>
                    <p>Категория удалена</p>
                <?php } else { ?>
                    <p color="red">Ошибка при удалении!</p>
                <?php } ?>
            <?php } ?>
            <form>
                <fieldset>
                	<legend>Выберете категорию</legend>
	                <select name="kategory" id="kategory">
	                    <option value="1"></option>
	                    <?php 
	                        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	                        if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
	                        $mysqli->set_charset('utf8');

	                        $result_set = $mysqli->query('SELECT * FROM `kategory`');

	                            while (($row = $result_set->fetch_assoc()) != false) {
	                                echo "<option>".$row['kategory_name']."</option>";
	                            }

	                        $mysqli->close();
	                    ?>
	                </select>
            	</fieldset>
            	<input type="submit" name="delete_kategory" value="Удалить">
            </form>
    	</div>
        </div>
        <div class="block">
        <div class="add" name="add">
            <h3>Удалить производителя</h3>
            <?php if (isset($resultproizvoditel)) { ?>
                <?php if ($resultproizvoditel) { ?>
                    <p>Производитель удалён</p>
                <?php } else { ?>
                    <p color="red">Ошибка при удалении!</p>
                <?php } ?>
            <?php } ?>
            <form>
                <fieldset>
                	<legend>Выберете производителя</legend>
	                <select name="proizvoditel" id="proizvoditel">
	                    <option value="1"></option>
	                    <?php 
	                        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	                        if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
	                        $mysqli->set_charset('utf8');

	                        $result_set = $mysqli->query('SELECT * FROM `proizvoditel`');

	                            while (($row = $result_set->fetch_assoc()) != false) {
	                                echo "<option>".$row['proizvod_name']."</option>";
	                            }

	                        $mysqli->close();
	                    ?>
	                </select>
            	</fieldset>
            	<input type="submit" name="delete_proizvod" value="Удалить">
            </form>
        </div>
        <div class="add" name="add">
            <h3>Удалить страну</h3>
            <?php if (isset($resultcountry)) { ?>
                <?php if ($resultcountry) { ?>
                    <p>Страна удалена</p>
                <?php } else { ?>
                    <p color="red">Ошибка при удалении!</p>
                <?php } ?>
            <?php } ?>
            <form>
                <fieldset>
                	<legend>Выберете страну</legend>
	                <select name="country" id="country">
	                    <option value="1"></option>
	                    <?php 
	                        $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	                        if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
	                        $mysqli->set_charset('utf8');

	                        $result_set = $mysqli->query('SELECT * FROM `country`');

	                            while (($row = $result_set->fetch_assoc()) != false) {
	                                echo "<option>".$row['country_name']."</option>";
	                            }

	                        $mysqli->close();
	                    ?>
	                </select>
            	</fieldset>
            	<input type="submit" name="delete_country" value="Удалить">
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