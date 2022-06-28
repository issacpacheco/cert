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
		$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_asesor WHERE id_oferta = '".$_POST['id_oferta']."' ORDER BY rand() LIMIT 1");
		$d1 = mysqli_fetch_array($consulta1);
		
		$consulta2 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$_POST['id_oferta']."'");
		$d2 = mysqli_fetch_array($consulta2);
		
		$consulta3 = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id = '".$d2['id_nivel']."'");
		$d3 = mysqli_fetch_array($consulta3);
		
		mysqli_query($conexion,"ALTER TABLE prospectos AUTO_INCREMENT = 0");
		if (mysqli_query($conexion,"INSERT INTO prospectos VALUES (
		'0',
		'".mysqli_real_escape_string($conexion,$_POST['id_campus'])."',
		'".mysqli_real_escape_string($conexion,$_POST['id_oferta'])."',
		'".$d1['id_asesor']."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		'".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		'".mysqli_real_escape_string($conexion,$_POST['horario'])."',
		'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		'".mysqli_real_escape_string($conexion,$_POST['medio'])."',
		'',
		'".$hoy."',
		'3'
		)"))
		{
			
			if ($_POST['correo'] != "" && filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL))
			{
				$correo=$_POST['correo'];
				$nombre=$_POST['nombre'];
				$asunto = "Información";
				$nivel = $d3['nombre'];
				$oferta = $d2['nombre'];
				switch($_POST['id_oferta'])
				{
					case 1:
					case 17:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Administracion_Mercadotecnia.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Administracion_Mercadotecnia.pdf';
						}
						break;
					}
					case 2:
					case 18:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Derecho.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Derecho.pdf';
						}
						break;
					}
					case 3:
					case 19:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Educacion_Preescolar.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Educacion_Preescolar.pdf';
						}
						break;
					}
					case 4:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Educacion_Primaria.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Educacion_Primaria.pdf';
						}
						break;
					}
					case 5:
					case 20:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Enfermeria.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Enfermeria.pdf';
						}
						break;
					}
					case 6:
					case 21:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Fisioterapia.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Fisioterapia.pdf';
						}
						break;
					}
					case 22:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Medico_Cirujano.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Medico_Cirujano.pdf';
						}
						break;
					}
					case 7:
					case 23:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Nutricion.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Nutricion.pdf';
						}
						break;
					}
					case 8:
					case 24:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Psicologia.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Psicologia.pdf';
						}
						break;
					}
					case 25:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Turismo.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Turismo.pdf';
						}
						break;
					}
					case 9:
					case 10:
					case 11:
					case 12:
					case 26:
					case 27:
					case 28:
					case 29:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Especialidades.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Especialidades.pdf';
						}
						break;
					}
					case 13:
					case 30:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Mestria_Derecho_Procesal_Penal.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Mestria_Derecho_Procesal_Penal.pdf';
						}
						break;
					}
					case 14:
					case 31:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Maestria_Innovacion_Desarrollo_Educativos.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Maestria_Innovacion_Desarrollo_Educativos.pdf';
						}
						break;
					}
					case 15:
					case 32:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Maestria_Salud Publica.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Maestria_Salud Publica.pdf';
						}
						break;
					}
					case 16:
					case 33:
					{
						if (file_exists('../../sistema/archivos/oferta_educativa/Doctorado_Educacion.pdf'))
						{
							$archivos[] = '../../sistema/archivos/oferta_educativa/Doctorado_Educacion.pdf';
						}
						break;
					}
				}
				
				if (file_exists('../../sistema/archivos/oferta_educativa/Informacion.pdf'))
				{
					$archivos[] = '../../sistema/archivos/oferta_educativa/Informacion.pdf';
				}
				
					
				mandar_correo_prospectos($correo,$nombre,$asunto,$nivel,$oferta,$archivos);
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