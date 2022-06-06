<?php
require_once('../../includes/conexion.php');
//$_POST['opcion'] = 'oferta';
//$_POST['id']=1;
if ($_POST['opcion']=='campus')
{
	$c=1;
	if ($_POST['limit']=='medico')
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM campus WHERE id ='2'");	
	}
	else
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM campus ");
	}
		
	while ($d = mysqli_fetch_array($consulta))
	{
		//$datos[] = $d;
		if ($c==1)
		{
			$c++;
			$datos.='<option value="" selected>Seleccionar</option>';
		}
		$datos.='<option value="'.$d['id'].'">'.$d['nombre'].'</option>';
	}
	/*$row = array(
		"datos" => $datos
	);*/
}
else if ($_POST['opcion']=='oferta')
{
	if ($_POST['limit']=='posgrados')
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id > 5");
	}
	else if ($_POST['limit']=='prospectos')
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id >= 5");
	}
	else 
	{
		$consulta = mysqli_query($conexion,"SELECT * FROM niveles_academicos WHERE id = 5");
	}
	while ($d = mysqli_fetch_array($consulta))
	{
		$datos.='<optgroup label="'.$d['nombre'].'">';
		if ($_POST['limit']=='licenciaturas')
		{
			$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id_campus = '".$_POST['id']."' AND id_nivel = '".$d['id']."' AND activo = '1' AND id !='3' AND id !='4' AND id !='19' AND id !='22'");	
		}
		else if ($_POST['limit']=='medico')
		{
			$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id_campus = '".$_POST['id']."' AND id_nivel = '".$d['id']."' AND activo = '1' AND id ='22'");	
		}
		else if ($_POST['limit']=='educacion')
		{
			$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id_campus = '".$_POST['id']."' AND id_nivel = '".$d['id']."' AND activo = '1' AND (id ='3' OR id ='4' OR id ='19')");	
		}
		else 
		{
			$consulta1 = mysqli_query($conexion,"SELECT * FROM oferta_educativa WHERE id_campus = '".$_POST['id']."' AND id_nivel = '".$d['id']."' AND activo = '1'");	
		}
		
		while ($d1 = mysqli_fetch_array($consulta1))
		{
			$datos.='<option value="'.$d1['id'].'" data-nivel="'.$d['id'].'">'.$d1['nombre'].'</option>';
		}
		$datos.='</optgroup>';
	}
	
	/*$row = array(
		"datos" => $datos
	);*/
}
else
{
	$row = array(
		"resp"=>"-1",
	);
}
//echo json_encode($row);
echo $datos;
exit();
?>

