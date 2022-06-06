<?php 
require_once('../../includes/conexion.php');
require_once('../../includes/PHPMailer-master/PHPMailerAutoload.php');
require_once('../../includes/Mobile_Detect.php');
require_once('../../includes/globals.php');
require_once('../../includes/funciones.php');
if (isset($_POST['token']))
{
	extract($_REQUEST);
	$consulta = mysqli_query($conexion,"SELECT * FROM prospectos WHERE MD5(id) = '".$_POST['token']."'");
	$d = mysqli_fetch_array($consulta);
	
	$html = '<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<style>
		
		body{
			font-family: Helvetica;
		}
		
		p{
			margin:0;
		}
		
		.clearfix{
			page-break-after:always;
		}		
		
		.header,
		.footer {
			width: 100%;
			text-align: center;
			position: fixed;
		}
		.header {
			top: -35px;
			color:#fff;
		}
		.footer {
			bottom: 20px;
		}
		
		.text-success 
		{
			color: #2dce89 !important;
		}
		.text-info 
		{
			color: #11cdef !important;
		}
		.text-warning 
		{
			color: #fb6340 !important;
		}
		.text-danger 
		{
			color: #f5365c !important;
		}
		
		.tabla td, .tabla th {
    		white-space: pre-wrap;
		}
		
	</style>
</head>
<body style="background: url(../../test_vocacional/assets/img/formato.png) no-repeat top">
	<div class="container mt-5">
		<div class="row">
			<div class="col-12">
		
				<p>
					<strong>Nombre:</strong> '.$d['nombre'].'
				</p>
				<p>
					<strong>Fecha:</strong> '.Fecha($hoy).'
				</p>
				<p>
					<strong>Correo:</strong> '.$d['correo'].'
				</p>

				<p>
					<strong>Teléfono:</strong> '.$d['telefono'].'
				</p>
				<p>
					<strong>Institución de procedencia:</strong> '.$d['institucion'].'
				</p>
			
				<p class="mt-4">A continuación te presentamos los resultados del test así como la interpretación de ellos y las carreras a fin de tus aptitudes.</p>
			</div>
		</div>
	</div>
	';
	
	//RESULTADO
	$html .= '
	<div class="mt-4">
		<h3 class="text-center">Resultados</h3>
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="text-center">
					<th>Área</th>
					<th>Resultado obtenido</th>
					<th>Intepretación</th>
				</tr>
			</thead>
			<tbody>';
	
	$total = $suma = 0;
	$consulta1 = mysqli_query($conexion,"SELECT * FROM tv_areas");
	while ($d1 = mysqli_fetch_array($consulta1))
	{
		$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS suma FROM tv_test WHERE id_area = '".$d1['id']."' AND id_prospecto = '".$d['id']."'");
		$d2 = mysqli_fetch_array($consulta2);
		$suma = $d2['suma'];

		$consulta3 = mysqli_query($conexion,"SELECT * FROM tv_reactivos WHERE id_area = '".$d1['id']."'");
		$total = mysqli_num_rows($consulta3);

		$max = $total * 4; //Puntuación máxima x 4 que es el valor máximo
		$resultado = ceil( ($suma / $max) * 100);

		if ($resultado <= 25)
		{
			$interpretacion = 'FALTA DE PRÁCTICA';
			$barra = '<strong class="text-danger">'.$resultado.'%</strong>';
		}
		if ($resultado > 25 && $resultado <= 50)
		{
			$interpretacion = 'APTITUDES COMUNES';
			$barra = '<strong class="text-warning">'.$resultado.'%</strong>';
		}
		if ($resultado > 50 && $resultado <= 75)
		{
			$interpretacion = 'APTITUDES NORMALES';
			$barra = '<strong class="text-info">'.$resultado.'%</strong>';
		}
		if ($resultado > 75 && $resultado <= 100)
		{
			$interpretacion = 'APTITUDES DESARROLLADAS';
			$barra = '<strong class="text-success">'.$resultado.'%</strong>';
		}

		$html.= '<tr>
				<td><strong>'.$d1['nombre'].'</strong></td>
				<td align="center">'.$barra.'</td>
				<td>'.$interpretacion.'</td>
			 </tr>';	
	}
	$html.='</tbody></table></div>';
	
	$html.='
		<div class="mt-4" style="page-break-before: always;">
			<h3 class="text-center">Interpretación</h3>
			<table class="table table-bordered tabla">
				<thead>
					<tr>
						<th>Área</th>
						<th>Descripción</th>
						<th>Explicación</th>
						<th>Profesiones</th>
					</tr>
				</thead>
				<tbody>';
				$consulta1 = mysqli_query($conexion,"SELECT * FROM tv_areas");
				while ($d1 = mysqli_fetch_array($consulta1))
				{
					$consulta2 = mysqli_query($conexion,"SELECT SUM(respuesta) AS suma FROM tv_test WHERE id_area = '".$d1['id']."' AND id_prospecto = '".$d['id']."'");
					$d2 = mysqli_fetch_array($consulta2);
					$suma = $d2['suma'];

					$consulta3 = mysqli_query($conexion,"SELECT * FROM tv_reactivos WHERE id_area = '".$d1['id']."'");
					$total = mysqli_num_rows($consulta3);

					$max = $total * 4; //Puntuación máxima x 4 que es el valor máximo
					$resultado = ceil( ($suma / $max) * 100);

					$clase = '';
					if ($resultado > 75 && $resultado <= 100)
					{
						$clase = 'table-success';
					}
					$html.= '<tr class="'.$clase.'">
							<td><strong>'.$d1['nombre'].'</strong></td>
							<td>'.nl2br($d1['descripcion']).'</td>
							<td>'.nl2br($d1['explicacion']).'</td>
							<td>'.nl2br($d1['profesiones']).'</td>
						 </tr>';	
				}
				$html.='
				</tbody>
			</table>
		</div>';
	
	//echo $html;
	//exit();
	require_once("../../includes/mpdf_6.1.4.0/vendor/autoload.php"); 
	$mpdf=new mPDF('utf-8','LETTER');
	$mpdf->SetTopMargin(35);
	$mpdf->SetAutoPageBreak('true',40);
	$mpdf->AddPage();
	$mpdf->WriteHTML($html);
	//$mpdf->AddPage();
	//$mpdf->WriteHTML($html2);	
	$mpdf->Output();
	
}
else
{
	header("location:./");	
}
?>