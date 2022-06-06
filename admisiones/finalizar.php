<!doctype html>
<html lang="es">

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
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">

	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">

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
		}
		.has-error input, .has-error select{
			border-color: #ff0033;
			background: #ffa9a9;
		}
	</style>	
</head>

<body class="bg-default">
	
	<div class="container my-3 py-5">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-8 card py-5 px-4">
				<h3 class="text-center"><strong>REGISTRO CORRECTO</strong></h3>
				<h3 class="text-center">Tu registro se realizó de forma satisfactoria</h3>
				<h5 class="text-center">Para actualizar o verificar tu información ingresa a tu perfil con tu cuenta de correo electrónico y contraseña registrados.</h5>
				<div class="row">
					<div class="col-lg-6">
						<form action="login" method="post">
							<div class="text-center">
								<button type="submit" class="btn btn-info btn-block btn-lg my-4"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
							</div>
						</form>
					</div>
					<div class="col-lg-6">
						<form action="./" method="post">
							<div class="text-center">
								<button type="submit" class="btn btn-success btn-block btn-lg my-4"><i class="fas fa-sign-out-alt"></i> Finalizar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>


</body>
	<!-- Scripts -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>
