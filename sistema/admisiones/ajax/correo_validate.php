<?php 
session_start();
error_reporting(E_ALL);
include("../../../includes/class/allClass.php");
include_once("../../../includes/funciones.php");
header('Content-Type: text/html; charset=utf-8');
use nsaspirantes\aspirantes;
use nsfunciones\funciones;

$fn = new funciones();
$get = new aspirantes();

$correo = filter_input(INPUT_POST, 'correo_val', FILTER_SANITIZE_SPECIAL_CHARS);

$correoaspirante = $get->obtener_correo($correo);

if($correo == isset($correoaspirante['correo'][0])){
    echo "false";
}else{
    echo "true";
}

