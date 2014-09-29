<?php 
	class Imovel extends Conexao  {
		private $codigo;
		private $referencia;
		private $quartos;
		private $salas;
		private $banheiros;
		private $dormitorios;
		private $mobilia;
		private $tipo;
		private $negocio;
		private $cidade;
		private $bairro;
		private $preco;
		private $descricao;
		private $foto;
		private $ativo;
		private $website;
		private $url;

		public function Deletar() {
			$objConexao = Imovel::getConexao();
			$objDelete = $objConexao->prepare("DELETE FROM tb_imoveis WHERE COD_IMOVEL = :codigo");
			$objDelete->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			parent::Delete($objDelete);
		}

		public function Inserir() {
			$objConexao = Imovel::getConexao();
			$objInsert = $objConexao->prepare("INSERT INTO tb_imoveis (
												  COD_BAIRRO,
												  COD_WEBSITE,
												  COD_REFERENCIA,
												  IND_ATIVO,
												  DSC_URL_AMIGAVEL,
												  DSC_IMOVEL,
												  NUM_VALOR,
												  QT_QUARTOS,
												  QT_SALAS,
												  QT_BANHEIROS,
												  QT_DORMITORIOS,
												  IND_MOBILIA,
												  IND_TIPO,
												  DSC_FOTO,
												  IND_NEGOCIO) VALUES
										  		  (:bairro, 
										  		   :website,
										  		   :referencia,
										  		   :ativo,
										  		   :url,
										  		   :descricao,
										  		   :preco,
										  		   :quartos,
										  		   :salas,
										  		   :banheiros,
										  		   :dormitorios,
										  		   :mobilia,
										  		   :tipo,
										  		   :foto,
										  		   :negocio)");
			
			$objInsert->bindValue("bairro", self::getBairro(), PDO::PARAM_INT);
			$objInsert->bindValue("website", self::getWebsite(), PDO::PARAM_INT);
			$objInsert->bindValue("referencia", self::getReferencia(), PDO::PARAM_INT);
			$objInsert->bindValue("ativo", self::getAtivo(), PDO::PARAM_INT);
			$objInsert->bindValue("url", self::getUrl(), PDO::PARAM_STR);
			$objInsert->bindValue("descricao", self::getDescricao(), PDO::PARAM_STR);
			$objInsert->bindValue("preco", self::getPreco(), PDO::PARAM_INT);
			$objInsert->bindValue("quartos", self::getQuartos(), PDO::PARAM_INT);
			$objInsert->bindValue("salas", self::getSalas(), PDO::PARAM_INT);
			$objInsert->bindValue("banheiros", self::getBanheiros(), PDO::PARAM_INT);
			$objInsert->bindValue("dormitorios", self::getDormitorios(), PDO::PARAM_INT);
			$objInsert->bindValue("mobilia", self::getMobilia(), PDO::PARAM_INT);
			$objInsert->bindValue("tipo", self::getTipo(), PDO::PARAM_INT);
			$objInsert->bindValue("foto", self::getFoto(), PDO::PARAM_STR);
			$objInsert->bindValue("negocio", self::getNegocio(), PDO::PARAM_INT);
			parent::Create($objInsert);
		}

		public function Atualizar() {
			$objConexao = Imovel::getConexao();
			$objUpdate = $objConexao->prepare("UPDATE tb_imoveis 
												  SET 
												  COD_BAIRRO = :bairro,
												  COD_REFERENCIA = :referencia,
												  IND_ATIVO = :ativo,
												  DSC_URL_AMIGAVEL= :url,
												  DSC_IMOVEL = :descricao,
												  NUM_VALOR = :preco,
												  QT_QUARTOS = :quartos,
												  QT_SALAS = :salas,
												  QT_BANHEIROS = :banheiros,
												  QT_DORMITORIOS = :dormitorios,
												  IND_MOBILIA = :mobilia,
												  IND_TIPO = :tipo,
												  DSC_FOTO = :foto,
												  IND_NEGOCIO = :negocio
										  		  WHERE
										  		  COD_IMOVEL = :codigo
										  		  AND 
										  		  COD_WEBSITE = :website
										  ");
			$objUpdate->bindValue("codigo", self::getCodigo(), PDO::PARAM_INT);
			$objUpdate->bindValue("bairro", self::getBairro(), PDO::PARAM_INT);
			$objUpdate->bindValue("website", self::getWebsite(), PDO::PARAM_STR);
			$objUpdate->bindValue("referencia", self::getReferencia(), PDO::PARAM_INT);
			$objUpdate->bindValue("ativo", self::getAtivo(), PDO::PARAM_INT);
			$objUpdate->bindValue("url", self::getUrl(), PDO::PARAM_STR);
			$objUpdate->bindValue("descricao", self::getDescricao(), PDO::PARAM_STR);
			$objUpdate->bindValue("preco", self::getPreco(), PDO::PARAM_INT);
			$objUpdate->bindValue("quartos", self::getQuartos(), PDO::PARAM_INT);
			$objUpdate->bindValue("salas", self::getSalas(), PDO::PARAM_INT);
			$objUpdate->bindValue("banheiros", self::getBanheiros(), PDO::PARAM_INT);
			$objUpdate->bindValue("dormitorios", self::getDormitorios(), PDO::PARAM_INT);
			$objUpdate->bindValue("mobilia", self::getMobilia(), PDO::PARAM_INT);
			$objUpdate->bindValue("tipo", self::getTipo(), PDO::PARAM_INT);
			$objUpdate->bindValue("foto", self::getFoto(), PDO::PARAM_STR);
			$objUpdate->bindValue("negocio", self::getNegocio(), PDO::PARAM_INT);
			parent::Update($objUpdate);
		}

		public function getImoveis() {
			$objConexao = Imovel::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												  COD_IMOVEL,
												  COD_BAIRRO,
												  COD_WEBSITE,
												  COD_REFERENCIA,
												  IND_ATIVO,
												  DSC_URL_AMIGAVEL,
												  DSC_IMOVEL,
												  NUM_VALOR,
												  QT_QUARTOS,
												  QT_SALAS,
												  QT_BANHEIROS,
												  QT_DORMITORIOS,
												  IND_MOBILIA,
												  IND_TIPO,
												  DSC_FOTO,
												  IND_NEGOCIO
												  FROM
												  tb_imoveis
												  WHERE 
												  COD_WEBSITE = :website
			");
			$objConsulta->bindValue("website", self::getWebsite(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0)
				return $objRetorno;
			else
				return false;
		}

		public function getImoveisID() {
			$objConexao = Imovel::getConexao();
			$objConsulta = $objConexao->prepare("SELECT  
												  COD_IMOVEL,
												  COD_BAIRRO,
												  COD_WEBSITE,
												  COD_REFERENCIA,
												  IND_ATIVO,
												  DSC_URL_AMIGAVEL,
												  DSC_IMOVEL,
												  NUM_VALOR,
												  QT_QUARTOS,
												  QT_SALAS,
												  QT_BANHEIROS,
												  QT_DORMITORIOS,
												  IND_MOBILIA,
												  IND_TIPO,
												  DSC_FOTO,
												  IND_NEGOCIO
												  FROM
												  tb_imoveis
												  WHERE 
												  COD_WEBSITE = :website
												  AND 
												  COD_IMOVEL = :imovel
			");
			$objConsulta->bindValue("website", self::getWebsite(), PDO::PARAM_STR);
			$objConsulta->bindValue("imovel", self::getCodigo(), PDO::PARAM_INT);
			$objRetorno = parent::Read($objConsulta);
			if($objRetorno->rowCount() > 0) {
				foreach ($objRetorno->fetchAll() as $arrResult) {
					self::setBairro($arrResult['COD_BAIRRO']);
					self::setReferencia($arrResult['COD_REFERENCIA']);
					self::setAtivo($arrResult['IND_ATIVO']);
					self::setUrl($arrResult['DSC_URL_AMIGAVEL']);
					self::setDescricao($arrResult['DSC_IMOVEL']);
					self::setPreco($arrResult['NUM_VALOR']);
					self::setQuartos($arrResult['QT_QUARTOS']);
					self::setSalas($arrResult['QT_SALAS']);
					self::setBanheiros($arrResult['QT_BANHEIROS']);
					self::setDormitorios($arrResult['QT_DORMITORIOS']);
					self::setMobilia($arrResult['IND_MOBILIA']);
					self::setTipo($arrResult['IND_TIPO']);
					self::setFoto($arrResult['DSC_FOTO']);
					self::setNegocio($arrResult['IND_NEGOCIO']);
				}
				return true;
			}
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

		public function getDescricao() {
		    return $this->descricao;
		}
		
		public function setDescricao($descricao) {
		    $this->descricao = $descricao;
		
		    return $this;
		}

		public function getPreco() {
		    return $this->preco;
		}
		
		public function setPreco($preco) {
		    $this->preco = $preco;
		
		    return $this;
		}

		public function getBairro() {
		    return $this->bairro;
		}
		
		public function setBairro($bairro) {
		    $this->bairro = $bairro;
		
		    return $this;
		}

		public function getCidade() {
		    return $this->cidade;
		}
		
		public function setCidade($cidade) {
		    $this->cidade = $cidade;
		
		    return $this;
		}

		public function getNegocio() {
		    return $this->negocio;
		}
		
		public function setNegocio($negocio) {
		    $this->negocio = $negocio;
		
		    return $this;
		}

		public function getTipo() {
		    return $this->tipo;
		}
		
		public function setTipo($tipo) {
		    $this->tipo = $tipo;
		
		    return $this;
		}


		public function getMobilia() {
		    return $this->mobilia;
		}
		
		public function setMobilia($mobilia) {
		    $this->mobilia = $mobilia;
		
		    return $this;
		}

		public function getDormitorios() {
		    return $this->dormitorios;
		}
		

		public function setDormitorios($dormitorios) {
		    $this->dormitorios = $dormitorios;
		
		    return $this;
		}

		public function getBanheiros() {
		    return $this->banheiros;
		}
		
		public function setBanheiros($banheiros) {
		    $this->banheiros = $banheiros;
		
		    return $this;
		}


		public function getSalas() {
		    return $this->salas;
		}
		
		public function setSalas($salas) {
		    $this->salas = $salas;
		
		    return $this;
		}

		public function getQuartos() {
		    return $this->quartos;
		}
		
		public function setQuartos($quartos) {
		    $this->quartos = $quartos;
		
		    return $this;
		}

		public function getReferencia() {
		    return $this->referencia;
		}

		public function setReferencia($referencia) {
		    $this->referencia = $referencia;
		
		    return $this;
		}

		public function getCodigo() {
		    return $this->codigo;
		}
		
		public function setCodigo($codigo) {
		    $this->codigo = $codigo;
		
		    return $this;
		}


		public function getAtivo() {
		    return $this->ativo;
		}
		
		public function setAtivo($ativo) {
		    $this->ativo = $ativo;
		
		    return $this;
		}


		public function getWebsite() {
		    return $this->website;
		}
		
		public function setWebsite($website) {
		    $this->website = $website;
		
		    return $this;
		}

		public function getUrl() {
		    return $this->url;
		}
		
		public function setUrl($url) {
		    $this->url = $url;
		
		    return $this;
		}

		private static function getConexao() {
			return Conexao::$objPDO;
		}
	}

