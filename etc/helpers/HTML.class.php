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
	}