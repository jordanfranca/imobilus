<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extremes - Digital Print</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />

</head>

<body>
	<?php require("includes/header.php");?>
	<div class="alinha-centro">
		<div id="menu">
			<?php require("includes/menu.php"); ?>
		</div>
		<div id="conteudo">
			<div class="linha-fina">
				Homepage > Administração
			</div>
			<div id="base-conteudo-pgs">
				<div class="title">
					Administração
				</div>
				<div class="alinha-contato">
					<form method="POST" action="login.php">
						<div class="base-form">
							<div class="esquerda-form">
								<div class="txt-input-contato">
									Login:
								</div>
								<div class="form-input">
									<input type="text"  class="formulario-contato" name="login" />
								</div>
							</div>
							<div class="direita-form">
								<div class="txt-input-contato">
									Senha:
								</div>
								<div class="form-input">
									<input type="password"  class="formulario-contato" name="senha" />
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="input-enviar">
							<input type="submit" value="Logar" />
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php 
		require("includes/footer.php");
	?>
</body>
</html>