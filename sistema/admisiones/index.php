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
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300" rel="stylesheet" type="text/css"/>
    
    <!-- Styling -->
    <link rel="stylesheet" href="addons/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
    <link rel="stylesheet" href="styles/style.css"/>
	<link rel="stylesheet" href="styles/<?php echo $theme;?>" class="theme" />
    <!-- End of Styling -->
	<!----Charts---->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/item-series.js"></script>

</head>

<body class="hold-transition">

	<!-- Header -->
	<?php include("includes/header.php");?>
	<!-- End of Header -->

	<!-- Navigation -->
	<?php include("includes/menu.php");?>
	<!-- End of Navigation -->

	<!-- Scroll up button -->
	<a class="scroll-up"><i class="fas fa-chevron-up"></i></a>
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
							<h1 class="text-center">ADMISIONES</h1>
							<div class="row">
								
							</div>
						</div>
						<div class="panel-body">
							<h2>Graficas Alumnos <span id="totalesinscritos"></span></h2>
							<div class="row">
								<div class="col-sm-6">
									<div id="container" style="width:100%; height:400px;"></div>
								</div>
								<div class="col-sm-6">
									<div id="container2" style="width:100%; height:400px;"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div id="container3" style="width:100%; height:400px;"></div>
								</div>
								<div class="col-sm-6">
									<div id="container4" style="width:100%; height:400px;"></div>
								</div>
							</div>
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

        </div>

    </div>

</body>
<script>
	$(document).ready(function() {
		$.ajax({
			type: 'POST',
			url: 'ajax/panel.php',
			data: {id_campus: <?php echo $_SESSION['campus']; ?>},
			dataType: 'json',
			success: function(data){
				$('#totalesinscritos').html("con un total de "+data.totalinscritos.Total+" inscritos en este campus")
				Highcharts.chart('container', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Grafica de genero'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					accessibility: {
						point: {
						valueSuffix: '%'
						}
					},
					plotOptions: {
						pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						}
						}
					},
					series: [{
						name: 'Brands',
						colorByPoint: true,
						data: [
							{
								name: 'Masculino',
								y: Number(data.graficasgenero.generos.masculino),
								sliced: true,
								selected: true
							}, {
								name: 'Femenino',
								y: Number(data.graficasgenero.generos.femenino)
							}
						]
					}]
				});
				Highcharts.chart('container2', {
					chart: {
						type: 'bar'
					},
					title: {
						text: 'Grafica de ofertas educativas'
					},
					subtitle: {
						text: 'Medios donde se enterarón de nosotros'
					},
					xAxis: {
						categories: ['Administración y Mercadotecnia', 
									'Derecho', 
									'Educación Preescolar', 
									'Educación Primaria (ISEN)', 
									'Enfermería', 
									'Fisioterapia', 
									'Nutrición', 
									'Psicología', 
									'Enfermería en Cuidados Intensivos', 
									'Enfermería Pediátrica', 
									'Enfermería Quirúrgica', 
									'Gestión y Docencia en los servicios de Enfermería',
									'Derecho Procesal Penal',
									'Innovación y Desarrollo Educativos',
									'Salud Pública',
									'Doctorado en Educación',
									'Médico cirujano',
									'Turismo'
									],
						title: {
							text: null
						}
					},
					yAxis: {
					min: 0,
					title: {
						text: 'Totales',
						align: 'high'
					},
					labels: {
						overflow: 'justify'
					}
					},
					tooltip: {
						valueSuffix: ' en total'
					},
					colors: [ '#AA4643', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92' ],
					plotOptions: {
						bar: {
							dataLabels: {
							enabled: true
							}
						},
						column: {
							colorByPoint: true
						}
					},
					legend: {
						layout: 'vertical',
						align: 'right',
						verticalAlign: 'top',
						x: -40,
						y: 80,
						floating: true,
						borderWidth: 1,
						backgroundColor:
							Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
						shadow: true
					},
					credits: {
						enabled: false
					},
					series: [
						{
							name: "Total",
							data: [Number(data.graficascarreras.Carreras.administracion_mercadotecnia),
									Number(data.graficascarreras.Carreras.derecho),
									Number(data.graficascarreras.Carreras.educacion_preescolar),
									Number(data.graficascarreras.Carreras.educacion_primaria),
									Number(data.graficascarreras.Carreras.enfermeria),
									Number(data.graficascarreras.Carreras.fisioterapia),
									Number(data.graficascarreras.Carreras.nutricion),
									Number(data.graficascarreras.Carreras.psicologia),
									Number(data.graficascarreras.Carreras.enfermeria_cuidados_intensivos),
									Number(data.graficascarreras.Carreras.enfermeria_pediatrica),
									Number(data.graficascarreras.Carreras.enfermeria_quirurgica),
									Number(data.graficascarreras.Carreras.gestion_docencia_servicios_enfermeria),
									Number(data.graficascarreras.Carreras.derecho_procesal_penal),
									Number(data.graficascarreras.Carreras.innovacion_desarrollo_educativos),
									Number(data.graficascarreras.Carreras.salud_publica),
									Number(data.graficascarreras.Carreras.doctorado_educacion),
									Number(data.graficascarreras.Carreras.medico_cirujano),
									Number(data.graficascarreras.Carreras.turismo)]
						}
					]
				});
				Highcharts.chart('container3', {
					chart: {
						type: 'column'
					},
					title: {
						text: 'Grafica de institución de procedencia'
					},
					subtitle: {
						text: ""
					},
					xAxis: {
						type: 'category',
						labels: {
						rotation: -45,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
						}
					},
					yAxis: {
						min: 0,
						title: {
						text: 'Cantidad'
						}
					},
					legend: {
						enabled: false
					},
					colors: ['#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92' ],
					tooltip: {
						pointFormat: 'Institución: <b>{point.y:.0f} registrados</b>'
					},
					plotOptions: {                            
						column: {
							colorByPoint: true
						}
					},
					series: [{
						name: 'Instituciones',
						data: [
							[data.graficasinstituciones.instituciones[0].nombre, Number(data.graficasinstituciones.instituciones[0].cantidad)],
							[data.graficasinstituciones.instituciones[1].nombre, Number(data.graficasinstituciones.instituciones[1].cantidad)],
							[data.graficasinstituciones.instituciones[2].nombre, Number(data.graficasinstituciones.instituciones[2].cantidad)],
							[data.graficasinstituciones.instituciones[3].nombre, Number(data.graficasinstituciones.instituciones[3].cantidad)],
							[data.graficasinstituciones.instituciones[4].nombre, Number(data.graficasinstituciones.instituciones[4].cantidad)],
							[data.graficasinstituciones.instituciones[5].nombre, Number(data.graficasinstituciones.instituciones[5].cantidad)],
							[data.graficasinstituciones.instituciones[6].nombre, Number(data.graficasinstituciones.instituciones[6].cantidad)],
							[data.graficasinstituciones.instituciones[7].nombre, Number(data.graficasinstituciones.instituciones[7].cantidad)],
							[data.graficasinstituciones.instituciones[8].nombre, Number(data.graficasinstituciones.instituciones[8].cantidad)],
							[data.graficasinstituciones.instituciones[9].nombre, Number(data.graficasinstituciones.instituciones[9].cantidad)]
						],
						dataLabels: {
							enabled: true,
							rotation: -90,
							color: '#FFFFFF',
							align: 'right',
							format: '{point.y:.0f}', // one decimal
							y: 10, // 10 pixels down from the top
							style: {
								fontSize: '13px',
								fontFamily: 'Verdana, sans-serif'
							}
						}
					}]
				});
				var cal = [];
				var edades = {};
				for(let i = 0; i < data.graficasrangoedad.rangos.length; i++){
					edades.name = data.graficasrangoedad.rangos[i].edad+" Años";
					edades.y    = Number(data.graficasrangoedad.rangos[i].total);
					cal.push({...edades});
				}
				JSON.stringify(cal)
				Highcharts.chart('container4', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Grafica de edades'
					},
					tooltip: {
						pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
					},
					accessibility: {
						point: {
						valueSuffix: '%'
						}
					},
					plotOptions: {
						pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							format: '<b>{point.name}</b>: {point.percentage:.1f} %'
						}
						}
					},
					series: [{
						name: 'Brands',
						colorByPoint: true,
						data: cal
					}]
				});
			}
		})
	});
</script>
</html>