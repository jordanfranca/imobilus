<?php 
	class SubdominioModel extends Conexao {
		private $codigo;
		private $descricao;


		public function getDescricao() {
		    return $this->descricao;
		}
		
		public function setDescricao($descricao) {
		    $this->descricao = $descricao;
		}

		public function Inserir() {
			$objConexao = SubdominioModel::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_subdominio (DSC_SUBDOMINIO) VALUES
										  (:subdominio)");
			
			$objInsert->bindValue("subdominio", self::getDescricao(), PDO::PARAM_STR);
			parent::Create($objInsert);
		}

		public function getVerificarSubdominio() {
			$objConexao = SubdominioModel::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
										  DSC_SUBDOMINIO, COD_SUBDOMINIO
										  FROM
										  tb_subdominio
										  WHERE 
										  DSC_SUBDOMINIO = :subdominio
			");
			$objConsulta->bindValue("subdominio", self::getDescricao(), PDO::PARAM_STR);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setCodigo($arrResult['COD_SUBDOMINIO']);
					self::setDescricao($arrResult['DSC_SUBDOMINIO']);
				}
				return true;
			}
			else
				return false;
		}

		public function getSubdominio() {
			$objConexao = SubdominioModel::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
										  DSC_SUBDOMINIO, COD_SUBDOMINIO
										  FROM
										  tb_subdominio
										  WHERE 
										  COD_SUBDOMINIO = :codigo
			");
			$objConsulta->bindValue("codigo", self::getCodigo(), PDO::PARAM_STR);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setCodigo($arrResult['COD_SUBDOMINIO']);
					self::setDescricao($arrResult['DSC_SUBDOMINIO']);
				}
				return true;
			}
			else
				return false;
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