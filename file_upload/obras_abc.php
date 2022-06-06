<?php 
include("includes/config.php");
extract( $_REQUEST );
$_SESSION['folder'] = 'obras';
$_SESSION['id_folder'] = $id;
if ($_POST['opcion']==1)
{
	$titulo = "Nuevo";
	BorrarCarpeta('../images/'.$_SESSION['folder'].'/temp_bak');
	if (!file_exists('../images/'.$_SESSION['folder'].'/temp_bak'))
	{
		umask(0000);
		mkdir('../images/'.$_SESSION['folder'].'/temp_bak',0777);
		mkdir('../images/'.$_SESSION['folder'].'/temp_bak/medium',0777);
		mkdir('../images/'.$_SESSION['folder'].'/temp_bak/thumb',0777);
	}
	$_SESSION['id_folder'] = 'temp_bak';
}
else if($_POST['opcion'] == 2)
{
	$titulo = "Editar";
	$consulta = mysqli_query($conexion,"SELECT * FROM ".$_SESSION['folder']." WHERE id = '".$id."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
}
else if($_POST['opcion'] == 3)
{
	$titulo = "Eliminar";
	$consulta = mysqli_query($conexion,"SELECT * FROM ".$_SESSION['folder']." WHERE id = '".$id."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $title;?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height">
    <link rel="shortcut icon" href="images/favicon.png"/>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'/>
    
    <!-- Styling -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="addons/toastr/toastr.min.css"/>
    <link rel="stylesheet" href="addons/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="addons/ionicons/css/ionicons.css"/>
    <link rel="stylesheet" href="addons/noUiSlider/nouislider.min.css"/>
	
    <link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/<?php echo $theme;?>" class="theme" />	
    <!-- End of Styling -->
	
	<!--Summernote-->
	<link rel="stylesheet" href="plugins/summernote-master/dist/summernote.css">
	<style>
		label {
    		margin-top: 10px !important;
		}		
	</style>
	
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
	<!-- blueimp Gallery styles -->
	<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload.css" rel="stylesheet" >
	<link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload-ui.css" rel="stylesheet" >
	<!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript><link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload-noscript.css" rel="stylesheet" ></noscript>
    <noscript><link href="plugins/jQuery-File-Upload-9.12.1/css/jquery.fileupload-ui-noscript.css" rel="stylesheet" ></noscript>
	
</head>
<body class="hold-transition">

    <!-- Header -->
    <?php include("includes/header.php");?>
    <!-- End of Header -->

    <!-- Navigation -->
    <?php include("includes/menu.php");?>
    <!-- End of Navigation -->

    <!-- Scroll up button -->
    <a class="scroll-up"><i class="fa fa-chevron-up"></i></a>
    <!-- End of scroll up button -->

    <!-- Main content-->
    <div class="content">
		 <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
					<div class="panel">
						<div class="panel-heading">
							<?php echo $titulo;?>
							 <div class="panel-options">
								<a class="panel-toggle"><i class="fa fa-chevron-up"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<section class="col-lg-12 col-md-12 col-sm-12">
								<div class="mensaje" id="mensaje_reg"><a href="<?php echo $d['img'];?>" target="_blank"><?php echo $d['img'];?></a></div>
								<form id="form_abc" method="post" action="#" enctype="multipart/form-data">							
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<label>Nombre</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-font fa-fw"></i></span>
													<input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre" value="<?php echo $d['nombre'];?>">
												</div>
											</div>
											
											<div class="col-md-4">
												<label>Artista</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-list-ol fa-fw"></i></span>
													<select class="form-control" name="id_artista">
														<option value="0">Seleccionar</option>
														<?php
														$consulta_cat = mysqli_query($conexion,"SELECT * FROM artistas");
														while ($cat = mysqli_fetch_array($consulta_cat))
														{
															if ($d['id_artista'] == $cat['id'])
															{
																echo '<option value="'.$cat['id'].'" selected>'.$cat['nombre'].'</option>';	
															}
															else
															{
																echo '<option value="'.$cat['id'].'">'.$cat['nombre'].'</option>';
															}
														}
														?>
													</select>    
												</div>
											</div>
											
											<div class="col-md-4">
												<label>Técnica</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-dollar fa-fw"></i></span>
													<input type="text" class="form-control" placeholder="Técnica" name="tecnica" value="<?php echo $d['tecnica'];?>" <?php echo $read;?>>
												</div>
											</div>
											
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">
											<div class="col-md-4">
												<label>Dimensiones</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-image fa-fw"></i></span>
													<input type="text" class="form-control" placeholder="Dimensiones" name="dimensiones" value="<?php echo $d['dimesiones'];?>" <?php echo $read;?>>
												</div>
											</div>
											<div class="col-md-4">
												<label>Precio</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-dollar fa-fw"></i></span>
													<input type="number" class="form-control" placeholder="Precio" name="precio" id="precio" value="<?php echo $d['precio'];?>" min="0" <?php echo $read;?>>
												</div>
											</div>
											<div class="col-md-4">
												<label>Precio en dólares</label>
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-dollar fa-fw"></i></span>
													<input type="number" class="form-control" placeholder="Precio" name="dolar" value="<?php echo $d['dolar'];?>" min="0" <?php echo $read;?>>
												</div>
											</div>
										</div>
									</div>
									
									<div class="form-group">
										<div class="row">

											<div class="col-md-4">
												<div class="input-group">
													<?php 
													if ($d['disponible']==1)
													{
														echo '<label><input type="checkbox" name="disponible" id="disponible" value="1" checked> Disponible</label>';
													}
													else
													{
														echo '<label><input type="checkbox" name="disponible" id="disponible" value="1"> Disponible</label>';
													}
													?>
												</div>
											</div>									
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<label class="col-md-12">Descripción</label>
										</div>                                        
									</div> 
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<textarea class="form-control summernote" rows="6" name="descripcion" id="descripcion"><?php echo $d['descripcion'];?></textarea>
											</div>
										</div>
									</div>

									<input type="hidden" name="id" value="<?php echo $d['id'];?>">
									<input type="hidden" name="opcion" value="<?php echo $_POST['opcion'];?>">
								</form>
								<div class="form-group">
									<div class="row">
										<div class="col-md-12">
											<div class="alert alert-success">
												<strong>NOTA:</strong> Para mejores resultados el nombre de los archivos de imagen <strong>no debe contener espacios en blanco ni caracteres especiales</strong>.
											</div>
											<form id="fileupload" action="" method="POST" enctype="multipart/form-data">
												<div class="fileupload-buttonbar">
													<div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
														<span class="btn btn-success fileinput-button">
														<i class="fa fa-plus"></i>
														<span>Agregar imágenes</span>
														<input type="file" name="files[]" multiple>
														</span>
														<button type="submit" class="btn btn-primary start">
														<i class="fa fa-upload"></i>
														<span>Subir</span>
														</button>
														<button type="reset" class="btn btn-warning cancel">
														<i class="fa fa-ban"></i>
														<span>Cancelar subida</span>
														</button>
														<button type="button" class="btn btn-danger delete">
														<i class="fa fa-trash"></i>
														<span>Borrar</span>
														</button>
														Seleccionar todo<input type="checkbox" class="toggle">
														<span class="fileupload-loading"></span>
													</div>
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fileupload-progress fade">
															<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
																<div class="progress-bar progress-bar-success" style="width:0%;"></div>
															</div>
															<div class="progress-extended">&nbsp;</div>
														</div>
													</div>
												</div>
											  <table role="presentation" class="table table-striped clearfix">
												 <tbody class="files"></tbody>
											  </table>
										   </form>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-8">
										<?php
										if ($_POST['opcion']==3)
										{
											echo '<button type="button" class="btn btn-danger btn-lg btn-block" id="boton"><i class="fa fa-trash"></i> Eliminar</button>';
										}
										else
										{
											echo '<button type="button" class="btn btn-success btn-lg btn-block" id="boton"><i class="fa fa-save"></i> Guardar</button>';
										}
										?>
									</div>
									<div class="col-lg-4">
										<a href="obras" class="btn btn-default btn-lg btn-block"><i class="fa fa-close"></i> Cancelar</a>
									</div>
								</div>

							</section>
						</div>
					</div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("includes/footer.php");?>
        <!-- End of Footer -->
    </div>
    <!-- End of Main content-->
	<div class="scripts">
        <!-- Addons -->
        <script src="addons/jquery/jquery.min.js"></script>
        <script src="addons/jquery-ui/jquery-ui.min.js"></script>
        <script src="addons/bootstrap/js/bootstrap.min.js"></script>
		<script src="addons/fullcalendar/lib/moment.min.js"></script>
        <script src="addons/pacejs/pace.min.js"></script>
        <!-- scripts -->
        <script src="addons/scripts.js"></script>
		
		 <!-- Current page scripts -->
        <div class="current-scripts">
			<!-- Validate -->
			<script src="addons/jqueryvalidate/jquery.validate.js"></script>
			<script src="addons/jqueryvalidate/localization/messages_es.min.js" type="text/javascript"></script>
			<script>
								
				$(document).ready(function(){
					
				});
				
				var validator = $( '#form_abc' ).validate( {
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
				ignore: '',
				rules: {
					//CAMBIAR POR LAS VARIABLES QUE SEAN OBLIGATORIAS O NECESITEN VALIDACIÓN
					nombre: {
						required: true,
					},
				},

				messages: { // custom messages for radio buttons and checkboxes
					codigo:{
						remote:"Ya esta registrado el código.",
					},
				},

				invalidHandler: function ( event, validator ) { //display error alert on form submit   

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
					if ( element.closest( '.form-group' ).size() === 1 ) {
						error.insertAfter( element.closest( '.input-group' ) );
					} else {
						error.insertAfter( element );
					}
				},

				submitHandler: function ( form ) {
					$('#boton').prop('disabled',true);
					Guardar();
				}
			} );
			
				
			$('#boton').click(function () {
				var form = $("#form_abc");
				var valid = true;
				$('input', form).each(function(i, v){
					valid = validator.element(v) && valid;
				});
				
				if(valid)
				{
					Guardar();
				}
			});
				
			
			function Guardar()
			{
				var form_data = new FormData(document.getElementById("form_abc"));  
				
				// Enviamos el formulario usando AJAX
				$.ajax({
					type: 'POST',
					contentType: false,
        			processData: false,
        			data: form_data,  
					cache:false,
					url: 'obras_guardar',

					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) 
					{
						console.log(data);
						$('#mensaje_reg').empty();
						switch (data)
						{						
							case "-1":
							{
								$('#mensaje_reg').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="fa fa-close"></i></button>Ocurrió un error en el sitema, por favor intentelo de nuevo.</div>');
								break;	
							}
							default:
							{
								location.replace("obras");
								break;	
							}
						}
						$('html, body').animate({
							scrollTop: $("body").offset().top
						}, 2000);
						$("#mensaje_reg").slideDown(300).delay(10000).slideUp(300);
					}
				})        
				return false;
			}
					
			
		</script>

		<!-- The template to display files available for upload -->
		<script id="template-upload" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-upload fade">
				<td>
					<span class="preview"></span>
				</td>
				<td>
					<p class="name">{%=file.name%}</p>
					<strong class="error text-danger"></strong>
				</td>
				<td>
					<p class="size">Subiendo...</p>
					<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
				</td>
				<td>
					{% if (!i && !o.options.autoUpload) { %}
						<button class="btn btn-primary start" disabled>
							<i class="fa fa-upload"></i>
							<span>Subir</span>
						</button>
					{% } %}
					{% if (!i) { %}
						<button class="btn btn-warning cancel">
							<i class="fa fa-ban"></i>
							<span>Cancelar</span>
						</button>
					{% } %}
				</td>
			</tr>
		{% } %}
		</script>
		<!-- The template to display files available for download -->
		<script id="template-download" type="text/x-tmpl">
		{% for (var i=0, file; file=o.files[i]; i++) { %}
			<tr class="template-download fade">
				<td>
					<span class="preview">
						{% if (file.thumbnailUrl) { %}
							<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}?v=<?php echo rand();?>" width="100"></a>
						{% } %}
					</span>
				</td>
				<td>
					<p class="name">
						{% if (file.url) { %}
							<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
						{% } else { %}
							<span>{%=file.name%}</span>
						{% } %}
					</p>
					{% if (file.error) { %}
						<div><span class="label label-danger">Error</span> {%=file.error%}</div>
					{% } %}
				</td>
				<td>
					<span class="size">{%=o.formatFileSize(file.size)%}</span>
				</td>
				<td>
					{% if (file.deleteUrl) { %}
						<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
							<i class="fa fa-trash"></i>
							<span>Borrar</span>
						</button>
						<input type="checkbox" name="delete" value="1" class="toggle">
					{% } else { %}
						<button class="btn btn-warning cancel">
							<i class="fa fa-ban"></i>
							<span>Cancelar</span>
						</button>
					{% } %}
				</td>
			</tr>
		{% } %}
		</script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/vendor/jquery.ui.widget.js"></script>
		<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
		<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
		<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
		<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.iframe-transport.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-process.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-image.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-audio.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-video.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-validate.js"></script>
		<script src="plugins/jQuery-File-Upload-9.12.1/js/jquery.fileupload-ui.js"></script>
		<script>
		$(function () {
			'use strict';

			// Initialize the jQuery File Upload widget:
			$('#fileupload').fileupload({
				// Uncomment the following to send cross-domain cookies:
				//xhrFields: {withCredentials: true},
				 url: 'Upload',
				 disableImageResize: /Android(?!.*Chrome)|Opera/
						.test(window.navigator.userAgent),
					acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
			});


			// Enable iframe cross-domain access via redirect option:
			$('#fileupload').fileupload(
				'option',
				'redirect',
				window.location.href.replace(
					/\/[^\/]*$/,
					'/cors/result.html?%s'
				)
			);

			if (window.location.hostname === 'blueimp.github.io') {
				// Demo settings:
				$('#fileupload').fileupload('option', {
					url: '//jquery-file-upload.appspot.com/',
					// Enable image resizing, except for Android and Opera,
					// which actually support image resizing, but fail to
					// send Blob objects via XHR requests:
					disableImageResize: /Android(?!.*Chrome)|Opera/
						.test(window.navigator.userAgent),
					maxFileSize: 999000,
					acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
				});
				// Upload server status check for browsers with CORS support:
				if ($.support.cors) {
					$.ajax({
						url: '//jquery-file-upload.appspot.com/',
						type: 'HEAD'
					}).fail(function () {
						$('<div class="alert alert-danger"/>')
							.text('Upload server currently unavailable - ' +
									new Date())
							.appendTo('#fileupload');
					});
				}
			} else {
				// Load existing files:
				$('#fileupload').addClass('fileupload-processing');
				$.ajax({
					// Uncomment the following to send cross-domain cookies:
					//xhrFields: {withCredentials: true},
					url: $('#fileupload').fileupload('option', 'url'),
					dataType: 'json',
					context: $('#fileupload')[0]
				}).always(function () {
					$(this).removeClass('fileupload-processing');
				}).done(function (result) {
					$(this).fileupload('option', 'done')
						.call(this, $.Event('done'), {result: result});
				});
			}

		});
		</script>

			<script src="plugins/summernote-master/dist/summernote.min.js"></script>
			<script src="plugins/summernote-master/dist/lang/summernote-es-ES.min.js"></script>
			<script>
				$(document).ready(function() {
					$('.summernote').summernote({
						placeholder: 'Descripción del producto',
						lang:'es-ES',
						height: 450
					});
					$("#content").summernote()
					$('.dropdown-toggle').dropdown()
				});
			</script>
			
        </div>
    </div>

</body>

</html>