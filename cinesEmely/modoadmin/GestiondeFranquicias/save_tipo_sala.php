<?php
require '../conexion/conexion.php';
if (!empty($_POST)){
    $nombre = $_POST['nombre_sala'];
    $inser = $pdo->exec("insert into tipo_sala(nombre)".
        " values ('{$nombre}')");
    header("Location: tiposdesala.php");
    exit();
}