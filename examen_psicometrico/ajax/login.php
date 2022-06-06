<?php
include('../../includes/conexion.php');
include('../includes/config.php');
if (isset($_POST['correo']))
{
	$consulta1 = mysqli_query($conexion2,"SELECT * FROM aspirantes WHERE correo = '".mysqli_real_escape_string($conexion2,$_POST['correo'])."' LIMIT 1");
	if (mysqli_num_rows($consulta1)==0)
	{
		echo "1";//No esta registrado el correo
		exit();
	}
	else
	{
		$consulta1 = mysqli_query($conexion2,"SELECT * FROM aspirantes WHERE correo = '".mysqli_real_escape_string($conexion2,$_POST['correo'])."' AND pass='".mysqli_real_escape_string($conexion2,$_POST['pass'])."' LIMIT 1");
		if (mysqli_num_rows($consulta1)==0)
		{
			echo "2";//Contraseña incorrecta
			exit();
		}
		else
		{
			$d = mysqli_fetch_array($consulta1);
			$consulta2 = mysqli_query($conexion2,"SELECT * FROM encuesta WHERE id_aspirante ='".$d['id']."' LIMIT 1");
			if (mysqli_num_rows($consulta2)>0)
			{
				echo "3";//Ya realizó la encuesta
				exit();
			}
			else
			{
				//Iniciar sesión	
				$_SESSION['id'] = $d['id'];
				$_SESSION['correo'] = $d['correo'];
				$_SESSION['nombre'] = $d['nombre'];
				$_SESSION['paterno'] = $d['paterno'];
				$_SESSION['materno'] = $d['materno'];
				$_SESSION['genero'] = $d['genero'];
				echo "5";
				exit();
			}
			
		}
	}
}
else
{
	header("location:../index.php");	
}
?>