<?php

	if(isset($_GET['excluir'])){
		$idExcluir = (int)$_GET['excluir'];
		Painel::deletar('tb_vencimentos', $idExcluir);
		Painel::redirect(INCLUDE_PATH_PAINEL.'pesquisar-vencimento');
	}else if(isset($_GET['order']) && isset($_GET['nc'])){
		Painel::orderItem('tb_vencimentos', $_GET['order'], $_GET['nc']);
	}



	$elemento = "";

	if(isset($_POST['acao1'])){
		$elemento = $_POST['nc'];
	}

	$info = Painel::listarBuscaVencimentos($elemento);
	$somaValores = Painel::listarBuscaSomaValores($elemento);

?>

<div class="box-content w100">
	<h2><i class="fa fa-user-o" aria-hidden="true"></i>Próximos Vencimentos</h2>
	<form method="post" enctype="multipart/form-data">

		<div>
		<label>Cliente:</label>
			<input type="text" name="nc" required value="" placeholder="Insira o número do cliente.">
		</div><!--form-group-->

		<div class="form-group">
			<input type="submit" name="acao1" value="Buscar">
		</div><!--form-group-->
		</div>

		<div class="box-content w100">

		<div class="table-responsive">
			<div class="wraper-table">
			<div class="row">
				<div class="col6">
					<span>Cliente </span>
				</div>
				<div class="col6">
					<span>Número</span>
				</div>
				<div class="col6">
					<span>Valor   <a href="<?php echo INCLUDE_PATH_PAINEL ?>pesquisar-vencimento?order=up?nc"><i class="fas fa-sort-up"></i></a><a href="<?php echo INCLUDE_PATH_PAINEL ?>pesquisar-vencimento?order=down?nc"><i class="fas fa-sort-down"></i></a></span>
				</div>
				<div class="col6">
					<span>Vencimento   <a href=""><i class="fas fa-sort-up"></i></a><a href=""><i class="fas fa-sort-down"></i></a></span>
				</div>
				<div class="col6">
					<span>Operação</span>
				</div>
				<div class="col6">
					<span>#</span>
				</div>
				<div class="col6">
					<span>#</span>
				</div>
				<div class="clear"></div>
			</div>

			<?php	
				usort($info, 'Painel::dateCompare');						
	
				foreach ($info as $info): 

			?>
			<div class="row">
				<div class="col6">
					<span><?php if(isset($info['NomedeFantasia'])){ echo $info['NomedeFantasia']; }else{ } ?></span>
				</div>
				<div class="col6">
					<span><?php if(isset($info['n_cliente'])){ echo $info['n_cliente'];}else{ } ?></span>
				</div>
				<div class="col6">
					<span><?php if(isset($info['valor'])){ echo 'R$ '.number_format($info['valor'],2,',','.');}else{ } ?></span>
				</div>
				<div class="col6">
					<span><?php if(isset($info['data_do_venc'])){ echo date('d-m-Y',strtotime($info['data_do_venc']));}else{ } ?></span>
				</div>
				<div class="col6">
					<span><?php if(isset($info['ncontrato'])){ echo $info['ncontrato'];}else{ } ?></span>
				</div>
				<div class="col6">
					<a acaoBt="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>editar-operacao?id=<?php echo $info['id']; ?>"><i class="far fa-edit"></i> Editar</a>
				</div>
				<div class="col6">
					<a acaoBtn="delete" href="<?php echo INCLUDE_PATH_PAINEL ?>pesquisar-vencimento?excluir=<?php echo $info['id']; ?>"><i class="fa fa-times-circle"></i> Excluir</a>
				</div>
				<div class="clear"></div>
			</div>

		<?php endforeach; ?>
		

		<?php if(isset($_POST['acao1'])){ ?>

		<div class="row">
				<div class="col6">
					<span>Total</span>
				</div>
				<div class="col6">
					<span>-</span>
				</div>
				<div class="col6">
					<span><?php echo 'R$ '.number_format($somaValores[0],2,',','.'); ?></span>
				</div>
				<div class="col6">
					<span>-</span>
				</div>
				<div class="col6">
					<span>-</span>
				</div>
				<div class="col6">
					<span>-</span>
				</div>
				<div class="clear"></div>
			</div>
			</div>
		</div>
		<?php	}	?>
		</form>
</div>

