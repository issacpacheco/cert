<?php
session_start();
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
	<link rel="stylesheet" href="css/bootstrap.css?v=1.0" id="theme-stylesheet">

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
	<link rel="stylesheet" href="css/custom.css?v=1.0">

	<title>Centro Educativo Rodríguez Tamayo</title>
	<style>
		.bg-default{
			background: url(images/bg3.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		.mensaje-error{
			color:#FF0004;
		}
		input[type=text]{
			text-transform: uppercase;
		}
	</style>
</head>

<body class="bg-default">
	
	<section>
		<div class="container my-3">
			<div class="row justify-content-center">
				<div class="col-lg-5 bg-white py-2">
					<div class="block">
						<div class="block-body">
							<p class="lead">¿Estás listo?</p>
							<p>Por favor identifícate para comenzar con el examen.</p>
							<hr>
							<form method="post" class="LoginForm" id="LoginForm">
								<div class="form-group">
									<label class="form-label">Correo</label>
									<input class="form-control" placeholder="Coreo" type="email" name="correo">
								</div>
								<div class="form-group">
									<label class="form-label">Contraseña</label>
									<input class="form-control" placeholder="Contraseña" type="password" name="pass">
								</div>
								<div class="form-group text-center">
									<button class="btn btn-warning" type="submit"><i class="fas fa-sign-in-alt mr-2"></i> Iniciar</button>
									<a href="http://3.15.207.243/admisiones/perfil" class="btn btn-info"><i class="fas fa-arrow-left mr-2"></i> Regresar</a>
								</div>
							</form>
						</div>
					</div>
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

	<script src="js/main.js?v=1.0" type="text/javascript"></script>
		
	<script>
		$('.LoginForm').validate({
			errorElement: 'span', //default input error message container
			errorClass: 'mensaje-error', // default input error message class
			focusInvalid: false, // do not focus the last invalid input
			onfocusout: function(element) {
					this.element(element);
			},//Validate on blur
			onkeyup: function(element) {
					this.element(element);
			}, //Validate on keyup
			focusCleanup:true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
			ignore: "",
			rules: {
				correo: {
					required: true,
					email: true
				},
				pass: {
					required: true,
				},
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
				error.insertAfter( element.closest( '.form-control' ) );
			},
			
			submitHandler: function (form) {
				Login();
			}
		});
			
		$('.LoginForm input').keypress(function (e) {
			if (e.which == 13) {
				if ($('.LoginForm').validate().form()) 
				{
					Login();
				}
				return false;
			}
		});	
			
		function Login()
		{
			console.log("Login");
			$('#boton_login').empty();
			$('#boton_login').prop('disabled',true);
			$('#boton_login').append('<i class="fas fa-spinner fa-spin"></i> Enviando...');
			// Enviamos el formulario usando AJAX
			$.ajax({
				type: 'POST',
				url: "ajax/login",
				cache:false,
				data: $('#LoginForm').serialize(),
				// Mostramos un mensaje con la respuesta de PHP
				success: function(data) 
				{
					console.log(data);
					switch (data)
					{
						case "1":
						{
							//Error
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Correo o contraseña incorrectos',
							})
							break;
						}
						case "2":
						{
							//Error
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Todavía no es tu fecha de examen.',
							})
							break;
						}
						case "3":
						{
							//Error
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Ya finalizaste tu examen, si lo finalizaste por error cominícate con tu coordinador.',
							})
							break;
						}
						case "4":
						{
							//Redireccionar a index
							window.location.replace("instrucciones");
							break;
						}
						default:
						{
							//Error
							Swal.fire({
							  icon: 'error',
							  title: 'Oops...',
							  text: 'Ocurrío un error en el sistema, por favor intente de nuevo.',
							})
							break;
						}
					}
					$('#boton_login').empty();
					$('#boton_login').append('<i class="fas fa-sign-in-alt"></i> Entrar');
					$('#boton_login').prop('disabled',false);
				}
			})        
			return false;
		}		
			
    	</script>
</body>

</html>