<?php
include('../../includes/conexion.php');
include('../includes/config.php');
session_start();
if(isset($_SESSION['id']))
{	
	mysqli_query($conexion3,"UPDATE examen SET marcada = '".$_POST['marcar']."' WHERE id_reactivo = '".$_POST['id_reactivo']."' AND id_aspirante = '".$_SESSION['id']."'");
	
	$datos = array(
		"console" => "Sin variables"
	);
	
}
echo json_encode($datos);
exit();
?>