<?php 
include("includes/config.php");
if (!isset($_POST['id']))
{
	//Nueva 
	$titulo = 'Nuevo';
}
else if (isset($_POST['id']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM dimensiones WHERE id = '".$_POST['id']."' LIMIT 1");
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
                        	<form action="dimensiones" method="post" id="form_abc">
								<div class="row">
									<div class="form-wrapper col-sm-8">
										<label>Nombre</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>" <?php echo $read;?>>
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<label>Tipo</label>
										<div class="form-group">
											<select class="form-control" name="id_tipo" id="id_tipo" <?php echo $disabled;?>>
												<option value="">Seleccionar</option>
												<?php 
												$consulta_tipo = mysqli_query($conexion,"SELECT * FROM dimensiones_tipo");
												while ($tipo = mysqli_fetch_array($consulta_tipo))
												{
													if ($d['id_tipo'] == $tipo['id'])
													{
														echo '<option value="'.$tipo['id'].'" selected>'.$tipo['nombre'].'</option>';
													}
													else {
														echo '<option value="'.$tipo['id'].'">'.$tipo['nombre'].'</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-sm-12">
										<label>Recomendaciones</label>
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Verde</label>
										<div class="form-group has-success has-feedback">
											<textarea name="verde" class="form-control" rows="5" placeholder="Recomendación semáforo verde"  <?php echo $read;?>><?php echo $d['verde'];?></textarea>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Amarillo</label>
										<div class="form-group has-warning has-feedback">
											<textarea name="amarillo" class="form-control" rows="5" placeholder="Recomendación semáforo amarillo"  <?php echo $read;?>><?php echo $d['amarillo'];?></textarea>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Rojo</label>
										<div class="form-group has-error has-feedback">
											<textarea name="rojo" class="form-control" rows="5" placeholder="Recomendación semáforo rojo"  <?php echo $read;?>><?php echo $d['rojo'];?></textarea>
										</div>
									</div>
								</div>
																
								<div class="row">
									<div class="col-sm-8">
										<?php
										if ($_POST['editar'] == 1)
										{
											echo '
											<input type="hidden" name="editar" value="'.$d['id'].'">
											<button type="submit" class="btn btn-success btn-lg btn-block" id="boton">Guardar <i class="fa fa-save"></i></button>
											';
										}
										else if ($_POST['eliminar'] == 1)
										{
											echo '
											<input type="hidden" name="eliminar" value="'.$d['id'].'">
											<button type="submit" class="btn btn-danger btn-lg btn-block" id="boton">Eliminar <i class="fa fa-trash"></i></button>
											';
										}
										else
										{
											echo '
											<input type="hidden" name="alta" value="1">
											<button type="submit" class="btn btn-success btn-lg btn-block" id="boton">Guardar <i class="fa fa-save"></i></button>
											';
										}
										?>
									</div>
									<div class="col-sm-4">
										<a href="dimensiones" class="btn btn-info btn-lg btn-block">Cancelar <i class="fa fa-close"></i></a>
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
					},	
					id_tipo: {
						required: true,
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
					$('#boton').prop('disabled',true);
					form.submit();
				}
			} );

			$('#nombre').keypress(function(event) {
				if (event.which == 13) {
					event.preventDefault();
				}
			});
		</script>
            
        </div>
		

    </div>

</body>

</html>