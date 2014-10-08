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
      <?php require("../views/adm/alertbox.view.php"); ?>
      <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-pencil"></i> Adicionar novo slide</div>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/adm/funcoes.php?ac=addSlide">
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Selecione a imagem</label>
                      <div class="col-lg-10">
                        <input type="file" id="inputStandard" name="slide" class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12 text-right enviando">
                        <input class="submit btn btn-blue" type="submit" value="Salvar">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
        <?php if($slides != false) { ?>
        <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-table"></i> Slides Adicionados </div>
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
                        <?php foreach ($slides as $array) {
                        ?>
                          <tr>
                            <td><?php echo $array['COD_SLIDE'] ?></td>
                            <td><a href="/web/storage/slides/<?php echo $array['DSC_CAMINHO']; ?>" target="_blank">Clique para ver</a></td>
                            <td><a href="/adm/funcoes.php?ac=excluirslide&id=<?php echo $array['COD_SLIDE'] ?>&foto=<?php echo $array['DSC_CAMINHO']; ?>" onClick="return verificaDeletar();">Excluir</a></td>
                          </tr>
                        <?php } ?>
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
                  <div class="panel-title"> <i class="fa fa-table"></i> Nenhum slide cadastrado! </div>
                </div>
              </div>
            </div>
        </div>
        <?php } ?>
    </div>
  </section>
  <!-- End: Content --> 