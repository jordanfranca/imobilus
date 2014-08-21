<?php
	class Zip {
		private $strCaminho;
		private $strArquivo;
		
		public function getStrCaminho() {
			return $this->strCaminho;
		}
		public function setStrCaminho($strCaminho) {
			$this->strCaminho = $strCaminho;
		}
		public function getStrArquivo() {
			return $this->strArquivo;
		}
		public function setStrArquivo($strArquivo) {
			$this->strArquivo = $strArquivo;
		}
	
		public function descompactarSite() {
			$objArquivo = new ZipArchive();
			$objResult = $objArquivo->open($this->strArquivo);
			if($objResult) {
				$objArquivo->extractTo($this->strCaminho);
				$objArquivo->close();
				return true;
			}
			else 
				return false;
		}
		
	}