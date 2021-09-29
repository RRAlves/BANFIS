<?php
	verificaPermissaoPagina(2);

	$empresa = NULL;

	$infoClientes = Painel::selectAllFunc('cadastro_de_funcion__rios',$empresa);

	if(isset($_POST['acao1'])){

	$empresa = $_POST['empresa'];

	$infoClientes = Painel::selectAllFunc('cadastro_de_funcion__rios',$empresa);
		}

?>
<div class="box-content w100">
	<form method="post" enctype="multipart/form-data">

	<h2><i class="fa fa-user-o" aria-hidden="true"></i>Clientes Cadastrados</h2>
	<div class="form-group">
						<label>Empresa:</label>
						<select  name="empresa">
							<option value="null"></option>
							<option value="3">EDIFÍCIO CENTRAL</option>
							<option value="4">DCON</option>
						</select>		
	</div>
	<div class="form-group">
			<input  type="submit" name="acao1" value="Buscar">
		</div><!--form-group-->
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
					<span><?php echo $infoClientes['n_funci'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $infoClientes['nomecomp'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $infoClientes['cpf'] ?></span>
				</div>
				<div class="col25">
					<span><?php echo $infoClientes['telefone'] ?></span>
				</div>
				<div class="clear"></div>
			</div>
		<?php	}	?>

				
		</div>

			</div>
	</form>			
</div>	
