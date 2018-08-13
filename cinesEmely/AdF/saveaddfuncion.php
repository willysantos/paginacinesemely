<?php
require '../modoadmin/conexion/conexion.php';

$id_preparacion=$_POST['id_pre'];
$sala=$_POST['select_sala'];
var_dump($sala);
$fecha_limite=$_POST['fecha'];
$hora=$_POST['time'];
$precio=$_POST['precio'];

$insert=$pdo->exec("insert into funcion (id_preparacion, id_sala, fecha_final_tanda, hora, precio)".
" value({$id_preparacion}, '{$sala}','{$fecha_limite}','{$hora}','{$precio}')");

header("Location: vertanda.php");
exit();