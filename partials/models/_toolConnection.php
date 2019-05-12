<?php
if (!isset($_SESSION)) session_start();
try{
    $db = new PDO('mysql:host=localhost;dbname=end_project;charset=utf8mb4', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $exception)
{
    die( 'Erreur : ' . $exception->getMessage() );
}

setlocale(LC_TIME, "fr_FR");