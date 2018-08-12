<?php
/**
 * Created by PhpStorm.
 * User: ledin
 * Date: 7/31/2018
 * Time: 11:05 PM
 */

require_once "../conexion/conexion.php";


$mensajes=[];

if (!empty($_POST)){
    $nombre_usuario=$_POST['usuario'];
    $clave=$_POST['contrasena'];
    $confirmar_clave=$_POST['confirmar_contrasena'];

    if(empty($nombre_usuario || empty($clave)|| empty($confirmar_clave))){
        $mensajes[]=" Todos los campos son obligatorios!!!";
    }

    if ($clave != $confirmar_clave){
        $mensajes[]="Las contraseñas deben ser obligatorias";
    }


    if (empty($mensajes)){
//        Todo bien, insertar datos
        $filas_afectadas=$pdo->exec("INSERT INTO ".
            " usuario(usuario,contrasena)".
            " VALUES ('{$nombre_usuario}','{$clave}')");

        if ($filas_afectadas >=1){
            $mensajes[]="El usuario fue creado";
        }else{
            $mensajes[]="El usuario no fue creado";
        }
    }
}

?>



<html>
<head>
    <title>Creacion de Usuarios</title>
    <style rel="stylesheet" type="text/css">
        *{
            font-size: 18px;
            font-family: Arial;

        }
        body{
            background: #f3f3f3;
        }

        #form-registro{
            padding: 20px;
            width: 300px;
            margin: 25px auto 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 2px 1px 1px #616161;
        }
        .sec{
            padding: 10px 0 10px 0;
            display: flex;
            flex-direction: column;
        }

        .sec input{
            padding: 5px;
            border:0;
            border-bottom: 2px solid #87bdff;
            width: 250px;

        }

        .sec label{
            font-weight: bold;

        }
    </style>

</head>


<body>
<a href="../GestiondeFranquicias/principal_gestion_franquicias.php">aqui</a>

<form action="" method="post" id="form-registro">
    <div class="sec">
        <label for="usuario">Nombre de Usuario</label>
        <input type="text" name="usuario" id="usuario">

    </div>

    <div class="sec">
        <label for="contrasena">Contrasena</label>
        <input type="password" name="contrasena" id="contrasena">

    </div>

    <div class="sec">
        <label for="confirmar_contrasena">Confirmar Contrasena</label>
        <input type="password" name="confirmar_contrasena" id="confirmar_contrasena">

    </div>


    <input type="submit" value="Crear">

    <?php
    if (!empty($mensajes)):
        echo "<ul>";
        foreach ($mensajes as $mensaje){
            echo " <li>{$mensaje}</li>";
        }
        echo "</ul>";





    endif;
    ?>



    <a href="inicio-sesion.php">Iniciar Sesion</a>
</form>

</body>
</html>
