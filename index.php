<?php
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
	
    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/banners/1.jpg" class="d-block w-100" alt="CERT">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/banners/2.jpg" class="d-block w-100" alt="CERT">
                        </div>
						<div class="carousel-item">
                            <img src="assets/images/banners/3.jpg" class="d-block w-100" alt="CERT">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
	
	
	
	<section class="container-fluid mt-5 py-4">
        <div class="row">
            <div class="col-12 col-lg-3 order-1 order-lg-2 my-auto">
                <div class="history-text-area">
                    <div class="section-header">
                        <h2>Oferta educativa</h2>
                    </div>
                    <div class="history-text">
                        <p>En el CERT tenemos la gran responsabilidad de seguir fomentando la excelencia académica. Contamos con 9 licenciaturas y 5 posgrados, todas con docentes especializados (profesionales que forman profesionales), clases teórico-prácticas, laboratorios e instalaciones de vanguardia que permitirán desarrollarte académica y profesionalmente.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-md-pull-6">
            	<div class="row">
					<div class="col-sm-4">
						<div class="team-member">
							<div class="inner-team-member text-center">
								<img src="assets/images/home/licenciaturas.jpg" alt="Licenciaturas" class="img-fluid">
								<div class="member-details">
									<h3>LICENCIATURAS</h3>
									<div class="team-social-area">
										<ul>
											<li><a href="oferta#medico_cirujano">Médico Cirujano</a></li>
											<li><a href="oferta#nutricion">Nutrición</a></li>
											<li><a href="oferta#enfermeria">Enfermería</a></li>
											<li><a href="oferta#fisioterapia">Fisioterapia</a></li>
											<li><a href="oferta#derecho">Derecho</a></li>
											<li><a href="oferta#psicologia">Psicología</a></li>
											<li><a href="oferta#administracion">Administración y Mercadotecnia</a></li>
											<li><a href="oferta#educacion_primaria">Educación Primaria</a></li>
											<li><a href="oferta#educacion_preescolar">Educación Preescolar</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="team-member">
							<div class="inner-team-member text-center">
								<img src="assets/images/home/especialidades.jpg" alt="Especialidades" class="img-fluid">
								<div class="member-details">
									<h3>ESPECIALIDADES</h3>
									<div class="team-social-area">
										<ul>
											<li><a href="oferta#enfermeria_quirurgica">Enfermería Quirúrgica</a></li>
											<li><a href="oferta#pediatrica">Enfermería Pediátrica</a></li>
											<li><a href="oferta#enfermeria_cuidados_intensivos">Enfermería en Cuidados Intensivos</a></li>											
											<li><a href="oferta#enfermeria_gestion">Gestión y Docencia en los servicios de Enfermería</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="team-member">
							<div class="inner-team-member text-center">
								<img src="assets/images/home/maestrias.jpg" alt="Maestrías" class="img-fluid">
								<div class="member-details">
									<h3>MAESTRÍAS Y DOCTORADO</h3>
									<div class="team-social-area">
										<ul>
											<li><a href="oferta#innovacion_educativa">Innovación y Desarrollo Educativos</a></li>
											<li><a href="oferta#derecho_penal">Derecho Procesal Penal</a></li>
											<li><a href="oferta#salud_publica">Salud Pública</a></li>
											<li><a href="oferta#doctorado_educacion">Doctorado en Educación</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>
	</section>
	
	<section class="container-fluid">
        <div class="row">
			<div class="col-12 col-lg-5 my-auto">
                <div class="history-text-area">
                    <h2>Vida Universitaria</h2>
                    <div class="history-text">
                        <p>Deja huella en la sociedad siendo parte de las actividades que causan impacto en nuestro entorno, como las ferias de la salud y servicios, semanas de concientización y actividades de responsabilidad social. Participa en nuestras múltiples actividades culturales y deportivas.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div id="carouselExampleControls1" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/images/home/vida_universitaria1.jpg" class="d-block w-100" alt="CERT">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/images/home/vida_universitaria2.jpg" class="d-block w-100" alt="CERT">
                        </div>
						<div class="carousel-item">
                            <img src="assets/images/home/vida_universitaria3.jpg" class="d-block w-100" alt="CERT">
                        </div>
						<div class="carousel-item">
                            <img src="assets/images/home/vida_universitaria4.jpg" class="d-block w-100" alt="CERT">
                        </div>
						<div class="carousel-item">
                            <img src="assets/images/home/vida_universitaria5.jpg" class="d-block w-100" alt="CERT">
                        </div>
						<div class="carousel-item">
                            <img src="assets/images/home/vida_universitaria6.jpg" class="d-block w-100" alt="CERT">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
	
	
	
	<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
    		<div class="modal-content">
				<a href="admisiones/prospectos">
      				<img src="assets/images/modal.jpg" class="img-fluid">
				</a>
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
    		</div>
  		</div>
	</div>
	
	
	
	
	
	<?php include('assets/includes/footer.php');?>
	
	<!-- Scripts -->
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="assets/js/vendor/jquery-3.2.0.min.js"></script>
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/main.js"></script>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('modal'));
		myModal.show()
	</script>
</body>
</html>