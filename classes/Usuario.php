<?php

	class Usuario{

		public function atualizarUsuario($nome,$senha){
			$sql = Mysql::conectar()->prepare("UPDATE `tb_admin.usuarios` SET nome = ?, password = ? WHERE user = ?");
			if($sql->execute(array($nome, $senha, $_SESSION['user']))){
				return true;
			}else{
				return false;
			}

		}

		public static function userExists($user){
			$sql = MySql::conectar()->prepare("SELECT `id` FROM `tb_admin.usuarios` WHERE user=? ");
			$sql->execute(array($user));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

		public static function funciExists($nfunci){
			$sql = MySql::conectar()->prepare("SELECT `id` FROM `cadastro_de_funcion__rios` WHERE n_funci=? ");
			$sql->execute(array($nfunci));
			if($sql->rowCount() == 1)
				return true;
			else
				return false;
		}

		public static function cadastrarUsuario($user,$senha,$nome,$ncliente,$cargo){
			$sql = MySql::conectar()->prepare("INSERT INTO `tb_admin.usuarios` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($user,$senha,$nome,$ncliente,$cargo));
		}

		public static function cadastrarCliente($cnpj,$dataabertura,$nomeempresarial,$nomefantasia,$cdaep,$logradouro,$numero,$complemento,$cep,$bairrodistrito,$municipio,$uf,$email,$telefone,$telefone2,$ncliente){
			$sql = MySql::conectar()->prepare("INSERT INTO `cadastro_de_empresas` VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,null)");
			$sql->execute(array($cnpj,$dataabertura,$nomeempresarial,$nomefantasia,$cdaep,$logradouro,$numero,$complemento,$cep,$bairrodistrito,$municipio,$uf,$email,$telefone,$telefone2,$ncliente));
		}

		public static function cadastrarFunci($nfunc,$nomefunc,$nempresa,$nomemp,$cpf,$rg,$oe,$nat,$uf,$datanasc,$end,$cep,$tel,$tel2, $email,$conjuge,$banco,$ag,$conta){
			$sql = MySql::conectar()->prepare("INSERT INTO `cadastro_de_funcion__rios` VALUES (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$sql->execute(array($nfunc,$nomefunc,$nempresa,$nomemp,$cpf,$rg,$oe,$nat,$uf,$datanasc,$end,$cep,$tel,$tel2, $email,$conjuge,$banco,$ag,$conta));
		}

		public function atualizarCliente($cnpj,$dataabertura,$nomeempresarial,$nomefantasia,$cdaep,$logradouro,$numero,$complemento,$cep,$bairrodistrito,$municipio,$uf,$email,$telefone,$telefone2,$ncliente){
			$sql = Mysql::conectar()->prepare("UPDATE `cadastro_de_empresas` SET CNPJ = ?, DatadeAbertura = ?, NomeEmpresarial = ?, NomedeFantasia = ?, CDAEP = ?, Logradouro = ?, Numero = ?, Complemento = ?, CEP = ?, BairroDistrito = ?, Municipio = ?, UF = ?, EnderecoEletronico = ?, Telefone = ?, Telefone2 = ?, n_cliente = ? WHERE CNPJ = ? ");
			if($sql->execute(array($cnpj,$dataabertura,$nomeempresarial,$nomefantasia,$cdaep,$logradouro,$numero,$complemento,$cep,$bairrodistrito,$municipio,$uf,$email,$telefone,$telefone2,$ncliente, $_SESSION['cnpj']))){
				return true;
			}else{
				return false;
			}

		}

		public function atualizarFunci($nfunc,$nomefunc,$nempresa,$nomemp,$cpf,$rg,$oe,$nat,$uf,$datanasc,$end,$cep,$tel,$tel2, $email,$conjuge,$banco,$ag,$conta,$nfunc1){
			$sql = Mysql::conectar()->prepare("UPDATE `cadastro_de_funcion__rios` SET n_funci = ?, nomecomp = ?, empresa = ?, nempresa = ?, cpf = ?, rg = ?, orgaoemissor = ?, naturalidade = ?, uf = ?, data_de_nasc = ?, endereco = ?, cep = ?, telefone = ?, telefone2 = ?, email = ?, conjuge = ?, banco = ?, agencia = ?, conta = ? WHERE n_funci = ? ");
			if($sql->execute(array($nfunc,$nomefunc,$nempresa,$nomemp,$cpf,$rg,$oe,$nat,$uf,$datanasc,$end,$cep,$tel,$tel2, $email,$conjuge,$banco,$ag,$conta,$nfunc1))){
				return true;
			}else{
				return false;
			}

		}

}

