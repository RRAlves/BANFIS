<?php 
	$paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
	$porPagina = 20;
	
		$infoClientes = Painel::selectAll('cadastro_de_empresas',($paginaAtual - 1) * $porPagina, $porPagina);
?>

<div class="box-content w100">
	<h2><i class="fa fa-user-o" aria-hidden="true"></i>Próximos Vencimentos</h2>
		<div class="table-responsive">
			<div class="wraper-table">
			<div class="row">
				<div class="col25">
					<span>Número</span>
				</div>
				<div class="col25">
					<span>Cliente</span>
				</div>
				<div class="col25">
					<span>CNPJ</span>
				</div>
				<div class="col25">
					<span>Telefone</span>
				</div>
				<div class="clear"></div>
			</div>


			<?php 

				usort($infoClientes, 'Painel::numberCompare');

				foreach ($infoClientes as $infoClientes) {
			?>
			<div class="row">
				<div class="col25">
					<span><?php echo $infoClientes['id'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $infoClientes['NomedeFantasia'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $infoClientes['CNPJ'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $infoClientes['Telefone'] ?></span>
				</div>
				<div class="clear"></div>
			</div>
		<?php	}	?>

				
	</div>

			<div class="paginacao">
					<?php
						$totalPaginas = ceil(count(Painel::selectAll('cadastro_de_empresas')) / $porPagina);

						for($i = 1; $i <= $totalPaginas; $i++){
							if($i == $paginaAtual)
								echo '<a class="pag-select" href="'.INCLUDE_PATH_PAINEL.'resumo-cliente?pagina='.$i.'">'.$i.'</a>';
							else
								echo '<a href="'.INCLUDE_PATH_PAINEL.'resumo-cliente?pagina='.$i.'">'.$i.'</a>';
						}
					?>
					</div>
			</div>
</div>