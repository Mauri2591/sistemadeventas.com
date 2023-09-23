<?php
include "../../config.php";
$email=$_POST['email'];
$password_user=$_POST['password_user'];

$sql="SELECT * FROM tb_usuarios WHERE email = '$email'";
$query= $pdo->prepare($sql);
$query->execute();
$usuarios=$query->fetchAll(PDO::FETCH_ASSOC);
$contador=0;
foreach ($usuarios as $key => $usuario) {
    $contador=$contador+1;
    $email_tabla=$usuario['email'];
    $nombres_tabla=$usuario['nombres'];
    $pasword_user_tabla=$usuario['password_user'];
}
if(password_verify($password_user,$pasword_user_tabla)){
    session_start();
    $_SESSION['sesion_email']=$email_tabla;
    $_SESSION['nombres']=$nombres_tabla;
    header('Location:'.$URL.'/index.php');

}else{
    session_start();
    $_SESSION['mensaje']="Error, datos incorrectos";
    header("Location:".$URL);
}