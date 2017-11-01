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
		
		<?php if(!empty($user_login)):?>
		<!--<p> <?=anchor('addnewblock', 'Добавить блок с магазином');?> </p>	-->

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
		
		<div class="container">
			<div class="row">
	    		<div class="col-md-4">
	    			<h3>Fixed</h3>
	      		 	<p> Вы зашли как <?=$user_login?> </p>
	    		</div>
			</div>
		</div>


		<ul id='admin_menu'>
			<li> <a href='#'> Добавить блок с магазином </a> </li>
			<li> <a href='#'> Просмотреть Ваши существующие блоки </a> </li>
			<li> <a href='#'> Редактировать блоки </a> </li>
			<li> <a href='#'> Удалить выбранные блоки </a> </li>
			<li> <?=anchor('logout', 'Выйти');?> </li>
		</ul>
		
		<script>
			var a = $('#admin_menu').children();
			var l = a.length - 2;
			while(l >= 0){
				switch(l){
					case 2:
						a[l].onclick = function(){
							$('#bord h1').html('Меню редактирования блоков');
							$('.block').css('display', 'none');
						};
						break;
					case 1:
						a[l].onclick = function(){
							$('#bord h1').html('Меню просмотра существующих блоков');
							$('.block').css('display', 'block');
							$('#add_new_block').css('display', 'none');
						};
						break;
						
					case 0:
						a[l].onclick = function(){
							$('#bord h1').html('Меню добавления нового блока');
							$('#add_new_block').css('display', 'block');
							$('.block').css('display', 'none');
						};
						break;
				}
				--l;
			}
		</script>
		
		<div id='bord'> <h1> </h1> </div>
		
		<?php	while($count >= 0): ?>
		<div class='block'>
			<p>
				<span class='block_header'> Название магазина: </span> 
				<span class='content_block'><?=$array['array' . $count]['block_title'];?> 
			</p>
			<p> 
				<span class='block_header'> Описание магазина: </span> 
				<span class='content_block'> <?=$array['array' . $count]['block_content'];?> </span> 
			</p>
			<p> 
				<span class='block_header'> Категория: </span> 
				<span class='content_block'> <?=$array['array' . $count]['category_id'];?> </span>
			</p>
		</div>
		<?php
			--$count;
			endwhile;
		?>
		<?php endif; ?> 
		 
	</body>
</html>