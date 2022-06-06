<?php
include('../includes/conexion.php');
include('includes/config.php');
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] == '')
{
	header("location:./");
}
mysqli_query($conexion3,"UPDATE examen SET final = '".$hora."', finalizado = '1' WHERE id_aspirante = '".$_SESSION['id']."'");

mysqli_query($conexion,"UPDATE aspirantes_validacion SET presentado_d = '1' WHERE id_aspirante = '".$_SESSION['id']."'");

$nombre = $_SESSION['nombre'];
$id = $_SESSION['id'];
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Fabricando Marcas"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="all,follow">

	<!-- theme stylesheet-->
	<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo rand();?>" id="theme-stylesheet">

	<!-- Price Slider Stylesheets -->
	<link rel="stylesheet" href="js/nouislider/nouislider.css">

	<!-- Google fonts - Playfair Display-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">
	<link rel="stylesheet" href="css/fonts.css">

	<!-- owl carousel-->
	<link rel="stylesheet" href="js/owl.carousel/assets/owl.carousel.css">

	<!-- Ekko Lightbox-->
	<link rel="stylesheet" href="js/ekko-lightbox/ekko-lightbox.css">

	<!-- Favicon-->
	<link rel="shortcut icon" href="images/favicon.png">

	<!-- FontAwesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">

	<!--Swwetalert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">

	<!--Custom-->
	<link rel="stylesheet" href="css/custom.css?v=<?php echo rand();?>">

	<title>Centro Educativo Rodríguez Tamayo</title>
	<style>
		.bg-default{
			background: url(images/bg3.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
	</style>
</head>

<body class="bg-default">
	
	<section>
    	<div class="container" style="margin-top: 150px">
        	<div class="row">
          		<div class="col-xl-8 mx-auto text-center mb-5 bg-white">
            		<div class="text-center mb-4" style="font-size: 24px; color: #000">
						<strong><?php echo $nombre;?></strong>
					</div>
					<p class="text-center" style="font-size: 20px; color: #000; text-align: justify">
						El examen ha concliudo. <br>Gracias por tus respuestas, no olvides <strong>imprimir tu constancia</strong> antes de finalizar.
					</p>
					
					<form action="imprimir" method="post" target="_blank">
						<div class="row my-4">
							<div class="col-sm-12">
								<input type="hidden" name="id" value="<?php echo $id;?>">
								<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fas fa-print"></i> Imprimir Constancia</button>
							</div>
						</div>
						<div class="row my-4">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<a href="http://3.15.207.243/admisiones/perfil" class="btn btn-info btn-block"><i class="fas fa-sign-out-alt"></i> Finalizar</a>
							</div>
						</div>
					</form>  	
          		</div>
        	</div>
      	</div>
    </section>
  
	<!-- JavaScript files-->
	<script src="js/icons.js"></script>

	<!-- jQuery-->
	<script src="js/jquery.min.js"></script>

	<!-- Bootstrap JavaScript Bundle (Popper.js included)-->
	<script src="js/bootstrap.bundle.min.js"></script>

	<!-- Owl Carousel-->
	<script src="js/owl.carousel/owl.carousel.js"></script>
	<script src="js/owl.carousel/owl.carousel2.thumbs.min.js"></script>

	<!-- NoUI Slider (price slider)-->
	<script src="js/nouislider/nouislider.min.js"></script>

	<!-- Smooth scrolling-->
	<script src="js/smooth-scroll.polyfills.min.js"></script>

	<!-- Lightbox -->
	<script src="js/ekko-lightbox/ekko-lightbox.min.js"></script>
	<!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
	<script src="js/object-fit-images/ofi.min.js"></script>

	<!-- SwwetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!--Validación-->
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/localization/messages_es.min.js" type="text/javascript"></script>

	<script src="js/main.js?v=<?php echo rand();?>" type="text/javascript"></script>
</body>

</html>