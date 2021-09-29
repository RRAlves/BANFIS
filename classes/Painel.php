<?php

class Painel
{
	public static $cargo = [
			'0' => 'Normal',
			'1' => 'Sub Admin',
			'2' => 'Admin'];

	public static $empresa = [
			'0' => NULL,
			'3' => 'EDIFÍCIO CENTRAL',
			'4' => 'DCON'];
			
			
	public static function logado(){
		return isset($_SESSION['login']) ? true : false;
	}

	public static function loggout(){
		session_destroy();
		header('Location: '.INCLUDE_PATH_PAINEL);
	}

	public static function carregarPagina(){
		if(isset($_GET['url'])){
			$url = explode('/', $_GET['url']);
			if(file_exists('pages/'.$url[0].'.php')){
				include('pages/'.$url[0].'.php');
			}else{
				header('Location: '.INCLUDE_PATH_PAINEL);
			}

		}else{
			include('pages/home.php');
		}
	}

	public static function listarProximosVencimentos(){
		$ncliente = $_SESSION['ncliente'];
		$cargo = $_SESSION['cargo'];
		if($cargo >= 2){
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_vencimentos` WHERE status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
		return $sql->fetchAll();
	 	}else{

	 	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_vencimentos` WHERE n_cliente = {$ncliente} && status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
		return $sql->fetchAll(); 

	 }

	}

	public static function dateCompare($element1,$element2){
	 				$datetime1 = strtotime($element1['data_do_venc']);
	 				$datetime2 = strtotime($element2['data_do_venc']);
	 				return $datetime1 - $datetime2;
			 }

	public static function numberCompare($numero1,$numero2){
	 				$num1 = $numero1['id'];
	 				$num2 = $numero2['id'];
	 				return $num1 - $num2;
			 }

	public static function listarBuscaVencimentos($elemento){

		$nc = $elemento;	
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_vencimentos` WHERE n_cliente = '{$nc}' AND  status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
        return $sql->fetchAll();

	}

	public static function selectAll($tabela, $start = null, $end = null){
		if($start == null && $end == null)
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
		else
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start,$end");

       		$sql->execute();

        return $sql->fetchAll();

	}

	public static function selectAllFunc($tabela, $nempresa){
		
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE empresa = ?");
		
       		$sql->execute([$nempresa]);

        	return $sql->fetchAll();

	}

	public static function selectAllFuncionarios($tabela,$dadosfunci){
		
			$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE nomecomp LIKE ? ");
		
       		$sql->execute();

        	return $sql->fetchAll();

	}

	public static function listarBuscaSomaValores($elemento){

		$nc = $elemento;	
		$sql = MySql::conectar()->prepare("SELECT SUM(valor) AS sum FROM `tb_vencimentos` WHERE n_cliente = '{$nc}' AND status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
        return $sql->fetch();

	}




	 public static function listarSomaValores(){
		$ncliente = $_SESSION['ncliente'];
		$cargo = $_SESSION['cargo'];
		if($cargo >= 2){
		$sql = MySql::conectar()->prepare("SELECT SUM(valor) AS sum FROM `tb_vencimentos` WHERE  status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
		return $sql->fetch();
	 	}else{

	 	$sql = MySql::conectar()->prepare("SELECT SUM(valor) AS sum FROM `tb_vencimentos` WHERE n_cliente = {$ncliente} && status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
		return $sql->fetch(); 

	 }
 	
	}

	 public static function listarOperacoes(){
		$ncliente = $_SESSION['ncliente'];
		$cargo = $_SESSION['cargo'];
		if($cargo >= 2){
		$sql = MySql::conectar()->prepare("SELECT * FROM `tb_vencimentos` WHERE status = 'ES' || status = 'EP'");
        $sql->execute();
		return $sql->fetchAll();
	 	}else{

	 	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_vencimentos` WHERE n_cliente = {$ncliente} && status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
		return $sql->fetchAll();
	 }

	}


	 public static function alert($tipo, $mensagem){
	 		if($tipo == 'sucesso'){
	 			echo '<div class="box-alert sucesso"><i class="fa fa-check"></i>'.$mensagem.'</div>';
	 		}else if($tipo == 'erro'){
	 			echo '<div class="box-alert erro"><i class="fa fa-times"></i>'.$mensagem.'</div>';
	 		}
	 	}

	 public static function imagemValida($imagem){
	 	if($imagem['type'] == 'image/jpeg' || $imagem['type'] == 'image/jpg' || $imagem['type'] == 'image/png'){
	 		
	 		$tamanho = intval($imagem['size']/1024);
	 		if ($tamanho < 300) 
	 			return true;
	 		else
	 			return false;
	 		}else{
	 		return false;
	 	}
	 }

	 public static function uploadFile($file){
	 	$formatoArquivo = explode('.',$file['name']);
	 	$imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];
	 	if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome))
	 		return $imagemNome;
	 	else
	 		return false;
	 }

	 public static function deleteFile($file){
	 	@unlink('uploads/'.$file);

	 }
	 public static function deleteDoc($file){
	 	@unlink('uploads/'.$_SESSION['ncliente'].'/'.$file);

	 }

	 public static function vencimentosClientes(){
	 	$user = $_SESSION['ncliente'];
	 	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_vencimentos` WHERE data_do_venc >= CURDATE() && status != 'LQ' && status != 'EX' && status != 'CST'");
        $sql->execute();
	 }

	 public static function uploadDocs($docs){ 
	 	$sql = MySql::conectar
	 	()->prepare("UPDATE `tb_vencimentos` VALUES
	 	(null,null,null,null,null,null,null,null,?)");
	 	$sql->execute(array($docs)); 
	} 

		public static function docValido($doc){

			 $docExt = strtolower(pathinfo(basename($doc['name']), PATHINFO_EXTENSION));

			if($docExt == 'pdf'){
					return true;
			}else{
				return false;
			}
		}

		public static function uploadDoc($ncontrato,$doc,$ncliente){
			
			$numeroContrato = $ncontrato;
			$formatoArquivo = explode('.',$doc['name']);
			$docNome = $numeroContrato.'.'.$formatoArquivo[count($formatoArquivo) - 1];
			$numeroCliente = $ncliente;

			if(@file_exists(BASE_DIR_PAINEL.'/uploads/'.$numeroCliente.$numeroContrato.$formatoArquivo)){

					if(move_uploaded_file($doc['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$numeroCliente.'/'.$docNome)){

					return $docNome;

				}else{

					return false;

				}

				}else{

					@mkdir(BASE_DIR_PAINEL.'/uploads/'.$numeroCliente,0777);

					if(move_uploaded_file($doc['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$numeroCliente.'/'.$docNome)){

					return $docNome;

					}else{

					return false;
			}
		}

	}



		public static function operacaoExists($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento){
			$sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_vencimentos` WHERE n_cliente = ? && NomedeFantasia = ? && valor = ? && data_do_venc = ? && status = ? && data_da_ope = ? && ncontrato = ? && n_documento = ? ");
			$sql->execute(array($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento));
			if($sql->rowCount() == 1){
				return true;
			
			}else{
				return false;
			}
		}

		public static function cadastrarOperacao($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$doc){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_vencimentos` VALUES (null,?,?,?,?,?,?,?,?,?)");
			$sql->execute(array($ncliente,$cliente,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$doc));
		}

		public function atualizarOperacao($ncliente,$nfantasia,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$doc,$id){
			$sql = Mysql::conectar()->prepare("UPDATE `tb_vencimentos` SET n_cliente = ?, NomedeFantasia = ?, valor = ?, data_do_venc = ?, status = ?, data_da_ope = ?, ncontrato = ?, n_documento = ?, docs = ? WHERE id = ?  ");
			if($sql->execute(array($ncliente,$nfantasia,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$doc,$id))){
				return true;
			}else{
				return false;
			}

		}

		public function atualizarOperacaoDoc($ncliente,$nfantasia,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$id){
			$sql = Mysql::conectar()->prepare("UPDATE `tb_vencimentos` SET n_cliente = ?, NomedeFantasia = ?, valor = ?, data_do_venc = ?, status = ?, data_da_ope = ?, ncontrato = ?, n_documento = ? WHERE id = ?  ");
			if($sql->execute(array($ncliente,$nfantasia,$valor,$datavenc,$status,$dataope,$ncontrato,$ndocumento,$id))){
				return true;
			}else{
				return false;
			}

		}

		public static function deletar($tabela,$id=false){
			if($id == false){
				$sql = Mysql::conectar()->prepare("DELETE FROM `$tabela`");
			}else{
				$sql = Mysql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
			}
			$sql->execute();

		}

		public static function select($tabela,$query,$arr){
			$sql = Mysql::conectar()->prepare("SELECT * FROM `$tabela` WHERE $query");
			$sql->execute($arr);
			return $sql->fetch();
		}

		public static function redirect($url){
			echo '<script>location.href="'.$url.'"</script>';	
			die();

		}

		public static function orderItem($tabela, $orderType, $nc){
			if($orderType == 'up'){

				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE n_cliente = $nc AND  status != 'LQ' && status != 'EX' && status != 'CST' ORDER BY data_do_venc ASC ");
        		$sql->execute();

			}
			if($orderType == 'down'){

				$sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` WHERE n_cliente = $nc AND  status != 'LQ' && status != 'EX' && status != 'CST' ORDER BY data_do_venc DESC ");
        		$sql->execute();

			}
		}

}



?>