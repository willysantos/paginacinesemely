<?php
/**
 * Created by PhpStorm.
 * User: ledin
 * Date: 7/31/2018
 * Time: 11:06 PM
 */
session_start();

//require_once "../conexion/conexion.php";
require '../../../../CE/cinesEmely/modoadmin/conexion/conexion.php';



$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']:false;

$errores='';





/*////////////////////////////////////////////////////////////////*/

if(!empty($_POST)){
    $nombre_usuario = isset($_POST["usuario"])? $_POST["usuario"]: '';
    $clave = isset($_POST["contrasena"])? $_POST["contrasena"]: '';
    $cargo = isset($_POST["select_cargo"])? $_POST["select_cargo"]: '';

    $resultado= $pdo->query("SELECT * FROM usuario".
        " WHERE usuario = '{$nombre_usuario}'".
        " AND contrasena ='{$clave}'".
        " AND tipo_usuario= '{$cargo}'");

    $usuario =$resultado->fetch(PDO::FETCH_ASSOC);

    if ($usuario === false){
        $errores.='La combinacion usuario-contraseña es incorrecta<br/>';
    }else{
        if ($cargo==='Administrador'){
            $_SESSION['usuario']=$usuario['nombre_usuario'];
            $_SESSION['iniciado']=true;
            header("Location: ../GestiondeFranquicias/principal_gestion_franquicias.php");
            exit;

        }elseif ($cargo==='Admin_Fran'){
            $_SESSION['usuario']=$usuario['nombre_usuario'];
            $_SESSION['iniciado']=true;
            header("Location: ../../../../cinesEmely/AdF/adf.php");
            exit;
        }
    }


}



?>



<html>
<head>
    <title>Inicio de Sesion al Sistema</title>
    <link rel="stylesheet" href="iniSession.css">
</head>


<body>
<div class="wrap">
    <form action="" method="post">
        <!--    <label for="usuario">Nombre Usuario</label>-->
           <h1>Cines Emely</h1>
           <h2>Iniciar Sesión</h2>
        <br>

        <input type="text"  name="usuario" id="usuario" placeholder="Nombre Usuario">
        <br>


        <!--    <label for="contrasena"> Contraseña</label>-->
        <input type="password"  name="contrasena" id="contrasena" placeholder="Contraseña">
        <br>


        <select name="select_cargo">
            <option value="Administrador">Administrador</option>
            <option value="Admin_Fran">Administrador de Fanquicia</option>
            <option value="Ventas">Ventas</option>
        </select>


        <?php if (!empty($errores)): ?>
            <div class="error">
                <?php echo $errores;?>
            </div>
        <?php endif; ?>

        <img src="Login.png" width="190px">
        <input type="submit" value="Iniciar Sesion">


    </form>
</div>
</body>
</html>
