<?php 
	
	class Usuario{
		public function atualizarUsuario($nome,$senha,$imagem){
			$sql = MySql::conectar()->prepare("UPDATE `tb_adm.usuarios` SET nome = ?, password = ?, img = ? WHERE user = ?");
			if($sql->execute(array($nome,$senha,$imagem,$_SESSION['user']))){
				return true;
			}else{
				return false;
			}
		}
		//Metodo para verificar se o usuário já existe no banco de dados
		public static function userExists($user){
			$sql = Mysql::conectar()->prepare("SELECT `id` FROM `tb_adm.usuarios` WHERE user=?");
			$sql->execute(array($user));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}
		//Metodo para cadastar o usuário no banco de dados
		public static function cadastrarUsusario($user,$senha,$imagem,$nome,$cargo){
			$sql = Mysql::conectar()->prepare("INSERT INTO `tb_adm.usuarios` VALUES (NULL, ?,?,?,?,?)");
			$sql->execute(array($user,$senha,$imagem,$nome,$cargo));
		}
	}
?>