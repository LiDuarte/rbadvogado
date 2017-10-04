<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">Administrator</a>
      </li>
      <li class="breadcrumb-item active">Publicações</li>
    </ol>
    <!-- Icon Cards-->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Nova Publicação
      </div>
      <div class="card-body">
              <div class="col-xs-12">
                    <div id="container-error"> 
                        <span class="text-center alert-link" id="error"> <center></center> </span>
                    </div>
              </div>
        <div class="col-xs-1">
            <form class="form-horizontal" id="form" method="post" action="javascript:void(0);">
             <div class="form-group">
                <label for="titulo">Titulo da Publicação</label>
                <input type="text" name="titulo" id="titulo" class="form-control">
             </div>
       
                  <div class="form-group">
                    <label for="texto">Texto</label>
                    <textarea rows="6" type="text" name="texto" id="texto" class="form-control"> </textarea>
                 </div>

                <div class="form-group">
                    <label for="imagem">Imagem da Publicação</label>
                     <input type="file" name="userfile" id="imagem"  class="form-control" placeholder="Imagem">
                 </div>

                 <span class="help-block" style="color: red;">
                            <?php
                            if ($this->upload->display_errors()):
                                echo $this->upload->display_errors();
                            endif;
                            ?>
                        </span>
               <input type="hidden"  value="<?php echo date("Y-m-d") ?>" name="data">
              <input type="hidden"  value='<?php echo date("H-i-s"); ?>' name="horario">
              <input type="submit" class="btn btn-primary pull-right">
            </form>
        </div>
      </div>



      </div>
  </div>

