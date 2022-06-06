<?php 
include("includes/config.php");
if (isset($_POST['id']))
{
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	$titulo = 'Resultados de '.$d['nombre'].' '.$d['paterno'].' '.$d['materno'];
}
else{
	header("location:aspirantes.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $titulo;?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height">
    <link rel="shortcut icon" href="images/favicon.png"/>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'/>
    
    <!-- Styling -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="addons/toastr/toastr.min.css"/>
    <link rel="stylesheet" href="addons/fontawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="addons/ionicons/css/ionicons.css"/>
    <link rel="stylesheet" href="addons/noUiSlider/nouislider.min.css"/>

    <link rel="stylesheet" href="styles/style.css"/>
    <link rel="stylesheet" href="styles/theme-dark.css" class="theme" />
    <!-- End of Styling -->
	
	
</head>
<body class="hold-transition">

    <!-- Header -->
    <?php include("includes/header.php");?>
    <!-- End of Header -->

    <!-- Navigation -->
    <?php include("includes/menu.php");?>
    <!-- End of Navigation -->

    <!-- Scroll up button -->
    <a class="scroll-up"><i class="fa fa-chevron-up"></i></a>
    <!-- End of scroll up button -->

    <!-- Main content-->
    <div class="content">
		 <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <?php echo $titulo;?>
                        </div>
                        <div class="panel-body" id="resultado">
							<?php
							$consulta = mysqli_query($conexion,"SELECT * FROM areas");
							while ($d=mysqli_fetch_array($consulta))
							{
								$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND id_aspirante = '".$_POST['id']."'");
								$reactivos = mysqli_num_rows($consulta1);
								
								$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND correcta = '1' AND id_aspirante = '".$_POST['id']."'");
								$correctas = mysqli_num_rows($consulta1);
								
								$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND correcta = '0' AND id_aspirante = '".$_POST['id']."'");
								$incorrectas = mysqli_num_rows($consulta1);
								
								$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND id_respuesta = '0' AND id_aspirante = '".$_POST['id']."'");
								$sin_responder = mysqli_num_rows($consulta1);
							?>
                        	<div class="row">
								<div class="col-lg-6">
									<table class="table table-bordered table-striped">
										<tr class="text-dark">
											<td width="50%">Área</td>
											<td><strong><?php echo $d['nombre'];?></strong></td>
										</tr>
										<tr class="text-info">
											<td width="50%">Reactivos</td>
											<td><strong><?php echo $reactivos;?></strong></td>
										</tr>
										<tr class="text-success">
											<td width="50%">Correctas</td>
											<td><strong><?php echo $correctas;?></strong></td>
										</tr>
										<tr class="text-danger">
											<td width="50%">Incorrectas</td>
											<td><strong><?php echo $incorrectas;?></strong></td>
										</tr>
										<tr class="text-warning">
											<td width="50%">Sin responder</td>
											<td><strong><?php echo $sin_responder;?></strong></td>
										</tr>
									</table>
								</div>
								<div class="col-lg-6 hidden-print">
									<canvas id="piechart_<?php echo $d['id'];?>"></canvas>
								</div>
							</div>
							<?php
							}
							$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_aspirante = '".$_POST['id']."'");
							$total = mysqli_num_rows($consulta1);
							
							$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE correcta = '1' AND id_aspirante = '".$_POST['id']."'");
							$correctas = mysqli_num_rows($consulta1);
							
							$porcentaje = ($correctas * 100) / $total;
							?>
							<div class="row">
								<div class="col-lg-12">
									<table class="table table-bordered">
										<tr>
											<td>Número de aciertos</td>
											<td><strong><?php echo $correctas;?></strong></td>
										</tr>
										<tr>
											<td>Porcentaje de aciertos</td>
											<td><strong><?php echo number_format($porcentaje,2);?>%</strong></td>
										</tr>
									</table>
								</div>
							</div>
                        </div>
						<button type="button" class="btn btn-info btn-block" onClick="Imprimir()"><i class="fa fa-print"></i> Imprimir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <?php include("includes/footer.php");?>
        <!-- End of Footer -->
    </div>
    <!-- End of Main content-->

    <div class="scripts">

        <!-- Addons -->
        <script src="addons/jquery/jquery.min.js"></script>
        <script src="addons/jquery-ui/jquery-ui.min.js"></script>
        <script src="addons/bootstrap/js/bootstrap.min.js"></script>
        <script src="addons/fullcalendar/lib/moment.min.js"></script>
        <script src="addons/pacejs/pace.min.js"></script>

        <!-- scripts -->
        <script src="addons/scripts.js"></script>
		
		<!-- Current page scripts -->
        <div class="current-scripts">
			<!-- Current page addons -->
            <script src="addons/chartjs/Chart.bundle.min.js"></script>
			
			<!-- Charts -->
            <script>
                
				<?php
				$consulta = mysqli_query($conexion,"SELECT * FROM areas");
				while ($d = mysqli_fetch_array($consulta))
				{
					$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND id_aspirante = '".$_POST['id']."'");
					$reactivos = mysqli_num_rows($consulta1);

					$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND correcta = '1' AND id_aspirante = '".$_POST['id']."'");
					$correctas = mysqli_num_rows($consulta1);

					$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND correcta = '0' AND id_aspirante = '".$_POST['id']."'");
					$incorrectas = mysqli_num_rows($consulta1);

					$consulta1 = mysqli_query($conexion,"SELECT * FROM examen WHERE id_area = '".$d['id']."' AND id_respuesta = '0' AND id_aspirante = '".$_POST['id']."'");
					$sin_responder = mysqli_num_rows($consulta1);
					
				?>
                var ctx = $("#piechart_<?php echo $d['id'];?>");
                var dataPie = {
                    labels: [
                        "Correctas",
                        "Incorrectas",
						"Sin responder"
                    ],
                    datasets: [
                        {
                            data: [<?php echo $correctas.','.$incorrectas.','.$sin_responder;?>],
                            backgroundColor: [
                                "#00c099",
                                "#f95858",
								"#fdb029"
                            ]
                        }]
                };
                var myPieChart_<?php echo $d['id'];?> = new Chart(ctx,{
                    type: 'pie',
                    data: dataPie
                });
				<?php
				}
				?>
				
				
				function Imprimir() 
				{
					var divToPrint=document.getElementById('resultado');
					var newWin=window.open('','<?php echo $titulo;?>');
					newWin.document.open();
					newWin.document.write('<html><head><link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/><link rel="stylesheet" href="addons/toastr/toastr.min.css"/><link rel="stylesheet" href="addons/fontawesome/css/font-awesome.css"/><link rel="stylesheet" href="addons/ionicons/css/ionicons.css"/><link rel="stylesheet" href="addons/noUiSlider/nouislider.min.css"/><link rel="stylesheet" href="styles/style.css"/><link rel="stylesheet" href="styles/theme-dark.css" class="theme" /></head><body onload="window.print()"><h3 class="text-center"><?php echo $titulo;?></h3><br>'+divToPrint.innerHTML+'</body></html>');
					newWin.document.close();
					setTimeout(function(){newWin.close();},10);
				}

            </script>
          
        </div>
		

    </div>

</body>

</html>