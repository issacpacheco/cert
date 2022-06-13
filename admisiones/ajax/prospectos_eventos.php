<?php
require_once('../../includes/conexion.php');
require_once('../../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../../includes/Mobile_Detect.php');
require_once('../../includes/globals.php');
require_once('../../includes/funciones.php');
if (isset($_POST['correo']) && isset($_POST['nombre']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM prospectos_eventos WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' LIMIT 1");
	if (mysqli_num_rows($consulta)>0)
	{
		echo "-1";//Ya esta registrado el correo
		exit();
	}
	else
	{
		mysqli_query($conexion,"ALTER TABLE prospectos_eventos AUTO_INCREMENT = 0");
		if (mysqli_query($conexion,"INSERT INTO prospectos_eventos VALUES (
		'0',
		'".mysqli_real_escape_string($conexion,$_POST['oferta'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		'".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		'".$hoy."'
		)"))
		{
			echo "1";
			exit();
		}
		else
		{
			echo "-2";
			exit();
		}
	}
}
else
{
	header("location:../");	
}
?>