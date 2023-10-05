<?php
include '../../config.php';

$codigo = $_POST['codigo'];
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];

$nombreDelArchivo=date('Y-m-d-h-i-s');
$filename=$nombreDelArchivo."__".$_FILES['image']['name'];
$location="../../../almacen/img_productos/".$filename;
move_uploaded_file($_FILES['image']['tmp_name'],$location);

$image = $_POST['image'];


$sentencia = $pdo->prepare("INSERT INTO tb_almacen (codigo,id_categoria,nombre,id_usuario,descripcion,stock,stock_minimo,stock_maximo,precio_compra,precio_venta,fecha_ingreso,imagen,fyh_creacion) 
                            VALUES (:codigo,:id_categoria,:nombre,:id_usuario,:descripcion,:stock,:stock_minimo,:stock_maximo,:precio_compra,:precio_venta,:fecha_ingreso,:imagen,:fyh_creacion)");
$sentencia->bindParam('codigo', $codigo, PDO::PARAM_STR);
$sentencia->bindParam('id_categoria', $id_categoria, PDO::PARAM_INT);
$sentencia->bindParam('nombre', $nombre, PDO::PARAM_STR);
$sentencia->bindParam('id_usuario', $id_usuario, PDO::PARAM_INT);
$sentencia->bindParam('descripcion', $descripcion, PDO::PARAM_STR);
$sentencia->bindParam('stock', $stock, PDO::PARAM_STR);
$sentencia->bindParam('stock_minimo', $stock_minimo, PDO::PARAM_STR);
$sentencia->bindParam('stock_maximo', $stock_maximo, PDO::PARAM_STR);
$sentencia->bindParam('precio_compra', $precio_compra, PDO::PARAM_STR);
$sentencia->bindParam('precio_venta', $precio_venta, PDO::PARAM_STR);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso, PDO::PARAM_STR);
$sentencia->bindParam('imagen', $filename, PDO::PARAM_STR);
$sentencia->bindParam('fyh_creacion', $fechayHora, PDO::PARAM_STR);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Producto registrado correctamente";
    $_SESSION['icono'] = "success";
    header('Location: ' . $URL . '/almacen');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error, producto no registrado";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/create.php');
}
