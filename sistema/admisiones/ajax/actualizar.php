<?php
require_once '../../../includes/conexion.php';
if (isset($_POST['tabla']))
{
	mysqli_query($conexion,"UPDATE ".$_POST['tabla']." SET ".$_POST['campo']." = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' LIMIT 1");
	echo "UPDATE ".$_POST['tabla']." SET ".$_POST['campo']." = '".$_POST['valor']."' WHERE id = '".$_POST['id']."' LIMIT 1";
}
exit();
?>

