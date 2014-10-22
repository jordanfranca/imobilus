<section class="large-12 medium-12 small-12 left" id="cadastrar-main">
	<?php 
		if(isset($_GET['confirm']) && isset($_GET['msg'])) {
        	if($_GET['confirm'] == '1')
              echo HTML::mesageDefault(base64_decode($_GET['msg']), 'sucess');
            if($_GET['confirm'] == '2')
              echo HTML::mesageDefault(base64_decode($_GET['msg']), 'alert');
        }

        if(isset($confirm) && isset($msg)) {
        	if($confirm == '1')
              echo HTML::mesageDefault(base64_decode($msg), 'sucess');
            if($confirm == '2')
              echo HTML::mesageDefault(base64_decode($msg), 'alert');
        }
	?>
	<div class="row">
		<div class="large-10 large-centered medium-12 medium-uncentered small-12 small-uncentered columns text-center" id="cadastro">
			<h3>Acesse sua conta!</h3>
			<form action="/adm/login.php" method="POST">
				<input class="text-field" required type="text" placeholder="E-mail" name="login" /><br />
				<input class="text-field" required type="password" placeholder="Senha" name="senha" /><br />
				<a href="/cadastro/recuperarsenha" class="forgot-password left">Esqueceu sua senha?</a>
				<input class="button-form" type="reset" value="Limpar" />
				<input class="button-form" type="submit" value="Enviar" onclick="return validarForm(0);" />
			</form>
			<span>Ainda não é usuário?</span><a class="forgot-password" href="/cadastro">Criar conta</a>
		</div>
	</div>
</section>