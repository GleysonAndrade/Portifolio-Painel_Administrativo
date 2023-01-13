<?php 
	if(isset($_COOKIE['lembrar'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios` WHERE user = ? AND password = ?");
		$sql->execute(array($user,$password));
		if($sql->rowCount() == 1){
			$info = $sql->fetch();
			$_SESSION['login'] = true;
			$_SESSION['user'] = $user;
			$_SESSION['password'] = $password;
			$_SESSION['cargo'] = $info['cargo'];
			$_SESSION['nome'] = $info['nome'];
			$_SESSION['img'] = $info['img'];

			header('Location: '.INCLUDE_PATH_PAINEL);
			die();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Painel de controle</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet"href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="<?php echo INCLUDE_PATH_PAINEL; ?>css/style.css" rel="stylesheet">
</head>
<body>
	<div class="box-login">
		<?php 
			if(isset($_POST['acao'])){
				$user = $_POST['user'];
				$password = $_POST['password'];
				$sql = Mysql::conectar()->prepare("SELECT * FROM `tb_adm.usuarios` WHERE user = ? AND password = ?");
				$sql->execute(array($user,$password));
				if($sql->rowCount() == 1){
					$info = $sql->fetch();
					//Logamos com sucesso
					$_SESSION['login'] = true;
					$_SESSION['user'] = $user;
					$_SESSION['password'] = $password;
					$_SESSION['cargo'] = $info['cargo'];
					$_SESSION['nome'] = $info['nome'];
					$_SESSION['img'] = $info['img'];
					if(isset($_POST['lembrar'])){
						setcookie('lembrar',true,time()+(60*60*24),'/');
						setcookie('user',$user,time()+(60*60*24),'/');
						setcookie('password',$password,time()+(60*60*24),'/');
					}
					header('Location: '.INCLUDE_PATH_PAINEL);
					die();
				}else{
					//Falhou
					echo '<div class="erro-box"><i class="fa fa-times"></i> Usuário ou senha incorretos!</div>';
				}
			}
		?>
		<h2>Efetue o login</h2>
		<form method="post">
			<input type="text" name="user" placeholder="Login...">
			<input type="password" name="password" placeholder="Senha...">
			<div class="form-group-login left">
				<input type="submit" name="acao" value="logar">
			</div>
			<div class="form-group-login right">
				<label for="lembrar-me">Lembrar-me</label>
				<input type="checkbox" name="lembrar">
			</div>
		</form>
		<div class="clear"></div>
	</div><!--box-login-->
</body>
</html>