<?php
include '../app/config.php';
include '../layout/sesion.php';
include '../layout/parte1.php';
include '../app/controllers/usuarios/show_usuarios.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Detalle des usuario</h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Desde esta vista puede ver el detalle de este usuario</h3>
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
                    <div class="form-group">
                      <label for="nombres">Nombres</label>
                      <input class="form-control" type="text" name="nombres" value="<?php echo $nombres;?>" id="nombres" disabled>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input class="form-control" type="text" name="email" id="email" value="<?php echo $email;?>" disabled>
                    </div>
                    <div class="form-group">
                      <label for="text">Rol</label>
                      <input class="form-control" type="text" name="email" id="email" value="<?php echo $rol;?>" disabled>
                    </div>
                    <hr>
                    <div class="form-group">
                      <a class="btn btn-secondary" href="index.php" type="submit">Volver</a>
                    </div>
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

