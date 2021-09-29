<?php
	verificaPermissaoPagina(2);
?>

<?php

		if(isset($_POST['acao1'])){

            $nfantasia1 = $_POST['nfantasia'];
           
            $sql1 = "SELECT * FROM `cadastro_de_empresas` WHERE NomedeFantasia LIKE '%{$nfantasia1}%'"; 

                $sql = MySql::conectar()->prepare($sql1);
                $sql->execute();
                if($sql->rowCount() == 1){ 

                    $info = $sql->fetch();
                    $nfantasia2 = $info['NomedeFantasia'];
                    $ncliente1 = $info['n_cliente'];

                }else{

                    Painel::alert('erro','O cliente não existe!');
                }
           }


 ?>




<div class="box-content">
	<h2><i class="fa fa-pencil"></i> Cadastrar Operação</h2>

	<form method="post" enctype="multipart/form-data">

       <?php

			if(isset($_POST['acao'])){
				$ncliente = $_POST['ncliente'];
				$cliente = $_POST['nfantasia'];
				$valor = $_POST['valor'];
				$datavenc = date('Y-m-d',strtotime($_POST['datavenc']));
				$status = $_POST['status'];
				$dataope = date('Y-m-d',strtotime($_POST['dataope']));
				$ncontrato = $_POST['ncontrato'];
				$ndocumento = $_POST['ndocumento'];
				$doc = $_FILES['doc'];


				if($ncliente == ''){
					Painel::alert('erro','O número do cliente não foi selecionado!');
				}else if($cliente == ''){
					Painel::alert('erro','O cliente não foi selecionado!');
				}else if($valor == ''){
					Painel::alert('erro','O valor da operação não foi informado!');
				}else if($datavenc == ''){
					Painel::alert('erro','O vencimento não foi informado!');
				}else if($status == ''){
					Painel::alert('erro','O estatus da operação não foi informado!');
				}else if($dataope == ''){
					Painel::alert('erro','A data da operação não foi informado!');
				}else if($ncontrato == ''){
					Painel::alert('erro','O número do contrato não foi informado!');
				}else if($ndocumento == ''){
					Painel::alert('erro','O número do documento não foi informado!');
				}else if(Painel::operacaoExists($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento)){
						Painel::alert('erro','O contrato já existe, selecione outro por favor!');
				}else{
					if($doc['name'] == ''){
						$doc = '0';
						$operacao = new Painel();
						$operacao->cadastrarOperacao($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,"");
						Painel::alert('sucesso','O cadastro da operação '.$ncontrato.' foi feito com sucesso!');

					}else if($doc['name'] != ''){
						
					if(Painel::docValido($doc) == false){
						Painel::alert('erro','O formato especificado não está correto!');
					}else if(Painel::operacaoExists($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento)){
						Painel::alert('erro','O contrato já existe, selecione outro por favor!');
					}else{
						//Apenas cadastrar no banco de dados!
						$operacao = new Painel();
						$doc = Painel::uploadDoc($ncontrato,$doc,$ncliente);
						$operacao->cadastrarOperacao($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$doc);
						Painel::alert('sucesso','O cadastro da operação '.$ncontrato.' foi feito com sucesso!');
					}
				}	
				
			}
		}
		?>

		
		<div class="form-group">
			<label>Nome do Cliente:</label>
			<input type="text" name="nfantasia" value="<?php if(isset($nfantasia2)){ echo $nfantasia2;}else{ } ?>">
		</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao1" value="Buscar">
		</div><!--form-group-->
		<div class="form-group">
			<label>Número do Cliente:</label>
			<input type="text" name="ncliente" value="<?php if(isset($ncliente1)){ echo $ncliente1;}else{ } ?>">
		</div><!--form-group-->
		<div class="form-group">
			<label>Valor:</label>
			<input formato=money type="text" name="valor">
		</div><!--form-group-->
		<div class="form-group">
			<label >Data do Vencimento:</label>
			<input formato="data" type="text" name="datavenc">
		</div><!--form-group-->
		<div class="form-group">
			<label>Estatus:</label>
			<input type="text" name="status">
		</div><!--form-group-->
		<div class="form-group">
			<label>Data da Operação:</label>
			<input formato="data" type="text" name="dataope">
		</div><!--form-group-->
		<div class="form-group">
			<label>Número do Contrato:</label>
			<input type="text" name="ncontrato">
		</div><!--form-group-->
		<div class="form-group">
			<label>Número do Documento:</label>
			<input type="text" name="ndocumento">
		</div><!--form-group-->
		<div class="form-group">
			<label>Documento:</label>
			<input type="file" name="doc">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Cadastrar!">
		</div><!--form-group-->

	</form>

</div><!--box-content-->