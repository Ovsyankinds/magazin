<!DOCTYPE html>
<html>
	<head>
		<title> Вход </title>
		<meta charset='utf-8'>
	</head>
	
	<body>
		<div id='login' class='form'>
				<?=form_open();?>
				<?=validation_errors();?>
				<?php 
					if(!empty($error)){
						echo $error;
					}
				?>
					<h1> Вход </h1>
						
					<p>
						<label for='email_login'> Введите Ваш e'mail </label>
						<input type='text' name='email_login' id='email_login' />
					</p>
					
					<p>
						<label for='password_login'> Введите Ваш пароль </label>
						<input type='password' name='password_login' id='password_login' />
					</p>
						
					<p>
						<input type='submit' name='submit' id='submit' value='Войти' />
					</p>
				</form>
				<p>
					<?=anchor('registration', 'Не зарегистрированы?');?>
					<!-- <a href="/index.php/registration/"> Не зарегистрированы? </a> -->
				</p>
			</div>
	</body>
</html>