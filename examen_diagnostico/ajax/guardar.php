<?php
include('../../includes/conexion.php');
include('../includes/config.php');
session_start();
if(isset($_SESSION['id']))
{
	$consulta = mysqli_query($conexion3,"SELECT * FROM respuestas WHERE id = '".$_POST['id_respuesta']."'");
	$d = mysqli_fetch_array($consulta);	
	
	mysqli_query($conexion3,"UPDATE examen SET id_respuesta = '".$d['id']."', correcta = '".$d['correcta']."' WHERE id_reactivo = '".$_POST['id_reactivo']."' AND id_aspirante = '".$_SESSION['id']."'");
	
	$consulta = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante = '".$_SESSION['id']."'");
	
	$total = mysqli_num_rows($consulta);
	
	$consulta = mysqli_query($conexion3,"SELECT * FROM examen WHERE id_aspirante = '".$_SESSION['id']."' AND id_respuesta != '0' ");
	$contestadas = mysqli_num_rows($consulta);
	
	$avance = number_format(($contestadas * 100) / $total);
	if ($avance < 50)
	{
		$clase = 'bg-danger';	
	}
	else if ($avance >= 50 && $avance < 70)
	{
		$clase = 'bg-warning';
	}
	else if ($avance >= 70)
	{
		$clase = 'bg-success';
	}
	
	
	$datos = array(
		"total" => $total,
		"contestadas" => $contestadas,
		"avance" => number_format($avance),
		"clase" => $clase,
		"console" => "Sin variables"
	);
	
}
echo json_encode($datos);
exit();
?>