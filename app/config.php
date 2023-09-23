<?php
define("SERVIDOR","localhost");
define("USUARIO","root");
define("PASSWORD","");
define("DB","sistema_de_ventas_otro");

$servidor="mysql:dbname=".DB.";host=".SERVIDOR;
try {
    $pdo=new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
} catch (\PDOException $e) {
    // echo $e->getMessage();
    echo "Error de conexion";
}
$URL="http://localhost/sistemadeventas.com";

date_default_timezone_set("America/Argentina/Buenos_Aires");
$fechayHora=date("Y-m-d H:m:s");
