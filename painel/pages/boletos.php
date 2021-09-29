<?php 

	
 	if(isset($_GET['file'])){

	$fileName = @basename($filePath);
	$filePath = $_GET['file'];

	if(file_exists($filePath)){
	
		header('Content-Description: File Transfer');
		header('Content-Type: application/pdf');
		header('Content-Disposition: attachment; filename='.basename($filePath));
		header('Content-Control: public');

		readfile($filePath);

		exit;
	
	}else{

		echo '<script> alert("Não existe arquivo para download!") </script>';
		
	}
}

?>

<?php 

	$dadosClientes = Painel::listarOperacoes();
		
?>



<div class="box-content">
	<h2><i class="fa fa-user-o" aria-hidden="true"></i>Boletos</h2>
		<div class="table-responsive">
			<div class="wraper-table">
			<div class="row">
				<div class="col25">
					<span>Cliente</span>
				</div>
				<div class="col25">
					<span>Operação</span>
				</div>
				<div class="col25">
					<span>Data</span>
				</div>
				<div class="col25">
					<span>Boleto</span>
				</div>
				<div class="clear"></div>
			</div>
			<?php 

				function date_compare($element1,$element2){
	 				$datetime1 = strtotime($element1['data_da_ope']);
	 				$datetime2 = strtotime($element2['data_da_ope']);
	 				return $datetime1 - $datetime2;
			 }

				usort($dadosClientes, 'date_compare');

				foreach ($dadosClientes as $key => $value) {


			?>
			<div class="row">
				<div class="col25">
					<span><?php echo $value['NomedeFantasia'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $value['ncontrato'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo date('d-m-Y',strtotime($value['data_do_venc'])); ?></span>
				</div>
				<?php if(file_exists(BASE_DIR_PAINEL.'/uploads/'.$value['n_cliente'].'/'.$value['docs']) && is_file(BASE_DIR_PAINEL.'/uploads/'.$value['n_cliente'].'/'.$value['docs'])){ ?>
				<div class="col25">
					<a href="pages\boletos.php?file=<?php echo BASE_DIR_PAINEL.'/uploads/'.$value['n_cliente'].'/'.$value['docs']; ?>"><i class="fas fa-download"></i></a>
				</div>
			<?php }else{ ?>
				<div class="col25">
					<a href=""><i class="fas fa-download"></i></a>
				</div>
			<?php } ?>
				<div class="clear"></div>
			</div>
		<?php
			}	?>
			</div>
		</div>
	</form>
</div>


