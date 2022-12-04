<?php 
	include('../config.php');

	//Verifica se o usuário está logado
	if(Painel::logado() == false){
		include('login.php');
	}else{
		include('main.php');
	}
?>