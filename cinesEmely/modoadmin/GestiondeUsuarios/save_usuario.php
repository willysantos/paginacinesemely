<?php
require '../conexion/conexion.php';
if (!empty($_POST)){
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $franquicia = $_POST['select_franquicia'];
    $tipo_usuarip = $_POST['select_tipo'];
    $estado='Activo';
    $inser=$pdo->exec("insert into usuario(usuario, contrasena, estado, id_franquicia, tipo_usuario)".
     " values('{$usuario}','{$contrasena}','{$estado}', {$franquicia}, '{$tipo_usuarip}')");
    header("Location: principal_gestion_usuarios.php");
    exit();
}