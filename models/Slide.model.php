<?php 
	class Slide extends Conexao  {
		private $intCodigo;
		private $strCaminho;
		private $intCodigoWebsite;


		public function Inserir() {
			$objConexao = Slide::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_slide (COD_WEBSITE,
										  DSC_CAMINHO) VALUES
										  (:website, :caminho)");
			
			$objInsert->bindValue("website", self::getWebsite(), PDO::PARAM_INT);
			$objInsert->bindValue("caminho", self::getCaminho(), PDO::PARAM_STR);
			parent::Create($objInsert);
		}

		public function Deletar() {
			$objConexao = Slide::getConexao();
			$objDelete = $objConexao->prepare("DELETE FROM tb_slide WHERE COD_SLIDE = :codigo");
			$objDelete->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			parent::Delete($objDelete);
		}

		public function getSlides($intWebsite) {
			$objConexao = Categoria::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
										   DSC_CAMINHO,
										   COD_SLIDE
										  FROM
										  tb_slide
										  WHERE 
										  COD_WEBSITE = :website
			");
			$objConsulta->bindValue("website", $intWebsite, PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				return $objRetorno;
			}
			else
				return false;
		}


		public function getCaminho() {
		    return $this->intCaminho;
		}
		
		public function setCaminho($Caminho) {
		    $this->intCaminho = $Caminho;
		
		    return $this;
		}

		public function getCodigo() {
		    return $this->intCodigo;
		}
		
		public function setCodigo($Codigo) {
		    $this->intCodigo = $Codigo;
		    return $this;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}
	}

