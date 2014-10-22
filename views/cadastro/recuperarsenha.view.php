<section class="large-12 medium-12 small-12 left" id="cadastrar-main">
	<?php 
		if(isset($_GET['confirm']) && isset($_GET['msg'])) {
        	if($_GET['confirm'] == '1')
              echo HTML::mesageDefault(base64_decode($_GET['msg']), 'sucess');
            if($_GET['confirm'] == '2')
              echo HTML::mesageDefault(base64_decode($_GET['msg']), 'alert');
        }
	?>
	<div class="row">
		<div class="large-10 large-centered medium-12 medium-uncentered small-12 small-uncentered columns text-center" id="cadastro">
			<h3>Preencha o formulário para recuperar sua senha!</h3>
			<form action="/funcoes.php?ac=recuperarsenha" method="POST">
				<input class="text-field"  type="text" placeholder="E-mail" name="email" required /><br />
				<input class="button-form" type="submit" value="Enviar" onclick="return validarForm(0);" />
				<input class="button-form" type="reset" value="Limpar" />	
			</form>
		</div>
	</div>
</section>

