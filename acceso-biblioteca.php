<!doctype html>
<html class="no-js" lang="es">
<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Centro Educativo Rodríguez Tamayo">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<title>CENTRO EDUCATIVO RODRÍGUEZ TAMAYO</title>
	<link rel="icon" href="assets/images/favicon.png">
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="assets/css/fonts.css" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<style>
		.bg-default{
			background: url(assets/images/bg/5.jpg) no-repeat center center fixed; 
			
			width: 100%;
			min-height: 100vh;
			display: -webkit-box;
			display: -webkit-flex;
			display: -moz-box;
			display: -ms-flexbox;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			align-items: center;
			padding: 15px;
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			position: relative;
			z-index: 1;
		}
		.card{
			padding: 50px 30px;
			background-color: rgba(255,255,255,0.8);
			border: 1px solid #fff;
			border-radius: 10px;
		}
		.text-primary{
			color: #002845 !important;
		}
		iframe {
			display: block;
			margin: auto !important;
		}
	</style>
</head>
<body class="bg-default">
	
	<section class="container">
		<div class="row justify-content-end">
			<div class="col-12 col-lg-5">
				<div class="card">
					<div class="card-body text-center">
						<img src="assets/images/logo.png" class="img-fluid">
						<h1 class="my-3 text-primary">Biblioteca Virtual</h1>
						<p>Inicia tu sesión con tu correo institucional</p>
						<div>
						
						
							<div id="g_id_onload" 
								 data-client_id="168925560407-0spq73osc5fhovgso1g1ksj5oijdgtvh.apps.googleusercontent.com" 
								 data-callback1="handleCredentialResponse" 
								 data-login_uri="https://cert.edu.mx/biblioteca-virtual"
								 data-auto_prompt="false">
							</div>
							<div class="g_id_signin"
								 data-type="standard"
								 data-size="large"
								 data-text="sign_in_with"
								 data-shape="pill"
								 data-theme="filled_blue"
								 data-logo_alignment="left"
								 >
							</div>
						</div>
						
						<div class="row mt-3">
							<div class="col-12">
								<a href="./" class="btn btn-primary"><i class="fal fa-arrow-alt-to-left"></i> Regresar</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	

	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!--jQuery-->
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script src="https://accounts.google.com/gsi/client" async defer></script>
	
</body>
</html>