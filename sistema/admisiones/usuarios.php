<?php 
include("includes/config.php");
if (isset($_POST['alta']))
{
	mysqli_query($conexion,"ALTER TABLE usuarios AUTO_INCREMENT = 0");
	mysqli_query($conexion, "INSERT INTO usuarios VALUES (
	'0', 
	'" . $_SESSION[ 'campus' ] . "',
	'1',
	'0',
	'" . $_POST[ 'correo' ]  . "',
	'" . $_POST[ 'pass' ]  . "',
	'" . $_POST[ 'nombre' ]  . "',
	'" . $_POST[ 'nivel' ] . "',
	'',
	''
	)" );
}
if (isset($_POST['editar']))
{
	mysqli_query($conexion,"UPDATE usuarios SET 
		correo = '".$_POST['correo']."',
		pass = '".$_POST['pass']."',
		nombre = '".$_POST['nombre']."',
		nivel = '".$_POST['nivel']."'
		WHERE id = '".$_POST['editar']."' LIMIT 1");
}
if (isset($_POST['eliminar']))
{
	mysqli_query($conexion,"DELETE FROM usuarios WHERE id = '".$_POST['eliminar']."' LIMIT 1");
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
                            Usuarios
                        </div>
                        <div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="usuarios_abc.php" method="post">
										<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i> Nuevo Usuario </button>
									</form>
								</div>
							</div>
							<br>
							<br>							

                            <div>
                                <table class="table table-striped table-bordered table-hover" id="tabla">
                                    <thead>
                                        <tr>
											<th> Campus </th>
											<th width="40%"> Nombre </th>
											<th> Correo </th>
											<th> Contrase??a </th>
											<th> Nivel </th>
											<th> <i class="fa fa-pencil"></i> </th>
											<th> <i class="fa fa-trash"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										
										$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id_area = '1' AND nivel < 99 AND id_campus = '".$_SESSION['campus']."'");
										
										while ($d = mysqli_fetch_array($consulta))
										{
											$consulta_campus = mysqli_query($conexion,"SELECT * FROM campus WHERE id = '".$d['id_campus']."' ");
											$campus = mysqli_fetch_array($consulta_campus);
											if ($d['nivel']==1)
											{
												$nivel = "Administrador";
											}
											else if ($d['nivel']==2)
											{
												$nivel = "Asesor";
											}
											echo '
											<tr class="odd">
												<td>'.$campus['nombre'].'</td>
												<td>'.$d['nombre'].'</td>
												<td>'.$d['correo'].'</td>
												<td>'.md5($d['pass']).'</td>
												<td>'.$nivel.'</td>
												<td>
													<form action="usuarios_abc" method="post">
														<input type="hidden" name="editar" value="1">
														<input type="hidden" name="id" value="'.$d['id'].'">
														<button type="submit" class="btn btn-md btn-success btn-block"><i class="fas fa-pencil"></i> Editar</button>
													</form>
												</td>
												<td> 
													<form action="usuarios_abc" method="post">
														<input type="hidden" name="eliminar" value="1">
														<input type="hidden" name="id" value="'.$d['id'].'">
														<button type="submit" class="btn btn-md btn-danger btn-block"><i class="fas fa-trash"></i> Eliminar</button>
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
		<!-- DataTables -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
        <!-- scripts -->
        <script src="addons/scripts.js"></script>
		<!--Datepicker-->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
		
		<!-- Current page scripts -->
        <div class="current-scripts">
			<script>
				$(document).ready(function(){	
					$('#tabla').DataTable( {
					   "language": { url:"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
						"ordering": true,
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