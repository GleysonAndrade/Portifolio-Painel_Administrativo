<?php 
	verificaPermissaoMenu(2);
?>
<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body> -->
	<div class="box-content">
		<h2><i class="fa fa-pencil"></i> Adicionar Usuário</h2>
		<form method="post" enctype="multipart/form-data">
			<?php 
				if (isset($_POST['acao'])){

					$login = $_POST['login'];
					$nome = $_POST['nome'];
					$senha = $_POST['password'];
					$imagem = $_FILES['imagem'];
					$cargo = $_POST['cargo'];

					if($login == ''){
						Painel::alert('erro','O login está vázio!');
					}elseif ($nome == '') {
						Painel::alert('erro','O nome está vázio!');
					}elseif ($senha == '') {
						Painel::alert('erro','O senha está vázio!');
					}elseif ($cargo) {
						Painel::alert('erro','O cargo está vázio!');
					}elseif ($imagem['name'] == '') {
						Painel::alert('erro','A imagem precisa estar selecionada!');
					}else{
						//Podemos cadastrar!
						if($cargo >= $_SESSION['cargo']){
							Painel::alert('erro','Você precisa selecionar um cargo menor que o seu!');
						}elseif (Painel::imagemValida($imagem) == false){
							Painel::alert('erro','O formaro especificado não está correto!');
						}elseif (Usuario::userExists($login)) {
							Painel::alert('erro','O login já está cadastrado, use outro!');
						}else{
							//Apenas cadastrar no banco de dados
							$usuario = new Usuario();
							$imagem = Painel::uploadFile($imagem);
							$usuario->cadastrarUsusario($login,$senha,$imagem,$nome,$cargo);
							Painel::alert('sucesso','O cadastro do usuário '.$login.' foi feito com sucesso!');
						}
					}
				}
			?>
			<div class="form-group">
				<label>Login:</label>
				<input type="text" name="login">
			</div>
			<div class="form-group">
				<label>Nome:</label>
				<input type="text" name="nome">
			</div>
			<div class="form-group">
				<label>Senha:</label>
				<input type="password" name="password">
			</div>
			<div class="form-group">
				<label>Cargo</label>
				<select name="cargo">
					<?php 
						foreach	(Painel::$cargos as $key => $value){
							if($key < $_SESSION['cargo'])echo '<option value="'.$key.'">'.$value.'</option>';
						}
					?>
				</select>
			</div>
			<div class="form-group">
				<label>Imagem:</label>
				<input type="file" name="imagem">
				<input type="hidden" name="imagem_atual">
			</div>
			<div class="form-group">
				<input type="submit" name="acao" value="Cadastrar">
			</div>
		</form>
	</div><!--box-content-->
<!-- </body>
</html> -->