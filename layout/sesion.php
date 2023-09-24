<?php
session_start();
if (isset($_SESSION['sesion_email']) || isset($_SESSION['nombres'])) {
  $email_sesion = $_SESSION['sesion_email'];
  $nombre_sesion = $_SESSION['nombres'];

  $sql= "SELECT us.id_usuario as id_usuario, us.nombres as nombres, 
          us.email as email, rol.rol as rol FROM tb_usuarios as us 
          INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol WHERE email='$email_sesion'";
  $query=$pdo->prepare($sql);
  $query->execute();
  $usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
  foreach ($usuarios as $key => $usuario) {
    $nombres_sesion=$usuario['nombres'];
    $rol_sesion=$usuario['rol'];
  }

} else {
  echo "No hay sesión";
  header("Location:" . $URL . "/login");
}