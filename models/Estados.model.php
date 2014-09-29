<?php 
	class Estados extends Conexao {
		private $codigo;
		private $nome;
		private $sgl;

		public function getEstados() {
			$objConexao = Estados::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												  COD_ESTADO,
												  NM_ESTADO,
												  SGL_ESTADO
												  FROM
												  tb_estado
			");
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0)
				return $objRetorno;
			else
				return false;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}


	}
?>
