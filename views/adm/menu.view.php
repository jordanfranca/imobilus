<!-- Start: Main -->
<div id="main"> 
<!-- Start: Sidebar -->
  <aside id="sidebar">
    <div id="sidebar-search">
      
      <div class="sidebar-toggle"> <i class="fa fa-bars"></i> </div>
    </div>
    <div id="sidebar-menu">
      <ul class="nav sidebar-nav">
        <li class="active"><a href="/adm/?pg=painel"><span class="glyphicons glyphicons-sort"></span><span class="sidebar-title">Painel</span></a></li>
        <li> <a class="accordion-toggle collapsed" href="#resources2"><span class="glyphicons glyphicons-adress_book"></span><span class="sidebar-title">Conta</span><span class="caret"></span></a>
          <ul id="resources2" class="nav sub-nav">
            <li><a href="/adm/?pg=editarconta"><span style="width: 15px;" class="glyphicons glyphicons-edit"></span> Editar Conta</a></li>
            <li><a href="/adm/funcoes.php?ac=desativarconta" onclick="return verificaDesativarConta()"><span class="glyphicons glyphicons-pencil"></span>Desativar Conta</a></li>
          </ul>
        </li>
        <?php if($_SESSION['websitebool'] && $_SESSION['websiteativo'] == 1)  { ?><li> <a class="accordion-toggle collapsed" href="#resources"><span class="glyphicons glyphicons-home"></span><span class="sidebar-title">Imóveis</span><span class="caret"></span></a>
          <ul id="resources" class="nav sub-nav">
            <li><a href="/adm/?pg=adicionarimovel"><span style="width: 15px;" class="glyphicons glyphicon-plus"></span> Adicionar Imóvel</a></li>
            <li><a href="/adm/?pg=painel"><span class="glyphicons glyphicons-book"></span>Lista de Imóveis</a></li>
          </ul>
        </li>
        <li> <a class="accordion-toggle collapsed" href="#resources4"><span class="glyphicons glyphicons-upload"></span><span class="sidebar-title">Slides</span><span class="caret"></span></a>
          <ul id="resources4" class="nav sub-nav">
            <li><a href="/adm/?pg=slides"><span style="width: 15px;" class="glyphicons glyphicon-plus"></span> Adicionar Slide</a></li>
            <li><a href="/adm/?pg=slides"><span class="glyphicons glyphicons-book"></span>Lista de slides</a></li>
          </ul>
        </li>
        <?php } ?>

        <li> <a class="accordion-toggle collapsed" href="#resources3"><span class="glyphicons glyphicons-imac"></span><span class="sidebar-title">Website</span><span class="caret"></span></a>
          <ul id="resources3" class="nav sub-nav">
            <?php if(!$_SESSION['websitebool'])  { ?>
              <li><a href="/adm/?pg=criarwebsite"><span style="width: 15px;" class="glyphicons glyphicons-circle_ok"></span> Criar Website</a></li>
            <?php } ?>           
            <?php if($_SESSION['websitebool'] && $_SESSION['websiteativo'] == 1 )  { ?>
              <li><a href="/adm/?pg=editarwebsite"><span style="width: 15px;" class="glyphicons glyphicons-edit"></span> Editar Website</a></li>
              <li><a href="/adm/funcoes.php?ac=desativarsite" onclick="return verificaDesativarSite()"><span class="glyphicons glyphicons-remove_2"></span>Desativar Website</a></li>   
            <?php } elseif ($_SESSION['websitebool'] && $_SESSION['websiteativo'] == 0) {
              ?>
              <li><a href="/adm/funcoes.php?ac=ativarsite"><span class="glyphicons glyphicons-check"></span>Ativar Website</a></li>
              <?php
            }?>
            
          </ul>
        </li>
        <?php if($_SESSION['websitebool'] && $_SESSION['websiteativo'] == 1 )  { ?>
          <li><a href="http://www.<?php echo $_SESSION['nomesubdominio']; ?>.imobilus.com.br" target="_blank"><span class="glyphicons glyphicons-direction"></span><span class="sidebar-title">Acessar Website</span></a></li>
        <?php } ?>
        <li><a href="/adm/funcoes.php?ac=deslogar"><span class="glyphicons glyphicons-ban"></span><span class="sidebar-title">Sair</span></a></li>
      </ul>
    </div>
  </aside>
  <!-- End: Sidebar --> 