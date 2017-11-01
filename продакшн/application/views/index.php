
<!DOCTYPE html>
<html lang="en">
	<head> 
		<meta charset = "utf-8">
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		<script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">	</script>
		<title> Главная </title>
	</head>
	
	<body>
		<div id='wrap'>
			<div id = "header">
				<h1> Хеадер </h1>
			</div>
			
			<?=anchor('login/', 'Войти/Регистрация', 'id=login');?>
			<!-- <a href="index.php/login/" id="login"> Войти/Регистрация </a> -->

			<div id='carusel'>
				<p> Слайдер </p>
			</div>
						
			<div id='menu'>
				<ul>
					<li> <a href='?category=13'> Магазины одежды </a> </li>
					<li> <a href='?category=14'> Магазины оргтехники </a> </li>
					<li> <a href='?category=15'> Магазины бытовой техники </a> </li>
					<li> <a href='?category=16'> Магазины автохимии </a> </li>
				</ul>
			
				<span id='hide' onclick="foo('hide')"> &#9660; </span>
				<span id="show" onclick="foo('show')"> &#9650; </span>
				
				<ul>
					<li> <a href='?category=17'> Магазины автодеталей </a> </li>
					<li> <a href='?category=18'> Мойки </a> </li>
				</ul>
			</div>
			
			<script>
				$('#show').hide();
				function foo(arg){
					switch(arg){
						case 'hide':
							$('ul:nth-child(4)').hide();
							$('#show').show();
							$('#hide').hide();
							break;
						case 'show':
							$('ul:nth-child(4)').show();
							$('#show').hide();
							$('#hide').show();
							break;
					}
				}
			</script>
			
			<div id="content">
				<?php	
					while($count >= 0):
						if( isset($_GET['category']) && $_GET['category'] === $array['array' . $count]['category_id']):
				?>
				
				<div class='block'>
					<h1> <?=$array['array' . $count]['block_title']?> </h1>
					<p> <?=$array['array' . $count]['block_content']?> </p>
					<p>
						<?php 
							$href = $array['array' . $count]['block_title'];
							$href = str_replace(" ","", $href);
						?>
						<!-- <a href='<?="/index.php/".$href;?>'> Зайти в магазин </a> -->
						<a href='<?="/index.php/noteBlock/index/". $href;?>'> Зайти в магазин </a>
					<p>
				</div>
						<?php 
							endif;
							--$count;
							endwhile;
						?>
			</div>
			
		</div>
	</body>
<html>