<!DOCTYPE html>
<html>
<head>
<!-- 
  NOTE: This index page is primarily for demonstrative purposes. 
  dashboard.html is more suitable for use as it has 
  been stripped of added animations 
-->

<!-- Meta, title, CSS, favicons, etc. -->
<meta charset="utf-8" />
<title>Imobilus - Painel de Administração</title>
<meta name="author" content="Holladay" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!-- Font CSS  -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" />

<!-- Core CSS  -->
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="/web/fonts/glyphicons_pro/glyphicons.min.css" />

<!-- Plugin CSS -->
<link rel="stylesheet" type="text/css" href="/web/js/adm/vendor/plugins/calendar/fullcalendar.css" />
<link rel="stylesheet" type="text/css" href="/web/js/adm/vendor/plugins/datatables/css/datatables.min.css" />
<link rel="stylesheet" type="text/css" href="/web/css/adm/animate.css" />
<link rel="stylesheet" type="text/css" href="/web/js/adm/colpick/css/colpick.css" />

<!-- Theme CSS -->
<link rel="stylesheet" type="text/css" href="/web/css/adm/theme.css" />
<link rel="stylesheet" type="text/css" href="/web/css/adm/pages.css" />
<link rel="stylesheet" type="text/css" href="/web/css/adm/plugins.css" />
<link rel="stylesheet" type="text/css" href="/web/css/adm/responsive.css" />

<!-- Demonstration CSS -->
<link rel="stylesheet" type="text/css" href="/web/css/adm/demo.css" />

<!-- Your Custom CSS -->
<link rel="stylesheet" type="text/css" href="/web/css/adm/custom.css" />

<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon.ico" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- Core Javascript - via CDN -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="/web/js/adm/colpick/js/colpick.js"></script>

<script type="text/javascript">
    $(function() { //shorthand document.ready function
      $('.form-horizontal').on('submit', function(e) {
          $(this).find('input[type="submit"]').css("display", "none");
          $('.enviando').html('<img src="/web/img/loader.gif" />');
      });
  });


    $(document).ready(function() {

        $('select#cidadese').change(function() {
          $('#bairro').html("Carregando...");
          $.ajax({
           type: "GET",
           url: 'funcoes.php?ac=getbairros',
           data: "id=" + $(this).val(),
           success: function(data) {
                $('#bairro').html(data);
           }
          });
        });

        $('#estados').change(function() {
          $('#cidadese').html("<option>Carregando...</option>");
          $('#bairro select').html("<option value='0'>Selecione uma cidade</option>");
          $.ajax({
           type: "GET",
           url: 'funcoes.php?ac=getcidades',
           data: "id=" + $(this).val(),
           success: function(data) {
                $('#cidadese').html(data);
           }
         });
      });

    });
     
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript">

function verificaDeletar() {
 var confirma = confirm("Confirma remoção deste registro?");
 if (confirma){
   return true;
 } 
 else {
   return false;
 } 
}

function verificaDesativarSite() {
 var confirma = confirm("Confirma a desativação de seu WEBSITE?");
 if (confirma){
   return true;
 } 
 else {
   return false;
 } 
}

function verificaDesativarConta() {
 var confirma = confirm("Confirma a desativação de sua CONTA?");
 if (confirma){
   return true;
 } 
 else {
   return false;
 } 
}
</script>

</head>

<body class="dashboard">
<!-- Start: Header -->
<header class="navbar navbar-fixed-top">
  <div class="pull-left"> <a class="navbar-brand" href="dashboard.html">
    <div class="navbar-logo"><img src="/web/img/adm-images/logo.png" class="img-responsive" alt="logo" /></div>
    </a> </div>
  </div>
</header>
<!-- End: Header --> 
