<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/almacen/listado_de_productos.php';
include '../app/controllers/categorias/listado_de_categorias.php';


if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje']; ?>

    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '<?php echo  $respuesta; ?>',
            showConfirmButton: false,
            timer: 1200
        });
    </script>

<?php
    unset($_SESSION['mensaje']);
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Creación de Productos</h1>
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
                            <h3 class="card-title">Desde esta vista puede crear nuevos Productos</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Formulario creación de usuarios -->
                                    <form action="../app/controllers/almacen/create.php" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Código:</label>
                                                            <?php   //Funcion para tener un contador para el codigo de producto, trae el valor de la BD mediante el controlador $productos_datos y le suma 1
                                                                function ceros($numero){
                                                                    $len=0;
                                                                    $cantidad_ceros=5;
                                                                    $aux=$numero;
                                                                    $pos=strlen($numero);
                                                                    $len=$cantidad_ceros-$pos;
                                                                    for($i=0; $i < $len; $i++){
                                                                        $aux="0".$aux;
                                                                    }
                                                                    return $aux;
                                                                }
                                                                $contador_de_id_producto=1;
                                                                foreach ($productos_datos as $key => $producto_dato) {
                                                                    $contador_de_id_producto=$contador_de_id_producto+1;
                                                                }
                                                            ?>
                                                            <input type="text" class="form-control" value="<?php echo ceros($contador_de_id_producto);?>" disabled>
                                                                <input type="hidden" name="codigo" hidden value="<?php echo ceros($contador_de_id_producto);?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="">Categoría:</label>
                                                            <div class="d-flex align-items-center">
                                                            <select name="id_categoria" class="form-control mr-1" id="" required>
                                                                <?php foreach ($categorias_datos as $categoria_dato) : ?>
                                                                <option value="<?php echo $categoria_dato['id_categoria'];?>"><?php echo $categoria_dato['nombre_categoria'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                            <a href="<?php echo $URL;?>/categorias/" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                                                            </div>
                                                     
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Nombre de Producto:</label>
                                                            <input type="text" class="form-control" name="nombre" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Usuario:</label>
                                                            <input type="text" class="form-control" value="<?php echo $email_sesion;?>" disabled>
                                                            <input type="hidden" name="id_usuario" hidden value="<?php echo $id_usuario_sesion;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            <label for="">Descripción del Producto:</label>
                                                            <textarea class="form-control" name="descripcion" id="" rows="2"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4"></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock:</label>
                                                            <input type="number" class="form-control" name="stock" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock Mínimo:</label>
                                                            <input type="number" class="form-control" name="stock_minimo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock Máximo:</label>
                                                            <input type="number" class="form-control" name="stock_maximo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio Compra:</label>
                                                            <input type="text" class="form-control" name="precio_compra" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio Venta:</label>
                                                            <input type="text" class="form-control" name="precio_venta" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Fecha Ingreso:</label>
                                                            <input type="date" class="form-control" name="fecha_ingreso">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Imagen:</label>
                                                    <input type="file" name="image" accept="image/*" class="form-control" accept="images/.png,.jpg" onchange="previewImage(event, '#imgPreview')">
                                                    <img id="imgPreview" width="100%" height="200px">

                                                    <script>
                                                        function previewImage(event, querySelector) {
                                                            //Recuperamos el input que desencadeno la acción
                                                            const input = event.target;
                                                            //Recuperamos la etiqueta img donde cargaremos la imagen
                                                            $imgPreview = document.querySelector(querySelector);
                                                            // Verificamos si existe una imagen seleccionada
                                                            if (!input.files.length) return
                                                            //Recuperamos el archivo subido
                                                            file = input.files[0];
                                                            //Creamos la url
                                                            objectURL = URL.createObjectURL(file);
                                                            //Modificamos el atributo src de la etiqueta img
                                                            $imgPreview.src = objectURL;
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a class="btn btn-secondary" href="index.php" type="submit">Cancelar</a>
                                            <button class="btn btn-info">Guardar Producto</button>
                                        </div>
                                </div>
                                </form><!-- Cierre formulario creación de usuarios -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- /.content-wrapper -->



<?php
include '../layout/mensajes.php';
include '../layout/parte2.php';
