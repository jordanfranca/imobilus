<section class="large-12 medium-12 small-12 left" id="cadastrar-main">
	
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