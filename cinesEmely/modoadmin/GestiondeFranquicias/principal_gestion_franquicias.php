


<?php

session_start();

$iniciado = isset($_SESSION['iniciado'])? $_SESSION['iniciado']:false;


if (!$iniciado){
    header("../login/inicio-sesion.php");

}else{
    require '../menus/menu_lado.php';

}
?>