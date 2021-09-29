<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Cliente</h2>

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


				if($cnpj == ''){
					Painel::alert('erro','O CNPJ está vázio!');
				}else if($nomefantasia == ''){
					Painel::alert('erro','O nome de Fantasia está vázio!');
				}else{
						$usuario = new Usuario();
						$usuario->cadastrarCliente($cnpj,$dataabertura,$nomeempresarial,$nomefantasia,$cdaep,$logradouro,$numero,$complemento,$cep,$bairrodistrito,$municipio,$uf,$email,$telefone,$telefone2,$ncliente);
						Painel::alert('sucesso','O cadastro da empresa '.$nomefantasia.' foi feito com sucesso!');
					}
				}
			
		?>

		<div class="form-group">
			<label>CNPJ:</label>
			<input formato="cnpj" type="text" name="cnpj">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data de Abertura:</label>
			<input formato="data" type="text" name="dataabertura">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome Empresarial:</label>
			<input type="text" name="nomeempresarial">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome de Fantasia:</label>
			<input type="text" name="nomefantasia">
		</div><!--form-group-->

		<div class="form-group">
			<label>CDAEP:</label>
			<input type="text" name="cdaep">
		</div><!--form-group-->

		<div class="form-group">
			<label>Logradouro:</label>
			<input type="text" name="logradouro">
		</div><!--form-group-->

		<div class="form-group">
			<label>Número:</label>
			<input  type="text" name="numero">
		</div><!--form-group-->

		<div class="form-group">
			<label>Complemento:</label>
			<input type="text" name="complemento">
		</div><!--form-group-->

		<div class="form-group">
			<label>CEP:</label>
			<input formato="cep" type="text" name="cep">
		</div><!--form-group-->

		<div class="form-group">
			<label>Bairro/Distrito:</label>
			<input type="text" name="bairrodistrito">
		</div><!--form-group-->

		<div class="form-group">
			<label>Município:</label>
			<input type="text" name="municipio">
		</div><!--form-group-->

		<div class="form-group">
			<label>UF:</label>
			<input type="text" name="uf">
		</div><!--form-group-->

		<div class="form-group">
			<label>E-mail:</label>
			<input type="text" name="email">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone:</label>
			<input formato="fone" type="text" name="telefone">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone 2:</label>
			<input formato="fone" type="text" name="telefone2">
		</div><!--form-group-->

		<div class="form-group">
			<label>Número do Cliente:</label>
			<input type="text" name="ncliente">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->