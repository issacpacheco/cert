<?php
if (!isset($_GET['oferta']))
{
	header('location:http://cert.edu.mx');
}
?>
<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Registro de aspirantes a las licenciaturas y posgrados">
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

	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">

	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.bg-default{
			background: url(assets/images/bg/<?php echo $_GET['oferta']=='medico'?'4':'2';?>.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		#FormRegistro{
			padding: 30px 20px;
			color: #fff;
    		background-color: rgba(38, 38, 38, 0.85);
		}
		.mensaje-error{
			color: #ff0033;
		}
		.has-error input, .has-error select{
			border-color: #ff0033;
			background: #ffa9a9;
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
							<h1 class="text-center">¿A qué programa educativo deseas inscribirte?</h1>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-12 col-lg-8 mb-4">
							<label class="control-label">Campus <small>(obligatorio)</small></label>
							<select name="id_campus" class="form-control" id="id_campus" onChange="LeerDatos('oferta','id_oferta')">
								<option value="">Seleccionar</option>
							</select>
						</div>
					</div>
					
					<div id="contenedor_principal" class="d-none">
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Oferta educativa <small>(obligatorio)</small> </label>
								<select name="id_oferta" class="form-control" id="id_oferta" onChange="CambioOferta()">
									<option value="">Seleccionar</option>
								</select>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 mb-4">
								<h4 class="text-center">Comencémos con tu información básica</h4>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Nombres <small>(obligatorio)</small></label>
								<input name="nombre" id="nombre" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Primer apellido <small>(obligatorio)</small></label>
								<input name="paterno" id="paterno" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Segundo apellido </label>
								<input name="materno" id="materno" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Fecha de nacimiento <small>(obligatorio)</small></label>
								<input name="fecha_nac" id="fecha_nac" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Género</label>
								<select name="genero" class="form-control" id="genero" onChange="CambioGenero()">
									<option value="Masculino"> Masculino </option>
									<option value="Femenino"> Femenino </option>
								</select>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Estado civil</label>
								<select name="estado_civil" class="form-control" id="estado_civil">
									<option value="Soltero"> Soltero </option>
									<option value="Casado"> Casado </option>
									<option value="Divorciado"> Divorciado </option>
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
								<label class="control-label">Crea una Contraseña para tu perfil <small>(obligatorio)</small></label>
								<input name="pass" id="pass" type="text" class="form-control">
								<a href="#" onclick="return false;" data-toggle="modal" data-target="#modal_pass" class="text-warning"><strong>¿Para que necesito crear una contraseña?</strong></a>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Teléfono <small>(obligatorio)</small></label>
								<input name="telefono" id="telefono" type="tel" class="form-control">
								*10 dígitos sin espacios.
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">CURP <small>(obligatorio)</small></label>
								<input name="curp" id="curp" type="text" class="form-control"> ¿No recuerdas tu CURP? <a href="https://www.gob.mx/curp/" target="_blank" class="text-warning"><strong>Consultar aquí</strong></a>
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Dirección <small>(obligatorio)</small></label>
								<input name="direccion" id="direccion" type="text" class="form-control">
							</div>
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Municipio <small>(obligatorio)</small></label>
								<input name="municipio" id="municipio" type="text" class="form-control">
							</div>
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Código Postal</label>
								<input name="cp" id="cp" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Institución de procedencia <small>(obligatorio)</small></label>
								<input name="institucion" id="institucion" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_trabajo">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Lugar donde laboras</label>
								<input name="lugar_trabajo" id="lugar_trabajo" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Nombre del tutor: <small>(obligatorio)</small></label>
								<input name="emergencia_nombre" id="emergencia_nombre" type="text" class="form-control">
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Teléfono del tutor <small>(obligatorio)</small></label>
								<input name="emergencia_telefono" id="emergencia_telefono" type="tel" class="form-control">
								*10 dígitos sin espacios.
							</div>
						</div>
						
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">¿Cómo te enteraste de nosotros? <small>(obligatorio)</small></label>
								<select name="medio" class="form-control" id="medio">
									<option value="">Seleccionar</option>
									<option>Facebook</option>
									<option>Ferias vocacionales</option>
									<option>Espectaculares</option>
									<option>Visita al plantel</option>
									<option>Publicidad en transporte público</option>
									<option>Televisión</option>
									<option>Recomendación</option>
									<option>Otro</option>
								</select>
							</div>				
						</div>

						<div class="row justify-content-center">
							<div class="col-12">
								<h4 class="text-center"> Agrega los documentos solicitados.</h4> 
								<p class="text-center text-warning">Si no dispones de los documentos por el momento puedes ingresarlos posteriormente desde tu perfil. 
								</p>
								<p class="text-center text-warning">**Los archivos deben ser en formato PDF 
								</p>
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_curp">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">CURP <small>(obligatorio)</small></label>
								<input type="file" class="form-control" name="file_curp" id="file_curp" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_certificado">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Certificado de estudios  de bachillerato</label>
								<input type="file" class="form-control" name="file_certificado" id="file_certificado" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_constancia">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Constancia de estudios <strong class="text-warning">(En caso de no tener certificado)</strong></label>
								<input type="file" class="form-control" name="file_constancia" id="file_constancia" accept="application/pdf">
							</div>
						</div>
						
						<div class="row justify-content-center contenedor" id="contenedor_identificacion">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Identificación oficial (INE, pasaporte o constancia de estudios con fotografía)</label>
								<input type="file" class="form-control" name="file_identificacion" id="file_identificacion" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_recibo">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Recibo de pago EXANI-II<small>(obligatorio)</small></label>
								<input type="file" class="form-control" name="file_recibo" id="file_recibo" accept="application/pdf">
							</div>
						</div>

						<!--div class="row justify-content-center contenedor" id="contenedor_pase">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Pase de ingreso al examen</label>
								<input type="file" class="form-control" name="file_pase" id="file_pase" accept="application/pdf">
							</div>
						</div-->


						<div class="row justify-content-center contenedor" id="contenedor_ine">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">INE</label>
								<input type="file" class="form-control" name="file_ine" id="file_ine" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_titulo">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Título</label>
								<input type="file" class="form-control" name="file_titulo" id="file_titulo" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_cedula">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Cédula profesional</label>
								<input type="file" class="form-control" name="file_cedula" id="file_cedula" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_certificado_lic">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Certificado de licenciatura (Ambos lados)</label>
								<input type="file" class="form-control" name="file_certificado_lic" id="file_certificado_lic" accept="application/pdf">
								*Todo en un documento <a class="text-success" href="#" onclick="return false;" data-toggle="modal" data-target="#modal_certificado"><i class="fa fa-question-circle"></i></a>
							</div>
						</div>
						
						<div class="row justify-content-center contenedor" id="contenedor_titulo_maestria">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Título de maestría</label>
								<input type="file" class="form-control" name="file_titulo_maestria" id="file_titulo_maestria" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_cedula_maestria">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Cédula de maestría</label>
								<input type="file" class="form-control" name="file_cedula_maestria" id="file_cedula_maestria" accept="application/pdf">
							</div>
						</div>

						<div class="row justify-content-center contenedor" id="contenedor_certificado_maestria">
							<div class="col-12 col-lg-8 mb-4">
								<label class="control-label">Certificado de maestría (Ambos lados)</label>
								<input type="file" class="form-control" name="file_certificado_maestria" id="file_certificado_maestria" accept="application/pdf">
								*Todo en un documento <a class="text-success" href="#" onclick="return false;" data-toggle="modal" data-target="#modal_certificado"><i class="fa fa-question-circle"></i></a>
							</div>
						</div>
						
						
					</div>
					
					<div class="row justify-content-center">
						<div class="col-12 col-lg-6">
							<button type="submit" class="btn btn-success btn-block mb-3" id="boton_finalizar">
								<i class="fas fa-save"></i> Guardar
							</button>
						</div>
						<div class="col-12 col-lg-6">
							<a href="http://cert.edu.mx/" class="btn btn-info btn-block">
								<i class="fas fa-sign-out-alt"></i> Salir sin guardar
							</a>
						</div>
					</div>

				</form>

			</div>
		</div>
	</div>
	
	<div class="modal fade" id="modal_pass" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Crea una contraseña para tu perfil</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
				</div>

				<div class="modal-body">
				<p>La contraseña te servirá para poder acceder a tu perfil y revisar posteriormente tu documentación.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal_certificado" tabindex="-1">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">FORMATO OBLIGATORIO</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
				</div>

				<div class="modal-body">
					<p>El documento tiene que haber sido escaneado.</p>
					<p>Formato vertical ambas caras.</p>
					<p>En caso de no poder ser escaneado será necesario entregarlo en forma física.</p>
				</div>
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
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

	<script>
		$('.contenedor').addClass('d-none');
		$('#fecha_nac').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/aaaa'});
		$('#telefono').inputmask('9999999999', { placeholder: '' });
		$('#emergencia_telefono').inputmask('9999999999', { placeholder: '' });

		$( document ).ready( function () {

			//Campus
			LeerDatos( 'campus', 'id_campus' );

			// Code for the Validator
			$( '#FormRegistro' ).validate( {
				errorElement: 'span', //default input error message container
				errorClass: 'mensaje-error', // default input error message class
				focusInvalid: true, // do not focus the last invalid input
				onfocusout: function ( element ) {
					this.element( element );
				}, //Validate on blur
				onkeyup: function ( element ) {
					this.element( element );
				}, //Validate on keyup
				focusCleanup: true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
				ignore: ":not(:visible)",
				rules: {
					nombre: {
						required: true,
						minlength: 3
					},
					paterno: {
						required: true,
					},
					fecha_nac: {
						required: true,
					},
					genero: {
						required: true,
					},
					telefono: {
						required: true,
						minlength:10,
						maxlength:10,
					},
					edo_civil: {
						required: true,
					},
					correo: {
						required: true,
						minlength: 3,
						email: true
					},
					pass: {
						required: true,
					},
					curp: {
						required: true,
						curp:true,
					},
					direccion: {
						required: true,
						minlength: 3,
					},
					municipio: {
						required: true,
					},
					institucion: {
						required: true,
						minlength: 3,
					},
					emergencia_nombre: {
						required: true,
						minlength: 3,
					},
					emergencia_telefono: {
						required: true,
						minlength:10,
						maxlength:10,
					},
					medio: {
						required: true,
					},
					id_campus: {
						required: true,
					},
					id_oferta: {
						required: true,
					},
					file_curp:{
						required: true,
					},
					file_recibo:{
						required: true,
					}
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
					$( '#boton_finalizar' ).prop( 'disabled', true );
					Registro();
				}

			} );

		} );

		//Nuevos metodos para jQuery Validate

		$.validator.addMethod("curp", function (value, element) {
			if (value !== '') 
			{
				var patt = new RegExp("^[A-Z][A,E,I,O,U,X][A-Z]{2}[0-9]{2}[0-1][0-9][0-3][0-9][M,H][A-Z]{2}[B,C,D,F,G,H,J,K,L,M,N,Ñ,P,Q,R,S,T,V,W,X,Y,Z]{3}[0-9,A-Z][0-9]$");
				return patt.test(value);
			} 
			else 
			{
				return false;
			}
		}, "Ingresa una CURP valido");

		/*****************************
		******************************
		FUNCIONES
		******************************
		******************************/


		function LeerDatos( opcion, elemento ) {
			var id = $( '#id_campus option:selected' ).val();
			console.log( 'ID:' + id );
			$.ajax( {
				type: 'POST',
				url: "ajax/leer_datos",
				cache: false,
				//dataType: "json",
				data: {
					opcion: opcion,
					id: id,
					limit:'<?php echo $_GET['oferta'];?>'
				},
				// Mostramos un mensaje con la respuesta de PHP
				success: function ( data ) {
					//console.log(data);
					$( '#' + elemento ).html( data );
					CambioOferta();
				}
			} )
		}

		function CambioOferta() {
			if ($( '#id_oferta option:selected' ).val() == '' || $( '#id_oferta option:selected' ).val() == 'undefined')
			{
				$('#contenedor_principal').addClass('d-none');
				$( '#boton_finalizar' ).prop( 'disabled', true );
			}
			else
			{
				$('#contenedor_principal').removeClass('d-none');
				$( '#boton_finalizar' ).prop( 'disabled', false );
			}
			console.log( $( '#id_oferta option:selected' ).val() );
			$('.contenedor').addClass('d-none');
			
			if ( $( '#id_oferta option:selected' ).text().includes( "Educación" ) && $( '#id_oferta option:selected' ).data('nivel') == 5) //EDUCACIÓN
			{
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_identificacion' ).removeClass( 'd-none' );
				$( '#contenedor_certificado' ).removeClass( 'd-none' );
				$( '#contenedor_constancia' ).removeClass( 'd-none' );
			} 
			else if ( $( '#id_oferta option:selected' ).text().includes( "Médico" ) && $( '#id_oferta option:selected' ).data('nivel') == 5) //MÉDICO CIRUJANO
			{
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_recibo' ).removeClass( 'd-none' );
				$( '#contenedor_identificacion' ).removeClass( 'd-none' );
				$( '#contenedor_pase' ).removeClass( 'd-none' );
				
			}
			else if ( $( '#id_oferta option:selected' ).data('nivel') > 5 && $( '#id_oferta option:selected' ).data('nivel') < 8 ) //POSGRADOS
			{
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_titulo' ).removeClass( 'd-none' );
				$( '#contenedor_cedula' ).removeClass( 'd-none' );
				$( '#contenedor_certificado_lic' ).removeClass( 'd-none' );
			} 
			else if ( $( '#id_oferta option:selected' ).data('nivel') == 8 ) //DOCTORADOS
			{
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_titulo_maestria' ).removeClass( 'd-none' );
				$( '#contenedor_cedula_maestria' ).removeClass( 'd-none' );
				$( '#contenedor_certificado_maestria' ).removeClass( 'd-none' );
			} 
			else if ( $( '#id_oferta option:selected' ).val() != '' ) //LICENCIATURAS
			{
				$( '#contenedor_curp' ).removeClass( 'd-none' );
				$( '#contenedor_certificado' ).removeClass( 'd-none' );
				$( '#contenedor_constancia' ).removeClass( 'd-none' );
			} 		
			if ( $( '#id_oferta option:selected' ).data('nivel') >= 6 )//POSGRADOS
			{
				$( '#contenedor_trabajo' ).removeClass( 'd-none' );
			}
		}

		function CambioGenero() {
			console.log( "CambioGenero" );
			if ( $( '#genero option:selected' ).val() == 'Masculino' ) {
				if ( $( '#estado_civil option:selected' ).val() == 'Soltera' ) {
					$( '#estado_civil' ).html( '<option value="Soltero" selected>Soltero</option><option value="Casado">Casado</option><option value="Divorciado">Divorciado</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Casada' ) {
					$( '#estado_civil' ).html( '<option value="Soltero">Soltero</option><option value="Casado" selected>Casado</option><option value="Divorciado">Divorciado</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Divorciada' ) {
					$( '#estado_civil' ).html( '<option value="Soltero">Soltero</option><option value="Casado">Casado</option><option value="Divorciado" selected>Divorciado</option>' );
				}
			} else {
				if ( $( '#estado_civil option:selected' ).val() == 'Soltero' ) {
					$( '#estado_civil' ).html( '<option value="Soltera" selected>Soltera</option><option value="Casada">Casada</option><option value="Divorciada">Divorciada</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Casado' ) {
					$( '#estado_civil' ).html( '<option value="Soltera">Soltera</option><option value="Casada" selected>Casada</option><option value="Divorciada">Divorciada</option>' );
				}
				if ( $( '#estado_civil option:selected' ).val() == 'Divorciado' ) {
					$( '#estado_civil' ).html( '<option value="Soltera">Soltera</option><option value="Casada">Casada</option><option value="Divorciada" selected>Divorciada</option>' );
				}
			}
		}

		function Registro() {
			Swal.fire( {
				title: 'Revisa que tus datos estén correctos',
				
				width: 800,
				html: '<h4>Nombre: <strong>' + $( '#nombre' ).val() + ' ' + $( '#paterno' ).val() + ' ' + $( '#materno' ).val() + '</strong></h4>' +
					'<h4>Fecha de nacimiento: <strong>' + $( '#fecha_nac' ).val() + '</strong></h4>' +
					'<h4>Género: <strong>' + $( '#genero' ).val() + '</strong></h4>' +
					'<h4>Estado civil: <strong>' + $( '#estado_civil' ).val() + '</strong></h4>' +
					'<h4>Correo: <strong>' + $( '#correo' ).val() + '</strong></h4>' +
					'<h4>Teléfono: <strong>' + $( '#telefono' ).val() + '</strong></h4>' +
					'<h4>CURP: <strong>' + $( '#curp' ).val() + '</strong></h4>' +
					'<h4>Institución de procedencia: <strong>' + $( '#institucion' ).val() + '</strong></h4>' +
					'<h4>Dirección: <strong>' + $( '#direccion' ).val() + '</strong></h4>' +
					'<h4>Municipio: <strong>' + $( '#municipio' ).val() + '</strong></h4>' +
					'<h4>Código postal: <strong>' + $( '#cp' ).val() + '</strong></h4>',
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
			var file_curp = $( '#file_curp' ).prop( 'files' )[ 0 ];
			var file_certificado = $( '#file_certificado' ).prop( 'files' )[ 0 ];
			var file_constancia = $( '#file_constancia' ).prop( 'files' )[ 0 ];
			
			var file_recibo = $( '#file_recibo' ).prop( 'files' )[ 0 ];
			var file_ine = $( '#file_ine' ).prop( 'files' )[ 0 ];
			//var file_pase = $( '#file_pase' ).prop( 'files' )[ 0 ];
			
			var file_identificacion = $( '#file_identificacion' ).prop( 'files' )[ 0 ];
			
			var file_titulo = $('#file_titulo').prop('files')[0]; 
			var file_certificado_lic = $( '#file_certificado_lic' ).prop( 'files' )[ 0 ];
			var file_cedula = $( '#file_cedula' ).prop( 'files' )[ 0 ];
			
			var file_titulo_maestria = $('#file_titulo_maestria').prop('files')[0]; 
			var file_certificado_maestria = $( '#file_certificado_maestria' ).prop( 'files' )[ 0 ];
			var file_cedula_maestria = $( '#file_cedula_maestria' ).prop( 'files' )[ 0 ];
			
			var form_data = new FormData();

			form_data.append( 'file_curp', file_curp );
			form_data.append( 'file_certificado', file_certificado );
			form_data.append( 'file_constancia', file_constancia );
			
			form_data.append( 'file_recibo', file_recibo );
			form_data.append( 'file_ine', file_ine );
			//form_data.append( 'file_pase', file_pase );
			
			form_data.append( 'file_identificacion', file_identificacion );
			
			form_data.append('file_titulo', file_titulo);
			form_data.append( 'file_certificado_lic', file_certificado_lic );
			form_data.append( 'file_cedula', file_cedula );
			
			form_data.append('file_titulo_maestria', file_titulo_maestria);
			form_data.append( 'file_certificado_maestria', file_certificado_maestria );
			form_data.append( 'file_cedula_maestria', file_cedula_maestria );

			form_data.append( 'nombre', $( '#nombre' ).val() );
			form_data.append( 'paterno', $( '#paterno' ).val() );
			form_data.append( 'materno', $( '#materno' ).val() );
			form_data.append( 'fecha_nac', $( '#fecha_nac' ).val() );
			form_data.append( 'genero', $( '#genero' ).val() );
			form_data.append( 'estado_civil', $( '#estado_civil' ).val() );
			form_data.append( 'correo', $( '#correo' ).val() );
			form_data.append( 'pass', $( '#pass' ).val() );
			form_data.append( 'telefono', $( '#telefono' ).val() );
			form_data.append( 'curp', $( '#curp' ).val() );
			form_data.append( 'emergencia_nombre', $( '#emergencia_nombre' ).val() );
			form_data.append( 'emergencia_telefono', $( '#emergencia_telefono' ).val() );
			form_data.append( 'direccion', $( '#direccion' ).val() );
			form_data.append( 'municipio', $( '#municipio' ).val() );
			form_data.append( 'cp', $( '#cp' ).val() );
			form_data.append( 'institucion', $( '#institucion' ).val() );
			form_data.append( 'lugar_trabajo', $( '#lugar_trabajo' ).val() );
			form_data.append( 'id_campus', $( '#id_campus' ).val() );
			form_data.append( 'id_oferta', $( '#id_oferta' ).val() );

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
						case "1":
						{
							//Redireccionar a index
							window.location.replace( "finalizar" );
							break;
						}
						default:
						{
							//Error
							Swal.fire( {
								icon: 'error',
								title: 'Oops...',
								text: 'Ocurrío un error, al intentar guardar alguno de los archivos, verifique que el formato sea correcto y que no supere 10MB de tamaño.',
							} )
							break;
						}
					}
					$( '#boton_finalizar' ).empty();
					$( '#boton_finalizar' ).append( '<i class="fas fa-save"></i> Guardar' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
					Swal.fire( {
						icon: 'error',
						title: 'Oops...',
						text: 'Ocurrío un error, al parecer el tamaño total de los archivos supera 10MB, por favor intenta subir archivos menos pesados.',
					} );
					$( '#boton_finalizar' ).empty();
					$( '#boton_finalizar' ).append( '<i class="fas fa-save"></i> Guardar' );
					$( '#boton_finalizar' ).prop( 'disabled', false );
				}
			} )
			return false;
		}
	</script>
</body>
</html>