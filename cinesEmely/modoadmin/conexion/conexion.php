<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set("display_errors", 1);
$pdo = new PDO("mysql:dbname=cinesemely;host=165.227.79.101",
    "root",
    "w1234567890d",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);