<?php
include '../../config.php';

$id_categoria = $_POST['id_categoria'];
$nombre_categoria = $_POST['nombre_categoria'];



$sentencia = $pdo->prepare("UPDATE tb_categoria SET nombre_categoria=:nombre_categoria, 
                                                        fyh_actualizacion=:fyh_actualizacion 
                                                    WHERE id_categoria=:id_categoria");
$sentencia->bindParam('nombre_categoria', $nombre_categoria, PDO::PARAM_STR);
$sentencia->bindParam('id_categoria', $id_categoria, PDO::PARAM_INT);
$sentencia->bindParam('fyh_actualizacion', $fechayHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Categoría actualizada correctamente";
    $_SESSION['icono'] = "success";
    // header('Location: ' . $URL . '/roles');
?>
    <script>
        window.location.href = "<?php echo $URL; ?>/categorias";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error, no se pudo actualizar la categoría";
    $_SESSION['icono'] = "error";
    // header('Location: ' . $URL . '/roles/update.php?id='.$id_rol);
?>
    <script>
        window.location.href = "<?php echo $URL; ?>/categorias";
    </script>
<?php
}
