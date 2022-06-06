<?php 
include("includes/config.php");
//Campus
if (!isset($_POST['id_campus']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM campus");
	$d = mysqli_fetch_array($consulta);
	$_POST['id_campus'] = $d['id'];
}
//Oferta
if (!isset($_POST['id_oferta']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM oferta WHERE id_campus = '".$_POST['id_campus']."'");
	$d = mysqli_fetch_array($consulta);
	$_POST['id_oferta'] = $d['id'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Lista de alumnos sin predentar</title>

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
    <a class="scroll-up"><i class="fa fa-chevron-up"></i></a>
    <!-- End of scroll up button -->

    <!-- Main content-->
     <div class="content">
		 <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            Aspirantes
                        </div>
                        <div class="panel-body">
							<div class="row">
								<form action="aspirantes_sin_presentar" method="post">
									<div class="col-lg-6">
										<label>Campus:</label>
										<select class="form-control" name="id_campus" onChange="submit()">
											<?php
											$consulta = mysqli_query($conexion,"SELECT * FROM campus");
											while ($d = mysqli_fetch_array($consulta))
											{
												if ($_POST['id_campus'] == $d['id'])
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
									</div>
									<div class="col-lg-6">
										<label>Licenciatura:</label>
										<select class="form-control" name="id_oferta" onChange="submit()">
											<?php
											$post_oferta = 0;
											$consulta = mysqli_query($conexion,"SELECT * FROM oferta WHERE id_campus = '".$_POST['id_campus']."'");
											while ($d = mysqli_fetch_array($consulta))
											{
												if ($_POST['id_oferta'] == $d['id'])
												{
													echo '<option value="'.$d['id'].'" selected>'.$d['nombre'].'</option>';
													$post_oferta = 1;
												}
												else
												{
													echo '<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
												}
											}
											if ($post_oferta == 0)
											{
												$consulta = mysqli_query($conexion,"SELECT * FROM oferta WHERE id_campus = '".$_POST['id_campus']."' LIMIT 1");
												$d = mysqli_fetch_array($consulta);
												$_POST['id_oferta'] = $d['id'];
											}
											?>
										</select>
									</div>
								</form>
							</div>							
							<br>
							<div>
                                <table class="table table-striped table-bordered table-hover nowrap" id="tabla">
                                    <thead>
                                        <tr>
											<th data-priority="1"> Campus </th>
											<th data-priority="2"> Carrera </th>
											<th data-priority="3"> Nombre </th>
											<th> Correo </th>
											<th> Pass </th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id_campus = '".$_POST['id_campus']."' AND id_oferta = '".$_POST['id_oferta']."'");
									while ($d = mysqli_fetch_array($consulta))
									{				
										$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta WHERE id = '".$_POST['id_oferta']."'");
										$d1 = mysqli_fetch_array($consulta1);
										
										$campus = $_POST['id_campus'] == 1 ? 'Mérida' : 'Ticul';
										
										
										$consulta3 = mysqli_query($conexion,"SELECT * FROM encuesta WHERE id_aspirante = '".$d['id']."' LIMIT 1");
										if (mysqli_num_rows($consulta3) > 0 )
										{
											continue;
										}
										echo '
										<tr>
											<td>'.$campus.'</td>
											<td>'.$d1['nombre'].'</td>
											<td>'.$d['nombre'].' <small>'.$d['paterno'].' '.$d['materno'].'</small></td>
											<td>'.$d['correo'].'</td>
											<td>'.$d['pass'].'</td>
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
						"paging": false,
						"searching": true,
						"info": true,
						"fixedHeader": true,
						"autoFill": false,
						"colReorder": false,
						"fixedColumns": false,
						"responsive": true,
						"dom": 'Bfrtip',
						"pageLength": 250,
						"order": [[ 0, "asc" ]],
						//"order": [ [ $('th.defaultSort').index(),  'asc' ] ],
						"buttons": [
							{
								extend: 'excel',
								exportOptions: {
									columns: [0,1,2,3,4]
								},
								text: 'Excel <i class="fa fa-file-excel-o"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								exportOptions: {
									columns: [0,1,2,3,4]
								},
								text: 'PDF <i class="fa fa-file-pdf-o"></i>',
								messageTop: 'LISTA DE ALUMNOS SIN PRESENTAR',
								footer: true
							},
							{
								extend: 'print',
								exportOptions: {
									columns: [0,1,2,3,4]
								},
								text: 'Imprimir <i class="fa fa-print"></i>',
								messageTop: '',
								footer: true
							},
						]
					} );
				});
				
				<?php
				$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes");
				$total = mysqli_num_rows($consulta);
				
				$consulta = mysqli_query($conexion,"SELECT DISTINCT id_aspirante FROM encuesta");
				$finalizado = mysqli_num_rows($consulta);
				
				?>
				
				$('#tabla').on( 'draw.dt', function () {
					$('#tabla_info').append('. Finalizados(<?php echo $finalizado;?>). Restantes(<?php echo $total-$finalizado;?>).');
				} );
				
				
			</script>            
        </div>

    </div>

</body>

</html>