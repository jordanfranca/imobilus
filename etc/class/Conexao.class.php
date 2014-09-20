<?php
	class Conexao extends CRUD {
		private $strHost = 'localhost';
		private $strUser = "root";
		private $strPass = "";
		public static $objPDO;

		public function instance() {
			if(!self::$objPDO)
				self::$objPDO = $this->conectar();
			return self::$objPDO;
		}
		
		private function conectar($strBanco = "imobilus") {
			try {
				$objDbPDO = new PDO('mysql:host='.$this->strHost.';dbname='.$strBanco, $this->strUser, $this->strPass);
				self::$objPDO = $objDbPDO;
				$objDbPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return self::$objPDO;
			} catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function Create(PDOStatement $objCreate) {
			$objCreate->execute();
		}
		
		public function Read(PDOStatement $objRead) {
			$objRead->execute();
			return $objRead;
		}
		
		public function Update(PDOStatement $objUpdate) {
			return $objUpdate->execute();
		}
		
		public function Delete(PDOStatement $objDelete) {
			$objDelete->execute();
		}
		
		function __destruct( ) {
			self::$objPDO = NULL;
		}
	}