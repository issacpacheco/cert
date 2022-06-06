<?php
require_once('../includes/conexion.php');
require_once('../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../includes/Mobile_Detect.php');
require_once('../includes/globals.php');
require_once('../includes/funciones.php');
//$_POST['token'] = md5(906);
$consulta = mysqli_query($conexion,"SELECT * FROM prospectos WHERE MD5(id) = '".$_POST['token']."'");
if (mysqli_num_rows($consulta)==0)
{
	header("location:./");
}
else
{
	$d = mysqli_fetch_array($consulta);
}

extract($_REQUEST);
$consulta1 = mysqli_query($conexion,"SELECT * FROM tv_reactivos ");
while ($d1 = mysqli_fetch_array($consulta1))
{
	$respuesta = 'reactivo_'.$d1['id'];
	mysqli_query($conexion,"ALTER TABLE tv_test AUTO_INCREMENT = 0");
	mysqli_query($conexion,"INSERT INTO tv_test VALUES (
	'0',
	'" . $d['id'] . "',
	'" . $d1['id_area'] . "',
	'" . $d1['id'] . "',
	'".$$respuesta."'
	)" );
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="LCC Christhian Sosa">
	<title>Test Vocacional | Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/img/favicon.png?v=1" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo rand();?>" id="theme-stylesheet">
	<!-- Icons -->
	<link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
	<link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
	<link type="text/css" href="assets/css/login.css?v=1.0.<?php echo rand();?>" rel="stylesheet">
	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.bg-default{
			background: url(assets/img/bg3.jpg) no-repeat center center fixed; 
		}
		.tabla td, .tabla th {
    		white-space: pre-wrap;
		}
		.table td .progress {
			width: 140px;
			height: 20px;
			margin: 0;
		}
		.table {
    		color: #000;
    		font-weight: 500;
		}
		.progress {
			border: 1px solid;
			background-color: #b6c1cc;
		}
	</style>
</head>

<body class="bg-default">
	<section class="my-5">
    	<div class="container py-5 px-4" style="background-color: rgba(255,255,255,0.95); border-radius: 20px">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-10">
					<h2 class="my-2 text-center">
						Gracias <strong class="text-success"><?php echo $d['nombre'];?></strong> por tu participación.
					</h2>
					
					<h4 class="text-center">A continuación te presentamos los resultados del test así como la interpretación de ellos y las carreras a fin de tus aptitudes.</h4>
					
					<hr>
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
							$consulta1 = mysqli_query($conexion,"SELECT * FROM tv_areas");
							while ($d1 = mysqli_fetch_array($consulta1))
							{
								$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS suma FROM tv_test WHERE id_area = '".$d1['id']."' AND id_prospecto = '".$d['id']."'");
								$d2 = mysqli_fetch_array($consulta2);
								$suma = $d2['suma'];

								$consulta3 = mysqli_query($conexion,"SELECT * FROM tv_reactivos WHERE id_area = '".$d1['id']."'");
								$total = mysqli_num_rows($consulta3);

								$max = $total * 4; //Puntuación máxima x 4 que es el valor máximo
								$resultado = ceil( ($suma / $max) * 100);

								if ($resultado <= 25)
								{
									$interpretacion = 'FALTA DE PRÁCTICA';
									$barra = '
									<div class="progress mx-auto">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: '.$resultado.'%" aria-valuenow="'.$resultado.'" aria-valuemin="0" aria-valuemax="100">'.$resultado.'%</div>
									</div>';
								}
								if ($resultado > 25 && $resultado <= 50)
								{
									$interpretacion = 'APTITUDES COMUNES';
									$barra = '
									<div class="progress mx-auto">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-warning" role="progressbar" style="width: '.$resultado.'%" aria-valuenow="'.$resultado.'" aria-valuemin="0" aria-valuemax="100">'.$resultado.'%</div>
									</div>';
								}
								if ($resultado > 50 && $resultado <= 75)
								{
									$interpretacion = 'APTITUDES NORMALES';
									$barra = '
									<div class="progress mx-auto">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" style="width: '.$resultado.'%" aria-valuenow="'.$resultado.'" aria-valuemin="0" aria-valuemax="100">'.$resultado.'%</div>
									</div>';
								}
								if ($resultado > 75 && $resultado <= 100)
								{
									$interpretacion = 'APTITUDES DESARROLLADAS';
									$barra = '
									<div class="progress mx-auto">
										<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: '.$resultado.'%" aria-valuenow="'.$resultado.'" aria-valuemin="0" aria-valuemax="100">'.$resultado.'%</div>
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
			<div class="row justify-content-center">
				<div class="col-12">	
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
							$consulta1 = mysqli_query($conexion,"SELECT * FROM tv_areas");
							while ($d1 = mysqli_fetch_array($consulta1))
							{
								$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS suma FROM tv_test WHERE id_area = '".$d1['id']."' AND id_prospecto = '".$d['id']."'");
								$d2 = mysqli_fetch_array($consulta2);
								$suma = $d2['suma'];

								$consulta3 = mysqli_query($conexion,"SELECT * FROM tv_reactivos WHERE id_area = '".$d1['id']."'");
								$total = mysqli_num_rows($consulta3);

								$max = $total * 4; //Puntuación máxima x 4 que es el valor máximo
								$resultado = ceil( ($suma / $max) * 100);

								$clase = '';
								if ($resultado > 75 && $resultado <= 100)
								{
									$clase = 'table-success';
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
			
			<div class="row justify-content-center my-5">
				<div class="col-6 text-center">
					<form action="imprimir" method="post" target="_blank">
						<input type="hidden" name="token" value="<?php echo $_POST['token'];?>">
						<button type="submit" class="btn btn-info btn-success">Imprimir resultados <i class="fas fa-print"></i></button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Scripts -->
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script> 

	<!--SweetAlert-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>