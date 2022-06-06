<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] == '')
{
	header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="LCC Christhian Sosa">
	<title>Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/img/favicon.png" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link type="text/css" href="assets/css/login.css?v=1.0.<?php echo rand();?>" rel="stylesheet">
	<style>
		.bg-default {
			background: url(assets/img/bg/04.jpg) no-repeat center center fixed;
			background-size: cover;
		}
	</style>
</head>

<body class="bg-default">
	<div class="main-content">
		
		
		<div class="container mt-5 pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-5">
							<h2 class="text-center text-black"><strong>EXAMEN PSICOMÉTRICO</strong></h2>
						<h3 class="text-center">INSTRUCCIONES</h3>
							<div class="text-center mb-4" style="font-size: 24px; color: #000">
								Hola <?php echo $_SESSION['nombre'];?>, antes de comenzar lee las siguientes instrucciones.
							</div>
							<p style="font-size: 20px; color: #000; text-align: justify">
								El propósito de esta prueba, es establecer los índices de bienestar del estudiante y la probabilidad de éxito en una carrera universitaria.<br>
								Las preguntas son todas de selección única, no requiere de reflexión y te pedimos no dudes en contestarlas. <br>
								Tienes un máximo de 15 segundos para contestar cada pregunta: <strong>No te distraigas</strong>.<br>
								Al finalizar podrás imprimir tu constancia de aplicación.
							</p>
							<div class="form-check">
								<input type="checkbox" class="form-check-input" id="check">
								<label class="form-check-label">De acuerdo</label>
							</div>
							<form action="encuesta" method="post">
								<div class="text-center">
									<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
									<button type="submit" id="boton_aceptar" class="btn btn-success btn-block btn-lg my-4" disabled><i class="fas fa-thumbs-up"></i> Comenzar</button>
								</div>
							</form>
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
	<script>
	$('#check').change(function() {
		if($(this).is(":checked")) {
			$('#boton_aceptar').attr('disabled',false);
		}
		else{
			$('#boton_aceptar').attr('disabled',true);
		}
	});
	</script>
</body>

</html>