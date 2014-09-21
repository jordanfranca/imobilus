<?php
	class Helpers {
		//Metodos de Criptografia
		public static function sha512 ($valor) {
			$valor = hash('sha512',$valor);
			return $valor;
		}
		
		public static function MD5100x($valor){
			for($i = 0; $i < 100; $i++){
				$valor = md5($valor);
			}
			return $valor;
		}
		
		//Metodos de SQL Inject
		public static function escapeString($valor){
			$valor = mysql_real_escape_string($valor);
			return $valor;
		}
		
		public static function intInject($valor){
			$valor = (int)$valor;
			return $valor;
		}
		
		//Char de HTML
		public static function retiraHTML($valor){
			$valor = strip_tags($valor);
			return $valor;
		}
		
		public static function getIP(){
			$ip = $_SERVER["REMOTE_ADDR"];
			return $ip;
		}
		
		//Metodos de Senha

		/**
		 * Função para gerar senhas aleatórias
		 *
		 * @author    Thiago Belem <contato@thiagobelem.net>
		 *
		 * @param integer $tamanho Tamanho da senha a ser gerada
		 * @param boolean $maiusculas Se terá letras maiúsculas
		 * @param boolean $numeros Se terá números
		 * @param boolean $simbolos Se terá símbolos
		 *
		 * @return string A senha gerada
		 */
		public static function geraSenha($tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false) {
			$lmin = 'abcdefghijklmnopqrstuvwxyz';
			$lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$num = '1234567890';
			$simb = '!@#$%*-';
			$retorno = '';
			$caracteres = '';
			
			$caracteres .= $lmin;
			if ($maiusculas) $caracteres .= $lmai;
			if ($numeros) $caracteres .= $num;
			if ($simbolos) $caracteres .= $simb;
			
			$len = strlen($caracteres);
			for ($n = 1; $n <= $tamanho; $n++) {
				$rand = mt_rand(1, $len);
				$retorno .= $caracteres[$rand-1];
			}
			return $retorno;
		}
		
		public static function getMetodo($objClass, $strMetodo) {
			if(method_exists($objClass, $strMetodo))
				call_user_func(array($objClass, $strMetodo));
			else
				call_user_func(array($objClass, 'error'));
		}

		/* Helper para fotos */
		public static function fotos($foto, $tamanho, $pasta) {
			$permissao = array('image/jpeg', 'image/jpg');
			$fotos = $foto;
			if(in_array($fotos['type'], $permissao)){
			   $name_thumb = md5(uniqid(rand(), true)); 
			   $name_thumb2 = md5(uniqid(rand(), true)); 
			   $esploda = explode('.', $fotos['name']);
			   $zap = end($esploda);
			   $newName = $name_thumb.'_'.$name_thumb2.'.'.$zap;        
			   $teste = self::Redimensionar($fotos['tmp_name'], $newName, $tamanho, $pasta);
			   return $newName;
			 }
			 else {
				header("Location: painel.php?erro=true");
			 }
		}		

		public static function Redimensionar($tmp, $name, $largura, $pasta){
                list($width, $height, $type, $attr) = getimagesize($tmp);
                switch($type){
                    case 1: $img = imagecreatefromgif($tmp);break;
                    case 2: $img = imagecreatefromjpeg($tmp);break;
                    case 3: $img = imagecreatefrompng($tmp);break;
                    default:header("Location: painel.php?erro=true");
                }
                $altura = ($largura * $height)/$width;
                $nova = imagecreatetruecolor($largura, $altura);
				switch($type){
					case 3:
						imagesavealpha($nova, true);

						$trans_colour = imagecolorallocatealpha($nova, 0, 0, 0, 127);
						imagefill($nova, 0, 0, $trans_colour);
					   
						$red = imagecolorallocate($nova, 255, 0, 0);
						imagefilledellipse($nova, 400, 300, 400, 300, $red);
					break;	
				}
				
                imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $width, $height);
                switch($type){
                    case 1: imagegif($nova, "$pasta/$name");break;
                    case 2: imagejpeg($nova, "$pasta/$name");break;
                    case 3: imagepng($nova, "$pasta/$name");break;
                    default:header("Location: painel.php?erro=true");
                }
                imagedestroy($img);
                imagedestroy($nova);
    	}

		public static function removeAcentos($string, $slug = false) {
			$string = strtolower($string);

			// Código ASCII das vogais
			$ascii['a'] = range(224, 230);
			$ascii['e'] = range(232, 235);
			$ascii['i'] = range(236, 239);
			$ascii['o'] = array_merge(range(242, 246), array(240, 248));
			$ascii['u'] = range(249, 252);

			// Código ASCII dos outros caracteres
			$ascii['b'] = array(223);
			$ascii['c'] = array(231);
			$ascii['d'] = array(208);
			$ascii['n'] = array(241);
			$ascii['y'] = array(253, 255);

			foreach ($ascii as $key=>$item) {
				$acentos = '';
				foreach ($item AS $codigo) $acentos .= chr($codigo);
				$troca[$key] = '/['.$acentos.']/i';
			}

			$string = preg_replace(array_values($troca), array_keys($troca), $string);

			// Slug?
			if ($slug) {
				// Troca tudo que não for letra ou número por um caractere ($slug)
				$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
				// Tira os caracteres ($slug) repetidos
				$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
				$string = trim($string, $slug);
			}



			return str_replace(" ", "", trim($string));
		}

		public static function recursiveRemoveDirectory($path) {   
	   		$dir = new RecursiveDirectoryIterator($path);
			   foreach(new RecursiveIteratorIterator($dir) as $file)
			   {
				   unlink($file);
			   }

			   //Remove all subdirectories
			   foreach($dir as $subDir)
			   {	
				//If a subdirectory can't be removed, it's because it has subdirectories, so recursiveRemoveDirectory is called again passing the subdirectory as path
				if(!@rmdir($subDir)) //@ suppress the warning message
					{
					   self::recursiveRemoveDirectory($subDir);
					}
			}
  		 }
	}