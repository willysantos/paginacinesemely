<?php
/**
 * Created by PhpStorm.
 * User: ledin
 * Date: 7/31/2018
 * Time: 11:06 PM
 */

require_once "../conexion/conexion.php";
//require '../../../../CE/cinesEmely/modoadmin/conexion/conexion.php';



$iniciado = isset($_SESSION['usuario'])? $_SESSION['iniciado']:false;
if (!$iniciado){
    if(!empty($_POST)){
        $nombre_usuario = isset($_POST["usuario"])? $_POST["usuario"]: '';
        $clave = isset($_POST["contrasena"])? $_POST["contrasena"]: '';
        $resultado= $pdo->query("SELECT * FROM usuario".
            " WHERE usuario = '{$nombre_usuario}'".
            " AND contrasena ='{$clave}'");
        echo "si";
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