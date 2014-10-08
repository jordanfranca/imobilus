<?php
class Login {
	// DEFININDO VARIÁVEIS
	private $SenhaUsuario, $tabela, $campoLogin, $campoSenha;
	public $LoginUsuario, $msgErro;
	
	// DEFINIR AS INFORMAÇÕES DA CLASSE
	function Login($tabela = "tb_adm", $campoLogin = "dsc_usuario", $campoSenha = "dsc_senha", $msgErro = "Login ou senha inválido") {
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
		$consulta = mysql_query("SELECT ".$this->campoLogin.",".$this->campoSenha." FROM ".$this->tabela." WHERE ".$this->campoLogin." = '".$this->LoginUsuario."'");
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
				$_SESSION['loginadm'] = $login;
				$_SESSION['senhaadm'] = $senha;
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
		if(isset($_SESSION['loginadm']) and isset($_SESSION['senhaadm'])):
			global $LoginUsuario;
			$LoginUsuario = $_SESSION["loginadm"];
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