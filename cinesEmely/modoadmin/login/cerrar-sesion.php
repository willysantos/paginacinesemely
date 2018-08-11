<?php
/**
 * Created by PhpStorm.
 * User: ledin
 * Date: 8/10/2018
 * Time: 8:54 PM
 */

session_start();

session_destroy();
header("Location: inicio-sesion.php");


exit;
?>