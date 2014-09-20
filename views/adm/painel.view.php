<!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="/" target="_blank">Home</a></li>
        <li class="active">Painel</li>
      </ol>
    </div>
    <div class="container">
      <div class="row">
        <?php if($_SESSION['websitebool'] && $_SESSION['websiteativo'] == 1) { ?>
        <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-table"></i>  Imóveis adicionados </div>
                </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Referência</th>
                        <th>Adicionar Fotos</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                      </tr>
                    </thead>
                    <tbody>
                          <tr>
                            <td>1</td>
                            <td>20</td>
                            <td><a href="/adm/?pg=adicionarfoto">Adicionar Fotos</a></td>
                            <td><a href="#">Editar</a></td>
                            <td><a href="/adm/funcoes.php?ac=excluircategoria&id=" onClick="return verificaDeletar();">Excluir</a></td>
                          </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <?php } else { ?>
        <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-table"></i>  Você não tem um website criado ou ativo!</div>
                </div>
              </div>
            </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End: Content --> 