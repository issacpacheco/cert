<?php
require_once('../../includes/conexion.php');
require_once('../../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../../includes/Mobile_Detect.php');
require_once('../../includes/globals.php');
require_once('../../includes/funciones.php');
if (isset($_POST['correo']) && isset($_POST['nombre']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM prospectos WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' LIMIT 1");
	if (mysqli_num_rows($consulta)>0)
	{
		echo "-1";//Ya esta registrado el correo
		exit();
	}
	else
	{
		mysqli_query($conexion,"ALTER TABLE prospectos AUTO_INCREMENT = 0");
		if (mysqli_query($conexion,"INSERT INTO prospectos VALUES (
		'0',
		'1',
		'0',
		'0',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		'".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		'".mysqli_real_escape_string($conexion,$_POST['horario'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['medio'])."',
		'',
		'".$hoy."'
		)"))
		{
			echo md5(mysqli_insert_id($conexion));
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

			