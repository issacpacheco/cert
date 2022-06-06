<?php 
ini_set('memory_limit', '1024M');
include("includes/config.php");
include('../../includes/fpdf17/fpdf.php');
include('../../includes/FPDI-1.5.2/fpdi.php');
set_time_limit(-1);

if (isset($_POST['id']))
{
	extract($_REQUEST);
	$consulta = mysqli_query($conexion,"SELECT * FROM alumnos WHERE id = '".$_POST['id']."' LIMIT 1");
	
	$d = mysqli_fetch_array($consulta);
	$campus = $d['id_campus']==1?'MÉRIDA':'TICUL';
	
	$d['id_oferta'];
	$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id = '".$d['id_oferta']."' LIMIT 1");
	$d1 = mysqli_fetch_array($consulta1);
	
	$pdf = new FPDI();
	
	# definimos el archivo pdf a leer. Nos devuel el numero de páginas Caratula
	$pdf->setSourceFile('../archivos/formatos/credencial.pdf');
	$templateId = $pdf-> importPage(1);
	$size = $pdf-> getTemplateSize($templateId);
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(false, 0);
	$pdf->AddPage('L',array($size['w'],$size['h']));
	
	$pdf->useTemplate($templateId);
	$pdf->SetTextColor(10,42,68);
	
	//OFERTA EDUCATIVA
	$size = 16;
	$y = 9;
	if (strlen($d1['nombre']) >= 15)
	{
		$size = 12; 
		$y = 8;
	}
	if (strlen($d1['nombre']) >= 35)
	{
		$size = 12; 
		$y = 6;
	}
	$pdf->SetFont('Helvetica','B',$size);
	$pdf->SetXY(25, $y);				
	$pdf->MultiCell(55,5,utf8_decode(mb_strtoupper($d1['nombre'],'UTF-8')),0,'C');
	
	$pdf->SetFont('Helvetica','B',7);
	$pdf->SetXY(5, 33.7);				
	$pdf->MultiCell(53,2.5,utf8_decode($d['nombre'].' '.$d['paterno'].' '.$d['materno']),0,'L');
	
	$pdf->SetXY(5, 39);				
	$pdf->MultiCell(53,3,utf8_decode($d['correo_institucional']),0,'L');
	
	$pdf->SetTextColor(114,28,24);
	$pdf->SetXY(5, 46);				
	$pdf->MultiCell(53,3,'Vigencia:',0,'L');
	
	
	$pdf->SetFont('Helvetica','',7);
	$pdf->SetTextColor(10,42,68);
	$pdf->SetXY(17, 46);				
	$pdf->MultiCell(53,3,$anio.' - '.($anio+2),0,'L');

	if(file_exists('../archivos/alumnos/'.$d['id'].'/foto.jpg')){
		$fotocrendencia = '../archivos/alumnos/'.$d['id'].'/foto.jpg';
	}else{
		switch($d['genero']){
			case 'Femenino':
				$fotocrendencia = 'images/female.png';
			break;
			case 'Masculino':
				$fotocrendencia = 'images/male.png';
			break;
		}
		
	}
	
	$pdf->Image($fotocrendencia,57.6,20.3,23.4);
	
	$templateId = $pdf-> importPage(2);
	$size = $pdf-> getTemplateSize($templateId);
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(false, 0);
	$pdf->AddPage('L',array($size['w'],$size['h']));
	$pdf->useTemplate($templateId);
	
	$pdf->Output();
}
else
{
	header("location:./");	
}
?>