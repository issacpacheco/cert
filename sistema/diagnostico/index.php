<?php
include( "includes/config.php" );
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<title>Panel de administración</title>

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
							<h2 class="text-center">Panel de Administración</h2>
                        </div>
						<div class="panel-body">
							<h1 class="text-center">CERT EXANI II</h1>
							<div class="row">
								<div class="col-md-12">
									<p>
									</p>
								</div>	
							</div>
							
						</div>
					</div>
				</div>
            </div>
		
		
			<div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-heading">
                            Avance
                        </div>
                        <div class="panel-body">
                            <canvas id="myPieChart"></canvas>
                        </div>
						<div class="panel-footer">
							<a href="aspirantes_sin_presentar" class="btn btn-warning btn-block">Ver aspirantes sin presentar</a>
						</div>
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
				$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes");
				$total = mysqli_num_rows($consulta);
				
				$consulta = mysqli_query($conexion,"SELECT DISTINCT id_aspirante FROM examen");
				$finalizado = mysqli_num_rows($consulta);
				
				?>
                var ctx = $("#myPieChart");
                var dataPie = {
                    labels: [
                        "Finalizados",
                        "Sin presentar",
                    ],
                    datasets: [
                        {
                            data: [<?php echo $finalizado;?>, <?php echo $total - $finalizado;?>],
                            backgroundColor: [
                                "#0ec8a2",
                                "#314557"
                            ]
                        }]
                };
                var myPieChart = new Chart(ctx,{
                    type: 'pie',
                    data: dataPie
                });


            </script>
			

		</div>

	</div>

</body>

</html>