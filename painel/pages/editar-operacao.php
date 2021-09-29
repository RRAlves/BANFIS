<?php

	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$info = Painel::select('tb_vencimentos','id = ?',array($id));
	}else{
		Painel::alert('erro','Você precisa passar o parâmentro ID');
		die();
	}



?>
<div class="box-content">

	<h2><i class="fa fa-pencil"></i> Editar Operação</h2>

	<form method="post" enctype="multipart/form-data">

		<?php

            if(isset($_POST['acao'])){

                $ncliente = $_POST['ncliente'];
                $nfantasia = $_POST['nfantasia'];
                $valor = number_format($_POST['valor'],2,'.','');
                $datavenc = date('Y-m-d',strtotime($_POST['datavenc']));
                $status = $_POST['status'];
                $dataope = date('Y-m-d',strtotime($_POST['dataope']));
                $ncontrato = $_POST['ncontrato'];
                $ndocumento = $_POST['ndocumento'];
                $doc = $_FILES['doc'];
                $doc_atual = isset($_POST['doc_atual']) ? $_POST['doc_atual'] : '';
                $operacao = new Painel();

            
                if($doc['name'] != ''){

                
                    if(Painel::docValido($doc)){
                        Painel::deleteDoc($doc_atual);
                        $doc = Painel::uploadDoc($ncontrato,$doc,$ncliente);            

                    if($operacao->atualizarOperacao($ncliente,$nfantasia,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$doc,$id)){
                        Painel::alert('sucesso',' Atualizado com sucesso com doc!');
                        $info = Painel::select('tb_vencimentos','id = ?',array($id));

                    }else{

                        Painel::alert('erro',' Ocorreu um erro ao atualizar com doc...');
                    }

                }else{

                    Painel::alert('erro',' O formato do documento não é valido');
                }

            }else{

            
                
                if($operacao->atualizarOperacaoDoc($ncliente,$nfantasia,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$id)){

                    Painel::alert('sucesso',' Atualizado com sucesso sem doc!');
                    $info = Painel::select('tb_vencimentos','id = ?',array($id));

                      
                    }else{

                        Painel::alert('erro',' Ocorreu um erro ao atualizar...');
            }
        }

    }

    ?>
			
		<div class="form-group">
			<label>Número do Cliente:</label>
			<input type="text" name="ncliente" value="<?php echo $info['n_cliente']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<label>Nome do Cliente:</label>
			<input type="text" name="nfantasia" value="<?php echo $info['NomedeFantasia']; ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Valor:</label>
			<input formato=money type="text" name="valor" value="<?php echo $info['valor']; ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Data do Vencimento:</label>
			<input formato="data" type="text" name="datavenc" value="<?php echo date('d-m-Y',strtotime($info['data_do_venc'])); ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Estatus:</label>
			<input type="text" name="status" value="<?php echo $info['status']; ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Data da Operação:</label>
			<input formato="data" type="text" name="dataope" value="<?php echo date('d-m-Y',strtotime($info['data_da_ope'])); ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Número do Contrato:</label>
			<input type="text" name="ncontrato" value="<?php echo $info['ncontrato']; ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Número do Documento:</label>
			<input type="text" name="ndocumento" value="<?php echo $info['n_documento']; ?>">
		</div><!--form-group-->
		<div class="form-group">

			<label>Documento:</label>
			<input type="file" name="doc">
			<input type="hidden" name="doc_atual" value="<?php echo $info['docs']; ?>">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao" value="Atualizar!">
		</div><!--form-group-->
	</form>
</div><!--box-content-->