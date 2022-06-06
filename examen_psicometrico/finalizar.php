<?php
include('../includes/conexion.php');
include('includes/config.php');
mysqli_query($conexion,"UPDATE aspirantes_validacion SET fecha_examen_p = '".$hoy."', presentado_p = '1' WHERE id_aspirante = '".$_SESSION['id']."'");
if (!isset($_SESSION['id']))
{
	header("location:./");
}

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Centro Educativo Rodríguez Tamayo</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="icon" type="image/png" href="assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo  -->
	<link href="assets/css/demo.css" rel="stylesheet" />
	
	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('images/bg/slideshow-2.jpg')">

		<div class="container" style="padding: 10px 0 0">
			<div class="row">
				<div class="col-md-2" align="center">
					<img src="assets/img/logo_blanco.png" width="80">
				</div>
				<div class="col-md-8">
					<h3 class="text-center" style="color: #fff"><strong>EXAMEN PSICOMÉTRICO</strong></h3>
				</div>
			</div>
		</div>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="imprimir" method="post" target="_blank">
		                    	<div class="wizard-header" style="padding: 25px 30px">
		                        	<h3 class="wizard-title"><?php echo $_SESSION['nombre'];?> la encuesta ha concluido</h3>
									<h5>Gracias por tus respuestas, no olvides <strong>imprimir tu constancia</strong> antes de finalizar.</h5>
		                    	</div>
		                        <div class="row">
		                            <div class="col-sm-10 col-sm-offset-1">
										<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
										<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-print"></i> Imprimir</button>
									</div>
		                        </div>
								<div class="wizard-header">
		                        	<h5><strong>Recuerda agendar tu examen de diagnóstico en tu perfil de aspirante.</strong></h5>
		                    	</div>
								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<a href="http://3.15.207.243/admisiones/login" class="btn btn-info btn-block"><i class="fa fa-sign-out-alt"></i> Finalizar e ir a mi perfil</a>
									</div>
								</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
			
		</div> <!--  big container -->
	</div>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
</html>
