<?php
include_once("../class/allClass.php");
use conexionbd\mysqlconsultas;
$ejecucion = new mysqlconsultas();

$nombre         = filter_input(INPUT_POST, 'nombre',        FILTER_SANITIZE_SPECIAL_CHARS);
$cantidad       = filter_input(INPUT_POST, 'cantidad',      FILTER_SANITIZE_SPECIAL_CHARS);
$descripcion    = filter_input(INPUT_POST, 'descripcion',   FILTER_SANITIZE_SPECIAL_CHARS);
$codigo         = filter_input(INPUT_POST, 'codigo',        FILTER_SANITIZE_SPECIAL_CHARS);
$precio         = filter_input(INPUT_POST, 'precio',        FILTER_SANITIZE_SPECIAL_CHARS);
$categoria      = filter_input(INPUT_POST, 'categoria',     FILTER_SANITIZE_NUMBER_INT);
$estatus        = filter_input(INPUT_POST, 'estatus',       FILTER_SANITIZE_NUMBER_INT);
$id             = filter_input(INPUT_POST, 'id_material',   FILTER_SANITIZE_NUMBER_INT);
$id_bodega      = filter_input(INPUT_POST, 'id_bodega',     FILTER_SANITIZE_NUMBER_INT);
$id_unidad      = filter_input(INPUT_POST, 'id_unidad',     FILTER_SANITIZE_NUMBER_INT);

$qry = "UPDATE inv_productos SET nombre = '$nombre',descripcion = '$descripcion', id_unidad = '$id_unidad' WHERE id = '$id'";

$ejecucion->ejecuta($qry);

$qryRelacion = "UPDATE inv_campus_producto SET cantidad = '$cantidad', numero_serie = '$codigo', id_categoria = '$categoria', id_bodega = '$id_bodega', id_estatus = '$estatus',  precio = '$precio', mod_fecha_entrada = curdate(), mod_hora_entrada = curtime() WHERE id_producto = '$id' AND id_campus = '{$_SESSION['campus']}'";
$ejecucion->ejecuta($qryRelacion);
