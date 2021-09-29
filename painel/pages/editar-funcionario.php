
<?php

if(isset($_POST['acao1'])){

	$busca = $_POST['busca'];
	$sql1 = "SELECT * FROM `cadastro_de_funcion__rios` WHERE nomecomp LIKE '%{$busca}%'"; 
				$sql = MySql::conectar()->prepare($sql1);
				$sql->execute();
				if($sql->rowCount() == 1){
							
					$info = $sql->fetch();
					$nfunc1 = $info['n_funci'];
					$nomefunc1 = $info['nomecomp'];
					$nempresa1 = $info['empresa'];
					$nomemp1 = $info['nempresa'];
					$cpf1 = $info['cpf'];
					$rg1 = $info['rg'];
					$oe1 = $info['orgaoemissor'];
					$nat1 = $info['naturalidade'];
					$uf1 = $info['uf'];
					$datanasc1 = $info['data_de_nasc'];
					$end1 = $info['endereco'];
					$cep1 = $info['cep'];
					$tel1 = $info['telefone'];
					$tel21 = $info['telefone2'];
					$email1 = $info['email'];
					$conjuge1 = $info['conjuge'];
					$banco1 = $info['banco'];
					$ag1 = $info['agencia'];
					$conta1 = $info['conta'];
				}else{

				Painel::alert('erro',' Não existe cliente com esse nome!');
	 }
 }
 ?>

<div class="box-content">
	<h2><i class="fa fa-pencil" aria-hidden="true"></i> Editar Funcionário</h2>

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
				$usuario = new Usuario();

					if($usuario->atualizarFunci($nfunc,$nomefunc,$nempresa,$nomemp,$cpf,$rg,$oe,$nat,$uf,$datanasc,$end,$cep,$tel,$tel2, $email,$conjuge,$banco,$ag,$conta,$nfunc)){
					$nfunc1 = '';
					$nomefunc1 = '';
					$nempresa1 = '';
					$nomemp1 = '';
					$cpf1 = '';
					$rg1 = '';
					$oe1 = '';
					$nat1 = '';
					$uf1 = '';
					$datanasc1 = '';
					$end1 = '';
					$cep1 = '';
					$tel1 = '';
					$tel21 = '';
					$email1 = '';
					$conjuge1 = '';
					$banco1 = '';
					$ag1 = '';
					$conta1 = '';

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
			<label>Número do Funcionário:</label>
			<input type="text" name="nfunc" id="search" value="<?php if(isset($nfunc1)){ echo $nfunc1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome:</label>
			<input type="text" name="nomefunc" value="<?php if(isset($nomefunc1)){ echo $nomefunc1;}else{ } ?>">
		</div><!--form-group-->

			<div class="form-group">
			<label>Número da Empresa:</label>
			<input type="text" name="nempresa" value="<?php if(isset($nempresa1)){ echo $nempresa1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome da Empresa:</label>
			<input type="text" name="nomemp" value="<?php if(isset($nomemp1)){ echo $nomemp1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>CPF:</label>
			<input type="text" name="cpf" value="<?php if(isset($cpf1)){ echo $cpf1;}else{ } ?>">
		</div><!--form-group-->
			<label>RG:</label>
		<div class="form-group">

			<input type="text" name="rg" value="<?php if(isset($rg1)){ echo $rg1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Orgão Emissor:</label>
			<input type="text" name="oe" value="<?php if(isset($oe1)){ echo $oe1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Naturalidade:</label>
			<input type="text" name="nat" value="<?php if(isset($nat1)){ echo $nat1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Estado:</label>
			<input type="text" name="uf" value="<?php if(isset($uf1)){ echo $uf1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Data de Nascimento:</label>
			<input type="text" name="datanasc" value="<?php if(isset($datanasc1)){ echo $datanasc1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Endereço:</label>
			<input type="text" name="end" value="<?php if(isset($end1)){ echo $end1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>CEP:</label>
			<input type="text" name="cep" value="<?php if(isset($cep1)){ echo $cep1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone:</label>
			<input type="text" name="tel" value="<?php if(isset($tel1)){ echo $tel1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Telefone 2:</label>
			<input type="text" name="tel2" value="<?php if(isset($tel21)){ echo $tel21;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>E-mail:</label>
			<input type="text" name="email" value="<?php if(isset($email1)){ echo $email1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Cônjuge:</label>
			<input type="text" name="conjuge" value="<?php if(isset($conjuge1)){ echo $conjuge1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Banco:</label>
			<input type="text" name="banco" value="<?php if(isset($banco1)){ echo $banco1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Agência:</label>
			<input type="text" name="ag" value="<?php if(isset($ag1)){ echo $ag1;}else{ } ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Conta:</label>
			<input type="text" name="conta" value="<?php if(isset($conta1)){ echo $conta1;}else{ } ?>">
		</div><!--form-group-->

			<div class="form-group">
				<input type="submit" name="acao" value="Atualizar">
			</div>


		</form>

</div>