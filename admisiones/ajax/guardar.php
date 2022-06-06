<?php
require_once('../../includes/conexion.php');
if (isset($_POST['token']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE md5(id) = '".$_POST['token']."' LIMIT 1");
	if (mysqli_num_rows($consulta)==0)
	{
		echo "-1";//No esta registrado el alumno
		exit();
	}
	else
	{
		$d = mysqli_fetch_array($consulta);
		$_POST['fecha_nac'] = substr($_POST['fecha_nac'],6,4).'-'.substr($_POST['fecha_nac'],3,2).'-'.substr($_POST['fecha_nac'],0,2);
		if (mysqli_query($conexion,"UPDATE aspirantes SET
		nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		paterno = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['paterno']),'UTF-8')."',
		materno = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['materno']),'UTF-8')."',
		fecha_nac = '".mysqli_real_escape_string($conexion,$_POST['fecha_nac'])."',
		genero = '".mysqli_real_escape_string($conexion,$_POST['genero'])."',
		estado_civil = '".mysqli_real_escape_string($conexion,$_POST['estado_civil'])."',
		correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		pass = '".mysqli_real_escape_string($conexion,$_POST['pass'])."',
		telefono = '".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		direccion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['direccion']),'UTF-8')."',
		municipio = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['municipio']),'UTF-8')."',
		cp = '".mysqli_real_escape_string($conexion,$_POST['cp'])."',
		curp = '".mysqli_real_escape_string($conexion,$_POST['curp'])."',
		emergencia_nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['emergencia_nombre']),'UTF-8')."',
		emergencia_telefono = '".mysqli_real_escape_string($conexion,$_POST['emergencia_telefono'])."',
		institucion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		lugar_trabajo = '".mysqli_real_escape_string($conexion,$_POST['lugar_trabajo'])."'
		WHERE id = '".$d['id']."'"))
		{
			if ($_POST['fecha_examen_d']!='')
			{
				$fecha_examen = substr($_POST['fecha_examen_d'],6,4).'-'.substr($_POST['fecha_examen_d'],3,2).'-'.substr($_POST['fecha_examen_d'],0,2);
				mysqli_query($conexion,"UPDATE aspirantes_validacion SET fecha_examen_d = '".$fecha_examen."' WHERE id_aspirante = '".$d['id']."'");
			}
			
			
			$id = $d['id'];
			
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