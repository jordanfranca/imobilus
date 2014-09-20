<?php
	/*
	 Model da classe para criação de subdominios
	@autor: Jord� Fran�a
	*/
	class Subdominio {
		
		private $strIp = "50.87.5.230";
		private $strPass = "Jordã123";
		private $strAccMaster = "devisual";
		private $strHost = "devisualhost.com";
		private $strCaminho = "/public_html/clientes/";
		
		public function gerarSubdominio($strDominio) {
			$objCpanelApi = new xmlapi($this->strIp);
			$objCpanelApi->password_auth($this->strAccMaster, $this->strPass);
			$objCpanelApi->set_debug(1);
			
			$objCpanelApi->api1_query('imobilus', 'SubDomain', 'addsubdomain', array($strDominio,'imobilus.com.br',0,0,$this->strCaminho.$strDominio));
		}
	}