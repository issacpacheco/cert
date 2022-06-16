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

$telefono = filter_input(INPUT_POST, 'telefono_val', FILTER_SANITIZE_SPECIAL_CHARS);

$telefonoaspirante = $get->obtener_telefono($telefono);

if($telefono == isset($telefonoaspirante['telefono'][0])){
    echo "false";
}else{
    echo "true";
}

