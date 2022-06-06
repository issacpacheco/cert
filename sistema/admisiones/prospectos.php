<?php 
include("includes/config.php");
error_reporting(E_ALL);
if (isset($_POST['alta']))
{
	$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_asesor WHERE id_oferta = '".$_POST['id_oferta']."' ORDER BY rand() LIMIT 1");
	$d1 = mysqli_fetch_array($consulta1);

	$consulta2 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$_POST['id_oferta']."'");
	$d2 = mysqli_fetch_array($consulta2);

	$consulta3 = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id = '".$d2['id_nivel']."'");
	$d3 = mysqli_fetch_array($consulta3);

	mysqli_query($conexion,"ALTER TABLE prospectos AUTO_INCREMENT = 0");
	mysqli_query($conexion,"INSERT INTO prospectos VALUES (
	'0',
	'".mysqli_real_escape_string($conexion,$d2['id_campus'])."',
	'".mysqli_real_escape_string($conexion,$_POST['id_oferta'])."',
	'".$d1['id_asesor']."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
	'".mysqli_real_escape_string($conexion,$_POST['correo'])."',
	'".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
	'".mysqli_real_escape_string($conexion,$_POST['horario'])."',
	'".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
	'".mysqli_real_escape_string($conexion,$_POST['medio'])."',
	'',
	'".$hoy."'
	)");
	$id = mysqli_insert_id($conexion);

	if ($_POST['correo'] != "" && filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL))
	{
		$correo=$_POST['correo'];
		$nombre=$_POST['nombre'];
		$asunto = "Información";
		$nivel = $d3['nombre'];
		$oferta = $d2['nombre'];
		switch($_POST['id_oferta'])
		{
			case 1:
			case 17:
			{
				if (file_exists('../archivos/oferta_educativa/Administracion_Mercadotecnia.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Administracion_Mercadotecnia.pdf';
				}
				break;
			}
			case 2:
			case 18:
			{
				if (file_exists('../archivos/oferta_educativa/Derecho.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Derecho.pdf';
				}
				break;
			}
			case 3:
			case 19:
			{
				if (file_exists('../archivos/oferta_educativa/Educacion_Preescolar.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Educacion_Preescolar.pdf';
				}
				break;
			}
			case 4:
			{
				if (file_exists('../archivos/oferta_educativa/Educacion_Primaria.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Educacion_Primaria.pdf';
				}
				break;
			}
			case 5:
			case 20:
			{
				if (file_exists('../archivos/oferta_educativa/Enfermeria.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Enfermeria.pdf';
				}
				break;
			}
			case 6:
			case 21:
			{
				if (file_exists('../archivos/oferta_educativa/Fisioterapia.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Fisioterapia.pdf';
				}
				break;
			}
			case 22:
			{
				if (file_exists('../archivos/oferta_educativa/Medico_Cirujano.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Medico_Cirujano.pdf';
				}
				break;
			}
			case 7:
			case 23:
			{
				if (file_exists('../archivos/oferta_educativa/Nutricion.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Nutricion.pdf';
				}
				break;
			}
			case 8:
			case 24:
			{
				if (file_exists('../archivos/oferta_educativa/Psicologia.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Psicologia.pdf';
				}
				break;
			}
			case 25:
			{
				if (file_exists('../archivos/oferta_educativa/Turismo.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Turismo.pdf';
				}
				break;
			}
			case 9:
			case 10:
			case 11:
			case 12:
			case 26:
			case 27:
			case 28:
			case 29:
			{
				if (file_exists('../archivos/oferta_educativa/Especialidades.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Especialidades.pdf';
				}
				break;
			}
			case 13:
			case 30:
			{
				if (file_exists('../archivos/oferta_educativa/Mestria_Derecho_Procesal_Penal.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Mestria_Derecho_Procesal_Penal.pdf';
				}
				break;
			}
			case 14:
			case 31:
			{
				if (file_exists('../archivos/oferta_educativa/Maestria_Innovacion_Desarrollo_Educativos.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Maestria_Innovacion_Desarrollo_Educativos.pdf';
				}
				break;
			}
			case 15:
			case 32:
			{
				if (file_exists('../archivos/oferta_educativa/Maestria_Salud Publica.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Maestria_Salud Publica.pdf';
				}
				break;
			}
			case 16:
			case 33:
			{
				if (file_exists('../archivos/oferta_educativa/Doctorado_Educacion.pdf'))
				{
					$archivos[] = '../archivos/oferta_educativa/Doctorado_Educacion.pdf';
				}
				break;
			}
		}

		mandar_correo_prospectos($correo,$nombre,$asunto,$nivel,$oferta,$archivos);
	}
}
if (isset($_POST['editar']))
{
	$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_asesor WHERE id_oferta = '".$_POST['id_oferta']."' ORDER BY rand() LIMIT 1");
	$d1 = mysqli_fetch_array($consulta1);
		
	$consulta2 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$_POST['id_oferta']."'");
	$d2 = mysqli_fetch_array($consulta2);
		
	mysqli_query($conexion,"UPDATE prospectos SET
		id_oferta = '".mysqli_real_escape_string($conexion,$_POST['id_oferta'])."',
		id_asesor = '".$d1['id_asesor']."',
		nombre = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['nombre']),'UTF-8')."',
		correo = '".mysqli_real_escape_string($conexion,$_POST['correo'])."',
		telefono = '".mysqli_real_escape_string($conexion,$_POST['telefono'])."',
		horario = '".mysqli_real_escape_string($conexion,$_POST['horario'])."',
		institucion = '".mb_strtoupper(mysqli_real_escape_string($conexion,$_POST['institucion']),'UTF-8')."',
		medio = '".mysqli_real_escape_string($conexion,$_POST['medio'])."'
		WHERE id = '".$_POST['id']."'");
	$id = $_POST['id'];
}
if ($_POST['comentarios']!='')
{
	mysqli_query($conexion, "ALTER TABLE comentarios AUTO_INCREMENT = 0");
	mysqli_query($conexion,"INSERT INTO comentarios VALUES (
	'0',
	'".$id."',
	'".$_SESSION['id_admin']."',
	'".mysqli_real_escape_string($conexion,$_POST['comentarios'])."',
	'".$hoy."',
	'".$hora."'
	)");
}
if ($_GET['eliminar_comentario'] != '')
{
	mysqli_query($conexion,"DELETE FROM comentarios WHERE MD5(id) = '".$_GET['eliminar_comentario']."' LIMIT 1");
}
if (isset($_POST['eliminar']))
{
	mysqli_query($conexion,"DELETE FROM prospectos WHERE id = '".$_POST['id']."' LIMIT 1");
}


/**** IMPORTAR PROSPECTOS****/
if (isset($_POST['importar']))
{
	if ($_POST['importar'] == 1)
	{
		// Código para importar los registros del archivo de excel
		// Cargamos el fichero
		$archivo 	= $_FILES['excel']['name'];
		$tipo 		= $_FILES['excel']['type'];
		$destino 	= "cop_".$archivo; // Le agregamos un prefijo para identificarlo el archivo cargado
		echo $destino;
		
		if(copy($_FILES['excel']['tmp_name'],$destino)){ 
			echo "Archivo Cargado Con Éxito";
		}else{
			echo "Error Al Cargar el Archivo";
		}
					
		if (file_exists ("cop_".$archivo)){ 

			// Cargando la hoja de excel
			$objReader 		= new PHPExcel_Reader_Excel2007();
			$objPHPExcel 	= $objReader->load("cop_".$archivo);	
			$objFecha 		= new PHPExcel_Shared_Date();
			// Asignamon la hoja de excel activa
			$objPHPExcel	-> setActiveSheetIndex(0);
			
			// Rellenamos el arreglo con los datos  del archivo xlsx que ha sido subido

			$columnas 	= $objPHPExcel -> setActiveSheetIndex(0) -> getHighestColumn();
			$filas 		= $objPHPExcel -> setActiveSheetIndex(0) -> getHighestRow();

			// Creamos un array con todos los datos del Excel importado
			for ($i = 2;$i <= $filas;$i++){
				// Obtenemos la hora actual
				date_default_timezone_set('America/Cancun');
				setlocale(LC_TIME, 'es_ES.UTF-8');
				setlocale(LC_TIME, 'spanish');
				setlocale (LC_TIME, "es_ES");
				setlocale(LC_TIME,'spanish');
				$obtener_hora 	= date('H:i:s', time());
				$hora 			= ucfirst(iconv("ISO-8859-1","UTF-8",$obtener_hora));

				// Leemos los campos del excel
				$_DATOS_EXCEL[$i]['nombre'] 		= $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['id_oferta'] 		= $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['institucion'] 	= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['horario']      	= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['correo']			= $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['telefono']		= $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['medio'] 			= 6;
				$_DATOS_EXCEL[$i]['comentarios']	= $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
				$_DATOS_EXCEL[$i]['id_campus'] 		= $_SESSION['campus'];
				$_DATOS_EXCEL[$i]['fecha_registro'] = $hoy;
			}		
			$errores = 0;
			// Usamos foreach para recorrer los campos
			foreach($_DATOS_EXCEL as $campo => $valor){
				$sql = "INSERT INTO prospectos  (nombre,id_oferta,institucion,horario,correo,telefono,medio,comentarios,id_campus,fecha_registro)  VALUES ('";
				foreach ($valor as $campo2 => $valor2){
					// Esta condicion es para consultar el ID de la oferta educativa
					if($campo2 == "id_oferta"){
						$ofertas 			= mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE nombre LIKE '".$valor2."' AND id_campus = '".$_SESSION['campus']."'");
						$oferta 			= mysqli_fetch_array($ofertas);
						$valor2				= $oferta['id'];
						$_POST['id_oferta'] = $oferta['id'];
					}
					$campo2 == "fecha_registro" ? $sql.= $valor2."');" : $sql.= $valor2."','";
				}

				$result = mysqli_query($conexion,$sql);
				// Obtenemos el id del registro que se ha guardado
				$id = mysqli_insert_id($conexion);
				if (!$result){ 
					echo "Error al insertar registro ".$campo;$errores+=1;
				}else{
					// Consultas y modificaciones de valores para enviar por correo

					// Consulta para obtener el ID del asesor
					$id_asesor 	= mysqli_query($conexion,"SELECT * FROM oferta_asesor WHERE id_oferta = '".$_POST['id_oferta']."'");
					$id_asesor 	= mysqli_fetch_array($id_asesor);

					// Actualizacion del id del asesor del ultimo registro
					$asesor 	= "UPDATE prospectos SET id_asesor = '".$id_asesor['id']."' WHERE id = '$id'";
					$asesor 	= mysqli_query($conexion,$asesor);

					// Consulta para obtener el nombre de la oferta educativa
					$consulta2 	= mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$_POST['id_oferta']."'");
					$d2 		= mysqli_fetch_array($consulta2);

					// Consulta para obtener el nombre del nivel academico
					$consulta3 	= mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id = '".$d2['id_nivel']."'");
					$d3 		= mysqli_fetch_array($consulta3);

					// Consulta para obtener los datos del prospecto
					$consulta4 	= mysqli_query($conexion, "SELECT * FROM prospectos WHERE id = '$id'");
					$d4 		= mysqli_fetch_array($consulta4);

					// Se inicia el proceso para enviar el correo con su respectiva oferta educativa
					if ($d4['correo'] != "" && filter_var($d4['correo'], FILTER_VALIDATE_EMAIL))
					{
						$correo		=	$d4['correo'];
						$nombre		=	$d4['nombre'];
						$asunto 	= 	"Información";
						$nivel 		= 	$d3['nombre'];
						$oferta 	= 	$d2['nombre'];
						switch($_POST['id_oferta'])
						{
							case 1:
							case 17:
							{
								if (file_exists('../archivos/oferta_educativa/Administracion_Mercadotecnia.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Administracion_Mercadotecnia.pdf';
								}
								break;
							}
							case 2:
							case 18:
							{
								if (file_exists('../archivos/oferta_educativa/Derecho.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Derecho.pdf';
								}
								break;
							}
							case 3:
							case 19:
							{
								if (file_exists('../archivos/oferta_educativa/Educacion_Preescolar.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Educacion_Preescolar.pdf';
								}
								break;
							}
							case 4:
							{
								if (file_exists('../archivos/oferta_educativa/Educacion_Primaria.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Educacion_Primaria.pdf';
								}
								break;
							}
							case 5:
							case 20:
							{
								if (file_exists('../archivos/oferta_educativa/Enfermeria.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Enfermeria.pdf';
								}
								break;
							}
							case 6:
							case 21:
							{
								if (file_exists('../archivos/oferta_educativa/Fisioterapia.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Fisioterapia.pdf';
								}
								break;
							}
							case 22:
							{
								if (file_exists('../archivos/oferta_educativa/Medico_Cirujano.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Medico_Cirujano.pdf';
								}
								break;
							}
							case 7:
							case 23:
							{
								if (file_exists('../archivos/oferta_educativa/Nutricion.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Nutricion.pdf';
								}
								break;
							}
							case 8:
							case 24:
							{
								if (file_exists('../archivos/oferta_educativa/Psicologia.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Psicologia.pdf';
								}
								break;
							}
							case 25:
							{
								if (file_exists('../archivos/oferta_educativa/Turismo.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Turismo.pdf';
								}
								break;
							}
							case 9:
							case 10:
							case 11:
							case 12:
							case 26:
							case 27:
							case 28:
							case 29:
							{
								if (file_exists('../archivos/oferta_educativa/Especialidades.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Especialidades.pdf';
								}
								break;
							}
							case 13:
							case 30:
							{
								if (file_exists('../archivos/oferta_educativa/Mestria_Derecho_Procesal_Penal.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Mestria_Derecho_Procesal_Penal.pdf';
								}
								break;
							}
							case 14:
							case 31:
							{
								if (file_exists('../archivos/oferta_educativa/Maestria_Innovacion_Desarrollo_Educativos.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Maestria_Innovacion_Desarrollo_Educativos.pdf';
								}
								break;
							}
							case 15:
							case 32:
							{
								if (file_exists('../archivos/oferta_educativa/Maestria_Salud Publica.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Maestria_Salud Publica.pdf';
								}
								break;
							}
							case 16:
							case 33:
							{
								if (file_exists('../archivos/oferta_educativa/Doctorado_Educacion.pdf'))
								{
									$archivos[] = '../archivos/oferta_educativa/Doctorado_Educacion.pdf';
								}
								break;
							}
						}
						//función para enviar el correo
						mandar_correo_prospectos($correo,$nombre,$asunto,$nivel,$oferta,$archivos);
					}
				}
			}	
			////////////////////////////////////////////////////////////////////////
			//Borramos el archivo que esta en el servidor con el prefijo cop_
			unlink($destino);					
		}else{
			//si por algun motivo no cargo el archivo cop_ 
			echo "Primero debes cargar el archivo con extencion .xlsx";
		}
		// }

		if (isset($action)) {
			$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		}
		if (isset($filas)) {
			$columnas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
		}
		if (isset($filas)) {
			$filas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		}
	}
}



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
	
	<!-- DataTables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	
	<!--SweetAlert-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.0/dist/sweetalert2.min.css">
	
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
                            Prospectos
                        </div>
                        <div class="panel-body">
							<div class="row">
								<div class="col-lg-12">
									<form action="prospectos_abc" method="post">
										<button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-plus"></i> Nuevo </button>
									</form>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-12">
									<form action="prospectos_importar" method="post">
										<button type="submit" class="btn btn-info btn-block"><i class="fas fa-upload"></i> Importar</button>
									</form>
								</div>
							</div>
							<br>
							<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
								<thead>
									<tr>
										<th data-priority="1"> Nombre </th>
										<th data-priority="2"> Oferta </th>
										<th data-priority="3"> Fecha </th>
										<th data-priority="5"> Correo </th>
										<th data-priority="6"> Teléfono </th>
										<th> Horario de contacto </th>
										<th> Institución de procedencia </th>
										<th> Medio </th>
										<th data-priority="7"> Último Comentario</th>
										<th data-priority="4"><i class="fas fa-search"></i> Ver </th>
										<?php 
										if ($_SESSION['nivel']==1)
										{
											echo '
											<th> Asesor </th>
											<th> <i class="fas fa-trash"></i> </th>';
										}
										?>
										
									</tr>
								</thead>
								<tbody>
								<?php
								if ($_SESSION['nivel'] == 1)
								{
									$consulta = mysqli_query($conexion,"SELECT p.*, m.nombre AS nombremedio FROM prospectos p LEFT JOIN medios m ON m.id = p.medio WHERE id_campus = '".$_SESSION['campus']."' ORDER BY fecha_registro DESC");
								}
								else if ($_SESSION['nivel'] == 2)
								{
									//$consulta = mysqli_query($conexion,"SELECT * FROM prospectos WHERE id_asesor = '".$_SESSION['id_admin']."' ORDER BY fecha DESC");
									$consulta = mysqli_query($conexion,"SELECT p.*, m.nombre AS nombremedio FROM prospectos p LEFT JOIN medios m ON m.id = p.medio WHERE p.id_campus = '".$_SESSION['campus']."' ORDER BY p.fecha_registro DESC");
								}
								while ($d = mysqli_fetch_array($consulta))
								{	
									$consulta1 = mysqli_query($conexion,"SELECT * FROM campus WHERE id = '".$d['id_campus']."'");
									$d1 = mysqli_fetch_array($consulta1);

									$consulta2 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."'");
									$d2 = mysqli_fetch_array($consulta2);
									$d2['nombre'] = $d['id_oferta']==0?'<form action="imprimir_tv" method="post" target="_blank"><input type="hidden" name="token" value="'.md5($d['id']).'"><button type="submit" class="btn btn-info btn-block"><i class="fas fa-print"></i> Test vocacional</button></form>':$d2['nombre'];
									
									$consulta3 = mysqli_query($conexion,"SELECT * FROM usuarios WHERE id = '".$d['id_asesor']."'");
									$d3 = mysqli_fetch_array($consulta3);

									$consulta4 = mysqli_query($conexion,"SELECT * FROM comentarios WHERE id_prospecto = '".$d['id']."' ORDER BY fecha DESC, hora DESC");
									$d4 = mysqli_fetch_array($consulta4);

									if ($_SESSION['nivel'] == 1)
									{
										$opc = '
										<td>'.$d3['nombre'].'</td>
										<td> 
											<form action="prospectos_abc" method="post">
												<input type="hidden" name="eliminar" value="1">
												<input type="hidden" name="id" value="'.$d['id'].'">
												<button type="submit" class="btn btn-md btn-danger btn-block"><i class="fas fa-trash"></i> Eliminar</button>
											</form>
										</td>';
									}

									echo '
										<tr class="'.$class.'">
											<td>'.$d['nombre'].'</td>
											<td>'.$d2['nombre'].'</td>
											<td data-sort="'.substr($d['fecha_registro'],0,4).substr($d['fecha_registro'],5,2).substr($d['fecha_registro'],8,2).'">'.FechaCorta($d['fecha_registro']).'</td>
											<td>'.$d['correo'].'</td>
											<td>'.$d['telefono'].'</td>
											<td>'.$d['horario'].'</td>
											<td>'.$d['institucion'].'</td>
											<td>'.$d['nombremedio'].'</td>
											<td>'.$d4['comentarios'].'</td>
											<td> 
												<form action="prospectos_abc" method="post">
													<input type="hidden" name="editar" value="1">
													<input type="hidden" name="id" value="'.$d['id'].'">
													<button type="submit" class="btn btn-md btn-info btn-block"><i class="fas fa-search"></i> Ver</button>
												</form>
											</td>
											'.$opc.'											
										</tr>';
								}
								?>
									 
								</tbody>
							</table>
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
			<!--SweetAlert-->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
			<script>
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
						"pageLength": 50,
						"order": [[ 2, "desc" ]],
						"buttons": [
							{
								extend: 'excel',
								exportOptions: {
									columns: [0,1,2,3,4,5,6,7]
								},
								text: 'Excel <i class="fal fa-file-excel"></i>',
								messageTop: '',
								footer: true
							},
							{
								extend: 'pdfHtml5',
                				orientation: 'landscape',
								exportOptions: {
									columns: [0,1,2,3,4,5,6,7]
								},
								text: 'PDF <i class="fal fa-file-pdf"></i>',
								messageTop: 'PROSPECTOS',
								footer: true
							},
							{
								extend: 'print',
								exportOptions: {
									columns: [0,1,2,3,4,5,6,7]
								},
								text: 'Imprimir <i class="fal fa-print"></i>',
								messageTop: '',
								footer: true
							},
						]
					} );
				});
				
				<?php
				if ($enviado==1)
				{
					?>
					Swal.fire({
						icon: 'success',
					 	title: 'Notificación enviada correctamente',
						html: '<h5>Se envío el correo de notificación a:<br> <b><?php echo $nombre;?></b></h5>',
						showConfirmButton: true,
  						timer: 4500
					})
					<?php
				}
				?>
			</script>            
        </div>

    </div>

</body>

</html>