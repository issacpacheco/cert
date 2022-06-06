<?php
include("../../includes/conexion.php");
if (isset($_POST['correo']) && isset($_POST['nombre']))
{
	$_POST['fecha_nac'] = substr($_POST['fecha_nac'],6,4).'-'.substr($_POST['fecha_nac'],3,2).'-'.substr($_POST['fecha_nac'],0,2);
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."' LIMIT 1");
	if (mysqli_num_rows($consulta)>0)
	{
		echo "-1";//Ya esta registrado el correo
		exit();
	}
	else
	{
		mysqli_query($conexion,"ALTER TABLE aspirantes AUTO_INCREMENT = 0");
		if (mysqli_query($conexion, "INSERT INTO aspirantes VALUES (
		'0', 
		'".mysqli_real_escape_string($conexion,$_POST['id_campus'])."',
		'".mysqli_real_escape_string($conexion,$_POST['id_oferta'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['paterno']),'UTF-8')."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['materno']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['fecha_nac'])."',
		'".mysqli_real_escape_string($conexion,$_POST['genero'])."',
		'".mysqli_real_escape_string($conexion,$_POST['estado_civil'])."',
		'".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		'".mysqli_real_escape_string($conexion,$_POST['pass'])."',
		'".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['direccion']),'UTF-8')."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['municipio']),'UTF-8')."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['cp']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['curp'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['emergencia_nombre']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['emergencia_telefono'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['lugar_trabajo'])."',
		'".mysqli_real_escape_string($conexion,$_POST['medio'])."',
		'".$hoy."'
		)" ))
		{
	
			$id = mysqli_insert_id($conexion);
			umask(0000);
			mkdir("../../sistema/archivos/aspirantes/".$id,0777);

			//Licenciaturas
			if ($_FILES['file_ine']['tmp_name'] != '')
			{
				copy($_FILES['file_ine']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/ine.pdf');
			}

			if ($_FILES['file_curp']['tmp_name'] != '')
			{
				copy($_FILES['file_curp']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/curp.pdf');
			}

			if ($_FILES['file_certificado']['tmp_name'] != '')
			{
				copy($_FILES['file_certificado']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/certificado.pdf');
			}

			if ($_FILES['file_constancia']['tmp_name'] != '')
			{
				copy($_FILES['file_constancia']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/constancia.pdf');
			}
			
			if ($_FILES['file_recibo']['tmp_name'] != '')
			{
				copy($_FILES['file_recibo']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/recibo.pdf');	
			}
			
			if ($_FILES['file_identificacion']['tmp_name'] != '')
			{
				copy($_FILES['file_identificacion']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/identificacion.pdf');	
			}
			
			if ($_FILES['file_pase']['tmp_name'] != '')
			{
				copy($_FILES['file_pase']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/pase.pdf');
			}

			//Posgrados
			if ($_FILES['file_titulo']['tmp_name'] != '')
			{
				copy($_FILES['file_titulo']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/titulo.pdf');	
			}

			if ($_FILES['file_certificado_lic']['tmp_name'] != '')
			{
				copy($_FILES['file_certificado_lic']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/certificado_lic.pdf');
			}

			if ($_FILES['file_cedula']['tmp_name'] != '')
			{
				copy($_FILES['file_cedula']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/cedula.pdf');
			}
			
			//DOCTORADO
			if ($_FILES['file_titulo_maestria']['tmp_name'] != '')
			{
				copy($_FILES['file_titulo_maestria']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/titulo_maestria.pdf');	
			}

			if ($_FILES['file_certificado_maestria']['tmp_name'] != '')
			{
				copy($_FILES['file_certificado_maestria']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/certificado_maestria.pdf');
			}

			if ($_FILES['file_cedula_maestria']['tmp_name'] != '')
			{
				copy($_FILES['file_cedula_maestria']['tmp_name'],'../../sistema/archivos/aspirantes/'.$id.'/cedula_maestria.pdf');
			}

			
			
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