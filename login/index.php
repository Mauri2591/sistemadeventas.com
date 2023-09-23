<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/templates/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../public/templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/templates/dist/css/adminlte.min.css">

  <!-- Sweet Alert -->
  <script src="../public/js/sweet_alert.js"></script>

</head>

<body class="hold-transition login-page">

  <?php
  session_start();
  if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
  ?>
    <script>
      Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: '<h3><?php echo $respuesta; ?></h3>',
        showConfirmButton: false,
        timer: 1000
      });
    </script>
  <?php
  }
  ?>

  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <img src="../public/img/icono_pagina_login.png" width="200" height="200" alt="">
        <a href="http://localhost/sistemadeventas.com/login" class="h1"><b>Sistema</b> de ventas</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <!-- Formulario de Login -->
        <form action="../app/controllers/login/ingreso.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password_user" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Ingreso</button>
            </div>
            <!-- /.col -->
          </div>
        </form><!-- Final de formulario de Login -->

      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../public/templates/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../public/templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../public/templates/dist/js/adminlte.min.js"></script>
</body>

</html>