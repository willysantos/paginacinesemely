<?php
require '../conexion/conexion.php';

$id_pelicula=$_POST['select_pelicula'];
$id_ciudad=$_POST['select_ciudad'];
$id_franquicia=$_POST['select_franquicia'];
$fecha_esperada=$_POST['fecha'];

$insert=$pdo->exec("insert into pre(id_pelicula, id_ciudad, id_franquicia,
fecha_estreno_esperada) values ({$id_pelicula},{$id_ciudad},{$id_franquicia},'{$fecha_esperada}')");
header("Location: pre.php");
exit();
?>