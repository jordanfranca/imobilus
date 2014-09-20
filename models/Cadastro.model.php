<?php 
	/*
		Model da classe de Cadastro de Usuários do Site
		@autor: Jordã França
	*/	
	class Cadastro extends Conexao {
		private $intCodigo;
		private $strSenha;
		private $intCreci;
		private $strEmail;
		private $strNome;
		private $strHash;
		private $boolConfirmacao;
		
		
		public function getIntCodigo() {
			return $this->intCodigo;
		}
		public function setIntCodigo($intCodigo) {
			$this->intCodigo = $intCodigo;
		}

		public function getStrSenha() {
			return $this->strSenha;
		}
		public function setStrSenha($strSenha) {
			$this->strSenha = $strSenha;
		}
		public function getIntCreci() {
			return $this->intCreci;
		}
		public function setIntCreci($intCreci) {
			$this->intCreci = $intCreci;
		}
		public function getStrEmail() {
			return $this->strEmail;
		}
		public function setStrEmail($strEmail) {
			$this->strEmail = $strEmail;
		}
		public function getStrNome() {
			return $this->strNome;
		}
		public function setStrNome($strNome) {
			$this->strNome = $strNome;
		}
		public function getStrHash() {
			return $this->strHash;
		}
		public function setStrHash($strHash) {
			$this->strHash = $strHash;
		}
		public function getBoolConfirmacao() {
			return $this->boolConfirmacao;
		}
		public function setBoolConfirmacao($boolConfirmacao) {
			$this->boolConfirmacao = $boolConfirmacao;
		}
		
		public function Inserir() {
			$objConexao = Cadastro::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_cadastros (
										  DSC_SENHA,
										  NUM_CRECI,
										  DSC_EMAIL,
										  NOM_USUARIO,
										  DSC_HASH) VALUES
										  (:senha , :creci, :email, :nome, :hash)");
			
			$objInsert->bindValue("senha", self::getStrSenha(), PDO::PARAM_STR);
			$objInsert->bindValue("creci", self::getIntCreci(), PDO::PARAM_INT);
			$objInsert->bindValue("email", self::getStrEmail(), PDO::PARAM_STR);
			$objInsert->bindValue("nome", self::getStrNome(), PDO::PARAM_STR);
			$objInsert->bindValue("hash", self::getStrHash(), PDO::PARAM_STR);
			
			parent::Create($objInsert);
			
		}

		public function Atualizar() {
			$objConexao = Cadastro::getConexao();
			$objAtualizar = $objConexao->prepare("UPDATE tb_cadastros
												   SET 
												   NOM_USUARIO = :nome,
												   NUM_CRECI = :creci,
												   DSC_SENHA = :senha
										  		WHERE 
										  		DSC_EMAIL = :email");
			
			$objAtualizar->bindValue("senha", self::getStrSenha(), PDO::PARAM_STR);
			$objAtualizar->bindValue("creci", self::getIntCreci(), PDO::PARAM_INT);
			$objAtualizar->bindValue("email", self::getStrEmail(), PDO::PARAM_STR);
			$objAtualizar->bindValue("nome", self::getStrNome(), PDO::PARAM_STR);
			
			parent::Create($objAtualizar);
			
		}

		public function desativarConta() {
			$objConexao = Cadastro::getConexao();
			$objAtualizar = $objConexao->prepare("UPDATE tb_cadastros
												   SET 
												   IND_ATIVO = 0
										  		WHERE 
										  		DSC_EMAIL = :email");
			
			$objAtualizar->bindValue("email", self::getStrEmail(), PDO::PARAM_STR);	
			parent::Create($objAtualizar);
			
		}
		
		public function getCadastroByEmail() {
			$objConexao = Cadastro::getConexao();
			$objConsulta = $objConexao->prepare("SELECT 
										  DSC_SENHA,
										  NUM_CRECI,
										  DSC_EMAIL,
										  NOM_USUARIO,
										  DSC_HASH
										  FROM
										  tb_cadastros
										  WHERE DSC_EMAIL = :str_email
			");
			$objConsulta->bindValue("str_email", self::getStrEmail(), PDO::PARAM_STR);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setIntCreci($arrResult['NUM_CRECI']);
					self::setStrEmail($arrResult['DSC_EMAIL']);
					self::setStrHash($arrResult['DSC_HASH']);
					self::setStrNome($arrResult['NOM_USUARIO']);
					self::setStrSenha($arrResult['DSC_SENHA']);
				}
				return true;
			}
			else
				return false;
		}
		
		public function getCadastro() {
			$objConexao = Cadastro::getConexao();
			$objConsulta = $objConexao->prepare("SELECT 
										  DSC_SENHA,
										  NUM_CRECI,
										  DSC_EMAIL,
										  NOM_USUARIO,
										  DSC_HASH
										  FROM 
										  tb_cadastros
										  WHERE COD_CADASTRO = :cod_cadastro
			");
			$objConsulta->bindValue("cod_cadastro", $this->getIntCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setIntCreci($arrResult['NUM_CRECI']);
					self::setStrEmail($arrResult['DSC_EMAIL']);
					self::setStrHash($arrResult['DSC_HASH']);
					self::setStrNome($arrResult['NOM_USUARIO']);
					self::setStrSenha($arrResult['DSC_SENHA']);
				}
				return true;
			}
			else 
				return false;
		}
		
		public function confirmaCadastro() {
			$objConexao = Cadastro::getConexao();
			$objUpdate = $objConexao->prepare("UPDATE tb_cadastros SET IND_CONFIRMADO = 1, IND_ATIVO = 1 WHERE DSC_EMAIL = :dsc_email");
			$objUpdate->bindValue("dsc_email", $this->getStrEmail(), PDO::PARAM_STR);
			$objRetorno = parent::Update($objUpdate);
			return $objRetorno;
		}
		
		private static function getConexao() {
			return Conexao::$objPDO;
		}

	}
?>