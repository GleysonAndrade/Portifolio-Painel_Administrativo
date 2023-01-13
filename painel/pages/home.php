<?php 
	$usuariosOnline = Painel::listarUsuarioOnline();

	$pegarVistasTotais = Painel::listarVistasSite();

	$pegarVisitasHoje = Painel::listarVistasHoje();
?>
<div class="box-content w100">
		<h2><i class="fa fa-home"></i> Painel de Controle - <?php echo NOME_EMPRESA ?> </h2>

		<div class="box-metricas">
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Usuários Online</h2>
					<p><?php echo count($usuariosOnline); ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Total de Visitas</h2>
					<p><?php echo $pegarVistasTotais; ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Visitas Hoje</h2>
					<p><?php echo $pegarVisitasHoje; ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->
			<div class="clear"></div>
		</div><!--box-metrica-->
	</div><!--box-content-->

<div class="box-content w100">
	<h2><i class="fa fa-user" aria-hidden="true"></i> Usuários Online no Site</h2>
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>IP</span>
			</div><!--col-->
			<div class="col">
				<span>Ùltima ação</span>
			</div><!--col-->
			<div class="clear"></div><!--clear-->
		</div><!--row-->
		<?php  
			foreach ($usuariosOnline as $key => $value) { 
		?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['ip'] ?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
			</div><!--col-->
		</div><!--row-->
		<?php } ?>
		<div class="clear"></div><!--clear-->
	</div><!--table-responsive-->
</div><!--box-content-->

<div class="box-content w100">
	<h2><i class="fa fa-user" aria-hidden="true"></i> Usuários do Painel</h2>
	<div class="table-responsive">
		<div class="row">
			<div class="col">
				<span>Nome</span>
			</div><!--col-->
			<div class="col">
				<span>Cargo</span>
			</div><!--col-->
			<div class="clear"></div><!--clear-->
		</div><!--row-->
		<?php  
			$usuariosPainel = Mysql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios`");
			$usuariosPainel->execute();
			$usuariosPainel = $usuariosPainel->fetchAll();
			foreach ($usuariosPainel as $key => $value) { 
		?>
		<div class="row">
			<div class="col">
				<span><?php echo $value['user'] ?></span>
			</div><!--col-->
			<div class="col">
				<span><?php echo pegaCargo($value['cargo']); ?></span>
			</div><!--col-->
		</div><!--row-->
		<?php } ?>
		<div class="clear"></div><!--clear-->
	</div><!--table-responsive-->
</div><!--box-content-->