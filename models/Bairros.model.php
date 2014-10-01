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

		public function getBairro() {
			$objConexao = Bairros::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												  COD_BAIRRO,
												  COD_CIDADE,
												  NM_BAIRRO
												  FROM
												  tb_bairro
												  WHERE 
												  COD_BAIRRO = :codigo
			");
			$objConsulta->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setNome($arrResult['NM_BAIRRO']);
					self::setCidade($arrResult['COD_CIDADE']);
				}
				return true;
			}
			else
				return false;
		}

		public function getNome() {
		    return utf8_encode($this->nome);
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
