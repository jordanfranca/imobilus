<?php 
    require('../class/Conexao.class.php');
    $conexao = new Conexao();
    require('../class/Login.class.php');
    $verifica = new Login();
    $verifica->verificar("index.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extremes - Digital Print</title>
<link href="css/estilo.css" type="text/css" rel="stylesheet" />
<script src="../js/jquery-latest.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript"
   src="../js/jscripts/tiny_mce/plugins/tinybrowser/tb_tinymce.js.php"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
    language : "pt",
		mode : "specific_textareas",
		editor_selector : "mceEditor",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
theme_advanced_buttons1:
"code,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,cleanup,link,unlink,image,table,formatselect,fontselect,fontsizeselect,forecolor,backcolor,fullscreen",

		// Theme options
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
		

		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
relative_urls : false,

		// Example content CSS (should be your site CSS)
	 content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",
    file_browser_callback : "tinyBrowser",
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<?php 
	if(isset($_GET['operacao'])) {
		if($_GET['operacao'] == 'true') {
			?>
			<script type="text/javascript">
				alert("Operacação realizada com sucesso!");
			</script>
			<?php
		}
	}
?>
</head>

<body>
	<?php require("includes/header.php");?>
	<div class="alinha-centro">
		<div id="menu">
			<?php require("includes/menuadm.php"); ?>
		</div>
		<div id="conteudo">
			<div class="linha-fina">
				Homepage > Administração
			</div>
			<div id="base-conteudo-pgs">
				<div class="title">
					Inserir Postagem
				</div>
				<div class="alinha-contato">
					<form method="POST" action="funcoes.php?ac=addblog" enctype="multipart/form-data">
						<div class="base-form">
							<div class="esquerda-form">
								<div class="txt-input-contato">
									Titulo do Post:
								</div>
								<div class="form-input">
									<input type="text"  class="formulario-contato" name="titulo" />
								</div>
							</div>
							<div class="direita-form">
								<div class="txt-input-contato">
									Capa (Tamanho 392 largura x 193 altura): 
								</div>
								<div class="form-input">
									<input type="file" name="capa" />
								</div>
							</div>
							<div class="clear"></div><br />

							<div class="esquerda-form">
								<div class="txt-input-contato">
									Capa Pequena (Tamanho 142 largura x 120 altura ): 
								</div>
								<div class="form-input">
									<input type="file" name="capapequena" />
								</div>
							</div>
							<div class="direita-form">
								<div class="txt-input-contato">
									Capa Media (Tamanho 302 largura x 120 altura ): 
								</div>
								<div class="form-input">
									<input type="file" name="capamedia" />
								</div>
							</div>

							<div class="clear"></div><br />
							<div class="esquerda-form">
								<div class="txt-input-contato">
									Tipo do Post
								</div>
								<div class="form-input">
									<select name="tipo">
										<option value="1">Pequeno</option>
										<option value="2">Médio</option>
									</select>
								</div>
							</div>

							<div class="clear"></div>
							<div class="base-form">
							<div class="txt-input-contato">
								Conteudo (Largura do post 745px)
							</div>
							<div class="form-input">
								<textarea name="conteudo" class="mceEditor"  rows="15" cols="80" style="width: 80%"></textarea>
							</div>
						</div>
						</div>
						<div class="input-enviar">
							<input type="submit" value="Inserir" />
						</div>
					</form>
				</div><br /><br />
				<div class="title">
					Inserir Cliente
				</div>
				<div class="alinha-contato">
					<form method="POST" action="funcoes.php?ac=addcliente" enctype="multipart/form-data">
						<div class="base-form">
							<div class="esquerda-form">
								<div class="txt-input-contato">
									Nome do Cliente (33 caracteres)
								</div>
								<div class="form-input">
									<input type="text" maxlength="33"  class="formulario-contato" name="titulo" />
								</div>
							</div>
							<div class="direita-form">
								<div class="txt-input-contato">
									Logo (Tamanho 160 largura x 160 altura): 
								</div>
								<div class="form-input">
									<input type="file" name="capa" />
								</div>
							</div>

							<div class="clear"></div><br />
							<div class="esquerda-form">
								<div class="txt-input-contato">
									Site do Cliente (se houver)
								</div>
								<div class="form-input">
									<input type="text"  class="formulario-contato" name="link" />
								</div>
							</div>

							<div class="clear"></div>
				
						</div>
						</div>
						<div class="input-enviar">
							<input type="submit" value="Inserir" />
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