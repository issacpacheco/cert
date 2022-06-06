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
</head>

<body>
	<section>
		<div class="container-fluid m-0 p-0">
			<div class="row">
				<div class="col-12">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="http://3.15.207.243/sistema/archivos/<?php echo $_GET['token'].'/'.$_GET['recurso'];?>" allowfullscreen></iframe>
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
