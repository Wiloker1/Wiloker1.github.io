<?php 
    
    $mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');

        $result_set = $mysqli->query('SELECT * FROM `user`');

        if (isset($_POST['logout'])) {
            unset($_SESSION['login']);
            unset($_SESSION['password']);
        }

    $mysqli->close();
?>

	<div id="Personal_Area">
		<div class="people">
			<div class="photo">
				<div class="img">
					<img src="images/User.png" alt="Admin">
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
					<p>Ваш логин:</p>
					<div class="row">
					<p><?=$_SESSION['login']?></p>	
					</div>
				</div>
				<div class="Product_Edit_Buttons">
					<a href="php\Create.php">
						<div class="button">	
							<img src="../images/add.png" alt="Plus">
						</div>
					</a>
					<a href="php\Update.php">
						<div class="button">	
							<img src="../images/update.png" alt="Plus">
						</div>
					</a>
					<a href="php\Delete.php">
						<div class="button">	
							<img src="../images/delete.png" alt="Plus">
						</div>
					</a>
				</div>
			</div>
			<div class="table">
				<div class="Product_Table">
					<table>
						<tr>
							<td class="heading">Наименование</td>
							<td class="heading">Категория</td>
							<td class="heading">Происводитель</td>
							<td class="heading">Страна</td>
							<td class="heading">Описание</td>
							<td class="heading">Цена</td>
						</tr>
						<?php 
							$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
						    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
						    $mysqli->set_charset('utf8');
								
						        $result_set = $mysqli->query('SELECT * FROM `proto`');

						        while (($tovar = $result_set->fetch_assoc()) != false) {
						        	echo "<tr>";
						        		echo "<td>".$tovar['name']."</td>";
						        		echo "<td>".$tovar['kategory_name']."</td>";
						        		echo "<td>".$tovar['proizvod_name']."</td>";
						        		echo "<td>".$tovar['country_name']."</td>";
						        		echo "<td>".$tovar['text']."</td>";
						        		echo "<td>".$tovar['cena']."</td>";
						        	echo "</tr>";
						        }

						    $mysqli->close();
						?>
					</table>
				</div>
				<div class="Table_Filters">
						<script> /*показ/скрытие формы добавления категорий при нажатии на кнопку +*/
						    $(document).ready(function(){
						        $(".Create_Kategory").click(function(){ // запускаем функцию при клике
						            $("div.Form_Kategory_Create:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						        $("div.Form_Kategory_Create:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						        });
						    });
						</script>
						<script> /*показ/скрытие формы удаление категорий при нажатии на кнопку -*/
						  $(document).ready(function(){
						      $(".Delete_Kategory").click(function(){ // запускаем функцию при клике
						      
						      $("div.Form_Kategory_Delete:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						      $("div.Form_Kategory_Delete:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						      });
						  });
						</script>
						<script> /*показ/скрытие формы обнавления категорий при нажатии на кнопку /*/
						  $(document).ready(function(){
						      $(".Update_Kategory").click(function(){ // запускаем функцию при клике
						          $("div.Form_Kategory_Update:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						      $("div.Form_Kategory_Update:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						      });
						  });
						</script>
						<script> /*показ/скрытие формы добавления категорий при нажатии на кнопку +*/
						    $(document).ready(function(){
						        $(".Create_Proizvoditel").click(function(){ // запускаем функцию при клике
						            $("div.Form_Proizvoditel_Create:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						        $("div.Form_Proizvoditel_Create:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						        });
						    });
						</script>
						<script> /*показ/скрытие формы удаление категорий при нажатии на кнопку -*/
						  $(document).ready(function(){
						      $(".Delete_Proizvoditel").click(function(){ // запускаем функцию при клике
						          $("div.Form_Proizvoditel_Delete:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						      $("div.Form_Proizvoditel_Delete:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						      });
						  });
						</script>
						<script> /*показ/скрытие формы обнавления категорий при нажатии на кнопку /*/
						  $(document).ready(function(){
						      $(".Update_Proizvoditel").click(function(){ // запускаем функцию при клике
						          $("div.Form_Proizvoditel_Update:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						      $("div.Form_Proizvoditel_Update:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						      });
						  });
						</script>
						<script> /*показ/скрытие формы добавления категорий при нажатии на кнопку +*/
						    $(document).ready(function(){
						        $(".Create_Country").click(function(){ // запускаем функцию при клике
						            $("div.Form_Country_Create:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						        $("div.Form_Country_Create:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						        });
						    });
						</script>
						<script> /*показ/скрытие формы удаление категорий при нажатии на кнопку -*/
						  $(document).ready(function(){
						      $(".Delete_Country").click(function(){ // запускаем функцию при клике
						          $("div.Form_Country_Delete:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						      $("div.Form_Country_Delete:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						      });
						  });
						</script>
						<script> /*показ/скрытие формы обнавления категорий при нажатии на кнопку /*/
						  $(document).ready(function(){
						      $(".Update_Country").click(function(){ // запускаем функцию при клике
						          $("div.Form_Country_Update:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
						      $("div.Form_Country_Update:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
						      });
						  });
						</script>
						<!-- фунция записи в таблицу категорий -->
						
					<div class="Table_Kategory"> <!-- отображение таблицы категорий -->
						<table>
							<tr>
								<td class="heading">Категории</td>
							</tr>
							<?php 
								$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
							    $mysqli->set_charset('utf8');
									
							        $result_set = $mysqli->query('SELECT * FROM `kategory`');

							        while (($tovar = $result_set->fetch_assoc()) != false) {
							        	echo "<tr>";
							        		echo "<td>".$tovar['kategory_name']."</td>";
							        	echo "</tr>";
							        }

							    $mysqli->close();
							?>
						</table>
						<div class="Button_Kategory">
							<button name="Create_Kategory" class="Create_Kategory"><img src="../images/add.png" alt="Plus"></button>
							<button name="Delete_Kategory" class="Delete_Kategory"><img src="../images/delete.png" alt="Minus"></button>
							<button name="Update_Kategory" class="Update_Kategory"><img src="../images/Update.png" alt="Update"></button>
						</div>
						<?php 
						 $SpellingCheck = '/[A-ZА-Я0-9][A-ZА-Яa-zа-я0-9]/';

							$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
							    $mysqli->set_charset('utf8');

							    	if (isset($_POST['createKategory'])) {
							    		$kategory = $mysqli->real_escape_string(htmlspecialchars($_POST['kategory']));
							    		$icon = $mysqli->real_escape_string(htmlspecialchars($_POST['icon']));

							    	$filterCategory = preg_match($SpellingCheck, $kategory);

								    	if ($filterCategory) {
								    		$query = "INSERT INTO `kategory` (`Icon`, `kategory_name`)
								    		 VALUES ('$icon', '$kategory')";
								    	$resultcategory = $mysqli->query($query);
								    	}else echo "<p>не верно</p>";
							    	}

							    	if (isset($_GET['delete'])) {
						          $Name = $mysqli->real_escape_string($_GET['namekategory']);
						          $query = "DELETE FROM `kategory` WHERE `kategory`.`kategory_name` = '$Name'";

						          $resultcategoryDelete = $mysqli->query($query);
						        }

							    $mysqli->close();
						?>
						<div class="Form_Kategory_Create">
							<p>Добавление категории</p>
							<?php if (isset($resultcategory)) { ?>
		              <?php if ($resultcategory) { ?>
		                  <p>Категория добавленна!</p>
		              <?php } else { ?>
		                  <p class="red">Ошибка добавления!</p>
		                  <p class="red">Не верный ввод данных</p>
		              <?php } ?>
		          <?php } ?>
							<form method="post">
								<input type="text" name="kategory" id="kategory">
								<input type="file" name="icon" id="icon">
								<input type="submit" name="createKategory" value="Записать">
							</form>
						</div>
						<div class="Form_Kategory_Delete">
							<p>Удаление категории</p>
							<?php if (isset($resultcategoryDelete)) { ?>
		              <?php if ($resultcategoryDelete) { ?>
		                  <p>Категория удаленна!</p>
		              <?php } else { ?>
		                  <p class="red">Ошибка удаления!</p>
		                  <p class="red">Выберете категорию</p>
		              <?php } ?>
		          <?php } ?>
							<form>
							    <select id='namekategory' name='namekategory' size='1'>
							        <option value='1' selected='selected'></option>
							            <?php
								           	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
												    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
												    $mysqli->set_charset('utf8');
												
										        $result_set = $mysqli->query('SELECT * FROM `kategory`');

										         while (($row = $result_set->fetch_assoc()) != false) {
										                echo "<option>".$row['kategory_name']."</option>";
										                $result = $mysqli->query($query);
										            }
										        $mysqli->close();
									       	?>
							    </select>
							    <br>
								<input type='submit' name='delete' value='Удалить'>
							</form>
						</div>
						<div class="Form_Kategory_Update">
							<form>
						        <select name="user" id="user">
						            <option value="1"></option>
						            <?php 
						            	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
										$mysqli->set_charset('utf8');

						                $result_set = $mysqli->query('SELECT * FROM `kategory`'); // выводим данные таблицы в выпадаюший список

						                while (($row = $result_set->fetch_assoc()) != false) {
						                    echo "<option>".$row['kategory_name']."</option>";
						                }


						            ?>
						        </select>
						        <input type="submit" name="button" value="Выбрать">
						    </form>
						    <?php 
						        if (isset($_GET['button'])) {
						        	$user = $mysqli->real_escape_string($_GET['user']); // записываем выбронное значение из списка в переменную

						            $result_set = $mysqli->query("SELECT * FROM `kategory` WHERE `kategory_name`='$user'"); // выводим данные таблицы для изменения 

						            while (($row = $result_set->fetch_assoc()) != false) { // вызываем форму с данными при нажатии на кнопку "Выбрать"
						                echo "<form>
						                	<p>Old name</p>				
											<input type='text' name='old_name' value='".$row['kategory_name']."' readonly>
											<br>
											<p>New name</p>	
						                    <input type='text' name='new_name' value='".$row['kategory_name']."'>
						                    <br>
						                    <input type='submit' name='update' value='Записать'>
						                </form>";
						            }
						        }
						        if (isset($_GET['update'])) { // при нажатии на кнопку "Записать" записываем значения полей в переменные 

						            $newName = $mysqli->real_escape_string($_GET['new_name']);
						            $oldName = $mysqli->real_escape_string($_GET['old_name']);

						            $query = $mysqli->query("UPDATE `kategory` SET `kategory_name` = '$newName' WHERE `kategory`.`kategory_name` = '$oldName'");

						            $result = $mysqli->query($query);
						        }

						        $mysqli->close();
						    ?>
						</div>
					</div>

					<div class="Table_Kategory"> <!-- отображение таблицы производителей -->
						<table>
							<tr>
								<td class="heading">Производители</td>
							</tr>
							<?php 
								$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
							    $mysqli->set_charset('utf8');
									
							        $result_set = $mysqli->query('SELECT * FROM `proizvoditel`');

							        while (($tovar = $result_set->fetch_assoc()) != false) {
							        	echo "<tr>";
							        		echo "<td>".$tovar['proizvod_name']."</td>";
							        	echo "</tr>";
							        }

							    $mysqli->close();
							?>
						</table>
						<div class="Button_Kategory">
							<button name="Create_Proizvoditel" class="Create_Proizvoditel"><img src="../images/add.png" alt="Plus"></button>
							<button name="Delete_Proizvoditel" class="Delete_Proizvoditel"><img src="../images/delete.png" alt="Minus"></button>
							<button name="Update_Proizvoditel" class="Update_Proizvoditel"><img src="../images/Update.png" alt="Update"></button>
						</div>
							<?php 
								$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
								if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
								$mysqli->set_charset('utf8');

								if (isset($_POST['createproizvoditel'])) {
									$proizvoditel = $mysqli->real_escape_string(htmlspecialchars($_POST['proizvoditel']));

									$filterCategory = preg_match($SpellingCheck, $proizvoditel);

									if ($filterCategory) {
										$query = "INSERT INTO `proizvoditel` (`proizvod_name`)
										 VALUES ('$proizvoditel')";
										$res = $mysqli->query($query);
									}else echo "<p>не верно</p>";
								}

								if (isset($_GET['deleteproizvod'])) {
								  $proiz = $mysqli->real_escape_string($_GET['proiz']);
								  $query = "DELETE FROM `proizvoditel` WHERE `proizvoditel`.`proizvod_name` = '$proiz'";

								  $resultproizvoditelDelete = $mysqli->query($query);
								}

								$mysqli->close();
							?>
						<div class="Form_Proizvoditel_Create">
							<p>Добавление производителя</p>
							<?php if (isset($res)) { ?>
		              <?php if ($res) { ?>
		                  <p>Производитель добавленн!</p>
		              <?php } else { ?>
		                  <p class="red">Ошибка добавления!</p>
		                  <p class="red">Не верный ввод данных</p>
		              <?php } ?>
		          <?php } ?>
							<form method="post">
								<input type="text" name="proizvoditel" id="proizvoditel">
								<input type="submit" name="createproizvoditel" id="createproizvoditel" value="Записать">
							</form>
						</div>
						<div class="Form_Proizvoditel_Delete">
							<p>Удаление производителя</p>
							<?php if (isset($resultproizvoditelDelete)) { ?>
		              <?php if ($resultproizvoditelDelete) { ?>
		                  <p>Производитель удалён!</p>
		              <?php } else { ?>
		                  <p class="red">Ошибка удаления!</p>
		                  <p class="red">Выберете производителя</p>
		              <?php } ?>
		          <?php } ?>
							<form>
							    <select id='proiz' name='proiz' size='1'>
							        <option value='1' selected='selected'></option>
							            <?php
								           	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
												    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
												    $mysqli->set_charset('utf8');
												
										        $result_set_proizvoditel = $mysqli->query('SELECT * FROM `proizvoditel`');

										         while (($row = $result_set_proizvoditel->fetch_assoc()) != false) {
										                echo "<option>".$row['proizvod_name']."</option>";
										                $result = $mysqli->query($query);
										            }
										        $mysqli->close();
									       	?>
							    </select>
							    <br>
								<input type='submit' name='deleteproizvod' value='Удалить'>
							</form>
						</div>
						<div class="Form_Proizvoditel_Update">
							<form>
						        <select name="proizvod" id="proizvod">
						            <option value="1"></option>
						            <?php 
						            	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
										$mysqli->set_charset('utf8');

						                $result_set = $mysqli->query('SELECT * FROM `proizvoditel`'); // выводим данные таблицы в выпадаюший список

						                while (($row = $result_set->fetch_assoc()) != false) {
						                    echo "<option>".$row['proizvod_name']."</option>";
						                }


						            ?>
						        </select>
						        <input type="submit" name="button_proizvod" value="Выбрать">
						    </form>
						    <?php 
						        if (isset($_GET['button_proizvod'])) {
						        	$proizvod = $mysqli->real_escape_string($_GET['proizvod']); // записываем выбронное значение из списка в переменную

						            $result_set = $mysqli->query("SELECT * FROM `proizvoditel` WHERE `proizvod_name`='$proizvod'"); // выводим данные таблицы для изменения 

						            while (($row = $result_set->fetch_assoc()) != false) { // вызываем форму с данными при нажатии на кнопку "Выбрать"
						                echo "<form>
						                	<p>Old name</p>				
											<input type='text' name='old_name' value='".$row['proizvod_name']."' readonly>
											<br>
											<p>New name</p>	
						                    <input type='text' name='new_name' value='".$row['proizvod_name']."'>
						                    <br>
						                    <input type='submit' name='update' value='Записать'>
						                </form>";
						            }
						        }
						        if (isset($_GET['update'])) { // при нажатии на кнопку "Записать" записываем значения полей в переменные 

						            $newName = $mysqli->real_escape_string($_GET['new_name']);
						            $oldName = $mysqli->real_escape_string($_GET['old_name']);

						            $query = $mysqli->query("UPDATE `proizvoditel` SET `proizvod_name` = '$newName' WHERE `proizvoditel`.`proizvod_name` = '$oldName'");

						            $result = $mysqli->query($query);
						        }

						        $mysqli->close();
						    ?>
						</div>
					</div>


					<div class="Table_Kategory"> <!-- отображение таблицы стран -->
						<table>
							<tr>
								<td class="heading">Страны</td>
							</tr>
							<?php 
								$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
							    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
							    $mysqli->set_charset('utf8');
									
							        $result_set = $mysqli->query('SELECT * FROM `country`');

							        while (($tovar = $result_set->fetch_assoc()) != false) {
							        	echo "<tr>";
							        		echo "<td>".$tovar['country_name']."</td>";
							        	echo "</tr>";
							        }

							    $mysqli->close();
							?>
						</table>
						<div class="Button_Kategory">
							<button name="Create_Country" class="Create_Country"><img src="../images/add.png" alt="Plus"></button>
							<button name="Delete_Country" class="Delete_Country"><img src="../images/delete.png" alt="Minus"></button>
							<button name="Update_Country" class="Update_Country"><img src="../images/Update.png" alt="Update"></button>
						</div>
						<!-- фунция записи в таблицу категорий -->
						<?php 
								$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
								if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
								$mysqli->set_charset('utf8');

								if (isset($_POST['createCountry'])) {
									$country = $mysqli->real_escape_string(htmlspecialchars($_POST['country']));

									$filterCategory = preg_match($SpellingCheck, $country);

									if ($filterCategory) {
										$query = "INSERT INTO `country` (`country_name`)
										 VALUES ('$country')";
										$resultcountry = $mysqli->query($query);
									}else echo "<p>не верно</p>";
								}

								if (isset($_GET['deletecountry'])) {
								  $count = $mysqli->real_escape_string($_GET['count']);
								  $query = "DELETE FROM `country` WHERE `country`.`country_name` = '$count'";

								  $resultproizvoditelDelete = $mysqli->query($query);
								}

								$mysqli->close();
							?>
						<div class="Form_Country_Create">
							<p>Добавление производителя</p>
							<?php if (isset($resultcountry)) { ?>
		              <?php if ($resultcountry) { ?>
		                  <p>Производитель добавленн!</p>
		              <?php } else { ?>
		                  <p class="red">Ошибка добавления!</p>
		                  <p class="red">Не верный ввод данных</p>
		              <?php } ?>
		          <?php } ?>
							<form method="post">
								<input type="text" name="country" id="country">
								<input type="submit" name="createCountry" value="Записать">
							</form>
						</div>
						<div class="Form_Country_Delete">
							<p>Удаление производителя</p>
							<?php if (isset($resultcountryDelete)) { ?>
		              <?php if ($resultcountryDelete) { ?>
		                  <p>Производитель удалён!</p>
		              <?php } else { ?>
		                  <p class="red">Ошибка удаления!</p>
		                  <p class="red">Выберете производителя</p>
		              <?php } ?>
		          <?php } ?>
							<form>
							    <select id='count' name='count' size='1'>
							        <option value='1' selected='selected'></option>
							            <?php
								           	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
												    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
												    $mysqli->set_charset('utf8');
												
										        $result_set_country = $mysqli->query('SELECT * FROM `country`');

										         while (($row = $result_set_country->fetch_assoc()) != false) {
										                echo "<option>".$row['country_name']."</option>";
										                $result = $mysqli->query($query);
										            }
										        $mysqli->close();
									       	?>
							    </select>
							    <br>
								<input type='submit' name='deletecountry' value='Удалить'>
							</form>
						</div>
						<div class="Form_Country_Update">
							<form>
						        <select name="countrytwo" id="countrytwo">
						            <option value="1"></option>
						            <?php 
						            	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
										if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
										$mysqli->set_charset('utf8');

						                $result_set = $mysqli->query('SELECT * FROM `country`'); // выводим данные таблицы в выпадаюший список

						                while (($row = $result_set->fetch_assoc()) != false) {
						                    echo "<option>".$row['country_name']."</option>";
						                }
						            ?>
						        </select>
						        <input type="submit" name="button_country" value="Выбрать">
						    </form>
						    <?php 
						        if (isset($_GET['button_country'])) {
						        	$country = $mysqli->real_escape_string($_GET['countrytwo']); // записываем выбронное значение из списка в переменную

						            $result_set = $mysqli->query("SELECT * FROM `country` WHERE `country_name`='$country'"); // выводим данные таблицы для изменения 

						            while (($row = $result_set->fetch_assoc()) != false) { // вызываем форму с данными при нажатии на кнопку "Выбрать"
						                echo "<form>
						                	<p>Old name</p>				
											<input type='text' name='old_name' value='".$row['country_name']."' readonly>
											<br>
											<p>New name</p>	
						                    <input type='text' name='new_name' value='".$row['country_name']."'>
						                    <br>
						                    <input type='submit' name='update' value='Записать'>
						                </form>";
						            }
						        }
						        if (isset($_GET['update'])) { // при нажатии на кнопку "Записать" записываем значения полей в переменные 

						            $newName = $mysqli->real_escape_string($_GET['new_name']);
						            $oldName = $mysqli->real_escape_string($_GET['old_name']);

						            $query = $mysqli->query("UPDATE `country` SET `country_name` = '$newName' WHERE `country`.`country_name` = '$oldName'");

						            $result = $mysqli->query($query);
						        }

						        $mysqli->close();
						    ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>