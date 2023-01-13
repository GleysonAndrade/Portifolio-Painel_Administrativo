<?php 
	class Painel
	{
		public static $cargos = [
			'0' => 'Normal',
			'1' => 'Sub Administrador',
			'2' => 'Administrador'
		];

		public static function generateSlug($str){
			$str = mb_strtolower($str);
			$str = preg_replace('/(â|á|ã)/', 'a', $str);
			$str = preg_replace('/(ê|é)/', 'e', $str);
			$str = preg_replace('/(í|Í)/', 'i', $str);
			$str = preg_replace('/(ú)/', 'u', $str);
			$str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
			$str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
			$str = preg_replace('/( )/', '-',$str);
			$str = preg_replace('/ç/','c',$str);
			$str = preg_replace('/(-[-]{1,})/','-',$str);
			$str = preg_replace('/(,)/','-',$str);
			$str=strtolower($str);
			return $str;
		}

		public static function logado()
		{
			//Verifica se existe a SESSION do login
			return isset($_SESSION['login']) ? true : false;
		}

		//Função loggout
		public static function loggout(){
			setcookie('lembrar','true',time()-1,'/');
			session_destroy();
			header('Location: '.INCLUDE_PATH_PAINEL);
		}

		//Carregar páginas dinanmicamente
		public static function carregarPagina(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				if(file_exists('pages/'.$url[0].'.php')){
					include('pages/'.$url[0].'.php');
				}else{
					//Página não existe
					header('Location: '.INCLUDE_PATH_PAINEL);
				}
			}else{
				include('pages/home.php');
			}
		}

		//Função para listar todos os usuários online
		public static function listarUsuarioOnline()
		{
			self::limparUsuarioOnline();

			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_adm.online`");
			$sql->execute();
			return $sql->fetchAll();
		}

		//Função para limpar usuários inativos
		public static function limparUsuarioOnline()
		{
			$date = date('Y-m-d H:s:i');
			$sql = MySql::conectar()->exec("DELETE FROM `tb_adm.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
		}

		//Função para listar as visitas no site
		public static function listarVistasSite()
		{
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_adm.online`");
			$sql->execute();
			return $sql->rowCount();
		}

		//Função para contar as visitas do dia no site
		public static function listarVistasHoje()
		{
			$sql = MySql::conectar()->prepare("SELECT * FROM `tb_adm.visitas` WHERE dia = ?");
			$sql->execute(array(date('Y-m-d')));
			return $sql->rowCount();
		}

		//Função de alert do sistema
		public static function alert($tipo,$mensagem){
			if($tipo == 'sucesso'){
				echo '<div class="box-alert sucesso"><i class="fa fa-check"></i> '.$mensagem.'</div>';
			}else if($tipo == 'erro'){
				echo '<div class="box-alert erro"><i class="fa fa-times"></i> '.$mensagem.'</div>';
			}
		}

		//Função de fazer upload de imagem
		public static function imagemValida($imagem){
			if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'){

				$tamanho = intval($imagem['size']/1024);
				if($tamanho < 300){
					return true;
				}else{
					return false;
				}
				return true;
			}else{
				return false;
			}
		}

		public static function uploadFile($file){
			$formatoArquivo = explode('.',$file['name']);
			$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo)-1];
			if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$imagemNome)){
				return $imagemNome;
			}else{
				return false;
			}
		}

		//Função para deletar imagem antiga
		public static function deleteFile($file){
			@unlink('uploads/'.$file);
		}

		//Insert no banco de dados dinanmicamente
		public static function insert($arr){
			$certo = true;
			$nome_tabela = $arr['nome_tabela'];
			$query = "INSERT INTO `$nome_tabela` VALUES (null";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
				$query.=",?";
				$parametros[] = $value;
			}
			$query.=")";
			if($certo == true){
				$sql = MySql::conectar()->prepare($query);
				$sql->execute($parametros);
				$lastId = Mysql::conectar()->lastInsertId();
				$sql = Mysql::conectar()->prepare("UPDATE `$nome_tabela` SET order_id = ? WHERE id = $lastId");
				$sql->execute(array($lastId));
			}
			return $certo;
		}

		//Atualizar no banco de dados dinanmicamente
		public static function update($arr,$single = false){
			$certo = true;
			$first = false;
			$nome_tabela = $arr['nome_tabela'];

			$query = "UPDATE `$nome_tabela` SET ";
			foreach ($arr as $key => $value) {
				$nome = $key;
				$valor = $value;
				if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id')
					continue;
				if($value == ''){
					$certo = false;
					break;
				}
	
				if($first == false){
					$first = true;
					$query.="$nome=?";
				}else{
					$query.=",$nome=?";
				}

				$parametros[] = $value;
			}

			if($certo == true){
				if($single == false){
					$parametros[] = $arr['id'];
					$sql = MySql::conectar()->prepare($query.' WHERE id=?');
					$sql->execute($parametros);
				}else{
					$sql = MySql::conectar()->prepare($query);
					$sql->execute($parametros);
				}
			}
			return $certo;
		}

		//Pega todos os registros da tabela e faz a páginação
		public static function selectAll($tabela,$start = null,$end = null){
			if($start == null && $end == null){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC");
				$sql->execute();
			}else{
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` ORDER BY order_id ASC LIMIT $start,$end");
			}
			$sql->execute();
			return $sql->fetchAll();
		}

		//Deletar registro do banco de dados
		public static function deletar($tabela,$id=false){
			if($id == false){
				$sql = Mysql::conectar()->prepare("DELETE FROM `$tabela`");
			}else{
				$sql = Mysql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
			}
			$sql->execute();
		}

		//Função de redirecionamento
		public static function redirect($url){
			echo  '<script>location.href="'.$url.'"</script>';
			die();
		}

		//Selecionar registro especifico
		public static function select($table,$query = '',$arr = ''){
			if($query != false){
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
				$sql->execute($arr);
			}else{
				$sql = Mysql::conectar()->prepare("SELECT * FROM `$table`");
				$sql->execute();
			}
			return $sql->fetch();
		}

		//Faz a ordenação
		public static function orderItem($tabela,$orderType,$idItem){
			
			if($orderType == 'up'){
				$infoItemAtual = Painel::select($tabela,'id=?',array($idItem));
				$order_id = $infoItemAtual['order_id'];
				$itemBefore = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id < $order_id ORDER BY order_id DESC LIMIT 1");
				$itemBefore->execute();
				if($itemBefore->rowCount() == 0)
					return;
				$itemBefore = $itemBefore->fetch();
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
			}elseif ($orderType == 'down') {
				$infoItemAtual = Painel::select($tabela,'id=?',array($idItem));
				$order_id = $infoItemAtual['order_id'];
				$itemBefore = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE order_id > $order_id ORDER BY order_id ASC LIMIT 1");
				$itemBefore->execute();
				if($itemBefore->rowCount() == 0)
					return;
				$itemBefore = $itemBefore->fetch();
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$itemBefore['id'],'order_id'=>$infoItemAtual['order_id']));
				Painel::update(array('nome_tabela'=>$tabela,'id'=>$infoItemAtual['id'],'order_id'=>$itemBefore['order_id']));
			}
		}
	}
?>