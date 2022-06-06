<?php 
include("includes/config.php");
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
                            Reportes de aspirantes en alerta
                        </div>
                        <div class="panel-body">
							<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="tabla">
                                    <thead>
                                        <tr>
											<th width="40%"> Nombre </th>
											<th> Factor </th>
											<th> Semáforo </th>
											<th> <i class="fa fa-print"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										//Resultado
										$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes_medico_cirujano ORDER BY id");
										while ($d = mysqli_fetch_array($consulta))
										{
											$consulta1 = mysqli_query($conexion,"SELECT * FROM factores ORDER BY id");
											while ($d1 = mysqli_fetch_array($consulta1))
											{
												$resultado = 0;
												$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS resultado FROM encuesta WHERE id_factor = '".$d1['id']."' AND id_aspirante = '".$d['id']."'");
												$d2 = mysqli_fetch_array($consulta2);
												$resultado = $d2['resultado'];

												//Evaluar si hay algún reactivo de peligro en la encuesta
												$consulta2 = mysqli_query($conexion,"SELECT * FROM reactivos WHERE id_factor = '".$d1['id']."' AND peligro = '1'");
												while ($d2 = mysqli_fetch_array($consulta2))
												{
													$consulta3 = mysqli_query($conexion,"SELECT * FROM encuesta WHERE id_reactivo = '".$d2['id']."' AND respuesta = '0'");
													if (mysqli_num_rows($consulta3)>0)
													{
														//PELIGRO
														$resultado = 0;
													}
												}
												
												//Dimensión
												$consulta4 = mysqli_query($conexion,"SELECT * FROM dimensiones WHERE id = '".$d1['id_dimension']."' LIMIT 1");
												$d4 = mysqli_fetch_array($consulta4);
												
												if ($resultado <= 2)
												{
													echo '
													<tr>
														<td>'.$d['nombre'].' '.$d['paterno'].' '.$d['materno'].'</td>
														<td>'.$d1['nombre'].'</td>
														<td align="center">
															<img src="../assets/img/semaforo/rojo.png">
														</td>
														<td>
															<form action="aspirantes_imprimir" method="post" target="_blank">
																<input type="hidden" name="id" value="'.$d['id'].'">
																<button type="submit" class="btn btn-md btn-primary btn-block"><i class="fa fa-print"></i> Imprimir</button>
															</form>
														</td>
													</tr>
												';	
												}
											}
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
			<!--Datepicker-->
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
						dom: 'Bfrtip',
						buttons: [
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
								messageTop: 'LISTA DE ASPIRANTES EN ALERTA',
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
				
			</script>            
        </div>

    </div>

</body>

</html>