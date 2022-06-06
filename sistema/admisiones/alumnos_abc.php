<?php 
include("includes/config.php");
if ($_SESSION['nivel']==2)
{
	$_POST['campus'] = $_SESSION['campus'];
}
if (!isset($_POST['id']))
{
	//Nueva 
	$titulo = 'Nuevo';
}
else if (isset($_POST['id']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM alumnos WHERE id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	$_SESSION['id_alumno'] = $d['id'];
	
	$img = $d['genero']=='Masculino'?'images/male.png':'images/female.png';
	
	$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
	$d1 = mysqli_fetch_array($consulta1);
	
	if ($d['fecha_nac'] != '0000-00-00')
	{
		$d['fecha_nac'] = substr($d['fecha_nac'],8,2).'/'.substr($d['fecha_nac'],5,2).'/'.substr($d['fecha_nac'],0,4);
	}
	if ($_POST['editar'] == 1)
	{
		//Editar
		$titulo = 'Editar';
	}
	else if ($_POST['eliminar'] == 1)
	{
		//Eliminar
		$titulo = 'Eliminar';
		$read = 'readonly';
		$disabled = 'disabled';
	}
}
$d['pass'] = $d['pass']!=''?$d['pass']:'1234';
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
    <!-- End of Styling -->
	
	<!--ihover-->
	<link rel="stylesheet" href="plugins/ihover/ihover.css">
	<!-- Cropper-->
	<link href="plugins/cropper-master/dist/cropper.min.css" rel="stylesheet">
	<link href="css/crop_avatar.css?v=<?php echo rand();?>" rel="stylesheet">
	
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
                            <?php echo $titulo;?>
                        </div>
                        <div class="panel-body">
							
							<div class="profile-avatar-container">
								<div  id="crop-avatar" class="profile-avatar">
									<!-- Current avatar -->
									<div class="avatar-view" title="Cambiar imagen de perfil">
										<div class="ih-item square effect6 from_top_and_bottom" style="width: 165px; height: 204px; margin: 0 auto;border:0;box-shadow: none">			
											<a href="javascript: void(0)">
												<div class="img">
													<?php 
													if (file_exists('../archivos/alumnos/'.$d['id'].'/foto.jpg'))
													{
														$img = '../archivos/alumnos/'.$d['id'].'/foto.jpg?v='.rand();
													}
													?>
													<img src="<?php echo $img;?>" title="Cambiar imagen" >
													<div class="info">
														<h3>Cambiar imagen</h3>
														<p><?php echo $d['nombre'];?></p>
													</div>
												</div>
											</a>
										</div>
									</div>		
									<br>
									<div class="row">
										<div class="col-lg-12 text-center">
											<form action="imprimir_credencial" method="post" target="_blank">
												<input type="hidden" name="id" value="<?php echo $d['id'];?>">
												<button type="submit" class="btn btn-info"><i class="fas fa-id-card"></i> Imprimir credencial</button>
											</form>
										</div>
									</div>

									<!-- Cropping modal -->
									<div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1" >
										<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<form class="avatar-form" action="crop_avatar" enctype="multipart/form-data" method="post">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title" id="avatar-modal-label">Cambiar imagen de perfil</h4>
													</div>
													<div class="modal-body">
														<div class="avatar-body">
															<!-- Upload image and data -->
															<div class="avatar-upload">
																<input type="hidden" class="avatar-src" name="avatar_src">
																<input type="hidden" class="avatar-data" name="avatar_data">
																<label for="avatarInput">Subir imagen</label>
																<input type="file" class="avatar-input" id="avatarInput" name="avatar_file" accept="image/jpeg">
															</div>
															<!-- Crop and preview -->
															<div class="row">
																<div class="col-md-9">
																	<div class="avatar-wrapper"></div>
																</div>
																<div class="col-md-3">
																	<div class="avatar-preview preview-lg"></div>
																</div>
															</div>
															<div class="row avatar-btns">
																<div class="col-md-12">
																	<button type="submit" class="btn btn-success btn-block btn-lg avatar-save"><i class="fa fa-save"></i> Guardar</button>
																</div>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div><!-- /.modal -->

									<!-- Loading state -->
									<div class="loading" aria-label="Cargando..." role="img" tabindex="-1"></div>
								</div>

							</div>
							
							
							
							<form action="alumnos" method="post" id="form_abc" enctype="multipart/form-data">
								<div class="row">
									<h3 class="text-center">Información básica</h3>
									<div class="form-wrapper col-sm-4">
										<label>Nombre</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Primer apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="paterno" placeholder="Primer apellido" value="<?php echo $d['paterno'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Segundo apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="materno" placeholder="Segundo apellido" value="<?php echo $d['materno'];?>" <?php echo $read;?>>
										</div>
									</div>
									
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Fecha de nacimiento</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="fecha_nac" id="fecha_nac" placeholder="Fecha de nacimiento" value="<?php echo $d['fecha_nac'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Genero</label>
										<div class="form-group">
											<select class="form-control" name="genero" id="genero" onChange="CambioGenero()" <?php echo $disabled;?>>
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
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Estado civil</label>
										<div class="form-group">
											<select class="form-control" name="estado_civil" id="estado_civil" <?php echo $disabled;?>>
												<?php
												if ($d['genero']=='Masculino')
												{
													switch ($d['estado_civil'])
													{
														case 'Soltero':
														{
															echo '
															<option value="Soltero" selected> Soltero </option>
															<option value="Casado"> Casado </option>
															<option value="Divorciado"> Divorciado </option>';
															break;
														}
														case 'Casado':
														{
															echo '
															<option value="Soltero"> Soltero </option>
															<option value="Casado" selected> Casado </option>
															<option value="Divorciado"> Divorciado </option>';
															break;
														}
														case 'Divorciado':
														{
															echo '
															<option value="Soltero"> Soltero </option>
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
															echo '
															<option value="Soltera" selected> Soltera </option>
															<option value="Casada"> Casada </option>
															<option value="Divorciada"> Divorciada </option>';
															break;
														}
														case 'Casada':
														{
															echo '
															<option value="Soltera"> Soltera </option>
															<option value="Casada" selected> Casada </option>
															<option value="Divorciada"> Divorciada </option>';
															break;
														}
														case 'Divorciada':
														{
															echo '
															<option value="Soltera"> Soltera </option>
															<option value="Casada"> Casada </option>
															<option value="Divorciada" selected> Divorciada </option>';
															break;
														}
													}
												}
												else
												{
													echo '
															<option value="Soltera" selected> Soltera </option>
															<option value="Casada"> Casada </option>
															<option value="Divorciada"> Divorciada </option>';
												}
												?>
											</select>
										</div>
									</div>
									
								</div>
								
								<div class="row">									
									<div class="form-wrapper col-sm-4">
										<label>Correo</label>
										<div class="form-group ">
											<input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php echo $d['correo'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Contraseña</label>
										<div class="form-group ">
											<input type="password" class="form-control" name="pass" placeholder="Contraseña" id="contrasena_personal" value="<?php echo $d['pass'];?>" <?php echo $read;?>>
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<label>Teléfono</label>
										<div class="form-group ">
											<input type="tel" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo $d['telefono'];?>" <?php echo $read;?>>
										</div>
									</div>
								</div>

								<div class="row">									
									<div class="form-wrapper col-sm-4">
										<label>Correo Institucional</label>
										<div class="form-group ">
											<input type="email" class="form-control" name="correo_institucional" placeholder="Correo" value="<?php echo $d['correo_institucional'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Contraseña</label>
										<div class="form-group ">
											<input type="password" class="form-control" name="pass_institucional" id="contrasena_institucional" placeholder="Contraseña" value="<?php echo $d['pass_institucional'];?>" <?php echo $read;?>>
										</div>
									</div>

									<div style="margin-top:15px;">
          								<input style="margin-left:20px;" type="checkbox" id="mostrar_contrasena" title="clic para mostrar contraseña"/>
										&nbsp;&nbsp;Mostrar Contraseñas
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>CURP</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="curp" placeholder="CURP" value="<?php echo $d['curp'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Dirección</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="direccion" placeholder="Direccion" value="<?php echo $d['direccion'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Institución de procedencia</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="institucion" placeholder="Institución de procedencia" value="<?php echo $d['institucion'];?>" <?php echo $read;?>>
										</div>
									</div>
																	
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Tutor</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="emergencia_nombre" placeholder="En caso de emergencia contactar a" value="<?php echo $d['emergencia_nombre'];?>" <?php echo $read;?>>
										</div>
									</div>	
									
									<div class="form-wrapper col-sm-4">
										<label>Teléfono tutor</label>
										<div class="form-group">
											<input type="tel" class="form-control" name="emergencia_telefono" placeholder="Teléfono" value="<?php echo $d['emergencia_telefono'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Lugar de trabajo</label>
										<div class="form-group">
											<input type="text" class="form-control" name="lugar_trabajo" placeholder="Lugar de trabajo" value="<?php echo $d['lugar_trabajo'];?>" <?php echo $read;?>>
										</div>
									</div>
								</div>
								
								
								<div class="row">
									<h3 class="text-center">Oferta Educativa</h3>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<div class="form-group">
											<label>Oferta educativa</label>
											<input type="text" class="form-control" name="oferta" placeholder="Oferta" value="<?php echo $d1['nombre'];?>" readonly>
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<div class="form-group">
											<label>Matrícula</label>
											<input type="text" class="form-control" name="matricula" placeholder="Matrícula" value="<?php echo $d['matricula'];?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<h3 class="text-center"> Documentos probatorios </h3>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>CURP</label>
											<input type="file" class="form-control" name="file_curp" id="file_curp" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/curp.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Certificado de bachillerato</label>
											<input type="file" class="form-control" name="file_certificado" id="file_certificado" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/certificado.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Constancia de estudios</label>
											<input type="file" class="form-control" name="file_constancia" id="file_constancia" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/constancia.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>
								</div>
																
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Recibo de pago</label>
											<input type="file" class="form-control" name="file_recibo" id="file_recibo" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/recibo.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Pase de ingreso al examen</label>
											<input type="file" class="form-control" name="file_pase" id="file_pase" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/pase.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>INE</label>
											<input type="file" class="form-control" name="file_ine" id="file_ine" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/ine.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>
								</div>
								
								<hr>
								<p class="text-center"><strong>Posgrados</strong></p>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Identificación oficial (INE, Pasaporte o constancia de estudios con fotografía)</label>
											<input type="file" class="form-control" name="file_identificacion" id="file_identificacion" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/identificacion.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Título</label>
											<input type="file" class="form-control" name="file_titulo" id="file_titulo" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/titulo.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Certificado de licenciatura</label>
											<input type="file" class="form-control" name="file_certificado_lic" id="file_certificado_lic" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/certificado_lic.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Cédula profesional</label>
											<input type="file" class="form-control" name="file_cedula" id="file_cedula" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/cedula.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								
								
								<hr>
								<p class="text-center"><strong>Doctorado</strong></p>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Título de maestría</label>
											<input type="file" class="form-control" name="file_titulo_maestria" id="file_titulo_maestria" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/titulo_maestria.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Certificado de maestría</label>
											<input type="file" class="form-control" name="file_certificado_maestria" id="file_certificado_maestria" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/certificado_maestria.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<label>Cédula profesional de maestría</label>
											<input type="file" class="form-control" name="file_cedula_maestria" id="file_cedula_maestria" accept="application/pdf">
											<?php
											$a = '../archivos/alumnos/'.$d['id'].'/cedula_maestria.pdf';
											echo file_exists($a)?'<a href="'.$a.'?v='.rand().'" target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Descargar</a>':'';
											?>
										</div>
									</div>									
								</div>
								<hr>
								
								<br>

								
																
								<div class="row">
									<div class="col-sm-8">
										<?php
										if ($_POST['editar'] == 1)
										{
											echo '
											<input type="hidden" name="editar" value="'.$d['id'].'">
											<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fas fa-save"></i></button>
											';
										}
										else if ($_POST['eliminar'] == 1)
										{
											echo '
											<input type="hidden" id="eliminarid" name="eliminar" value="'.$d['id'].'">
											<input type="button" class="btn btn-danger btn-lg btn-block" value="Eliminar" class="" onclick="eliminarAlumno();"></button>
											';
										}
										else
										{
											echo '
											<input type="hidden" name="alta" value="1">
											<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fas fa-save"></i></button>
											';
										}
										?>
									</div>
									<div class="col-sm-4">
										<a href="alumnos" class="btn btn-default btn-lg btn-block">Cancelar <i class="fas fa-times"></i></a>
									</div>
								</div>
                            </form>
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

        <!-- scripts -->
        <script src="addons/scripts.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
		<!-- Current page scripts -->
        <div class="current-scripts">
		<!-- InputMask -->
		<script src="plugins/input-mask/jquery.inputmask.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- Validate -->
		<script src="addons/jqueryvalidate/jquery.validate.js"></script>
		<script src="addons/jqueryvalidate/localization/messages_es.min.js" type="text/javascript"></script>
		<!--cropper-->
		<script src="plugins/cropper-master/dist/cropper.min.js"></script>
		<script src="js/crop_avatar.js"></script>
		<script>
			$('#fecha_nac').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/aaaa' });
			$('#telefono').inputmask('9999999999', { placeholder: '' });
			$('#emergencia_telefono').inputmask('9999999999', { placeholder: '' });
			$( document ).ready(function() {
				$('#nombre').focus();
			});

			$( '#form_abc' ).validate( {
				errorElement: 'span', //default input error message container
				errorClass: 'text-danger', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				onfocusout: function ( element ) {
					this.element( element );
				}, //Validate on blur
				onkeyup: function ( element ) {
					this.element( element );
				}, //Validate on keyup
				focusCleanup: true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
				ignore: "",
				rules: {
					//CAMBIAR POR LAS VARIABLES QUE SEAN OBLIGATORIAS O NECESITEN VALIDACIÓN
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
					correo: {
						required: true,
						minlength: 3,
						email: true
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
					},
					id_campus: {
						required: true,
					},
					id_oferta: {
						required: true,
					},
				},

				messages: { // custom messages for radio buttons and checkboxes

				},

				invalidHandler: function ( event, validator ) { //display error alert on form submit   

				},

				highlight: function ( element ) { // hightlight error inputs
					$( element ).closest( '.form-group' ).addClass( 'has-error has-feedback' ); // set error class to the control group
				},

				unhighlight: function ( element ) { // hightlight error inputs
					$( element ).closest( '.form-group' ).removeClass( 'has-error has-feedback' ); // set error class to the control group
				},

				success: function ( label ) {
					label.closest( '.form-group' ).removeClass( 'has-error has-feedback' );
					label.remove();
				},

				errorPlacement: function ( error, element ) {
					//Agregar mensajes debajo de los elementos
					error.insertAfter( element );
				},

				submitHandler: function ( form ) {
					form.submit();
				}
			} );
			
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
			

			function CambioGenero()
			{
				console.log("CambioGenero");
				if ($('#genero option:selected').val()=='Masculino')
				{
					if ($('#estado_civil option:selected').val()=='Soltera')
					{
						$('#estado_civil').html('<option value="Soltero" selected>Soltero</option><option value="Casado">Casado</option><option value="Divorciado">Divorciado</option>');
					}
					if ($('#estado_civil option:selected').val()=='Casada')
					{
						$('#estado_civil').html('<option value="Soltero">Soltero</option><option value="Casado" selected>Casado</option><option value="Divorciado">Divorciado</option>');
					}
					if ($('#estado_civil option:selected').val()=='Divorciada')
					{
						$('#estado_civil').html('<option value="Soltero">Soltero</option><option value="Casado">Casado</option><option value="Divorciado" selected>Divorciado</option>');
					}
				}
				else
				{
					if ($('#estado_civil option:selected').val()=='Soltero')
					{
						$('#estado_civil').html('<option value="Soltera" selected>Soltera</option><option value="Casada">Casada</option><option value="Divorciada">Divorciada</option>');
					}
					if ($('#estado_civil option:selected').val()=='Casado')
					{
						$('#estado_civil').html('<option value="Soltera">Soltera</option><option value="Casada" selected>Casada</option><option value="Divorciada">Divorciada</option>');
					}
					if ($('#estado_civil option:selected').val()=='Divorciado')
					{
						$('#estado_civil').html('<option value="Soltera">Soltera</option><option value="Casada">Casada</option><option value="Divorciada" selected>Divorciada</option>');
					}
				}
			}
			
			function eliminarAlumno(){
				Swal.fire({
					title: '¿Estas seguro de eliminar al alumno?',
					icon: 'error',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Si, estoy seguro!',
					cancelButtonText: 'Cancelar',
					}).then((result) => {
					if (result.isConfirmed) {
						var eliminar = document.getElementById("eliminarid").value;
						$.ajax({
							type: "POST",
							url: "alumnos",
							data: {eliminar: eliminar},
							success: function(response){
								let timerInterval
								Swal.fire({
									title: 'Cargando....',
									html: 'Finaliza en  <b></b> milliseconds.',
									timer: 2000,
									timerProgressBar: true,
									didOpen: () => {
										Swal.showLoading()
										const b = Swal.getHtmlContainer().querySelector('b')
										timerInterval = setInterval(() => {
										b.textContent = Swal.getTimerLeft()
										}, 100)
									},
									willClose: () => {
										clearInterval(timerInterval)
									}
									}).then((result) => {
									/* Read more about handling dismissals below */
									if (result.dismiss === Swal.DismissReason.timer) {
										window.location.href = "alumnos.php";
									}
								});
							}
						})
					}
				});
				
			}

		</script>
		<script>
			$(document).ready(function () {
				$('#mostrar_contrasena').click(function () {
					if ($('#mostrar_contrasena').is(':checked')) {
						$('#contrasena_personal').attr('type', 'text');
						$('#contrasena_institucional').attr('type', 'text');
					} else {
						$('#contrasena_personal').attr('type', 'password');
						$('#contrasena_institucional').attr('type', 'password');
					}
				});
			});
		</script>
            
        </div>
		

    </div>

</body>

</html>