<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/usuarios/update_usuarios.php';
include '../app/controllers/roles/listado_de_roles.php';

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar Usuario</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Desde esta vista puede modificar este usuario</h3>
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
                                    <form action="../app/controllers/usuarios/update.php" method="post">
                                        <input type="hidden" name="id_usuario" hidden value="<?php echo $id_usuario_get; ?>">
                                        <div class="form-group">
                                            <label for="nombres">Nombres</label>
                                            <input class="form-control" type="text" value="<?php echo $nombres; ?>" name="nombres" id="nombres" placeholder="Ingrese el nombre del nuevo usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input class="form-control" type="text" value="<?php echo $email; ?>" name="email" id="email" placeholder="Ingrese el e-mail del nuevo usuario" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Rol usuario</label>
                                            <select name="id_rol" id="rol" class="form-control">

                                                <?php foreach ($roles_datos as $rol_dato) :
                                                    $rol_tabla = $rol_dato['rol'];
                                                ?>
                                                    <option value="<?php echo $rol_dato['id_rol'];?>" <?php if ($rol_tabla == $rol) { ?> selected="selected" <?php };?>>
                                                        <?php echo $rol_tabla; ?>
                                                    </option>
                                                <?php endforeach; ?>

                                            </select>
                                            <!-- <select name="id_rol" id="" class="form-control">
                                                        <option <?php $rol_tabla === $rol ? 'selected' : '' ?> value="<?php echo $rol_dato['id_rol']; ?>"><?php echo $rol; ?></option>
                                            </select> -->
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="text" name="password_user" id="password_user">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Repita el Password</label>
                                            <input class="form-control" type="text" name="password_repeat" id="password_repeat">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button class="btn btn-success">Actualizar</button>
                                            <a class="btn btn-secondary" href="index.php" type="submit">Cancelar</a>
                                        </div>
                                </div>
                                </form><!-- Cierre formulario creación de usuarios -->
                            </div>
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
