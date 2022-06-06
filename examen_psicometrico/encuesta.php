<?php
require_once "includes/Mobile_Detect.php";
$detect = new Mobile_Detect;
session_start();
if (!isset($_SESSION['id']))
{
	header("location:./");
	exit();
}
// Any mobile device (phones or tablets).
if ( $detect->isMobile() ) {
 	header('location:encuesta_mobile');
	exit();
}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Centro Educativo Rodríguez Tamayo</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="icon" type="image/png" href="assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo  -->
	<link href="assets/css/demo.css" rel="stylesheet" />
	
	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	
	<style>
		#si:hover .icon, .wizard-card[data-color="red"] .choice.active .icon {
    		border-color: #28a745;
    		color: #28a745;
		}
		#no:hover .icon, .wizard-card[data-color="red"] .choice.active .icon {
    		border-color: #dc3545;
    		color: #dc3545;
		}
		#nose:hover .icon, .wizard-card[data-color="red"] .choice.active .icon {
    		border-color: #ffc107;
    		color: #ffc107;
		}
	</style>
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('images/bg/slideshow-2.jpg')">

		<div class="container" style="padding: 10px 0 0">
			<div class="row">
				<div class="col-md-2">
					<img src="assets/img/logo_blanco.png" width="80">
				</div>
				<div class="col-md-8">
					<h3 class="text-center" style="color: #fff"><strong>EXAMEN PSICOMÉTRICO</strong></h3>
				</div>
			</div>
		</div>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="" method="">

		                    	<div class="wizard-header" style="height: 140px !important; padding: 25px 30px">
		                        	<h3 class="wizard-title" id="reactivo" 
										data-id_reactivo="0" 
										data-id_factor="0" 
										data-cuenta="0">
		                        	</h3>
									<h5 id="factor" style="display: none"></h5>
									<h3 class="wizard-title" id="pregunta_l" 
										data-alerta="" data-id="">
		                        	</h3>
		                    	</div>
								

		                        <div class="row" id="contenedor_respuestas">
		                            <div class="col-sm-10 col-sm-offset-1">
										<div class="col-sm-6">
											<div class="choice" id="si" rel="tooltip" title="Sí, estoy de acuerdo..." onClick="Respuesta(1)">
												<div class="icon">
													<i class="fas fa-thumbs-up"></i>
												</div>
												<h6>Sí</h6>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="choice" rel="tooltip" title="No, no estoy de acuerdo..." onClick="Respuesta(-1)">
												<div class="icon">
													<i class="fas fa-thumbs-down"></i>
												</div>
												<h6>No</h6>
											</div>
										</div>
									</div>
		                        </div>
								
								<div class="row hidden" id="contenedor_cargador">
		                            <div class="col-sm-10 col-sm-offset-1">
										<div class="col-sm-4">
											
										</div>
										<div class="col-sm-4">
											<div class="choice">
												<div class="icon">
													<i class="fas fa-spinner fa-spin"></i>
												</div>
												<h6>Cargando...</h6>
											</div>
										</div>
									</div>
		                        </div>
								
								<div class="row" style="padding: 20px 0 0 20px">
									<div class="col-md-12">
										<p>Tiempo restante: <span id="crono">15</span> seg.</p>
									</div>
								</div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	    	</div> <!-- row -->
			
		</div> <!--  big container -->
	</div>

</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>
	<script src="assets/js/wizard.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.all.min.js"></script>
	<script>
		Respuesta(0);
		var pausa = false;
		var counter = 16;
		var interval = setInterval(function() {
			if(!pausa) 
			{
				counter--;
				if (counter < 0) 
				{
					counter = 16;
					Mensaje(1);
				}
				else
				{
					$('#crono').text(counter);
				}
			}
			
		}, 1000);
		
		function Mensaje(val)
		{
			pausa = true;
			if (val == 1)
			{
				Swal.fire({
					title: 'Oops....',
					icon: 'error',
					html:
						'<h4>Para que la encuesta sea válida debes contestar de forma rápida</h4>',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: '<i class="fa fa-thumbs-up"></i> Entendido',
					}).then((result) => {
					if (result.value) {
						counter = 16;
						pausa=false;
					}
				});
			}
			else if (val==2)
			{
				Swal.fire({
					title: '<?php echo $_SESSION['nombre'];?>',
					icon: 'info',
					html:
						'<h4>Para que la encuesta sea válida debes contestar de forma honesta</h4>',
					showCancelButton: false,
					confirmButtonColor: '#3085d6',
					confirmButtonText: '<i class="fa fa-thumbs-up"></i> Entendido',
					}).then((result) => {
					if (result.value) {
						counter = 16;
						pausa=false;;
					}
				});
			}
		}
		
		function Respuesta(value)
		{
			pausa=true;
			console.log("Respuesta: "+value);
			if ($('#pregunta_l').data('alerta') != '')//Se respondió la pregunta de mentira
			{
				var alerta = $('#pregunta_l').data('alerta');
				$('#reactivo').removeClass('hidden');
				$('#factor').removeClass('hidden');
				$('#pregunta_l').addClass('hidden');
				$('#pregunta_l').data('alerta','');
				//Evaluar respuesta y enviar mensaje 
				if (value == alerta)
				{
					$.ajax({
						type: 'POST',
						url: 'ajax/guardar_mentira',
						dataType: "json",
						data: {
							respuesta: value,
						},
						cache:false,
						// Mostramos un mensaje con la respuesta de PHP
						success: function(data) 
						{
							console.log('Mentira: '+data);
							Mensaje(2);
						}
					});
				}	
				else
				{
					counter = 16;
					pausa=false;
				}
			}
			else
			{
				$('#contenedor_respuestas').addClass('hidden');
				$('#contenedor_cargador').removeClass('hidden');
				$.ajax({
					type: 'POST',
					url: 'ajax/guardar',
					dataType: "json",
					data: {
						respuesta: value,
						id_factor:$('#reactivo').data('id_factor'),
						id_reactivo:$('#reactivo').data('id_reactivo'),
						id_l:$('#pregunta_l').data('id'),
						cuenta:$('#reactivo').data('cuenta'),
					},
					cache:false,
					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) 
					{
						console.log(data);
						if (data.datos != null)
						{
							$.each(data, function (index, value) {
								for (var c=0; c<value.length;c++)
								{
									if (value[c].finalizar==0)
									{
										$('#reactivo').data('id_factor',value[c].id_factor);
										$('#reactivo').data('id_reactivo',value[c].id_reactivo);
										$('#reactivo').data('cuenta',value[c].cuenta);
										$('#reactivo').html('<strong>'+value[c].reactivo+'</strong>');
										$('#factor').html(value[c].factor);
										
										$('#contenedor_respuestas').removeClass('hidden');
										$('#contenedor_cargador').addClass('hidden');
										$('#reactivo').removeClass('hidden');
										$('#factor').removeClass('hidden');
										$('#pregunta_l').addClass('hidden');
										$('#pregunta_l').data('alerta','');
										
										counter = 16;
										pausa=false;
										if (value[c].pregunta_l != '0')
										{
											$('#reactivo').addClass('hidden');
											$('#factor').addClass('hidden');
											$('#pregunta_l').removeClass('hidden');
											$('#pregunta_l').html('<strong>'+value[c].pregunta_l+'</strong>');
											
											$('#pregunta_l').data('alerta',value[c].alerta_l);
											$('#pregunta_l').data('id',value[c].id_l);
										}
									}
									else
									{
										window.location.replace("finalizar");
									}
								}
							});	
						}
					}
				});
			}
			        
			return false;
		}
	</script>
</html>
