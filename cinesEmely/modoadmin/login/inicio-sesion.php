<?php
/**
 * Created by PhpStorm.
 * User: ledin
 * Date: 7/31/2018
 * Time: 11:06 PM
 */
session_start();

require_once "../conexion/conexion.php";



$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']:false;

if (!$iniciado){

    if(!empty($_POST)){
        $nombre_usuario = isset($_POST["usuario"])? $_POST["usuario"]: '';
        $clave = isset($_POST["contrasena"])? $_POST["contrasena"]: '';
        $resultado= $pdo->query("SELECT * FROM usuario".
            " WHERE usuario = '{$nombre_usuario}'".
            " AND contrasena ='{$clave}'");

        $usuario =$resultado->fetch(PDO::FETCH_ASSOC);

        if ($usuario === false){
            echo 'La combinacion usuario-contraseña no existe';
        }else{
            $_SESSION['usuario']=$usuario['nombre_usuario'];
            $_SESSION['iniciado']=true;
            header("Location: ../GestiondeFranquicias/principal_gestion_franquicias.php");
            exit;
        }


    }

}else{

    header("Location: ");
//    exit();

}

?>



<html>
<head>
    <title>Inicio de Sesion al Sistema</title>
    <link rel="stylesheet" href="iniSession.css">
</head>


<body>
<div class="wrap">
<form action="" method="post" class="modform">

<!--    <label for="usuario">Nombre Usuario</label>-->
    <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre Usuario">
    <br>


<!--    <label for="contrasena"> Contraseña</label>-->
    <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Contraseña">
    <br>
    <select name="select_usuario" id="select_usuario">
        <option value="Ventas">Ventas</option>
        <option value="Admin_Fran">Admin. de Franquicia</option>
        <option value="Administrador">xxxxxxxxxxxxx</option>
    </select>

    <input type="submit" value="Iniciar Sesion">
</form>
</div>
</body>
</html>
