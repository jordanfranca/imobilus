<?php
	class HTML {
		//Retorna combo de option true ou false
		public static function optionTrueFalse ($strNomeSelect = 'sim-nao'){
			$strCombo = '
				<select name="'.$strNomeSelect.'">
					<option value="1">Sim</option>
					<option value="0">Não</option>
				</select>
			';
			return $strCombo;
		}
		
		//Retorna Mensagens padrões
		//Tipos de mensagem: 'sucess', 'warning', 'info', 'alert', 'secondary'
		public static function mesageDefault($strMesage, $strType) {
			return $strHtml = '
				<div data-alert class="alert-box '.$strType.' radius">
				  '.$strMesage.'
				  <a href="#" class="close">&times;</a>
				</div>		
			';
		}
	}