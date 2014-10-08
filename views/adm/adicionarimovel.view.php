
<!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="/" target="_blank">Home</a></li>
        <li>Painel</li>
        <li class="active">Adicionar imóvel</li>
      </ol>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php require("../views/adm/alertbox.view.php"); ?>
            <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-pencil"></i>Adicionar um imóvel</div>
                </div>
                <div class="panel-body">
                  <form method="POST" class="form-horizontal" role="form" enctype="multipart/form-data"  action="/adm/funcoes.php?ac=addimovel">
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Referência: </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="referencia" value="" class="form-control" placeholder="" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Quartos: </label>
                      <div class="col-lg-10">
                        <?php echo HTML::getQuantidades('quartos', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Salas:  </label>
                      <div class="col-lg-10">
                         <?php echo HTML::getQuantidades('salas', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Banheiros: </label>
                      <div class="col-lg-10">
                         <?php echo HTML::getQuantidades('banheiros', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Dormitórios:  </label>
                      <div class="col-lg-10">
                         <?php echo HTML::getQuantidades('dormitorios', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Mobilia:  </label>
                      <div class="col-lg-10">
                        <?php echo HTML::optionTrueFalse('mobilia', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Tipo:  </label>
                      <div class="col-lg-10">
                        <?php echo HTML::getTipoImovel('tipoimovel', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Tipo de negócio:  </label>
                      <div class="col-lg-10">
                         <?php echo HTML::getTipoNegocio('tiponegocio', 'class="form-control"'); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Estado:  </label>
                      <div class="col-lg-10">
                          <select name="estado" id="estados" class="form-control">
                          <?php
                          if($bool != false){
                            ?>
                            <option>Selecione</option>
                            <?php
                            foreach ($bool as $array) {
                              ?>
                              <option value="<?php echo $array['COD_ESTADO']; ?>"><?php echo utf8_encode($array['NM_ESTADO']); ?></option>
                              <?php
                            }
                          }
                         ?>
                         <select name="estado" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Cidade:  </label>
                      <div class="col-lg-10" id="cidade">
                         <select class="form-control" id="cidadese"><option>Selecione um estado</option></select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Bairro:  </label>
                      <div class="col-lg-10" id="bairro">
                          <select name="bairro" class="form-control">
                            <option value="0">Selecione uma cidade</option>
                          </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Preço:  </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="preco" class="form-control" placeholder="Digite..." required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Descrição:  </label>
                      <div class="col-lg-10">
                        <textarea class="ckeditor editor1" id="editor1" name="descricao" rows="14"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Foto principal:  </label>
                      <div class="col-lg-10">
                        <input type="file" id="inputStandard" name="foto"  placeholder="Digite..." required>
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
    </div>
  </section>
  <!-- End: Content -->
  