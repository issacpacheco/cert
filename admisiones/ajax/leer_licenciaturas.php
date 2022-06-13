<?php
require_once('../../includes/conexion.php');
//$_POST['opcion'] = 'oferta';
//$_POST['id']=1;
$datos.='<option value="">Seleccionar</option>';
$consulta = mysqli_query($conexion,"SELECT DISTINCT(nombre) FROM oferta_educativa WHERE id_nivel = '5' AND activo = '1'"); 
while ($d = mysqli_fetch_array($consulta))
{
    $datos.='<option value="'.$d['nombre'].'">'.$d['nombre'].'</option>';
}
//echo json_encode($row);
echo $datos;
exit();
?>

