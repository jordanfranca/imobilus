<?php
	/*
	 Model da classe para criação de subdominios
	@autor: Jord� Fran�a
	*/
	class Subdominio {
		
		private $strIp = "";
		private $strPass = "";
		private $strAccMaster = "";
		private $strHost = "";
		private $strCaminho = "";
		
		public function gerarSubdominio($strDominio) {
			$objCpanelApi = new xmlapi($this->strIp);
			$objCpanelApi->password_auth($this->strAccMaster, $this->strPass);
			$objCpanelApi->set_debug(1);
			
			$objCpanelApi->api1_query('', '', '', array($strDominio,'',0,0,$this->strCaminho.$strDominio));
		}
	}