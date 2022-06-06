<?php
error_reporting(0);
$conexion = mysqli_connect("localhost","root","fabricandomarcas","examen_psicometrico");
mysqli_query($conexion,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
ini_set('memory_limit', '512M');
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d");
$anio = substr($hoy,0,4);
require_once('../../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../../includes/Mobile_Detect.php');
require_once('../../includes/globals.php');
require_once('../../includes/funciones.php');

session_start();
if (!isset($_SESSION['id_admin']))
{
	header("location:login");
}

?>