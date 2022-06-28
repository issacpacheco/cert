	<!--div id="p-preloader">
		<div class="p-preloader-wave"></div>
	</div-->

	<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top mr-2">
		<div class="container">
			<a class="navbar-brand" href="https://cert.edu.mx/campus"><img src="assets/images/logo.png" alt="CERT"> </a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		 		<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
		 		<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='index'?'active':'';?>" aria-current="page" href="./">INICIO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='oferta'?'active':'';?>" href="oferta">OFERTA EDUCATIVA</a>
					</li>
					<?php
					if ($_SESSION['campus'] == 'ticul')
					{
					?>
					<li class="nav-item <?php echo $p=='admision'?'active':'';?>">
						<a class="nav-link" href="admision?campus=ticul">ADMISIONES</a>
					</li>
					<?php
					}
					else
					{
					?>
					<li class="nav-item <?php echo $p=='admision'?'active':'';?>">
						<a class="nav-link" href="admision?campus=merida">ADMISIONES</a>
					</li>
					<?php	
					}
					?>
						
					<!--li class="nav-item dropdown <?php echo $p=='admision'?'active':'';?>"><a class="nav-link dropdown-toggle" href="#" id="navbar_admisiones" role="button" data-bs-toggle="dropdown" aria-expanded="false">ADMISIONES</a>
							<ul class="dropdown-menu" aria-labelledby="navbar_asmisiones">
								<li><a href="admision?campus=merida" class="dropdown-item">CAMPUS MÉRIDA</a></li>
								<li><a href="admision?campus=ticul" class="dropdown-item">CAMPUS TICUL</a></li>
							</ul>
					</li-->
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='nosotros'?'active':'';?>" href="nosotros">NOSOTROS</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="admisiones/perfil">PERFIL DE ASPIRANTE</a>
					</li>

					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbar_schoolweb" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							SCHOOL WEB
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbar_schholweb">
							<li><a href="https://certmerida.miportal.education/" class="dropdown-item" target="_blank">CERT CAMPUS MÉRIDA</a></li>
							<li><a href="https://certticul.miportal.education/" class="dropdown-item" target="_blank">CERT CAMPUS TICUL</a></li>
							<li><a href="http://cert-isen.miportal.education/" class="dropdown-item" target="_blank">CERT ISEN LIC. PRIMARIA</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="acceso-biblioteca">BIBLIOTECA VIRTUAL</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php echo $p=='contacto'?'active':'';?>" href="contacto">CONTACTO</a>
					</li>
				 </ul>
			</div>
		</div>
	</nav>
