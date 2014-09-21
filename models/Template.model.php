<?php 
	class Template extends Conexao {
		private $codigo;
		private $nome;
		private $versao;
		private $pasta;
		private $miniatura;
		private $ativo;


		public function Adicionar(){
			$objConexao = Template::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_template (   
											 NOM_TEMPLATE,
								             NUM_VERSAO,
								             DSC_PASTA,
								             DSC_MINIATURA,
								             IND_ATIVO) VALUES
										  	(:nome, 
										  	 :versao, 
										  	 :pasta, 
										  	 :miniatura, 
										  	 :ativo)");
			$objInsert->bindValue("nome", self::getNome(), PDO::PARAM_STR);
			$objInsert->bindValue("versao", self::getVersao(), PDO::PARAM_INT);
			$objInsert->bindValue("pasta", self::getPasta(), PDO::PARAM_STR);
			$objInsert->bindValue("miniatura", self::getMiniatura(), PDO::PARAM_STR);
			$objInsert->bindValue("ativo", self::getAtivo(), PDO::PARAM_INT);
			parent::Create($objInsert);
		}

		public function getTemplates() {
			$objConexao = Template::getConexao();
			$objConsulta = $objConexao->prepare("SELECT 
											COD_TEMPLATE, 
										    NOM_TEMPLATE,
								            NUM_VERSAO,
								            DSC_PASTA,
								            DSC_MINIATURA,
								            IND_ATIVO
										  FROM
										  tb_template
			");
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0)
				return $objRetorno;
			else
				return false;
		}

		public function desativarTemplate() {
			$objConexao = Template::getConexao();
			$objConsulta = $objConexao->prepare("UPDATE 
												  tb_template
												 SET IND_ATIVO = 0
												 WHERE COD_TEMPLATE = :codigo;
			");
			$objConsulta->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
		}

		public function ativarTemplate() {
			$objConexao = Template::getConexao();
			$objConsulta = $objConexao->prepare("UPDATE 
												  tb_template
												 SET IND_ATIVO = 1
												 WHERE COD_TEMPLATE = :codigo;
			");
			$objConsulta->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
		}

		public function getTemplateByCodigo() {
			$objConexao = Template::getConexao();
			$objConsulta = $objConexao->prepare("SELECT 
											COD_TEMPLATE, 
										    NOM_TEMPLATE,
								            NUM_VERSAO,
								            DSC_PASTA,
								            DSC_MINIATURA,
								            IND_ATIVO
										  FROM
										  tb_template
										  WHERE COD_TEMPLATE = :codigo
			");
			$objConsulta->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setNome($arrResult['NOM_TEMPLATE']);
					self::setVersao($arrResult['NUM_VERSAO']);
					self::setPasta($arrResult['DSC_PASTA']);
					self::setMiniatura($arrResult['DSC_MINIATURA']);
					self::setAtivo($arrResult['IND_ATIVO']);
				}
				return true;
			}			
			else
				return false;
		}

		public function getAtivo() {
		    return $this->ativo;
		}
		
		public function setAtivo($ativo) {
		    $this->ativo = $ativo;
		
		    return $this;
		}


		public function getMiniatura() {
		    return $this->miniatura;
		}
		
		public function setMiniatura($miniatura) {
		    $this->miniatura = $miniatura;
		
		    return $this;
		}

		public function getPasta() {
		    return $this->pasta;
		}
		
		public function setPasta($pasta) {
		    $this->pasta = $pasta;
		
		    return $this;
		}


		public function getVersao() {
		    return $this->versao;
		}
		
		public function setVersao($versao) {
		    $this->versao = $versao;
		
		    return $this;
		}

		public function getNome() {
		    return $this->nome;
		}
		
		public function setNome($nome) {
		    $this->nome = $nome;
		
		    return $this;
		}

		public function getCodigo() {
		    return $this->codigo;
		}
		
		public function setCodigo($codigo) {
		    $this->codigo = $codigo;
		
		    return $this;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}
	}