<?php
include('includes/config.php');
$p = basename( __FILE__, ".php" );

if(isset($_POST['credential']))
{
	//print_r (json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $_POST['credential'])[1])))));
	$usuario = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $_POST['credential'])[1]))));
	$partes = explode('@',$usuario->email);
	if ($partes[1]!='cert.edu.mx' && $partes[1]!='certcaucel.edu.mx')
	{
		header('location:./');
	}
}
?>
<!doctype html>
<html class="no-js" lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BIBLIOTECA VIRTUAL | CENTRO EDUCATIVO RODRÍGUEZ TAMAYO</title>
	<link rel="icon" href="assets/images/favicon.png">
	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="referrer" content="origin">

	
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,700|Roboto:300,400,700'" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<!-- Fonts -->
	<link href="assets/css/fonts.css" rel="stylesheet">
	<!-- FontAwesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<!--Style-->
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand();?>">
	<style>
		body, html {
 			width: 100%;
  			height: 100%
		}
		.bg-img {
			background: #021b35;
			background-position: top center;
			background-repeat: no-repeat;
			background-size: cover;
			position: relative;
			z-index: 0;
		}
		
		
		.title {
			font-family: 'Quadon';
			text-transform: uppercase;
			font-size: 8em;
			font-weight: 900;
    		font-style: normal;
			color: #fff;
			text-shadow: -4px 6px #ac1315;
			line-height: 1.1em;
		}
		
		.font-quadon{
			font-family: 'Quadon';
		}
		
		.bold{
			 font-weight: 500;
		}
		
		.text-justify{
			text-align: justify !important;
		}
		
		.bg {
			background-color: #021b35
		}
		
		.section-ripped::after {
			background-position: center;
			background-repeat: no-repeat;
			content: '';
			display: block;
			left: 0;
			position: absolute;
			visibility: visible;
			width: 100%;
			z-index: 300;
			bottom: auto;
			transform: scaleY(-1);
			
			
			background-image: url(assets/images/textures/torn-paper-jumbotron.png);
		
		
			top: -37px;
			top: -2.05556vw;
			background-size: 100% 3vw;
			height: 3vw;
		}
		
		.link:hover{
    		animation: pulse; /* referring directly to the animation's @keyframe declaration */
  			animation-duration: 2s; /* don't forget to set a duration! */
		}
		.lista li {
			font-size: 1.1rem;
			font-family: 'Quadon';
			font-weight: bold;
			line-height: 2rem;
		}
	</style>
	
</head>

<body>
	<?php include('assets/includes/header.php');?>
	
	<section class="bg-img h-100" style="background: url(assets/images/bg/5.jpg); position: relative">
		<h1 class="title animate__animated animate__backInLeft" style="position: absolute; bottom: 10%;left: 5%">
			BIBLIOTECA
			<br>
			VIRTUAL
		</h1>
	</section>
	
	
	<section class="section-ripped" style="background-color: #021b35; position: relative">
		<div class="container py-lg-5">
			<div class="row justify-content-center">
				<div class="col-12 py-5">
					<h2 class="text-white">Bienvenido a la Biblioteca Virtual</h2>
					<p class="text-white">En el CERT nos preocupamos por brindarte las herramientas que necesitas para tu formación profesional, por ello, a través de esta biblioteca virtual, podrás encontrar los libros, artículos y materiales acordes a los diferentes planes de estudios que ofrecemos.</p>
					<p class="text-white">Destacan las páginas de consulta privada como EBSCO y McGraw Hill a las que tendrás acceso con tu correo institucional, en las que además de revistas indexadas y confiables con publicaciones periódicas, también podrás acceder a herramientas como simuladores, infografías, material multimedia y calculadoras específicas para el área de la salud.</p>
					<p class="text-white">Bienvenido a tu biblioteca virtual del CERT, donde nos estamos innovando para que tengas acceso a la información más reciente y con la mayor tecnología.</p>
				</div>
			</div>
		</div>
	</section>
	
	<section class="section-ripped bg-img" style="background: url(assets/images/textures/1.jpg); position: relative">
		<div class="container py-lg-5">
			<div class="row justify-content-center">
				<div class="col-12 py-5">
					<h2 class="font-quadon text-primary bold">Exclusivos para la comunidad CERT</h2>
				</div>
			</div>
			
			<div class="row justify-content-end">
				<div class="col-12">
					<h4 class="font-quadon text-primary bold" style="text-align: end"><a href="https://www.diputados.gob.mx/LeyesBiblio/pdf/122_010720.pdf" target="_blank">*Recuerda respetar los derechos de autor</a></h2>
				</div>
			</div>
			
			<div class="row justify-content-evenly">
				<div class="col-12 col-lg-5 py-5 animate__animated animate__backInLeft">
					<a href="https://accessmedicina.mhmedical.com/#" target="_blank">
						<div class="row bg shadow link">
							<div class="col-6 p-0">
								<img src="assets/images/logos/mc_graw_hill.png" class="img-fluid">
							</div>
							<div class="col-6 my-auto">
								<h2 class="text-white text-center font-quadon bold">SALUD</h2>
							</div>
						</div>
					</a>
					<div class="row lista" style="min-height: 340px">
						<div class="col-12 bg-white p-4 shadow">
							<ul class=" text-primary">
								<li><strong>Base de datos Access Medicina</strong></li>
								<li>Gran volumen de libros específicos de salud.</li>
								<li>609 infografías de aparatos y sistemas del cuerpo humano.</li>
								<li>124 vídeos por aparatos y sistemas.</li>
								<li>Anatomía en 3D.</li>
								<li>Harrison animaciones de fisiopatología.</li>
								<li>Monografías de fármacos.</li>
								<li>Calculadoras de salud (presión arterial, IMC de adulto y pediatra, etc).</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-5 py-5 animate__animated animate__backInRight">
					<a href="https://search.ebscohost.com" target="_blank">
						<div class="row bg shadow link">
							<div class="col-6 p-0">
								<img src="assets/images/logos/ebsco.png" class="img-fluid">
							</div>
							<div class="col-6 my-auto">
								<h2 class="text-white text-center font-quadon bold">EDUCACIÓN <br> SOCIALES <br>SALUD</h2>
							</div>
						</div>
					</a>
					<div class="row lista" style="min-height: 340px">
						<div class="col-12 bg-white p-4 shadow">
							<ul class="text-primary">
								<li>
									Bases de datos internacionales
									<ul>
										<li><strong>Medic Latina</strong></li>
										<li><strong>Medline Full Text</strong></li>
										<li><strong>Fuente Académica Premier</strong></li>
										<li><strong>CINHAL With Full Text</strong></li>
									</ul>
								</li>
								<li>282,000 Artículos de revistas científicas</li>
								<li>Miles de artículos que podrás descargar en PDF</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-12 py-5">
					<h2 class="font-quadon text-primary bold">Salud</h2>
					<h3 class="font-quadon text-primary">Acceso libre</h3>
					<!--p class="text-primary">*Algunas plataformas te pedirán crear una cuenta de usuario.</p-->
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://fundacionindex.com/bootstrap/pages/register.php" target="_blank">
						<img src="assets/images/logos/ciberindex.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="https://bvsalud.org/es/" target="_blank">
						<img src="assets/images/logos/bibliotecavirtualsalud.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://www.freebooks4doctors.com/" target="_blank">
						<img src="assets/images/logos/freebooks4doctors.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://www.freemedicaljournals.com/f.php?f=ip_oncol" target="_blank">
						<img src="assets/images/logos/freemedicaljournals.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://ciberindex.com/index.php/ie/article/view/e12124" target="_blank">
						<img src="assets/images/logos/indexenf.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://ciberindex.com/index.php/ie/article/view/e12124" target="_blank">
						<img src="assets/images/logos/elsevier.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="https://saludpublica.mx/index.php/spm/index" target="_blank">
						<img src="assets/images/logos/saludpublica.png" class="img-fluid shadow">
					</a>
				</div>
			</div>
			
			
			
			
			<div class="row justify-content-center">
				<div class="col-12 py-5">
					<h2 class="font-quadon text-primary bold">Generales</h2>
					<h3 class="font-quadon text-primary">Acceso libre</h3>
					<!--p class="text-primary">*Algunas plataformas te pedirán crear una cuenta de usuario.</p-->
				</div>
			</div>
			
			<div class="row justify-content-center">
				<div class="col-6 col-lg-3 my-4 link">
					<a href="https://openresearchlibrary.org/home" target="_blank">
						<img src="assets/images/logos/openresearchlibrary.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="https://open.umn.edu/opentextbooks/subjects" target="_blank">
						<img src="assets/images/logos/opentextbooklibrar.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://www.librosoa.unam.mx/community-list" target="_blank">
						<img src="assets/images/logos/librosunam.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="http://www.scielo.org.mx/cgi-bin/wxis.exe/iah/?IsisScript=iah/iah.xis&base=article%5Edlibrary&fmt=iso.pft&lang=e" target="_blank">
						<img src="assets/images/logos/scielo.png" class="img-fluid shadow">
					</a>
				</div>
				<div class="col-6 col-lg-3 my-4 link">
					<a href="https://www.redalyc.org/home.oa" target="_blank">
						<img src="assets/images/logos/redalyclogo.png" class="img-fluid shadow">
					</a>
				</div>
				
			</div>
			
			
		</div>
	</section>
	
	
	
	
	
	<?php include('assets/includes/footer.php');?>
	
	
	
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
	
</body>
</html>
