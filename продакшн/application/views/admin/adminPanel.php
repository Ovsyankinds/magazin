<!DOCTYPE html>
<html>
	<head>
		<title> Панель администратора </title>
		<meta charset='utf-8'>
	</head>

	<body>
		
		<?php if(!empty($error)):?>
		<p>	<?=$error;?> </p>
		<p> <?=$url_login;?> </p>
		<?php endif; ?>
		
		<?php if(!empty($user_login)):?>
		<p> Вы зашли как <?=$user_login?> </p>
		<p> <?=anchor('addnewblock', 'Добавить блок с магазином');?> </p>
		<p> <?=anchor('logout', 'Выйти');?> </p>
		<?php endif; ?>
		 
	</body>
</html>