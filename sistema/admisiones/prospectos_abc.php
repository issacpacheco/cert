<?php 
include("includes/config.php");
if ($_SESSION['nivel']==2)
{
	$_POST['campus'] = $_SESSION['campus'];
}
if (!isset($_POST['id']))
{
	//Nueva 
	$titulo = 'Nuevo';
}
else if (isset($_POST['id']))
{
	$consulta = mysqli_query($conexion,"SELECT p.*, m.nombre as nombremedio FROM prospectos p LEFT JOIN medios m ON m.id = p.medio WHERE p.id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	if ($d['fecha_nac'] != '0000-00-00')
	{
		$d['fecha_nac'] = substr($d['fecha_nac'],8,2).'/'.substr($d['fecha_nac'],5,2).'/'.substr($d['fecha_nac'],0,4);
	}
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
    <title><?php echo $title;?></title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height">
    <link rel="shortcut icon" href="images/favicon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/>
    
    <!-- Styling -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
    <link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/<?php echo $theme;?>" class="theme" />
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
    <a class="scroll-up"><i class="fas fa-chevron-up"></i></a>
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
							<form action="prospectos" method="post" id="form_abc" enctype="multipart/form-data">
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Nombre</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>" <?php echo $read;?>>
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<div class="form-group">
											<label>Oferta educativa</label>
											<select name="id_oferta" class="form-control" id="id_oferta">
												<?php 
												$consulta1 = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id >= 5");
												while ($d1 = mysqli_fetch_array($consulta1))
												{
													$consulta2 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id_campus = '".$_SESSION['campus']."' AND id_nivel = '".$d1['id']."'");	
													if (mysqli_num_rows($consulta2)==0)
													{
														continue;
													}
													echo '<optgroup label="'.$d1['nombre'].'">';
													while ($d2 = mysqli_fetch_array($consulta2))
													{
														if ($d['id_oferta']==$d2['id'])
														{
															echo '<option value="'.$d2['id'].'" selected>'.$d2['nombre'].'</option>';
														}
														else 
														{
															echo '<option value="'.$d2['id'].'">'.$d2['nombre'].'</option>';
														}
													}
													echo '</optgroup>';
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<label>Institución de procedencia</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="institucion" placeholder="Institución de procedencia" value="<?php echo $d['institucion'];?>" <?php echo $read;?>>
										</div>
									</div>
								</div>
								
							
								<div class="row">		
									<div class="form-wrapper col-sm-4">
										<label>Horario de contacto</label>
										<div class="form-group">
											<select name="horario" class="form-control" id="horario">
												<?php
												$sel1 = $d['horario']=='Mañana'?'selected':'';
												$sel2 = $d['horario']=='Tarde'?'selected':'';
												$sel3 = $d['horario']=='Indistinto'?'selected':'';
												?>
												<option value="Mañana" <?php echo $sel1;?> >Mañana</option>
												<option value="Tarde" <?php echo $sel2;?>>Tarde</option>
												<option value="Indistinto" <?php echo $sel3;?>>Indistinto</option>
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
										<label>Teléfono</label>
										<div class="form-group ">
											<input type="tel" class="form-control" name="telefono" placeholder="Teléfono" value="<?php echo $d['telefono'];?>" <?php echo $read;?>>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>¿Cómo te enteraste de nosotros?</label>
										<select name="medio" class="form-control" id="medio">
											<option value="">Seleccionar</option>
											<?php
												$consulta_cat = mysqli_query($conexion,"SELECT * FROM medios");
												while ($cat = mysqli_fetch_array($consulta_cat))
												{
													echo $d['medio'] == $cat['id']?'<option value="'.$cat['id'].'" selected>'.$cat['nombre'].'</option>':'<option value="'.$cat['id'].'">'.$cat['nombre'].'</option>';
												}
											?>
										</select>
									</div>
								</div>
								
								
								<div class="row">
                                    <div class="form-wrapper col-lg-12">
                                        <label>Comentarios</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="comentarios" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3>Historial de comentarios</h3>
                                <?php
                                $consulta1 = mysqli_query($conexion,"SELECT * FROM comentarios WHERE id_prospecto = '".$d['id']."' ORDER BY id DESC");
                                while ($d1 = mysqli_fetch_array($consulta1))
                                {
                                    $consulta2 = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id = '".$d1['id_asesor']."'");
                                    $d2 = mysqli_fetch_array($consulta2);
                                ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="well">
                                                <p><strong>Fecha: <?php echo FechaFormato($d1['fecha']).' '.$d1['hora'];?></strong></p>
                                                <p><?php echo nl2br($d1['comentarios']);?></p>
                                                <br>
                                                <p class="text-info"><?php echo $d2['nombre'];?></p>
                                                <a href="prospectos?eliminar_comentario=<?php echo md5($d1['id']);?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
								?>
								<br>												
								<div class="row">
									<div class="col-sm-8">
										<?php
										if ($_POST['editar'] == 1)
										{
											echo '
											<input type="hidden" name="editar" value="'.$d['id'].'">
											<input type="hidden" name="id" value="'.$d['id'].'">
											<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fas fa-save"></i></button>
											';
										}
										else if ($_POST['eliminar'] == 1)
										{
											echo '
											<input type="hidden" name="eliminar" value="'.$d['id'].'">
											<input type="hidden" name="id" value="'.$d['id'].'">
											<button type="submit" class="btn btn-danger btn-lg btn-block">Eliminar <i class="fas fa-trash"></i></button>
											';
										}
										else
										{
											echo '
											<input type="hidden" name="alta" value="1">
											<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fas fa-save"></i></button>
											';
										}
										?>
									</div>
									<div class="col-sm-4">
										<a href="prospectos" class="btn btn-default btn-lg btn-block">Cancelar <i class="fas fa-times"></i></a>
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
		<script src="plugins/input-mask/jquery.inputmask.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- Validate -->
		<script src="addons/jqueryvalidate/jquery.validate.js"></script>
		<script src="addons/jqueryvalidate/localization/messages_es.min.js" type="text/javascript"></script>
		<script>
			$('#telefono').inputmask('9999999999', { placeholder: '' });
			$( document ).ready(function() {
				$('#nombre').focus();
			});

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
					telefono: {
						required: true,
						minlength:10,
						maxlength:10,
					},
					correo: {
						/*required: true,*/
						minlength: 3,
						email: true
					},
					id_campus: {
						required: true,
					},
					id_oferta: {
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
					error.insertAfter( element );
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