<?php
error_reporting(0);
require_once('includes/conexion.php');
require_once('includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('includes/Mobile_Detect.php');
require_once('includes/globals.php');
require_once('includes/funciones.php');

if (file_exists('sistema/archivos/oferta_educativa/Doctorado_Educacion.pdf'))
{
	$archivos[] = 'sistema/archivos/oferta_educativa/Doctorado_Educacion.pdf';
}
$correo = 'christhian.sosa@gmail.com';
$nombre = 'Tu caballote';
$asunto = 'Información';
$nivel = '1';
$oferta = 'Lo que sea';
echo mandar_correo_prospectos($correo,$nombre,$asunto,$nivel,$oferta,$archivos);

?>