<?php
include '../../config.php';

$nombres=$_POST['nombres'];
$email=$_POST['email'];
$id_rol=$_POST['id_rol'];
$password_user=$_POST['password_user'];
$password_repeat=$_POST['password_repeat'];

if($password_user === $password_repeat){
    $password_user = password_hash($password_user,PASSWORD_DEFAULT,['cost'=>12]);

    $sentencia=$pdo->prepare("INSERT INTO tb_usuarios(nombres, email,id_rol,password_user,fyh_creacion) 
                                VALUES (:nombres, :email,:id_rol,:password_user,:fyh_creacion)");
$sentencia->bindParam('nombres',$nombres,PDO::PARAM_STR);
$sentencia->bindParam('email',$email,PDO::PARAM_STR);
$sentencia->bindParam('id_rol',$id_rol,PDO::PARAM_STR);
$sentencia->bindParam('password_user',$password_user,PDO::PARAM_STR);
$sentencia->bindParam('fyh_creacion',$fechayHora);
$sentencia->execute();
session_start();
$_SESSION['mensaje'] = "Usuario registrado correctamente";
header('Location: '.$URL.'/usuarios');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error, las contraseñas no son iguales";
    header('Location: '.$URL.'/usuarios/create.php');
}

