<?php include('config.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>BANFIS</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>css/style3.css">
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu site">
</head>
<body>
	
	<header>
		<div class="center">
			<div class="logo left"><a href="/BANFIS"><img src="imagens/LOGOTIPO1.png" width="200" height="100"></a></div>
				<nav class="desktop right">	
					<ul>
						<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>institucional">Institucional</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>cartao">Cartão</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
					</ul>
				</nav>
				<nav class="mobile right">
				<div class="botao-mobile">
					<i class="fas fa-bars"></i>
				</div>	
					<ul>
						<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>institucional">Institucional</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>cartao">Cartão</a></li>
						<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
					</ul>
				</nav>
			<div class="clear"></div>
		</div><!--center-->
	</header>
	
	<?php 

		$url = isset($_GET['url']) ? $_GET['url'] : 'home';

		if(file_exists('pages/'.$url.'.php')){
			include('pages/'.$url.'.php');
		}
		else{
			$pagina404 = true;
			include('pages/404.php');
		}
	?>

		<footer <?php if (isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
			<div class="center">
				<p>SCS Quadra 01  Bloco I - Edifício Central - Sala 905 Asa Sul - Brasília - DF <br> CEP 70.304-900 contatos@banfis.com.br <br> Tel: (61) 3045-0100
				</p>
			</div>
		</footer>

	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/scripts.js"></script>
	<?php
		if($url == 'home' || $url == ''){
	?>

	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>

	<?php } ?>

	<?php
		
		if ($url == 'contato'){
	
	?>
	<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDiz_oPSzRdRFTQ9TFopaUQbDSSW4UW4hs'></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>

<?php } ?>

</body>
</html>
