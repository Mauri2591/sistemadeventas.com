<?php
$id_usuario_get=$_GET['id'];
$sql_usuarios="SELECT us.id_usuario as id_usuario, us.nombres as nombres, 
                us.email as email, rol.rol as rol FROM tb_usuarios as us 
                INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol 
                WHERE id_usuario='$id_usuario_get'";
$query_usuarios=$pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos=$query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $key => $usuario_dato) {
    $nombres=$usuario_dato['nombres'];
    $email=$usuario_dato['email'];
    // $pasword_user=$usuario_dato['password_user'];
    $rol=$usuario_dato['rol'];
}
