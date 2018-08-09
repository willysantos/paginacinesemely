<?php
require '../conexion/conexion.php';
$letra=$_POST['letra'];
$longitud=$_POST['num'];
$tipo_sala=$_POST['select_tiposala'];
for ($i=1;$i<=$longitud;$i++){
    $enviar=$letra.$i;
    $into=$pdo->exec("insert into butacas(localidad_asiento, id_sala)".
    " values('{$enviar}', {$tipo_sala})");
}
header("Location: principal_gestion_franquicias.php");
exit();
