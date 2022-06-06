<?php 
include("includes/config.php");
if (!isset($_POST['id']))
{
	//Nueva 
	$titulo = 'Nuevo';
}
else if (isset($_POST['id']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM reactivos WHERE id = '".$_POST['id']."' LIMIT 1");
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
	
	<!--Summernote-->
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
	
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
                        	<form action="reactivos" method="post" id="form_abc" enctype="multipart/form-data">
								
								<div class="row">
									<div class="form-wrapper col-sm-12">
										<label>Reactivo</label>
										<div class="form-group">
											<textarea name="reactivo" class="form-control summernote" rows="4" placeholder="Reactivo" <?php echo $read;?>><?php echo $d['reactivo'];?></textarea>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-6">
										<label>Área</label>
										<div class="form-group">
											<select class="form-control" name="id_area">
											<?php
												$consulta1 = mysqli_query($conexion,"SELECT * FROM areas");
												while ($d1 = mysqli_fetch_array($consulta1))
												{
													if ($d['id_area'] == $d1['id'])
													{
														echo '<option value="'.$d1['id'].'" selected>'.$d1['nombre'].'</option>';
													}
													else
													{
														echo '<option value="'.$d1['id'].'">'.$d1['nombre'].'</option>';
													}
												}
											?>
											</select>
										</div>
									</div>
									<div class="form-wrapper col-sm-6">
										<label>Extra (Lectura)</label>
										<div class="form-group">
											<select class="form-control" name="id_extra">
												<option value="0">Ninguna</option>
											<?php
												$consulta1 = mysqli_query($conexion,"SELECT * FROM extras");
												while ($d1 = mysqli_fetch_array($consulta1))
												{
													if ($d['id_extra'] == $d1['id'])
													{
														echo '<option value="'.$d1['id'].'" selected>'.$d1['nombre'].'</option>';
													}
													else
													{
														echo '<option value="'.$d1['id'].'">'.$d1['nombre'].'</option>';
													}
												}
											?>
											</select>
										</div>
									</div>
								</div>
								
								
								<hr>
								<h3>Respuestas</h3>
								
								<?php
								$consulta1 = mysqli_query($conexion,"SELECT * FROM respuestas WHERE id_reactivo = '".$_POST['id']."' AND correcta = '1'");
								$d1 = mysqli_fetch_array($consulta1);
								?>
	
								<div class="row">
									<div class="form-wrapper col-sm-12">
										<label class="text-bold text-success">Respuesta 1 (Correcta)</label>
										<div class="form-group">
											<textarea name="respuesta1" class="form-control summernote" rows="4" placeholder="Respuesta Correcta" <?php echo $read;?>><?php echo $d1['respuesta'];?></textarea>
										</div>
									</div>
								</div>
								
								
								<?php
								$consulta1 = mysqli_query($conexion,"SELECT * FROM respuestas WHERE id_reactivo = '".$_POST['id']."' AND correcta = '0'");
								for ($c=2;$c<=4;$c++)
								{
									$d1 = mysqli_fetch_array($consulta1);
								?>
								<div class="row">
									<div class="form-wrapper col-sm-12">
										<label>Respuesta <?php echo $c;?></label>
										<div class="form-group">
											<textarea name="respuesta<?php echo $c;?>" class="form-control summernote" rows="4" placeholder="Respuesta <?php echo $c;?>" <?php echo $read;?>><?php echo $d1['respuesta'];?></textarea>
										</div>
									</div>
								</div>
								<?php
								}
								?>																	
								<div class="row">
									<div class="col-sm-8">
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
										<a href="reactivos" class="btn btn-info btn-lg btn-block">Cancelar <i class="fa fa-close"></i></a>
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
			<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
			<script src="plugins/summernote-master/dist/lang/summernote-es-ES.min.js"></script>
			<script>
				$(document).ready(function() {
					$('.summernote').summernote({
						placeholder: '',
						lang:'es-ES',
						height: 200,
						toolbar: [
							// [groupName, [list of button]]
							['style', ['bold', 'italic', 'underline', 'clear']],
							['font', ['fontsize', 'color', 'strikethrough', 'superscript', 'subscript', ]],
							['para', ['ul', 'ol', 'paragraph']],
							['height', ['height']],
							['insert', ['picture', 'table', 'hr']],
							['misc', ['undo', 'redo', 'codeview']]
						  ],
						fontSizes: ['8', '9', '10', '11', '12', '14', '16', '18', '20', '22', '24', '28', '30', '34', '38', '40', '50', '60', '80', '150']
					});
				});
			</script>
            
        </div>
		

    </div>

</body>

</html>