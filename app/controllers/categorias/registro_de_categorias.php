<?php
include '../../config.php';
$nombre_categoria=$_POST['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO tb_categoria (nombre_categoria,fyh_creacion) VALUES (:nombre_categoria,:fyh_creacion)");
$sentencia->bindParam('nombre_categoria', $nombre_categoria, PDO::PARAM_STR);
$sentencia->bindParam('fyh_creacion', $fechayHora, PDO::PARAM_STR);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoría registrada correctamente";
    $_SESSION['icono'] = "success";
    // header('Location: ' . $URL . '/categorias');
    ?>
    <script>
        window.location.href="<?php echo $URL;?>/categorias";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error, categoría no registrada";
    $_SESSION['icono'] = "error";
    // header('Location: '.$URL.'/categorias');
    ?>
    <script>
        window.location.href="<?php echo $URL;?>/categorias";
    </script>
    <?php
}
