<?php 
	class Painel
	{
		public static function logado()
		{
			//Verifica se existe a SESSION do login
			return isset($_SESSION['login']) ? true : false;
		}
	}
?>