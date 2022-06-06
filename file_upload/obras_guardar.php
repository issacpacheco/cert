<?php
include( "includes/config.php" );
session_start();
//Verificar que no exista en la base de datos
extract($_REQUEST);

if ($opcion == 1)//ALTA
{
	$disponible = isset($_POST['disponible']) == true ? 1:0;
	$descripcion = Limpiar($descripcion);
	mysqli_query($conexion,"ALTER TABLE obras AUTO_INCREMENT = 0");
	if (mysqli_query($conexion,"INSERT INTO obras VALUES (
	'0', 
	'".$id_artista."',
	'".$nombre."', 
	'".$precio."', 
	'".$dolar."', 
	'".addslashes($descripcion)."', 
	'".$disponible."')"))
	{
		$id = mysqli_insert_id($conexion);
		
		//Crear carpeta
		rename("../images/obras/temp_bak","../images/obras/".$id);
		rename("../images/obras/temp_bak/medium","../images/obras/".$id."/medium");
		rename("../images/obras/temp_bak/thumb","../images/obras/".$id."/thumb");
		echo $id;//Se guardo el registro satisfactoriamente
	}
	else
	{
		echo "-1";//Ocurrío un error en el sistema
	}
}
else if ($opcion == 2)//CAMBIOS
{
	$disponible = isset($_POST['disponible']) == true ? 1:0;
	$descripcion = Limpiar($descripcion);
	if (mysqli_query($conexion,"UPDATE obras SET 
	id_artista = '".$id_artista."',
	nombre ='".$nombre."', 
	precio ='".$precio."', 
	dolar ='".$dolar."', 
	descripcion ='".addslashes($descripcion)."',
	disponible ='".$diponible."'
	WHERE id = '".$id."'"))
	{
		echo $id;//Se guardo el registro satisfactoriamente
	}
	else
	{
		echo "-1";//Ocurrío un error en el sistema
	}
	
}
else if ($opcion == 3)//ELIMINAR
{
	$consulta = mysqli_query($conexion,"SELECT * FROM obras WHERE id = '".$id."' LIMIT 1" );
	$result = mysqli_fetch_array($consulta);
	if ($result['id'] != NULL && $result['id'] != '')
	{
		mysqli_query($conexion,"DELETE FROM obras WHERE id = '".$id."'");
		if ($id != '')
		{
			BorrarCarpeta('../images/obras/'.$id);
		}
		echo $id;//Se elimino el registro satisfactoriamente
	}
}
?>