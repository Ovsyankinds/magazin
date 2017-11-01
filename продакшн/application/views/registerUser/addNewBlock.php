<!DOCTYPE html>
<html>
	<head>
		<title> Панель администратора </title>
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
		
		<?php if(!empty($error)):?>
		<p>	<?=$error;?> </p>
		<p> <?=$url_login;?> </p>
		<?php endif; ?>
	
		<nav class="navbar navbar-inverse navbar-fixed-top">
		 	<div class="container-fluid">
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#">WebSiteName</a>
			    </div>
			    <ul class="nav navbar-nav">
			    	<li class="active">
			    		<?=anchor('general', 'На главную');?>
			    	</li>
			    	
			    	<li>
			    		<?=anchor('registerUser/userWorkPlace/addNewBlock', 'Добавить блок с магазином');?>
			    		<!-- <a href="#">Добавить блок с магазином</a> -->
			    	</li>
			   		
			   		<li>
			   			<a href="#">Редактировать блоки</a>
			   		</li> 
			    	
			    	<li>
			    		<a href="#"> Удалить выбранные блоки</a>
			    	</li> 
			   	</ul>
			</div>
		</nav>

        <br/>
        <br/>
        <br/>
        <br/>
        <br/> <!-- брки для того, чтобы опустить форму ниже верхнего меню -->
		<div>
			<?=form_open();?>
				<div class="form-group">
					<label for = 'block_title'> Добавление нового блока </label>
					<input type = 'text' id = 'block_title' name = 'block_title' />
				</divs>
				
				<div class="form-group">
					<label for = 'block_content'> Описание блока </label>
					<textarea rows = '5' id = 'block_content' class = "form-control" name = 'block_content' > </textarea>
				</div>
				
				<?php while($count >= 0): ?>
					<label class = "checkbox-inline">
						<input type = 'checkbox' name = 'category' value = '<?=$array['array' . $count]['categoryName'];?>' />
					<?=$array['array' . $count]['categoryName']?>
				</label>
				<?php
					--$count;
					endwhile;
				?>
				
				<p>
					<input type = 'submit' value = 'Добавить' name = 'add_block' />
				</p>
				<?=form_close();?>
		</div>
			

	</body>
</html>