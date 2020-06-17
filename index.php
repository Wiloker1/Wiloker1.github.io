<?php 
	session_start();
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_NAME', 'device_shop');

	$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
    $mysqli->set_charset('utf8');

    	@$user = $_SESSION['login'];

    	$result_set = $mysqli->query('SELECT * FROM `proto`');

    	@$name = $mysqli->real_escape_string(htmlspecialchars($_POST['name']));

    	while (($row = $result_set->fetch_assoc()) != false) {
    		$pages = false;
	        if (isset($_POST['button_pages'])) {
				$_SESSION['Product_name'] = $name;
				$pages = true;
			}

	        if (isset($_POST['logoutsesion'])) {
	            unset($_SESSION['Product_name']);
       		}
    	}
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>simple design</title>
			<link type="text/css" rel="stylesheet" href="css/Home.css" />
			<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
		</head>
		
		<body>
			<header>
				<div id="Logo">
					<div class="wrap">
						<div class="logo">
							<a href="index.php"><img href="index.php" src="images/Logo.png" /></a>
						</div>
						<div class="A1">
							<ul class="menu" >
								<li ><a class="C1" href="index.php" >Магазин</a></li>
								<li><a href="Autorization.php">Личный Кабинет</a></li>
							</ul>
						</div>
					</div>
				</div>
			</header>
			<?php if($pages) {
				require_once 'php/Products_pages.php';
			} else { ?>
			<div id="content">
				<div id="design">
					<div class="Text">
						<form method="post">
							<input type="text" name="search" id="search">
							<input type="submit" name="buttonsearch" value="Найти">
						</form>
					</div>
				</div>
				<div id='shop'>
					<div class='wrap'>
						<div class="device_shop_filters">
							<button class="kategory">Категории</button>
							<button class="proizvoditel">Производители</button>
							<button class="country">Страны</button>
							<button class="Additional">Сортировка</button>
							<script>
								$(document).ready(function(){
							        $(".kategory").click(function(){ // запускаем функцию при клике
							            $("div.check1:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
							            $("div.check2:visible").hide(100);
							            $("div.check3:visible").hide(100);
							            $("div.Additional_box:visible").hide(100);
							        	$("div.check1:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
							        });
							    });
							</script>
							<script>
								$(document).ready(function(){
							        $(".proizvoditel").click(function(){ // запускаем функцию при клике
							            $("div.check1:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
							            $("div.check2:visible").hide(100);
							            $("div.check3:visible").hide(100);
							            $("div.Additional_box:visible").hide(100);
							        	$("div.check2:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
							        });
							    });
							</script>
							<script>
								$(document).ready(function(){
							        $(".country").click(function(){ // запускаем функцию при клике
							            $("div.check1:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
							            $("div.check2:visible").hide(100);
							            $("div.check3:visible").hide(100);
							            $("div.Additional_box:visible").hide(100);
							        	$("div.check3:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
							        });
							    });
							</script>

							<script>
								$(document).ready(function(){
							        $(".Additional").click(function(){ // запускаем функцию при клике
							            $("div.check1:visible").hide(100);//выбираем все видные div и методом hide() скрываем их за 100 миллисекунд
							            $("div.check2:visible").hide(100);
							            $("div.check3:visible").hide(100);
							            $("div.Additional_box:visible").hide(100);
							        	$("div.Additional_box:hidden").show(100); // выбираем все скрытые div и методом show() отображаем их за 100 миллисекунд
							        });
							    });
							</script>
						    <form method="post">
						        <div class="filter">
						            <?php 
						                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

						                if ($mysqli->connect_errno) {
						                    exit('<h1>Ошибка соединения с БД</h1>');
						                }

						                $mysqli->set_charset('utf8');
						                echo "<div class='check1'>";
							                $result_set = $mysqli->query('SELECT * FROM `kategory`');
							                while (($row = $result_set->fetch_assoc()) != false) {
							                    echo "<div class='kategory_box'>";
							                    echo "<input type='radio' name='kategory' value='".$row['kategory_name']."'> ".$row['kategory_name']."";
							                    echo "</div>";
							                }
						                echo "</div>";
						            ?>
						        </div>
						        <div class="filter">
						            <?php 

						                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

						                if ($mysqli->connect_errno) {
						                    exit('<h1>Ошибка соединения с БД</h1>');
						                }

						                $mysqli->set_charset('utf8');
						                echo "<div class='check2'>";
							                $result_set = $mysqli->query('SELECT * FROM `proizvoditel`');
							                while (($row = $result_set->fetch_assoc()) != false) {
							                    echo "<div class='proizvoditel_box'>";
							                    echo "<input type='radio' name='proizvoditel' value='".$row['proizvod_name']."'> ".$row['proizvod_name']."";
							                    echo "</div>";
							                }
						                echo "</div>";
						            ?>
						        </div>
						        <div class="filter">
						            <?php 

						                $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

						                if ($mysqli->connect_errno) {
						                    exit('<h1>Ошибка соединения с БД</h1>');
						                }

						                $mysqli->set_charset('utf8');

						                echo "<div class='check3'>";
						                $result_set = $mysqli->query('SELECT * FROM `country`');
						                while (($row = $result_set->fetch_assoc()) != false) {
						                    echo "<div class='country_box'>";
						                    echo "<input type='radio' name='country' value='".$row['country_name']."'> ".$row['country_name']."";
						                    echo "</div>";
						                }

						                    echo "</div>";

						            ?>
						        </div>
						    	<div class="Additional_box">
						                <input type="radio" name="price_top" id="price_top"> по возрастанию цены
						                <hr>
						                <input type="radio" name="pricebottom" id="pricebottom"> по убыванию цены
						                <hr>
						                <input type="radio" name="alphabet_A" id="alphabet_A"> по алфовиту A-Z
						                <hr>
						                <input type="radio" name="alphabet_Z" id="alphabet_Z"> по алфовиту Z-A
						        </div>
						        <input type="submit" name="button_filters" value="Применить">
						        <input type="submit" name="button_back" value="Сбросить">
						    </form>
						</div>
						<div class="device_shop_shop">
							<?php 
								@$search = $_POST['search'];

								$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

								if ($mysqli->connect_errno) {
									exit('<h1>Ошибка соединения с БД</h1>');
								}

								$mysqli->set_charset('utf8');

								@$kategory = $mysqli -> real_escape_string($_POST['kategory']);
					            @$proizvoditel = $mysqli -> real_escape_string($_POST['proizvoditel']);
					            @$country = $mysqli -> real_escape_string($_POST['country']);
					            @$price_top = $_POST['price_top'];
					            @$price_bottom = $_POST['pricebottom'];
					            @$alphabet_A = $_POST['alphabet_A'];
					            @$alphabet_Z = $_POST['alphabet_Z'];



								if (isset($_POST['buttonsearch'])) { // поиск
					            	$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name` LIKE '%$search%'");
					            		while (($row = $result_set->fetch_assoc()) != false) {
					            			$photo = $row['photo'];
									    	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
										}			
					            } else if (isset($_POST['button_filters'])) {
					            	if ($price_top == true) {
						            	$result_set = $mysqli->query("SELECT * FROM `proto` ORDER BY `cena`");
								        while (($row = $result_set->fetch_assoc()) != false) {
								        	$photo = $row['photo'];
									    	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
										}
						            }else if($price_bottom == true){
						            	$result_set = $mysqli->query("SELECT * FROM `proto` ORDER BY `cena` DESC");
								        while (($row = $result_set->fetch_assoc()) != false) {
								        	$photo = $row['photo'];
									    	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
										}
						            }else if($alphabet_A == true){
						            	$result_set = $mysqli->query("SELECT * FROM `proto` ORDER BY `name`");
								        while (($row = $result_set->fetch_assoc()) != false) {
								        	$photo = $row['photo'];
									    	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
										}
						            }else if($alphabet_Z == true){
						            	$result_set = $mysqli->query("SELECT * FROM `proto` ORDER BY `name` DESC");
								        while (($row = $result_set->fetch_assoc()) != false) {
								        	$photo = $row['photo'];
									    	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
										}
						            }else if ($kategory == true) { // категории активно
					            		if ($proizvoditel == true) { // производители активно
					            			if ($country == true) { // страны активно
					            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `kategory_name` = '$kategory' AND `proizvod_name` = '$proizvoditel' AND `country_name`='$country'");
							            		while (($row = $result_set->fetch_assoc()) != false) {
							            			$photo = $row['photo'];
											    	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
												}
					            			}else{// категории активно, производители активно, страны не активно
					            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `kategory_name` = '$kategory' AND `proizvod_name` = '$proizvoditel'");
							            		while (($row = $result_set->fetch_assoc()) != false) {
							            			$photo = $row['photo'];
							            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
												}
					            			}
					            		}else{ //категории активно, производители не активно, страны активно
					            			
						            			if ($country == true) { 
						            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `kategory_name` = '$kategory' AND `country_name`='$country'");
								            		while (($row = $result_set->fetch_assoc()) != false) {
								            			$photo = $row['photo'];
								            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
													}
						            			}else {// категории активно, производители не активно, страны не активно
						            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `kategory_name` = '$kategory'");
								            		while (($row = $result_set->fetch_assoc()) != false) {
								            			$photo = $row['photo'];
								            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
													}
						            			}
						            		
					            		}
					            	}else if($kategory == false){ //категории не активно, производители активно, страны активно
					            		if ($proizvoditel == true) { 
					            			if ($country == true) { 
					            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `proizvod_name` = '$proizvoditel' AND `country_name`='$country'");
							            		while (($row = $result_set->fetch_assoc()) != false) {
							            			$photo = $row['photo'];
							            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
												}
					            			}else{// категории не активно, производители активно, страны не активно
					            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `proizvod_name` = '$proizvoditel'");
							            		while (($row = $result_set->fetch_assoc()) != false) {
							            			$photo = $row['photo'];
							            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
												}
					            			}
					            		}else if ($proizvoditel == false) { //категории не активно, производители не активно, страны активно
					            			if ($country == true) { 
					            				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `country_name`='$country'");
							            		while (($row = $result_set->fetch_assoc()) != false) {
							            			$photo = $row['photo'];
							            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
												}
					            			}else if ($country == false){// категории не активно, производители не активно, страны не активно (все товары)
					            				$result_set = $mysqli->query("SELECT * FROM `proto`");
							            		while (($row = $result_set->fetch_assoc()) != false) {
							            			$photo = $row['photo'];
							            			echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
												}
					            			}
					            		}
					            	}
					            }else if (isset($_POST["button_back"])) { // кнопка сбросить фильтры
					                $result_set = $mysqli->query('SELECT * FROM `proto`');
					                while (($row = $result_set->fetch_assoc()) != false) {
					            		$photo = $row['photo'];
					            		echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
									}
					            }else {
					            	$result_set = $mysqli->query("SELECT * FROM `proto`");
							        while (($row = $result_set->fetch_assoc()) != false) {
							        	$photo = $row['photo'];
							        	echo "<div class='new'>
											<div class='img'>
												<img src='images/".$photo."' />
											</div>
											<div class='info'>
												<div class='name_cena'>
													<div class='name'>
														<form method='post'>
															<input type='text' name='name' value='".$row['name']."' readonly>";
															if ($user == false) {
																echo "<p>Войдите в личный кабинет</p>";
															}else {
																echo "<input type='submit' name='button_pages' value='Подробнее'>";
															}
														echo "</form>
													</div>
												</div>
												<div class='Add_info'>
													<div class='text'>
														<p>Категория: ".$row['kategory_name']."</p>
														<p>Производитель: ".$row['proizvod_name']."</p>
														<p>Страна производства: ".$row['country_name']."</p>
													</div>
												<div class='cena'>
													<p>".$row['cena']."$</p>
												</div>
												</div>
											</div>
										</div>";
									}
					            }
						    ?>
						</div>
						<!-- <div class="device_shop_filters1">
						</div> -->
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