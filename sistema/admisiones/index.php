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
							<div class="row">
								<h1>Conversiones de prospectos a alumnos</h1>
								<div class="col-sm-12">
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="#" class="thumbnail" style="text-decoration: none;background-color: #428bca;color:white;">
											<h2 class="text-center"><i class="fas fa-percentage" ></i> Tasa de conversión del día</h2>
											<h1 class="text-center" id="convdia">0%</h1>
											<p>Prospectos registrados: <label for="" id="regdia"></label></p>
											<p>Conversión a alumno: <label for="" id="alumdia"></label></p>
										</a>
										
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="#" class="thumbnail" style="text-decoration: none;background-color: #5bc0de;color:white;">
											<h2 class="text-center"><i class="fas fa-percentage" ></i> Tasa de conversión semanal</h2>
											<h1 class="text-center" id="convsemanal">0%</h1>
											<p>Prospectos registrados: <label for="" id="regsemana"></label></p>
											<p>Conversión a alumno: <label for="" id="alumsemana"></label></p>
										</a>
									</div>
									<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
										<a href="#" class="thumbnail" style="text-decoration: none;background-color: #f0ad4e;color:white;">
											<h2 class="text-center"><i class="fas fa-percentage" ></i> Tasa de conversión mensual</h2>
											<h1 class="text-center" id="convmensual">0%</h1>
											<p>Prospectos registrados: <label for="" id="regmes"></label></p>
											<p>Conversión a alumno: <label for="" id="alummes"></label></p>
										</a>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<a href="#" class="thumbnail" style="text-decoration: none;background-color: #5cb85c;color:white;">
											<h2 class="text-center"><i class="fas fa-percentage" ></i> Tasa de conversión del año presente</h2>
											<h1 class="text-center" id="convanio">0%</h1>
											<p>Prospectos registrados: <label for="" id="reganio"></label></p>
											<p>Conversión a alumno: <label for="" id="alumanio"></label></p>
										</a>
									</div>
								</div>
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
						<div class="panel-body">
							<h2>Graficas Prospectos <span id="totalesprospectos"></span></h2>
							<div class="row">
								<div class="col-sm-6">
									<div id="container5" style="width:100%; height:400px;"></div>
								</div>
								<div class="col-sm-6">
									<div id="container6" style="width:100%; height:400px;"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div id="container7" style="width:100%; height:400px;"></div>
								</div>
								<div class="col-sm-6">
									<div id="container8" style="width:100%; height:400px;"></div>
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
				$('#totalesinscritos').html("con un total de "+data.totalinscritos.Total+" inscritos en este campus");
				$('#totalesprospectos').html("con un total de "+data.totalprospectos.Total+" registrados en este campus");
				$('#convdia').html(data.conversiondeldia.Total+"%");
				$('#convsemanal').html(data.conversionsemanal.Total+"%");
				$('#convmensual').html(data.conversiondelmes.Total+"%");
				$('#convanio').html(data.conversiondelanio.Total+"%");

				$('#regdia').html(data.conversiondeldia.registro);
				$('#alumdia').html(data.conversiondeldia.alumno);

				$('#regsemana').html(data.conversionsemanal.registro);
				$('#alumsemana').html(data.conversionsemanal.alumno);

				$('#regmes').html(data.conversiondelmes.registro);
				$('#alummes').html(data.conversiondelmes.alumno);

				$('#reganio').html(data.conversiondelanio.registro);
				$('#alumanio').html(data.conversiondelanio.alumno);

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
					colors: ['#3d96ae', '#92A8CD', '#A47D7C', '#B5CA92' ],
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
							name: "Total: "+data.totalinscritos.Total,
							data: [Number(data.graficascarrerasalumnos.Carreras.administracion_mercadotecnia),
									Number(data.graficascarrerasalumnos.Carreras.derecho),
									Number(data.graficascarrerasalumnos.Carreras.educacion_preescolar),
									Number(data.graficascarrerasalumnos.Carreras.educacion_primaria),
									Number(data.graficascarrerasalumnos.Carreras.enfermeria),
									Number(data.graficascarrerasalumnos.Carreras.fisioterapia),
									Number(data.graficascarrerasalumnos.Carreras.nutricion),
									Number(data.graficascarrerasalumnos.Carreras.psicologia),
									Number(data.graficascarrerasalumnos.Carreras.enfermeria_cuidados_intensivos),
									Number(data.graficascarrerasalumnos.Carreras.enfermeria_pediatrica),
									Number(data.graficascarrerasalumnos.Carreras.enfermeria_quirurgica),
									Number(data.graficascarrerasalumnos.Carreras.gestion_docencia_servicios_enfermeria),
									Number(data.graficascarrerasalumnos.Carreras.derecho_procesal_penal),
									Number(data.graficascarrerasalumnos.Carreras.innovacion_desarrollo_educativos),
									Number(data.graficascarrerasalumnos.Carreras.salud_publica),
									Number(data.graficascarrerasalumnos.Carreras.doctorado_educacion),
									Number(data.graficascarrerasalumnos.Carreras.medico_cirujano),
									Number(data.graficascarrerasalumnos.Carreras.turismo)]
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
					colors: ['#17202A', '#F1948A', '#0E6251', '#EC7063', '#3FB2AA', '#3FB270', '#FCEB93', '#7F8C8D', '#FF8700', '#54412C'],
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
							[data.graficasinstitucionesalumnos.instituciones[0].nombre, Number(data.graficasinstitucionesalumnos.instituciones[0].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[1].nombre, Number(data.graficasinstitucionesalumnos.instituciones[1].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[2].nombre, Number(data.graficasinstitucionesalumnos.instituciones[2].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[3].nombre, Number(data.graficasinstitucionesalumnos.instituciones[3].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[4].nombre, Number(data.graficasinstitucionesalumnos.instituciones[4].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[5].nombre, Number(data.graficasinstitucionesalumnos.instituciones[5].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[6].nombre, Number(data.graficasinstitucionesalumnos.instituciones[6].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[7].nombre, Number(data.graficasinstitucionesalumnos.instituciones[7].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[8].nombre, Number(data.graficasinstitucionesalumnos.instituciones[8].cantidad)],
							[data.graficasinstitucionesalumnos.instituciones[9].nombre, Number(data.graficasinstitucionesalumnos.instituciones[9].cantidad)]
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
				Highcharts.chart('container5', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Grafica de medios de contacto'
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
								name: 'Facebook',
								y: Number(data.graficasmedioprospectos.Medios.facebook),
								sliced: true,
								selected: true
							}, {
								name: 'Google',
								y: Number(data.graficasmedioprospectos.Medios.google)
							}, {
								name: 'Instagram',
								y: Number(data.graficasmedioprospectos.Medios.instagram)
							},{
								name: 'Whatsapp',
								y: Number(data.graficasmedioprospectos.Medios.whatsapp)
							},{
								name: 'Periodico',
								y: Number(data.graficasmedioprospectos.Medios.periodico)
							},{
								name: 'Ferias Vocacionales',
								y: Number(data.graficasmedioprospectos.Medios.ferias_vocacionales)
							},{
								name: 'Espectaculares',
								y: Number(data.graficasmedioprospectos.Medios.espectaculares)
							},{
								name: 'Visitas al Plantel',
								y: Number(data.graficasmedioprospectos.Medios.visita_plantel)
							},{
								name: 'Transporte Publico',
								y: Number(data.graficasmedioprospectos.Medios.publicidad_transporte_publico)
							},{
								name: 'Televisión',
								y: Number(data.graficasmedioprospectos.Medios.television)
							},{
								name: 'Recomendación',
								y: Number(data.graficasmedioprospectos.Medios.recomendacion)
							},{
								name: 'Otros',
								y: Number(data.graficasmedioprospectos.Medios.otros)
							}
						]
					}]
				});
				Highcharts.chart('container6', {
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
					colors: [ '#0d4242', '#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92' ],
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
							name: "Total: "+data.totalprospectos.Total,
							data: [Number(data.graficascarreraprospectos.Carreras.administracion_mercadotecnia),
									Number(data.graficascarreraprospectos.Carreras.derecho),
									Number(data.graficascarreraprospectos.Carreras.educacion_preescolar),
									Number(data.graficascarreraprospectos.Carreras.educacion_primaria),
									Number(data.graficascarreraprospectos.Carreras.enfermeria),
									Number(data.graficascarreraprospectos.Carreras.fisioterapia),
									Number(data.graficascarreraprospectos.Carreras.nutricion),
									Number(data.graficascarreraprospectos.Carreras.psicologia),
									Number(data.graficascarreraprospectos.Carreras.enfermeria_cuidados_intensivos),
									Number(data.graficascarreraprospectos.Carreras.enfermeria_pediatrica),
									Number(data.graficascarreraprospectos.Carreras.enfermeria_quirurgica),
									Number(data.graficascarreraprospectos.Carreras.gestion_docencia_servicios_enfermeria),
									Number(data.graficascarreraprospectos.Carreras.derecho_procesal_penal),
									Number(data.graficascarreraprospectos.Carreras.innovacion_desarrollo_educativos),
									Number(data.graficascarreraprospectos.Carreras.salud_publica),
									Number(data.graficascarreraprospectos.Carreras.doctorado_educacion),
									Number(data.graficascarreraprospectos.Carreras.medico_cirujano),
									Number(data.graficascarreraprospectos.Carreras.turismo)]
						}
					]
				});
				Highcharts.chart('container7', {
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
					colors: ['#FF5733', '#900C3F', '#4AA73C', '#F1948A', '#05AFAF', '#17202A', '#6D5AB8', '#2471A3', '#8DCA9D', '#95216F' ],
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
							[data.graficasinstitucionesprospectos.instituciones[0].nombre, Number(data.graficasinstitucionesprospectos.instituciones[0].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[1].nombre, Number(data.graficasinstitucionesprospectos.instituciones[1].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[2].nombre, Number(data.graficasinstitucionesprospectos.instituciones[2].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[3].nombre, Number(data.graficasinstitucionesprospectos.instituciones[3].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[4].nombre, Number(data.graficasinstitucionesprospectos.instituciones[4].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[5].nombre, Number(data.graficasinstitucionesprospectos.instituciones[5].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[6].nombre, Number(data.graficasinstitucionesprospectos.instituciones[6].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[7].nombre, Number(data.graficasinstitucionesprospectos.instituciones[7].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[8].nombre, Number(data.graficasinstitucionesprospectos.instituciones[8].cantidad)],
							[data.graficasinstitucionesprospectos.instituciones[9].nombre, Number(data.graficasinstitucionesprospectos.instituciones[9].cantidad)]
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
				Highcharts.chart('container8', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Graficas de preferencias de horario'
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
								name: 'Matutino',
								y: Number(data.graficashorarioprospectos.horario.matutino),
								sliced: true,
								selected: true
							}, {
								name: 'Vespertino',
								y: Number(data.graficashorarioprospectos.horario.vespertino)
							}, {
								name: 'Indistito',
								y: Number(data.graficashorarioprospectos.horario.indistinto)
							}
						]
					}]
				});
				
				// if(tipo == 'aspirantes'){
				// 	var cal = [];
				// 	var edades = {};
				// 	for(let i = 0; i < data.graficasrangoedad.rangos.length; i++){
				// 		edades.name = data.graficasrangoedad.rangos[i].edad+" Años";
				// 		edades.y    = Number(data.graficasrangoedad.rangos[i].total);
				// 		cal.push({...edades});
				// 	}
				// 	JSON.stringify(cal)
				// 	Highcharts.chart('container4', {
				// 		chart: {
				// 			plotBackgroundColor: null,
				// 			plotBorderWidth: null,
				// 			plotShadow: false,
				// 			type: 'pie'
				// 		},
				// 		title: {
				// 			text: 'Grafica de edades'
				// 		},
				// 		tooltip: {
				// 			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				// 		},
				// 		accessibility: {
				// 			point: {
				// 			valueSuffix: '%'
				// 			}
				// 		},
				// 		plotOptions: {
				// 			pie: {
				// 			allowPointSelect: true,
				// 			cursor: 'pointer',
				// 			dataLabels: {
				// 				enabled: true,
				// 				format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				// 			}
				// 			}
				// 		},
				// 		series: [{
				// 			name: 'Brands',
				// 			colorByPoint: true,
				// 			data: cal
				// 		}]
				// 	});
				// 	Highcharts.chart('container5', {
				// 		chart: {
				// 			plotBackgroundColor: null,
				// 			plotBorderWidth: null,
				// 			plotShadow: false,
				// 			type: 'pie'
				// 		},
				// 		title: {
				// 			text: 'Grafica de genero'
				// 		},
				// 		tooltip: {
				// 			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
				// 		},
				// 		accessibility: {
				// 			point: {
				// 			valueSuffix: '%'
				// 			}
				// 		},
				// 		plotOptions: {
				// 			pie: {
				// 			allowPointSelect: true,
				// 			cursor: 'pointer',
				// 			dataLabels: {
				// 				enabled: true,
				// 				format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				// 			}
				// 			}
				// 		},
				// 		series: [{
				// 			name: 'Brands',
				// 			colorByPoint: true,
				// 			data: [
				// 				{
				// 					name: 'Masculino',
				// 					y: Number(data.graficasgenero.generos.masculino),
				// 					sliced: true,
				// 					selected: true
				// 				}, {
				// 					name: 'Femenino',
				// 					y: Number(data.graficasgenero.generos.femenino)
				// 				}
				// 			]
				// 		}]
				// 	});
				// 	Highcharts.chart('container6', {
				// 		chart: {
				// 			type: 'column'
				// 		},
				// 		title: {
				// 			text: 'Grafica de municipios'
				// 		},
				// 		subtitle: {
				// 			text: ""
				// 		},
				// 		xAxis: {
				// 			type: 'category',
				// 			labels: {
				// 			rotation: -45,
				// 			style: {
				// 				fontSize: '13px',
				// 				fontFamily: 'Verdana, sans-serif'
				// 			}
				// 			}
				// 		},
				// 		yAxis: {
				// 			min: 0,
				// 			title: {
				// 			text: 'Cantidad'
				// 			}
				// 		},
				// 		legend: {
				// 			enabled: false
				// 		},
				// 		colors: ['#89A54E', '#80699B', '#3D96AE', '#DB843D', '#92A8CD', '#A47D7C', '#B5CA92' ],
				// 		tooltip: {
				// 			pointFormat: 'Institución: <b>{point.y:.0f} registrados</b>'
				// 		},
				// 		plotOptions: {                            
				// 			column: {
				// 				colorByPoint: true
				// 			}
				// 		},
				// 		series: [{
				// 			name: 'Municipios',
				// 			data: [
				// 				[data.graficasmunicipios.municipios[0].nombre, Number(data.graficasmunicipios.municipios[0].cantidad)],
				// 				[data.graficasmunicipios.municipios[1].nombre, Number(data.graficasmunicipios.municipios[1].cantidad)],
				// 				[data.graficasmunicipios.municipios[2].nombre, Number(data.graficasmunicipios.municipios[2].cantidad)],
				// 				[data.graficasmunicipios.municipios[3].nombre, Number(data.graficasmunicipios.municipios[3].cantidad)],
				// 				[data.graficasmunicipios.municipios[4].nombre, Number(data.graficasmunicipios.municipios[4].cantidad)],
				// 				[data.graficasmunicipios.municipios[5].nombre, Number(data.graficasmunicipios.municipios[5].cantidad)],
				// 				[data.graficasmunicipios.municipios[6].nombre, Number(data.graficasmunicipios.municipios[6].cantidad)],
				// 				[data.graficasmunicipios.municipios[7].nombre, Number(data.graficasmunicipios.municipios[7].cantidad)],
				// 				[data.graficasmunicipios.municipios[8].nombre, Number(data.graficasmunicipios.municipios[8].cantidad)],
				// 				[data.graficasmunicipios.municipios[9].nombre, Number(data.graficasmunicipios.municipios[9].cantidad)]
				// 			],
				// 			dataLabels: {
				// 				enabled: true,
				// 				rotation: -90,
				// 				color: '#FFFFFF',
				// 				align: 'right',
				// 				format: '{point.y:.0f}', // one decimal
				// 				y: 10, // 10 pixels down from the top
				// 				style: {
				// 					fontSize: '13px',
				// 					fontFamily: 'Verdana, sans-serif'
				// 				}
				// 			}
				// 		}]
				// 	});
				// }
			}
		})
	});
</script>
</html>