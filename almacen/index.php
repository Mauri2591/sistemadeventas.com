<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/almacen/listado_de_productos.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Productos</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Productos registrados</h3>

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
                                        <th>Nro</th>
                                        <th>Código</th>
                                        <th>Categoría</th>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Stock</th>
                                        <th>Stock Min</th>
                                        <th>Stock Máx</th>
                                        <th>Precio Compra</th>
                                        <th>Precio Venta</th>
                                        <th>Fecha Compra</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include "../app/controllers/almacen/listado_de_productos.php"; ?>
                                    <?php foreach ($productos_datos as $key => $producto_dato) : ?>
                                        <tr>
                                            <td><?php echo ($key + 1); ?></td>
                                            <td><?php echo $producto_dato['codigo']; ?></td>
                                            <td><?php echo $producto_dato['categoria']; ?></td>
                                            <td>
                                                <img src="<?php echo $producto_dato['imagen']; ?>" width="100" height="100" alt="Coca-Cola">
                                            </td>
                                            <td><?php echo $producto_dato['nombre']; ?></td>
                                            <td><?php echo $producto_dato['descripcion']; ?></td>
                                            <td><?php echo $producto_dato['stock']; ?></td>
                                            <td><?php echo $producto_dato['stock_minimo']; ?></td>
                                            <td><?php echo $producto_dato['stock_maximo']; ?></td>
                                            <td><?php echo $producto_dato['precio_compra']; ?></td>
                                            <td><?php echo $producto_dato['precio_venta']; ?></td>
                                            <td><?php echo $producto_dato['fecha_ingreso']; ?></td>
                                            <td><?php echo $producto_dato['email']; ?></td>
                                            <td> <a href="" class="btn btn-sm btn-success"> <i class="fas fa-pencil-alt"></i></a> </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Producto",
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