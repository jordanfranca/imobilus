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
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-pencil"></i> Adicionar novo template</div>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/adm/funcoes.php?ac=adicionartemplate">
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Nome do template: </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="nome" value="" class="form-control" placeholder="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Versão: </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="versao" value="" class="form-control" placeholder="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Arquivo .zip: </label>
                      <div class="col-lg-10">
                        <input type="file" id="inputStandard" name="zip" value=""  placeholder="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Miniatura: </label>
                      <div class="col-lg-10">
                        <input type="file" id="inputStandard" name="miniatura" value=""  placeholder="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Ativo:  </label>
                      <div class="col-lg-10">
                        <?php echo HTML::optionTrueFalse('ativo', 'class="form-control"'); ?>
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
        <?php if($templates != false) { 
        ?>
        <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-table"></i> Templates adicionados </div>
                </div>
                <div class="panel-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome template</th>
                        <th>Ativar/Desativar</th>
                      </tr>
                    </thead>
                    <tbody>
                          <?php foreach ($templates as $array) { ?>
                          <tr>
                            <td><?php echo $array['COD_TEMPLATE']; ?></td>
                            <td><?php echo $array['NOM_TEMPLATE']; ?></td>
                            <td><?php if($array['IND_ATIVO'] == 1) {?>
                                <a href="/adm/funcoes.php?ac=desativartemplate&id=<?php echo $array['COD_TEMPLATE']; ?>" onClick="return verificaDeletar();">Desativar</a>
                                <?php }else  {?>
                                <a href="/adm/funcoes.php?ac=ativartemplate&id=<?php echo $array['COD_TEMPLATE']; ?>">Ativar</a>
                                <?php } ?>
                              </td>
                          </tr>
                          <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <?php } else { ?>
        <div class="col-md-12">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-table"></i> Nenhum template adicionado</div>
                </div>
              </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </section>
  <!-- End: Content --> 