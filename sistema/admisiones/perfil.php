<?php 
include("includes/config.php");

extract($_REQUEST);
if (isset($_POST['editar']))
{
	$frame          = filter_input(INPUT_POST, 'iframegoogle',              FILTER_SANITIZE_SPECIAL_CHARS);
	mysqli_query($conexion,"UPDATE usuarios SET 
	pass = '".$_POST['pass']."',
	correo = '".$_POST['correo']."',
	nombre = '".$_POST['nombre']."',
	iframe_google = '".$frame."'
	WHERE id = '".$_POST['editar']."' LIMIT 1");	
}
$consulta = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id = '".$_SESSION['id_admin']."' LIMIT 1");
$d=mysqli_fetch_array($consulta);

?>
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
											<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-6">
										<label>Correo</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="correo" placeholder="Nombre" value="<?php echo $d['correo'];?>">
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
									<div class="form-wrapper col-sm-12">
										<label>Iframe Calendario google </label> <i class="fas fa-info btn btn-info"  data-toggle="modal" data-target="#exampleModalCenter"></i>
										<div class="form-group">
											<input type="text" class="form-control" name="iframegoogle" placeholder="Calendario google" value="<?php echo $d['iframe_google'];?>">
										</div>
									</div>
								</div>
								<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h2 class="modal-title" id="exampleModalLongTitle">Calendario Google</h2>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												<h3>En este apartado agregaremos nuestro calendario de Google si es que lo deseamos. <br>
												Si deseas continuar, haz clic en el boton "Ir a google" y seguir las instrucciones que nos da el soporte de google,
												una vez hecho los pasos, google nos dice que copiemos una linea que tiene como titulo "Incorporar código", 
												nosotros le daremos clic al boton que dice "Personalizar", este nos llevara a otra pagina donde podemos seleccionar el color que queramos<br>
												Los unicos importantes a modificar son "width" al cual le daremos un valor 500 y "height" le daremos un valor 625, lo demas queda a gusto suyo.
												Luego de ello hasta la parte de arriba esta el codigo que debemos copiar; ya copiado lo pegaremos en el campo que dice "iFrame Google Calendar" <br>

												Gracias!</h3>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
												<button type="button" class="btn btn-primary" onclick="window.open('https://support.google.com/calendar/answer/41207?hl=es-419','_blank')">Ir a google</button>
											</div>
										</div>
									</div>
								</div>
							
                              	<div class="row">
									<div class="col-sm-8">
										<input type="hidden" name="editar" value="<?php echo $d['id'];?>">
										<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fas fa-save"></i></button>
									</div>
									<div class="col-sm-4">
										<a href="./" class="btn btn-info btn-lg btn-block">Cancelar <i class="fas fa-times"></i></a>
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
        <script src="addons/scripts.js"></script>
		<script>
			$( document ).ready(function() {
				$('#nombre').focus();
			});
		</script>
		
    </div>

</body>

</html>