<?php
require_once('../includes/conexion.php');
require_once('../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../includes/Mobile_Detect.php');
require_once('../includes/globals.php');
require_once('../includes/funciones.php');
session_start();
if (!isset($_SESSION['id']))
{
	header('location:login');
}
else
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_SESSION['id']."' LIMIT 1");
	if (mysqli_num_rows($consulta)==0)
	{
		header('location:./');
	}
	else
	{
		$d = mysqli_fetch_array($consulta);
		if ($d['fecha_nac'] != '0000-00-00')
		{
			$d['fecha_nac'] = substr($d['fecha_nac'],8,2).'/'.substr($d['fecha_nac'],5,2).'/'.substr($d['fecha_nac'],0,4);
		}
	}
	$consulta_v = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$_SESSION['id']."'");
	if (mysqli_num_rows($consulta_v)>0)
	{
		$display = 'd-none';
		$readonly = 'readonly';
	}
}
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Registro de aspirantes a las licenciaturas y posgrados">
	<meta name="author" content="Centro Educativo Rodríguez Tamayo">
	<title>Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/images/favicon.png?v=1.0" rel="icon" type="image/png">

	<!--Bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">

	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	
	<!--Datepicker-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.standalone.min.css">

	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.bg-default{
			background: url(assets/images/bg/2.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		#FormRegistro{
			padding: 30px 20px;
			color: #fff;
    		background-color: rgba(38, 38, 38, 0.85);
			color: #000;
    		background-color: #fff;
			font-weight: bold;
		}
		.mensaje-error{
			color: #ff0033;
		}
		.has-error input, .has-error select{
			border-color: #ff0033;
			background: #ffa9a9;
		}
	</style>	
</head>

<body class="bg-default">
	
	<div class="container my-3 py-5">
		<div class="row justify-content-center">
			<div class="col-12">

				<form id="FormRegistro" method="post">

					<div class="row justify-content-center">
						<div class="col-12">
							<h1 class="text-center">Bienvenido a tu perfil de usuario</h1>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 col-lg-6 mb-4">
							<label class="control-label">Campus</label>
							<select name="id_campus" class="form-control" id="id_campus" disabled>
							<?php
								$consulta1 = mysqli_query($conexion,"SELECT * FROM campus ");	
								while ($d1 = mysqli_fetch_array($consulta1))
								{
									if ($d['id_campus']==$d1['id'])
									{
										echo '<option value="'.$d1['id'].'" selected>'.$d1['nombre'].'</option>';
									}
									else
									{
										echo '<option value="'.$d1['id'].'">'.$d1['nombre'].'</option>';
									}
								}
							?>
							</select>
						</div>
					
						<div class="col-12 col-lg-6 mb-4">
							<label class="control-label">Oferta educativa</label>
							<select name="id_oferta" class="form-control" id="id_oferta" disabled>
							<?php 
								$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
								$d1 = mysqli_fetch_array($consulta1);
								echo '<option value="'.$d1['id'].'" selected data-nivel="'.$d1['id_nivel'].'">'.$d1['nombre'].'</option>';
							?>
							</select>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 mb-4">
							<h4 class="text-center">Información básica</h4>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Nombres <small>(obligatorio)</small></label>
							<input name="nombre" id="nombre" type="text" class="form-control" value="<?php echo $d['nombre'];?>" <?php echo $readonly;?>>
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Primer apellido <small>(obligatorio)</small></label>
							<input name="paterno" id="paterno" type="text" class="form-control" value="<?php echo $d['paterno'];?>" <?php echo $readonly;?>>
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Segundo apellido </label>
							<input name="materno" id="materno" type="text" class="form-control" value="<?php echo $d['materno'];?>" <?php echo $readonly;?>>
						</div>
					</div>

					<div class="row justify-content-center <?php echo $display;?>">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Fecha de nacimiento <small>(obligatorio)</small></label>
							<input name="fecha_nac" id="fecha_nac" type="text" class="form-control" value="<?php echo $d['fecha_nac'];?>">
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Género</label>
							<select name="genero" class="form-control" id="genero" onChange="CambioGenero()">
							<?php
								if ($d['genero'] == 'Masculino')
								{
									echo '<option value="Masculino" selected> Masculino </option>
								<option value="Femenino"> Femenino </option>';
								}
								else
								{
									echo '<option value="Masculino"> Masculino </option>
								<option value="Femenino" selected> Femenino </option>';
								}
							?>
							</select>
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Estado civil</label>
							<select name="estado_civil" class="form-control" id="estado_civil">
							<?php
								if ($d['genero']=='Masculino')
								{
									switch ($d['estado_civil'])
									{
										case 'Soltero':
										{
											echo '<option value="Soltero" selected> Soltero </option>
								<option value="Casado"> Casado </option>
								<option value="Divorciado"> Divorciado </option>';
											break;
										}
										case 'Casado':
										{
											echo '<option value="Soltero"> Soltero </option>
								<option value="Casado" selected> Casado </option>
								<option value="Divorciado"> Divorciado </option>';
											break;
										}
										case 'Divorciado':
										{
											echo '<option value="Soltero"> Soltero </option>
								<option value="Casado"> Casado </option>
								<option value="Divorciado" selected> Divorciado </option>';
											break;
										}
									}
								}
								else if ($d['genero']=='Femenino')
								{
									switch ($d['estado_civil'])
									{
										case 'Soltera':
										{
											echo '<option value="Soltera" selected> Soltera </option>
								<option value="Casada"> Casada </option>
								<option value="Divorciada"> Divorciada </option>';
											break;
										}
										case 'Casada':
										{
											echo '<option value="Soltera"> Soltera </option>
								<option value="Casada" selected> Casada </option>
								<option value="Divorciada"> Divorciada </option>';
											break;
										}
										case 'Divorciada':
										{
											echo '<option value="Soltera"> Soltera </option>
								<option value="Casada"> Casada </option>
								<option value="Divorciada" selected> Divorciada </option>';
											break;
										}
									}
								}
							?>
							</select>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Correo</label>
							<input name="correo" id="correo" type="email" class="form-control" value="<?php echo $d['correo'];?>" readonly>
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Contraseña <small>(obligatorio)</small></label>
							<input name="pass" id="pass" type="text" class="form-control" value="<?php echo $d['pass'];?>" <?php echo $readonly;?>>
						</div>
					
						<div class="col-12 col-lg-4 mb-4" <?php echo $display;?>>
							<label class="control-label">Teléfono <small>(obligatorio)</small></label>
							<input name="telefono" id="telefono" type="tel" class="form-control" value="<?php echo $d['telefono'];?>">
							*10 dígitos sin espacios.
						</div>
					</div>

					<div class="row justify-content-start <?php echo $display;?>">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">CURP <small>(obligatorio)</small></label>
							<input name="curp" id="curp" type="text" class="form-control" value="<?php echo $d['curp'];?>"> ¿No recuerdas tu CURP? <a href="https://www.gob.mx/curp/" target="_blank" class="text-success">Consultar aquí</a>
						</div>
					</div>

					<div class="row justify-content-center <?php echo $display;?>">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Dirección <small>(obligatorio)</small></label>
							<input name="direccion" id="direccion" type="text" class="form-control" value="<?php echo $d['direccion'];?>">
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Municipio <small>(obligatorio)</small></label>
							<input name="municipio" id="municipio" type="text" class="form-control" value="<?php echo $d['municipio'];?>">
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Código Postal <small>(obligatorio)</small></label>
							<input name="cp" id="cp" type="text" class="form-control" value="<?php echo $d['cp'];?>">
						</div>
					</div>
					
					<div class="row justify-content-start contenedor <?php echo $display;?>" id="contenedor_trabajo">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Lugar donde laboras</label>
							<input name="lugar_trabajo" id="lugar_trabajo" type="text" class="form-control" value="<?php echo $d['lugar_trabajo'];?>">
						</div>
					</div>
					
					<div class="row justify-content-center <?php echo $display;?>">
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Institución de procedencia <small>(obligatorio)</small></label>
							<input name="institucion" id="institucion" type="text" class="form-control" value="<?php echo $d['institucion'];?>">
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Nombre del tutor: <small>(obligatorio)</small></label>
							<input name="emergencia_nombre" id="emergencia_nombre" type="text" class="form-control" value="<?php echo $d['emergencia_nombre'];?>">
						</div>
					
						<div class="col-12 col-lg-4 mb-4">
							<label class="control-label">Teléfono del tutor <small>(obligatorio)</small></label>
							<input name="emergencia_telefono" id="emergencia_telefono" type="tel" class="form-control" value="<?php echo $d['emergencia_telefono'];?>">
							*10 dígitos sin espacios.
						</div>
					</div>
					
					<div class="row justify-content-center <?php echo $display;?>">
						<div class="col-12">
							<h4 class="text-center"> Agrega los documentos solicitados.</h4> 
						</div>
					</div>

					<div class="row justify-content-center contenedor" id="contenedor_curp">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/curp.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=curp" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">CURP</label>
							<input type="file" class="form-control" name="file_curp" id="file_curp" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<div class="row justify-content-center contenedor" id="contenedor_certificado">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/certificado.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=certificado" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Certificado de estudios de bachillerato </label>
							<input type="file" class="form-control" name="file_certificado" id="file_certificado" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<div class="row justify-content-center contenedor" id="contenedor_constancia">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/constancia.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=constancia" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Constancia de estudios <strong class="text-warning">(En caso de no tener certificado)</strong></label>
							<input type="file" class="form-control" name="file_constancia" id="file_constancia" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<?php
					if ($d['id_oferta']!='3' && $d['id_oferta']!='4' && $d['id_oferta']=='19')
					{
					?>
					<div class="row justify-content-center contenedor" id="contenedor_recibo">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/recibo.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=recibo" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Recibo de pago</label>
							<input type="file" class="form-control" name="file_recibo" id="file_recibo" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					<?php
					}
					?>
					
					<div class="row justify-content-center contenedor" id="contenedor_identificacion">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/identificacion.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=identificacion" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Identificación oficial (INE, Pasaporte o constancia de estudios con fotografía)</label>
							<input type="file" class="form-control" name="file_identificacion" id="file_identificacion" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<div class="row justify-content-center contenedor" id="contenedor_ine">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/ine.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=ine" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">INE</label>
							<input type="file" class="form-control" name="file_ine" id="file_ine" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<div class="row justify-content-center contenedor" id="contenedor_titulo">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/titulo.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=titulo" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Título</label>
							<input type="file" class="form-control" name="file_titulo" id="file_titulo" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<div class="row justify-content-center contenedor" id="contenedor_cedula">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/cedula.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=cedula" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Cédula profesional</label>
							<input type="file" class="form-control" name="file_cedula" id="file_cedula" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>
					
					<div class="row justify-content-center contenedor" id="contenedor_certificado_lic">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/certificado_lic.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=certificado_lic" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Certificado de licenciatura (Ambos lados)</label>
							<input type="file" class="form-control" name="file_certificado_lic" id="file_certificado_lic" accept="application/pdf">
							*Todo en un documento <a class="text-success" href="#" onclick="return false;" data-toggle="modal" data-target="#modal_certificado"><i class="fa fa-question-circle"></i></a>
							<?php echo $btn;?>
						</div>
					</div>
					
					
					<div class="row justify-content-center contenedor" id="contenedor_titulo_maestria">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/titulo_maestria.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=titulo_maestria" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Título de maestría</label>
							<input type="file" class="form-control" name="file_titulo_maestria" id="file_titulo_maestria" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>

					<div class="row justify-content-center contenedor" id="contenedor_cedula_maestria">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/cedula_maestria.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=cedeula_maestria" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Cédula de maestría</label>
							<input type="file" class="form-control" name="file_cedula_maestria" id="file_cedula_maestria" accept="application/pdf">
							<?php echo $btn;?>
						</div>
					</div>

					<div class="row justify-content-center contenedor" id="contenedor_certificado_maestria">
						<div class="col-12 col-lg-8 mb-4">
							<?php
							$a = '../sistema/archivos/aspirantes/'.$d['id'].'/certificado_maestria.pdf';
							$btn = '';
							$text = 'text-danger';
							if (file_exists($a))
							{
								$btn = '<a href="ver?token='.md5($d['id']).'&target=certificado_maestria" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
								$text = 'text-success';
							}
							?>
							<label class="control-label <?php echo $text;?>">Certificado de maestría (Ambos lados)</label>
							<input type="file" class="form-control" name="file_certificado_maestria" id="file_certificado_maestria" accept="application/pdf">
							*Todo en un documento <a class="text-success" href="#" onclick="return false;" data-toggle="modal" data-target="#modal_certificado"><i class="fa fa-question-circle"></i></a>
							<?php echo $btn;?>
						</div>
					</div>
										
					
					<?php
					//Médico Cirujano => 22
					//Educación Preescolar Mérida => 3
					//Educación Primaria Mérida => 4
					//Educación Preescolar Ticul => 19
					if ($d['id_oferta']!='22' && $d['id_oferta']!='3' && $d['id_oferta']!='4' && $d['id_oferta']!='19')
					{						
						$consulta_validacion = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."'");
						if (mysqli_num_rows($consulta_validacion)>0)
						{
							echo '<div class="container border py-5 mb-4" style="border-radius:50px; background:#f3f3f3">';
							$val = mysqli_fetch_array($consulta_validacion);
							if ($val['resultado']=='1')
							{
								echo '
								<div class="row justify-content-center">
									<div class="col-12 my-auto">
										<h3 class="text-info text-center">¡Felicidades!</h3>
										<p class="text-center"><strong>Ya puedes pasar a realizar el pago de tú inscripción</strong></p>
									</div>
								</div>';
							}
							else
							{
								//Examen Psicométrico
								if ($val['fecha_examen_p']=='0000-00-00')
								{
									echo '
									<div class="row justify-content-center mb-5">
										<div class="col-12 my-auto text-center">
											<h4 class="text-center"><strong>Ya puedes presentar tu examen psicométrico.</strong></h4>
											<a href="https://cert.edu.mx/examen_psicometrico" class="btn btn-warning btn-lg mt-2"><i class="fas fa-pencil"></i> Presentar examen psicométrico</a>
										</div>
									</div>';
								}
								else 
								{
									echo '
									<div class="row justify-content-center">
										<div class="col-12 my-auto">
											<h3 class="text-success text-center"><i class="fas fa-check"></i> Examen psicométrico</h3>
										</div>
									</div>';
								}
								//Examen Diagnóstico
								if ($val['fecha_examen_d']=='0000-00-00' && $val['presentado_p'] == 1)
								{
									echo '
									<div class="row justify-content-center">
										<div class="col-12">
											<h4 class="text-center"><strong>Selecciona la fecha que en la que deseas presentar tu examen de diagnóstico.</strong></h4>
											<p class="text-center text-danger"><strong>Ten en cuenta que no podrás cambiar tu fecha elegida.</strong></p>
										</div>
									</div>
									<div class="row justify-content-center">
										<div class="col-12 col-lg-4 mb-4">
											<div class="input-group mb-3">
												<input name="fecha_examen_d" id="fecha_examen_d" type="text" class="form-control" readonly placeholder="Fecha de examen">
												<div class="input-group-append">
													<span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
												</div>
											</div>
										</div>
									</div>';
								}
								else if ($val['fecha_examen_d'] != '0000-00-00' && $val['presentado_d'] == '0')
								{
									echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4"><h4 class="text-center"><strong>Podrás presentar tu examen de diagnóstico el día '.Fecha($val['fecha_examen_d']).'.</strong></h4>
												<a href="https://cert.edu.mx/examen_diagnostico" class="btn btn-info btn-block btn-lg"><i class="fas fa-pencil"></i> Presentar examen de diagnóstico</a>
											</div>
										</div>';
								}
								else if ($val['presentado_d'] == '1')
								{
									echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h3 class="text-success text-center"><i class="fas fa-check"></i> Examen diagnóstico</h3>
											</div>
										</div>';
								}

								//Agradecimiento
								if ($val['presentado_p'] == '1' && $val['presentado_d'] == '1')
								{
									echo '
									<div class="row justify-content-center">
										<div class="col-12 mb-4">
											<h4 class="text-info text-center">Gracias por tu participación en los exámenes psicométrico y de diagnóstico, un asesor se comunicará contigo para seguir el proceso de inscripción.</h4>
										</div>
									</div>';
								}
							}

							echo '</div>';
						}
					}
					//Educación
					else if ($d['id_oferta']=='3' || $d['id_oferta']=='4' || $d['id_oferta']=='19')
					{
						$consulta_validacion = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."'");
						if (mysqli_num_rows($consulta_validacion)>0)
						{
							echo '<div class="container text-dark bg-white border py-3 mb-4">';
							$val = mysqli_fetch_array($consulta_validacion);
							$consulta_validacion_edu = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion_edu WHERE id_aspirante = '".$d['id']."'");
							$consulta_matricula = mysqli_query($conexion,"SELECT * FROM matricula_ceneval WHERE id_aspirante = '".$d['id']."'");
							if (mysqli_num_rows($consulta_matricula)>0 && mysqli_num_rows($consulta_validacion_edu)==0)
							{
								$datos_matricula = mysqli_fetch_array($consulta_matricula);
								?>
                                <div class="row justify-content-center">
                                    <div class="col-12 mb-4 text-center">
                                        <h4>Ingresa al siguiente link para completar el formulario y generar tu pase de ingreso al EXANI-II</h4>
                                        <a href="https://registroenlinea.ceneval.edu.mx/RegistroLinea/indexCerrado.php" target="_blank" class="btn btn-info my-4"><i class="fas fa-pencil"></i> REGISTRO CENEVAL</a>
										<h4 class="mb-4">Institución: <strong>Secretaría De Investigación, Innovación Y Educación Superior</strong></h4>
										<h4 class="mb-4">Matrícula: <strong><?php echo $datos_matricula['matricula'];?></strong></h4>
										<h4 class="mb-2">Programa / Carrera: </h4>
										<h4 class="mb-4"><strong>ISENC-LEP Licenciatura en Educación Primaria</strong><br><strong>CEJDRTM-LEP Licenciatura en Educación Preescolar</strong></h4>
                                        <h4>Al finalizar adjunta el pase generado.</h4>
                                    </div>
                                </div>
								<div class="row justify-content-center" id="contenedor_pase">
									<div class="col-12 col-lg-8 mb-4">
										<?php
										$a = '../sistema/archivos/aspirantes/'.$d['id'].'/pase.pdf';
										$btn = '';
										$text = 'text-danger';
										if (file_exists($a))
										{
											$btn = '<a href="ver?token='.md5($d['id']).'&target=pase" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
											$text = 'text-success';
										}
										?>
										<label class="control-label <?php echo $text;?>">Pase de ingreso al examen</label>
										<input type="file" class="form-control" name="file_pase" id="file_pase" accept="application/pdf">
										<?php echo $btn;?>
									</div>
								</div>
								<hr>
								<div class="row justify-content-center">
                                    <div class="col-12 mb-4 text-center">
										<h4>Cuenta para el pago</h4>
										<h4>Banco: <strong>BBVA Bancomer S. A.</strong></h4>
										<h4>Beneficiario: <strong>SECRETARÍA DE INVESTIGACIÓN, INNOVACIÓN Y EDUCACIÓN SUPERIOR</strong></h4>
										<h4>Programa: <strong>ESCUELAS NORMALES</strong></h4>
										<h4>RFC: <strong>SHA840512-SX1</strong></h4>
										<h4>Número de Cuenta: <strong>0107468695</strong></h4>
										<h4>Clave interbancaria: <strong>012910001074686951</strong></h4>
										<h4>Numero de sucursal: <strong>7715</strong></h4>
                                    </div>
                                </div>
								<div class="row justify-content-center">
									<div class="col-12 col-lg-8 mb-4">
										<?php
										$a = '../sistema/archivos/aspirantes/'.$d['id'].'/recibo.pdf';
										$btn = '';
										$text = 'text-danger';
										if (file_exists($a))
										{
											$btn = '<a href="ver?token='.md5($d['id']).'&target=recibo" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
											$text = 'text-success';
										}
										?>
										<label class="control-label <?php echo $text;?>">Recibo de pago</label>
										<input type="file" class="form-control" name="file_recibo" id="file_recibo" accept="application/pdf">
										<?php echo $btn;?>
									</div>
								</div>
								<?php
							}
							else
							{
								if ($val['resultado']=='1')
								{
									echo '
									<div class="row justify-content-center">
										<div class="col-12 mb-4">
											<h4 class="text-info text-center">Gracias por tu participación en los exámenes psicométrico y de diagnóstico, un asesor se comunicará contigo para seguir el proceso de inscripción.</h4>
										</div>
									</div>';
								}
								else
								{
									//Examen Psicométrico
									if ($val['fecha_examen_p']=='0000-00-00')
									{
										echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-center"><strong>Ya puedes presentar tu examen psicométrico.</strong></h4>
												<a href="https://cert.edu.mx/examen_psicometrico" class="btn btn-warning btn-block btn-lg"><i class="fas fa-pencil"></i> Presentar examen psicométrico</a>
											</div>
										</div>';
									}
									else 
									{
										echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-dark text-center">Gracias por tu participación en el examen psicométrico, pronto recibirás una notificación a tu correo electrónico para continuar con el proceso.</h4>
											</div>
										</div>';
									}

									//Agradecimiento
									if ($val['presentado_p'] == '1' && $val['presentado_d'] == '1')
									{
										echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-info text-center">Gracias por tu participación en los exámenes psicométrico y de diagnóstico, un asesor se comunicará contigo para seguir el proceso de inscripción.</h4>
											</div>
										</div>';
									}
								}
							}

							echo '</div>';
						}
					}
					//Médico cirujano
					else
					{
						$consulta_validacion = mysqli_query($conexion,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."'");
						if (mysqli_num_rows($consulta_validacion)>0)
						{
							echo '<div class="container text-dark bg-white border py-3 mb-4">';
							$val = mysqli_fetch_array($consulta_validacion);
							$consulta_matricula = mysqli_query($conexion,"SELECT * FROM matricula_ceneval WHERE id_aspirante = '".$d['id']."'");
							if (mysqli_num_rows($consulta_matricula)>0)
							{
								$datos_matricula = mysqli_fetch_array($consulta_matricula);
								echo '
									<div class="row justify-content-center">
										<div class="col-12 mb-4">
											<h4 class="text-center">MATRÍCULA DEL CENEVAL: <strong>'.$datos_matricula['matricula'].'</strong></h4>
										</div>
									</div>
									<div class="row justify-content-center">
										<div class="col-12 mb-4 text-center">
											<h4>Ingresa al siguiente link para completar el formulario y generar tu pase de ingreso al EXANI-II</h4>
											<a href="https://registroenlinea.ceneval.edu.mx/RegistroLinea/indexCerrado.php" target="_blank" class="btn btn-info my-4"><i class="fas fa-pencil"></i> REGISTRO CENEVAL</a>
											<h4>Al finalizar adjunta el pase generado.</h4>
										</div>
									</div>
									
									';
								?>
								<div class="row justify-content-center" id="contenedor_pase">
									<div class="col-12 col-lg-8 mb-4">
										<?php
										$a = '../sistema/archivos/aspirantes/'.$d['id'].'/pase.pdf';
										$btn = '';
										$text = 'text-danger';
										if (file_exists($a))
										{
											$btn = '<a href="ver?token='.md5($d['id']).'&target=pase" target="_blank" class="btn btn-primary mt-3"><i class="fas fa-search"></i> Revisar documento</a>';
											$text = 'text-success';
										}
										?>
										<label class="control-label <?php echo $text;?>">Pase de ingreso al examen</label>
										<input type="file" class="form-control" name="file_pase" id="file_pase" accept="application/pdf">
										<?php echo $btn;?>
									</div>
								</div>
								<?php
							}
							else
							{
							
								if ($val['resultado']=='1')
								{
									echo '
									<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-info text-center">Gracias por tu participación en los exámenes psicométrico y de diagnóstico, un asesor se comunicará contigo para seguir el proceso de inscripción.</h4>
											</div>
										</div>';
								}
								else
								{
									//Examen Psicométrico
									if ($val['fecha_examen_p']=='0000-00-00')
									{
										echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-center"><strong>Ya puedes presentar tu examen psicométrico.</strong></h4>
												<a href="https://cert.edu.mx/examen_psicometrico" class="btn btn-warning btn-block btn-lg"><i class="fas fa-pencil"></i> Presentar examen psicométrico</a>
											</div>
										</div>';
									}
									else 
									{
										echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-dark text-center">Gracias por tu participación en el examen psicométrico, pronto recibirás una notificación a tu correo electrónico para continuar con el proceso.</h4>
											</div>
										</div>';
									}

									//Agradecimiento
									if ($val['presentado_p'] == '1' && $val['presentado_d'] == '1')
									{
										echo '
										<div class="row justify-content-center">
											<div class="col-12 mb-4">
												<h4 class="text-info text-center">Gracias por tu participación en los exámenes psicométrico y de diagnóstico, un asesor se comunicará contigo para seguir el proceso de inscripción.</h4>
											</div>
										</div>';
									}
								}
							}
							echo '</div>';
						}
					}
					
					?>
					<div class="row justify-content-center">
						<div class="col-12 col-lg-6">
							<button type="submit" class="btn btn-success btn-block mb-3" id="boton_finalizar">
								<i class="fas fa-save"></i> Guardar
							</button>
						</div>
						<div class="col-12 col-lg-6">
							<a href="login" class="btn btn-info btn-block">
								<i class="fas fa-sign-out-alt"></i> Cerrar sesión
							</a>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
	

	<div class="modal fade" id="modal_certificado" tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">FORMATO OBLIGATORIO</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
				</div>

				<div class="modal-body">
					<p>El documento tiene que haber sido escaneado.</p>
					<p>Formato vertical ambas caras.</p>
					<p>En caso de no poder ser escaneado será necesario entregarlo en forma física.</p>
				</div>
			</div>
		</div>
	</div>
	
	
	<!-- Scripts -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<!-- InputMask -->
	<script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!--Validación-->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/js/localization/messages_es.min.js" type="text/javascript"></script>
	<!--SweetAlert-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	<!--Datepicker-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
   	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>

	<script>
		$('.contenedor').addClass('d-none');
		$('#fecha_nac').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/aaaa'});
		$('#telefono').inputmask('9999999999', { placeholder: '' });
		$('#emergencia_telefono').inputmask('9999999999', { placeholder: '' });
		
		
		<?php
		if ($val['fecha_examen_d']=='0000-00-00')
		{
			//PRIMER SÁBADO
			$query = mysqli_query($conexion,"SELECT '".$val['fecha']."' + INTERVAL 5 - weekday('".$val['fecha']."') DAY AS fecha");
			$row = mysqli_fetch_array($query);
			$f = $row['fecha'];
			$fecha_1 = substr($f,8,2)."-". substr($f,5,2)."-".substr($f,0,4);
			
			//SEGUNDO SÁBADO
			$query = mysqli_query($conexion,"SELECT '".$val['fecha']."' + INTERVAL 7 - weekday('".$val['fecha']."') DAY AS fecha");
			$row = mysqli_fetch_array($query);
			$f = $row['fecha'];
			$query = mysqli_query($conexion,"SELECT '".$f."' + INTERVAL 5 - weekday('".$f."') DAY AS fecha");
			$row = mysqli_fetch_array($query);
			$f = $row['fecha'];
			$fecha_2 = substr($f,8,2)."-". substr($f,5,2)."-".substr($f,0,4);
		?>
		$('#fecha_examen_d').datepicker({
			format: 'dd-mm-yyyy',
			language: 'es',
			autoclose: true,
			beforeShowDay:function(date){ 
				var fechas = ['<?php echo $fecha_1;?>', '<?php echo $fecha_2;?>'];
				var dia = date.getDate()<10?'0'+date.getDate():date.getDate();
				var mes = (date.getMonth()+1)<10?'0'+(date.getMonth()+1):(date.getMonth()+1);
				var anio = date.getFullYear();
				var fecha = dia+'-'+mes+'-'+anio;
				if ($.inArray(fecha, fechas)!=-1)
				{
					return "active";
				}
				else
				{
					return false;
				}
			},
		});
		<?php
		}
		?>
		
		$( document ).ready( function () {

			// Code for the Validator
			$( '#FormRegistro' ).validate( {
				errorElement: 'span', //default input error message container
				errorClass: 'mensaje-error', // default input error message class
				focusInvalid: true, // do not focus the last invalid input
				onfocusout: function ( element ) {
					this.element( element );
				}, //Validate on blur
				onkeyup: function ( element ) {
					this.element( element );
				}, //Validate on keyup
				focusCleanup: true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
				ignore: ":not(:visible)",
				rules: {
					nombre: {
						required: true,
						minlength: 3
					},
					paterno: {
						required: true,
					},
					fecha_nac: {
						required: true,
					},
					genero: {
						required: true,
					},
					telefono: {
						required: true,
						minlength:10,
						maxlength:10,
					},
					edo_civil: {
						required: true,
					},
					pass: {
						required: true,
					},
					curp: {
						required: true,
						curp:true,
					},
					direccion: {
						required: true,
						minlength: 3,
					},
					institucion: {
						required: true,
						minlength: 3,
					},
					emergencia_nombre: {
						required: true,
						minlength: 3,
					},
					emergencia_telefono: {
						required: true,
						minlength:10,
						maxlength:10,
					}
				},

				messages: { // custom messages for radio buttons and checkboxes

				},

				invalidHandler: function ( event, validator ) { //display error alert on form submit   

				},

				highlight: function ( element ) { // hightlight error inputs
					$( element ).parent( 'div' ).addClass( 'has-error has-feedback' ); // set error class to the control group
				},

				unhighlight: function ( element ) { // hightlight error inputs
					$( element ).parent( 'div' ).removeClass( 'has-error has-feedback' ); // set error class to the control group
				},

				success: function ( label ) {
					label.parent( 'div' ).removeClass( 'has-error has-feedback' );
					label.remove();
				},

				errorPlacement: function ( error, element ) {
					$( element ).parent( 'div' ).addClass( 'has-error' );
					//Agregar mensajes debajo de los elementos
					if ( element.closest( '.form-group' ).size() === 1 ) {
						error.insertAfter( element.closest( '.form-group' ) );
					} else {
						error.insertAfter( element );
					}
				},

				submitHandler: function ( form ) {
					$( '#boton_finalizar' ).prop( 'disabled', true );
					Guardar();
				}

			} );

		} );

		//Nuevos metodos para jQuery Validate

		$.validator.addMethod("curp", function (value, element) {
			if (value !== '') 
			{
				var patt = new RegExp("^[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]$");
				return patt.test(value);
			} 
			else 
			{
				return false;
			}
		}, "Ingresa una CURP valido");

		/*****************************
		******************************
		FUNCIONES
		******************************
		******************************/
		
		CambioOferta();
		<?php
		if ($display == 'd-none')
		{
		?>
		$('.contenedor').addClass('d-none');
		<?php	
		}
		?>

		function CambioOferta() {
			console.log( $( '#id_oferta option:selected' ).val() );
			$('.contenedor').addClass('d-none');
			if ( $( '#id_oferta option:selected' ).text().includes( "Educación" ) && $( '#id_oferta option:selected' ).data('nivel') == 5) //EDUCACIÓN
			{
				console.log('Educación');
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_ine' ).removeClass( 'd-none' );
				$( '#contenedor_certificado' ).removeClass( 'd-none' );
				$( '#contenedor_constancia' ).removeClass( 'd-none' );
			} 
			else if ( $( '#id_oferta option:selected' ).text().includes( "Médico" ) && $( '#id_oferta option:selected' ).data('nivel') == 5) //MÉDICO CIRUJANO
			{
				console.log('Médico');
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_recibo' ).removeClass( 'd-none' );
				$( '#contenedor_identificacion' ).removeClass( 'd-none' );
				$( '#contenedor_pase' ).removeClass( 'd-none' );
				
			}
			else if ( $( '#id_oferta option:selected' ).data('nivel') > 5 && $( '#id_oferta option:selected' ).data('nivel') < 8 ) //POSGRADOS
			{
				console.log('Posgrado');
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_titulo' ).removeClass( 'd-none' );
				$( '#contenedor_cedula' ).removeClass( 'd-none' );
				$( '#contenedor_certificado_lic' ).removeClass( 'd-none' );
			} 
			else if ( $( '#id_oferta option:selected' ).data('nivel') == 8 ) //DOCTORADOS
			{
				console.log('Docotrado');
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_titulo_maestria' ).removeClass( 'd-none' );
				$( '#contenedor_cedula_maestria' ).removeClass( 'd-none' );
				$( '#contenedor_certificado_maestria' ).removeClass( 'd-none' );
			} 		
			else if ( $( '#id_oferta option:selected' ).val() != '' ) //LICENCIATURAS
			{
				console.log('Licenciaturas');
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_certificado' ).removeClass( 'd-none' );
				$( '#contenedor_constancia' ).removeClass( 'd-none' );
			} 
			if ( $( '#id_oferta option:selected' ).data('nivel') >= 6 )//POSGRADOS
			{
				$( '#contenedor_trabajo' ).removeClass( 'd-none' );
			}
		}

		function CambioGenero() {
			console.log( "CambioGenero" );
			if ( $( '#genero option:selected' ).val() == 'Masculino' ) {
				if ( $( '#estado_civil option:selected' ).val() == 'Soltera' ) {
					$( '#estado_civil' ).html( '<option value="Soltero" selected>Soltero</option><option value="Casado">Casado</option><option value="Divorciado">Divorciado</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Casada' ) {
					$( '#estado_civil' ).html( '<option value="Soltero">Soltero</option><option value="Casado" selected>Casado</option><option value="Divorciado">Divorciado</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Divorciada' ) {
					$( '#estado_civil' ).html( '<option value="Soltero">Soltero</option><option value="Casado">Casado</option><option value="Divorciado" selected>Divorciado</option>' );
				}
			} else {
				if ( $( '#estado_civil option:selected' ).val() == 'Soltero' ) {
					$( '#estado_civil' ).html( '<option value="Soltera" selected>Soltera</option><option value="Casada">Casada</option><option value="Divorciada">Divorciada</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Casado' ) {
					$( '#estado_civil' ).html( '<option value="Soltera">Soltera</option><option value="Casada" selected>Casada</option><option value="Divorciada">Divorciada</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Divorciado' ) {
					$( '#estado_civil' ).html( '<option value="Soltera">Soltera</option><option value="Casada">Casada</option><option value="Divorciada" selected>Divorciada</option>' );
				}
			}
		}		

		function Guardar() {
			var form_data = new FormData();
			
			var file_curp = $( '#file_curp' ).prop( 'files' )[ 0 ];
			var file_certificado = $( '#file_certificado' ).prop( 'files' )[ 0 ];
			var file_constancia = $( '#file_constancia' ).prop( 'files' )[ 0 ];
			
			var file_identificacion = $( '#file_identificacion' ).prop( 'files' )[ 0 ];
			var file_titulo = $('#file_titulo').prop('files')[0]; 
			var file_certificado_lic = $( '#file_certificado_lic' ).prop( 'files' )[ 0 ];
			var file_cedula = $( '#file_cedula' ).prop( 'files' )[ 0 ];
			var file_titulo_maestria = $('#file_titulo_maestria').prop('files')[0]; 
			var file_certificado_maestria = $( '#file_certificado_maestria' ).prop( 'files' )[ 0 ];
			var file_cedula_maestria = $( '#file_cedula_maestria' ).prop( 'files' )[ 0 ];
			
			if ($( '#file_recibo' ).length)
			{
				var file_recibo = $( '#file_recibo' ).prop( 'files' )[ 0 ];
				form_data.append( 'file_recibo', file_recibo );
			}
			if ($( '#file_ine' ).length)
			{
				var file_ine = $( '#file_ine' ).prop( 'files' )[ 0 ];
				form_data.append( 'file_ine', file_ine );
			}
			if ($( '#file_pase' ).length)
			{
				var file_pase = $( '#file_pase' ).prop( 'files' )[ 0 ];
				form_data.append( 'file_pase', file_pase );
			}
			
			
			form_data.append( 'file_curp', file_curp );
			form_data.append( 'file_certificado', file_certificado );
			form_data.append( 'file_constancia', file_constancia );
			form_data.append( 'file_identificacion', file_identificacion );
			form_data.append('file_titulo', file_titulo);
			form_data.append( 'file_certificado_lic', file_certificado_lic );
			form_data.append( 'file_cedula', file_cedula );
			form_data.append('file_titulo_maestria', file_titulo_maestria);
			form_data.append( 'file_certificado_maestria', file_certificado_maestria );
			form_data.append( 'file_cedula_maestria', file_cedula_maestria );

			form_data.append( 'nombre', $( '#nombre' ).val() );
			form_data.append( 'paterno', $( '#paterno' ).val() );
			form_data.append( 'materno', $( '#materno' ).val() );
			form_data.append( 'fecha_nac', $( '#fecha_nac' ).val() );
			form_data.append( 'genero', $( '#genero' ).val() );
			form_data.append( 'estado_civil', $( '#estado_civil' ).val() );
			form_data.append( 'correo', $( '#correo' ).val() );
			form_data.append( 'pass', $( '#pass' ).val() );
			form_data.append( 'telefono', $( '#telefono' ).val() );
			form_data.append( 'curp', $( '#curp' ).val() );
			form_data.append( 'emergencia_nombre', $( '#emergencia_nombre' ).val() );
			form_data.append( 'emergencia_telefono', $( '#emergencia_telefono' ).val() );
			form_data.append( 'direccion', $( '#direccion' ).val() );
			form_data.append( 'municipio', $( '#municipio' ).val() );
			form_data.append( 'cp', $( '#cp' ).val() );
			form_data.append( 'institucion', $( '#institucion' ).val() );
			form_data.append( 'lugar_trabajo', $( '#lugar_trabajo' ).val() );
			form_data.append( 'id_campus', $( '#id_campus' ).val() );
			form_data.append( 'id_oferta', $( '#id_oferta' ).val() );
			form_data.append( 'token','<?php echo md5($_SESSION['id']);?>');
			form_data.append( 'fecha_examen_d', $( '#fecha_examen_d' ).val() || '' );

			$( '#boton_finalizar' ).empty();
			$( '#boton_finalizar' ).prop( 'disabled', true );
			$( '#boton_finalizar' ).append( '<i class="fas fa-spinner fa-spin"></i> Guardando...' );
			// Enviamos el formulario usando AJAX
			$.ajax( {
				type: 'POST',
				//dataType: "json",
				contentType: false,
				processData: false,
				data: form_data,
				url: "ajax/guardar",
				cache: false,
				// Mostramos un mensaje con la respuesta de PHP
				success: function ( data ) {
					console.log( data );
					switch ( data ) {
						case "-1":
						{
							//Error
							Swal.fire( {
								icon: 'error',
								title: 'Oops...',
								text: 'No tenemos registrado al aspirante.',
							} );
							break;
						}
						case "-2":
						{
							//Error
							Swal.fire( {
								icon: 'error',
								title: 'Oops...',
								text: 'Ocurrío un error, por favor intente de nuevo.',
							} );
							break;
						}
						case "1":
						{
							Swal.fire( {
								icon: 'success',
								title: 'Éxito',
								text: 'Tus datos se actualizaron correctamente.',
							} );
							$('#FormRegistro').closest('form').find("input[type=file]").val("");
							location.reload();
							break;
						}
						default:
						{
							//Error
							Swal.fire( {
								icon: 'error',
								title: 'Oops...',
								text: 'Ocurrío un error, al intentar guardar alguno de los archivos, verifique que el formato sea correcto y que no supere 10MB de tamaño.',
							} );
							break;
						}
					}
					$( '#boton_finalizar' ).empty();
					$( '#boton_finalizar' ).append( '<i class="fas fa-save"></i> Guardar' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					Swal.fire( {
						icon: 'error',
						title: 'Oops...',
						text: 'Ocurrío un error, al parecer el tamaño total de los archivos supera 10MB, por favor intenta subir archivos menos pesados.',
					} );
					$( '#boton_finalizar' ).empty();
					$( '#boton_finalizar' ).append( '<i class="fas fa-save"></i> Guardar' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				}
			} )
			return false;
		}
	</script>
</body>
</html>