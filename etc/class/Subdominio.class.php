<?php
	/*
	 Model da classe para cria��o de subdominios
	@autor: Jord� Fran�a
	*/
	class Subdominio {
		
		private final $strIp = "50.87.5.230";
		private final $strPass = "Jordã123";
		private final $strAccMaster = "devisual";
		private final $strHost = "devisualhost.com";
		private final $strCaminho = "/public_html/clientes/";
		
		public function gerarSubdominio($strDominio){
			$objCpanelApi = new xmlapi();
			$objCpanelApi->password_auth($this->strAccMaster, $this->strPass);
			$objCpanelApi->set_debug(1);
			
			$objCpanelApi->api1_query('imobilus', 'SubDomain', 'addsubdomain', array($strDominio,'imobilus.com.br',0,0,$this->strCaminho.$strDominio));
		}
	}