	<!--section class="container my-5">
    	<div class="row justify-content-center">
            <div class="col-12"> 
				<h5> ¿Tienes alguna duda?</h5> 
				<p>Si deseas saber más sobre nuestra oferta educativa, haz <strong>click</strong> en más información.</p>
				<div class="d-grid gap-2 d-md-block">
					<a href="admisiones/prospectos" class="btn-primary btn-lg btn-block">
					   Más información
					</a>
				</div>
			</div>
   		</div>
    </section-->

	<footer class="footer-area text-center bg-primary pb-2">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12 col-lg-3 border-right">
					<img src="assets/images/logo_blanco.png" class="img-fluid my-auto">
				</div>
				<?php
				if ($_SESSION['campus'] == 'ticul')
				{
				?>
				<div class="col-12 col-lg-3 text-left border-right pl-lg-5">
					<p class="text-white">CAMPUS TICUL</p>
					<p class="text-white"><i class="fab fa-whatsapp"></i> 9994.10.58.86</p>
					<p class="text-white"><i class="fas fa-envelope"></i> contacto@cert.com.mx</p>
					<p class="text-white"><i class="fab fa-facebook"></i> <i class="fab fa-instagram"></i> CertTicul</p>
				</div>
				<div class="col-12 col-lg-3 text-left pl-lg-5">
					<ul class="list-none">
						<li><a href="#" class="text-white">BIBLIOTECA VIRTUAL</a></li>
						<li><a href="admisiones/perfil" class="text-white">PERFIL DE ASPIRANTE</a></li>
						<li><a href="https://certticul.miportal.education/" class="text-white" target="_blank">SCHOOL WEB</a></li>
						<li><a href="https://cert-isen.miportal.education/" class="text-white" target="_blank">CERT ISEN LIC. PRIMARIA</a></li>
					</ul>	
				</div>
				<?php
				}
				else
				{
				?>
				<div class="col-12 col-lg-3 text-left border-right pl-lg-5">
					<p class="text-white">CAMPUS MÉRIDA CAUCEL</p>
					<p class="text-white"><i class="fab fa-whatsapp"></i> 9991.26.71.06</p>
					<p class="text-white"><i class="fas fa-envelope"></i> contacto@cert.com.mx</p>
					<p class="text-white"><i class="fab fa-facebook"></i> <i class="fab fa-instagram"></i> CertMéridaCaucel</p>
				</div>
				<div class="col-12 col-lg-3 text-left pl-lg-5">
					<ul class="list-none">
						<li><a href="#" class="text-white">BIBLIOTECA VIRTUAL</a></li>
						<li><a href="admisiones/perfil" class="text-white">PERFIL DE ASPIRANTE</a></li>
						<li><a href="https://certmerida.miportal.education/" class="text-white" target="_blank">SCHOOL WEB</a></li>
						<li><a href="https://cert-isen.miportal.education/" class="text-white" target="_blank">CERT ISEN LIC. PRIMARIA</a></li>
					</ul>	
				</div>
				<?php
				}
				?>
				<div class="col-12 col-lg-3 text-left pl-lg-5">
					<ul class="list-none">
						<li><a href="oferta" class="text-white">OFERTA EDUCATIVA</a></li>
						<li><a href="admision" class="text-white">ADMISIONES</a></li>
						<li><a href="nosotros" class="text-white">FAMILIA CERT</a></li>
						<li><a href="contacto" class="text-white">CONTACTO</a></li>
						<li><a href="oferta#salud" class="text-white">CIENCIAS DE LA SALUD</a></li>
						<li><a href="oferta#sociales" class="text-white">CIENCIAS SOCIALES</a></li>
						<li><a href="oferta#posgrados" class="text-white">POSGRADOS</a></li>
					</ul>	
				</div>
				
			</div>
			<div class="copyright wow animated slideInUp my-5">
				<p class="text-white p-0">&copy; Copyright 2022 Centro Educativo Rodríguez Tamayo.</p>
			</div>
			<a href="#" id="scroll-to-up" class="text-white bg-primary"><i class="fas fa-angle-double-up" aria-hidden="true"></i></a>
		</div><!-- .container -->
	</footer>