<?php
require_once('../includes/conexion.php');
require_once('../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../includes/Mobile_Detect.php');
require_once('../includes/globals.php');
require_once('../includes/funciones.php');
$consulta = mysqli_query($conexion,"SELECT * FROM prospectos WHERE MD5(id) = '".$_GET['token']."'");
if (mysqli_num_rows($consulta)==0)
{
	header("location:./");
}
else
{
	$d = mysqli_fetch_array($consulta);
}

$avance = 0;
$clase_bar = 'bg-danger';	

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

	<!-- Favicon -->
	<link href="assets/img/favicon.png?v=1" rel="icon" type="image/png">
	
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="css/bootstrap.css?v=<?php echo rand();?>" id="theme-stylesheet">

	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
	
	<!-- Font Awesome CSS-->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous">

	<!--Swwetalert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">


	<title>Test Vocacional | Centro Educativo Rodríguez Tamayo</title>
	
	<style>
		body{
			font-family: 'Montserrat', sans-serif;
		}
		.btn-default {
			color: #222F46;
			border:solid 4px #fff;
			background-color: #fff;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.btn-default:hover{
			color: #fff;
			border:solid 4px #fff;
			background-color: transparent;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.btn-default:not(:disabled):not(.disabled):active{
			color: #fff;
			border:solid 4px #fff;
			background-color: transparent;
			box-shadow: 0 4px 6px rgba(50, 50, 93, .11), 0 1px 3px rgba(0, 0, 0, .08);
		}
		.bg-default{
			background: url(assets/img/bg3.jpg) no-repeat center center fixed; 
			background-size: cover;
		}
	</style>
</head>

<body class="bg-default">
	
	<section class="mt-4 pb-3">
    	<div class="container" style="background-color: rgba(255,255,255,0.95); border-radius: 20px">
        	<div class="row">
          		<div class="col-12 col-lg-10 mx-auto text-center mt-5 mb-3 pt-2">
            		<h3 class="mb-4">
						Hola <strong><?php echo $d['nombre'];?></strong>
					</h3>
					
					<h3 class="mb-4">¿Aprecias o conoces? Realmente tus aptitudes.</h3>
					
					<p class="text-justify">A continuación te presentamos una lista de actividades comunes, de las cuales puedes contar con alguna experiencia personal. Ese ejercicio fue diseñado para que descubras tus aptitudes. Procura contestar exactamente, de acuerdo con las instrucciones, pues encontrarás insospechadas cualidades mientras más riguroso seas contigo mismo. Recuerda que este cuestionario debe ser resuelto también en una sola sesión.</p>
					
					<p>No se trata de una medición de tus aptitudes, sino de la opinión que tienes con relación a tus aptitudes en este momento.</p>
					
					<h3>Instrucciones:</h3>
					
					<p>Lee cada pregunta y selecciona el valor correspondiente de tu respuesta.</p>
					
					<p>Antes de elegir una respuesta, recuerda o imagina en qué consiste la respectiva actividad.</p>
					
					<p>Observa que <strong>no se te cuestiona si te gustan las actividades</strong>, se trata de que contestes <strong>qué tan apto te consideras para desempeñarlas.</strong></p>
          		</div>
        	</div>
			<hr>
			
			<h4 class="text-center">TEST VOCACIONAL</h4>
			<div class="row justify-content-md-center mb-5">
				<div class="col-12 col-lg-6">
					<h3 class="text-center">Avance</h3>
					<div class="progress">
                    	<div class="progress-bar bar_total <?php echo $clase_bar;?>" role="progressbar" style="width: <?php echo $avance;?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"><?php echo $avance;?>%</div>
                  	</div>
				</div>
			</div>
			<h4 class="text-center my-5">¿Qué tan apto te consideras para…?</h4>
			<div class="row justify-content-center">
				<div class="col-12 col-lg-8 text-center">
					<form method="post" action="finalizar" id="Form">
						<?php						
						$c=0;
						$consulta = mysqli_query($conexion,"SELECT * FROM tv_reactivos");
						$total = mysqli_num_rows($consulta);
						while ($d = mysqli_fetch_array($consulta))
						{
							$c++;
							$prev = $c == 1 ? 'disabled' : '';
							$next = $c == $total ? 'disabled' : '';
						?>
						<div class="form-wrapper reactivo d-none" id="reactivo_<?php echo $c;?>">
							<h5 class="mb-5"><?php echo $c.'.- '.$d['reactivo'];?></h5>
							<div class="form-group">
								<ul class="list-unstyled list-inline">
                                    <li>
										<label class="radio">
											<input type="radio" name="reactivo_<?php echo $d['id'];?>" value="4" onClick="Radio(<?php echo $d['id'];?>)">
											<span></span>
											Considero ser muy competente.
										</label>
									</li>
									<li>
										<label class="radio">
											<input type="radio" name="reactivo_<?php echo $d['id'];?>" value="3" onClick="Radio(<?php echo $d['id'];?>)">
											<span></span>
											Considero ser competente.
										</label>
									</li>
									<li>
										<label class="radio">
											<input type="radio" name="reactivo_<?php echo $d['id'];?>" value="2" onClick="Radio(<?php echo $d['id'];?>)">
											<span></span>
											Considero ser medianamente competente.
										</label>
									</li>
									<li>
										<label class="radio">
											<input type="radio" name="reactivo_<?php echo $d['id'];?>" value="1" onClick="Radio(<?php echo $d['id'];?>)">
											<span></span>
											Considero ser muy poco competente.
										</label>
									</li>
									<li>
										<label class="radio">
											<input type="radio" name="reactivo_<?php echo $d['id'];?>" value="0" onClick="Radio(<?php echo $d['id'];?>)">
											<span></span>
											Considero ser incompetente.
										</label>
									</li>
								</ul>
							</div>
							<div class="row">
								<div class="col-6">
									<button type="button" class="btn btn-info btn-block my-3" onClick="Cambio(<?php echo ($c-1);?>)" <?php echo $prev;?>><i class="fa fa-chevron-circle-left"></i> Anterior</button>
								</div>
								<div class="col-6">
									<?php
									if ($c==$total)
									{
									?>	
									<button type="button" class="btn btn-success btn-block my-3" id="btn_finalizar" onClick="Finalizar()" disabled><i class="fa fa-check-circle"></i> Finalizar</button>
									
									
									<button type="button" class="btn btn-info btn-block my-3 btn_siguiente d-none" id="btn_siguiente_<?php echo $d['id'];?>" onClick="Cambio(<?php echo ($c+1);?>)" disabled><i class="fa fa-chevron-circle-right"></i> Siguiente</button>
									<?php
									}
									else
									{
									?>
									<button type="button" class="btn btn-info btn-block my-3 btn_siguiente" id="btn_siguiente_<?php echo $d['id'];?>" onClick="Cambio(<?php echo ($c+1);?>)" disabled><i class="fa fa-chevron-circle-right"></i> Siguiente</button>
									<?php
									}
									?>
									
								</div>
							</div>
						</div>
						<?php
						}
						?>
						<input type="hidden" name="token" value="<?php echo $_GET['token'];?>">
						<input type="hidden" name="finalizar" value="1">
					</form>
				</div>
			</div>	
      	</div>		
    </section>
		
	<!-- jQuery-->
	<script src="js/jquery.min.js"></script>

	<!-- Bootstrap JavaScript Bundle (Popper.js included)-->
	<script src="js/bootstrap.bundle.min.js"></script>
	
	<script>
		//Total de reactivos
		var total = <?php echo $total;?>;
		var respuestas = 0;
		var checked = 0;
		
		$( document ).ready(function() {
			//console.log( "ready!" );
			$('#reactivo_1').removeClass('d-none');
		});
		
		$('input[type=radio]').change(function() {
			//console.log('Cambio del radio');
			var check = true;
			$("input:radio").each(function(){
            	var name = $(this).attr("name");
            	if($("input:radio[name="+name+"]:checked").length == 0){
                	check = false;
            	}
			});
			
			if (check){
				console.log('Todos son checked');
				//$('.btn_finalizar').removeClass('d-none');
				$('#btn_finalizar').prop('disabled',false); 
				//$('.btn_siguiente').addClass('d-none');
			}				
		});
		
		function Cambio(id){
			//console.log(id);
			$('.reactivo').addClass('d-none');
			$('#reactivo_'+id).removeClass('d-none');
		}
		
		function Finalizar(){
			$('#Form').submit();
		}
		
		function Radio(id)
		{
			if ($('#btn_siguiente_'+id).is(':disabled'))
			{
				respuestas++;
				//console.log(respuestas);
				var avance = Math.ceil((respuestas*100)/total);
				var clase = '';

				if (avance < 50)
				{
					clase = 'bg-danger';	
				}
				else if (avance >= 50 && avance < 70)
				{
					clase = 'bg-warning';
				}
				else if (avance >= 70)
				{
					clase = 'bg-success';
				}

				$('.bar_total').html(avance+'%');
				$('.bar_total').css('width',avance+'%');
				$('.bar_total').removeClass('bg-danger');
				$('.bar_total').removeClass('bg-warning');
				$('.bar_total').removeClass('bg-success');
				$('.bar_total').addClass(clase);
			}
			
			console.log('Radio: '+$("input[name='reactivo_"+id+"']:radio").is(':checked'));
			
			var valor = $('input:radio[name=reactivo_'+id+']:checked').val() | '';
			if( $("input[name='reactivo_"+id+"']:radio").is(':checked')) 
			{
				$('#btn_siguiente_'+id).prop('disabled',false);
			}
						
		}
		
	</script>
	
</body>

</html>