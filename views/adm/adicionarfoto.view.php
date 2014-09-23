<!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="/" target="_blank">Home</a></li>
        <li>Painel</li>
        <li class="active">Adicionar foto</li>
      </ol>
    </div>
    <div class="container">
      <div class="row">
        <?php require("../views/adm/alertbox.view.php"); ?>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-pencil"></i> Adicionar nova foto</div>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/adm/funcoes.php?ac=addSlide">
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Selecione a imagem</label>
                      <div class="col-lg-10">
                        <input type="file" id="inputStandard" name="slide" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12 text-right">
                        <input class="submit btn btn-blue" type="submit" value="Salvar">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
        <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-table"></i> Fotos adicionadas </div>
                </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Ver</th>
                        <th>Excluir</th>
                      </tr>
                    </thead>
                    <tbody>
                          <tr>
                            <td>1</td>
                            <td><a href="#">Clique para ver</a></td>
                            <td><a href="/adm/funcoes.php?ac=excluircategoria&id=" onClick="return verificaDeletar();">Excluir</a></td>
                          </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
      </div>
    </div>
  </section>
  <!-- End: Content --> 