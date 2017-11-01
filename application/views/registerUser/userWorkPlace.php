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
	<link rel="stylesheet" type="text/css" href="/assets/css/admin.css" />
</head>

<body>

<?php if(!empty($error)):?>
	<p>	<?=$error;?> </p>
	<p> <?=$url_login;?> </p>
<?php endif; ?>

<?php if(!empty($user_login)):?>

<?php require_once('navBarUserWorkPlace.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Fixed</h3>
			<p> Вы зашли как <?=$user_login?> </p>
		</div>
	</div>

	<div class="row">
		<?php while($count >= 0): ?>
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div  class="col-md-12" class="panel-heading">
					<span class="magazin-panel">Название Вашего магазина</span>
					<?=$array['array' . $count]['block_title'];?>
				</div>
				<div  class="col-md-12 panel-body">
                   <!-- <img src="/assets/img/ostin.jpg" class="img-responsive" alt="Image" /> -->
                </div>
				<div  class="panel-footer">
					<span class="magazin-panel">Описание Вашего магазина</span>
					<?=$array['array' . $count]['block_content'];?>
				</div>
				<div class="panel-footer">
					<span class="magazin-panel"> Категория Вашего магазина</span>
					<?=$array['array' . $count]['id_category'];?>
				</div>
			</div>
		</div>
		<?php --$count; endwhile;?>

		<?php endif; ?>
	</div>
</div>

</body>
</html>