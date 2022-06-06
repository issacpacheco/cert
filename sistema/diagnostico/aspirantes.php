<?php 
include("includes/config.php");
$conexion2 = mysqli_connect("localhost","root","fabricandomarcas","cert");
mysqli_query($conexion2,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
if (isset($_POST['eliminar']))
{
	mysqli_query($conexion,"DELETE FROM aspirantes WHERE id = '".$_POST['eliminar']."' LIMIT 1");
	mysqli_query($conexion,"DELETE FROM examen WHERE id_aspirante = '".$_POST['eliminar']."'");
}
if (isset($_POST['eliminar_examen']))
{
	mysqli_query($conexion,"DELETE FROM examen WHERE id_aspirante = '".$_POST['id']."'");
	mysqli_query($conexion2,"UPDATE aspirantes_validacion SET presentado_d = '0' WHERE id_aspirante = '".$_POST['id']."'");
}
if (isset($_POST['validar']))
{
	mysqli_query($conexion2,"UPDATE aspirantes_validacion SET resultado = '1' WHERE id_aspirante = '".$_POST['id']."'");
	
	$consulta = mysqli_query($conexion2,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."'");
	$d = mysqli_fetch_array($consulta);
	//Enviar correo
	$correo=$d['correo'];
	$nombre=$d['nombre'];
	$asunto="¡Felicidades!";
	mandar_correo_validacion2($correo,$nombre,$asunto);
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
							<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
								<thead>
									<tr>
										<th data-priority="1"> Campus </th>
										<th data-priority="2"> Nombre</th>
										<th data-priority="3"> Oferta educativa</th>
										<th data-priority="4"> Correo </th>
										<th> Pass </th>
										<th> Teléfono </th>
										<th> Fecha de examen</th>
										<th data-priority="7"> <i class="fa fa-trash"></i> </th>
									</tr>
								</thead>
								<tbody>
								<?php
								$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes ORDER BY nombre");
								while ($d = mysqli_fetch_array($consulta))
								{
									//Aspirantes en ofertas educativas que no presentan examen de diangóstico
									if ($d['id_oferta']==22 || $d['id_oferta']=='3' || $d['id_oferta']=='4' || $d['id_oferta']=='19')
									{
										continue;
									}
									
									$consulta1 = mysqli_query($conexion2,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
									$d1 = mysqli_fetch_array($consulta1);
									
									$campus = $d['id_campus'] == '1'?'Mérida':'Ticul';
									$consulta3 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_aspirante = '".$d['id']."' AND finalizado = '1' LIMIT 1");
									$class = mysqli_num_rows($consulta3) > 0 ? 'success' : '';
																		
									$consulta2 = mysqli_query($conexion2,"SELECT * FROM aspirantes_validacion WHERE id_aspirante = '".$d['id']."' AND presentado_d = '0'");
									if (mysqli_num_rows($consulta2)==0)
									{
										continue;
									}
									$d2 = mysqli_fetch_array($consulta2);
									$fecha = $d2['fecha_examen_d']=='0000-00-00'?'Sin fecha':Fecha($d2['fecha_examen_d']);
									

									echo '
									<tr class="'.$class.'">
										<td>'.$campus.'</td>
										<td>'.$d['nombre'].' '.$d['paterno'].' '.$d['materno'].'</td>
										<td>'.$d1['nombre'].'</td>
										<td>'.$d['correo'].'</td>
										<td>'.$d['pass'].'</td>	
										<td>'.$d['telefono'].'</td>
										<td>'.$fecha.'</td>
										<td>
											<form action="aspirantes_abc" method="post">
												<input type="hidden" name="eliminar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-danger btn-block" data-toggle="tooltip" data-placement="top" title="Eliminar aspirante"><i class="fa fa-trash"></i> Eliminar</button>
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
				$('[data-toggle="tooltip"]').tooltip()
				function Confirmar() {
					
					Swal.fire({
						title: 'ATENCIÓN',
						icon: 'info',
						width: 500,
						html:
							'<h4>¿Esta seguro que deseas eliminar el <strong>EXAMEN</strong> de este aspirante?</h4>',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: '<i class="fa fa-thumbs-up"></i> Sí, estoy seguro',
						cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar',
						}).then((result) => {
						if (result.isConfirmed) {
							//Acept
							$( "#eliminar_examen" ).submit();
						}
					});
				}
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
									columns: [0,1,2,3]
								},
								text: 'Excel <i class="fa fa-file-excel-o"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								exportOptions: {
									columns: [0,1,2,3]
								},
								text: 'PDF <i class="fa fa-file-pdf-o"></i>',
								messageTop: 'LISTA',
								footer: true
							},
							{
								extend: 'print',
								exportOptions: {
									columns: [0,1,2,3]
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
				
				$consulta = mysqli_query($conexion,"SELECT DISTINCT id_aspirante FROM examen");
				$finalizado = mysqli_num_rows($consulta);
				
				?>
				
				$('#tabla').on( 'draw.dt', function () {
					$('#tabla_info').append('. Finalizados(<?php echo $finalizado;?>). Restantes(<?php echo $total-$finalizado;?>).');
				} );
				
				<?php
				if ($_POST['validar']==1)
				{
					?>
					Swal.fire({
						icon: 'success',
					 	title: 'Validación realizada correctamente',
						html: '<h5>Se validó el aspirante para su inscripción</h5>',
						showConfirmButton: true,
  						timer: 4500
					})
					<?php
				}
				?>
			</script>            
        </div>

    </div>

</body>

</html>