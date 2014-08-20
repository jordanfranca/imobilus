<?php
	class Email {
		
		private $objPHPMailer;
		public static $strHost = "mail.imobilus.com.br";
		public static $intPorta = 465;
		
		public function __construct() {
			$this->objPHPMailer = new Phpmailer();
		}
		
		public function confirmaCadastro($strEmail, $strNome, $hash) {
			$strDe = "jordan1992_16@hotmail.com";
			$strAssunto = "Confirmação de Cadastro - Imobilus";
			
			$strMensagem = "
				Olá $strNome, <br />
				
				Você acabou de se cadastrar no sistema imobilus, para efetivar o cadastro, 
				acesse o link abaixo:<br />
				
				<a href='http://www.imobilus.com.br/cadastro/confirmacao/&cod=$hash&email=$strEmail'>http://www.imobilus.com.br/cadastro/confirmacao/&cod=$hash&email=$strEmail</a><br />
				
				Obrigado!
			";
			self::enviarEmail($strDe, utf8_decode($strAssunto), $strNome, utf8_decode($strMensagem), $strEmail);	
		}
		
		public function enviarEmail($strDe, $strAssunto, $strNome, $strMensagem, $strPara) {
			$objMailer = $this->objPHPMailer;
			$objMailer->Host = self::$strHost;
			
			$this->objPHPMailer->From = $strDe;
			$this->objPHPMailer->Port = self::$intPorta;
			$this->objPHPMailer->Subject = $strAssunto;
			$this->objPHPMailer->AddAddress($strPara, $strNome);
			
			$this->objPHPMailer->FromName = utf8_decode("Imobilus - Sistemas Imobiliários");
			$this->objPHPMailer->IsHTML(true);
			$this->objPHPMailer->Body = $strMensagem;
			$this->objPHPMailer->Send();
			
			echo 'E-mail enviado';
		}
		
		
	}