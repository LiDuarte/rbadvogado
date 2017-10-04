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
          <i class="fa fa-table"></i> Registros de Publicações
                 <span class="pull-right"><a href="<?= base_url('administrador/publicar/'); ?>" class="btn btn-info">Nova Publicação</a></span>
          </div>
        <div class="card-body">
        <div class="col-xs-1">
                <a id="atualizar" class="pull-right btn-sm btn btn-default" href="javascript:void(0);"><span class=""><i class="fa fa-refresh"></i></span></a> 
            </div>
          <div class="table-responsive">
          <table id="publicacoes" class="table table-hover table-bordered" cellspacing="0" width="100%">
          <thead class="danger">
              <tr class="danger">
              <th width="50">Nº</th>
              <th width="150" class="text-center">Imagens</th>
              <th width="150" class="text-center">Titulo</th>
              <th width="400" class="text-center">texto</th>
              <th width="120" class="text-center">Data</th>
              <th width="30" class="text-center">Horário</th>
              <th class="text-center">Acão</th>
              </tr>
          </thead>
          <tbody>
          </tbody>

          <tfoot>
              <tr class="warning">
              <th width="50">Nº</th>
              <th width="150" class="text-center">Imagens</th>
              <th width="150" class="text-center">Titulo</th>
              <th width="400" class="text-center">texto</th>
              <th width="120" class="text-center">Data</th>
              <th width="30" class="text-center">hora</th>
              <th  class="text-center">Acão</th>
              </tr>
          </tfoot>
      </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Atualizado em DataTime</div>
      </div>  
    </div>
</div>

