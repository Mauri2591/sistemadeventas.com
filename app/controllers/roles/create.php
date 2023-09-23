<?php
include '../../config.php';

$rol = $_POST['rol'];

$sentencia = $pdo->prepare("INSERT INTO tb_roles (rol, fyh_creacion) VALUES (:rol, :fyh_creacion)");
$sentencia->bindParam('rol', $rol, PDO::PARAM_STR);
$sentencia->bindParam('fyh_creacion', $fechayHora, PDO::PARAM_STR);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Rol registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/roles');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error, rol no registrado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/roles/create.php');
}
