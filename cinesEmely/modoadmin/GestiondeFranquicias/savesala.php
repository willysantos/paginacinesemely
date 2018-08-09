<?php
require '../conexion/conexion.php';
$codigo=$_POST['id_franquicia'];
$estado='Activo';
$sala=$_POST['select_sala'];
$con=$pdo->query("select franquicias.id_franquicia from sala".
" inner join franquicias on franquicias.id_franquicia = sala.id_franquicia".
" where franquicias.id_franquicia={$codigo}");
$cantidad=1;
foreach ($con as $c):
    $cantidad=$cantidad+1;
endforeach;
$nom='sala '.$cantidad;
$insert=$pdo->exec("insert into sala(id_franquicia, estado, id_tipodesala, nombre_sala)".
 " values ({$codigo},'{$estado}', {$sala}, '{$nom}')");
header("Location: newFranquicia.php");
exit();