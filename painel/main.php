	<?php
	if(isset($_GET['loggout'])){
		Painel::loggout();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php INCLUDE_PATH_PAINEL ?>css/style.css">
</head>
<body>
<div class="menu">
	<div class="menu-wraper">
	<div class="box-usuario">
		<?php
			if($_SESSION['img'] == ''){
		?>
			<div class="avatar-usuario">
				<i class="fa fa-user"></i>
			</div><!--avatar-usuario-->
		<?php }else{ ?>
			<div class="imagem-usuario">
				<img src="<?php echo INCLUDE_PATH_PAINEL ?>uploads/<?php echo $_SESSION['img']; ?>" />
			</div><!--avatar-usuario-->
		<?php } ?>
		<div class="nome-usuario">
			<p><?php echo $_SESSION['nome'] ?></p>
			<p><?php echo pegaCargo($_SESSION['cargo']); ?></p>
		</div>
	</div>
	<div class="items-menu">
		<h2 <?php verificaPermissaoMenu(2) ?>>Painel Administrador</h2>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('resumo-cliente'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>resumo-cliente">Clientes</a>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('pesquisar-funcionario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>pesquisar-funcionario">Funcionários</a>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('cadastrar-cliente'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-cliente">Cadastrar Cliente</a>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('editar-cliente'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-cliente">Editar Cliente</a>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('cadastrar-operacao'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-operacao">Cadastrar Operação</a>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('cadastrar-funcionario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>cadastrar-funcionario">Cadastrar Funcionário</a>

		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('editar-funcionario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-funcionario">Editar Funcionário</a>


	
		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('pesquisar-vencimento'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>pesquisar-vencimento">Pesquisar Vencimentos</a>
			<a <?php selecionadoMenu('adicionar-usuario'); ?> <?php verificaPermissaoMenu(2) ?> href="<?php echo INCLUDE_PATH_PAINEL ?>adicionar-usuario">Adicionar Usuário</a>
		
		<h2>Painel</h2>
		
		<a <?php selecionadoMenu('pesquisar'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>pesquisar">Meus Vencimentos</a>
	
		<a <?php selecionadoMenu('boletos'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>boletos">Boletos</a>

		<a <?php selecionadoMenu('editar-usuario'); ?> href="<?php echo INCLUDE_PATH_PAINEL ?>editar-usuario">Editar Usuário</a>


	
		<h2 <?php verificaPermissaoMenu(2) ?> >Configuração Geral</h2>
		<a <?php verificaPermissaoMenu(2) ?> <?php selecionadoMenu('editar');?> href="">Editar</a>
	</div>
	</div>
</div>
	<header>
		<div class="center">
			<div class="menu-btn">
				<i class="fa fa-bars"></i>
			</div>
			<div class="loggout">
				<a href="<?php echo INCLUDE_PATH_PAINEL?>"><i class="fa fa-home"></i> <span>Página Inicial</span></a>
				<a href="<?php echo INCLUDE_PATH_PAINEL?>?loggout"><i class="fa fa-toggle-off"></i> <span>Sair</span></a>
			</div>
			<div class="clear"></div>
		</div>
	</header>
	<div class="content">

		<?php Painel::carregarPagina(); ?>

	</div>
<script src="<?php echo INCLUDE_PATH ?>js/jquery.js" ></script>	
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/jquery.mask.js"></script>
<script src="<?php echo INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>
