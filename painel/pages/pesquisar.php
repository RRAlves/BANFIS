<?php 
	$dadosClientes = Painel::listarProximosVencimentos();
	$somaValores = Painel::listarSomaValores();
?>

<div class="box-content w100">
	<h2><i class="fa fa-user-o" aria-hidden="true"></i>Próximos Vencimentos</h2>
		<div class="table-responsive">
			<div class="wraper-table">
				<div class="row">
					<div class="col">
						<span>Cliente</span>
					</div>
					<div class="col">
						<span>Número</span>
					</div>
					<div class="col">
						<span>Valor</span>
					</div>
					<div class="col">
						<span>Vencimento</span>
					</div>
					<div class="col">
						<span>Operação</span>
					</div>
					<div class="clear"></div>
				</div>

				<?php 

					usort($dadosClientes, 'Painel::dateCompare');

					foreach ($dadosClientes as $key => $value) {
				?>
				<div class="row">
					<div class="col">
						<span><?php echo $value['NomedeFantasia'] ?></span>
					</div>
					<div class="col">
						<span><?php echo $value['n_cliente'] ?></span>
					</div>
					<div class="col">
						<span><?php echo 'R$ '.number_format($value['valor'],2,',','.') ?></span>
					</div>
					<div class="col">
						<span><?php echo date('d-m-Y',strtotime($value['data_do_venc'])); ?></span>
					</div>
					<div class="col">
						<span><?php echo $value['ncontrato'] ?></span>
					</div>
					<div class="clear"></div>
				</div>
			<?php	}	?>

			
			<div class="row">
					<div class="col">
						<span>Total</span>
					</div>
					<div class="col">
						<span>-</span>
					</div>
					<div class="col">
						<span><?php echo 'R$ '.number_format($somaValores[0],2,',','.'); ?></span>
					</div>
					<div class="col">
						<span>-</span>
					</div>
					<div class="col">
						<span>-</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			</div>
		</div>


</div>