	<section class="banner-container">
		<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg1.jpg');" class="banner-single"></div><!--banner-single-->
		<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg2.png');" class="banner-single"></div><!--banner-single-->
		<div style="background-image: url('<?php echo INCLUDE_PATH; ?>images/bg3.jpg');" class="banner-single"></div><!--banner-single-->
		<div class="overlay"></div><!--overlay-->
		<div class="center">
		<form method="post">
			<h2>Qual seu melhor e-mail?</h2>
			<input type="email" name="email" required />
			<input type="hidden" name="identificador" value="form_home">
			<input type="submit" name="acao" value="Cadastrar" />
		</form>
		</div><!--center-->
	</section><!--Banner principal-->

	<section class="descricao-autor">
		<div class="center">
			<div class="bullets">

			</div><!--bullets-->

			<div class="w50 left" id="depoimentos">
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
			<div class="w50 left servicos servicos-container" id="servicos">
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