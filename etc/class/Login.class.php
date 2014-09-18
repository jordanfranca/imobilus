<?php
class Login {
	// DEFININDO VARIÁVEIS
	private $SenhaUsuario, $tabela, $campoLogin, $campoSenha;
	public $LoginUsuario, $msgErro;
	
	// DEFINIR AS INFORMAÇÕES DA CLASSE
	function Login($tabela = "tb_cadastros", $campoLogin = "DSC_EMAIL", $campoSenha = "DSC_SENHA", $msgErro = "Login ou senha inválido") {
		$this->tabela = $tabela;
		$this->campoLogin = $campoLogin;
		$this->campoSenha = $campoSenha;
		$this->msgErro = $msgErro;
	}
	
	// FAZENDO LOGIN DO USUARIO
	function logar($login,$senha,$redireciona = false) {
		// Informações do formulário
		$this->SenhaUsuario = mysql_real_escape_string(addslashes($senha));
		$this->LoginUsuario = mysql_real_escape_string(addslashes($login));

		// Verifica se o usuário existe
		$consulta = mysql_query("SELECT ".$this->campoLogin.",".$this->campoSenha.", COD_CADASTRO, NOM_USUARIO, IND_ATIVO FROM ".$this->tabela." WHERE ".$this->campoLogin." = '".$this->LoginUsuario."' AND IND_CONFIRMADO = 1 LIMIT 0,1");
		$campos = mysql_num_rows($consulta);
		$array = mysql_fetch_array($consulta);
		// Se o usuário existir
		if($campos != 0):
			// Se a senha estiver incorreta
			if($this->SenhaUsuario != @mysql_result($consulta,0,$this->campoSenha)):
				return $this->msgErro;
			// Se a senha estiver correta
			else:
				// Coloca as informações em sessões
				session_start();
				$_SESSION['codigo'] = $array['COD_CADASTRO'];
				$_SESSION['nome'] = $array['NOM_USUARIO'];
				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				//Reativar
				if($array['IND_ATIVO'] == 0)
					mysql_query("UPDATE $this->tabela SET IND_ATIVO = 1	 WHERE $this->campoLogin = '$login'") or die(mysql_error());

				// Se for necessário redirecionar
				if ($redireciona):
					header("Location: ".$redireciona."");
				endif;
			endif;
		// Se o usuário não existir
		else:
			return $this->msgErro;
		endif;
	}
	
	// VERIFICA SE O USUÁRIO ESTÁ LOGADO
	function verificar($redireciona = false) {
		session_start();
		// Se estiver logado
		if(isset($_SESSION['login']) and isset($_SESSION['senha'])):
			global $LoginUsuario;
			$LoginUsuario = $_SESSION["login"];
			return true;
		// Se não estiver logado
		else:
			// Se for necessário redirecionar
			if ($redireciona):
				header("Location: ".$redireciona."");
			endif;
			return false;
			exit;
		endif;
	}
	
	// LOGOUT
	function logout($redireciona = false) {
		session_start();
		// Limpa a Sessão
		$_SESSION = array(); 			 
		// Destroi a Sessão
		session_destroy();
		// Modifica o ID da Sessão
		session_regenerate_id();
		// Se for necessário redirecionar
		if ($redireciona):
			header("Location: ".$redireciona."");
			exit;
		endif;
	}
}
?>