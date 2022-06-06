<?php
include('../../includes/conexion.php');
include('../includes/config.php');
if (isset($_POST['correo']) && isset($_POST['pass']))
{
	$consulta1 = mysqli_query($conexion3,"SELECT * FROM aspirantes WHERE correo = '".mysqli_real_escape_string($conexion3,$_POST['correo'])."' AND pass = '".mysqli_real_escape_string($conexion3,$_POST['pass'])."' LIMIT 1");
	if (mysqli_num_rows($consulta1)==0)
	{
		echo "1";//Correo o contraseña incorrecta
		exit();
	}
	else
	{
		//Credenciales válidas
		$d = mysqli_fetch_array($consulta1);
		$consulta2 = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."' AND fecha_examen_d = '".$hoy."' ");
		if (mysqli_num_rows($consulta2)==0)
		{
			echo "2";
			exit();
		}		
		$consulta2 = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante ='".$d['id']."' AND finalizado = '1' LIMIT 1");
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
			echo "4";
			exit();
		}
	}
}
else
{
	header("location:../");	
}
?>