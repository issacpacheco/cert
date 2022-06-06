<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] == '')
{
	header("location:./");
}
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
    	<div class="container" style="margin-top: 50px">
        	<div class="row">
          		<div class="col-xl-10 mx-auto text-center mb-5 bg-white py-4">
            		<div class="text-center mb-4" style="font-size: 24px; color: #000">
						Hola <strong><?php echo $_SESSION['nombre'];?></strong>, antes de comenzar lee las siguientes instrucciones.
					</div>
					<p>• Lee detenidamente las instrucciones y los reactivos.</p>
					<p>• Evita distracciones durante la prueba.</p>
					<p>• Distribuye tu tiempo empleando el cronómetro que te proporciona el
						panel y deja al final, las preguntas más complejas.</p>
					<p>• Verifica que coincida el reactivo seleccionado, con tu respuesta.</p>
					<p>• Puedes emplear una hoja para tus operaciones y apoyarte de una calculadora básica.</p>
					<p>• Asegúrate de responder todos los reactivos por área de conocimiento.</p>
					<p>• Evita tener ventanas abiertas durante el examen, ya que tendrás menos
						de dos minutos por respuesta.</p>
					<p>• Acude al baño sólo si es estrictamente necesario.</p>
					<p>• Recuerda utilizar el botón "Finalizar" para cerrar sesión y dar por terminado tu examen. Evita presionarlo antes de concluir.</p>
					<p>• Recuerda que tienes <strong>4 horas y media</strong> para presentar el examen.</p>
					<h2>¡Éxito!</h2>
					<h3>Recuerda que todo esfuerzo, tiene una recompensa.</h3>
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="check">
						<label class="form-check-label">De acuerdo</label>
					</div>
					<form action="examen" method="post">
						<div class="text-center">
							<input type="hidden" name="id" value="<?php echo $_SESSION['id'];?>">
							<button type="submit" id="boton_aceptar" class="btn btn-success btn-block btn-lg my-4" disabled><i class="fas fa-thumbs-up"></i> Comenzar</button>
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