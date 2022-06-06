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
	<title>CENTRO EDUCATIVO RODRÍGUEZ TAMAYO</title>
	<link rel="icon" href="assets/images/favicon.png">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,700|Roboto:300,400,700'" rel="stylesheet">
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS-->
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand();?>">
</head>
<body>
	

	<?php include('assets/includes/header.php');?>
	
    
	<section class="container my-5">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-10 my-auto px-4">
				<h1>Envíanos tus dudas o comentarios</h1>
				<form id="form_contacto"  method="post" action="#">
                    <div class="row">
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <input type="text"  name="nombre" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <input type="email"  name="correo" class="form-control" placeholder="Correo">
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <input type="tel" name="telefono" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="col-12 my-3">
                            <div class="form-group">
                                <textarea name="mensaje" class="form-control" rows="3" placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 my-3">
                            <div class="d-grid gap-2 d-md-block">
                                <button type="submit" class="btn btn-primary" id="boton_finalizar"><i class="fas fa-paper-plane"></i> Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</section>
	
	
   
	
	
	
	<?php include('assets/includes/footer.php');?>
	
	<!-- Scripts -->
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
	<!--Validación-->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="assets/js/localization/messages_es.min.js" type="text/javascript"></script>
	<!--SweetAlert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script>
		$( document ).ready( function () {
			// Code for the Validator
			$( '#form_contacto' ).validate( {
				errorElement: 'small', //default input error message container
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
					mensaje: {
						required: true,
						minlength: 3,
					},
				},

				messages: { // custom messages for radio buttons and checkboxes

				},

				

				submitHandler: function ( form ) {
					Enviar();
				}

			} );

		} );
		
		function Enviar() {
			var form_data = new FormData();
			var form_data = new FormData(document.getElementById("form_contacto")); 

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
				url: "ajax/contacto",
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
								text: 'Ocurrío un error, por favor intente de nuevo.',
							} )
							break;
						}
						case "1":
						{
							Swal.fire({
								title: '<strong>Gracias por tu mensaje</strong>',
								icon: 'success',
								html:
									'<h3>En breve un asesor se comunicará contigo.</h3>',
								showCloseButton: true,
								showCancelButton: false,
								focusConfirm: false,
								confirmButtonText:
									'<i class="fas fa-thumbs-up"></i>',
							});
							$('#form_contacto').closest('form').find("input[type=text], input[type=email], input[type=password], input[type=tel], select, textarea").val("");
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
					$( '#boton_finalizar' ).append( '<i class="fas fa-paper-plane"></i> Enviar' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				}
			} )
			return false;
		}
	</script>
	
	
</body>
</html>