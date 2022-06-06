<?php 
ini_set('memory_limit', '1024M');
include("includes/config.php");
set_time_limit(-1);
require_once('../dompdf-master/autoload.inc.php');
use Dompdf\Dompdf;

if (isset($_POST['id']))
{
	extract($_REQUEST);
	$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes_medico_cirujano WHERE id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	$html = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<style>
		body{
			font-family: Helvetica;
			margin: 0;
			padding: 0;
			background: #fff;
			overflow-x: hidden;
			scrollbar-face-color: #333;
			width:700px;
			margin-top:70px;
			margin-bottom:35px;
		}
		
		div {
			display: block;
		}
		
		.clearfix{
			page-break-after:always;
		}		
		
		.clear-marg{
			margin: 0 !important;
		}
		
		.header,
		.footer {
			width: 100%;
			text-align: center;
			position: fixed;
		}
		.header {
			top: -43px;
			color:#fff;
		}
		.footer {
			bottom: 20px;
			font-size:14px;
		}
		.pagenum:before {
			content: counter(page);
			color:#fff;
		}
		
	</style>
</head>
<body>
	<div class="header">
		<img src="../assets/img/formato.png" alt="CERT">
	</div>
	<div class="footer">
    	<table cellpadding="0" border="0" align="center">
			<tr>
				<td>
					<p style="color:#fff">© Copyright. Derechos Reservados CERT '.$anio.'</p>
				</td>
			</tr>
		</table>
		<!--span class="pagenum"></span-->
	</div>
	
	<div align="center">
		<h3 style="color:#e46100">Reporte personal confidencial.</h3>
	</div>
	
	<table cellpadding="2" border="0" style="margin-top:10px; font-size:14px" width="100%">
		<tr>
			<td width="70%">
				<strong>Nombre:</strong>
				'.$d['nombre'].' '.$d['paterno'].' '.$d['materno'].'
			</td>
			<td>
				<strong>Fecha:</strong>
				'.Fecha($hoy).'
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<strong>Género:</strong>
				'.$d['genero'].'
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<strong>Edad:</strong>
				'.$edad->format('%Y').' años
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<strong>CURP:</strong>
				'.$d['curp'].'
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<strong>Correo:</strong>
				'.$d['correo'].'
			</td>
		</tr>			
	</table>';
	
	
	//RESULTADO PRIMERA TABLA CON RECOMENDACIONES
	$html .= '
		<table border="1" style="margin-top:30px; font-size:14px" width="100%" rules="rows">
			<tr style="background-color:#112c46; color:#fff; text-align:center;">
				<td width="20%" style="padding:10px 0">Dimensión</td>
				<td>Resultado</td>
				<td width="50%">Recomendaciones</td>
			</tr>';
	$consulta_dimension = mysqli_query($conexion,"SELECT * FROM dimensiones ORDER BY id");
	while ($dimension = mysqli_fetch_array($consulta_dimension))
	{
		$semaforo_rojo = $semaforo_amarillo = $semaforo_verde = 0;
		$consulta1 = mysqli_query($conexion,"SELECT * FROM factores WHERE id_dimension = '".$dimension['id']."'");
		while ($d1 = mysqli_fetch_array($consulta1))
		{
			$resultado = 0;
			$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS resultado FROM encuesta WHERE id_factor = '".$d1['id']."' AND id_aspirante = '".$d['id']."'");
			$d2 = mysqli_fetch_array($consulta2);
			$resultado = $d2['resultado'];

			//Evaluar si hay algún reactivo de peligro en la encuesta
			$consulta2 = mysqli_query($conexion,"SELECT * FROM reactivos WHERE id_factor = '".$d1['id']."' AND peligro = '1'");
			while ($d2 = mysqli_fetch_array($consulta2))
			{
				$consulta3 = mysqli_query($conexion,"SELECT * FROM encuesta WHERE id_reactivo = '".$d2['id']."' AND respuesta = '0' AND id_aspirante = '".$d['id']."'");
				if (mysqli_num_rows($consulta3)>0)
				{
					//PELIGRO
					$resultado = 0;
				}
			}

			if ($resultado <= 2)
			{
				$semaforo_rojo++;
			}
			else if ($resultado >= 4)
			{
				$semaforo_verde++;
			}
			else
			{
				$semaforo_amarillo++;	
			}			
		}
		
		$semaforo = 'verde';
		$recomendacion = $dimension['verde'];
		if ($semaforo_rojo > 0)
		{
			$semaforo = 'rojo';
			$recomendacion = $dimension['rojo'];
		}
		else if ($semaforo_amarillo>0)
		{
			$semaforo = 'amarillo';
			$recomendacion = $dimension['amarillo'];
		}
		
		$html .='
			<tr>
				<td width="30%" style="border: 1px solid black; padding: 10px 5px">'.$dimension['nombre'].'</td>
				<td align="center"><img src="../assets/img/semaforo/'.$semaforo.'.png"></td>
				<td width="35%" style="border: 1px solid black; padding: 10px 5px">'.$recomendacion.'</td>
			</tr>
			';
	}
	
	$html.='
		</table>';
	
	//GRADO DE HONESTIDAD
	$consulta_honestidad = mysqli_query($conexion,"SELECT SUM(respuesta) AS grado FROM honestidad WHERE id_aspirante = '".$_POST['id']."'");
	$h = mysqli_fetch_array($consulta_honestidad);
	
	$html .= '
		<table border="1" style="margin-top:30px; font-size:14px" width="100%" rules="rows">
			<tr style="background-color:#112c46; color:#fff; text-align:center;">
				<td width="30%" style="padding:10px 0">Grado de honestidad</td>
				<td>Bajo</td>
				<td>Medio</td>
				<td>Alto</td>
				<td>Excelente</td>
			</tr>';
	
	if ($h['grado'] == 0)
	{
		$color = "#28a745"; //Verde
		$colspan = 4;
	}
	else if ($h['grado'] == 1)
	{
		$color = "#007bff";//Azul
		$colspan = 3;
	}
	else if ($h['grado'] == 2)
	{
		$color = "#ffc107";//Amarillo
		$colspan = 2;
	}
	else if ($h['grado'] > 2)
	{
		$color = "#dc3545";//rojo
		$colspan = 1;
	}
	
	$html .='
		<tr>
			<td width="30%" style="border: 1px solid black; padding: 10px 5px">Nivel de confianza</td>
			<td colspan="'.$colspan.'" bgcolor="'.$color.'"> </td>';
			
	for ($c=$colspan;$c<4;$c++)
	{
		$html.='<td></td>';
	}
	
	$html.='</tr>
	</table>';
	
	//SEMAFORO
	$html .='<table cellpadding="5" border="0" style="margin-top:10px" align="center">
		<tr>
			<td>
				<img src="../assets/img/semaforo/semaforo.png">
			</td>
			<td align="justify">
				Gracias por tu participación, la luz verde indica que no hay problemas en la dimensión evaluada. Cuando aparece una luz amarilla (precaución) o roja (alerta) se emiten recomendaciones con la finalidad de mejorar tus probabilidades de éxito en la Universidad.
			</td>
		</tr>
	</table>';
	
	
	
	//SALTO DE PAGINA
	//RESULTADO
	$html.='<h3 style="color:#e46100; text-align:center; page-break-before: always;">Exploración por dimensiones y factores</h3>';
	$html .= '
		<table border="0" style="margin-top:10px; font-size:14px" width="100%" cellspacing="0">
			<tr style="text-align:left;">
				<td width="30%" style="padding:5px 0"><strong>Dimensión</strong></td>
				<td width="30%" style="padding:5px 0"><strong>Factores</strong></td>
				<td colspan="8"></td>
			</tr>';
	
	$consulta_dimension = mysqli_query($conexion,"SELECT * FROM dimensiones ORDER BY id");
	while ($dimension = mysqli_fetch_array($consulta_dimension))
	{
		$aux = 0;
		$consulta1 = mysqli_query($conexion,"SELECT * FROM factores WHERE id_dimension = '".$dimension['id']."'");
		while ($d1 = mysqli_fetch_array($consulta1))
		{
			$resultado = 0;
			$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS resultado FROM encuesta WHERE id_factor = '".$d1['id']."' AND id_aspirante = '".$d['id']."'");
			$d2 = mysqli_fetch_array($consulta2);
			$resultado = $d2['resultado'];

			//Evaluar si hay algún reactivo de peligro en la encuesta
			$consulta2 = mysqli_query($conexion,"SELECT * FROM reactivos WHERE id_factor = '".$d1['id']."' AND peligro = '1'");
			while ($d2 = mysqli_fetch_array($consulta2))
			{
				$consulta3 = mysqli_query($conexion,"SELECT * FROM encuesta WHERE id_reactivo = '".$d2['id']."' AND respuesta = '0' AND id_aspirante = '".$d['id']."'");
				if (mysqli_num_rows($consulta3)>0)
				{
					//PELIGRO
					$resultado = 0;
				}
			}

			//Dimensión
			$consulta4 = mysqli_query($conexion,"SELECT * FROM dimensiones WHERE id = '".$d1['id_dimension']."' LIMIT 1");
			$d4 = mysqli_fetch_array($consulta4);
			$colspan = $resultado;

			if ($resultado >= 4)
			{
				$colspan = 8;
				$bgcolor = "#28a745";//Verde
			}
			else if($resultado <=2)
			{
				$bgcolor = "#dc3545";//Rojo
			}
			else 
			{
				$bgcolor = "#ffc107";//Amarillo
			}
			
			$colspan = $colspan== 0 ? 1 : $colspan;
			
			$dimension_aux = $aux==0 ? $dimension['nombre'] : '';

			$html .='
			<tr>
				<td width="30%" style="border: 0px solid black; padding: 5px 5px">'.$dimension_aux.'</td>
				<td width="30%" style="border: 0px solid black; padding: 5px 5px">'.$d1['nombre'].'</td>
				<td colspan="'.$colspan.'" bgcolor="'.$bgcolor.'"> </td>';
			
			for ($c=$colspan;$c<8;$c++)
			{
				$html.='<td></td>';
			}
			
			$html .='
			</tr>';
			$aux=1;
		}
		$html.='<tr>
			<td colspan="10" style="border: 0px; padding: 0px"><hr></td>
		</tr>';
	}
	$html.='
		</table>';
	$html.='		
</body>
</html>';
	//error_reporting(-1);
	//echo $html;
	//exit();
	$dompdf = new DOMPDF();
	$dompdf->load_html($html);
	$dompdf->render();

	$dompdf->stream( $id.'.pdf' , array( 'Attachment'=>0 ) );
}
else
{
	header("location:./");	
}
?>