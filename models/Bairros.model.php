<?php 
	class Bairros extends Conexao {
		private $codigo;
		private $nome;
		private $cidade;

		public function getBairros() {
			$objConexao = Bairros::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												  COD_BAIRRO,
												  COD_CIDADE,
												  NM_BAIRRO
												  FROM
												  tb_bairro
												  WHERE 
												  COD_CIDADE = :cidade
			");
			$objConsulta->bindValue("cidade", self::getCidade(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0)
				return $objRetorno;
			else
				return false;
		}


		public function getCidade() {
		    return $this->cidade;
		}
		
		public function setCidade($cidade) {
		    $this->cidade = $cidade;
		
		    return $this;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}


	}
