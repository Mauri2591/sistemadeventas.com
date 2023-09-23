<?php
include '../../config.php';

$nombres = $_POST['nombres'];
$email = $_POST['email'];
$password_user = $_POST['password_user'];
$password_repeat = $_POST['password_repeat'];
$id_usuario = $_POST['id_usuario'];
$rol = $_POST['id_rol'];

if($password_user == ''){
    if ($password_user === $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT, ['cost' => 10]);
    
        $sentencia = $pdo->prepare("UPDATE tb_usuarios SET nombres=:nombres, 
                                                        email=:email,
                                                        id_rol=:id_rol,
                                                        fyh_actualizacion=:fyh_actualizacion 
                                                    WHERE id_usuario=:id_usuario");
        $sentencia->bindParam('nombres', $nombres, PDO::PARAM_STR);
        $sentencia->bindParam('email', $email, PDO::PARAM_STR);
        $sentencia->bindParam('id_rol', $rol, PDO::PARAM_STR);
        $sentencia->bindParam('fyh_actualizacion', $fechayHora);
        $sentencia->bindParam('id_usuario', $id_usuario,PDO::PARAM_INT);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: ' . $URL . '/usuarios');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/usuarios/update.php?id='.$id_usuario);
    }
}else{
    if ($password_user === $password_repeat) {
        $password_user = password_hash($password_user, PASSWORD_DEFAULT, ['cost' => 10]);
    
        $sentencia = $pdo->prepare("UPDATE tb_usuarios SET nombres=:nombres, 
                                                        email=:email,
                                                        id_rol=:id_rol,
                                                        password_user=:password_user, 
                                                        fyh_actualizacion=:fyh_actualizacion 
                                                    WHERE id_usuario=:id_usuario");
    
        $sentencia->bindParam('nombres', $nombres, PDO::PARAM_STR);
        $sentencia->bindParam('email', $email, PDO::PARAM_STR);
        $sentencia->bindParam('id_rol', $rol, PDO::PARAM_STR);
        $sentencia->bindParam('password_user', $password_user, PDO::PARAM_STR);
        $sentencia->bindParam('fyh_actualizacion', $fechayHora);
        $sentencia->bindParam('id_usuario', $id_usuario,PDO::PARAM_INT);
        $sentencia->execute();
        session_start();
        $_SESSION['mensaje'] = "Usuario actualizado correctamente";
        $_SESSION['icono'] = "success";
        header('Location: ' . $URL . '/usuarios');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/usuarios/update.php?id='.$id_usuario);
    }
}
