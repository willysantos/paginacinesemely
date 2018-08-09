<?php
require '../conexion/conexion.php';
$id=$_POST['cod'];
$contrasena=$_POST['contrasena'];
$estado=$_POST['select_estado'];
$localidad=$_POST['select_localidad'];
$usuario=$_POST['select_tipousuario'];
$insert=$pdo->exec("update usuario set contrasena='{$contrasena}', estado='{$estado}', 
id_franquicia={$localidad}, tipo_usuario='{$usuario}'".
    " where id_usuario={$id}");
header("Location: principal_gestion_usuarios.php");
exit();