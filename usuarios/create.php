<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/roles/listado_de_roles.php';

if (isset($_SESSION['mensaje'])) {
  $respuesta = $_SESSION['mensaje']; ?>

  <script>
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: '<?php echo  $respuesta;?>',
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
          <h1 class="m-0">Creación de Usuarios</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Desde esta vista puede crear nuevos Usuarios</h3>
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
                  <form action="../app/controllers/usuarios/create.php" method="post">
                    <div class="form-group">
                      <label for="nombres">Nombres</label>
                      <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Ingrese el nombre del nuevo usuario" required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input class="form-control" type="text" name="email" id="email" placeholder="Ingrese el e-mail del nuevo usuario" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Rol del usuario</label>
                      <select name="id_rol" id="" class="form-control">
                        <?php foreach($roles_datos as $rol_dato): ?>
                          <option value="<?php echo $rol_dato['id_rol'];?>"><?php echo $rol_dato['rol'];?></option>
                          <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input class="form-control" type="text" name="password_user" id="password" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Repita el Password</label>
                      <input class="form-control" type="text" name="password_repeat" id="password" required>
                    </div>
                    <hr>
                    <div class="form-group">
                      <button class="btn btn-primary">Guardar</button>
                      <a class="btn btn-secondary" href="index.php" type="submit">Cancelar</a>
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
include '../layout/parte2.php';
