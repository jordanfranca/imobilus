<?php
	class HTML {
		//Retorna combo de option true ou false
		public static function optionTrueFalse ($strNomeSelect = 'sim-nao', $classe = '', $default = ''){
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >		
			';
			if($default != '') {
				if($default == 1) {
					$strCombo .= '
					<option value="1" selected>Sim</option>
					<option value="0">Não</option>
					';
				}
				else {
					$strCombo .= '
					<option value="1">Sim</option>
					<option value="0" selected>Não</option>
				';
				}
			}
			else {
				$strCombo .= '
					<option value="1">Sim</option>
					<option value="0">Não</option>
				';
			}
			$strCombo .= '</select>';
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

		public static function getQuantidades($strNomeSelect = 'quantidade', $classe = '', $quantidade = 10) {
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >
			';
			for($i = 0; $i <= $quantidade; $i++) {
				$strCombo .= '<option value="'.$i.'"> '.$i.' </option>';
			}
			$strCombo .= '</select>';
			return $strCombo;
		}

		public static function getTipoImovel($strNomeSelect = 'tipoimovel', $classe = '') {
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >
					<option value="1">Casa</option>
					<option value="2">Sobrado</option>
					<option value="3">Terreno</option>
					<option value="4">Condominio</option>
				</select>
			';
			return $strCombo;
		}

		public static function getTipoNegocio($strNomeSelect = 'tiponegocio', $classe = '') {
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >
					<option value="1">Venda</option>
					<option value="2">Alugel</option>
					<option value="3">Temporada</option>
				</select>
			';
			return $strCombo;
		}

		//Retorna Mensagens padrões
		//Tipos de mensagem: 'alert-sucess, alert-danger, alert-warning, alert-info'
		public static function mesageDefaultAdm($strMesage, $strType) {
			return $strHtml = '
				<p class="alert '.$strType.'">
				  '.$strMesage.'
				</p>		
			';
		}
	}