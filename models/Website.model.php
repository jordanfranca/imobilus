<?php 
	class Website extends Conexao {
		private $titulo;
		private $subdominio;
		private $email;
		private $telefone;
		private $corprimaria;
		private $corsecundaria;
		private $logo;
		private $template;
		private $ativo;
		private $publicado;
		private $sobre;
		private $usuario;
		private $codigo;

		public function getWebsite() {
			$objConexao = Website::getConexao();
			$objConsulta = $objConexao->prepare("SELECT 
										COD_WEBSITE,
										COD_CADASTRO,
										COD_SUBDOMINIO,
										COD_TEMPLATE,
										DSC_TITULO_WEBSITE,
										DSC_CAMINHO_LOGO,
										DSC_EMAIL_CONTATO,
										DSC_TELEFONES,
										DSC_COR1,
										DSC_COR2,
										IND_ATIVO,
										IND_PUBLICADO,
										DSC_SOBRE
										FROM
										tb_websites
										WHERE COD_CADASTRO = :usuario
			");
			$objConsulta->bindValue("usuario", self::getUsuario(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setCodigo($arrResult['COD_WEBSITE']);
					self::setTitulo($arrResult['DSC_TITULO_WEBSITE']);
					self::setSubdominio($arrResult['COD_SUBDOMINIO']);
					self::setTemplate($arrResult['COD_TEMPLATE']);
					self::setLogo($arrResult['DSC_CAMINHO_LOGO']);
					self::setEmail($arrResult['DSC_EMAIL_CONTATO']);
					self::setTelefone($arrResult['DSC_TELEFONES']);
					self::setCorprimaria($arrResult['DSC_COR1']);
					self::setCorsecundaria($arrResult['DSC_COR2']);
					self::setAtivo($arrResult['IND_ATIVO']);
					self::setPublicado($arrResult['IND_PUBLICADO']);
					self::setSobre($arrResult['DSC_SOBRE']);
				}
				return true;
			}
			else
				return false;
		}

		public function DesativarAtivarWebsite($ativar = 0) {
			$objConexao = Website::getConexao();
			$objConsulta = $objConexao->prepare("UPDATE 
										tb_websites
										SET IND_ATIVO = :ativar
										WHERE COD_CADASTRO = :usuario
			");
			$objConsulta->bindValue("ativar", $ativar, PDO::PARAM_INT);
			$objConsulta->bindValue("usuario", self::getUsuario(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
		}


		public function Adicionar(){
			$objConexao = Website::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_websites (  COD_CADASTRO,
																		  COD_SUBDOMINIO,
																		  COD_TEMPLATE,
																		  DSC_TITULO_WEBSITE,
																		  DSC_CAMINHO_LOGO,
																		  DSC_EMAIL_CONTATO,
																		  DSC_TELEFONES,
																		  DSC_COR1,
																		  DSC_COR2,
																		  IND_ATIVO,
																		  IND_PUBLICADO,
																		  DSC_SOBRE) VALUES
										  (:usuario, :subdominio, :template, :titulo, :logo, :email, :telefone, :corprimaria, 
										  	:corsecundaria, :ativo, :publicado, :sobre)");
			$objInsert->bindValue("usuario", self::getUsuario(), PDO::PARAM_INT);
			$objInsert->bindValue("subdominio", self::getSubdominio(), PDO::PARAM_INT);
			$objInsert->bindValue("template", self::getTemplate(), PDO::PARAM_INT);
			$objInsert->bindValue("titulo", self::getTitulo(), PDO::PARAM_STR);
			$objInsert->bindValue("logo", self::getLogo(), PDO::PARAM_STR);
			$objInsert->bindValue("email", self::getEmail(), PDO::PARAM_STR);
			$objInsert->bindValue("telefone", self::getTelefone(), PDO::PARAM_STR);
			$objInsert->bindValue("corprimaria", self::getCorprimaria(), PDO::PARAM_STR);
			$objInsert->bindValue("corsecundaria", self::getCorsecundaria(), PDO::PARAM_STR);
			$objInsert->bindValue("ativo", self::getAtivo(), PDO::PARAM_INT);
			$objInsert->bindValue("publicado", self::getPublicado(), PDO::PARAM_INT);
			$objInsert->bindValue("sobre", self::getSobre(), PDO::PARAM_STR);
			parent::Create($objInsert);
		}

		public function Atualizar(){
			$objConexao = Website::getConexao();
			$objUpdate = $objConexao->prepare("UPDATE tb_websites  SET
												  COD_TEMPLATE = :template,
												  DSC_TITULO_WEBSITE = :titulo,
												  DSC_EMAIL_CONTATO = :email,
												  DSC_TELEFONES = :telefone,
												  DSC_COR1 = :corprimaria,
												  DSC_COR2 = :corsecundaria,
												  IND_PUBLICADO = :publicado,
												  DSC_SOBRE = :sobre,
												  DSC_CAMINHO_LOGO = :logo

												  WHERE COD_CADASTRO = :usuario
												");
			$objUpdate->bindValue("usuario", self::getUsuario(), PDO::PARAM_INT);
			$objUpdate->bindValue("template", self::getTemplate(), PDO::PARAM_INT);
			$objUpdate->bindValue("titulo", self::getTitulo(), PDO::PARAM_STR);
			$objUpdate->bindValue("logo", self::getLogo(), PDO::PARAM_STR);
			$objUpdate->bindValue("email", self::getEmail(), PDO::PARAM_STR);
			$objUpdate->bindValue("telefone", self::getTelefone(), PDO::PARAM_STR);
			$objUpdate->bindValue("corprimaria", self::getCorprimaria(), PDO::PARAM_STR);
			$objUpdate->bindValue("corsecundaria", self::getCorsecundaria(), PDO::PARAM_STR);
			$objUpdate->bindValue("publicado", self::getPublicado(), PDO::PARAM_INT);
			$objUpdate->bindValue("sobre", self::getSobre(), PDO::PARAM_STR);
			parent::Create($objUpdate);
		}


		public function getCodigo() {
		    return $this->codigo;
		}

		public function setCodigo($codigo) {
		    $this->codigo = $codigo;
		
		    return $this;
		}

		public function getUsuario() {
		    return $this->usuario;
		}
		
		public function setUsuario($usuario) {
		    $this->usuario = $usuario;
		
		    return $this;
		}


		public function getPublicado() {
		    return $this->publicado;
		}
		
		public function setPublicado($publicado) {
		    $this->publicado = $publicado;
		
		    return $this;
		}

		public function getAtivo() {
		    return $this->ativo;
		}
		
		public function setAtivo($ativo) {
		    $this->ativo = $ativo;
		
		    return $this;
		}

		public function getTemplate() {
		    return $this->template;
		}
		
		public function setTemplate($template) {
		    $this->template = $template;
		
		    return $this;
		}

		public function getLogo() {
		    return $this->logo;
		}
		
		public function setLogo($logo) {
		    $this->logo = $logo;
		
		    return $this;
		}

		public function getSobre() {
		    return $this->sobre;
		}
		
		public function setSobre($sobre) {
		    $this->sobre = $sobre;
		
		    return $this;
		}


		public function getCorsecundaria() {
		    return $this->corsecundaria;
		}
		

		public function setCorsecundaria($corsecundaria) {
		    $this->corsecundaria = $corsecundaria;
		
		    return $this;
		}

		public function getCorprimaria() {
		    return $this->corprimaria;
		}
		
		public function setCorprimaria($corprimaria) {
		    $this->corprimaria = $corprimaria;
		
		    return $this;
		}

		public function getTelefone() {
		    return $this->telefone;
		}
		
		public function setTelefone($telefone) {
		    $this->telefone = $telefone;
		
		    return $this;
		}


		public function getEmail() {
		    return $this->email;
		}
		
		public function setEmail($email) {
		    $this->email = $email;
		
		    return $this;
		}

		public function getSubdominio() {
		    return $this->subdominio;
		}
		
		public function setSubdominio($subdominio) {
		    $this->subdominio = $subdominio;
		
		    return $this;
		}

		public function getTitulo() {
		    return $this->titulo;
		}
		
		public function setTitulo($titulo) {
		    $this->titulo = $titulo;
		
		    return $this;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}
	}