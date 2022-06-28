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
	<!--Style-->
	<link rel="stylesheet" href="assets/css/base.css?ver=2" type="text/css" media="all" />
	<link rel="stylesheet" href="assets/css/home.css?ver=2" type="text/css" media="all" />
	<link rel="stylesheet" href="assets/css/style.css?v=<?php echo rand();?>">
	<link rel="stylesheet" href="assets/css/testimonial.css?v=<?php echo rand();?>">
	
</head>

<body class="page-template-homepage">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top mr-2 p-0 shadow-lg">
		<div class="container">
			<a class="navbar-brand" href="./">
				<img src="assets/images/logo_h.png" alt="CERT" class="img-fluid"> 
			</a>
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
	
	<div class="page-container">
		<div role="banner">			
			<div id="bbHeroSection" class="hero default section"
					  data-backup="assets/images/bg/6.jpg 1600w, assets/images/bg/6.jpg 800w"
					  data-mp4="assets/video/video_home.mp4"
					  data-poster="assets/images/bg/5.jpg"
					  data-autoplay="autoplay"
					  data-loop="loop"
					  data-preload="auto"
					  data-muted="muted">
				<div class="sticky">
					<div class="fullwidth fullheight">
						<div class="content">
							<div class="centerme">
								<h1 class="text-center">
									<img src="assets/images/logo_v_full_white.png" class="img-fluid" width="200">
								</h1>
							</div>
							<noscript>
								<img width="1600" height="800" src="assets/images/bg/5.jpg" class="backup-nojs fullwidth" alt="CERT" loading="lazy" srcset="assets/images/bg/6.jpg 1600w, assets/images/bg/5.jpg 800w" sizes="(max-width: 1600px) 100vw, 1600px" />
							</noscript>
							<div class="while-loading" style="background-image: url(assets/images/bg/6.jpg);"></div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
	
	<div id="main-content">
		
		
		<div class="featured-content section layout-no_lead py-5">
			<div class="torn-paper"></div>
			<div class="center force">
				<div class="content column count-3">
					
					<div class="teaser column force has-image">
						<div class="thumbnail">
							<a href="admisiones/perfil" class="force" target="_blank">
								<div class="image column force image-square">
									<img src="assets/images/homepage/icons/user.jpg"/>
								</div>
							</a>
						</div>
						<div class="text">
							<div class="accent-element">
								<h5 class="headline">
									<a href="admisiones/perfil" target="_blank">Ingresa a tu perfil de aspirante</a> 
								</h5>
							</div>
						</div>
					</div>
					
					<div class="teaser column force has-image">
						<div class="thumbnail">
							<a href="admisiones/registro?oferta=licenciaturas" class="force" target="_blank">
								<div class="image column force image-square">
									<img src="assets/images/homepage/icons/calendar.jpg"/>
								</div>
							</a>
						</div>
						<div class="text">
							<div class="accent-element">
								<h5 class="headline">
									<a href="admisiones/registro?oferta=licenciaturas" target="_blank">Registro 2022</a> 
								</h5>
							</div>
						</div>
					</div>
					
					<div class="teaser column force has-image">
						<div class="thumbnail">
							<a href="agendar" class="force" target="_blank">
								<div class="image column force image-square">
									<img src="assets/images/homepage/icons/edit.jpg"/>
								</div>
							</a>
						</div>
						<div class="text">
							<div class="accent-element">
								<h5 class="headline">
									<a href="agendar" target="_blank">Agendar una cita con un asesor</a> 
								</h5>
							</div>
						</div>
					</div>
					
					
				</div>
			</div>
		</div>
		
		
		<div class="jhu-block brand-message section brand" >
			<div class="dot-matrix" aria-hidden="true"></div>
			<div class="center force">
				<div class="content column force">
					<h2>
						<strong><span class="line four">Crecer</span> 
							<span class="line four" style="line-height: 0.2em;margin-left: 0.5em;">es </span>
							<span class="line four">posible</span></strong>
					</h2>
					<p class="text-end text-white" style="line-height: 1.2em; text-shadow: 5px 5px 10px black;">En el <strong>CERT</strong> puedes explorar ideas que te interesen, encontrar personas que te inspiren y desafíen y hacer descubrimientos que cambien tu vida y el mundo.</p>
				</div>
			</div>
		</div>
		
		
		<div class="jhu-block list-of-links section">
			<div class="marker-stroke" aria-hidden="true"></div>
			<div class="center force">
				<div class="module-content sticky column force">
					<ul>
						<li>
							<a href="admision?campus=<?php echo $_SESSION['campus'];?>">Admisiones</a> 
						</li>
						<li>
							<a href="oferta">Ciencias Biológicas y de la Salud</a> 
						</li>
						<li>
							<a href="oferta#sociales">Ciencias Sociales y Humanidades</a> 
						</li>
						<li>
							<a href="oferta#posgrados">Posgrados</a> 
						</li>
					</ul>
				</div>
			</div>
		</div>
		
		
		<div class="jhu-block social-media section">
			<div class="center force">
				<div class="content column force">
					<div class="media-container force">
						
						<div class="media instagram" data-type="instagram">
							<figure>
								<div class="icon"><i class="fab fa-instagram"></i></div>
								<a href="https://www.instagram.com/p/CfFGPRWuLN3/" target="_blank">
									<img src="assets/images/feed/1.jpg" />
								</a>
							</figure>
						</div>
						
						<div class="media instagram" data-type="instagram">
							<figure>
								<div class="icon"><i class="fab fa-instagram"></i></div>
								<a href="https://www.instagram.com/p/CemQ1ffuazp/" target="_blank">
									<img src="assets/images/feed/2.jpg" />
								</a>
							</figure>
						</div>
						
						<div class="media instagram" data-type="instagram">
							<figure>
								<div class="icon"><i class="fab fa-instagram"></i></div>
								<a href="https://www.instagram.com/p/CaP7_QaJEkd/" target="_blank">
									<img src="assets/images/feed/5.jpg" />
								</a>
							</figure>
						</div>
						
						<div class="media instagram" data-type="instagram">
							<figure>
								<div class="icon"><i class="fab fa-instagram"></i></div>
								<a href="https://www.instagram.com/p/CcqlBf_OyfM/" target="_blank">
									<img src="assets/images/feed/4.jpg" />
								</a>
							</figure>
						</div>
						
						
						
						
						
						
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="profiles section">
			<style>
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
                  top: 15%;
                  left: 30%;
                  transform: translate(-50%, -50%);
                  margin: 50px 0;
              }
              .familia_cert{
                  padding: 150px 0 100px 0;

              }
              .inner-bg:hover{
                  animation: pulse; 
                  animation-duration: 2s;
              }
          </style>

          	<div class="container familia_cert my-5">
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
		</div>

		<style>
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
		</style>

		<div class="academics section" role="region"> 
			<div class="dot-matrix" aria-hidden="true"></div>
			<div class="torn-paper" aria-hidden="true"></div>
			<div class="center force">
				<div class="content column force">
					<h2 class="text-center">Mérida<br>Yucatán</h2>
					<p class="text-white" style="text-shadow: 5px 5px 10px black;">Mérida, la animada capital del estado de Yucatán en México, tiene la rica herencia de su pasado maya y colonial. También es la sede del CERT Campus Mérida, ubicado en Ciudad Caucel.</p>
					
					<div class="row">
						<div class="col-4 mt-5">
							<a href="https://visitmerida.mx/" target="_blank" class="btn-link">Conoce Mérida</a>
						</div>
					</div>
					
					
					
				</div>
			</div>
		</div>

		
		
      
	<div class="page-footer">
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
	
	</div>
		
		
		
		
		
	</div>
	
	
	
	
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<!--jQuery-->
	<script src="assets/js/jquery-3.2.0.min.js"></script>
	
	<script type="text/javascript" src="assets/js/modernizr.js?ver=1"></script>
	<script type="text/javascript" src="assets/js/lodash.min.js?ver=1"></script> 
	<script type="text/javascript">
		window.lodash = _.noConflict();
		window._=window.lodash;
	</script> 
	<script type="text/javascript" src="assets/js/backbone.min.js?ver=1"></script> 
	<script type="text/javascript" src="assets/js/vent.js?ver=1"></script> 
	<script type="text/javascript" src="assets/js/home.js?ver=1"></script> 
	
	
	
	<script>	
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
	
	<script>
				setHeroHeight = function() {
					var hero = document.getElementById("bbHeroSection");
					var heroOffset = hero.getBoundingClientRect().bottom;
					var windowHeight = document.documentElement.clientHeight;
					var height = windowHeight - heroOffset;
					hero.style.height = height + "px"
					//hero.style.height =  "500px"
					console.log(hero.style.height);
					//$('.video-container').css('height',hero.style.height)
				}
				$( document ).ready(function() {
    console.log( "ready!" );
					setHeroHeight();
});
				
			</script>
	
</body>
</html>
