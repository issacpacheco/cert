<?php
require_once('../../includes/conexion.php');
if (isset($_POST['correo']) && isset($_POST['pass']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM si_usuarios WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' AND pass = '".mysqli_real_escape_string($conexion,$_POST['pass'])."' LIMIT 1");
	if (mysqli_num_rows($consulta)==0)
	{
		//Verificar si es alumno
		$consulta = mysqli_query($conexion,"SELECT * FROM alumnos WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' AND pass = '".mysqli_real_escape_string($conexion,$_POST['pass'])."' LIMIT 1");	
		if (mysqli_num_rows($consulta)==0)
		{
			echo "-1";//No esta registrado el correo
			exit();
		}
		else
		{
			$d['id_area'] = 0;
			$d['nivel'] = 0;
		}
	}
	
	$d = mysqli_fetch_array($consulta);
	//Iniciar sesión
	session_start();
	$_SESSION['id'] = $d['id'];
	$_SESSION['id_area'] = $d['id_area'];
	$_SESSION['nivel'] = $d['nivel'];
	$_SESSION['id_campus'] = $d['id_campus'];
	$_SESSION['nombre'] = $d['nombre'];
	$_SESSION['paterno'] = $d['paterno'];
	$_SESSION['materno'] = $d['materno'];
	$_SESSION['correo'] = $d['correo'];
	$_SESSION['genero'] = $d['genero'];
	
	//ALUMNOS
	$_SESSION['matricula'] = $d['matricula'];
	
	echo "1";
	exit();
	
}
else
{
	header("location:../");	
}
?>