<?php
	session_start(); 
	date_default_timezone_set('America/Sao_Paulo');
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/desenvolvimentoweb/Projeto_01/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('BASE_DIR_PAINEL',__DIR__.'/painel');

	//Constantes para conectar com banco de dados
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'projeto_01');

	//Constantes para painel de controle
	define('NOME_EMPRESA','Gleyson A');

	//Funções
	function pegaCargo($indice)
	{
		return Painel::$cargos[$indice];
	}

	//Seleciona o menu que foi escolhido
	function selecionadoMenu($par)
	{
		$url = explode('/', $_GET['url'])[0];
		if($url == $par){
			echo 'class="menu-active"';
		}
	}

	//Função para permissões no menu
	function verificaPermissaoMenu($permissao)
	{
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			echo 'style="display:none;"';
		}
	}

	function verificaPermissaoPagina($permissao)
	{
		if($_SESSION['cargo'] >= $permissao){
			return;
		}else{
			include('painel/pages/permissao-negada.php');
			die();
		}
	}

	/**Recupera informações caso ocorra um erro no cadastro */
	function recoverPost($post){
		if(isset($_POST[$post])){
			echo $_POST[$post];
		}
	}
?>