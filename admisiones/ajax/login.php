<?php
require_once('../../includes/conexion.php');
if (isset($_POST['correo']) && isset($_POST['pass']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' AND pass = '".mysqli_real_escape_string($conexion,$_POST['pass'])."' LIMIT 1");
	if (mysqli_num_rows($consulta)==0)
	{
		echo "-1";//No esta registrado el correo
		exit();
	}
	else
	{
		$d = mysqli_fetch_array($consulta);
		//Iniciar sesión
		session_start();
		$_SESSION['id'] = $d['id'];
		echo "1";
		exit();
	}
}
else
{
	header("location:../");	
}
?>