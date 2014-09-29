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

		public static function getQuantidades($strNomeSelect = 'quantidade', $classe = '', $quantidade = 10, $default = '') {
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >
			';
			for($i = 0; $i <= $quantidade; $i++) {
				$strCombo .= '<option value="'.$i.'" ';
				if($default == $i) 
					$strCombo .= ' selected ';
				$strCombo .= '> '.$i.' </option>';
			}
			$strCombo .= '</select>';
			return $strCombo;
		}

		public static function getTipoImovel($strNomeSelect = 'tipoimovel', $classe = '', $default = '') {
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >
					<option value="1" '.($default == 1 ? 'selected' : ' ') .'>Casa</option>
					<option value="2" '.($default == 2 ? 'selected' : ' ') .'>Sobrado</option>
					<option value="3" '.($default == 3 ? 'selected' : ' ') .'>Terreno</option>
					<option value="4" '.($default == 4 ? 'selected' : ' ') .'>Condominio</option>
				</select>
			';
			return $strCombo;
		}

		public static function getTipoNegocio($strNomeSelect = 'tiponegocio', $classe = '', $default = '') {
			$strCombo = '
				<select name="'.$strNomeSelect.'" '.$classe.' >
					<option value="1" '.($default == 1 ? 'selected' : ' ') .'>Venda</option>
					<option value="2" '.($default == 2 ? 'selected' : ' ') .'>Aluguel</option>
					<option value="3" '.($default == 3 ? 'selected' : ' ') .'>Temporada</option>
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

		//Retorna estados
		public static function getEstados($strNomeSelect = 'estados', $classe = '', $obj) {
			$bool = $obj->getEstados();
			$obj->__destruct();
			$select = '<select name="'.$strNomeSelect.'" '.$classe.'>';
			if($bool != false ) {
				$select .= '<option value="0">Selecione</option>';
				foreach ($bool as $array) {
					$select .= '<option value="'.$array['COD_ESTADO'].'">'.utf8_encode($array['NM_ESTADO']).' </option>';
				}
				$select .= "</select>";
				return $select;
			}
			else {
				$select .= '<option value="0">Nenhum estado encontrado</option>';
				$select .= "</select>";
				return $select;
			}

		}

		//Retorna cidades
		public static function getCidades($strNomeSelect = 'cidades', $classe = '', $estado = 2, $obj) {
			$obj->setEstado($estado);
			$bool = $obj->getCidades();
			$obj->__destruct();
			$select = '<select id="cidadese" name="'.$strNomeSelect.'" '.$classe.'>';
			if($bool != false) {
				$select .= '<option value="0" >Selecione</option>';
				foreach ($bool as $array) {
					$select .= '<option value="'.$array['COD_CIDADE'].'">'.utf8_encode($array['NOM_CIDADE']).' </option>';
				}
				$select .= "</select>";
				return $select;
			}
			else {
				$select .= '<option value="0">Selecione um estado</option>';
				$select .= "</select>";
				return $select;
			}
		}

		//Retorna bairro
		public static function getBairros($strNomeSelect = 'bairro', $classe = '', $cidade = 2) {
			$bairro = new Bairros();
			$bairro->setCidade($cidade);
			$bool = $bairro->getBairros();
			$select = '<select name="'.$strNomeSelect.'" '.$classe.'>';
			if($bool != false) {
				foreach ($bool as $array) {
					$select .= '<option value="'.$array['COD_BAIRRO'].'">'.utf8_encode($array['NM_BAIRRO']).' </option>';
				}
				$select .= "</select>";
				return $select;
			}
			else {
				$select .= '<option value="0">Selecione uma cidade</option>';
				$select .= "</select>";
				return $select;
			}
		}
	}