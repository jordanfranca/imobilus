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
<title>Login </title>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<?php 
  if(isset($_GET['erro'])) {
    ?>
      <script type="text/javascript">
        alert("Usuário e/ou senha incorretos!");
      </script>
    <?php
  }
?>
<body  class="login-page">

<!-- Start: Main -->
<div id="main">
  <div class="container">
    <div class="row">
      <div id="page-logo"> <center><img src="/web/img/adm-images/logo.png" alt="logo" /></center> </div>
    </div>
    <div class="row">
      <div class="panel">
        <div class="panel-heading">
          <div class="panel-title"> <i class="fa fa-lock"></i> Login Administrador Geral </div>
          </div>
        <form class="cmxform" id="altForm" method="POST" action="/admgeral/login.php" />
          <div class="panel-body">
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control phone" name="login" maxlength="10" autocomplete="off" placeholder="Usuário" required />
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control product" name="senha" maxlength="10" autocomplete="off" placeholder="Senha" required />
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <div class="form-group margin-bottom-none">
              <input class="btn btn-primary pull-right" type="submit" value="Login" />
              <div class="clearfix"></div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End: Main --> 

<!-- Core Javascript - via CDN -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<!-- Plugins - Via CDN -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/flot/0.8.1/jquery.flot.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="/web/js/adm/uniform.min.js"></script>
<script type="text/javascript" src="/web/js/adm/main.js"></script>
<!--<script type="text/javascript" src="js/plugins.js"></script>-->
<script type="text/javascript" src="/web/js/adm/custom.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    
  // Init Theme Core    
  Core.init();
  });
</script>
</body>
</html>
