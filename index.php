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
	<title>Projeto 01</title>
</head>
<body>
	<header>
		<div class="center">
			<div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
			<nav class="desktop rigth">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviçõs</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<nav class="mobile rigth">
				<div class="botao-menu-mobile">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</div>
				<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>sobre">Sobre</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>servicos">Serviçõs</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>contato">Contato</a></li>
				</ul>
			</nav>
			<div class="clear"></div><!--clear-->
		</div><!--center-->
	</header>

	<section class="banner-principal">
		<div class="overlay"></div><!--overlay-->
		<div class="center">
			<form>
				<h2>Qual seu melhor e-mail?</h2>
				<input type="email" name="email" required />
				<input type="submit" name="acao" value="Cadastrar" />
			</form>
		</div><!--center-->
	</section><!--Banner principal-->

	<section class="descricao-autor">
		<div class="center">
			<div class="w50 left">
				<h2>Gleyson Andrade</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.
				</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.
				</p>
			</div><!--w50-->
			<div class="w50 left">
				<img class="rigth" src="<?php echo INCLUDE_PATH; ?>images/foto.jpg"><!--Pegar imagem-->
			</div><!--w50-->
			<div class="clear"></div>
		</div><!--center-->
	</section><!--descricao-autor-->

	<section class="especialidades">
		<div class="center">
			<h2 class="title">Especialidades</h2>
			<div class="w33 left box-especialidade">
				<h3><i class="fa fa-css3" aria-hidden="true"></i></h3>
				<h4>CSS3</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 		et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.
				</p>
			</div><!--box-especialidade-->
			<div class="w33 left box-especialidade">
				<h3><i class="fa fa-html5" aria-hidden="true"></i></h3>
				<h4>HTML5</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 		et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.
				</p>
			</div><!--box-especialidade-->
			<div class="w33 left box-especialidade">
				<h3><i class="fa fa-gg-circle" aria-hidden="true"></i></h3>
				<h4>JavaScript</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore 		et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.
				</p>
			</div><!--box-especialidade-->
			<div class="clear"></div><!--clear-->
		</div><!--center-->
	</section><!--especialidades-->

	<section class="extras">
		<div class="center">
			<div class="w50 left depoimentos-container">
				<h2 class="title">Depoimentos dos nossos clientes</h2>
				<div class="depoimento-sigle">
					<p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim".
					</p>
					<p class="nome-autor">Lorem Ipsum</p>
				</div><!--depoimento-sigle-->
				<div class="depoimento-sigle">
					<p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim".
					</p>
					<p class="nome-autor">Lorem Ipsum</p>
				</div><!--depoimento-sigle-->
				<div class="depoimento-sigle">
					<p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim".
					</p>
					<p class="nome-autor">Lorem Ipsum</p>
				</div><!--depoimento-sigle-->
			</div><!--w50-->
			<div class="w50 left servicos servicos-container">
				<h2 class="title">Serviços</h2>
				<div class="servicos">
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.</li>
						<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisi vitae suscipit tellus mauris a diam maecenas sed enim.</li>
					</ul>
				</div><!--servicos-->
			</div><!--w50-->
			<div class="clear"></div>
		</div><!--center-->
	</section><!--extras-->

	<footer>
		<div class="center">
			<p>Todos os direitos reservados</p>
		</div><!--center-->
	</footer>
	<script src="<?php echo INCLUDE_PATH; ?>js/jquery-3.6.1.min.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
</body>
</html>