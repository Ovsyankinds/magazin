<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<title> Добавление нового блока </title>
		<meta charset='utf-8'>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
		<link rel="stylesheet" type="text/css" href="/css/admin.css" />
	</head>
	
	<body>
	<?php require_once('navBarUserWorkPlace.php') ?>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h3>Fixed</h3>
			</div>
		</div>

			<?php
				/*echo "<pre>";
				print_r($category);
				echo "</pre>";*/

			//echo $category['array0']['name_category'];

            //echo $category['count'];
			?>


			<?=form_open();?>
				<div class="form-group">
					<label for = "block_title"> Название магазина </label>
					<input type = "text" class="form-control" id = "block_title" name = "block_title" />
				</divs>
				
				<div class="form-group">
					<label for = 'block_content'> Описание магазина </label>
					<textarea rows = '5' id = 'block_content' class = "form-control" name = 'block_content' > </textarea>
				</div>

                <p> Выберите категорию товара, представленного в Вашем магазине </p>
					<?php $countCategory = $category['count']; ?>
					<div class="btn-group" data-toggle="buttons" id="category-for-add-new-magazin">
						<label class = "btn btn-primary active">
							<input type = "checkbox" checked autocomplete="off" name = "category" value = '<?=$category['array' . $countCategory]['name_category'];?>' />
							<?=$category['array' . $countCategory]['name_category']?>
						</label>

						<?php $countCategory= $countCategory - 1; while($countCategory >= 0): ?>
							<label class = "btn btn-primary">
								<input type = "checkbox" checked autocomplete="off" name = "category" value = '<?=$category['array' . $countCategory]['name_category'];?>' />
								<?=$category['array' . $countCategory]['name_category']?>
							</label>
						<?php
							--$countCategory;
							endwhile;
						?>
					</div>

					<input type = "submit" value = "Добавить" name = "add_block" class="btn btn-primary add-new-magazin" />
				<?=form_close();?>
		</div>
	</body>
</html>
	