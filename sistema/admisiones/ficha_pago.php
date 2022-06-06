<?php 
include("includes/config.php");
if ($_SESSION['nivel']==2)
{
	$_POST['campus'] = $_SESSION['campus'];
}
if (!isset($_POST['id']))
{
	//Nueva 
	$titulo = 'Nuevo';
}
else if (isset($_POST['id']))
{
	if ($_POST['tabla']=='alumnos')
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM alumnos WHERE id = '".$_POST['id']."' LIMIT 1");
	}
	else
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");	
	}
	$d = mysqli_fetch_array($consulta);
	$titulo = 'Ficha de pago';
	
	$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
	$d1 = mysqli_fetch_array($consulta1);
}
$pagina = filter_input(INPUT_POST, 'pagina', FILTER_SANITIZE_STRING);
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
    <a class="scroll-up"><i class="fas fa-chevron-up"></i></a>
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
                        <div class="panel-body">
							<form action="imprimir" method="post" id="form_abc" enctype="multipart/form-data" target="_blank">
								<div class="row">
									<h3 class="text-center">Ficha de inscripción</h3>
									<div class="form-wrapper col-sm-4">
										<label>Nombre</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>" readonly>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Primer apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="paterno" placeholder="Primer apellido" value="<?php echo $d['paterno'];?>" readonly>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Segundo apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="materno" placeholder="Segundo apellido" value="<?php echo $d['materno'];?>" readonly>
										</div>
									</div>
									
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<div class="form-group">
											<label>Oferta educativa</label>
											<div class="form-group ">
											<input type="text" class="form-control" name="oferta" placeholder="Oferta" value="<?php echo $d1['nombre'];?>" readonly>
										</div>
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<label>Inscripción</label>
										<div class="form-group ">
											<input type="number" class="form-control" name="inscripcion" id="inscripcion" placeholder="Inscripción" value="<?php echo $d1['inscripcion'];?>" onChange="Total()">
										</div>
									</div>
									<div class="form-wrapper col-sm-4">
										<label>Descuento (%)</label>
										<div class="form-group ">
											<input type="number" class="form-control" name="descuento" id="descuento" placeholder="Descuento" value="" onChange="Total()">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<div class="form-group">
											<label>Total</label>
											<div class="form-group ">
											<input type="text" class="form-control" name="total" id="total" placeholder="Total" value="<?php echo $d1['inscripcion'];?>" readonly>
										</div>
										</div>
									</div>
								</div>
								
																								
								<div class="row">
									<div class="col-sm-8">
										<input type="hidden" name="id" value="<?php echo $d['id'];?>">
										<input type="hidden" name="tabla" value="<?php echo $_POST['tabla'];?>">
										<button type="submit" class="btn btn-info btn-lg btn-block">Imprimir <i class="fas fa-print"></i></button>
									</div>
									<div class="col-sm-4">
										<a href="<?php echo $pagina; ?>" class="btn btn-default btn-lg btn-block">Cancelar <i class="fas fa-times"></i></a>
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
		
		<!-- Current page scripts -->
        <div class="current-scripts">
		<!-- InputMask -->
		<script src="plugins/input-mask/jquery.inputmask.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- Validate -->
		<script src="addons/jqueryvalidate/jquery.validate.js"></script>
		<script src="addons/jqueryvalidate/localization/messages_es.min.js" type="text/javascript"></script>
		<script>
			$( document ).ready(function() {
				$('#nombre').focus();
			});

			function Total()
			{
				var descuento = 0;
				if ($('#descuento').val()>0 && $('#descuento').val()!='')
				{
					descuento = (parseFloat($('#descuento').val())/100) * parseFloat($('#inscripcion').val());
				}
				var total = parseFloat($('#inscripcion').val()) - descuento;
				$('#total').val(total);
			}
		</script>
            
        </div>
		

    </div>

</body>

</html>