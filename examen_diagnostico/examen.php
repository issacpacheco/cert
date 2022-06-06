<?php
include('../includes/conexion.php');
include('includes/config.php');
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] == '')
{
	header("location:../");
}
//1.- Verificar que no exista el éxamen con id_aspirante = $_SESSION['id'], sino existe crearlo
$consulta = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante = '".$_SESSION['id']."' LIMIT 1");
if (mysqli_num_rows($consulta)==0)
{
	//2.- Crear examen
	$consulta1 = mysqli_query($conexion3,"SELECT * FROM areas");
	while ($d1 = mysqli_fetch_array($consulta1))
	{
		//SELECT * FROM reactivos WHERE id_area = '4' AND id_extra > 0 ORDER BY id_extra,rand() LIMIT 25
		
		if ($d1['id'] == 4)
		{
			$consulta2 = mysqli_query($conexion3,"SELECT * FROM reactivos WHERE id_area = '".$d1['id']."' AND id_extra > 0 ORDER BY id_extra,rand() LIMIT 25");
			$c=0;
			while ($d2 = mysqli_fetch_array($consulta2))
			{
				$c++;
				mysqli_query($conexion3,"INSERT INTO examen VALUES (
				0,
				'".$_SESSION['id']."',
				'".$d1['id']."',
				'".$d2['id']."',
				0,
				0,
				0,
				'".$hoy."',
				'".$hora."',
				'00:00:00',
				0
				)");
			}
			
			$limit = 25 - $c;
			$consulta2 = mysqli_query($conexion3,"SELECT * FROM reactivos WHERE id_area = '".$d1['id']."' AND id_extra = 0 ORDER BY rand() LIMIT ".$limit." ");
			while ($d2 = mysqli_fetch_array($consulta2))
			{
				mysqli_query($conexion3,"INSERT INTO examen VALUES (
				0,
				'".$_SESSION['id']."',
				'".$d1['id']."',
				'".$d2['id']."',
				0,
				0,
				0,
				'".$hoy."',
				'".$hora."',
				'00:00:00',
				0
				)");
			}
		}
		else
		{
			$consulta2 = mysqli_query($conexion3,"SELECT * FROM reactivos WHERE id_area = '".$d1['id']."' ORDER BY rand() LIMIT 25");
			while ($d2 = mysqli_fetch_array($consulta2))
			{
				mysqli_query($conexion3,"INSERT INTO examen VALUES (
				0,
				'".$_SESSION['id']."',
				'".$d1['id']."',
				'".$d2['id']."',
				0,
				0,
				0,
				'".$hoy."',
				'".$hora."',
				'00:00:00',
				0
				)");
			}
		}
	}
}
$consulta = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante = '".$_SESSION['id']."'");
$total = mysqli_num_rows($consulta);
$d = mysqli_fetch_array($consulta);

$consulta = mysqli_query($conexion3,'SELECT ADDTIME("'.$d['fecha'].' '.$d['inicio'].'", "4:30:00") AS tiempo');
$d = mysqli_fetch_array($consulta);
$tiempo = $d['tiempo'];

$consulta = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante = '".$_SESSION['id']."' AND id_respuesta != '0' ");
$contestadas = mysqli_num_rows($consulta);
	
$avance = number_format(($contestadas * 100) / $total);
if ($avance < 50)
{
	$clase_bar = 'bg-danger';	
}
else if ($avance >= 50 && $avance < 70)
{
	$clase_bar = 'bg-warning';
}
else if ($avance >= 70)
{
	$clase_bar = 'bg-success';
}

$disabled = $avance < 80 ? 'disabled' : '';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Fabricando Marcas"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="robots" content="all,follow">

	<!-- theme stylesheet-->
	<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo rand();?>" id="theme-stylesheet">

	<!-- Price Slider Stylesheets -->
	<link rel="stylesheet" href="js/nouislider/nouislider.css">

	<!-- Google fonts - Playfair Display-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">
	<link rel="stylesheet" href="css/fonts.css">

	<!-- owl carousel-->
	<link rel="stylesheet" href="js/owl.carousel/assets/owl.carousel.css">

	<!-- Ekko Lightbox-->
	<link rel="stylesheet" href="js/ekko-lightbox/ekko-lightbox.css">

	<!-- Favicon-->
	<link rel="shortcut icon" href="images/favicon.png">

	<!-- FontAwesome-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.0/css/all.css">

	<!--Swwetalert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">

	<!--Custom-->
	<link rel="stylesheet" href="css/custom.css?v=<?php echo rand();?>">

	<title>Centro Educativo Rodríguez Tamayo</title>
	<style>
		p
		{
			margin: 0;
		}
		.bg-default{
			background: url(images/bg3.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
		
		.modal-header{
			padding-top: 5px;
			padding-bottom: 0px;
		}
		.modal-body{
			padding-top: 0px;
			padding-bottom: 0px;
			flex: none;
		}
		
		.modal-dialog {
		  width: 100%;
		  height: 100%;
		  margin: 0;
		  padding: 0;
		}

		.modal-content {
		  height: auto;
		  min-height: 100%;
		  border-radius: 0;
		}
		
		.reactivo{
			max-height: 400px;
			overflow-y: scroll;
		}
		
		@media (min-width: 992px){
			.modal-lg {
				max-width: 100% !important;
			}
		}
		
	</style>
</head>

<body class="bg-default">
	
	<section>
    	<div class="container bg-white">
			
        	<div class="row">
          		<div class="col-xl-12 mx-auto text-center my-3 pt-2">
            		<div class="text-center mb-4" style="font-size: 24px; color: #000">
						Hola <strong><?php echo $_SESSION['nombre'];?></strong>, Lee detenidamente cada reactivo y contesta correctamente.
					</div>
          		</div>
        	</div>
			
			<div class="row justify-content-md-center mb-5">
				<div class="col-12 col-lg-6">
					<h3 class="text-center">Avance</h3>
					<div class="progress">
                    	<div class="progress-bar bar_total <?php echo $clase_bar;?>" role="progressbar" style="width: <?php echo $avance;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $avance;?>%</div>
                  	</div>
				</div>
				<div class="col-12 col-lg-6">
					<h3 class="text-center">Tiempo restante</h3>
					<h3 class="text-center tiempo" id="tiempo"></h3>
				</div>
			</div>
			
			<hr>
			<h3 class="text-center">Áreas</h3>
			<div class="row justify-content-md-center my-4">
				<?php
				$consulta = mysqli_query($conexion3,"SELECT * FROM areas ORDER BY id");
				while ($d = mysqli_fetch_array($consulta))
				{
				?>
				<div class="col-12 col-lg-4">
					<button type="button" class="boton_area btn btn-primary btn-block my-2" id="boton_area_<?php echo $d['id'];?>" onClick="Ver(<?php echo $d['id'];?>)"><?php echo $d['nombre'];?></button>
				</div>
				<?php
				}
				?>
        	</div>
			
			<hr>
			<?php
			$consulta = mysqli_query($conexion3,"SELECT * FROM areas ORDER BY id");
			while ($d = mysqli_fetch_array($consulta))
			{
				echo '<div class="contenedor_botones" id="contenedor_botones_'.$d['id'].'">';
				echo '<h3 class="text-center">'.$d['nombre'].'</h3>';
				echo '<div class="row">';				
				$c=0;
				$consulta1 = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND id_aspirante = '".$_SESSION['id']."' ORDER BY id_area, id");
				while ($d1 = mysqli_fetch_array($consulta1))
				{
					$c++;
					//modal_area_reactivo
					$clase = 'btn-secondary';
					if ($d1['marcada'] > 0)
					{
						$clase = 'btn-warning';
					}
					else if ($d1['id_respuesta'] > 0)
					{
						$clase = 'btn-success';
					}
			?>
			<div class="col-1 m-2">
				<button type="button" class="btn <?php echo $clase;?> m-2" id="boton_reactivo_<?php echo $d1['id_area'].'_'.$d1['id_reactivo'];?>" data-toggle="modal" data-target="#modal_<?php echo $d1['id_area'].'_'.$d1['id_reactivo'];?>"><?php echo $c;?></button>
			</div>
			<?php
				}
				echo '</div></div>';
			}
			?>
			
			<hr>
			<div class="row justify-content-end my-4 pb-5">
				<div class="col-4">
					<button type="button" class="btn btn-success btn-lg btn-block" id="btn_finalizar" onClick="Finalizar()" <?php echo $disabled;?>><i class="fas fa-check-circle"></i> Finalizar Examen</button>
				</div>
			</div>
      	</div>		
    </section>
		
	
	<?php
	$c=0;
	$consulta = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante = '".$_SESSION['id']."' ORDER BY id_area, id");
	while ($d = mysqli_fetch_array($consulta))
	{
		$c++;
		$consulta1 = mysqli_query($conexion3,"SELECT * FROM reactivos WHERE id = '".$d['id_reactivo']."'");
		$d1 = mysqli_fetch_array($consulta1);
		
		$consulta2 = mysqli_query($conexion3,"SELECT * FROM areas WHERE id = '".$d['id_area']."'");
		$area = mysqli_fetch_array($consulta2);
		//Área y reactivo
		?>
		<div class="modal fade modal_<?php echo $c;?>" id="modal_<?php echo $d['id_area'].'_'.$d1['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
  			<div class="modal-dialog modal-lg" role="document">
    			<div class="modal-content">
      				<div class="modal-header">
        				<h3 class="modal-title text-center"><?php echo $area['nombre'];?></h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  				<i class="fas fa-times"></i>
						</button>
      				</div>
					<div class="modal-body">
						<div class="row justify-content-md-center mb-3">
							<div class="col-12 col-lg-8">
								<h5 class="text-center">Avance</h5>
								<div class="progress">
									<div class="progress-bar bar_total <?php echo $clase_bar;?>" role="progressbar" style="width: <?php echo $avance;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $avance;?>%</div>
								</div>
							</div>
							<div class="col-12 col-lg-4">
								<h4 class="text-center">Tiempo restante</h4>
								<h4 class="text-center tiempo"></h4>
							</div>
						</div>
					</div>
      				<div class="modal-body reactivo">
						
      	<?php
		//echo '<div>'.$d1['reactivo'].'</div>';
		//echo '<div class="clearfix"></div>';
		//echo '<hr>';
		echo '<div class="row justify-content-md-center">';
		echo '<div class="col-12 col-lg-8" style=" border-right: 1px solid grey;"><div class="reactivonull">'.$d1['reactivo'].'</div><div class="clearfix"></div></div>';
		echo '<div class="col-12 col-lg-4">';
		$consulta2 = mysqli_query($conexion3,"SELECT * FROM respuestas WHERE id_reactivo = '".$d1['id']."' ORDER BY rand()");
		while ($d2 = mysqli_fetch_array($consulta2))
		{
			$checked = $d['id_respuesta'] == $d2['id'] ? 'checked' : '';
			if ($d['marcada'] == 0)
			{
				$clase_boton = 'btn btn-warning btn-block';
				$boton_marcar = '<i class="fas fa-check-circle"></i> Marcar pregunta';
			}
			else
			{
				$clase_boton = 'btn btn-secondary btn-block';
				$boton_marcar = '<i class="fas fa-undo"></i> Desmarcar pregunta';
			}
			
			echo '<div class="col-12">
				<div class="row justify-content-md-center align-middle">
					<div class="col-1 p-0">
						<input type="radio" id="respuesta_'.$d2['id'].'" name="radio'.$d1['id'].'" onClick="Guardar('.$d['id_area'].','.$d1['id'].','.$d2['id'].')" '.$checked.' style="margin-top: 8px;">
					</div>
					<div class="col-11 p-0">
						<label>'.$d2['respuesta'].'</label>
					</div>
				</div>
			</div>
			';
		}
		echo '</div>';
		echo '</div>';
		?>
					</div>
					
					<div class="modal-footer-">
						<div class="container mt-3">
							<div class="row justify-content-md-center">
								<div class="col-lg-4">
									<button type="button" class="btn btn-info btn-block" onClick="Modal(<?php echo $c;?>,<?php echo $c-1;?>)"><i class="fas fa-arrow-alt-circle-left"></i> Anterior</button>
								</div>
								<div class="col-lg-4">
									<button type="button" class="<?php echo $clase_boton;?>" id="boton_marcar_<?php echo $d['id_area'].'_'.$d1['id'];?>" onClick="Marcar(<?php echo $d['id_area'].','.$d1['id'];?>)"><?php echo $boton_marcar;?></button>
								</div>
								<div class="col-lg-4">
									<button type="button" class="btn btn-info btn-block"onClick="Modal(<?php echo $c;?>,<?php echo $c+1;?>)">Siguiente <i class="fas fa-arrow-alt-circle-right"></i></button>
								</div>
							</div>
						</div>
					</div>
    			</div>
  			</div>
		</div>
		<?php
	}
	?>
  
	<!-- JavaScript files-->
	<script src="js/icons.js"></script>

	<!-- jQuery-->
	<script src="js/jquery.min.js"></script>

	<!-- Bootstrap JavaScript Bundle (Popper.js included)-->
	<script src="js/bootstrap.bundle.min.js"></script>

	<!-- Owl Carousel-->
	<script src="js/owl.carousel/owl.carousel.js"></script>
	<script src="js/owl.carousel/owl.carousel2.thumbs.min.js"></script>

	<!-- NoUI Slider (price slider)-->
	<script src="js/nouislider/nouislider.min.js"></script>

	<!-- Smooth scrolling-->
	<script src="js/smooth-scroll.polyfills.min.js"></script>

	<!-- Lightbox -->
	<script src="js/ekko-lightbox/ekko-lightbox.min.js"></script>
	<!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
	<script src="js/object-fit-images/ofi.min.js"></script>

	<!-- SwwetAlert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!--Validación-->
	<script src="js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="js/localization/messages_es.min.js" type="text/javascript"></script>
	
	<!--Countdown-->
	<script src="js/jquery.countdown.min.js" type="text/javascript"></script>

	<script src="js/main.js?v=<?php echo rand();?>" type="text/javascript"></script>
	<script>
		$('.tiempo').countdown('<?php echo $tiempo;?>', {elapse: true})
			.on('update.countdown', function(event) {
			var $this = $(this);
			if (event.elapsed) 
			{
				//Cerrar();
				//$this.html(event.strftime('After end: <span>%H:%M:%S</span>'));
			} 
			else 
			{
				$this.html(event.strftime('<span>%H:%M:%S</span>'));
			}
		});
		
		$( document ).ready(function() {
			console.log( "ready!" );
			$('.contenedor_botones').hide();
			$('#contenedor_botones_1').show();
		});
		
		$('#check').change(function() {
			if($(this).is(":checked")) {
				$('#boton_aceptar').attr('disabled',false);
			}
			else{
				$('#boton_aceptar').attr('disabled',true);
			}
		});
		
		
		function Guardar(id_area,id_reactivo,id_respuesta)
		{
			console.log('reactivo:'+id_reactivo+' '+id_respuesta);
			$.ajax({
					type: 'POST',
					url: 'ajax/guardar',
					dataType: "json",
					data: {
						id_area:id_area,
						id_reactivo:id_reactivo,
						id_respuesta:id_respuesta,
					},
					cache:false,
					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) 
					{
						console.log(data);
						if (data.avance != null)
						{
							$('.bar_total').html(data.avance+'%');
							$('.bar_total').css('width',data.avance+'%');
							$('.bar_total').removeClass('bg-danger');
							$('.bar_total').removeClass('bg-warning');
							$('.bar_total').removeClass('bg-success');
							$('.bar_total').addClass(data.clase);
							if (data.avance >= 95)
							{
								$('#btn_finalizar').prop('disabled', false); 
							}
							else
							{
								$('#btn_finalizar').prop('disabled', true); 
							}
						}
					}
				});
			$( '#boton_reactivo_'+id_area+'_'+id_reactivo ).addClass( "btn-success" );
		}
		
		function Marcar(id_area,id_reactivo){
			
			//$( '#boton_reactivo_'+id_area+'_'+id_reactivo ).addClass( "btn-success" );
			
			if ($( '#boton_reactivo_'+id_area+'_'+id_reactivo ).hasClass( "btn-secondary" ))
			{
				//Marcar pregunta
				$( '#boton_reactivo_'+id_area+'_'+id_reactivo ).removeClass( "btn-secondary" );
				$( '#boton_reactivo_'+id_area+'_'+id_reactivo ).addClass( "btn-warning" );
				
				//Cambiar Botón de marcar
				$( '#boton_marcar_'+id_area+'_'+id_reactivo ).removeClass( "btn-warning" );
				$( '#boton_marcar_'+id_area+'_'+id_reactivo ).addClass( "btn-secondary" );
				$( '#boton_marcar_'+id_area+'_'+id_reactivo ).html( '<i class="fas fa-undo"></i> Desmarcar pregunta' );
				
				$.ajax({
					type: 'POST',
					url: 'ajax/marcar',
					dataType: "json",
					data: {
						id_area:id_area,
						id_reactivo:id_reactivo,
						marcar:1,
					},
					cache:false,
					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) 
					{
						console.log(data);
					}
				});
				
			}
			else
			{
				//Desmarcar Marcar pregunta
				$( '#boton_reactivo_'+id_area+'_'+id_reactivo ).removeClass( "btn-warning" );
				$( '#boton_reactivo_'+id_area+'_'+id_reactivo ).addClass( "btn-secondary" );
				
				//Cambiar Botón de marcar
				$( '#boton_marcar_'+id_area+'_'+id_reactivo ).removeClass( "btn-secondary" );
				$( '#boton_marcar_'+id_area+'_'+id_reactivo ).addClass( "btn-warning" );
				$( '#boton_marcar_'+id_area+'_'+id_reactivo ).html( '<i class="fas fa-check-circle"></i> Marcar pregunta' );
				
				$.ajax({
					type: 'POST',
					url: 'ajax/marcar',
					dataType: "json",
					data: {
						id_area:id_area,
						id_reactivo:id_reactivo,
						marcar:0,
					},
					cache:false,
					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) 
					{
						console.log(data);
					}
				});
			}
		}
		
		function Ver(id_area)
		{
			$('.contenedor_botones').hide();
			$('#contenedor_botones_'+id_area).show();
			
			$('.boton_area').removeClass('btn-success');
			$('#boton_area_'+id_area).addClass('btn-success');
			
		}
		
		function Modal(cierra, abre){
			console.log("cierra"+cierra+"abre"+abre);
			$('.modal_'+cierra).modal('toggle');
			$('.modal_'+abre).modal('toggle');
			
			$('.modal_'+cierra).on('hidden.bs.modal', function (e) {
  				console.log("Abre"+abre);
			})
			if (abre > cierra)
			{
				switch(cierra){
					case 25:{
						Ver(2);
						Swal.fire({
							title: 'Cambio de área',
							icon: 'info',
							width: 500,
							html:
								'<h3>Área de Pensamiento Analítico</h3>',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: '<i class="fas fa-thumbs-up"></i>',
							})
						break;
					}
					case 50:{
						Ver(3);
						Swal.fire({
							title: 'Cambio de área',
							icon: 'info',
							width: 500,
							html:
								'<h3>Estructura de la lengua</h3>',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: '<i class="fas fa-thumbs-up"></i>',
							})
						break;
					}
					case 75:{
						Ver(4);
						Swal.fire({
							title: 'Cambio de área',
							icon: 'info',
							width: 500,
							html:
								'<h3>Compresión lectora</h3>',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: '<i class="fas fa-thumbs-up"></i>',
							})
						break;
					}
					case 100:{
						Ver(5);
						Swal.fire({
							title: 'Cambio de área',
							icon: 'info',
							width: 500,
							html:
								'<h3>Inglés</h3>',
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: '<i class="fas fa-thumbs-up"></i>',
							})
						break;
					}
				}
			}
		}
		
		function Finalizar(){
			Swal.fire({
				title: '',
				icon: 'info',
				width: 500,
				html:
    				'<h3>¿Estás seguro que deseas finalizar el examen?</h3>',
			  	showCancelButton: true,
			  	confirmButtonColor: '#3085d6',
			  	cancelButtonColor: '#d33',
			  	confirmButtonText: '<i class="fas fa-thumbs-up"></i> Sí, estoy seguro',
				cancelButtonText: '<i class="fas fa-thumbs-down"></i> ¡No!',
				}).then((result) => {
			  	if (result.value) {
					console.log(result.value)
					Cerrar();
			  	}
			});
		}
		
		function Cerrar(){
			window.location.replace("finalizar");
		}
	</script>
	
</body>

</html>