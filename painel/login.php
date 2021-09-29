<!DOCTYPE html>
<html>
<head>
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>

	<div class="box-login">
		<?php
			if(isset($_POST['acao'])){
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
					$_SESSION['ncliente'] = $info['ncliente'];
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();	
				}else{

					echo '<script> alert("Usuário ou senha incorretos!") </script>';
				}
			}

		?>
		<h2>Efetue o login:</h2>
		<form method="post">
			<input type="text" name="user" id="user" placeholder="Login..." required>
			<input type="password" name="password" id="password" placeholder="Senha..." required>
			<input type="submit" name="acao" id="acao" value="Logar!">
		</form>	
	</div>

</body>
</html>
