<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Funcionário</h2>

	<form method="post" enctype="multipart/form-data">

		<?php
			if(isset($_POST['acao'])){
				$nfunc = $_POST['nfunc'];
				$nomefunc = $_POST['nomefunc'];
				$nempresa = $_POST['nempresa'];
				$nomemp = $_POST['nomemp'];
				$cpf = $_POST['cpf'];
				$rg = $_POST['rg'];
				$oe = $_POST['oe'];
				$nat = $_POST['nat'];
				$uf = $_POST['uf'];
				$datanasc = $_POST['datanasc'];
				$end = $_POST['end'];
				$cep = $_POST['cep'];
				$tel = $_POST['tel'];
				$tel2 = $_POST['tel2'];
				$email = $_POST['email'];
				$conjuge = $_POST['conjuge'];
				$banco = $_POST['banco'];
				$ag = $_POST['ag'];
				$conta = $_POST['conta'];


				if($cpf == ''){
					Painel::alert('erro','O CPF está vázio!');
				}else if($nomefunc == ''){
					Painel::alert('erro','O nome do funcioário está vázio!');
				}else{

					if(Usuario::funciExists($nfunc)){
						Painel::alert('erro','O número de funcionário já existe!');

					}else{

						$usuario = new Usuario();
						$usuario->cadastrarFunci($nfunc,$nomefunc,$nempresa,$nomemp,$cpf,$rg,$oe,$nat,$uf,$datanasc,$end,$cep,$tel,$tel2, $email,$conjuge,$banco,$ag,$conta);
						Painel::alert('sucesso','O cadastro do funcionário '.$nomefunc.' foi feito com sucesso!');
					}
				}

			}
			
		?>

		<div class="form-group">
			<label>Número do Funcionário:</label>
			<input  type="text" required="number" name="nfunc">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input  type="text" required name="nomefunc">
		</div><!--form-group-->
		
		<div class="form-group">
			<label>Número da Empresa:</label>
			<input  type="text" required name="nempresa">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome da Empresa:</label>
			<input  type="text" required name="nomemp">
		</div><!--form-group-->

		<div class="form-group">
			<label>CPF:</label>
			<input formato="cpf" type="text" required name="cpf">
		</div><!--form-group-->

		<div class="form-group">
			<label>RG:</label>
			<input type="text" name="rg">
		</div><!--form-group-->

		<div class="form-group">
			<label>Orgão Emissor:</label>
			<input type="text" name="oe">
		</div><!--form-group-->

		<div class="form-group">
			<label>Naturalidade:</label>
			<input type="text" name="nat">
		</div><!--form-group-->

		<div class="form-group">
			<label>Estado:</label>
			<input  type="text" name="uf">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data de Nascimento:</label>
			<input formato="data" type="text" name="datanasc">
		</div><!--form-group-->

		<div class="form-group">
			<label>Endereço:</label>
			<input formato="cep" type="text" name="end">
		</div><!--form-group-->

		<div class="form-group">
			<label>CEP:</label>
			<input formato="cep" type="text" name="cep">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone:</label>
			<input formato="fone" type="text" required name="tel">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone 2:</label>
			<input formato="fone" type="text" name="tel2">
		</div><!--form-group-->

		<div class="form-group">
			<label>E-mail:</label>
			<input type="text" required name="email">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cônjuge:</label>
			<input type="text" name="conjuge">
		</div><!--form-group-->

		<div class="form-group">
			<label>Banco:</label>
			<input  required type="text" name="banco">
		</div><!--form-group-->

		<div class="form-group">
			<label>Agência:</label>
			<input  required type="text" name="ag">
		</div><!--form-group-->

		<div class="form-group">
			<label>Conta:</label>
			<input type="text" required name="conta">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>



</div><!--box-content-->