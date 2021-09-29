<div class="box-content">
	
	<h2><i class="fa fa-pencil" aria-hidden="true"></i> Editar Usuário</h2>

		<form method="post" enctype="multipart/form-data">

			<?php 
			if(isset($_POST['acao'])){
			
				$nome = $_POST['nome'];
				$senha = $_POST['password'];
				$usuario = new Usuario();

				if($imagem['name'] != ''){

					if($usuario->atualizarUsuario($nome,$senha)){
						Painel::alert('sucesso',' Atualizado com sucesso!');
					}else{
						Painel::alert('erro',' Ocorreu um erro ao atulizar...');
					}
			}

		}

			?>

			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome" required value="<?php echo $_SESSION['nome']; ?>">
			</div>
			<div class="form-group">
				<label>Senha:</label>
				<input type="password" name="password" value="<?php echo $_SESSION['password']; ?>" required >
			</div>
			<div class="form-group">
				<input type="submit" name="acao" value="Atualizar">
			</div>

		</form>

</div>