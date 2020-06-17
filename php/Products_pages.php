<div id="product_pages">
	<div class="product_pages_header">
		<div class="image_product">
			<div class="image">
				<?php 
					$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				    if ($mysqli->connect_errno) exit('Ошибка соединения с БД');
				    $mysqli->set_charset('utf8');

				    	$product_name = $_SESSION['Product_name'];

				    	$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name` = '$product_name'");

				    	while (($row = $result_set->fetch_assoc()) != false) {
				    		echo "<img src='../images/".$row['photo']."' alt='Product photo'>";
				    	}
				?>
			</div>
		</div>
		<div class="info_product">
			<div class="name_product">
				<?php 
					$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name` = '$product_name'");
					while (($row = $result_set->fetch_assoc()) != false) {
						echo "<p>".$row['name']."</p>";
			    		echo "<p>Цена: ".$row['cena']."$</p>";
			    		echo "<p class='product_kategory'>Категория товара: ".$row['kategory_name']."</p>";
			    		echo "<p class='pod_text'>На сайте отутствует опция покупки товаров.</p>";
			    	}
				?>
			</div>
		</div>
	</div>
	<div class="product_pages_text">
		<div class="text">
			<p>Категория товара:</p>
			<hr style='margin: 30px 10px; border: 1px solid #555'>
			<p>Производитель товара:</p>
			<hr style='margin: 30px 10px; border: 1px solid #555'>
			<p>Страна произвотства товара:</p>
		</div>
		<hr style="color: #555; border: 1px solid #555">
		<div class="text">
			<?php 
				$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name` = '$product_name'");
				while (($row = $result_set->fetch_assoc()) != false) {
					echo "<p>".$row['kategory_name']."</p>";
					echo "<hr style='margin: 30px 10px; border: 1px solid #555'>";
					echo "<p>".$row['proizvod_name']."</p>";
					echo "<hr style='margin: 30px 10px; border: 1px solid #555'>";
					echo "<p>".$row['country_name']."</p>";
				}
			?>
		</div>
	</div>
	<div class="product_pages_info">
		<div class="name_text">
			<p>Технические характеристики</p>
		</div>
		<div class="text">
			<div class="info">				
				<?php 
					$result_set = $mysqli->query("SELECT * FROM `proto` WHERE `name` = '$product_name'");
					while (($row = $result_set->fetch_assoc()) != false) {
						echo "<p>".$row['text']."</p>";
					}
				?>
			</div>
			<div class="image_2">
				<img src="images/Data-Loading.gif" alt="data">
			</div>
		</div>
	</div>
</div>

<?php $mysqli->close(); ?>