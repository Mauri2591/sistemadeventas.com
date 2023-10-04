<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

include '../app/controllers/roles/listado_de_roles.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Listado de Roles</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Roles registrados</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
              <table id="example1" class="table table-bordered table-hover table-striped table-sm text-center">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre Rol</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php include "../app/controllers/roles/listado_de_Roles.php"; ?>
                  <?php foreach ($roles_datos as $key => $roles_dato) : ?>
                    <tr>
                      <td><?php echo ($key + 1) ?></td>
                      <td><?php echo $roles_dato['rol'] ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="update.php?id=<?php echo $roles_dato['id_rol'];?>" type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil-alt"></i></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.content-wrapper -->

<?php
include '../layout/mensajes.php';
include '../layout/parte2.php';
?>

<script>
  $(function() {
    $(function() {
      $("#example1").DataTable({
        "pageLength": 7,
        language: {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total Roles)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Roles",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        },
        "responsive": true,
        "lengthChange": true,
        "autoWidth": false,
        buttons: [{
          extend: 'collection',
          text: 'Reportes',
          orientation: 'landscape',
          buttons: [{
              text: 'Copiar',
              extend: 'copy'
            },
            {
              extend: 'pdf'
            },
            {
              extend: 'csv'
            },
            {
              extend: 'excel'
            },
            {
              text: 'Imprimir',
              extend: 'print'
            }
          ]
        }, {
          extend: 'colvis',
          text: 'Visor de Columnas',
          collectionLayout: 'fixed three-column'
        }]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
    });
  });
</script>