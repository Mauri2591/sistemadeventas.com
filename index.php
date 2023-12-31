<?php
include 'app/config.php';
include 'layout/sesion.php';
include 'layout/parte1.php';
include 'app/controllers/usuarios/listado_de_usuarios.php';
include 'app/controllers/roles/listado_de_roles.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">Bienvenido al Sistema de Ventas - <?php echo $rol_sesion;?></h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <div class="container-fluid">
      Contenido del sistema
      <br>
      <br>

      <div class="row">

        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="fas fa-shopping-cart"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div> -->

        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Bounce Rate</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-bar"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div> -->

        <div class="col-lg-3 col-6">
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $contador_de_usuarios = 0;
              foreach ($usuarios_datos as $key => $value) {
                $contador_de_usuarios = $contador_de_usuarios + 1;
              } ?>
              <h3><?php echo ($contador_de_usuarios); ?></h3>

              <p>Usuarios registrados</p>
            </div>
            <a href="<?php echo $URL;?>/usuarios/create.php">
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            </a>
            <a href="<?php echo $URL ?>/usuarios" class="small-box-footer">
              Mas detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $contador_de_roles = 0;
              foreach ($roles_datos as $key => $rol_dato) {
                $contador_de_roles = $contador_de_roles + 1;
              } ?>
              <h3><?php echo ($contador_de_roles); ?></h3>

              <p>Roles registrados</p>
            </div>
            <a href="<?php echo $URL;?>/roles/create.php">
              <div class="icon">
                <i class="fas fa-address-card"></i>
              </div>
            </a>
            <a href="<?php echo $URL ?>/roles" class="small-box-footer">
              Mas detalle <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <!-- <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div> -->

      </div>

    </div>
  </div>

</div>



<?php
include 'layout/parte2.php';
