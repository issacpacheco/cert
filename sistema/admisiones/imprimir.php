<?php 
ini_set('memory_limit', '1024M');
include("includes/config.php");
include('../../includes/fpdf17/fpdf.php');
include('../../includes/FPDI-1.5.2/fpdi.php');
set_time_limit(-1);
if (isset($_POST['id']))
{
	extract($_REQUEST);
	if ($_POST['tabla']=='alumnos')
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM alumnos WHERE id = '".$_POST['id']."' LIMIT 1");
	}
	else
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM aspirantes WHERE id = '".$_POST['id']."' LIMIT 1");
	}
	$d = mysqli_fetch_array($consulta);
	$campus = $d['id_campus']==1?'MÉRIDA':'TICUL';
	$ficha = sprintf("%'.02d",$d['id_campus']).sprintf("%'.03d",$d['id']);
	
	$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."' LIMIT 1");
	$d1 = mysqli_fetch_array($consulta1);
	
	$consulta2 = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id = '".$d1['id_nivel']."' LIMIT 1");
	$d2 = mysqli_fetch_array($consulta2);
	
	$pdf = new FPDI();
	
	# definimos el archivo pdf a leer. Nos devuel el numero de páginas Caratula
	$paginas = $pdf->setSourceFile('../archivos/docs/ficha_pago.pdf');
	$templateId = $pdf-> importPage($paginas);
	$size = $pdf-> getTemplateSize($templateId);
	$pdf->AddPage('P',array($size['h'],$size['w']));
	$templateId = $pdf-> importPage(1);
	$pdf->useTemplate($templateId);
	
	$pdf->SetFont('Helvetica','B',14);

	$pdf->SetXY(170, 64);				
	$pdf->MultiCell(30,5,$ficha,0,'L');
	
	$pdf->SetXY(83, 50);
	$pdf->MultiCell(75,5,utf8_decode('CAMPUS: '.$campus),0,'L');
	
	$pdf->SetFont('Helvetica','B',12);
	$pdf->SetXY(25, 100);				
	$pdf->MultiCell(110,5,utf8_decode($d['nombre'].' '.$d['paterno'].' '.$d['materno']),0,'L');
	
	$pdf->SetXY(25, 110);
	$pdf->MultiCell(110,5,utf8_decode('Programa: '.$d2['nombre'].' en '.$d1['nombre']),0,'L');
	
	$pdf->SetXY(25, 120);
	$pdf->MultiCell(75,5,utf8_decode('Modalidad: Escolarizada'),0,'L');
	
	$pdf->SetXY(25, 130);
	$pdf->MultiCell(75,5,utf8_decode('Campaña: Inscripciones 2022'),0,'L');
	
	$pdf->SetFont('Helvetica','B',12);
	$pdf->SetXY(25, 170);
	$pdf->MultiCell(110,5,utf8_decode('Concepto          Cantidad       Importe          Subtotal'),0,'L');
	$pdf->SetFont('Helvetica','',12);
	$pdf->SetXY(25, 176);
	$pdf->MultiCell(110,5,utf8_decode('Inscripción                1              $ '.number_format($_POST['inscripcion'],2).'      $ '.number_format($_POST['inscripcion'],2)),0,'L');
	
	$pdf->SetFont('Helvetica','B',12);
	$pdf->SetXY(80, 183);
	$pdf->MultiCell(27,5,utf8_decode('Descuento:'),0,'L');
	$pdf->SetFont('Helvetica','',12);
	$pdf->SetXY(110, 183);
	$pdf->MultiCell(25,5,'$ '.number_format( ($_POST['descuento']/100)*$_POST['inscripcion'],2),0,'L');
	
	$pdf->SetFont('Helvetica','B',12);
	$pdf->SetXY(80, 188);
	$pdf->MultiCell(27,5,utf8_decode('Total:'),0,'L');
	$pdf->SetFont('Helvetica','',12);
	$pdf->SetXY(110, 188);
	$pdf->MultiCell(25,5,'$ '.number_format($_POST['total'],2),0,'L');
	
	$pdf->SetXY(155, 163);
	$pdf->MultiCell(75,5,FechaFormato($hoy),0,'L');
	
	$pdf->SetFont('Helvetica','B',16);
	$pdf->SetXY(145, 100);
	$pdf->MultiCell(45,5,'$ '.number_format($_POST['total'],2),0,'L');
	
	$pdf->Output();
}
else
{
	header("location:./");	
}
?>