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
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	
	$consulta_mat = mysqli_query($conexion,"SELECT * FROM matricula_ceneval WHERE id_aspirante = '".$_POST['id']."' LIMIT 1");
	$datos_ceneval = mysqli_fetch_array($consulta_mat);
	
	if ($d['fecha_nac'] != '0000-00-00')
	{
		$d['fecha_nac'] = substr($d['fecha_nac'],8,2).'/'.substr($d['fecha_nac'],5,2).'/'.substr($d['fecha_nac'],0,4);
	}
	if ($_POST['editar'] == 1)
	{
		//Editar
		$titulo = 'Editar';
	}
	else if ($_POST['eliminar'] == 1)
	{
		//Eliminar
		$titulo = 'Eliminar';
		$read = 'readonly';
		$disabled = 'disabled';
	}
}
$d['pass'] = $d['pass']!=''?$d['pass']:'1234';
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
							<form action="aspirantes" method="post" id="form_abc" enctype="multipart/form-data">
								<div class="row">
									<h3 class="text-center">Información básica</h3>
									<div class="form-wrapper col-sm-4">
										<label>Nombre</label>
										<div class="form-group">
											<input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $d['nombre'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Primer apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="paterno" placeholder="Primer apellido" value="<?php echo $d['paterno'];?>" <?php echo $read;?>>
										</div>
									</div>
									
									<div class="form-wrapper col-sm-4">
										<label>Segundo apellido</label>
										<div class="form-group ">
											<input type="text" class="form-control" name="materno" placeholder="Segundo apellido" value="<?php echo $d['materno'];?>" <?php echo $read;?>>
										</div>
									</div>
									
								</div>
								
								<div class="row">
									<h3 class="text-center">MATRICULA CENEVAL</h3>
								</div>
								<div class="row">
									<div class="form-wrapper col-sm-4">
										<label>Matrícula del CENEVAL</label>
										<div class="form-group">
											<input type="text" class="form-control" name="matricula" placeholder="Matrícula del CENEVAL" value="<?php echo $datos_ceneval['matricula'];?>">
										</div>
									</div>
								</div>
								
																								
								<div class="row">
									<div class="col-sm-8">
										<input type="hidden" name="id" value="<?php echo $d['id'];?>">
										<button type="submit" class="btn btn-success btn-lg btn-block">Guardar <i class="fas fa-save"></i></button>
									</div>
									<div class="col-sm-4">
										<a href="aspirantes" class="btn btn-default btn-lg btn-block">Cancelar <i class="fas fa-times"></i></a>
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
		
            
        </div>
		

    </div>

</body>

</html>