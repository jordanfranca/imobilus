<?php 
	class Fotos extends Conexao  {
		private $codigo;
		private $imovel;
		private $foto;


		public function Inserir() {
			$objConexao = Fotos::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_foto_imovel (COD_IMOVEL,
										  DSC_CAMINHO_FOTO) VALUES
										  (:imovel, :foto)");
			
			$objInsert->bindValue("foto", self::getFoto(), PDO::PARAM_INT);
			$objInsert->bindValue("imovel", self::getImovel(), PDO::PARAM_STR);
			parent::Create($objInsert);
		}

		public function Deletar() {
			$objConexao = Fotos::getConexao();
			$objDelete = $objConexao->prepare("DELETE FROM tb_foto_imovel WHERE COD_FOTO = :codigo");
			$objDelete->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			parent::Delete($objDelete);
		}

		public function DeletarByImovel() {
			$objConexao = Fotos::getConexao();
			$objDelete = $objConexao->prepare("DELETE FROM tb_foto_imovel WHERE COD_IMOVEL = :imovel");
			$objDelete->bindValue("imovel", self::getImovel(), PDO::PARAM_INT);
			parent::Delete($objDelete);
		}

		public function getFotos() {
			$objConexao = Fotos::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
										   DSC_CAMINHO_FOTO,
										   COD_FOTO
										  FROM
										  tb_foto_imovel
										  WHERE 
										  COD_IMOVEL = :imovel
										  ORDER BY COD_FOTO DESC
			");
			$objConsulta->bindValue("imovel", self::getImovel(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0)
				return $objRetorno;
			else
				return false;
		}


		public function getFoto() {
		    return $this->foto;
		}
		
		public function setFoto($foto) {
		    $this->foto = $foto;
		
		    return $this;
		}


		public function getImovel() {
		    return $this->imovel;
		}
		
		public function setImovel($imovel) {
		    $this->imovel = $imovel;
		
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

