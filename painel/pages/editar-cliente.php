
<?php

if(isset($_POST['acao1'])){

	$busca = $_POST['busca'];
	$sql1 = "SELECT * FROM `cadastro_de_empresas` WHERE NomedeFantasia LIKE '%{$busca}%'"; 
				$sql = MySql::conectar()->prepare($sql1);
				$sql->execute();
				if($sql->rowCount() == 1){
							
					$info = $sql->fetch();
					$_SESSION['cnpj'] = $info['CNPJ'];
					$_SESSION['dataabertura'] = $info['DatadeAbertura'];
					$_SESSION['nomeempresarial'] = $info['NomeEmpresarial'];
					$_SESSION['nomefantasia'] = $info['NomedeFantasia'];
					$_SESSION['cdaep'] = $info['CDAEP'];
					$_SESSION['logradouro'] = $info['Logradouro'];
					$_SESSION['numero'] = $info['Numero'];
					$_SESSION['complemento'] = $info['Complemento'];
					$_SESSION['cep'] = $info['CEP'];
					$_SESSION['bairrodistrito'] = $info['BairroDistrito'];
					$_SESSION['municipio'] = $info['Municipio'];
					$_SESSION['uf'] = $info['UF'];
					$_SESSION['email'] = $info['EnderecoEletronico'];
					$_SESSION['telefone'] = $info['Telefone'];
					$_SESSION['telefone2'] = $info['Telefone2'];
					$_SESSION['ncliente'] = $info['n_cliente'];

				}else{

				Painel::alert('erro',' Não existe cliente com esse nome!');
	 }
 }
 ?>

<div class="box-content">
	<h2><i class="fa fa-pencil" aria-hidden="true"></i> Editar Cliente</h2>

		<form method="post" enctype="multipart/form-data">

			<?php

			if(isset($_POST['acao'])){
			
				$cnpj = $_POST['cnpj'];
				$dataabertura = $_POST['dataabertura'];
				$nomeempresarial = $_POST['nomeempresarial'];
				$nomefantasia = $_POST['nomefantasia'];
				$cdaep = $_POST['cdaep'];
				$logradouro = $_POST['logradouro'];
				$numero = $_POST['numero'];
				$complemento = $_POST['complemento'];
				$cep = $_POST['cep'];
				$bairrodistrito = $_POST['bairrodistrito'];
				$municipio = $_POST['municipio'];
				$uf = $_POST['uf'];
				$email = $_POST['email'];
				$telefone = $_POST['telefone'];
				$telefone2 = $_POST['telefone2'];
				$ncliente = $_POST['ncliente'];
				$usuario = new Usuario();

					if($usuario->atualizarCliente($cnpj,$dataabertura,$nomeempresarial,$nomefantasia,$cdaep,$logradouro,$numero,$complemento,$cep,$bairrodistrito,$municipio,$uf,$email,$telefone,$telefone2,$ncliente)){
					$_SESSION['cnpj'] = '';
					$_SESSION['dataabertura'] = '';
					$_SESSION['nomeempresarial'] = '';
					$_SESSION['nomefantasia'] ='' ;
					$_SESSION['cdaep'] ='' ;
					$_SESSION['logradouro'] ='' ;
					$_SESSION['numero'] ='' ;
					$_SESSION['complemento'] =' ';
					$_SESSION['cep'] ='';
					$_SESSION['bairrodistrito'] = '';
					$_SESSION['municipio'] =' ';
					$_SESSION['uf'] = '';
					$_SESSION['email'] = '';
					$_SESSION['telefone'] = '';
					$_SESSION['telefone2'] = '';
					$_SESSION['ncliente'] = '';

						Painel::alert('sucesso',' Atualizado com sucesso!');
					}else{
						Painel::alert('erro',' Ocorreu um erro ao atualizar...');
			}
		}


			?>


			<div class="form-group">
			<label>Buscar:</label>
			<input type="text" name="busca" value="">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao1" value="Buscar">
		</div><!--form-group-->

			<div class="form-group">
			<label>CNPJ:</label>
			<input type="text" name="cnpj" value="<?php if(isset($_SESSION['cnpj'])){ echo $_SESSION['cnpj'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data de Abertura:</label>
			<input type="text" name="dataabertura" value="<?php if(isset($_SESSION['dataabertura'])){ echo $_SESSION['dataabertura'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome Empresarial:</label>
			<input type="text" name="nomeempresarial" value="<?php if(isset($_SESSION['nomeempresarial'])){ echo $_SESSION['nomeempresarial'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome de Fantasia:</label>
			<input type="text" name="nomefantasia" value="<?php if(isset($_SESSION['nomefantasia'])){ echo $_SESSION['nomefantasia'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>CDAEP:</label>
			<input type="text" name="cdaep" value="<?php if(isset($_SESSION['cdaep'])){ echo $_SESSION['cdaep'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Logradouro:</label>
			<input type="text" name="logradouro" value="<?php if(isset($_SESSION['logradouro'])){ echo $_SESSION['logradouro'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Número:</label>
			<input type="text" name="numero" value="<?php if(isset($_SESSION['numero'])){ echo $_SESSION['numero'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Complemento:</label>
			<input type="text" name="complemento" value="<?php if(isset($_SESSION['complemento'])){ echo $_SESSION['complemento'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>CEP:</label>
			<input type="text" name="cep" value="<?php if(isset($_SESSION['cep'])){ echo $_SESSION['cep'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Bairro/Distrito:</label>
			<input type="text" name="bairrodistrito" value="<?php if(isset($_SESSION['bairrodistrito'])){ echo $_SESSION['bairrodistrito'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Município:</label>
			<input type="text" name="municipio" value="<?php if(isset($_SESSION['municipio'])){ echo $_SESSION['municipio'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>UF:</label>
			<input type="text" name="uf" value="<?php if(isset($_SESSION['uf'])){ echo $_SESSION['uf'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>E-mail:</label>
			<input type="text" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone:</label>
			<input type="text" name="telefone" value="<?php if(isset($_SESSION['telefone'])){ echo $_SESSION['telefone'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone 2:</label>
			<input type="text" name="telefone2" value="<?php if(isset($_SESSION['telefone2'])){ echo $_SESSION['telefone2'];}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Número do Cliente:</label>
			<input type="text" name="ncliente" value="<?php if(isset($_SESSION['ncliente'])){ echo $_SESSION['ncliente'];}else{ } ?>">
		</div><!--form-group-->

			<div class="form-group">
				<input type="submit" name="acao" value="Atualizar">
			</div>


		</form>

</div>