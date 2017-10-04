    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © SampiSolution.com </small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pronto para sair??</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Selecione "Logout" abaixo se você estiver pronto para terminar sua sessão atual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="<?= base_url('administrador/logout/'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>


    <script src="<?= base_url('admin/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/popper/popper.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?= base_url('admin/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>
    <script src="<?= base_url('admin/js/sb-admin.min.js'); ?>"></script>
    <script src="<?= base_url('admin/js/sb-admin-datatables.min.js'); ?>"></script>

    <script>
     var table;
     table = $('#emails').DataTable( {
      "serverSide": true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        "oLanguage": {
          "sProcessing": "Processando Emails...",
          "sLengthMenu": "Mostrar _MENU_ registros de Emails",
          "sZeroRecords": "Não foram encontrados resultados de Emails",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
          "sInfoFiltered": "",
          "sInfoPostFix": "",
          "sSearch": "Buscar por:",
          "sUrl": "",
          "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Seguinte",
            "sLast": "Último"
          }
        },

        ajax: {
          url: '<?= base_url('js/emails_js/index'); ?>',
          type: 'POST'
        },
      });

  // ATUALIZA TABLE DE POSTS AO CLICAR EM ATUALIZAR

  $("#atualizar").click(function(){
    var table = $('#publicacoes').DataTable();
      table.ajax.reload( null, false ); // user paging is not reset on reload
    });

  </script>

  <script>
   var table;
   table = $('#publicacoes').DataTable( {
    "serverSide": true,
        "processing": true, //Feature control the processing indicator.
        "order": [], //Initial no order.
        "oLanguage": {
          "sProcessing": "Processando Publicações...",
          "sLengthMenu": "Mostrar _MENU_ registros de Publicações",
          "sZeroRecords": "Não foram encontrados resultados de Publicações",
          "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
          "sInfoFiltered": "",
          "sInfoPostFix": "",
          "sSearch": "Buscar por:",
          "sUrl": "",
          "oPaginate": {
            "sFirst": "Primeiro",
            "sPrevious": "Anterior",
            "sNext": "Seguinte",
            "sLast": "Último"
          }
        },

        ajax: {
          url: '<?= base_url('js/publicacao_js/index'); ?>',
          type: 'POST'
        },
      });

  // ATUALIZA TABLE DE POSTS AO CLICAR EM ATUALIZAR

  $("#atualizar").click(function(){
    var table = $('#publicacoes').DataTable();
      table.ajax.reload( null, false ); // user paging is not reset on reload
    });


//  Publica 
  $("#form").submit(function(){
    var form = new FormData(this);
    $.ajax({
        url: '<?php echo site_url("js/Publicacao_js/publicar/") ?>', // Url to which the request is send
        type: "POST", // Type of request to be send, called as method
        data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false, // To send DOMDocument or non processed data file it is set to false
        success: function (data) {
          if(data == 'Publicação efetuada !'){
              $("#error center").html(data);
              $("#container-error").attr('class','alert alert-success');
                $('#form').each (function(){
                    this.reset();
                });
          }else{
              $("#error center").html(data);
              $("#container-error").attr('class','alert alert-warning');
          }
        }
      });

  });

 
</script>



</div>
</body>

</html>
