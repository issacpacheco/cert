<?php 
include("includes/config.php");
error_reporting(E_ALL);
if (isset($_POST['editar']))
{
	
	mysqli_query($conexion,"UPDATE prospectos_eventos SET
		oferta = '".mysqli_real_escape_string($conexion,$_POST['oferta'])."',
		nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		telefono = '".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		institucion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."'
		WHERE id = '".$_POST['id']."'");
	$id = $_POST['id'];
}
if (isset($_POST['eliminar']))
{
	mysqli_query($conexion,"DELETE FROM prospectos_eventos WHERE id = '".$_POST['id']."' LIMIT 1");
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
	
	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	
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
                            OPEN HOUSE
                        </div>
                        <div class="panel-body">
							<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
								<thead>
									<tr>
										<th data-priority="1"> Nombre </th>
										<th data-priority="2"> Licenciatura </th>
										<th data-priority="3"> Fecha </th>
										<th data-priority="4"> Correo </th>
										<th data-priority="5"> Teléfono </th>
										<th> Institución de procedencia </th>
										<th><i class="fas fa-search"></i> Ver</button></th>
										<?php 
										if ($_SESSION['nivel']==1)
										{
											echo '
											<th> <i class="fas fa-trash"></i> </th>';
										}
										?>
										
									</tr>
								</thead>
								<tbody>
								<?php
								$consulta = mysqli_query($conexion,"SELECT * FROM prospectos_eventos ORDER BY fecha_registro DESC");
								while ($d = mysqli_fetch_array($consulta))
								{	
									if ($_SESSION['nivel'] == 1)
									{
										$opc = '
										<td> 
											<form action="prospectos_eventos_abc" method="post">
												<input type="hidden" name="eliminar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-danger btn-block"><i class="fas fa-trash"></i> Eliminar</button>
											</form>
										</td>';
									}

									echo '
										<tr class="'.$class.'">
											<td>'.$d['nombre'].'</td>
											<td>'.$d['oferta'].'</td>
											<td data-sort="'.substr($d['fecha_registro'],0,4).substr($d['fecha_registro'],5,2).substr($d['fecha_registro'],8,2).'">'.FechaCorta($d['fecha_registro']).'</td>
											<td>'.$d['correo'].'</td>
											<td>'.$d['telefono'].'</td>
											<td>'.$d['institucion'].'</td>
											<td> 
												<form action="prospectos_eventos_abc" method="post">
													<input type="hidden" name="editar" value="1">
													<input type="hidden" name="id" value="'.$d['id'].'">
													<button type="submit" class="btn btn-md btn-info btn-block"><i class="fas fa-search"></i> Ver</button>
												</form>
											</td>
											'.$opc.'											
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
        <script src="addons/scripts.js"></script>
		
		<!-- Current page scripts -->
        <div class="current-scripts">
			<!-- DataTables -->
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
			<!--SweetAlert-->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
						"dom": 'Bfrtip',
						"pageLength": 50,
						"order": [[ 2, "desc" ]],
						"buttons": [
							{
								extend: 'excel',
								exportOptions: {
									columns: [0,1,2,3,4,5]
								},
								text: 'Excel <i class="fal fa-file-excel"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								exportOptions: {
									columns: [0,1,2,3,4,5]
								},
								text: 'PDF <i class="fal fa-file-pdf"></i>',
								messageTop: 'Prospectos',
								footer: true
							},
							{
								extend: 'print',
								exportOptions: {
									columns: [0,1,2,3,4,5]
								},
								text: 'Imprimir <i class="fal fa-print"></i>',
								messageTop: '',
								footer: true
							},
						]
					} );
				});
				
			</script>            
        </div>

    </div>

</body>

</html>