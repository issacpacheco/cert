<?php 
include("includes/config.php");
if (isset($_POST['editar']))
{
	
	$_POST['fecha_nac'] = substr($_POST['fecha_nac'],6,4).'-'.substr($_POST['fecha_nac'],3,2).'-'.substr($_POST['fecha_nac'],0,2);
	if (mysqli_query($conexion,"UPDATE alumnos SET
		matricula = '".mysqli_real_escape_string($conexion,$_POST['matricula'])."',
		nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		paterno = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['paterno']),'UTF-8')."',
		materno = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['materno']),'UTF-8')."',
		fecha_nac = '".mysqli_real_escape_string($conexion,$_POST['fecha_nac'])."',
		genero = '".mysqli_real_escape_string($conexion,$_POST['genero'])."',
		estado_civil = '".mysqli_real_escape_string($conexion,$_POST['estado_civil'])."',
		correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		pass = '".mysqli_real_escape_string($conexion,$_POST['pass'])."',
		correo_institucional = '".mysqli_real_escape_string($conexion,$_POST['correo_institucional'])."',
		pass_institucional = '".mysqli_real_escape_string($conexion,$_POST['pass_institucional'])."',
		telefono = '".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		direccion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['direccion']),'UTF-8')."',
		curp = '".mysqli_real_escape_string($conexion,$_POST['curp'])."',
		emergencia_nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['emergencia_nombre']),'UTF-8')."',
		emergencia_telefono = '".mysqli_real_escape_string($conexion,$_POST['emergencia_telefono'])."',
		institucion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		lugar_trabajo = '".mysqli_real_escape_string($conexion,$_POST['lugar_trabajo'])."'
		WHERE id = '".mysqli_real_escape_string($conexion,$_POST['editar'])."'"))
	{
		$id = $_POST['editar'];
		//Licenciaturas
		if ($_FILES['file_ine']['tmp_name'] != '')
		{
			copy($_FILES['file_ine']['tmp_name'],'../archivos/alumnos/'.$id.'/ine.pdf');
		}

		if ($_FILES['file_curp']['tmp_name'] != '')
		{
			copy($_FILES['file_curp']['tmp_name'],'../archivos/alumnos/'.$id.'/curp.pdf');
		}

		if ($_FILES['file_certificado']['tmp_name'] != '')
		{
			copy($_FILES['file_certificado']['tmp_name'],'../archivos/alumnos/'.$id.'/certificado.pdf');
		}

		if ($_FILES['file_constancia']['tmp_name'] != '')
		{
			copy($_FILES['file_constancia']['tmp_name'],'../archivos/alumnos/'.$id.'/constancia.pdf');
		}

		if ($_FILES['file_recibo']['tmp_name'] != '')
		{
			copy($_FILES['file_recibo']['tmp_name'],'../archivos/alumnos/'.$id.'/recibo.pdf');	
		}

		if ($_FILES['file_identificacion']['tmp_name'] != '')
		{
			copy($_FILES['file_identificacion']['tmp_name'],'../archivos/alumnos/'.$id.'/identificacion.pdf');	
		}

		if ($_FILES['file_pase']['tmp_name'] != '')
		{
			copy($_FILES['file_pase']['tmp_name'],'../archivos/alumnos/'.$id.'/pase.pdf');
		}

		//Posgrados
		if ($_FILES['file_titulo']['tmp_name'] != '')
		{
			copy($_FILES['file_titulo']['tmp_name'],'../archivos/alumnos/'.$id.'/titulo.pdf');	
		}

		if ($_FILES['file_certificado_lic']['tmp_name'] != '')
		{
			copy($_FILES['file_certificado_lic']['tmp_name'],'../archivos/alumnos/'.$id.'/certificado_lic.pdf');
		}

		if ($_FILES['file_cedula']['tmp_name'] != '')
		{
			copy($_FILES['file_cedula']['tmp_name'],'../archivos/alumnos/'.$id.'/cedula.pdf');
		}

		//DOCTORADO
		if ($_FILES['file_titulo_maestria']['tmp_name'] != '')
		{
			copy($_FILES['file_titulo_maestria']['tmp_name'],'../archivos/alumnos/'.$id.'/titulo_maestria.pdf');	
		}

		if ($_FILES['file_certificado_maestria']['tmp_name'] != '')
		{
			copy($_FILES['file_certificado_maestria']['tmp_name'],'../archivos/alumnos/'.$id.'/certificado_maestria.pdf');
		}

		if ($_FILES['file_cedula_maestria']['tmp_name'] != '')
		{
			copy($_FILES['file_cedula_maestria']['tmp_name'],'../archivos/alumnos/'.$id.'/cedula_maestria.pdf');
		}
			
	}
}
if(isset($_POST['eliminar'])){
	$id = $_POST['eliminar'];
	$qryEliminar = mysqli_query($conexion,"DELETE FROM alumnos WHERE id = $id");
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
                            Alumnos inscritos
                        </div>
						<div class="panel-heading">
							<button onclick="ObtenerExcel();" class="btn btn-md btn-success"><i class="fas fa-file-excel" style="color:white;"></i> Descargar Excel</button>
						</div>
                        <div class="panel-body">
							<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
								<thead>
									<tr>
										<th> Nombre </th>
										<th> Programa </th>
										<th> Correo </th>
										<th> Teléfono </th>
										<th> <i class="fas fa-times-circle"></i> </th>
										<th> <i class="fas fa-pencil"></i> </th>
									</tr>
								</thead>
								<tbody>
								<?php
								$consulta = mysqli_query($conexion,	"SELECT * FROM alumnos WHERE id_campus = '".$_SESSION['campus']."' ORDER BY matricula");
								
								while ($d = mysqli_fetch_array($consulta))
								{	
									$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
									$d1 = mysqli_fetch_array($consulta1);
									
									echo '
									<tr class="">
										<td>'.$d['nombre'].' '.$d['paterno'].' '.$d['materno'].'</td>
										<td>'.$d1['nombre'].'</td>
										<td>'.$d['correo'].'</td>
										<td>'.$d['telefono'].'</td>
										<td>
											<form action="alumnos_abc" method="post">
												<input type="hidden" name="eliminar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-danger btn-block"><i class="fas fa-times-circle"></i> Eliminar</button>
											</form>
										</td>
										<td>
											<form action="alumnos_abc" method="post">
												<input type="hidden" name="editar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-success btn-block"><i class="fas fa-pencil"></i> Editar</button>
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
				$(document).ready(function(){	
					$('#tabla').DataTable( {
					   "language": { url:"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
						"ordering": true,
						"paging": true,
						"searching": true,
						"stateSave": true,
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
							// {
							// 	extend: 'excel',
							// 	exportOptions: {
							// 		columns: [0,1,2,3,4]
							// 	},
							// 	text: 'Excel <i class="fal fa-file-excel"></i>',
							// 	messageTop: '',
							// 	footer: true
							// },
							// {
							// 	extend: 'pdfHtml5',
                			// 	orientation: 'landscape',
							// 	exportOptions: {
							// 		columns: [0,1,2,3,4]
							// 	},
							// 	text: 'PDF <i class="fal fa-file-pdf"></i>',
							// 	messageTop: 'LISTA DE alumnos REGISTRADOS',
							// 	footer: true
							// },
							// {
							// 	extend: 'print',
							// 	exportOptions: {
							// 		columns: [0,1,2,3,4]
							// 	},
							// 	text: 'Imprimir <i class="fal fa-print"></i>',
							// 	messageTop: '',
							// 	footer: true
							// },
						]
					} );
				});
				<?php
				if (isset($_POST['validacion']))
				{
					?>
					Swal.fire({
						icon: 'success',
					 	title: 'Validación',
						html: '<h5>La validación se realizó correctamente</h5>',
						showConfirmButton: true,
  						timer: 4500
					})
					<?php
				}
				?>
				function EliminarValidacion() {
					
					Swal.fire({
						title: 'ATENCIÓN',
						icon: 'info',
						width: 500,
						html:
							'<h4>¿Esta seguro que deseas eliminar la validación de este aspirante?</h4>',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: '<i class="fa fa-thumbs-up"></i> Sí, estoy seguro',
						cancelButtonText: '<i class="fa fa-thumbs-down"></i> Cancelar',
						}).then((result) => {
						if (result.isConfirmed) {
							//Acept
							$( "#eliminar_validacion" ).submit();
						}
					});
				}
				function ObtenerExcel(){
					location.href="ajax/obtener_excel.php";
				}
			</script>            
        </div>

    </div>

</body>

</html>