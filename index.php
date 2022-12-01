<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet"href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="projeto,meu,primeiro">
	<meta name="description" content="Meu primeiro projeto">
	<link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet">
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon">
	<title>Projeto 01</title>
</head>
<body>
	<base base="<?php echo INCLUDE_PATH; ?>"></base>
	<?php 
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'depoimentos':
				echo '<target target="depoimentos"/>';
				break;
			case 'servicos':
				echo '<target target="servicos"/>';
				break;
		}
	?>
	<?php new Email(); ?>
	<header>
		<div class="center">
			<div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
			<nav class="desktop rigth">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<nav class="mobile rigth">
				<div class="botao-menu-mobile">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>depoimentos">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviçõs</a></li>
					<li><a realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div><!--clear-->
		</div><!--center-->
	</header>

	<div class="container-principal">
		<?php
			if(file_exists('pages/'.$url.'.php')){
				include('pages/'.$url.'.php');
			}else{
				//Inclui um arquivo de erro pois a página não existe.
				if($url !='depoimentos' && $url !='servicos'){
					$pagina404 = true;
					include('pages/404.php');
				}else{
					include('pages/home.php');
				}
				
			}
		?>
	</div><!--container-principal-->
	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed";' ?> >
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>

	<script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.6.1.min.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>
	<!-- <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script> -->
	<script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
	<!-- Evita que o script seja carregado em outras páginas -->
	<?php 
		if($url == 'home' || $url == ""){
	?>
	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
	<?php } ?>
	<?php 
		if($url == 'contato'){
	?>
	<?php } ?>
	<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
</body>
</html>