<?php include('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador(); ?>
<?php
	$infoSite = Mysql::conectar()->prepare("SELECT * FROM `tb_site.config`");
	$infoSite->execute();
	$infoSite = $infoSite->fetch();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Gleyson Alves" />
	<meta name="keywords" content="sistemas web, desenvolvimento web, html5,css3,reposivo,php,mysql">
	<meta name="description" content="Desenvolvimento Web">
	<link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet">
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon">
	<title><?php echo $infoSite['titulo_site']?></title>
</head>

<body>
	<base base="<?php echo INCLUDE_PATH; ?>">
	</base>
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
	<div class="sucesso">Formulário enviado com sucesso!</div>
	<div class="overlay-loading">
		<img src="<?php echo INCLUDE_PATH; ?>images/ajax-loader.gif">
	</div>
	<!--overlay-loading-->

	<header>
		<div class="center">
			<div class="logo left"><a href="/">Logomarca</a></div>
			<!--logo-->
			<nav class="desktop right">
				<ul>
					<!-- O title e adicionado para a questão de SEO do site-->
					<li><a title="Home" href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a title="Depoimentos" href="<?php echo INCLUDE_PATH; ?>depoimentos">Sobre</a></li>
					<li><a title="Servicos" href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a title="Noticias" href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
					<li><a title="Contato" realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<nav class="mobile right">
				<div class="botao-menu-mobile">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<ul>
					<li><a title="Home" href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a title="Depoimentos" href="<?php echo INCLUDE_PATH; ?>depoimentos">Sobre</a></li>
					<li><a title="Servicos" href="<?php echo INCLUDE_PATH; ?>servicos">Serviços</a></li>
					<li><a title="Noticias" href="<?php echo INCLUDE_PATH; ?>noticias">Notícias</a></li>
					<li><a title="Contato" realtime="contato" href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div>
			<!--clear-->
		</div>
		<!--center-->
	</header>

	<div class="container-principal">
		<?php
		if (file_exists('pages/' . $url . '.php')) {
			include('pages/' . $url . '.php');
		} else {
			//Inclui um arquivo de erro pois a página não existe.
			if ($url != 'depoimentos' && $url != 'servicos') {
				$urlPar = explode('/',$url);
				if($urlPar != 'noticias'){
					$pagina404 = true;
					include('pages/noticias.php');
				}else{
					include('pages/404.php');
				}
			} else {
				include('pages/home.php');
			}
		}
		?>
	</div>
	<!--container-principal-->
	<footer <?php if (isset($pagina404) && $pagina404 == true) echo 'class="fixed";' ?>>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div>
		<!--center-->
	</footer>

	<script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.6.1.min.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/constants.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>
	<!-- <script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script> -->
	<script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
	<!-- Evita que o script seja carregado em outras páginas -->
	<?php
	if ($url == 'home' || $url == "") {
	?>
		<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
	<?php } ?>

	<?php 
		if(is_array($url) && strstr($url[0],'noticias') !== false){
	?>
		<script>
			$(function(){
				$('select').change(function(){
					location.href=include_path+"noticias/"+$(this).val();
				})
			})
		</script>
	<?php } ?>

	<?php
	if ($url == 'contato') {
	?>
	<?php } ?>
	<script src="<?php echo INCLUDE_PATH; ?>js/exemplo.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/formularios.js"></script>
</body>

</html>