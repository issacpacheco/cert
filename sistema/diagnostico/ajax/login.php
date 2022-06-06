<?php
require_once '../../../includes/conexion.php';
if (isset($_POST['correo']) && isset($_POST['pass']))
{
	$consulta = mysqli_query($conexion3,"SELECT * FROM usuarios WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' AND pass = '".mysqli_real_escape_string($conexion,$_POST['pass'])."' LIMIT 1");
	if (mysqli_num_rows($consulta) == 0)
	{
		echo "-1";
		exit();	
	}
	else
	{	
		$d = mysqli_fetch_array($consulta);
		session_start();
		$_SESSION['id_admin'] = $d['id'];
		$_SESSION['nombre'] = $d['nombre'];
		$_SESSION['nivel'] = $d['nivel'];
		echo "1";//OK
		exit();
	}
}
?>