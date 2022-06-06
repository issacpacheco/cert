<?php
include( "includes/config.php" );

$conexion2 = mysqli_connect("50.62.209.12:3306","test_user","fabricandomarcas","test_vocacional");
mysqli_query($conexion2,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

$consulta = mysqli_query($conexion2,"SELECT * FROM aspirantes WHERE MD5(id) = '".$_POST['token']."'");
if (mysqli_num_rows($consulta)==0)
{
	header("location:index.php");
}
else
{
	$d = mysqli_fetch_array($consulta);
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
							<h2 class="text-center">Resultados de: <strong class="text-success"><?php echo $d['nombre'];?></strong></h2>
                        </div>
						<div class="panel-body">
							<div class="row ">
								<div class="col-lg-12">
									<h3 class="text-center">Resultados</h3>

									<div class="table-responsive">
										<table class="table table-striped table-bordered">
											<thead>
												<tr class="text-center">
													<th>Área</th>
													<th>Resultado obtenido</th>
													<th>Intepretación</th>
												</tr>
											</thead>
											<tbody>

											<?php
											$total = $suma = 0;
											$consulta1 = mysqli_query($conexion2,"SELECT * FROM areas");
											while ($d1 = mysqli_fetch_array($consulta1))
											{
												$consulta2 = mysqli_query($conexion2,"SELECT SUM(respuesta) AS suma FROM test WHERE id_area = '".$d1['id']."' AND id_aspirante = '".$d['id']."'");
												$d2 = mysqli_fetch_array($consulta2);
												$suma = $d2['suma'];

												$consulta3 = mysqli_query($conexion2,"SELECT * FROM reactivos WHERE id_area = '".$d1['id']."'");
												$total = mysqli_num_rows($consulta3);

												$max = $total * 4; //Puntuación máxima x 4 que es el valor máximo
												$resultado = ceil( ($suma / $max) * 100);

												if ($resultado <= 25)
												{
													$interpretacion = 'FALTA DE PRÁCTICA';
													$barra = '
													<div class="progress progress-striped active">
														<div class="progress-bar progress-bar-danger" style="width: '.$resultado.'%">'.$resultado.'%</div>
													</div>';
												}
												if ($resultado > 25 && $resultado <= 50)
												{
													$interpretacion = 'APTITUDES COMUNES';
													$barra = '
													<div class="progress progress-striped active">
														<div class="progress-bar  progress-bar-warning" style="width: '.$resultado.'%">'.$resultado.'%</div>
													</div>';
												}
												if ($resultado > 50 && $resultado <= 75)
												{
													$interpretacion = 'APTITUDES NORMALES';
													$barra = '
													<div class="progress progress-striped active">
														<div class="progress-bar  progress-bar-info" style="width: '.$resultado.'%">'.$resultado.'%</div>
													</div>';
												}
												if ($resultado > 75 && $resultado <= 100)
												{
													$interpretacion = 'APTITUDES DESARROLLADAS';
													$barra = '
													<div class="progress progress-striped active">
														<div class="progress-bar  progress-bar-success" style="width: '.$resultado.'%">'.$resultado.'%</div>
													</div>';
												}

												echo '<tr>
														<td><strong>'.$d1['nombre'].'</strong></td>
														<td>'.$barra.'</td>
														<td>'.$interpretacion.'</td>
													 </tr>';	
											}

											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-lg-12">	
									<h3 class="text-center">Interpretación</h3>
									<div class="table-responsive">
										<table class="table table-striped table-bordered tabla">
											<thead>
												<tr>
													<th>Área</th>
													<th>Descripción</th>
													<th>Explicación</th>
													<th>Profesiones</th>
												</tr>
											</thead>
											<tbody>

											<?php
											$consulta1 = mysqli_query($conexion2,"SELECT * FROM areas");
											while ($d1 = mysqli_fetch_array($consulta1))
											{
												$consulta2 = mysqli_query($conexion2,"SELECT SUM(respuesta) AS suma FROM test WHERE id_area = '".$d1['id']."' AND id_aspirante = '".$d['id']."'");
												$d2 = mysqli_fetch_array($consulta2);
												$suma = $d2['suma'];

												$consulta3 = mysqli_query($conexion,"SELECT * FROM reactivos WHERE id_area = '".$d1['id']."'");
												$total = mysqli_num_rows($consulta3);

												$max = $total * 4; //Puntuación máxima x 4 que es el valor máximo
												$resultado = ceil( ($suma / $max) * 100);

												$clase = '';
												if ($resultado > 75 && $resultado <= 100)
												{
													$clase = 'success';
												}
												echo '<tr class="'.$clase.'">
														<td><strong>'.$d1['nombre'].'</strong></td>
														<td>'.nl2br($d1['descripcion']).'</td>
														<td>'.nl2br($d1['explicacion']).'</td>
														<td>'.nl2br($d1['profesiones']).'</td>
													 </tr>';	
											}
											?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

							<hr>

							<div class="row">
								<div class="col-lg-12 text-center">
									<form action="test_imprimir.php" method="post" target="_blank">
										<input type="hidden" name="token" value="<?php echo $_POST['token'];?>">
										<button type="submit" class="btn btn-info btn-success btn-block">Imprimir resultados <i class="fa fa-print"></i></button>
									</form>
								</div>
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
			
		</div>

	</div>

</body>

</html>