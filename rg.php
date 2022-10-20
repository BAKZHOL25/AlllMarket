<!DOCTYPE html>
<html land="ru">
	<head>
		<meta charset='utf-8'/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel='stylesheet' href="css/style.css"/>
		<title>
			форма регистрации
		</title>
		<link rel='stylesheet' href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
	</head>
	
	<body>
		<div class="container mt-4">
			<h1>Форма регистрации</h1>
			<form action="" method="POST">
				<input type="text" class="form-control" name="login" placeholder="Введите логин"><br/>
				<input type="password" class="form-control" name="password" placeholder="Введите пароль"><br/>
				<button class="btn btn-success" type="submit">Зарегистрировать</button>
			</form>
		</div>	
	</body>
</html>

<?php
	$db = mysqli_connect('localhost', 'root', 'root', 'php16');

	$login = $_POST['login'];
	$password = $_POST['password'];
	
	$sql_login_check = "SELECT `id` FROM `users` WHERE login='{$login}'";
	$login_result = mysqli_query($db, $sql_login_check);
	
	$trust = '';
	
	
	if($login_result and mysqli_num_rows($login_result) == 0){
		
		if((mb_strlen($login) < 5) || (mb_strlen($password) < 8)) {
			$trust .= "
				<br/><span><b>Поле логин должно иметь не менее 5-ми символов</b></span>
				<style>
					span{margin-left:380px;}
				</style>
			";
			$trust .= "
				<br/><span><b>Поле пароль должно иметь не менее 8-ми символов</b></span>
				<style>
					span{margin-left:380px;}
				</style>				
			";
			echo $trust;
		}
		
		if(empty($trust)){
			$SQL = "INSERT INTO `users` (`login`, `password`) VALUES ('{$login}', '{$password}')";
			$result = mysqli_query($db, $SQL);
			
			if($result){
				echo "
					<br/>
					<br/>
					<span><b>регистрация прошла успешно</b></span>
					<style>
						span{margin-left:380px;}
					</style>
				";
			}else{
				echo "				
					<br/>
					<br/>
					<span>регистрация прошла не успешно</span>
					<style>
						span{margin-left:380px;}
					</style>
				";
			}
		}	
	}else{
		if(mysqli_errno($db)){
			echo "
				<br/>
				<br/>
				<span>Ошибка выполнения запроса</span>
				<style>
					span{margin-left:380px;}
				</style>
			".mysqli_errno($db);
		}else{
			echo "
				<br/>
				<br/>				
				<span><b>Такой пользователь уже зарегистрирован</b></span>
				<style>
					span{margin-left:380px;}
				</style>			
			";
		}
	}
?>
