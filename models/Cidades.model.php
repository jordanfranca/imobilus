<?php 
	class Cidades extends Conexao {
		private $codigo;
		private $nome;
		private $estado;

		public function getCidades() {
			$objConexao = Cidades::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												 COD_CIDADE,
												  COD_ESTADO,
												  NOM_CIDADE
												  FROM
												  tb_cidades
												  WHERE 
												  COD_ESTADO = :estado
			");
			$objConsulta->bindValue("estado", self::getEstado(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0)
				return $objRetorno;
			else
				return false;
		}

		public function getEstado() {
		    return $this->estado;
		}
		
		public function setEstado($estado) {
		    $this->estado = $estado;
		    return $this;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}


	}
?>
