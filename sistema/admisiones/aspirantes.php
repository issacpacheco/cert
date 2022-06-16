<?php 
include("includes/config.php");
error_reporting(0);
if (isset($_POST['alta']))
{
	$_POST['fecha_nac'] = substr($_POST['fecha_nac'],6,4).'-'.substr($_POST['fecha_nac'],3,2).'-'.substr($_POST['fecha_nac'],0,2);
	mysqli_query($conexion,"ALTER TABLE aspirantes AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO aspirantes VALUES (
	'0', 
	'".mysqli_real_escape_string($conexion,$_SESSION['campus'])."',
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
	)" );
	$id = mysqli_insert_id($conexion);
	umask(0000);
	mkdir("../archivos/aspirantes/".$id,0777);
	
	//Licenciaturas
	if ($_FILES['file_ine']['tmp_name'] != '')
	{
		copy($_FILES['file_ine']['tmp_name'],'../archivos/aspirantes/'.$id.'/ine.pdf');
	}

	if ($_FILES['file_curp']['tmp_name'] != '')
	{
		copy($_FILES['file_curp']['tmp_name'],'../archivos/aspirantes/'.$id.'/curp.pdf');
	}

	if ($_FILES['file_certificado']['tmp_name'] != '')
	{
		copy($_FILES['file_certificado']['tmp_name'],'../archivos/aspirantes/'.$id.'/certificado.pdf');
	}

	if ($_FILES['file_constancia']['tmp_name'] != '')
	{
		copy($_FILES['file_constancia']['tmp_name'],'../archivos/aspirantes/'.$id.'/constancia.pdf');
	}

	if ($_FILES['file_recibo']['tmp_name'] != '')
	{
		copy($_FILES['file_recibo']['tmp_name'],'../archivos/aspirantes/'.$id.'/recibo.pdf');	
	}

	if ($_FILES['file_identificacion']['tmp_name'] != '')
	{
		copy($_FILES['file_identificacion']['tmp_name'],'../archivos/aspirantes/'.$id.'/identificacion.pdf');	
	}

	if ($_FILES['file_pase']['tmp_name'] != '')
	{
		copy($_FILES['file_pase']['tmp_name'],'../archivos/aspirantes/'.$id.'/pase.pdf');
	}

	//Posgrados
	if ($_FILES['file_titulo']['tmp_name'] != '')
	{
		copy($_FILES['file_titulo']['tmp_name'],'../archivos/aspirantes/'.$id.'/titulo.pdf');	
	}

	if ($_FILES['file_certificado_lic']['tmp_name'] != '')
	{
		copy($_FILES['file_certificado_lic']['tmp_name'],'../archivos/aspirantes/'.$id.'/certificado_lic.pdf');
	}

	if ($_FILES['file_cedula']['tmp_name'] != '')
	{
		copy($_FILES['file_cedula']['tmp_name'],'../archivos/aspirantes/'.$id.'/cedula.pdf');
	}

	//DOCTORADO
	if ($_FILES['file_titulo_maestria']['tmp_name'] != '')
	{
		copy($_FILES['file_titulo_maestria']['tmp_name'],'../archivos/aspirantes/'.$id.'/titulo_maestria.pdf');	
	}

	if ($_FILES['file_certificado_maestria']['tmp_name'] != '')
	{
		copy($_FILES['file_certificado_maestria']['tmp_name'],'../archivos/aspirantes/'.$id.'/certificado_maestria.pdf');
	}

	if ($_FILES['file_cedula_maestria']['tmp_name'] != '')
	{
		copy($_FILES['file_cedula_maestria']['tmp_name'],'../archivos/aspirantes/'.$id.'/cedula_maestria.pdf');
	}
	
}

if (isset($_POST['editar']))
{
	
	$_POST['fecha_nac'] = substr($_POST['fecha_nac'],6,4).'-'.substr($_POST['fecha_nac'],3,2).'-'.substr($_POST['fecha_nac'],0,2);
	if (mysqli_query($conexion,"UPDATE aspirantes SET
		id_oferta = '".mysqli_real_escape_string($conexion,$_POST['id_oferta'])."',
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
		cp = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['cp']),'UTF-8')."',
		curp = '".mysqli_real_escape_string($conexion,$_POST['curp'])."',
		emergencia_nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['emergencia_nombre']),'UTF-8')."',
		emergencia_telefono = '".mysqli_real_escape_string($conexion,$_POST['emergencia_telefono'])."',
		institucion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		lugar_trabajo = '".mysqli_real_escape_string($conexion,$_POST['lugar_trabajo'])."',
		medio = '".mysqli_real_escape_string($conexion,$_POST['medio'])."'
		WHERE id = '".$_POST['editar']."'"))
	{
		
		
		if (isset($_POST['fecha_examen_d']) && $_POST['fecha_examen_d']!='')
		{
			mysqli_query($conexion,"UPDATE aspirantes_validacion SET fecha_examen_d = '".$_POST['fecha_examen_d']."' WHERE id_aspirante = '".$_POST['editar']."'");
		}
		
		if ($_POST['activar_examen_p']==1)
		{
			mysqli_query($conexion,"ALTER TABLE aspirantes_validacion_edu AUTO_INCREMENT = 0");
			mysqli_query($conexion,"INSERT INTO aspirantes_validacion_edu VALUES (
			'0',
			'".$_POST['editar']."',
			'".$hoy."'
			)");
		}
		else if ($_POST['activar_examen_p']==2)
		{
			mysqli_query($conexion,"DELETE FROM aspirantes_validacion_edu WHERE id_aspirante = '".$_POST['editar']."'");
		}
		
		
		$id = $_POST['editar'];
		//Licenciaturas
		if ($_FILES['file_ine']['tmp_name'] != '')
		{
			copy($_FILES['file_ine']['tmp_name'],'../archivos/aspirantes/'.$id.'/ine.pdf');
		}

		if ($_FILES['file_curp']['tmp_name'] != '')
		{
			copy($_FILES['file_curp']['tmp_name'],'../archivos/aspirantes/'.$id.'/curp.pdf');
		}

		if ($_FILES['file_certificado']['tmp_name'] != '')
		{
			copy($_FILES['file_certificado']['tmp_name'],'../archivos/aspirantes/'.$id.'/certificado.pdf');
		}

		if ($_FILES['file_constancia']['tmp_name'] != '')
		{
			copy($_FILES['file_constancia']['tmp_name'],'../archivos/aspirantes/'.$id.'/constancia.pdf');
		}

		if ($_FILES['file_recibo']['tmp_name'] != '')
		{
			copy($_FILES['file_recibo']['tmp_name'],'../archivos/aspirantes/'.$id.'/recibo.pdf');	
		}

		if ($_FILES['file_identificacion']['tmp_name'] != '')
		{
			copy($_FILES['file_identificacion']['tmp_name'],'../archivos/aspirantes/'.$id.'/identificacion.pdf');
		}

		if ($_FILES['file_pase']['tmp_name'] != '')
		{
			copy($_FILES['file_pase']['tmp_name'],'../archivos/aspirantes/'.$id.'/pase.pdf');
		}

		//Posgrados
		if ($_FILES['file_titulo']['tmp_name'] != '')
		{
			copy($_FILES['file_titulo']['tmp_name'],'../archivos/aspirantes/'.$id.'/titulo.pdf');	
		}

		if ($_FILES['file_certificado_lic']['tmp_name'] != '')
		{
			copy($_FILES['file_certificado_lic']['tmp_name'],'../archivos/aspirantes/'.$id.'/certificado_lic.pdf');
		}

		if ($_FILES['file_cedula']['tmp_name'] != '')
		{
			copy($_FILES['file_cedula']['tmp_name'],'../archivos/aspirantes/'.$id.'/cedula.pdf');
		}

		//DOCTORADO
		if ($_FILES['file_titulo_maestria']['tmp_name'] != '')
		{
			copy($_FILES['file_titulo_maestria']['tmp_name'],'../archivos/aspirantes/'.$id.'/titulo_maestria.pdf');	
		}

		if ($_FILES['file_certificado_maestria']['tmp_name'] != '')
		{
			copy($_FILES['file_certificado_maestria']['tmp_name'],'../archivos/aspirantes/'.$id.'/certificado_maestria.pdf');
		}

		if ($_FILES['file_cedula_maestria']['tmp_name'] != '')
		{
			copy($_FILES['file_cedula_maestria']['tmp_name'],'../archivos/aspirantes/'.$id.'/cedula_maestria.pdf');
		}
			
	}
}
if ($_POST['comentarios']!='')
{
	mysqli_query($conexion, "ALTER TABLE comentarios_aspirantes AUTO_INCREMENT = 0");
	mysqli_query($conexion,"INSERT INTO comentarios_aspirantes VALUES (
	'0',
	'".$_POST['editar']."',
	'".$_SESSION['id_admin']."',
	'".mysqli_real_escape_string($conexion,$_POST['comentarios'])."',
	'".$hoy."',
	'".$hora."'
	)");
}
if ($_GET['eliminar_comentario'] != '')
{
	mysqli_query($conexion,"DELETE FROM comentarios_aspirantes WHERE MD5(id) = '".$_GET['eliminar_comentario']."' LIMIT 1");
}
if (isset($_POST['eliminar']))
{
	mysqli_query($conexion,"DELETE FROM aspirantes WHERE id = '".$_POST['eliminar']."' LIMIT 1");
	mysqli_query($conexion,"DELETE FROM aspirantes_validacion WHERE id_aspirante = '".$_POST['eliminar']."' LIMIT 1");
	BorrarCarpeta('../archivos/aspirantes/'.$_POST['eliminar']);
	
	//EXAMEN PSICOMETRICO
	mysqli_query($conexion2,"DELETE FROM aspirantes WHERE id = '".$_POST['eliminar']."' LIMIT 1");
	mysqli_query($conexion2,"DELETE FROM encuesta WHERE id_aspirante = '".$_POST['eliminar']."'");
	mysqli_query($conexion2,"DELETE FROM honestidad WHERE id_aspirante = '".$_POST['eliminar']."'");
	
	//EXAMEN DE DIAGNOSTICO
	mysqli_query($conexion3,"DELETE FROM aspirantes WHERE id = '".$_POST['eliminar']."' LIMIT 1");
	mysqli_query($conexion3,"DELETE FROM examen WHERE id_aspirante = '".$_POST['eliminar']."'");
	
}
if (isset($_POST['eliminar_validacion']))
{
	mysqli_query($conexion,"DELETE FROM aspirantes_validacion WHERE id_aspirante = '".$_POST['id']."' LIMIT 1");	
	mysqli_query($conexion,"DELETE FROM matricula_ceneval WHERE id_aspirante = '".$_POST['id']."' LIMIT 1");	
	//EXAMEN PSICOMETRICO
	mysqli_query($conexion2,"DELETE FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	mysqli_query($conexion2,"DELETE FROM encuesta WHERE id_aspirante = '".$_POST['id']."'");
	mysqli_query($conexion2,"DELETE FROM honestidad WHERE id_aspirante = '".$_POST['id']."'");
	
	//EXAMEN DE DIAGNOSTICO
	mysqli_query($conexion3,"DELETE FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	mysqli_query($conexion3,"DELETE FROM examen WHERE id_aspirante = '".$_POST['id']."'");
	
}
if (isset($_POST['validacion']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$_POST['id']."'");
	if (mysqli_num_rows($consulta) == 0)
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."'");
		$d = mysqli_fetch_array($consulta);

		mysqli_query($conexion,"ALTER TABLE aspirantes_validacion AUTO_INCREMENT = 0");
		mysqli_query($conexion,"INSERT INTO aspirantes_validacion VALUES (
		'0',
		'".$d['id']."',
		'".$hoy."',
		'',
		'',
		'',
		'',
		'0'
		)");

		$genero = $d['genero']=='Masculino'?'H':'M';

		//Psicometrico
		mysqli_query($conexion2,"ALTER TABLE aspirantes AUTO_INCREMENT = 0");
		mysqli_query($conexion2, "INSERT INTO aspirantes VALUES (
		'".$d['id']."', 
		'".$d['id_campus']."',
		'".$d['id_oferta']."',
		'".$d['nombre']."',
		'".$d['paterno']."',
		'".$d['materno']."',
		'".$genero."',
		'".$d['correo']."',
		'".$d['pass']."',
		'".$d['telefono']."'
		)" );

		//Diagnóstico
		mysqli_query($conexion3,"ALTER TABLE aspirantes AUTO_INCREMENT = 0");
		mysqli_query($conexion3, "INSERT INTO aspirantes VALUES (
		'".$d['id']."', 
		'".$d['id_campus']."',
		'".$d['id_oferta']."',
		'".$d['nombre']."',
		'".$d['paterno']."',
		'".$d['materno']."',
		'".$genero."',
		'".$d['correo']."',
		'".$d['pass']."',
		'".$d['telefono']."'
		)" );
		
		
		//Enviar correo
		$correo=$d['correo'];
		$nombre=$d['nombre'];
		$asunto="Confirmación de documentos";
		if (file_exists('../archivos/docs/GUIA_DE_EXAMEN.pdf'))
		{
			$archivos[] = '../archivos/docs/GUIA_DE_EXAMEN.pdf';
		}
		if ($d['id_oferta']=='22')
		{
			mandar_correo_validacion22($correo,$nombre,$asunto);
		}
		else if ($d['id_oferta']=='3' || $d['id_oferta']=='4' || $d['id_oferta']=='19')
		{
			mandar_correo_validacion_lic_educacion($correo,$nombre,$asunto);
		}
		else
		{
			mandar_correo_validacion1($correo,$nombre,$asunto,$archivos);
		}		
	}
}
if (isset($_POST['matricula']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM matricula_ceneval WHERE id_aspirante = '".$_POST['id']."'");
	if (mysqli_num_rows($consulta) == 0)
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."'");
		$d = mysqli_fetch_array($consulta);
		
		mysqli_query($conexion,"ALTER TABLE matricula_ceneval AUTO_INCREMENT = 0");
		mysqli_query($conexion, "INSERT INTO matricula_ceneval VALUES (
		'0',
		'".$_POST['id']."', 
		'".$_POST['matricula']."'
		)" );
		//Enviar correo
		$correo=$d['correo'];
		$nombre=$d['nombre'];
		$asunto="Seguimiento de proceso de registro";
		mandar_correo_validacion_ceneval($correo,$nombre,$asunto);
	}
	else
	{
		mysqli_query($conexion,"UPDATE matricula_ceneval SET matricula = '".$_POST['matricula']."' WHERE id_aspirante = '".$_POST['id']."'");
	}
		
}
if (isset($_POST['inscrito']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."'");
	$d = mysqli_fetch_array($consulta);
	
	//CREAR MATRICULA
	$matricula = sprintf("%'.02d\n", $d['id_campus']).sprintf("%'.02d\n", $d['id_oferta']).substr($anio,2,2).sprintf("%'.03d\n", $d['id']);
	//CREAR CARPETA CON MATRICULA
	
	mysqli_query($conexion,"ALTER TABLE alumnos AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO alumnos VALUES (
	'0', 
	'".$d['id_campus']."',
	'".$d['id_oferta']."',
	'".$matricula."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$d['nombre']),'UTF-8')."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$d['paterno']),'UTF-8')."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$d['materno']),'UTF-8')."',
	'".mysqli_real_escape_string($conexion,$d['fecha_nac'])."',
	'".mysqli_real_escape_string($conexion,$d['genero'])."',
	'".mysqli_real_escape_string($conexion,$d['estado_civil'])."',
	'".mysqli_real_escape_string($conexion,$d['correo'])."',
	'".mysqli_real_escape_string($conexion,$d['pass'])."',
	'correo@cert.edu.mx',
	'12345',
	'".mysqli_real_escape_string($conexion,$d['telefono'])."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$d['direccion']),'UTF-8')."',
	'".mysqli_real_escape_string($conexion,$d['curp'])."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$d['emergencia_nombre']),'UTF-8')."',
	'".mysqli_real_escape_string($conexion,$d['emergencia_telefono'])."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$d['institucion']),'UTF-8')."',
	'".mysqli_real_escape_string($conexion,$d['lugar_trabajo'])."',
	'".$hoy."'
	)" );
	$id = mysqli_insert_id($conexion);
	umask(0000);
	mkdir("../archivos/alumnos/".$id,0777);
	
	//Licenciaturas
	if (file_exists('../archivos/aspirantes/'.$d['id'].'/ine.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/ine.pdf','../archivos/alumnos/'.$id.'/ine.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/curp.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/curp.pdf','../archivos/alumnos/'.$id.'/curp.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/certificado.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/certificado.pdf','../archivos/alumnos/'.$id.'/certificado.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/constancia.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/constancia.pdf','../archivos/alumnos/'.$id.'/constancia.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/recibo.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/recibo.pdf','../archivos/alumnos/'.$id.'/recibo.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/identificacion.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/identificacion.pdf','../archivos/alumnos/'.$id.'/identificacion.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/pase.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/pase.pdf','../archivos/alumnos/'.$id.'/pase.pdf');
	}

	//Posgrados
	if (file_exists('../archivos/aspirantes/'.$d['id'].'/titulo.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/titulo.pdf','../archivos/alumnos/'.$id.'/titulo.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/certificado_lic.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/certificado_lic.pdf','../archivos/alumnos/'.$id.'/certificado_lic.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/cedula.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/cedula.pdf','../archivos/alumnos/'.$id.'/cedula.pdf');
	}

	//DOCTORADO
	if (file_exists('../archivos/aspirantes/'.$d['id'].'/titulo_maestria.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/titulo_maestria.pdf','../archivos/alumnos/'.$id.'/titulo_maestria.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/certificado_maestria.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/certificado_maestria.pdf','../archivos/alumnos/'.$id.'/certificado_maestria.pdf');
	}

	if (file_exists('../archivos/aspirantes/'.$d['id'].'/cedula_maestria.pdf'))
	{
		copy('../archivos/aspirantes/'.$d['id'].'/cedula_maestria.pdf','../archivos/alumnos/'.$id.'/cedula_maestria.pdf');
	}
	
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $title;?></title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height">
    <link rel="shortcut icon" href="images/favicon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/>
    
    <!-- Styling -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
    <link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/<?php echo $theme;?>" class="theme" />
    <!-- End of Styling -->
	
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	
	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	
</head>
<body class="hold-transition">

    <!-- Header -->
    <?php include("includes/header.php");?>
    <!-- End of Header -->

    <!-- Navigation -->
    <?php include("includes/menu.php");?>
    <!-- End of Navigation -->

    <!-- Scroll up button -->
    <a class="scroll-up"><i class="fas fa-chevron-up"></i></a>
    <!-- End of scroll up button -->

    <!-- Main content-->
     <div class="content">
		 <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            Aspirantes
							<div class="row">
								<div class="col-lg-12">
									<p class="text-danger">Marcador rojo: Más de dos días transcurridos sin presentar el examen psicométrico.</p>
									<!-- <p class="text-warning">Marcador amarillo: Aspirante en espera de validación por Desarrollo Académico.</p> -->
									<p class="text-warning">Marcador amarillo: Aspirante en proceso de exámenes.</p>
									<p class="text-info">Marcador azul: Aspirante en espera de validación por Desarrollo Académico.</p>
									<p class="text-success">Marcador verde: Aspirante completo y listo para inscripción.</p>
								</div>
							</div>
                        </div>
                        <div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="aspirantes_abc" method="post">
										<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i> Nuevo </button>
									</form>
								</div>
							</div>
							<br>
							<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
								<thead>
									<tr>
										<th> Nombre </th>
										<th> Oferta </th>
										<th> Fecha </th>
										<th> Correo </th>
										<th> Teléfono </th>
										<th> Matrícula CENEVAL </th>
										<th> Último Comentario</th>
										<th> <i class="fas fa-pencil"></i> </th>
										<th> <i class="fas fa-user-check"></i> </th>
										<th> <i class="fas fa-file-upload"></i> </th>
										<?php
										if ($_SESSION['nivel']==1)
										{
											echo '
											<th> <i class="fas fa-trash"></i> </th>
											<th> <i class="fas fa-trash-alt"><i> </th>
											';
											
										}
										?>
									</tr>
								</thead>
								<tbody>
								<?php
								/*if ($_SESSION['nivel'] == 1)
								{
									$consulta = mysqli_query($conexion,	"SELECT * FROM aspirantes WHERE id_campus = '".$_SESSION['campus']."' ORDER BY fecha_registro");
								}
								else if ($_SESSION['nivel'] == 2)
								{
									$consulta = mysqli_query($conexion,	"SELECT * FROM aspirantes ORDER BY fecha_registro");
								}*/
								$consulta = mysqli_query($conexion,	"SELECT * FROM aspirantes WHERE id_campus = '".$_SESSION['campus']."' ORDER BY fecha_registro");
								while ($d = mysqli_fetch_array($consulta))
								{	
									//Mostrar sólo las ofertas educativas corespondientes al asesor
									$consulta1 = mysqli_query($conexion, "SELECT * FROM oferta_asesor WHERE id_asesor = '".$_SESSION['id_admin']."' AND id_oferta = '".$d['id_oferta']."'");
									if (mysqli_num_rows($consulta1)==0 && $_SESSION['nivel']== 2)
									{
										//continue;
									}
									
									//Excluir a los alumnos registrados
									$consulta1 = mysqli_query($conexion, "SELECT * FROM alumnos WHERE nombre = '".$d['nombre']."' AND paterno = '".$d['paterno']."' AND materno = '".$d['materno']."'");
									if (mysqli_num_rows($consulta1)>0)
									{
										continue;
									}
									
									$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
									$d1 = mysqli_fetch_array($consulta1);
									
									if($_SESSION['campus'] == 1 && $_SESSION['id_admin'] == 2){
										$opc = '<form action="aspirantes" method="post" id="validacion_'.$d['id'].'">
												<input type="hidden" name="validacion" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="button" class="btn btn-md btn-info btn-block" onClick="Validacion('.$d['id'].')" data-toggle="tooltip" data-placement="top" title="Validar"><i class="fas fa-check"></i> Validar</button>
											</form>';
									}else if($_SESSION['campus'] == 2){
										$opc = '<form action="aspirantes" method="post" id="validacion_'.$d['id'].'">
												<input type="hidden" name="validacion" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="button" class="btn btn-md btn-info btn-block" onClick="Validacion('.$d['id'].')" data-toggle="tooltip" data-placement="top" title="Validar"><i class="fas fa-check"></i> Validar</button>
											</form>';
									}
									
									if ($d['id_oferta']=='3' || $d['id_oferta']=='4' || $d['id_oferta']=='19')
									{
										$opc.='<form action="aspirantes_matricula" method="post">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-success btn-block"><i class="fas fa-id-card-alt"></i> Agregar Matrícula</button>
											</form>';
									}
									
									$check = 'disabled';
									$class = '';
									$consulta2 = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."'");
									if (mysqli_num_rows($consulta2)>0)
									{
										$opc = '';
										$d2 = mysqli_fetch_array($consulta2);
										if ($d2['fecha_examen_p']=='0000-00-00')
										{
											$class = 'warning';
											$opc .= '<h3>En espera de presentar el <strong class="text-info">examen psicométrico</strong></h3>';
										}
										else if ($d2['presentado_p'] == '1')
										{
											$class = 'warning';
											$opc.= '<h3>El examen psicométrico se presentó el día: <strong class="text-success">'.Fecha($d2['fecha_examen_p']).'</strong></h3>';
										}
										
										
										if ($d['id_oferta']!='22' && $d['id_oferta']!='3' && $d['id_oferta']!='4' && $d['id_oferta']!='19')
										{
											if ($d2['fecha_examen_d']=='0000-00-00')
											{
												$class = 'warning';
												$opc .= '<h3>En espera de presentar el <strong class="text-info">examen de diagnóstico</strong></h3>';
											}
											else if ($d2['presentado_d'] == '0')
											{
												$class = 'warning';
												$opc.='<h3>El examen de diagnóstico se presentará el día <strong>'.Fecha($d2['fecha_examen_d']).'.</strong></h3>';
											}
											else if ($d2['presentado_d'] == '1')
											{
												$class = 'warning';
												$opc.= '<h3>Fecha de examen de diagnóstico: <strong class="text-success">'.Fecha($d2['fecha_examen_d']).'</strong></h3>';
											}
										}
										
										$consulta3 = mysqli_query($conexion,"SELECT DATEDIFF('".$hoy."',fecha) AS dif FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."' AND presentado_p = '0'");
										$dif = mysqli_fetch_array($consulta3);
										if ($dif['dif']>2)
										{
											$class = 'danger';
										}
										
										if ($d2['presentado_p'] == '1' && $d2['presentado_d'] == '1')
										{
											$class = 'info';
											$opc= '<h3>En espera de resultados por Desarrollo Académico</h3>';
										}
										
										if ($d2['resultado']==1)
										{
											$check = '';
											$class = 'success';
											$opc = '
												<form action="ficha_pago" method="post">
													<input type="hidden" name="id" value="'.$d['id'].'">
													<input type="hidden" name="pagina" value="aspirantes">
													<button type="submit" class="btn btn-md btn-default btn-block"><i class="fas fa-cash-register"></i> Comprobante de pago</button>
												</form>';
											if ($d['id_oferta']==22)
											{
												$opc.='<form action="aspirantes_matricula" method="post">
													<input type="hidden" name="id" value="'.$d['id'].'">
													<button type="submit" class="btn btn-md btn-success btn-block"><i class="fas fa-id-card-alt"></i> Agregar Matrícula</button>
												</form>';
											}
										}
										
									}
									
									
									if ($d1['id_nivel'] > 5)
									{
										$opc = '
											<form action="ficha_pago" method="post">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<input type="hidden" name="pagina" value="aspirantes">
												<button type="submit" class="btn btn-md btn-default btn-block"><i class="fas fa-cash-register"></i> Comprobante de pago</button>
											</form>';
										$check = '';
									}
									
									
									$consulta4 = mysqli_query($conexion,"SELECT * FROM comentarios_aspirantes WHERE id_aspirante = '".$d['id']."' ORDER BY fecha DESC, hora DESC");
									$d4 = mysqli_fetch_array($consulta4);

									$consulta5 	= mysqli_query($conexion,"SELECT matricula FROM matricula_ceneval WHERE id_aspirante = '".$d['id']."'");
									$d5			= mysqli_fetch_array($consulta5);

									echo '
									<tr class="'.$class.'">
										<td>'.$d['nombre'].' '.$d['paterno'].' '.$d['materno'].'</td>
										<td>'.$d1['nombre'].'</td>
										<td data-sort="'.substr($d['fecha_registro'],0,4).substr($d['fecha_registro'],5,2).substr($d['fecha_registro'],8,2).'">'.FechaCorta($d['fecha_registro']).'</td>
										<td>'.$d['correo'].'</td>
										<td>'.$d['telefono'].'</td>
										<td>'.$d5['matricula'].'</td>
										<td>'.$d4['comentarios'].'</td>
										<td>
											<form action="aspirantes_abc" method="post">
												<input type="hidden" name="editar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-success btn-block"><i class="fas fa-pencil"></i> Editar</button>
											</form>
										</td>
										<td>'.$opc.'</td>
										<td>
											<form action="aspirantes" method="post">
												<input type="hidden" name="inscrito" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-primary btn-block" '.$check.'><i class="fas fa-file-upload"></i> Inscrito</button>
											</form>
										</td>
									';
									if ($_SESSION['nivel']==1)
									{
										echo '
										<td> 
											<form action="aspirantes_abc" method="post">
												<input type="hidden" name="eliminar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-danger btn-block"><i class="fas fa-trash"></i> Eliminar</button>
											</form>
										</td>
										<td> 
											<form action="aspirantes" method="post" id="eliminar_validacion_'.$d['id'].'">
												<input type="hidden" name="eliminar_validacion" value="'.$d['id'].'">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="button" class="btn btn-md btn-danger btn-block" onClick="EliminarValidacion('.$d['id'].')" data-toggle="tooltip" data-placement="top" title="Eliminar validación"><i class="fa fa-trash-atl"></i> Eliminar validación</button>
											</form>

										</td>
										';
									}
									echo '</tr>';
								}
								?>
								</tbody>
							</table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("includes/footer.php");?>
        <!-- End of Footer -->
    </div>
    <!-- End of Main content-->
	
	
    <div class="scripts">
        <!-- Addons -->
        <script src="addons/jquery/jquery.min.js"></script>
        <script src="addons/jquery-ui/jquery-ui.min.js"></script>
        <script src="addons/bootstrap/js/bootstrap.min.js"></script>
		<script src="addons/fullcalendar/lib/moment.min.js"></script>
        <script src="addons/pacejs/pace.min.js"></script>
        <script src="addons/scripts.js"></script>
		
		<!-- Current page scripts -->
        <div class="current-scripts">
			<!-- DataTables -->
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			<!--SweetAlert-->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
			<script>
				$(document).ready(function(){	
					$('#tabla').DataTable( {
					   "language": { url:"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
						"ordering": true,
						"paging": true,
						"searching": true,
						"stateSave": true,
						"info": true,
						"fixedHeader": true,
						"autoFill": false,
						"colReorder": false,
						"fixedColumns": false,
						"responsive": true,
						"dom": 'Bfrtip',
						"pageLength": 50,
						"order": [[ 2, "desc" ]],
						"buttons": [
							{
								extend: 'excel',
								exportOptions: {
									columns: [0,1,2,3,4]
								},
								text: 'Excel <i class="fal fa-file-excel"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								exportOptions: {
									columns: [0,1,2,3,4]
								},
								text: 'PDF <i class="fal fa-file-pdf"></i>',
								messageTop: 'LISTA DE ASPIRANTES REGISTRADOS',
								footer: true
							},
							{
								extend: 'print',
								exportOptions: {
									columns: [0,1,2,3,4]
								},
								text: 'Imprimir <i class="fal fa-print"></i>',
								messageTop: '',
								footer: true
							},
						]
					} );
				});
				<?php
				if (isset($_POST['validacion']))
				{
					?>
					Swal.fire({
						icon: 'success',
					 	title: 'Validación',
						html: '<h5>La validación se realizó correctamente</h5>',
						showConfirmButton: true,
  						timer: 4500
					})
					<?php
				}
				?>
				function EliminarValidacion(id) {
					
					Swal.fire({
						title: 'ATENCIÓN',
						icon: 'info',
						width: 500,
						html:
							'<h4>¿Esta seguro que deseas eliminar la validación de este aspirante?</h4>',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: '<i class="fa fa-thumbs-up"></i> Sí, estoy seguro',
						cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar',
						}).then((result) => {
						if (result.isConfirmed) {
							//Acept
							$( "#eliminar_validacion_"+id ).submit();
						}
					});
				}
				function Validacion(id) {
					
					Swal.fire({
						title: 'ATENCIÓN',
						icon: 'info',
						width: 500,
						html:
							'<h4>¿Esta seguro que deseas validar de este aspirante?</h4>',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: '<i class="fa fa-thumbs-up"></i> Sí, estoy seguro',
						cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar',
						}).then((result) => {
						if (result.isConfirmed) {
							//Acept
							$( "#validacion_"+id ).submit();
						}
					});
				}

				function ObtenerExcel(){
					location.href="ajax/obtener_excel.php";
				}
			</script>            
        </div>

    </div>

</body>

</html>