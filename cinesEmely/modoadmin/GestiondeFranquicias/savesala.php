<?php
require '../conexion/conexion.php';
$codigo=$_POST['id_franquicia'];
$estado='Activo';
$sala=$_POST['select_sala'];
$insert=$pdo->exec("insert into sala(nombre_sala, id_franquicia, estado)".
 " values ('{$sala}',{$codigo},'{$estado}')");
header("Location: newFranquicia.php");
exit();