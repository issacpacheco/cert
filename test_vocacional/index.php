<?php
require_once('../includes/conexion.php');
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="LCC Christhian Sosa">
	<title>Test vocacional | Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/img/favicon.png?v=1" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- Icons -->
	<link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link type="text/css" href="assets/css/login.css?v=1.0.<?php echo rand();?>" rel="stylesheet">
	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.btn-default {
			color: #222F46;
			border:solid 4px #fff;
			background-color: #fff;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.btn-default:hover{
			color: #fff;
			border:solid 4px #fff;
			background-color: transparent;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.btn-default:not(:disabled):not(.disabled):active{
			color: #fff;
			border:solid 4px #fff;
			background-color: transparent;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.bg-default{
			background: url(assets/img/bg3.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		.bienvenido{
			margin-top: 20px; 
			font-size: 30px;
		}
		p{
			font-size: 22px;
		}
		@media screen and (max-width: 500px){
			.bienvenido{
				margin-top: 10px; 
				font-size: 20px; 
			}
			p{
				font-size: 18px;
			}
		}
		#FormRegistro{
			padding: 30px 20px;
			color: #fff;
    		background-color: rgba(38, 38, 38, 0.85);
		}
	</style>
</head>

<body class="bg-default">
	<div class="main-content">
		<!-- Header -->
		<div class="header" style="padding-top: 20px; padding-bottom: 150px">
			<div class="container">
				<div class="header-body text-center">
					
				</div>
			</div>
		</div>
		<!-- Page content -->
		<div class="container mt--8 pb-5">
			
			<div class="row justify-content-center">
				<div class="col-12 col-lg-8">
					<form id="FormRegistro">
						<div class="row justify-content-center">
							<div class="col-12">
								<h1 class="text-white bienvenido text-center">TEST VOCACIONAL</h1>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Nombre completo <small>(obligatorio)</small></label>
								<input name="nombre" id="nombre" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Horario de contacto <small>(obligatorio)</small></label>
								<select name="horario" class="form-control" id="horario">
									<option value="Mañana">Mañana</option>
									<option value="Tarde">Tarde</option>
									<option value="Indistinto">Indistinto</option>
								</select>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Correo <small>(obligatorio)</small></label>
								<input name="correo" id="correo" type="email" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Teléfono <small>(obligatorio, 10 dígitos sin espacios)</small></label>
								<input name="telefono" id="telefono" type="tel" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Institución de procedencia <small>(obligatorio)</small></label>
								<input name="institucion" id="institucion" type="text" class="form-control">
							</div>				
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">¿Cómo te enteraste de nosotros? <small>(obligatorio)</small></label>
								<select name="medio" class="form-control" id="medio">
									<option value="">Seleccionar</option>
									<?php 
									$consulta = mysqli_query($conexion,"SELECT * FROM medios");
									while ($d = mysqli_fetch_array($consulta))
									{
										echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
									}
									?>
								</select>
							</div>				
						</div>
						
						<div class="row mt-4">
							<div class="col-12">
								<button type="submit" class="btn btn-warning btn-block" id="boton_finalizar">
									<i class="fas fa-chevron-right"></i> INICIAR TEST
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	<!-- Scripts -->
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script> 
	<!-- InputMask -->
	<script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
	<script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
	<!--Validación-->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/js/localization/messages_es.min.js" type="text/javascript"></script>

	<!--SweetAlert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	
	<script>
		
		$('#telefono').inputmask('9999999999', { placeholder: '' });
		
		$( document ).ready( function () {
			
			// Code for the Validator
			$( '#FormRegistro' ).validate( {
				errorElement: 'span', //default input error message container
				errorClass: 'text-danger', // default input error message class
				focusInvalid: true, // do not focus the last invalid input
				onfocusout: function ( element ) {
					this.element( element );
				}, //Validate on blur
				onkeyup: function ( element ) {
					this.element( element );
				}, //Validate on keyup
				focusCleanup: true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
				ignore: "",
				rules: {
					nombre: {
						required: true,
						minlength: 3
					},
					telefono: {
						required: true,
						minlength:10,
						maxlength:10,
					},
					correo: {
						required: true,
						minlength: 3,
						email: true
					},
					institucion: {
						required: true,
						minlength: 3,
					},
					medio: {
						required: true,
					},
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
					//$( '#boton_finalizar' ).prop( 'disabled', true );
					Registro();
				}

			} );

		} );

	

		/*****************************
		******************************
		FUNCIONES
		******************************
		******************************/

		function Registro() {
			Swal.fire( {
				title: 'Revisa que tus datos estén correctos',
				icon: 'info',
				width: 500,
				html: '<h4>Nombre: <strong>' + $( '#nombre' ).val() + '</h4>' +
					'<h4>Correo: <strong>' + $( '#correo' ).val() + '</strong></h4>' +
					'<h4>Teléfono: <strong>' + $( '#telefono' ).val() + '</strong></h4>' +
					'<h4>Institución de procedencia: <strong>' + $( '#institucion' ).val() + '</strong></h4>',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: '<i class="fas fa-thumbs-up"></i> Mis datos están correctos',
				cancelButtonText: '<i class="fas fa-thumbs-down"></i> Cambiar mis datos',
			} ).then( ( result ) => {
				if ( result.value ) {
					//console.log(result.value)
					Enviar();
				}
			} );
		}

		function Enviar() {
			var form_data = new FormData(document.getElementById("FormRegistro")); 

			$( '#boton_finalizar' ).empty();
			$( '#boton_finalizar' ).prop( 'disabled', true );
			$( '#boton_finalizar' ).append( '<i class="fas fa-spinner fa-spin"></i> Enviando...' );
			// Enviamos el formulario usando AJAX
			$.ajax( {
				type: 'POST',
				//dataType: "json",
				contentType: false,
				processData: false,
				data: form_data,
				url: "ajax/registro",
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
								text: 'Ya tenemos registrado el correo.',
							} )
							break;
						}
						case "-2":
						{
							//Error
							Swal.fire( {
								icon: 'error',
								title: 'Oops...',
								text: 'Ocurrío un error, por favor intente de nuevo.',
							} )
							break;
						}
						default:
						{
							window.location.replace("test?token="+data);
						}
					}
					$( '#boton_finalizar' ).empty();
					$( '#boton_finalizar' ).append( '<i class="fas fa-chevron-right"></i> INICIAR TEST' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				}
			} )
			return false;
		}
	</script>
</body>

</html>