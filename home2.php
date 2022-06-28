<?php
$p = basename( __FILE__, ".php" );
$sub_dominio = explode('.',$_SERVER['SERVER_NAME']);
$_SESSION['campus'] = $sub_dominio[0];
if ($_SESSION['campus'] != 'ticul' && $_SESSION['campus'] != 'merida')
{
	header('location:campus');
}
require_once('includes/conexion.php');
require_once('includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('includes/Mobile_Detect.php');
require_once('includes/globals.php');
require_once('includes/funciones.php');?>
<!doctype html>
<html class="no-js" lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>CENTRO EDUCATIVO RODRÍGUEZ TAMAYO | CAMPUS <?php echo $_SESSION['campus']=='ticul'?'TICUL':'MÉRIDA';?></title>
	<link rel="icon" href="assets/images/favicon.png">
	
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="referrer" content="origin">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,700|Roboto:300,400,700'" rel="stylesheet">
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="assets/css/fonts.css" rel="stylesheet">
	<!-- FontAwesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<!--Animate On Scroll Library-->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
	<!--Style-->
	
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand();?>">
	<link rel="stylesheet" href="assets/css/testimonial.css?v=<?php echo rand();?>">
	
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
			font-size: 8em;
			font-weight: 900;
    		font-style: normal;
			color: #fff;
			/*text-shadow: -4px 6px #ac1315;*/
			text-shadow: -0.5vw 0.5vw 0 #ac1315;
			line-height: 1.1em;
		}
		
		.title-1{
			font-family: 'Quadon';
			font-size: 8em;
			font-weight: 900;
			color: #fff;
			text-shadow: -0.5vw 0.5vw 0 #ac1315;		
			line-height: 65%;
		}
		.title-1 span{
			margin-left: 23%;
		}
		
		.text-1{
			text-align: justify;
			color: #fff;
			line-height: 1.2em; 
			text-shadow: 5px 5px 10px #000;
			font-size: 2.5em;
			position: absolute;
			bottom: 5%;
		}
		
		.title-2{
			font-family: 'Quadon';
			font-size: 8em;
			font-weight: 900;
			color: #fff;
			text-shadow: -0.5vw 0.5vw 0 #ac1315;		
		}
		.text-2{
			text-align: justify;
			color: #fff;
			line-height: 1.2em; 
			text-shadow: 5px 5px 10px #000;
			font-size: 2em;
		}
		
		@media (min-width: 1699px){
			.title-1{
				font-size: 13em;
			}
			
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
		
		
		.dot-matrix {
			background: url(assets/images/textures/dot-matrix.png) repeat;
			bottom: 0;
			left: 0;
			position: absolute;
			right: 0;
			top: 0;
			/*z-index: 0;*/
		}
		
		.section-links {
			background-color: #002d72;
			background-image: url(assets/images/homepage/links/links-bg-2-1080.jpg);
			background-position: top center;
			background-size: 100% 100%;
			position: relative;
			z-index: 0;
		}
		
		.marker-stroke {
			background-image: url(assets/images/homepage/links/links-bg-1-1080.png);
			background-position: bottom center;
			background-repeat: no-repeat;
			background-size: cover;
			left: 0;
			padding-top: 3.28125%;
			position: absolute;
			top: 0;
			-webkit-transform: translateY(-95%);
			-moz-transform: translateY(-95%);
			-o-transform: translateY(-95%);
			-ms-transform: translateY(-95%);
			transform: translateY(-95%);
			width: 100%;
		}
		
		.section-links a{
			color: #fff;
			text-decoration: none;
			font-size: 2em;
		}
		
		.section-links a:hover{
			text-decoration: underline;
		}
		
		
		
		.familia_cert_logo
		{
			width: 300px;
			min-height: 300px;
			padding: 5px;
			display: flex;
			justify-content: center;
			align-items: center;

			/* position the div in center */
			position: absolute;
			top: 20%;
			left: 38%;
			transform: translate(-50%, -50%);
			
		 }
		.familia_cert
		{
			background: #dddbd9;
			background-image: url(assets/images/textures/textured_paper_increased_contrast@2X.jpg);
			background-repeat: repeat;
			background-size: 10.60417%;
			overflow: hidden;
			position: relative;
			z-index: initial;
			padding: 180px 0 100px 0;
		}
		.inner-bg:hover{
			animation: pulse; 
			animation-duration: 2s;
		}
		
		
		.btn-link{
				border: solid #fff 0.1875em;
				background-color: transparent;
				color: #fff;
				text-transform: uppercase;
				border-width: 0.1875em;
				font-size: 1.2em;
				font-weight: bold;
				padding: 0.375em;
				text-decoration: none;
			}
		
		
		
		.border-right-white{
			border-right: 1px solid #fff;
		}
		
		
		/*VIDEO*/
		.video {
			position:fixed;
			z-index: -1;

			/*not work if the screen ratio is below 16/9*/
			width:100%;     
			height: auto;
		}
		@media (min-aspect-ratio: 16/9) {
			.video {
				width:100%;
				height: auto;
			}
		}
		@media (max-aspect-ratio: 16/9) {
			.video { 
				width:auto;
				height: 100%;
			}
		}
		@media (max-width: 767px) {
			.video {
				display: none;
			}
			.video-container {
				background: url('assets/images/bg/6.jpg');
				background-size: cover;
			}
		}
		
		
	</style>
	
</head>

<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top mr-2 p-0 shadow-lg">
		<div class="container">
			<div class="row">
				<div class="col-12 py-2">
					<a class="navbar-brand" href="./">
						<img src="assets/images/logo_h.png" alt="CERT" class="img-fluid"> 
					</a>
				</div>
			</div>
			
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
		 		<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center m-0" id="menu">
		 		<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='index'?'active':'';?>" aria-current="page" href="./">Inicio</a>
					</li>
					<li class="nav-item dropdown <?php echo $p=='admision'?'active':'';?>"><a class="nav-link dropdown-toggle" href="#" id="navbar_admisiones" role="button" data-bs-toggle="dropdown" aria-expanded="false">Oferta educativa</a>
						<ul class="dropdown-menu" aria-labelledby="navbar_asmisiones">
							<li><a href="admision?campus=<?php echo $_SESSION['campus'];?>" class="dropdown-item">Licenciaturas</a></li>
							<li><a href="admision?campus=<?php echo $_SESSION['campus'];?>" class="dropdown-item">Posgrados</a></li>
						</ul>
					</li>
					<li class="nav-item dropdown <?php echo $p=='admision'?'active':'';?>"><a class="nav-link dropdown-toggle" href="#" id="navbar_admisiones" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admisiones</a>
						<ul class="dropdown-menu" aria-labelledby="navbar_asmisiones">
							<li><a href="admision" class="dropdown-item">Admisiones</a></li>
							<li><a href="admisiones/perfil" class="dropdown-item">Perfil del aspirante</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='nosotros'?'active':'';?>" href="nosotros">Familia CERT</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbar_schoolweb" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Alumnos
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbar_schholweb">
							<li><a href="#" class="dropdown-item" target="_blank">Biblioteca virtual</a></li>
							<li><a href="https://certmerida.miportal.education/" class="dropdown-item" target="_blank">SCHOOL WEB CERT Campus Mérida</a></li>
							<li><a href="https://certticul.miportal.education/" class="dropdown-item" target="_blank">SCHOOL WEB CERT Campus Ticul</a></li>
							<li><a href="http://cert-isen.miportal.education/" class="dropdown-item" target="_blank">SCHOOL WEB CERT ISEN Lic. Primaria</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='nosotros'?'active':'';?>" href="cert_sustentable">CERT sustentable</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='contacto'?'active':'';?>" href="contacto">Contacto</a>
					</li>
				 </ul>
			</div>
		</div>
	</nav>
	
	
	<section class="h-100 video-container">
		<video class="video" poster="assets/images/bg/5.jpg" autoplay muted loop>
			<source src="assets/video/video_home.mp4" type="video/mp4">
		</video>
	</section>
	
	
	<section class="section-ripped bg-img py-5" style="background-image: url(assets/images/home/bg.jpg); position: relative;">
		<div class="container py-lg-5 px-5">
			<div class="row justify-content-end">
				
				<div class="col-xs-12 col-lg mx-2 pt-5" data-aos="fade-right">
					<a href="admisiones/perfil" target="_blank">
						<div class="row bg-white shadow link">
							<div class="col-3 p-0">
								<img src="assets/images/homepage/icons/user.jpg" class="img-fluid">
							</div>
							<div class="col-9 my-auto">
								<h4 class="text-center font-quadon">Ingresa a tu perfil de aspirante</h4>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-xs-12 col-lg mx-2 pt-5" data-aos="zoom-in">
					<a href="admisiones/registro?oferta=licenciaturas" target="_blank">
						<div class="row bg-white shadow link">
							<div class="col-3 p-0">
								<img src="assets/images/homepage/icons/calendar.jpg" class="img-fluid">
							</div>
							<div class="col-9 my-auto">
								<h4 class="text-center font-quadon">Registro 2022</h4>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-xs-12 col-lg mx-2 py-5" data-aos="fade-left">
					<a href="agendar" target="_blank">
						<div class="row bg-white shadow link">
							<div class="col-3 p-0">
								<img src="assets/images/homepage/icons/edit.jpg" class="img-fluid">
							</div>
							<div class="col-9 my-auto">
								<h4 class="text-center font-quadon">Agendar una cita con un asesor</h4>
							</div>
						</div>
					</a>
				</div>
				
				
			</div>
		</div>
	</section>
	
	
	<section class="section-ripped bg-img h-100" style="background: url(assets/images/bg/7.jpg); background-repeat: no-repeat; background-attachment: fixed; background-position: center;">
		<div class="dot-matrix" aria-hidden="true"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-lg-4 pt-5 px-5">
					<h2 class="title-1" data-aos="fade-right">
						Crecer
						<br>
						<span>es</span>
						<br>
						posible
					</h2>
				</div>
			</div>
			<div class="row justify-content-end">
				<div class="col-12 col-lg-6">
					<p class="text-1 px-3">En el <strong>CERT</strong> puedes explorar ideas que te interesen, encontrar personas que te inspiren y desafíen y hacer descubrimientos que cambien tu vida y el mundo.</p>
				</div>
			</div>
		</div>
	</section>
	
	
	<section class="section-links">
		<div class="marker-stroke"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-3 py-5 border-right-white text-center">
					<a href="admision?campus=<?php echo $_SESSION['campus'];?>">Admisiones</a>
				</div>
				<div class="col-12 col-lg-3 py-5 border-right-white text-center">
					<a href="oferta">Ciencias Biológicas y de la Salud</a> 
				</div>
				<div class="col-12 col-lg-3 py-5 border-right-white text-center">
					<a href="oferta#sociales">Ciencias Sociales y Humanidades</a>
				</div>
				<div class="col-12 col-lg-3 py-5 text-center">
					<a href="oferta#posgrados">Posgrados</a>
				</div>
			</div>
		</div>
	</section>
	
	<section>
		<div class="container-fluid">
			<div class="row justify-content-center">
				<div class="col p-0">
					<a href="https://www.instagram.com/p/CfFGPRWuLN3/" target="_blank">
						<img src="assets/images/feed/1.jpg" />
					</a>
				</div>
				
				<div class="col p-0">
					<a href="https://www.instagram.com/p/CemQ1ffuazp/" target="_blank">
						<img src="assets/images/feed/2.jpg" />
					</a>
				</div>
				
				<div class="col p-0">
					<a href="https://www.instagram.com/p/CaP7_QaJEkd/" target="_blank">
						<img src="assets/images/feed/5.jpg" />
					</a>
				</div>
				
				<div class="col p-0">
					<a href="https://www.instagram.com/p/CcqlBf_OyfM/" target="_blank">
						<img src="assets/images/feed/4.jpg" />
					</a>
				</div>
				
			</div>
		</div>
	</section>
	
	<section class="familia_cert">
		<div class="container">
              <?php
              $detect = new Mobile_Detect;
              if ( $detect->isMobile() ) 
              {
              ?>
              <div class="row justify-content-center d-flex">
                  <div class="col-6 text-center">
                      <img src="assets/images/familia_cert.png" class="img-fluid">
                  </div>
              </div>
              <?php
              }
              else
              {
              ?>
              <div class="familia_cert_logo">
                  <img src="assets/images/familia_cert.png" class="img-fluid">
              </div>
              <?php
              }
              ?>
            <div class="row justify-content-center d-flex">
                <div class="col-lg-12 mx-auto">
                    <div class="testimoninal-active-1">

                          <?php
                          $active = 'active';
                          $c=0;
                          $consulta = mysqli_query($conexion,"SELECT * FROM si_team ORDER BY rand() LIMIT 10");
                          while ($d=mysqli_fetch_array($consulta))
                          {	
                              $c++;
                          ?>
                          <div class="singleTbox-1 text-center <?php echo $active;?> position-<?php echo $c;?>" data-position="position-<?php echo $c;?>">
                              <div class="testi-thumb">
                                  <div class="inner-bg" style="background-image: url(assets/images/familia_cert/<?php echo $d['id'];?>.jpg)"></div>
                              </div>

                              <div class="autor-bio">
                                  <h5 class="text-uppercase text-primary"><?php echo $d['nombre'];?></h5>
                                  <p><?php echo $d['puesto'];?></p>
                              </div>

                              <div class="inner-content">
                                  <p class="text-primary">
                                      <?php echo $d['familia_cert'];?>
                                  </p>
                              </div>
                          </div>
                          <?php
                              $active = 'inactive';
                          }
                          ?>

                    </div>
                </div>
            </div>
        </div>
	</section>
	
	
	<section class="section-ripped bg-img h-100" style="background: url(assets/images/bg/8.jpg); background-repeat: no-repeat; background-attachment: fixed;">
		<!--div class="dot-matrix"></div-->
		<div class="container">
			<div class="row justify-content-center py-5">
				<div class="col-12 col-lg-4 text-center">
					<h2 class="title-2" data-aos="fade-right">
						Mérida
						<br>
						Yucatán
					</h2>
				</div>
			</div>
								
            <div class="row justify-content-center">
                <div class="col-12 col-6 text-center">
                    <p class="text-2">Mérida, la animada capital del estado de Yucatán en México, tiene la rica herencia de su pasado maya y colonial. También es la sede del CERT Campus Mérida, ubicado en Ciudad Caucel.</p>
                    <a href="https://visitmerida.mx/" target="_blank" class="btn-link">Conoce Mérida</a>
                </div>
            </div>
		</div>
	</section>
	
	<footer class="bg-primary">
		<div class="container py-5">
			<div class="row d-flex justify-content-center">
				<div class="col-12 col-lg-4 text-center">
					<img class="" src="assets/images/logo_h_white.png" />
				</div>
				<div class="col-12 col-lg-4 px-4 mx-auto" style="border-left: 0.125em solid #fff; border-right: 0.125em solid #fff;">
					<h3 class="text-white m-0">CAMPUS MÉRIDA, CAUCEL</h3>
					<p class="text-white m-0"><i class="fab fa-fw fa-whatsapp-square"></i>9991.26.71.06</p>
					<p class="text-white m-0">contacto@cert.edu.mx</p>
					<p class="text-white m-0"><a href="https://www.facebook.com/CERTMeridaCaucel" target="_blank" class="text-white"><i class="fab fa-fw fa-facebook-square"></i>cert</a></p>
					<p class="text-white m-0"><a href="https://www.instagram.com/certmeridacaucel/" target="_blank" class="text-white"><i class="fab fa-fw fa-instagram-square"></i>cert</a></p>
				</div>
				<div class="col-12 col-lg-4 px-4">
					<p class="text-white m-0"><a href="./"  class="text-white">HOME</a></p>
					<p class="text-white m-0"><a href="./"  class="text-white">ADMISIONES</a></p>
					<p class="text-white m-0"><a href="./"  class="text-white">FAMILIA CERT</a></p>
					<p class="text-white m-0"><a href="contacto"  class="text-white">CONTACTO</a></p>
				</div>
			</div>
		</div>
	
	</footer>
	
	
	
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<!--Animate On Scroll Library-->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>	
		 AOS.init();
		/*---------------====================
			 12.team 
	   	================-------------------*/

	  	$('.singleTbox-1').on('click', function (event) {
			event.preventDefault();
			var active = $(this).hasClass('active');
			var parent = $(this).parents('.testimoninal-active-1');
			if (!active) {
				var activeBlock = parent.find('.singleTbox-1.active');
				var currentPos = $(this).attr('data-position');
				var newPos = activeBlock.attr('data-position');
				activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(currentPos);
				activeBlock.attr('data-position', currentPos);
				$(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(newPos);
				$(this).attr('data-position', newPos);
		  	}
		});
	</script>
	
	
</body>
</html>
