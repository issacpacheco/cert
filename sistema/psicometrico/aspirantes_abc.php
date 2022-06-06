<?php 
include("includes/config.php");
if (!isset($_POST['id']))
{
	//Nueva 
	$titulo = 'Nuevo';
	$d['pass'] = CrearPass(4);
}
else if (isset($_POST['id']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	if ($_POST['editar'] == 1)
	{
		//Editar
		$titulo = 'Editar';
	}
	else if ($_POST['eliminar'] == 1)
	{
		//Eliminar
		$titulo = 'Eliminar';
		$read = 'readonly';
		$disabled = 'disabled';
	}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Panel de administración</title>

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
    <link rel="stylesheet" href="styles/theme-dark.css" class="theme" />
	
    <!-- End of Styling -->
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
                        </div>
                        <div class="panel-body">
                        	<form action="aspirantes" method="post" id="form_abc" enctype="multipart/form-data">
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Nombre</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Primer apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="paterno" placeholder="Primer apellido" value="<?php echo $d['paterno'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Segundo apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="materno" placeholder="Segundo apellido" value="<?php echo $d['materno'];?>" <?php echo $read;?>>
										</div>
									</div>
									
								</div>
								
								<div class="row">	
									<div class="form-wrapper col-sm-4">
										<label>Genero</label>
										<div class="form-group">
											<select class="form-control" name="genero" id="genero" <?php echo $disabled;?>>
												<?php 
												if ($d['genero']=='H')
												{
													echo '
													<option value="">Seleccionar</option>
													<option value="H" selected>Masculino</option>
													<option value="M">Femenino</option>';
												}
												else if ($d['genero']=='M')
												{
													echo '
													<option value="">Seleccionar</option>
													<option value="H">Masculino</option>
													<option value="M" selected>Femenino</option>';	
												}
												else{
													echo '
													<option value="" selected>Seleccionar</option>
													<option value="H">Masculino</option>
													<option value="M">Femenino</option>';
												}
												?>
											</select>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Correo</label>
										<div class="form-group ">
											<input type="email" class="form-control" name="correo" placeholder="Correo" value="<?php echo $d['correo'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Contraseña</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="pass" placeholder="Contraseña" value="<?php echo $d['pass'];?>" <?php echo $read;?>>
										</div>
									</div>
									
								</div>				
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Matricula</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="matricula" placeholder="Matricula" value="<?php echo $d['matricula'];?>" <?php echo $read;?>>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-8">
										<input type="hidden" name="id_oferta" value="<?php echo $_POST[ 'id_oferta' ];?>">
										<input type="hidden" name="id_campus" value="<?php echo $_POST[ 'id_campus' ];?>">
										<?php
										if ($_POST['editar'] == 1)
										{
											echo '
											<input type="hidden" name="editar" value="'.$d['id'].'">
											<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fa fa-save"></i></button>
											';
										}
										else if ($_POST['eliminar'] == 1)
										{
											echo '
											<input type="hidden" name="eliminar" value="'.$d['id'].'">
											<button type="submit" class="btn btn-danger btn-lg btn-block">Eliminar <i class="fa fa-trash"></i></button>
											';
										}
										else
										{
											echo '
											<input type="hidden" name="alta" value="1">
											<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fa fa-save"></i></button>
											';
										}
										?>
									</div>
									<div class="col-sm-4">
										<a href="aspirantes" class="btn btn-default btn-lg btn-block">Cancelar <i class="fa fa-close"></i></a>
									</div>
								</div>
                            </form>
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
		<!-- InputMask -->
		<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
		<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
       	<script>
			$( document ).ready(function() {
				$('#nombre').focus();
			});
		</script>
		
		<!-- Validate -->
		<script src="addons/jqueryvalidate/jquery.validate.js"></script>
		<script src="addons/jqueryvalidate/localization/messages_es.min.js" type="text/javascript"></script>
		<script>

			$( '#form_abc' ).validate( {
				errorElement: 'span', //default input error message container
				errorClass: 'text-danger', // default input error message class
				focusInvalid: false, // do not focus the last invalid input
				onfocusout: function ( element ) {
					this.element( element );
				}, //Validate on blur
				onkeyup: function ( element ) {
					this.element( element );
				}, //Validate on keyup
				focusCleanup: true, //If enabled, removes the errorClass from the invalid elements and hides all error messages whenever the element is focused
				ignore: "",
				rules: {
					//CAMBIAR POR LAS VARIABLES QUE SEAN OBLIGATORIAS O NECESITEN VALIDACIÓN
					nombre: {
						required: true,
						minlength: 3
					},
					paterno: {
						required: true,
					},
					folio: {
						required: true,
						minlength: 3,
					},
				},

				messages: { // custom messages for radio buttons and checkboxes

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
						error.insertAfter( element.closest( '.form-group' ) );
					} else {
						error.insertAfter( element );
					}
				},

				submitHandler: function ( form ) {
					form.submit();
				}
			} );
			

		</script>
            
        </div>
		

    </div>

</body>

</html>