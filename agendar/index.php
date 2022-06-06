<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="LCC Christhian Sosa">
	<title>Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/img/favicon.png?v=1" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<link type="text/css" href="assets/css/login.css?v=1.0.<?php echo rand();?>" rel="stylesheet">
	<!--Calendly -->
	<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.btn-default {
			color: #fff;
			border:solid 4px #42BCE2;
			background-color: #42BCE2;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
			width: 150px;
		}
		.btn-default:hover{
			color: #fff;
			border:solid 4px #42BCE2;
			background-color: transparent;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.btn-default:not(:disabled):not(.disabled):active{
			color: #fff;
			border:solid 4px #42BCE2;
			background-color: transparent;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.btn{
			border-radius: 25px;
			padding: 5px;
		}
		.rounded-circle{
			padding: 5px;
			border: 1px solid #fff;
			max-height: 100px;
			max-width: 100px;
			margin-bottom: 8px;
		}
		
		.asesores{
			border: 2px solid #42BCE2; 
			padding: 15px; 
			border-top-left-radius: 40px; 
			border-bottom-right-radius: 40px;
		}
		
		h3
		{
			margin-bottom: 0px !important;
		}
		
		.bg-default{
			background: url(assets/img/bg4.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		
		@media screen and (max-width: 500px){
			.asesores{
				margin: 5px
			}
		}
		
	</style>
</head>

<body class="bg-default">
	<div class="main-content">
		<!-- Header -->
		<div class="header" style="padding-top: 20px;">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row">
						<div class="col-lg-3">
							<div class="row">
								<div class="col-lg-12" style="padding-left: 50px">
									<img src="assets/img/logo_blanco.png" width="100">
								</div>
							</div>
							<div class="row" style="margin-top: 50px;">
								<div class="col-lg-12">
									<h1 class="text-white" style="font-size: 26px">AGENDA UNA CITA</h1>
								</div>
							</div>
							<div class="row" style="margin-top: 20px;">
								<div class="col-lg-12">
									<p class="text-white" style="font-size: 14px">Comunícate con nuestros asesores de admisión. Están listos para atenderte.</p>
								</div>
							</div>
							<div class="row" style="margin-top: 20px;">
								<div class="col-lg-12">
									<h1 class="text-white" style="font-size: 18px">Bienvenidos a atención en línea.</h1>
								</div>
							</div>
							<div class="row" style="margin-top: 20px;">
								<div class="col-lg-12">
									<p class="text-white" style="font-size: 14px">Como asesores, nuestra misión es apoyarte en el proceso de admisión a las licenciaturas, resolver tus dudas y darte a concer detalles de nuestros programas académicos.</p>
									<p class="text-white" style="font-size: 14px; margin-bottom: 0px">Si tienes dudas escríbenos a:</p>
									<h1 class="text-white" style="font-size: 18px">contacto@cert.edu.mx</h1>
								</div>
							</div>
							<div class="row" style="margin-top: 20px;">
								<a href="./" class="btn btn-default btn-block"><i class="fas fa-chevron-circle-left"></i> Regresar</a>
							</div>
						</div>
						<div class="col-lg-9">
							<div class="row">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-12">
											<h1 style="color: #42BCE2; font-size: 30px;">Campus Mérida</h1>
										</div>
									</div>
									<div class="row asesores" align="center">
										
										<?php
										$asesor[] = '<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/ivan_novelo.jpg" class="rounded-circle">
											<h3 class="text-white text-center">David Novelo</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: \'https://calendly.com/cert-david-novelo\'});return false;">AGENDA</a>
										</div>';
										
										$asesor[] = '<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/arturo_solis.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Arturo Solís</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: \'https://calendly.com/arturosolis\'});return false;">AGENDA</a>
										</div>';
										
										$asesor[] = '<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/sebastian.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Sebastián Canul</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: \'https://calendly.com/cert-sebastiancanul\'});return false;">AGENDA</a>
										</div>';
										
										shuffle($asesor);
										
										for ($c = 0; $c<3; $c++)
										{
											echo $asesor[$c];
										}
										?>
										
										
										<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/alondra.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Alondra Domínguez</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/cert-alondra-dominguez'});return false;">AGENDA</a>
											<p class="text-white text-center"><small>Médico Cirujano</small></p>
										</div>
									</div>
								</div>
							</div>
							
							
							
							<div class="row" style="margin-top: 20px">
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-12">
											<h1 style="color: #42BCE2; font-size: 30px;">Campus Ticul</h1>
										</div>
									</div>
									<div class="row asesores" align="center">
										<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/mishel_may.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Mishel May</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/mjr-rv88'});return false;">AGENDA</a>
											<p class="text-white text-center"><small>(Primaria, secundaria, bachillerato)</small></p>
										</div>
										<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/mercy_pacheco.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Mercy Pacheco</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/mercy-martinez'});return false;">AGENDA</a>
										</div>
										<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/jairo_castillo.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Jairo Ek Castillo</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/jairo-ek'});return false;">AGENDA</a>
											<p class="text-white text-center"><small>(Primaria, secundaria, bachillerato)</small></p>
										</div>
										<div class="col-lg-3" style="margin-bottom: 20px">
											<img src="assets/img/asesores/claudia_saldana.jpg" class="rounded-circle">
											<h3 class="text-white text-center">Claudia Saldaña</h3>
											<p class="text-white text-center">Asesor de admisión</p>
											<a href="#" class="btn btn-default btn-block" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/cert-claudia-juarez'});return false;">AGENDA</a>
											<p class="text-white text-center"><small>Médico Cirujano</small></p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>	
	<!-- Scripts -->
	<!-- Core -->
	<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script> 
	<!--Calendly -->
	<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
</body>

</html>