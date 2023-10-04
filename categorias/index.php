<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';

include '../app/controllers/categorias/listado_de_categorias.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Categorías
                        <!-- Boton Modal -->
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i> Agregar Nuevo</button><!-- cierre boton modal -->
                    </h1>
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
                            <h3 class="card-title">Categorías registradas</h3>

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
                                        <th>Nombre de la categoría</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include "../app/controllers/Roles/listado_de_Roles.php"; ?>
                                    <?php foreach ($categorias_datos as $key => $categoria_dato) : ?>
                                        <tr>
                                            <td><?php echo ($key + 1) ?></td>
                                            <td><?php echo $categoria_dato['nombre_categoria']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-update<?php echo $categoria_dato['id_categoria']; ?>">
                                                        <i class="fa fa-pencil-alt"></i></button><!-- cierre boton modal -->

                                                    <!-- Abre Modal Actualizar categorías-->
                                                    <div class="modal fade" id="modal-update<?php echo $categoria_dato['id_categoria']; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h4 class="modal-title">Actualización de la Categoría</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group" style="text-align: start;">
                                                                                <label for="nombre_categoria">Nombre de la Categoría</label>
                                                                                <input type="text" id="nombre_categoria<?php echo $categoria_dato['id_categoria']; ?>" class="form-control" value="<?php echo $categoria_dato['nombre_categoria']; ?>">
                                                                                <small style="color: red; display: none;" id="lbl_update<?php echo $categoria_dato['id_categoria'];?>">* Este campo es obligatorio</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" id="btn_update<?php echo $categoria_dato['id_categoria']; ?>" class="btn btn-success">Guardar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- Cierre Modal Actualizar categorías-->

                                                    <script>
                                                        $("#btn_update<?php echo $categoria_dato['id_categoria']; ?>").click(function() {
                                                            // alert("<?php echo $categoria_dato['id_categoria']; ?>")

                                                            var nombre_categoria = $("#nombre_categoria<?php echo $categoria_dato['id_categoria']; ?>").val();
                                                            if (nombre_categoria == '') {
                                                                $("#nombre_categoria<?php echo $categoria_dato['id_categoria'];?>").focus();
                                                                $("#lbl_update<?php echo $categoria_dato['id_categoria'];?>").css('display', 'block');
                                                            } else {
                                                                var id_categoria = '<?php echo $categoria_dato['id_categoria']; ?>';
                                                                var url = "../app/controllers/categorias/update_de_categorias.php";

                                                                $.post(url, {
                                                                    nombre_categoria: nombre_categoria,
                                                                    id_categoria: id_categoria
                                                                }, function(data, textStatus, jqXHR) {
                                                                    $("#respuesta_update<?php echo $categoria_dato['id_categoria']; ?>").html(data);
                                                                }, );
                                                            }
                                                        });
                                                    </script>
                                                    <div id="respuesta_update<?php echo $categoria_dato['id_categoria']; ?>"></div>

                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre de la categoría</th>
                                        <th>Acciones</th>
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Categorías",
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

<!-- Abre Modal Registro categorías-->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Creación de una nueva Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nombre_categoria">Nombre de la Categoría *</label>
                            <input type="text" id="nombre_categoria" class="form-control">
                            <small style="color: red; display: none;" id="lbl_create">* Este campo es obligatorio</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btn_create" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div><!-- Cierre Modal Registro categorías-->

<script>
    $("#btn_create").click(function() {
        // alert("gaurdado");
        var nombre_categoria = $("#nombre_categoria").val();

        if (nombre_categoria == '') {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display', 'block');
        } else {
            var url = "../app/controllers/categorias/registro_de_categorias.php";
            $.post(url, {
                    nombre_categoria: nombre_categoria
                },
                function(data, textStatus, jqXHR) {
                    $("#respuesta").html(data);
                });
        }
    });
</script>
<div id="respuesta"></div>