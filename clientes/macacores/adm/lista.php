<?php 
    require('../class/Conexao.class.php');
    $conexao = new Conexao();
    require('../class/Login.class.php');
    $verifica = new Login();
    $verifica->verificar("index.php");
    require('../class/Blog.class.php');
    require("../class/Clientes.class.php");
?>
<?php 
	if(!isset($_GET['ac'])) {
		header('Location: painel.php');
	}
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

function VerificaExclusao() {
	var desisao = confirm("Voce deseja realmente excluir este registro?");
	if(desisao) {
		return true;
	}
	else {
		return false;
	}
}
</script>


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
				<?php 
					if($_GET['ac'] == 'posts') {
				?>
				<div class="title">
					Lista de Postagens
				</div>
				
				<?php
					$blg = new Blog();
					$blg->listaADM();
				} else {
				?>
				<div class="title">
					Lista de Clientes
				</div>

				<?php 
				$clientes = new Clientes();
				$clientes->listaADM();
				} ?>

			</div>
		</div>
		<div class="clear"></div>
	</div>
	<?php 
		require("includes/footer.php");
	?>
</body>
</html>