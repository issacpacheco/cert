<?php 
include ('../../config/config.php');
$tabla = 'si_'.$_POST['modulo'];
extract($_REQUEST);
if ($_POST['opcion'] == 'agregar')//ALTA
{
	mysqli_query($conexion,"ALTER TABLE ".$tabla." AUTO_INCREMENT = 0");
	if (mysqli_query($conexion,"INSERT INTO ".$tabla." VALUES (
	'0', 
	'".$clave."', 
	'".$nombre."', 
	'".$descripcion."', 
	'".$modalidad."',
	'".$periodo."',
	'".$duracion."', 
	'1')"))
	{
		//Crear carpeta
		//$id = mysqli_insert_id($conexion);
		echo "1";//Se guardo el registro satisfactoriamente
	}
	else
	{
		echo "-1";//Ocurrío un error en el sistema
	}
}
else if ($_POST['opcion'] == 'editar')
{
	if (mysqli_query($conexion,"UPDATE ".$tabla." SET 
	clave = '".$clave."', 
	nombre = '".$nombre."', 
	descripcion = '".$descripcion."',
	modalidad = '".$modalidad."',
	periodo ='".$periodo."', 
	duracion ='".$duracion."'
	WHERE MD5(id) = '".$token."'"))
	{
		echo "2";//Se guardo el registro satisfactoriamente
	}
	else
	{
		echo "-1";//Ocurrío un error en el sistema
	}
	
}
else if ($_POST['opcion'] == 'eliminar')
{
	$consulta = mysqli_query($conexion,"SELECT * FROM ".$tabla." WHERE MD5(id) = '".$token."' LIMIT 1" );
	$result = mysqli_fetch_array($consulta);
	if ($result['id'] != NULL && $result['id'] != '')
	{
		mysqli_query($conexion,"DELETE FROM ".$tabla." WHERE MD5(id) = '".$token."'");
		echo "3";//Se elimino el registro satisfactoriamente
	}
}
?>