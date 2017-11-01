<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Админ панель</title>

	<!-- Bootstrap -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container">
		<?php if(!empty($error)):?>
		<p>	<?=$error;?> </p>
		<p> <?=$url_login;?> </p>
		<?php endif; ?>

		<?php if(!empty($user_login)):?>
		<p> Вы зашли как <?=$user_login?> </p>
		<p> <?=anchor('addnewblock', 'Добавить блок с магазином');?> </p>
		<p> <?=anchor('/admin/adminPanel/addNewBlockCategory', 'Добавить категорию магазина');?> </p>
		<p> <?=anchor('logout', 'Выйти');?> </p>
		<?php endif; ?>

	</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>
