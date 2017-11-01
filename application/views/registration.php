<!DOCTYPE html>
<html>
	<head> 
		<title> General  </title>
		<meta charset='utf-8'/>
		<link rel='stylesheet' type='text/css' href='/css/registration.css' />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> //подключили jQuery</script>
		<script>
			function showBlockRegistration(a){
				var elemFormRegistration = document.getElementById('registration');
				var elemFormLogin = a.parentNode;
				elemFormLogin.style.display = 'none';
				elemFormRegistration.style.display = 'block';
				elemFormLogin.style.border = '1px solid green';
			}

			function showBlockLogin(){
				var elemFormRegistration = document.getElementById('registration');
				var elemFormLogin = document.getElementById('login');
				elemFormLogin.style.display = 'block';
				elemFormRegistration.style.display = 'none';
			}
		</script>
	</head>
	
	<body>
		<div id='wrap'>
			<div id='registration' class='form'>
				<?=validation_errors();?>
				<?=form_open();?>
					<h1> Регистрация </h1>
					<p>
						<label for='login'> Введите Ваш логин </label>
						<input type='text' name='login' id='login_name' value="<?=set_value('login');?>"/>
					</p>
					
					<p>
						<label for='email'> Введите Ваш e'mail </label>
						<input type='text' name='email' id='email' value="<?=set_value('email');?>"/>
					</p>
					
					<p>
						<label for='password'> Введите Ваш пароль </label>
						<input type='password' name='password' id='password' />
					</p>
					
					<p>
						<label for='password_confirm'> Повторите Ваш пароль </label>
						<input type='password' name='password_confirm' id='password_confirm' />
					</p>
					
					<p>
						<input type='submit' name='submit' id='submit' value='Регистрация' />
					</p>
				</form>
				
				<p> <?=anchor('login', 'Назад на страницу входа');?> </p>
				<!--<span> Зарегистрированы? </span> <a href='#' onclick='showBlockLogin(this)'> Войти </a> -->
			</div>
			
			<!--
			
				
				<span> Еще не зарегистрировались? </span> <a href='#' onclick='showBlockRegistration(this)'> Регистрация </a> 
			-->
			</div>
		</div>
	</body>
</html>