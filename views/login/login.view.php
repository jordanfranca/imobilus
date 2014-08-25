<section class="large-12 medium-12 small-12 left" id="cadastrar-main">
	<?php 
	switch ($intConfirma) {
		case 1:
			echo HTML::mesageDefault('Cadastro confirmado com sucesso!', 'sucess');
			break;
		case 2:
			echo HTML::mesageDefault('Ocorreu algum erro, por favor tente novamente!', 'alert');
			break;
		case 3:
			echo HTML::mesageDefault('Cadastro não encontrado!', 'alert');
			break;
	}
	?>
	<div class="row">
		<div class="large-10 large-centered medium-12 medium-uncentered small-12 small-uncentered columns text-center" id="cadastro">
			<h3>Acesse sua conta!</h3>
			<form action="/home/add" method="POST">
				<input class="text-field" required type="text" placeholder="Login" name="login" /><br />
				<input class="text-field" required type="password" placeholder="Senha" name="senha" /><br />
				<a href="#" class="forgot-password left">Esqueceu sua senha?</a>
				<input class="button-form" type="reset" value="Limpar" />
				<input class="button-form" type="submit" value="Enviar" />
			</form>
			<span>Ainda não é usuário?</span><a class="forgot-password" href="/cadastro">Criar conta</a>
		</div>
	</div>
</section>