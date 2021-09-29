<?php
	verificaPermissaoPagina(2);
?>

<div class="box-content">
	
	<h2><i class="fa fa-pencil" aria-hidden="true"></i> Registrar Usuário</h2>

		<form method="post" enctype="multipart/form-data">

			<?php 
			if(isset($_POST['acao'])){
				$login = $_POST['login'];
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$ncliente = $_POST['ncliente'];
				$cargo = $_POST['cargo'];
				

				if($login == ''){
					Painel::alert('erro','O login está vazio!');
				}else if($nome == ''){
					Painel::alert('erro','O nome está vazio!');
				}else if($senha== ''){
					Painel::alert('erro','O senha está vazia!');
				}else if($ncliente == ''){
					Painel::alert('erro','O número do cliente está vazio!');	
				}else if($cargo == ''){
					Painel::alert('erro','O cargo precisa estar selecionado!');
				}else{

					if($cargo >= $_SESSION['cargo']){
						Painel::alert('erro','Selecione um cargo menor que o seu!');
					}else if(Usuario::userExists($login)){
						Painel::alert('erro','O login já existe!');

					}else{

						$usuario = new Usuario();
						$usuario ->cadastrarUsuario($login,$senha,$nome,$ncliente,$cargo);

						Painel::alert('sucesso','O cadastro do usuário '.$login.' foi feito com sucesso!');

					}

				}

			}

			?>

			<div class="form-group">
				<label>Login:</label>
				<input type="text" name="login">
			</div>

			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome">
			</div>
			<div class="form-group">
				<label>Senha:</label>
				<input type="password" name="password">
			</div>
			<div class="form-group">
				<label>Número do cliente:</label>
				<input type="text" name="ncliente">
			</div>
			<div class="form-group">
				<label>Cargo:</label>
				<select name="cargo">
					<?php 
						foreach (Painel::$cargo as $key => $value){
							if ($key < $_SESSION['cargo']) echo '<option value ="'.$key.'">'.$value.'</option>';
						}
					?>
			</div>
			<div class="form-group">
				<input type="submit" name="acao" value="Criar">
			</div>

		</form>