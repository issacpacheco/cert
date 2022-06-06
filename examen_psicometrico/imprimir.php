<?php 
ini_set('memory_limit', '1024M');
include('../includes/conexion.php');
include('../includes/fpdf17/fpdf.php');
include('../includes/FPDI-1.5.2/fpdi.php');
include('includes/config.php');
set_time_limit(-1);

if (isset($_POST['id']))
{
	extract($_REQUEST);
	$consulta = mysqli_query($conexion2,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	$d = mysqli_fetch_array($consulta);
	$campus = $d['id_campus']==1 ? 'Mérida' : 'Ticul';
	
	$pdf = new FPDI();
	
	# definimos el archivo pdf a leer. Nos devuel el numero de páginas Caratula
	$paginas = $pdf->setSourceFile('../sistema/archivos/constancias/examen_psicometrico.pdf');
	$templateId = $pdf-> importPage($paginas);
	$size = $pdf-> getTemplateSize($templateId);
	$pdf->AddPage('L',array($size['w'],$size['h']));
	$templateId = $pdf-> importPage(1);
	$pdf->useTemplate($templateId);
	
	
	$pdf->SetFont('Helvetica','B',55);
	$pdf->SetTextColor(19, 43, 69);
	$pdf->SetXY(15, 163);				
	$pdf->MultiCell(0,10,utf8_decode($d['nombre'].' '.$d['paterno'].' '.$d['materno']),0,'L');
	$pdf->SetFont('Helvetica','',20);
	$pdf->SetXY(325, 230);
	$pdf->MultiCell(0,10,utf8_decode($campus.', Yucatán a '.Fecha($hoy)),0,'L');
	
	$pdf->Output();
}
else
{
	header("location:./");	
}
?>