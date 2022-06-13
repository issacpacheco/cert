<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title><?php echo $title;?></title>

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
	
    
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	
	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">

    <!----DatePicker JQuery---->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!----Charts---->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/variable-pie.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/item-series.js"></script>
    <!--Date Picker-->
    <!-- <link rel="stylesheet" type="text/css" href="plugins/datepicker/datepicker3.css"> -->
    <!-- Daterange Picker -->
  	<link rel="stylesheet" href="plugins/bootstrap-daterangepicker/daterangepicker.css">
	
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
                    <div class="panel panel-heading">
                        <div class="panel-heading">
                            Reportes
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Selecciona tipo de reporte</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="" selected>Seleccione una opción</option>                    
                                    <option value="alumnos">Alumnos</option>
                                    <option value="prospectos">Prospectos</option>
                                    <option value="aspirantes">Aspirantes</option>
                                    <option value="completos">Aspirantes Completos</option>
                                    <option value="diagnostico">Aspirantes con examen de diagnóstico</option>
                                    <option value="psicometrico">Aspirantes con examen psicométrico</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Selecciona un campus</label>
                                <select name="campus" id="campus" class="form-control">
                                    <option value="0" selected>Seleccione un campus</option>
                                    <option value="1">Mérida</option>
                                    <option value="2">Ticul</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Rango de fechas</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="fechas"  name="fechas" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-success btn-block btn-lg" onclick="obtener_reporte();" >Reporte <i class="fa fa-print"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="panel" id="reportes">
                                        </div>
                                    </div>
                                </div>
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
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div id="container5" style="width:100%; height:400px;"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="container6" style="width:100%; height:400px;"></div>
                                    </div>
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
        <script src="addons/scripts.js"></script>
		
		<!-- Current page scripts -->
        <div class="current-scripts">
			<!-- DataTables -->
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
			<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
			<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <!-- Date-range-picker -->
            <script src="plugins/moment/min/moment.min.js"></script>
            <script src="plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
			<!--SweetAlert-->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
            <!-- Libreria español -->
		    <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/es.js"></script> -->
            
        </div>

    </div>

</body>
<script>
    $.datepicker.setDefaults($.datepicker.regional["es"]);
    $("#fecha_inicial").datepicker({
        dateFormat: "yy-mm-dd",
        closeText: 'Cerrar',
        changeMonth: true,
        changeYear: true,
        prevText: '<Ant',
        nextText: 'Sig>',
        onSelect: function (selectedDate) {
            $('#fecha_final').datepicker('option', 'minDate', selectedDate);
        }
    });

    $("#fecha_final").datepicker({
        dateFormat: "yy-mm-dd",
        closeText: 'Cerrar',
        changeMonth: true,
        changeYear: true,
        prevText: '<Ant',
        nextText: 'Sig>'
    });
    $('#fechas').daterangepicker({
        "locale": {
            "format": "DD/MM/YYYY",
            "separator": " - ",
            "applyLabel": "Seleccionar",
            "cancelLabel": "Cancelar",
            "fromLabel": "De",
            "toLabel": "Al",
            "customRangeLabel": "Custom",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Septiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        }
    });
    

    function obtener_reporte(){
        var tipo            = document.getElementById("tipo").value;
        var fechas          = document.getElementById("fechas").value;
        var campus          = document.getElementById("campus").value;
        if(tipo == 'alumno'){
            var list = "0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15";
        }else if(tipo == 'prospectos'){
            var list = "0,1,2,3,4,5,6,7,8,9";
        }else if(tipo == 'aspirantes' || tipo == 'completos' || tipo == 'psicometrico' || tipo == 'diagnostico'){
            var list = "0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17";
        }
        
        $.ajax({
            type: "POST",
            url: "ajax/obtener_reportes",
            data: {tipo: tipo, fecha: fechas, campus: campus},
            success: function (response){
                $("#reportes").html(response);
                $(document).ready(function(){	
					$('#tabla').DataTable( {
					   "language": { url:"//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"},
						"ordering": true,
						"paging": true,
						"searching": true,
						"info": true,
						"fixedHeader": true,
						"autoFill": false,
						"colReorder": false,
						"fixedColumns": false,
						"responsive": true,
						"dom": 'Bfrtip',
						"pageLength": 10,
						"order": [[ 2, "desc" ]],
						"buttons": [
                            {
								extend: 'excel',
								exportOptions: {
									columns: [list]
								},
								text: 'Excel <i class="fal fa-file-excel"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								exportOptions: {
									columns: [list]
								},
								text: 'PDF <i class="fal fa-file-pdf"></i>',
								messageTop: 'LISTA DE ASPIRANTES REGISTRADOS',
								footer: true
							},
							{
								extend: 'print',
								exportOptions: {
									columns: [list]
								},
								text: 'Imprimir <i class="fal fa-print"></i>',
								messageTop: '',
								footer: true
							},
                        ]
					} );
				});
            }
        });
        if(tipo == 'prospectos' || tipo == 'alumnos' || tipo == 'aspirantes'){
                $.ajax({
                type: 'POST',
                url: 'ajax/obtener_graficas',
                data: {tipo: tipo, fecha: fechas, campus: campus},
                dataType: 'json',
                success: function(data){
                    if(tipo == 'prospectos' || tipo == 'aspirantes'){
                        Highcharts.chart('container', {
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
                                        y: Number(data.graficasmedios.Medios.facebook),
                                        sliced: true,
                                        selected: true
                                    }, {
                                        name: 'Google',
                                        y: Number(data.graficasmedios.Medios.google)
                                    }, {
                                        name: 'Instagram',
                                        y: Number(data.graficasmedios.Medios.instagram)
                                    },{
                                        name: 'Whatsapp',
                                        y: Number(data.graficasmedios.Medios.whatsapp)
                                    },{
                                        name: 'Periodico',
                                        y: Number(data.graficasmedios.Medios.periodico)
                                    },{
                                        name: 'Ferias Vocacionales',
                                        y: Number(data.graficasmedios.Medios.ferias_vocacionales)
                                    },{
                                        name: 'Espectaculares',
                                        y: Number(data.graficasmedios.Medios.espectaculares)
                                    },{
                                        name: 'Visitas al Plantel',
                                        y: Number(data.graficasmedios.Medios.visita_plantel)
                                    },{
                                        name: 'Transporte Publico',
                                        y: Number(data.graficasmedios.Medios.publicidad_transporte_publico)
                                    },{
                                        name: 'Televisión',
                                        y: Number(data.graficasmedios.Medios.television)
                                    },{
                                        name: 'Recomendación',
                                        y: Number(data.graficasmedios.Medios.recomendacion)
                                    },{
                                        name: 'Otros',
                                        y: Number(data.graficasmedios.Medios.otros)
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
                        if(tipo == 'prospectos'){
                            Highcharts.chart('container4', {
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
                                            y: Number(data.graficashorario.horario.matutino),
                                            sliced: true,
                                            selected: true
                                        }, {
                                            name: 'Vespertino',
                                            y: Number(data.graficashorario.horario.vespertino)
                                        }, {
                                            name: 'Indistito',
                                            y: Number(data.graficashorario.horario.indistinto)
                                        }
                                    ]
                                }]
                            });
                        }
                        if(tipo == 'aspirantes'){
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
                            Highcharts.chart('container6', {
                                chart: {
                                    type: 'column'
                                },
                                title: {
                                    text: 'Grafica de municipios'
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
                                    name: 'Municipios',
                                    data: [
                                        [data.graficasmunicipios.municipios[0].nombre, Number(data.graficasmunicipios.municipios[0].cantidad)],
                                        [data.graficasmunicipios.municipios[1].nombre, Number(data.graficasmunicipios.municipios[1].cantidad)],
                                        [data.graficasmunicipios.municipios[2].nombre, Number(data.graficasmunicipios.municipios[2].cantidad)],
                                        [data.graficasmunicipios.municipios[3].nombre, Number(data.graficasmunicipios.municipios[3].cantidad)],
                                        [data.graficasmunicipios.municipios[4].nombre, Number(data.graficasmunicipios.municipios[4].cantidad)],
                                        [data.graficasmunicipios.municipios[5].nombre, Number(data.graficasmunicipios.municipios[5].cantidad)],
                                        [data.graficasmunicipios.municipios[6].nombre, Number(data.graficasmunicipios.municipios[6].cantidad)],
                                        [data.graficasmunicipios.municipios[7].nombre, Number(data.graficasmunicipios.municipios[7].cantidad)],
                                        [data.graficasmunicipios.municipios[8].nombre, Number(data.graficasmunicipios.municipios[8].cantidad)],
                                        [data.graficasmunicipios.municipios[9].nombre, Number(data.graficasmunicipios.municipios[9].cantidad)]
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
                        }
                    }else if(tipo == 'alumnos'){
                        // var ar = [];
                       
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
                }
            });
        }
        if(tipo == 'completos' || tipo == 'diagnostico' || tipo == 'psicometrico' || tipo == 'alumnos'){
            var graf1 = document.getElementById("container");
            graf1.children[2].remove(graf1);

            var graf2 = document.getElementById("container1");
            graf2.children[2].remove(graf2);

            var graf3 = document.getElementById("container2");
            graf3.children[2].remove(graf3);

            var graf4 = document.getElementById("container3");
            graf4.children[2].remove(graf4);

            var graf5 = document.getElementById("container4");
            graf5.children[2].remove(graf5);

            var graf6 = document.getElementById("container5");
            graf6.children[2].remove(graf6);

            var graf7 = document.getElementById("container6");
            graf7.children[2].remove(graf7);
        }
    }
</script>
</html>