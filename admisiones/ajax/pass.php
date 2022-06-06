<?php
require_once('../../includes/conexion.php');
require_once('../../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../../includes/Mobile_Detect.php');
require_once('../../includes/globals.php');
require_once('../../includes/funciones.php');
if (isset($_POST['correo']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' LIMIT 1");
	if (mysqli_num_rows($consulta)==0)
	{
		echo "-1";//No esta registrado el correo
		exit();
	}
	else
	{
		$d = mysqli_fetch_array($consulta);	
		$correos=[$d['correo']];
		$nombres=[$d['pass']];
		$asunto = "Recibimos una solicitud de recuperación de contraseña";
		$mensaje = '
		<h1>Hola ' . $d[ 'nombre' ].' '.$d[ 'paterno' ].' '.$d[ 'materno' ].'</h1>
		<h3>Recibimos una solicitud de recuperación de contraseña</h3>
		<br>
		<h3>Correo: <strong>'.$d['correo'].'</strong></h3>
		<h3>Contraseña: <strong>'.$d['pass'].'</strong></h3>
		<br>
		<h2>Saludos cordiales</h2>';
		echo mandar_correo($correos,$nombres,$asunto,$mensaje,$archivos);
		exit();
	}
}
else
{
	header("location:../");	
}

?>