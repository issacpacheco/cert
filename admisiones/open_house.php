<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="OPEN HOUSE CERT 2022">
	<meta name="author" content="Centro Educativo Rodríguez Tamayo">
	<title>Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/images/favicon.png?v=1.0" rel="icon" type="image/png">
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.bg-default{
			background: url(assets/images/bg/1.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		#FormRegistro{
			padding: 30px 20px;
			color: #fff;
    		background-color: rgba(38, 38, 38, 0.85);
		}
		.mensaje-error{
			color: #ff0033;
			border-color: #ff0033;
		}
	</style>
</head>

<body class="bg-default">
	<div class="container my-3 py-5">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8">
		
				<form id="FormRegistro">

					<div class="row justify-content-center">
						<div class="col-12">
							<h1 class="text-center">OPEN HOUSE</h1>
							<p class="text-center">¡Completa tus datos y en breve nos contactaremos contigo!</p>
						</div>
					</div>
					

					<div class="row justify-content-center">
						<div class="col-12 col-lg-8 mb-4">
							<label class="control-label">Licenciatura de interés <small>(obligatorio)</small> </label>
							<select name="oferta" class="form-control" id="oferta">
							</select>
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
						<div class="col-12 col-lg-5">
							<button type="submit" class="btn btn-success btn-block mb-3" id="boton_finalizar">
								<i class="fas fa-paper-plane"></i> Enviar
							</button>
						</div>
						<div class="col-12 col-lg-3">
							<a href="http://cert.edu.mx/" class="btn btn-info btn-block">
								<i class="fas fa-chevron-left"></i> Regresar
							</a>
						</div>
					</div>

				</form>
	
			</div>
		</div>
	</div>
	
	
	<!-- Scripts -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
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
			//Campus
			LeerDatos();

			// Code for the Validator
			$( '#FormRegistro' ).validate( {
				errorElement: 'small', //default input error message container
				errorClass: 'mensaje-error', // default input error message class
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
					oferta: {
						required: true,
					},
				},

				messages: { // custom messages for radio buttons and checkboxes

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
					Registro();
				}

			} );

		} );

	

		/*****************************
		******************************
		FUNCIONES
		******************************
		******************************/

		function LeerDatos() {
			$.ajax( {
				type: 'POST',
				url: "ajax/leer_licenciaturas",
				cache: false,
				//dataType: "json",
				// Mostramos un mensaje con la respuesta de PHP
				success: function ( data ) {
					//console.log(data);
					$( '#oferta' ).html( data );
				}
			} )
		}

		function Registro() {
			Swal.fire( {
				title: 'Revisa que tus datos estén correctos',
				icon: 'info',
				width: 600,
				html: '<p>Nombre: <strong>' + $( '#nombre' ).val() + '</strong></p>' +
					'<p>Correo: <strong>' + $( '#correo' ).val() + '</strong></p>' +
					'<p>Teléfono: <strong>' + $( '#telefono' ).val() + '</strong></p>' +
					'<p>Institución de procedencia: <strong>' + $( '#institucion' ).val() + '</strong></p>' +
					'<p>Licenciatura de interés: <strong>' + $( "#oferta option:selected" ).text() +'</strong></p>',
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
			var form_data = new FormData();
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
				url: "ajax/prospectos_eventos",
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
						case "1":
						{
							Swal.fire({
								title: '<strong>Gracias por tu registro</strong>',
								icon: 'success',
								html:
									'<h3>En breve un asesor se comunicará contigo.</h3>',
								showCloseButton: true,
								showCancelButton: false,
								focusConfirm: false,
								confirmButtonText:
									'<i class="fas fa-thumbs-up"></i>',
							});
							$('#FormRegistro').closest('form').find("input[type=text], input[type=email], input[type=password], input[type=tel], select, textarea").val("");
							break;
						}
						default:
						{
							//Error
							Swal.fire( {
								icon: 'error',
								title: 'Oops...',
								text: 'Ocurrío un error, por favor intente de nuevo.',
							} )
							break;
						}
					}
					$( '#boton_finalizar' ).empty();
					$( '#boton_finalizar' ).append( '<i class="fas fa-sign-in-alt"></i> Finalizar' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				}
			} )
			return false;
		}
	</script>
</body>

</html>