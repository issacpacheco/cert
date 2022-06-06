<?php
include('../../includes/conexion.php');
include('../includes/config.php');
session_start();
$datos[] = array(
	"respuesta" => "NULL",
	"console" => "NULL"
);
if(isset($_SESSION['id']) && isset($_POST['respuesta']))
{
	mysqli_query($conexion2,"ALTER TABLE honestidad AUTO_INCREMENT = 0");
	if (mysqli_query($conexion2,"INSERT INTO honestidad VALUES ('0', '".$_SESSION['id']."', '1')"))
	{
		$datos[] = array(
			"respuesta" => $_POST['respuesta'],
			"console" => "Se guardó el registro correctamente"
		);
	}
	else
	{
		$datos[] = array(
			"respuesta" => $_POST['respuesta'],
			"console" => "No se guardó el registro"
		);
	}
}
$row = array(
	"datos" => $datos
);
echo json_encode($row);
exit();
?>