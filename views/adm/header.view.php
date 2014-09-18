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
    <div class="navbar-logo"><img src="img/logos/logo-red.png" class="img-responsive" alt="logo" /></div>
    </a> </div>
  <div class="pull-right header-btns">
    <div class="btn-group user-menu">
      <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-user"></span> <b> <?php echo $_SESSION['nome']; ?> </b> </button>
      <ul class="dropdown-menu checkbox-persist" role="menu">
        <li class="menu-arrow">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Sua Conta<span class="pull-right glyphicons glyphicons-user"></span></li>
        <li>
          <ul class="dropdown-items">
            <li>
              <div class="item-icon"><i class="glyphicons glyphicon-plus"></i> </div>
              <a class="item-message" href="messages.html">Adicionar Imóvel</a> </li>
            <li>
              <div class="item-icon"><i class="glyphicons glyphicons-imac"></i> </div>
              <a class="item-message" href="calendar.html">Editar Website</a> </li>
            <li class="border-bottom-none">
              <div class="item-icon"><i class="fa fa-cog"></i> </div>
              <a class="item-message" href="customizer.html">Editar Conta</a></li>
            <li class="padding-none">
              <div class="dropdown-signout"><i class="fa fa-sign-out"></i> <a href="login.html">Sair</a></div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- End: Header --> 
