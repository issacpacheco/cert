<?php 
include("includes/config.php");
extract($_REQUEST);
if (isset($_POST['editar']))
	{
		mysqli_query($conexion,"UPDATE usuarios SET 
		pass = '".$_POST['pass']."',
		usuario = '".$_POST['usuario']."',
		nombre = '".$_POST['nombre']."'
		WHERE id = '".$_POST['editar']."' LIMIT 1");	
	}
$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id = '".$_SESSION['id_admin']."' LIMIT 1");
$d=mysqli_fetch_array($consulta);


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
                            Perfil
                        </div>
                        <div class="panel-body">
                        	<form action="perfil" method="post" >
								<div class="row">
									<div class="form-wrapper col-sm-12">
										<label>Nombre</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-6">
										<label>Usuario</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre" value="<?php echo $d['usuario'];?>">
										</div>
									</div>
									<div class="form-wrapper col-sm-6">
										<label>Contraseña</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="pass" id="pass" placeholder="Contraseña" value="<?php echo $d['pass'];?>">
										</div>
									</div>
								</div>
							
                              	<div class="row">
									<div class="col-sm-8">
										<input type="hidden" name="editar" value="<?php echo $d['id'];?>">
										<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fa fa-save"></i></button>
									</div>
									<div class="col-sm-4">
										<a href="index" class="btn btn-info btn-lg btn-block">Cancelar <i class="fa fa-close"></i></a>
									</div>
								</div>
                            </form>
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
		<script>
			$( document ).ready(function() {
				$('#nombre').focus();
			});
		</script>
		
    </div>

</body>

</html>