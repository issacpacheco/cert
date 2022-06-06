<?php
include("../includes/config.php");
//$_POST['opcion'] = 'oferta';
//$_POST['id']=1;
if ($_POST['opcion']=='campus')
{
	$c=1;
	$consulta = mysql_query("SELECT * FROM ".$_POST['opcion']." ");	
	while ($d = mysql_fetch_array($consulta))
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
	$c=1;
	$consulta = mysql_query("SELECT * FROM ".$_POST['opcion']." WHERE id_campus = '".$_POST['id']."' ORDER BY nivel");	
	while ($d = mysql_fetch_array($consulta))
	{
		//$datos[] = $d;
		if ($d['id'] == 99 || $d['id'] == 3 || $d['id'] == 4 || $d['id'] == 21)
		{
			//continue;
		}
		if ($c==1)
		{
			$c++;
			$aux = $d['nivel'];
			$datos.='<optgroup label="'.$aux.'">
			<option value="'.$d['id'].'" selected data-nivel="'.$aux.'">'.$d['nombre'].'</option>';
		}
		else
		{
			if ($aux==$d['nivel'])
			{
				$datos.='<option value="'.$d['id'].'" data-nivel="'.$aux.'">'.$d['nombre'].'</option>';
			}
			else
			{
				$aux = $d['nivel'];
				$datos.='</optgroup>
				<optgroup label="'.$aux.'">
				<option value="'.$d['id'].'" data-nivel="'.$aux.'">'.$d['nombre'].'</option>';
			}
		}
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

