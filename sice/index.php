<?php 

if(isset($_POST['credential']))
{
	//print_r (json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $_POST['credential'])[1])))));
	$usuario = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $_POST['credential'])[1]))));

	//echo $usuario->name; 
	//echo $usuario->email;

	$conexion = mysqli_connect("localhost","root","fabricandomarcas","cert");
	mysqli_query($conexion,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	
	$consulta = mysqli_query($conexion,"SELECT * FROM si_usuarios WHERE correo = '".$usuario->email."' LIMIT 1");
	if (mysqli_num_rows($consulta)==0)
	{
		//Verificar si es alumno
		$consulta = mysqli_query($conexion,"SELECT * FROM alumnos WHERE correo = '".$usuario->email."' LIMIT 1");	
		if (mysqli_num_rows($consulta)==0)
		{
			header('location:./login');
		}
		else
		{
			$d['id_area'] = 0;
			$d['nivel'] = 0;
		}
	}
	
	$d = mysqli_fetch_array($consulta);
	//Iniciar sesión
	session_start();
	$_SESSION['id'] = $d['id'];
	$_SESSION['id_area'] = $d['id_area'];
	$_SESSION['nivel'] = $d['nivel'];
	$_SESSION['id_campus'] = $d['id_campus'];
	$_SESSION['nombre'] = $d['nombre'];
	$_SESSION['paterno'] = $d['paterno'];
	$_SESSION['materno'] = $d['materno'];
	$_SESSION['correo'] = $d['correo'];
	$_SESSION['genero'] = $d['genero'];
	
	//ALUMNOS
	$_SESSION['matricula'] = $d['matricula'];
}

include ('config/config.php');
?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <meta charset="utf-8" />
        <title>FAMILIA CERT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.png">

        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
		<!--Font awesome-->
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.15.0/css/all.css">
		<!--SweetAlert-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
		
		<!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.css"/>
		
    </head>

   	<body class="loading" data-layout-config="{'leftSideBarTheme':'dark', 'leftSidebarScrollable':false,'darkMode':<?php echo $dark;?>}">     
    	<div class="wrapper">
        	<?php include('includes/left_sidebar.php');?>
			<div class="content-page">
            	<div class="content">
                	<?php include('includes/header.php');?>
                    <div class="container-fluid" id="contenedor">
                        
                        
                    </div> 
                </div>
                <?php include('inludes/footer.php');?>
       		</div>
      	</div>
        
       	<script src="assets/js/vendor.min.js"></script>
       	<script src="assets/js/app.min.js"></script>
		
		<!--Sweet Alert-->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		
		<!--Datatables-->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.js"></script>
		
		<!--jQuery Validate-->
		<script src="assets/js/jquery.validate.min.js" type="text/javascript" ></script>
		<script src="assets/js/localization/messages_es.min.js" type="text/javascript"></script>
		
		
	   	<script>
			function Vista(modulo,vista,opcion,token)
		   	{
				$('[data-bs-toggle="tooltip"]').tooltip('dispose');
				$.ajax({
					type: 'POST',
					url: "modulos/"+modulo+'/'+vista,
					cache:false,
					data: {
						modulo:modulo,
						vista:vista,
						opcion:opcion,
						token:token
					},
					// Mostramos un mensaje con la respuesta de PHP
					success: function(data) 
					{
						$('#contenedor').html(data);
						$('.menu').removeClass('active');
						$('#menu_'+modulo).addClass('active');
					}
				});
			}
	   	</script>
        
       
	</body>
</html>