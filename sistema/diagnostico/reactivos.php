<?php 
include("includes/config.php");

if (isset($_POST['alta']))
{
	mysqli_query($conexion,"ALTER TABLE reactivos AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO reactivos VALUES (
	'0', 
	'" . $_POST[ 'id_area' ]  . "',
	'" . $_POST[ 'id_extra' ]  . "',
	'" . $_POST[ 'reactivo' ] . "'
	)" );
	$id = mysqli_insert_id($conexion);
	
	//Primera respuesta (Correcta)
	mysqli_query($conexion,"ALTER TABLE respuestas AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO respuestas VALUES (
	'0', 
	'" . $id  . "',
	'" . $_POST[ 'respuesta1' ] . "',
	'1'
	)" );
	
	//Segunda respuesta
	mysqli_query($conexion,"ALTER TABLE respuestas AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO respuestas VALUES (
	'0', 
	'" . $id  . "',
	'" . $_POST[ 'respuesta2' ] . "',
	'0'
	)" );
	
	//Tercera respuesta
	mysqli_query($conexion,"ALTER TABLE respuestas AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO respuestas VALUES (
	'0', 
	'" . $id  . "',
	'" . $_POST[ 'respuesta3' ] . "',
	'0'
	)" );
	
	//Cuarta respuesta
	mysqli_query($conexion,"ALTER TABLE respuestas AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO respuestas VALUES (
	'0', 
	'" . $id  . "',
	'" . $_POST[ 'respuesta4' ] . "',
	'0'
	)" );
	
}
if (isset($_POST['editar']))
{
	mysqli_query($conexion,"UPDATE reactivos SET 
		id_area = '" . $_POST[ 'id_area' ] . "',
		reactivo = '" . $_POST[ 'reactivo' ] . "',
		id_extra = '" . $_POST[ 'id_extra' ] . "'
		WHERE id = '".$_POST['editar']."' LIMIT 1");
	
	$c=1;
	$consulta = mysqli_query($conexion,"SELECT * FROM respuestas WHERE id_reactivo = '".$_POST['editar']."'");
	while ($d = mysqli_fetch_array($consulta))
	{
		if ($d['correcta'] == 1)
		{
			mysqli_query($conexion,"UPDATE respuestas SET respuesta = '".$_POST[ 'respuesta1' ]."' WHERE id = '".$d['id']."'");
		}
		else
		{
			$c++;
			mysqli_query($conexion,"UPDATE respuestas SET respuesta = '".$_POST[ 'respuesta'.$c ]."' WHERE id = '".$d['id']."'");
		}
	}
	
}
if (isset($_POST['eliminar']))
{
	mysqli_query($conexion,"DELETE FROM reactivos WHERE id = '".$_POST['eliminar']."' LIMIT 1");
	mysqli_query($conexion,"DELETE FROM respuestas WHERE id_reactivo = '".$_POST['eliminar']."' LIMIT 1");
}

if (!isset($_POST['id_area']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM areas");
	$d = mysqli_fetch_array($consulta);
	$_POST['id_area'] = $d['id'];
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
	
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	
	
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
                            Reactivos
                        </div>
                        <div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="reactivos" method="post">
										<label>Área:</label>
										<select class="form-control" name="id_area" onChange="submit()">
											<?php
											$consulta = mysqli_query($conexion,"SELECT * FROM areas");
											while ($d = mysqli_fetch_array($consulta))
											{
												if ($_POST['id_area'] == $d['id'])
												{
													echo '<option value="'.$d['id'].'" selected>'.$d['nombre'].'</option>';
												}
												else
												{
													echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
												}
											}
											?>
										</select>
									</form>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-12">
									<form action="reactivos_abc" method="post">
										<input type="hidden" name="id_area" value="<?php echo $_POST[ 'id_area' ];?>">
										<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i> Nuevo </button>
									</form>
								</div>
							</div>							
							<br>
                            <div>
                                <table class="table table-striped table-bordered table-hover" id="tabla">
                                    <thead>
                                        <tr>
											<th width="30%"> Reactivo </th>
											<th> <i class="fa fa-pencil"></i> </th>
											<th> <i class="fa fa-trash"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$consulta = mysqli_query($conexion,"SELECT * FROM reactivos WHERE id_area = '".$_POST['id_area']."'");
										while ($d = mysqli_fetch_array($consulta))
										{
											echo '
											<tr class="odd">
												<td>'.$d['reactivo'].'</td>
												<td>
													<form action="reactivos_abc" method="post">
														<input type="hidden" name="id_area" value="'.$_POST[ 'id_area' ].'">
														<input type="hidden" name="editar" value="1">
														<input type="hidden" name="id" value="'.$d['id'].'">
														<button type="submit" class="btn btn-md btn-success btn-block"><i class="fa fa-pencil"></i> Editar</button>
													</form>
												</td>
												<td> 
													<form action="reactivos_abc" method="post">
														<input type="hidden" name="id_area" value="'.$_POST[ 'id_area' ].'">
														<input type="hidden" name="eliminar" value="1">
														<input type="hidden" name="id" value="'.$d['id'].'">
														<button type="submit" class="btn btn-md btn-danger btn-block"><i class="fa fa-trash"></i> Eliminar</button>
													</form>
												</td>
											</tr>';
										}
										?>
                                    </tbody>
                                </table>
                            </div>
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
			<!-- DataTables -->
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			<!--Datepicker-->
			<script>
				$(document).ready(function(){	
					$('#tabla').DataTable( {
					   "language": { url:"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
						"ordering": false,
						"paging": true,
						"searching": true,
						"info": true,
						"fixedHeader": true,
						"autoFill": false,
						"colReorder": false,
						"fixedColumns": false,
						"responsive": true,
					} );
				});
				
			</script>            
        </div>

    </div>

</body>

</html>