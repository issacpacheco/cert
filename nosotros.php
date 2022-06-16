<?php
include('includes/config.php');
$p = basename( __FILE__, ".php" );
?>
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
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,700|Roboto:300,400,700'" rel="stylesheet">
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS-->
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand();?>">
</head>
<body>
	

	<?php include('assets/includes/header.php');?>
	
    
	
	<section class="container my-5">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8">
				<img src="assets/images/nosotros/somos_cert.jpg" class="img-fluid" alt="Familia CERT">
			</div>
			<div class="col-12 col-md-4 my-auto px-4">
				<h1>Familia CERT</h1>
				<p class="text-start">En el CERT buscamos ofrecer una escuela de calidad, donde los conocimientos sean relevantes, donde la búsqueda permanente de la superación y la excelencia educativa sean nuestros principales propósitos que alcanzaremos a través del esfuerzo diario de todos y cada uno de los integrantes del proceso educativo.<br> Iniciamos hace 20 años en la ciudad de Ticul, Yucatán y desde el año 2010 abrimos nuestro campus en la ciudad de Mérida.</p>
			</div>
		</div>
	</section>
	
	<section class="container my-5">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 order-lg-2">
				<img src="assets/images/nosotros/filosofia.jpg" class="img-fluid" alt="Filosofía">
			</div>
			<div class="col-12 col-md-4 my-auto">
				<h1>Filosofía</h1>
				<p class="justify-center">El CERT entiende que la educación debe orientarse en todo momento a mejorar al ser humano mediante conocimientos que permitan llegar a una educación integral de calidad. De igual forma reconoce la responsabilidad que adquiere respecto al desarrollo de la comunidad en la que actúa, los egresados deben estar comprometidos con el desarrollo de una sociedad cada vez más libre y más justa. En el CERT creemos que la educación es el factor fundamental para cambiar la realidad económica, social y moral.</p>
			</div>
		</div>
	</section>
	
	<section class="container my-5">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8">
				<img src="assets/images/nosotros/vision.jpg" class="img-fluid" alt="Familia CERT">
			</div>
			<div class="col-12 col-md-4 my-auto">
				<h1>Visión</h1>
				<p class="justify-center">El CERT Se visualiza en los próximos años como una institución de educación superior de vanguardia, con base en un liderazgo pedagógico y en una mejora continua de todas las personas y factores que intervienen en el proceso educativo. Utilizando las estrategias adecuadas para el pleno desarrollo del plan de estudios, con una infraestructura en crecimiento constante, creando un ambiente en donde prevalezca la armonía, el respeto, el aprendizaje y la educación en valores.</p>
			</div>
		</div>
	</section>
	
	<section class="container my-5">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8 order-lg-2">
				<img src="assets/images/nosotros/mision.jpg" class="img-fluid" alt="Misión">
			</div>
			<div class="col-12 col-md-4 my-auto">
				<h1>Misión</h1>
				<p class="justify-center">Ser una institución en la búsqueda constante de la excelencia académica y la formación integral, proporcionando una oportunidad a la juventud estudiosa y obteniendo como resultado egresados con una sólida preparación profesional, comprometidos con su entorno y con un amplio sentido de solidaridad, equidad y justicia social.</p>
			</div>
		</div>
	</section>

   <section class="container my-5">
		<div class="row justify-content-center">
			<div class="col-12 col-md-8">
				<img src="assets/images/nosotros/valores.jpg" class="img-fluid" alt="Valores">
			</div>
			<div class="col-12 col-md-4 my-auto">
				<h1>Valores</h1>
				<p class="justify-center">El CERT comprende que la calidad humana es el origen de la calidad educativa y por consiguiente del desempeño profesional, por tal motivo promueve los siguientes valores: Respeto, Honestidad, Justicia, Liderazgo, Responsabilidad y un gran espíritu digno de superación personal.</p>
			</div>
		</div>
	</section>
   
	
	
	
	<?php include('assets/includes/footer.php');?>
	
	<!-- Scripts -->
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>