<?php $pagina = $_SERVER ['PHP_SELF'];?>
<div id="base-busca">
				<form method="GET" action="pesquisar.php">
					<input id="input-buscar" id="pesquisar" onclick="limpaForm('Pesquisar', 'pesquisar')" onblur="limpaForm('Pesquisar', 'pesquisar')" type="text" value="Pesquisar" name="buscar" />
					<input type="submit" id="buscar" value="" />
				</form>
			</div>
			<div class="barra-separatoria"></div>
			<div class="base-menu">
				<div class="txt-link" <?php if($pagina == '/index.php') {  echo 'id="ativo"'; }?>>
					<a href="index.php">HOME</a>
				</div>
				<div class="selecionado">
					<?php if($pagina == '/index.php') { ?>
						<img src="img/menosbtn.png" />
					<?php } else {  ?>
						<img src="img/xbtn.png" />
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<div class="base-menu">
				<div class="txt-link" <?php if($pagina == '/aempresa.php') {  echo 'id="ativo"'; }?> >
					<a href="aempresa.php" >A EMPRESA</a>
				</div>
				<div class="selecionado">
					<?php if($pagina == '/aempresa.php') { ?>
						<img src="img/menosbtn.png" />
					<?php } else {  ?>
						<img src="img/xbtn.png" />
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<div class="base-menu">
				<div class="txt-link" <?php if($pagina == '/blogs.php' || $pagina == '/blog.php') {  echo 'id="ativo"'; }?> >
					<a href="blogs.php">BLOG</a>
				</div>
				<div class="selecionado">
					<?php if($pagina == '/blogs.php' || $pagina == '/blog.php') { ?>
						<img src="img/menosbtn.png" />
					<?php } else {  ?>
						<img src="img/xbtn.png" />
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<div class="base-menu">
				<div class="txt-link" <?php if($pagina == '/servicos.php') {  echo 'id="ativo"'; }?>>
					<a href="servicos.php">SERVIÇOS</a>
				</div>
				<div class="selecionado">
					<?php if($pagina == '/extremes/servicos.php') { ?>
						<img src="img/menosbtn.png" />
					<?php } else {  ?>
						<img src="img/xbtn.png" />
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<div class="base-menu">
				<div class="txt-link" <?php if($pagina == '/clientes.php') {  echo 'id="ativo"'; }?>>
					<a href="clientes.php">CLIENTES</a>
				</div>
				<div class="selecionado">
					<?php if($pagina == '/clientes.php') { ?>
						<img src="img/menosbtn.png" />
					<?php } else {  ?>
						<img src="img/xbtn.png" />
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<div class="base-menu">
				<div class="txt-link" <?php if($pagina == '/contato.php') {  echo 'id="ativo"'; }?>>
					<a href="contato.php">CONTATO</a>
				</div>
				<div class="selecionado">
					<?php if($pagina == '/contato.php') { ?>
						<img src="img/menosbtn.png" />
					<?php } else {  ?>
						<img src="img/xbtn.png" />
					<?php } ?>
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<br /><br />
			<div class="base-menu">
				<div class="txt-link">
					FACEBOOK
				</div>
				<div class="clear"></div>
			</div>
			<div class="barra-separatoria"></div>
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FAgenciaExtremes&amp;width=184&amp;height=370&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=219634854836330" scrolling="no" frameborder="0" style="border:none;background:#FFF; overflow:hidden; width:184px; height:370px;" allowTransparency="true"></iframe>
		