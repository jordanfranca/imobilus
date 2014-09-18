<!-- Start: Main -->
<div id="main"> 
<!-- Start: Sidebar -->
  <aside id="sidebar">
    <div id="sidebar-search">
      
      <div class="sidebar-toggle"> <i class="fa fa-bars"></i> </div>
    </div>
    <div id="sidebar-menu">
      <ul class="nav sidebar-nav">
        <li class="active"><a href="/adm/index.php?pg=painel"><span class="glyphicons glyphicons-sort"></span><span class="sidebar-title">Painel</span></a></li>
        <li> <a class="accordion-toggle" href="#resources"><span class="glyphicons glyphicons-home"></span><span class="sidebar-title">Imóveis</span><span class="caret"></span></a>
          <ul id="resources" class="nav sub-nav">
            <li><a href="#"><span style="width: 15px;" class="glyphicons glyphicon-plus"></span> Adicionar Imóvel</a></li>
            <li><a href="#"><span class="glyphicons glyphicons-book"></span>Lista de Imóveis</a></li>
          </ul>
        </li>
        <li> <a class="accordion-toggle" href="#resources2"><span class="glyphicons glyphicons-adress_book"></span><span class="sidebar-title">Conta</span><span class="caret"></span></a>
          <ul id="resources2" class="nav sub-nav">
            <li><a href="/adm/?pg=editarconta"><span style="width: 15px;" class="glyphicons glyphicons-edit"></span> Editar Conta</a></li>
            <li><a href="#" onclick="return verificaDesativarConta()"><span class="glyphicons glyphicons-pencil"></span>Desativar Conta</a></li>
          </ul>
        </li>
        <li> <a class="accordion-toggle" href="#resources3"><span class="glyphicons glyphicons-imac"></span><span class="sidebar-title">Website</span><span class="caret"></span></a>
          <ul id="resources3" class="nav sub-nav">
            <li><a href="#"><span style="width: 15px;" class="glyphicons glyphicons-edit"></span> Editar Website</a></li>
            <li><a href="#" onclick="return verificaDesativarSite()"><span class="glyphicons glyphicons-remove_2"></span>Desativar Website</a></li>
            <li><a href="#"><span class="glyphicons glyphicons-check"></span>Ativar Website</a></li>
          </ul>
        </li>
        <li> <a class="accordion-toggle" href="#resources4"><span class="glyphicons glyphicons-upload"></span><span class="sidebar-title">Slides</span><span class="caret"></span></a>
          <ul id="resources4" class="nav sub-nav">
            <li><a href="/adm/?pg=slides"><span style="width: 15px;" class="glyphicons glyphicon-plus"></span> Adicionar Slide</a></li>
            <li><a href="/adm/?pg=slides"><span class="glyphicons glyphicons-book"></span>Lista de slides</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </aside>
  <!-- End: Sidebar --> 