<?php
include('includes/config.php');
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
	<!--Bootstrap-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- Fonts -->
	<link href="assets/css/fonts.css" rel="stylesheet">
	<!--Font awesome-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
	<!--CSS Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<style>
		body, html {
			height: 100%;
			position: relative;
			background: #021b35;
		}
		.bg_v
		{
			background: none;		
		}
		.merida{
			background: url("assets/images/campus/merida.png?v=3.1") no-repeat top right;
			background-size: cover;
			position: relative;
		}
		.ticul{
			background: url("assets/images/campus/ticul.png?v=3.1") no-repeat top left;
			background-size: cover;
			position: relative;
			
		}
		.title {
			font-family: 'Quadon';
			text-transform: uppercase;
			font-size: 6em;
			font-weight: 900;
    		font-style: normal;
			color: #fff;
			text-shadow: -4px 6px #2f5171;
			line-height: 1.1em;
			text-align: center;
		}
		.logo{
		  width: 300px;
		  min-height: 300px;
		  padding: 5px;
		  display: flex;
		  justify-content: center;
		  align-items: center;

		  /* position the div in center */
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		}
		.contenedor_merida, .contenedor_ticul{
			display: flex;
			justify-content: center;
			align-items: center;

			/* position the div in center */
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}
		a.title{
			text-decoration: none;
		}
		a.title:hover{
			color: #fff;
    		animation: pulse; /* referring directly to the animation's @keyframe declaration */
  			animation-duration: 2s; /* don't forget to set a duration! */
		}
		
		@media screen and (max-width: 1920px) {
			.title {
				font-size: 6em;			
			}
			.contenedor_merida{
				transform: translate(-65%, -50%);
			}
			.contenedor_ticul{
				transform: translate(-45%, -50%);
			}
		}
		
		@media screen and (max-width: 1440px) {
			.title {
				font-size: 4em;			
			}
			.contenedor_merida{
				transform: translate(-65%, -50%);
			}
			.contenedor_ticul{
				transform: translate(-45%, -50%);
			}
		}
		
		
		@media screen and (max-width: 1280px) {
			.title {
				font-size: 4em;			
			}
			.contenedor_merida{
				transform: translate(-65%, -50%);
			}
			.contenedor_ticul{
				transform: translate(-45%, -50%);
			}
		}
		
		
		@media screen and (max-width: 1199px) {
			.title {
				font-size: 3em;			
			}
			.contenedor_merida{
				transform: translate(-75%, -50%);
			}
			.contenedor_ticul{
				transform: translate(-35%, -50%);
			}
			
		}
		
		@media screen and (max-width: 991px) {
			.title {
				font-size: 3em;			
			}
			.contenedor_merida{
				transform: translate(-75%, -50%);
			}
			.contenedor_ticul{
				transform: translate(-35%, -50%);
			}
		}
		
		
		
		@media screen and (max-width: 767px) {
			.title {
				font-size: 3em;			
			}
			.contenedor_merida{
				transform: translate(-75%, -230%);
			}
			.contenedor_ticul{
				transform: translate(-35%, 230%);
			}
		}
		
		@media screen and (max-width: 718px) {}

		@media screen and (max-width: 550px) {
			.title {
				font-size: 2em;			
			}
			.contenedor_merida{
				transform: translate(-85%, -250%);
			}
			.contenedor_ticul{
				transform: translate(-25%, 250%);
			}
		}
		
		/*VERTICAL*/
		@media screen and (max-width: 484px) {
			.merida{
				background: none;
			}
			.ticul{
				background: none;
			}
			.bg_v{
				background: url("assets/images/campus/bg_v.png?v=3.1") no-repeat center center;
				background-size: cover;
				position: relative;
			}
			.title {
				font-size: 3em;			
			}
			.contenedor_merida{
				transform: translate(-50%, -100%);
			}
			.contenedor_ticul{
				transform: translate(-50%, 30%);
			}
			
		}

		@media screen and (max-width: 480px) {}

		@media screen and (max-width: 400px) {}
		
		@media screen and (max-width: 320px) {}
		
		
	</style>

</head>
<body>
	
	<?php
	$detect = new Mobile_Detect;
 	if ( $detect->isMobile() ) 
	{
		
	?>
	<section class="container-fluid h-100 bg_v">
		<div class="logo">
			<img src="assets/images/logo_blanco.png" class="animate__animated animate__zoomIn">
		</div>
				
		<div class="row h-100">
            <div class="col-12 merida">
				<div class="contenedor_merida">
					<a href="https://merida.cert.edu.mx" class="title animate__animated animate__slideInDown">Mérida <br>Caucel</a> 
				</div>            	 
            </div>
			<div class="col-12 ticul">
				<div class="contenedor_ticul">
					<a href="https://ticul.cert.edu.mx" class="title animate__animated animate__slideInUp">Ticul</a> 
				</div>
            </div>
		</div>
	</section>
	<?php
	}
	else
	{
	?>
	
	<section class="container-fluid h-100">
		<div class="logo">
			<img src="assets/images/logo_v_full_white.png" class="animate__animated animate__zoomIn" width="200">
		</div>
		
        <div class="row h-100">
            <div class="col merida animate__animated animate__slideInLeft">
				<div class="contenedor_merida">
					<a href="https://merida.cert.edu.mx" class="title animate__animated animate__backInLeft">Mérida <br>Caucel</a> 
				</div>            	 
            </div>
			
			<div class="col ticul animate__animated animate__slideInRight">
				<div class="contenedor_ticul">
					<a href="https://ticul.cert.edu.mx" class="title animate__animated animate__backInRight">Ticul</a> 
				</div>
            </div>
        </div>
	</section>
	<?php
	}
	?>
	
	
	
	<!-- Scripts -->
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script>
		
		const element = document.querySelector('.title');
		element.classList.add('animate__animated', 'backInLeft');
		element.addEventListener('animationend', () => {
  			$('.title').removeClass('animate__backInLeft');
			$('.title').removeClass('animate__backInRight');
		});
		
				
	</script>
	
</body>
</html>