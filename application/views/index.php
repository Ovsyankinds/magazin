<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Главная</title>
	<link href="/assets/css/style.css" rel="stylesheet">

	<!-- Bootstrap -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		/* Remove the navbar's default rounded borders and increase the bottom margin */
		.navbar {
			margin-bottom: 50px;
			border-radius: 0;
		}

		/* Remove the jumbotron's default bottom margin */
		.jumbotron {
			margin-bottom: 0;
		}

		/* Add a gray background color and some padding to the footer */
		footer {
			background-color: #f2f2f2;
			padding: 25px;
		}
	</style>
</head>
<body>

<div class="jumbotron">
	<div class="container text-center">
		<h1>Хеадер</h1>
	</div>
</div>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/index.php">Главная</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="?category=1">Магазины одежды</a></li>
				<li><a href="?category=2">Магазины оргтехники</a></li>
				<li><a href="?category=15">Магазины бытовой техники</a></li>
				<li><a href="?category=16">Магазины автохимии</a></li>
				<li> <a href='?category=17'> Магазины автодеталей </a> </li>
				<li> <a href='?category=18'> Мойки </a> </li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php/login/"><span class="glyphicon glyphicon-user"></span> Личный кабинет</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">
	<?php
		while($count >= 0):
		if( isset($_GET['category']) && $_GET['category'] === $array['array' . $count]['id_category']):
	?>
	<div class="row">
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel-heading"> <?=$array['array' . $count]['block_title']?></div>
				<div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
				<div class="panel-footer"><?=$array['array' . $count]['block_content']?></div>
				<div class="panel-footer">
					<?php
					$href = $array['array' . $count]['block_title'];
					$href = str_replace(" ","", $href);
					?>
					<!-- <a href='<?="/index.php/".$href;?>'> Зайти в магазин </a> -->
					<a href='<?="/index.php/noteBlock/index/". $href;?>'> Зайти в магазин </a>
				</div>
			</div>
		</div>
	</div>
			<?php
		endif;
			--$count;
		endwhile; ?>
</div><br>

	<div id="content">
		<?php
		/*while($count >= 0):
			if( isset($_GET['category']) && $_GET['category'] === $array['array' . $count]['id_category']):
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
		endwhile;*/
		?>
	</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>