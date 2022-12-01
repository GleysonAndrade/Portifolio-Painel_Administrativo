<?php 
	$autoload = function($class){
		// if($class == ){

		// }
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/desenvolvimentoweb/Projeto_01/');
?>