
<div class="box-content">
	<h2><i class="fa fa-pencil" aria-hidden="true"></i> Pesquisar Funcionário</h2>
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label>Buscar:</label>
					<input type="text" id="busca" name="busca" value="" autocomplete="off">
					<ul class="cascata" id="cascata">
						<li><a href="#">teste, testes</a></li>
					</ul>
			</div><!--form-group-->
		<div class="form-group">
			<input type="submit" name="acao1" value="Buscar">
		</div><!--form-group-->
		</form>
</div>

<script src="<?php echo INCLUDE_PATH ?>js/jquery.js" ></script>	
<script>
$(document).ready(function(){
 
	function pegarDados(){

		var x = $("#busca").val();

		if (x == ''){

			$('cascata').css('display','block');
		}

		$.post("dadosdefuncionarios.php",
			{
			x:x
			}, 
			function(data,status){
				if(data != "Não existe este funcionário"){
					$('#cascata').css('display', 'block');
                    $('#cascata').html(data);
				}
			});
	}
		$('#busca').on('busca', pegarDados);
          $("body").on('click', () => {
            $('#cascata').css('display', 'none');
          });
          $('#busca').on('click', pegarDados);	
});
</script>
