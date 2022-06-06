<?php 
include("includes/config.php");
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
	
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	<!--Date Picker-->
    <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange Picker -->
  	<link rel="stylesheet" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
	<!--Select2-->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		.select2-container--bootstrap .select2-selection {
    		-webkit-box-shadow: none;
    		box-shadow: none; 
			border: 1px solid #e0e6eb;
		}
	</style>
	
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
                            Reportes
                        </div>
                        <div class="panel-body">
							<div style="margin-bottom: 15px">
								<form action="reportes_2" method="post">
									<div class="row">
										<div class="col-lg-3">
											<label>Tipo de reporte</label>
											<select class="form-control select2" name="tabla">
												<option value="">Seleccionar</option>
												<option value="alumnos" <?php echo $_POST['tabla']=='alumnos'?'selected':'';?>>Alumnos</option>
												<option value="prospectos" <?php echo $_POST['tabla']=='prospectos'?'selected':'';?>>Prospectos</option>
												<option value="aspirantes" <?php echo $_POST['tabla']=='aspirantes'?'selected':'';?>>Aspirantes</option>
												<option value="completos" <?php echo $_POST['tabla']=='completos'?'selected':'';?>>Aspirantes Completos</option>
												<option value="diagnostico" <?php echo $_POST['tabla']=='diagnostico'?'selected':'';?>>Aspirantes con examen de diagnóstico</option>
												<option value="psicometrico" <?php echo $_POST['tabla']=='psicometrico'?'selected':'';?>>Aspirantes con examen psicométrico</option>
											</select>
										</div>
										<div class="col-lg-3">
											<label>Campus</label>
											<select class="form-control" name="id_campus">
												<option value="">Todos</option>
												<?php
												$consulta1 = mysqli_query($conexion, "SELECT * FROM campus");
												while ($d1 = mysqli_fetch_array($consulta1))
												{
													if ($_POST['id_campus'] == $d1['id'])
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
										<div class="col-lg-6">
											<div class="form-group">
												<label>Rango de fechas</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-calendar"></i>
													</div>
													<?php
													if (isset($_POST['fechas']))
													{
														$fecha1 = substr( $_POST[ 'fechas' ], 0, 2 ) . '/' . substr( $_POST[ 'fechas' ], 3, 2 ) . '/' . substr( $_POST[ 'fechas' ], 6, 4 );
														$fecha2 = substr( $_POST[ 'fechas' ], 13, 2 ) . '/' . substr( $_POST[ 'fechas' ], 16, 2 ) . '/' . substr( $_POST[ 'fechas' ], 19, 4 );
														echo '<input type="text" class="form-control pull-right" id="fechas"  name="fechas" readonly value="'.$fecha1.' - '.$fecha2.'">';
													}
													else
													{
														echo '<input type="text" class="form-control pull-right" id="fechas"  name="fechas" readonly>';
													}
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<button type="submit" class="btn btn-success btn-block btn-lg">Reporte <i class="fa fa-print"></i></button>
										</div>
									</div>
								</form>
							</div>
							<br>
							<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
								<thead>
									<tr>
										<th> Nombre </th>
										<th> Campus </th>
										<th> Carrera </th>
										<th> Fecha </th>
										<th> Correo </th>
										<th> Teléfono </th>
										
									</tr>
								</thead>
								<tbody>
								<?php
								
									
								$query = ' 1 ';
								if ($_POST['id_campus']!='')
								{
									$query = ' id_campus = "'.$_POST['id_campus'].'" ';
								}

								$fecha1 = $hoy;
								$fecha2 = $hoy;
								if(isset($_POST['fechas']))
								{
									$fecha1 = substr( $_POST[ 'fechas' ], 6, 4 ) . '-' . substr( $_POST[ 'fechas' ], 3, 2 ) . '-' . substr( $_POST[ 'fechas' ], 0, 2 );

									$fecha2 = substr( $_POST[ 'fechas' ], 19, 4 ) . '-' . substr( $_POST[ 'fechas' ], 16, 2 ) . '-' . substr( $_POST[ 'fechas' ], 13, 2 );
								}
									
								switch ($_POST['tabla'])
								{
									case 'alumnos':
									case 'aspirantes':
									{
										$query2 = " fecha_registro >= '".$fecha1."' AND fecha_registro <= '".$fecha2."'";
										$consulta = mysqli_query($conexion,	"SELECT * FROM ".$_POST['tabla']." WHERE id_campus = '".$_POST['id_campus']."' ORDER BY fecha_registro");
										break;
									}		
									case 'prospectos':
									{
										$query2 = " fecha >= '".$fecha1."' AND fecha <= '".$fecha2."'";
										$consulta = mysqli_query($conexion,	"SELECT * FROM ".$_POST['tabla']." WHERE id_campus = '".$_POST['id_campus']."' ORDER BY fecha");
									break;
									}
								}
								while ($d = mysqli_fetch_array($consulta))
								{	
									$consulta1 = mysqli_query($conexion,"SELECT * FROM campus WHERE id = '".$d['id_campus']."'");
									$d1 = mysqli_fetch_array($consulta1);
									
									$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
									$d2 = mysqli_fetch_array($consulta1);
									
									
									
									echo '
									<tr>
										<td>'.$d['nombre'].' '.$d['paterno'].' '.$d['materno'].'</td>
										<td>'.$d1['nombre'].'</td>
										<td>'.$d2['nombre'].'</td>
										<td data-sort="'.substr($d['fecha_registro'],0,4).substr($d['fecha_registro'],5,2).substr($d['fecha_registro'],8,2).'">'.FechaCorta($d['fecha_registro']).'</td>
										<td>'.$d['correo'].'</td>
										<td>'.$d['telefono'].'</td>
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
		<!-- DataTables -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
		<!-- Date-range-picker -->
		<script src="plugins/moment/min/moment.min.js"></script>
		<script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <!-- scripts -->
        <script src="addons/scripts.js"></script>
		<!--Select2-->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<!-- Libreria español -->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/es.js"></script>

		 <!-- Current page scripts -->
        <div class="current-scripts">
			<script>
				$( ".select2" ).select2( { 
					placeholder:"Seleccionar",
					language: "es",
					theme: "bootstrap"
				});
				
				
				$('#fechas').daterangepicker({
					"locale": {
						"format": "DD/MM/YYYY",
						"separator": " - ",
						"applyLabel": "Seleccionar",
						"cancelLabel": "Cancelar",
						"fromLabel": "De",
						"toLabel": "Al",
						"customRangeLabel": "Custom",
						"daysOfWeek": [
							"Do",
							"Lu",
							"Ma",
							"Mi",
							"Ju",
							"Vi",
							"Sa"
						],
						"monthNames": [
							"Enero",
							"Febrero",
							"Marzo",
							"Abril",
							"Mayo",
							"Junio",
							"Julio",
							"Agosto",
							"Septiembre",
							"Octubre",
							"Noviembre",
							"Diciembre"
						],
						"firstDay": 1
					}
				});
				
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
								text: 'Excel <i class="fal fa-file-excel"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								text: 'PDF <i class="fal fa-file-pdf"></i>',
								messageTop: 'LISTA',
								footer: true
							},
							{
								extend: 'print',
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