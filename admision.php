<?php
$p = basename( __FILE__, ".php" );
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Centro Educativo Rodríguez Tamayo">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>ADMISIONES | CENTRO EDUCATIVO RODRÍGUEZ TAMAYO</title>
	<link rel="icon" href="assets/images/favicon.png">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,700|Roboto:300,400,700'" rel="stylesheet">
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS-->
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand();?>">
</head>
<body>
	<?php include('assets/includes/header.php');?>
	
		
	<section class="hero-area" id="parallax-bg">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6 text-left">
					<h1 class="title">Admisiones <br>2022</h1>
					<h4 class="subtitle">BIENVENIDO</h4>
				</div>
			</div>
		</div>
	</section>
	
	<section class="container-fluid bg-secondary pl-0">
		<div class="row justify-content-center">
			<div class="col-12">
				<ul class="nav tab" role="tablist">
					<li class="nav-item my-auto">
						<a class="nav-link active" data-toggle="tab" href="#tab1">
							<i class="fas fa-user-tie"></i> LICENCIATURAS
						</a>
					</li>
					<!--li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab2">
							<small>LICENCIATURA EN</small>
							<br>
							<i class="fas fa-user-md"></i> MÉDICO CIRUJANO
							<br>
							<small>CERT TICUL</small>
						</a>
					</li-->
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab3">
							<small>LICENCIATURA EN</small>
							<br>
							<i class="fas fa-chalkboard-teacher"></i> EDUCACIÓN PRIMARIA Y EDUCACIÓN PREESCOLAR
						</a>
					</li>
					<li class="nav-item my-auto">
						<a class="nav-link" data-toggle="tab" href="#tab4">
							<i class="fas fa-user-tie"></i> POSGRADOS
						</a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	
	<section class="container my-4">		
		<div class="my-5"></div>

		<div class="row justify-content-center">
			<div class="col-12">
				<div class="tab-content">

					<div class="tab-pane fade show active" id="tab1">
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8">
								<h2 class="text-primary h1">Proceso de<br> admisión 2022</h2>
							</div>
							<div class="col-12 col-lg-4">
								<ul>
									<li>Administración y Mercadotecnía</li>
									<li>Derecho</li>
									<li>Enfermería</li>
									<li>Fisioterapia</li>
									<li>Nutrición</li>
									<li>Psicología</li>
								</ul>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">1.- Prepara la siguiente documentación.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary"><strong>- CURP.</strong></h4>
										<h4 class="text-secondary"><strong>- Certificado de bachillerato</strong> (en caso de no contar aún con él, puedes subir una constancia que acredite que estás cursando los últimos semestres de la preparatoria).</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">2.- Elige cómo te gustaría realizar el proceso de admisión.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 col-lg-6">
										<a href="admisiones/registro?oferta=licenciaturas" target="_blank" class="text-uppercase btn btn-lg btn-block btn-primary py-lg-3 py-2 mb-3"><i class="fas fa-pencil"></i> Inscripción en línea</a>
									</div>
									<div class="col-12 col-lg-6">
										<?php
										if ($_GET['campus']=='ticul')
										{
											$mapa = 'https://goo.gl/maps/D45UPZYGACNsqHH86';
										}
										else
										{
											$mapa = 'https://goo.gl/maps/nW1HvhJVGTQdSb6cA';
										}
										?>
										<a href="<?php echo $mapa;?>" target="_blank" class="text-uppercase btn btn-lg btn-block btn-primary py-lg-3 py-2 mb-3"><i class="fas fa-user-tie"></i> Inscripción presencial</a>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">3.- Validación de documentos.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Nuestro equipo de admisiones validará que la documentación enviada sea correcta y se te notificará al correo proporcionado.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">4.- Examen Psicométrico.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Una vez confirmada la validación de documentos, ingresa a tu <strong>perfil de aspirante</strong> donde encontrarás:</h4>
										<h4 class="text-secondary"><strong>- El link para presentar el examen psicométrico.</strong></h4>
										<h4 class="text-secondary"><strong>- El calendario para seleccionar la fecha de tu examen de diagnóstico.</strong></h4>
										<h4 class="text-secondary">Ambos serán de manera virtual.</h4>
										<h4 class="text-secondary">A partir de la confirmación de documentos tendrás como máximo 2 días naturales para presentar el examen psicométrico.</h4>
										<h4 class="text-secondary">Al finalizar deberás descargar la constancia de haber concluido el examen.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">5.- Examen Diagnóstico.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">El examen de diagnóstico se presenta en la fecha agendada ingresando a la plataforma a través del link que aparecerá en tu <strong>perfil de aspirante</strong> y la duración es de 4hrs 30min.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">6.- Notificación de resultados.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Recibirás tu resultado de admisión al correo personal proporcionado a la institución.</h4>
										<h4 class="text-secondary">Una vez teniendo los resultados de admisión deberás acudir a la institución en los próximos 7 días hábiles para realizar el pago de inscripción.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">7.- Inscripción.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Acude a la institución al departamento de admisiones para que un asesor genere tu ficha de pago, correo electrónico institucional y tomarte la foto para tu credencial.</h4>
										<?php 
										if ($_GET['campus']=='ticul')
										{
											echo '<h4 class="text-secondary">Deberás entregar la siguiente documentación:</h4>
										<h4 class="text-secondary">- Acta de nacimiento en original y una copia legible.</h4>
										<h4 class="text-secondary">- Clave Única de Registro de Población (CURP) en original y copia legible.</h4>
										<h4 class="text-secondary">- Certificado de Estudios de Bachillerato o Constancia debidamente validada que emita la institución de educación media superior, con fotografía cancelada con sello de la institución del ciclo escolar 2021-2022, en original y una copia legible.</h4>
										<h4 class="text-secondary">- Cuatro fotografías recientes de frente, en papel mate, tamaño infantil, blanco y negro (no instantáneas).</h4>';
										}
										?>
										<h4 class="text-secondary">Realiza el pago en el departamento de cajas (El monto de la inscripción de penderá de cada Licenciatura).</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">8.- Cursos propedéuticos e inicio de clases.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Recibirás un correo con la información y fechas correspondientes a los <strong>cursos propedéuticos e inicio de clases.</strong></h4>
									</div>
								</div>
							</div>							
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary text-center h2">¿Deseas más información?</h2>
								<h4 class="text-primary text-center">Permítenos ayudarte. Elige la opción que prefieras.</h4>
							</div>
						</div>
							
						<div class="row justify-content-center my-4">
							<div class="col-12 col-lg-3">
								<a href="agendar" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fas fa-calendar-alt"></i></div>
									<h4 class="text-primary text-center my-2">Asesoría online</h4>
								</a>
							</div>
							<div class="col-12 col-lg-3">
								<a href="https://wa.me/529991267106" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fab fa-whatsapp"></i></div>
									<h4 class="text-primary text-center my-2">Whatsapp</h4>
								</a>
							</div>
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">O también puedes descargar la Convocatoria oficial.</h4>
							</div>
							<div class="col-12 col-lg-1 text-lg-left text-center">
								<a href="ver.php?token=convocatorias&recurso=Convocatoria_para_ingreso_a_Licenciatura.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div>
						</div>
						
						<div class="row justify-content-center mt-4">
							<div class="col-12 col-lg-6">
								<a href="admisiones/registro?oferta=licenciaturas" target="_blank" class="text-uppercase btn btn-lg btn-block btn-secondary py-lg-3 py-2 mb-3"><i class="fas fa-pencil"></i> INSCRIBIRME</a>
							</div>
							<div class="col-12 col-lg-6">
								<a href="admisiones/perfil" target="_blank" class="text-uppercase btn btn-lg btn-block btn-secondary py-lg-3 py-2 mb-3"><i class="fas fa-user"></i> INGRESAR A MI PERFIL DE ASPIRANTE</a>
							</div>
						</div>
																		
					</div><!--TAB-->
					
					<!--div class="tab-pane fade" id="tab2">
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary h1">Proceso de<br> admisión 2022</h2>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">1.- Realiza el pago del examen EXANI-II.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Cuota del examen: <strong>$700.00</strong></h4>
										<h4 class="text-secondary">Beneﬁciario: <strong>Excelencia en Educación A.C.</strong></h4>
										<h4 class="text-secondary">Cuenta: <strong>0113624676</strong></h4>
										<h4 class="text-secondary">Banco: <strong>BBVA BANCOMER</strong></h4>
										<h4 class="text-secondary">CLABE interbancaria: <strong>012917001136246766</strong></h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">2.- Regístrate en línea.</h2>
									</div>
								</div>
								
								<div class="row justify-content-start">
									<div class="col-12">
										<h4 class="text-primary">Prepara la siguiente documentación <strong>en PDF</strong> y en archivos individuales.</h4>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary"><strong>- CURP.</strong></h4>
										<h4 class="text-secondary"><strong>- Identiﬁcación oﬁcial</strong> con fotografía<small> (Constancia de estudios con fotografía, INE o pasaporte).</small></h4>
										<h4 class="text-secondary">- <strong>Comprobante de pago del EXANI-II.</strong></h4>
									</div>
								</div>
									
								<div class="row justify-content-center mt-4">
									<div class="col-12 col-lg-6">
										<a href="admisiones/registro?oferta=medico" target="_blank" class="text-uppercase btn btn-lg btn-block btn-primary py-lg-3 py-2 mb-3"><i class="fas fa-pencil"></i> Registro en línea</a>
									</div>
								</div>
								
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">3.- Examen psicométrico en línea.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Una vez conﬁrmada la validación de documentos, recibirás un correo con la siguiente información:</h4>
										<h4 class="text-secondary">-Link para ingresar a tu perﬁl y presentar el examen psicométrico. (Recuerda que tienes 5 días naturales para presentar el examen).</h4>

										<h4 class="text-secondary">*La prueba psicométrica permite realizar una exploración y tamizaje de los diferentes indicadores de logro o éxito para la permanencia en la carrera universitaria. Así mismo, otorga una perspectiva de las características de los alumnos en los posibles factores de riesgo.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">4.- Genera tu pase de ingreso al EXANI-II.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Después de que la institución haya validado tu examen psicométrico recibirás un correo con lo siguiente:</h4>
										<h4 class="text-secondary"><strong>- Link para ingresar a tu perﬁl donde encontrarás tu matrícula y el acceso a la página del CENEVAL.</strong></h4>
										<h4 class="text-secondary"><strong>- Una vez ahí, deberás seguir las instrucciones para generar tu pase de ingreso.</strong></h4>
										<h4 class="text-secondary">Deberás descargar tu pase de ingreso y subirlo a tu <strong>perﬁl del CERT.</strong></h4>
									</div>
								</div>
																
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">5.- Prueba de equipo.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Fecha: <strong>martes 31 de mayo o jueves 2 de junio del 2022.</strong></h4>
										<h4 class="text-secondary">Para conocer cómo realizar la prueba de equipo para la preparación del EXANI-II te pedimos consultar la siguiente página https://www.ceneval.edu.mx/examen-desde-casa</h4>
										<h4 class="text-secondary">Este examen de prueba, te ayudará a detectar cualquier fallo en tu equipo de cómputo previo al EXANI-II, por lo que será de <strong>carácter obligatorio.</strong></h4>
										<h4 class="text-secondary">Se comunicará un asesor técnico contigo para monitorear cualquier duda o situación que tengas, además de enviarte un manual para apoyarte con el proceso. <strong>El equipo de cómputo que utilices en la prueba, deberá ser el mismo para el día del examen CENEVAL.</strong></h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">6.- Aplicación del EXANI-II (modalidad en casa).</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h2 class="text-secondary">Fecha: <strong>Sábado 4 de junio de 2022.</strong></h2>
										<h4 class="text-secondary">El CENEVAL, te hará llegar el link con tu usuario, folio y contraseña para acceder al examen en línea.</h4>
										<h4 class="text-secondary">Ten a la mano tu identiﬁcación (INE, Pasaporte o constancia de estudios con fotografía) y pase de ingreso.</h4>
										<h4 class="text-secondary">Esta fase incluye tres áreas:</h4>
										<h4 class="text-secondary"><strong>1.- Habilidades y conocimientos predictivos del desempeño escolar: </strong> Comprensión lectora, redacción indirecta y pensamiento matemático.</h4>
										<h4 class="text-secondary"><strong>2.- Módulos de conocimientos específicos: </strong>Ciencias de la salud y Premedicina.</h4>
										<h4 class="text-secondary"><strong>3.- Información diagnóstica: </strong>Inglés como lengua extranjera.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">7.- Entrega de resultados del proceso de admisión.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Los resultados estarán disponibles el <strong>Miércoles 22 de junio de 2022</strong> en tu <strong>perﬁl de aspirante.</strong></h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">8.- Inscripción.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">En caso de ser admitido, acude a alguno de nuestros campus <strong>TICUL</strong> o <strong>MÉRIDA</strong>, al departamento de admisiones para que un asesor genere tu ﬁcha de pago, correo electrónico institucional y foto para tu credencial.</h4>
										<?php 
										if ($_GET['campus']=='ticul')
										{
											echo '<h4 class="text-secondary">Deberás entregar la siguiente documentación:</h4>
												<h4 class="text-secondary">- Acta de nacimiento en original y una copia legible.</h4>
												<h4 class="text-secondary">- Clave Única de Registro de Población (CURP) en original y copia legible.</h4>
												<h4 class="text-secondary">- Certificado de Estudios de Bachillerato o Constancia debidamente validada que emita la institución de educación media superior, con fotografía cancelada con sello de la institución del ciclo escolar 2021-2022, en original y una copia legible.</h4>
												<h4 class="text-secondary">- Cuatro fotografías recientes de frente, en papel mate, tamaño infantil, blanco y negro (no instantáneas).</h4>';
											echo '<h4 class="text-secondary">Realiza el pago de inscripción y credencial.</h4>';
										}
										else
										{
											echo '<h4 class="text-secondary">Entrega tu certiﬁcado de preparatoria o constancia de estudios con fotografía en formato PDF y realiza el pago de inscripción y credencial.</h4>';
										}
										?>
										<h4 class="text-secondary">El proceso de inscripción será del <strong>lunes 27 de junio hasta el sábado 12 de julio de 2022.</strong></h4>
									</div>
								</div>
							</div>	
								
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">9.- Cursos propedéuticos e inicio de clases.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">En tu correo institucional recibirás la información y fechas correspondientes a los cursos propedéuticos e inicio de clases.</h4>
									</div>
								</div>
							</div>	
								
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary text-center h2">¿Deseas más información?</h2>
								<h4 class="text-primary text-center">Permítenos ayudarte. Elige la opción que prefieras.</h4>
							</div>
						</div>
							
						<div class="row justify-content-center my-4">
							<div class="col-12 col-lg-3">
								<a href="agendar" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fas fa-calendar-alt"></i></div>
									<h4 class="text-primary text-center my-2">Asesoría online</h4>
								</a>
							</div>
							<div class="col-12 col-lg-3">
								<a href="https://wa.me/message/3RJ3VK4O3E35B1" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fab fa-whatsapp"></i></div>
									<h4 class="text-primary text-center my-2">Whatsapp</h4>
								</a>
							</div>
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">Descargar la <br>Convocatoria oficial.</h4>
								<a href="ver.php?token=convocatorias&recurso=Convocatoria_medico_cirujano_2022.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div>
							<div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">Descargar la guía de <br>estudio EXANI-II.</h4>
								<a href="ver.php?token=docs&recurso=GUIA_EXANI_II.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div>
							<div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">Descargar información <br>del EXANI-II.</h4>
								<a href="ver.php?token=docs&recurso=EXANI_II.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div>
						</div>
						
						<div class="row justify-content-center mt-4">
							<div class="col-12 col-lg-6">
								<a href="admisiones/perfil" target="_blank" class="text-uppercase btn btn-lg btn-block btn-secondary py-lg-3 py-2 mb-3"><i class="fas fa-user"></i> INGRESAR A MI PERFIL DE ASPIRANTE</a>
							</div>
						</div>
						
										
					</div--><!--TAB-->
					
					
					<div class="tab-pane fade" id="tab3">
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary h1">Proceso de<br> admisión 2022</h2>
							</div>
						
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">1.- Regístrate en línea.</h2>
									</div>
								</div>
								
								<div class="row justify-content-start">
									<div class="col-12">
										<h4 class="text-primary">Deberás ingresar al siguiente enlace, dejar tus datos y subir los siguientes documentos:</h4>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary"><strong>- CURP.</strong></h4>
										<h4 class="text-secondary"><strong>- Identiﬁcación oﬁcial con fotografía.</strong></h4>
										<h4 class="text-secondary"><strong>- Certificado de bachillerato o constancia de estudios.</strong></h4>
									</div>
								</div>
									
								<div class="row justify-content-center mt-4">
									<div class="col-12 col-lg-6">
										<a href="admisiones/registro?oferta=educacion" target="_blank" class="text-uppercase btn btn-lg btn-block btn-primary py-lg-3 py-2 mb-3"><i class="fas fa-pencil"></i> Registro en línea</a>
									</div>
								</div>
								
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">2.- Registro en la plataforma del CENEVAL (Del 8 de marzo al 13 de mayo).</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Nuestro equipo de admisiones validará que la documentación sea correcta y se te notificará por medio de un correo electrónico. </h4>
										<h4 class="text-secondary">Deberás ingresar a tu perfil de aspirante del <strong>CERT</strong> donde encontrarás la matrícula, usuario, contraseña y el enlace para el portal del <strong>CENEVAL</strong>. Ahí deberás llenar correctamente la información solicitada, contestar el cuestionario de Contexto e imprimir tu <strong>PASE DE INGRESO</strong>.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">3.- Pago del examen EXANI-II.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Realiza el pago de tu examen <strong>EXANI-II</strong> y sube en tu perfil de aspirante del <strong>CERT</strong> el <strong>PASE DE INGRESO</strong> y el recibo de pago del examen. </h4>
									</div>
								</div>
																
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">4.- Examen psicométrico en línea.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Una vez validado tu <strong>PASE DE INGRESO</strong> y el recibo de pago del examen, recibirás un correo electrónico con el enlace para presentar tu examen psicométrico en línea. Tienes máximo 2 días naturales para presentarlo.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">5.- Aplicación del EXANI-II del CENEVAL.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">El día 10 de junio de 2022 a las 8 am, deberás acudir al plantel que seleccionaste para presentar el examen EXANI-II.</h4>
										<h4 class="text-secondary">Debes acudir con:</h4>
										<h4 class="text-secondary">- <strong>PASE DE INGRESO</strong> impreso.</h4>
										<h4 class="text-secondary">-Original del comprobante de pago del examen.</h4>
										<h4 class="text-secondary">Original de tu identificación oficial con fotografía (INE, Cartilla de Servicio Militar Nacional, Pasaporte o Credencial de la escuela de procedencia).</h4>
										<h4 class="text-secondary">Lápiz del número 2 o 2 1/2, borrador blanco y sacapuntas. </h4> 
										<h4 class="text-secondary">Calculadora simple (no programable). No está permitido el uso de otro dispositivo electrónico, incluidos teléfonos celulares, tabletas y computadoras portátiles.</h4>
										<h4 class="text-secondary">Cubrebocas y gel antibacterial.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">6.- Publicación de resultados del EXANI-II.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">El día 4 de julio de 2022 a partir de las 10 am deberás ingresar a tu perfil de aspirante del CERT donde encontrarás el enlace para conocer los resultados del EXANI-II.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">7.- Inscripción (Del 5 al 8 de julio).</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">En caso de ser admitido acude a las instalaciones del <strong>CERT</strong> al departamento de admisiones para que un asesor genere tu ficha de pago, correo electrónico institucional y foto para tu credencial. </h4>
										<h4 class="text-secondary">Deberás entregar la siguiente documentación:</h4>
										<h4 class="text-secondary">- Acta de nacimiento en original y una copia legible.</h4>
										<h4 class="text-secondary">- Clave Única de Registro de Población (CURP) en original y copia legible.</h4>
										<h4 class="text-secondary">- Certificado de Estudios de Bachillerato o Constancia debidamente validada que emita la institución de educación media superior, con fotografía cancelada con sello de la institución del ciclo escolar 2021-2022, en original y una copia legible.</h4>
										<h4 class="text-secondary">- Cuatro fotografías recientes de frente, en papel mate, tamaño infantil, blanco y negro (no instantáneas).</h4>
										<h4 class="text-secondary">- Resultados del examen EXANI-II del CENEVAL impresos. </h4>
										<h4 class="text-secondary">Realiza el pago de tu inscripción y credencial y entrega el comprobante al asesor. </h4>
									</div>
								</div>
							</div>	
								
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">9.- Cursos propedéuticos e inicio de clases.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">En tu correo institucional recibirás la información con las fechas correspondientes a los cursos propedéuticos e inicio de clases.</h4>
									</div>
								</div>
							</div>	
								
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary text-center h2">¿Deseas más información?</h2>
								<h4 class="text-primary text-center">Permítenos ayudarte. Elige la opción que prefieras.</h4>
							</div>
						</div>
							
						<div class="row justify-content-center my-4">
							<div class="col-12 col-lg-3">
								<a href="agendar" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fas fa-calendar-alt"></i></div>
									<h4 class="text-primary text-center my-2">Asesoría online</h4>
								</a>
							</div>
							<div class="col-12 col-lg-3">
								<a href="https://wa.me/message/3RJ3VK4O3E35B1" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fab fa-whatsapp"></i></div>
									<h4 class="text-primary text-center my-2">Whatsapp</h4>
								</a>
							</div>
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">Descargar la <br>Convocatoria oficial.</h4>
								<a href="ver.php?token=convocatorias&recurso=Concocatoria_primaria_preescolar_2022.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div>
							<!--div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">Descargar la guía de <br>estudio EXANI-II.</h4>
								<a href="ver.php?token=docs&recurso=GUIA_EXANI_II.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div>
							<div class="col-12 col-lg-4">
								<h4 class="text-primary text-center">Descargar información <br>del EXANI-II.</h4>
								<a href="ver.php?token=docs&recurso=EXANI_II.pdf" target="_blank">
									<div class="rectangle-rounded-small bg-primary text-white mx-auto"><i class="fas fa-file-pdf"></i></div>
								</a>
							</div-->
						</div>
						
						<div class="row justify-content-center mt-4">
							<div class="col-12 col-lg-6">
								<a href="admisiones/perfil" target="_blank" class="text-uppercase btn btn-lg btn-block btn-secondary py-lg-3 py-2 mb-3"><i class="fas fa-user"></i> INGRESAR A MI PERFIL DE ASPIRANTE</a>
							</div>
						</div>
						
										
					</div><!--TAB-->

					<div class="tab-pane fade show" id="tab4">
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary h1">Proceso de<br> admisión 2022</h2>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">1.- Prepara la siguiente documentación.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary"><strong>- CURP.</strong></h4>
										<h4 class="text-secondary"><strong>- Certificado de Licenciatura</h4>
										<h4 class="text-secondary"><strong>- Cédula Profesional</h4>
										<h4 class="text-secondary"><strong>- Título de Licenciatura</h4>
									</div>
								</div>
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary">Nota: Para el doctorado en Educación los documentos requeridos son de maestría.</h4>
										<h4 class="text-secondary">(Los documentos se adjuntan en archivos individuales en formato PDF)</h4>
										<h4 class="text-secondary">*Recuerda poner ambos lados del documento en el mismo archivo.</h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">2.- Elige cómo te gustaría realizar el proceso de admisión.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 col-lg-6">
										<a href="admisiones/registro?oferta=posgrados" target="_blank" class="text-uppercase btn btn-lg btn-block btn-primary py-lg-3 py-2 mb-3"><i class="fas fa-pencil"></i> Inscripción en línea</a>
									</div>
									<div class="col-12 col-lg-6">
										<?php
										if ($_GET['campus']=='ticul')
										{
											$mapa = 'https://goo.gl/maps/D45UPZYGACNsqHH86';
										}
										else
										{
											$mapa = 'https://goo.gl/maps/nW1HvhJVGTQdSb6cA';
										}
										?>
										<a href="<?php echo $mapa;?>" target="_blank" class="text-uppercase btn btn-lg btn-block btn-primary py-lg-3 py-2 mb-3"><i class="fas fa-user-tie"></i> Inscripción presencial</a>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">3.- Validación de documentos.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary"><strong>Nuestro equipo de admisiones validará que la documentación enviada sea correcta y se te notificará vía telefónica.</strong></h4>
									</div>
								</div>
							</div>
							
							<div class="col-12 my-4">
								<div class="row justify-content-start">
									<div class="col-12">
										<h2 class="text-primary">4.- Inscripción.</h2>
									</div>
								</div>
								
								<div class="row justify-content-center mt-4">
									<div class="col-12 pl-2 pl-lg-5">
										<h4 class="text-secondary"><strong>-Una vez validada tu documentación acude a la institución al departamento de admisiones para que un asesor genere tu ficha de pago y correo electrónico institucional.</strong></h4>
										<h4 class="text-secondary">Nota: Las especialidades en enfermería requieren una credencial escolar con costo adicional, ésta se entrega el mismo día.</h4>
										<h4 class="text-secondary"><strong>- Realiza el pago en el departamento de cajas.</strong></h4>
									</div>
								</div>
							</div>							
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12">
								<h2 class="text-primary text-center h2">¿Deseas más información?</h2>
								<h4 class="text-primary text-center">Permítenos ayudarte. Elige la opción que prefieras.</h4>
							</div>
						</div>
							
						<div class="row justify-content-center my-4">
							<div class="col-12 col-lg-3">
								<a href="http://cert.edu.mx/agendar" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fas fa-calendar-alt"></i></div>
									<h4 class="text-primary text-center my-2">Asesoría online</h4>
								</a>
							</div>
							<div class="col-12 col-lg-3">
								<a href="https://wa.me/message/3RJ3VK4O3E35B1" target="_blank">
									<div class="circle bg-primary text-white mx-auto"><i class="fab fa-whatsapp"></i></div>
									<h4 class="text-primary text-center my-2">Whatsapp</h4>
								</a>
							</div>
						</div>
						
						<div class="row justify-content-center mt-4">
							<div class="col-12 col-lg-6">
								<a href="admisiones/registro?oferta=posgrados" target="_blank" class="text-uppercase btn btn-lg btn-block btn-secondary py-lg-3 py-2 mb-3"><i class="fas fa-pencil"></i> INSCRIBIRME</a>
							</div>
							<div class="col-12 col-lg-6">
								<a href="admisiones/perfil" target="_blank" class="text-uppercase btn btn-lg btn-block btn-secondary py-lg-3 py-2 mb-3"><i class="fas fa-user"></i> INGRESAR A MI PERFIL DE ASPIRANTE</a>
							</div>
						</div>
																		
					</div><!-- TAB -->


				</div><!--TAB CONTENT-->
			</div>
				<div class="col-12">
				<div class="row justify-content-center mt-lg-5 py-5 px-3 bg-orange">
					<div class="row justify-content-center mb-5">
						<div class="col-10">
							<h4 class="text-center text-white h3">Ahora que estás a punto de decidir tu <strong>futuro</strong>, te invitamos a nuestro</h4>
						</div>
					</div>

					<div class="row justify-content-center my-0 my-lg-2">
						<div class="col-12 text-center">
							<img src="assets/images/logo_orientacion.png" class="img-fluid">
						</div>
					</div>

					<div class="row justify-content-center mt-3">	
						<div class="col-4 col-lg-4 text-left d-lg-block d-none">
							<img src="assets/images/orientacion.png" class="img-fluid">
						</div>
						<div class="col-12 col-lg-8 text-justify my-auto">
							<h4 class="text-primary">En el CERT nos preocupamos por tu futuro, es por ello que diseñamos un programa enfocado en el desarrollo de tus capacidades para enfrentar la vida universitaria con éxito, brindando herramientas necesarias que permitan tu desarrollo profesional.</h4>
						</div>

					</div>
				</div>

				<div class="row justify-content-center mt-5 py-5">
					<div class="col-12 col-lg-4 text-right">
						<img src="assets/images/logo_orientando.png" class="img-fluid">
					</div>

					<div class="col-12 col-lg-4 my-auto">
						<h4 class="text-primary text-lg-left text-center h1">Nuestros <br>Programas</h4>
					</div>
				</div>

				<div class="row justify-content-center mb-5">
					<div class="col-6 col-lg-3 text-center mb-3">
						<img src="assets/images/icon1.png" class="img-fluid">
					</div>
					<div class="col-6 col-lg-3 text-center mb-3">
						<img src="assets/images/icon2.png" class="img-fluid">
					</div>
					<div class="col-6 col-lg-3 text-center mb-3">
						<img src="assets/images/icon3.png" class="img-fluid">
					</div>
					<div class="col-6 col-lg-3 text-center mb-3">
						<img src="assets/images/icon4.png" class="img-fluid">
					</div>

				</div>
			</div>
		</div>
			

	</section>
	
	
	<?php include('assets/includes/footer.php');?>
	<!-- Scripts -->
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>