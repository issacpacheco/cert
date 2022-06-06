<?php
session_start();
session_destroy();
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
		h1{
			font-size: 50px
				
		}
	</style>
</head>

<body class="bg-default">
	<div class="main-content">
		<!-- Header -->
		<div class="header mt-5" style="padding-bottom: 150px">
			<div class="container">
				<div class="header-body text-center">
					<div class="row justify-content-center">
						<div class="col-lg-5 col-md-6">
							<h1 class="text-white font-weight-bold">Bienvenido</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			<div class="row justify-content-center">
				<div class="col-lg-5 col-md-7">
					<div class="card bg-secondary shadow border-0">
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-center text-muted mb-4">
								<p class="font-weight-bold">Por favor identifícate para comenzar con el examen.</p>
							</div>
							<form method="post" class="LoginForm" id="LoginForm">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-email-83"></i></span>
										</div>
										<input class="form-control" placeholder="Correo" type="email" name="correo">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" placeholder="Contraseña" type="password" name="pass">
									</div>
								</div>
								<div class="text-center">
									<button type="submit" class="btn btn-success my-4" id="boton_login"><i class="fas fa-sign-in-alt"></i> Entrar</button>
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
	<!--Validación-->
    <script src="assets/js/jquery.validate.min.js" type="text/javascript" ></script>
   	<script src="assets/js/localization/messages_es.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
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
					email: true,
					required: true,
				},				
				pass:{
					required: true
				}
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
				error.insertAfter( element.closest( '.input-group' ) );
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
							  	type: 'error',
							  	title: 'Oops...',
							  	text: 'No tenemos registrado el correo.',
							})
							break;
						}
						case "2":
						{
							//Error
							Swal.fire({
								type: 'error',
							  	title: 'Oops...',
							  	text: 'La contraseña es incorrecta.',
							})
							break;
						}
						case "3":
						{
							//Error
							Swal.fire({
							  	type: 'error',
							  	title: 'Oops...',
							  	text: 'Ya tenemos registrado tu examen.',
							})
							break;
						}
						case "5":
						{
							window.location.replace("instrucciones");
							break;
						}
						default:
						{
							//Error
							Swal.fire({
							  	type: 'error',
							  	title: 'Oops...',
							  	text: 'Ocurrío un error, por favor intente de nuevo.',
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