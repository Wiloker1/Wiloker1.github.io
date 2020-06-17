<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'device_shop');
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');

    $result_set = $mysqli->query('SELECT * FROM `proto`');

    //Добавление
    if (isset($_GET['button'])) {
        $name = $mysqli->real_escape_string(htmlspecialchars($_GET['name']));
        $photo = $_GET['Photo'];
        $texttarea = str_replace("\r\n", "<br>", $_GET['text']);
        $text = $mysqli->real_escape_string(htmlspecialchars($texttarea));
        $kategory = $mysqli->real_escape_string(htmlspecialchars($_GET['kategory'])); // сделать через GET при помоши select
        $proizvoditel = $mysqli->real_escape_string(htmlspecialchars($_GET['proizvoditel']));// сделать через GET при помоши select
        $strana = $mysqli->real_escape_string(htmlspecialchars($_GET['strana']));// сделать через GET при помоши select
        $cena = $mysqli->real_escape_string(htmlspecialchars($_GET['cena']));

        $query = "INSERT INTO `proto` (`name`, `photo`, `text`, `kategory_name`, `proizvod_name`, `country_name`, `cena`) VALUES ('$name', '$photo', '$text', '$kategory', '$proizvoditel', '$strana', '$cena')";

        $res = $mysqli->query($query);
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
        <div class="create" name="create">
            <h3>Добавить товар</h3>
            <?php if (isset($res)) { ?>
                <?php if ($res) { ?>
                    <p>Товар добавлен</p>
                <?php } else { ?>
                    <p color="red">Ошибка при добавлении!</p>
                <?php } ?>
            <?php } ?>
            <form>
                <input type="text" name="name" id="name" placeholder="Наименование товара">
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
	                                echo "<option>".$row['kategory_name']."</option>";
	                            }

	                        $mysqli->close();
	                    ?>
	                </select>
                </fieldset>
                <br>
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
                <br>
                <fieldset>
                	<legend>Выберете страну произвотства</legend>
	                <select name="strana" id="strana">
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
                <!-- <input type="text" name="proizvoditel" id="proizvoditel" placeholder="Производитель"> -->
                <!-- <input type="text" name="strana" id="strana" placeholder="Страна произвотства"> -->
                <textarea name="text" id="text" cols="30" rows="10" placeholder="Введите описание товара"></textarea>
                <p>Фото товара:</p><input type="file" name="Photo" id="Photo" enctype="multipart/form-data">
                <input type="number" name="cena" id="cena" placeholder="введите цену товара">
                <input type="submit" name="button" value="Занести">
            </form>
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