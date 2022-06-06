<?php
require_once('../includes/conexion.php');
require_once('../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../includes/Mobile_Detect.php');
require_once('../includes/globals.php');
require_once('../includes/funciones.php');
if(isset($_GET['token']))
{
	extract($_REQUEST);
	
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE md5(id) = '".$token."' LIMIT 1");
	if (mysqli_num_rows($consulta) > 0)
	{
		$d = mysqli_fetch_array($consulta);
		switch($_GET['target'])
		{
			case 'curp':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/curp.pdf';
				$doc = 'CURP';
				break;
			}
			case 'certificado':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/certificado.pdf';
				$doc = 'Certificado de estudios';
				break;
			}
			case 'constancia':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/constancia.pdf';
				$doc = 'Constancia de estudios';
				break;
			}
			case 'recibo':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/recibo.pdf';
				$doc = 'Recibo de pago';
				break;
			}
			case 'pase':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/pase.pdf';
				$doc = 'Pase de ingreso al ingreso';
				break;
			}
			case 'identificacion':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/identificacion.pdf';
				$doc = 'Identificación oficial';
				break;
			}
			case 'ine':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/ine.pdf';
				$doc = 'INE';
				break;
			}
			case 'titulo':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/titulo.pdf';
				$doc = 'Título';
				break;
			}
			case 'cedula':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/cedula.pdf';
				$doc = 'Cédula profesional';
				break;
			}
			case 'certificado_lic':
			{
				$a = '../sistema/archivos/aspirantes/'.$d['id'].'/certificado_lic.pdf';
				$doc = 'Certificado de licenciatura';
				break;
			}
		}
	}
	else
	{
		header('location:./');
	}
}
else
{
	header('location:./');
}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Registro de aspirantes a las licenciaturas y posgrados">
	<meta name="author" content="Centro Educativo Rodríguez Tamayo">
	<title>Centro Educativo Rodríguez Tamayo</title>
	<!-- Favicon -->
	<link href="assets/images/favicon.png?v=1.0" rel="icon" type="image/png">
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.bg-default{
			background: url(assets/images/bg/2.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		#FormRegistro{
			padding: 30px 20px;
			color: #fff;
    		background-color: rgba(38, 38, 38, 0.85);
		}
		.mensaje-error{
			color: #ff0033;
			border-color: #ff0033;
		}
	</style>
</head>

<body class="bg-default">
	<section>
		<div class="container pt-3">
			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<h1 class="py-2 text-white"><strong><?php echo $doc;?></strong></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="<?php echo $a.'?v='.rand();?>" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Scripts -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
	
</body>
</html>
