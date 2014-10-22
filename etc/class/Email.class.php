<?php
	class Email {
		
		private $objPHPMailer;
		public static $strHost = "mail.imobilus.com.br";
		public static $intPorta = 465;
		
		public function __construct() {
			$this->objPHPMailer = new Phpmailer();
		}
		
		public function confirmaCadastro($strEmail, $strNome, $hash) {
			$strDe = "contato@imobilus.com.br";
			$strAssunto = "Confirmação de Cadastro - Imobilus";
			
			$strMensagem = "
				Olá $strNome, <br />
				
				Você acabou de se cadastrar no sistema imobilus, para efetivar o cadastro, 
				acesse o link abaixo:<br />
				
				<a href='http://www.imobilus.com.br/cadastro/confirmacao/&cod=$hash&email=$strEmail'>http://www.imobilus.com.br/cadastro/confirmacao/&cod=$hash&email=$strEmail</a><br />
				
				Obrigado!
				<br />
				-----------------------------------------------------------------------------------------------------------
				<br />
				Equipe Imobilus
			";
			self::enviarEmail($strDe, utf8_decode($strAssunto), $strNome, utf8_decode($strMensagem), $strEmail);	
		}

		public function recuperarSenha($strEmail, $strNome, $hash) {
			$strDe = "contato@imobilus.com.br";
			$strAssunto = "Recuperação de senha - Imobilus";
			
			$strMensagem = "
				Olá, <br />
				
				Você acaba de solicitar sua recuperação de senha, por favor clique no link abaixo e siga as instruções
				acesse o link abaixo:<br />
				
				<a href='http://www.imobilus.com.br/cadastro/recuperarsenhaform/&cod=$hash&email=$strEmail'>http://www.imobilus.com.br/cadastro/recuperarsenhaform/&cod=$hash&email=$strEmail</a><br />
				<br />
				Obrigado!
				<br />
				-----------------------------------------------------------------------------------------------------------
				<br />
				Equipe Imobilus

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
		}
		
		
	}