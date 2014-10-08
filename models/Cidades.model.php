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

		public function getCidade() {
			$objConexao = Cidades::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												 COD_CIDADE,
												  COD_ESTADO,
												  NOM_CIDADE
												  FROM
												  tb_cidades
												  WHERE 
												  COD_CIDADE = :codigo
			");
			$objConsulta->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setNome($arrResult['NOM_CIDADE']);
				}
			}
			else
				return false;
		}

		public function getCidadeTemplate($id) {
			$objConexao = Cidades::getConexao();
			$objConsulta = $objConexao->prepare("SELECT 
												  c.NOM_CIDADE, c.COD_CIDADE 
												FROM
												  tb_cidades c 
												  LEFT JOIN tb_bairro b 
												    ON (b.COD_CIDADE = c.COD_CIDADE) 
												  LEFT JOIN tb_imoveis i 
												    ON (i.COD_BAIRRO = b.COD_BAIRRO)
												  WHERE i.COD_WEBSITE = :website
												  GROUP BY c.COD_CIDADE
			");
			$objConsulta->bindValue("website", $id, PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				return $objRetorno;
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
