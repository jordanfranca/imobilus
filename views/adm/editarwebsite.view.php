
<!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="/" target="_blank">Home</a></li>
        <li>Painel</li>
        <li class="active">Criar website</li>
      </ol>
    </div>
    <div class="container">
      <?php require("../views/adm/alertbox.view.php"); ?>
      <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-pencil"></i>Editar website</div>
                </div>
                <div class="panel-body">
                  <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/adm/funcoes.php?ac=editarwebsite">
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Titulo: </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="titulo" value="<?php echo $website->getTitulo(); ?>" class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">E-mail para contato:  </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="email" value="<?php echo $website->getEmail(); ?>" class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Telefone para contato:  </label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="telefone" value="<?php echo $website->getTelefone(); ?>" class="form-control"  required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Cor Primária:  </label>
                      <div class="col-lg-10">
                        <input type="text" name="corprimaria" class="form-control" id="cp" placeholder="#37a8e8" value="<?php echo $website->getCorprimaria(); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Cor Secundária:  </label>
                      <div class="col-lg-10">
                        <input type="text" name="corsecundaria" class="form-control" id="cs" placeholder="#37a8e8" value="<?php echo $website->getCorsecundaria(); ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Sobre a imobiliária:  </label>
                      <div class="col-lg-10">
                        <textarea class="ckeditor editor1" id="editor1" name="sobre" rows="14" ><?php echo $website->getSobre(); ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Logo:  </label>
                      <div class="col-lg-10">
                        <input type="file" id="inputStandard" name="logo"  placeholder="Digite...">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-md-3 col-lg-2 control-label">Template:</label>
                        <div class="col-md-9">
                        <?php 
                          if($templates != false) {
                            foreach ($templates as $array) {
                              if($array['IND_ATIVO'] == 1) {
                        ?>
                        <div class="col-md-3 text-center">
                            <input type="radio" name="template" id="yes" value="<?php echo $array['COD_TEMPLATE']; ?>" <?php if($array['COD_TEMPLATE'] == $website->getTemplate()) { echo " checked "; } ?> />
                            <label for="yes"><?php echo $array['NOM_TEMPLATE']; ?></label>
                            <div class="img-template"><img src="/templates/miniaturas/<?php echo $array['DSC_MINIATURA']; ?>" /></div>
                        </div>
                        <?php }}} ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="inputStandard" class="col-lg-2 control-label">Publicado:  </label>
                      <div class="col-lg-10">
                        <?php echo HTML::optionTrueFalse('publicado', 'class="form-control"', $website->getPublicado()); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12 text-right">
                        <input type="hidden" name="templateatual" class="form-control colorpicker margin-top-none" id="cp" placeholder="#37a8e8" value="<?php echo $website->getTemplate(); ?>">
                        <input type="hidden" name="logoatual" class="form-control colorpicker margin-top-none" id="cp" placeholder="#37a8e8" value="<?php echo $website->getLogo(); ?>">
                        <input class="submit btn btn-blue" type="submit" value="Atualizar">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
  <script type="text/javascript">
   $('#cp, #cs').colpick({
    layout:'hex',
    submit:0,
    colorScheme:'dark',
    onChange:function(hsb,hex,rgb,el,bySetColor) {
        // Fill the text box just if the color was set using the picker, and not the colpickSetColor function.
        if(!bySetColor) $(el).val('#'+hex);
          }
        }).keyup(function(){
          $(this).colpickSetColor(this.value);
        });
  </script>