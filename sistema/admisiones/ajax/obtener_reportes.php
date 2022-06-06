<?php
session_start();
error_reporting(E_ALL);
include("../../../includes/class/allClass.php");
include_once("../../../includes/funciones.php");


use nsreportes\reportes;
use nsfunciones\funciones;

$fn = new funciones();
$get = new reportes();

$tipo       = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$campus     = filter_input(INPUT_POST, 'campus', FILTER_SANITIZE_NUMBER_INT);
$fecha      = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);

//Formateo de fechas
$fecha1 = substr( $fecha, 0, 2 ) . '/' . substr( $fecha, 3, 2 ) . '/' . substr( $fecha, 6, 4 );
$fecha2 = substr( $fecha, 13, 2 ) . '/' . substr( $fecha, 16, 2 ) . '/' . substr( $fecha, 19, 4 );

$fecha_ini = FormatoFechaReportes($fecha1);
$fecha_fin = FormatoFechaReportes($fecha2);

switch ($tipo){
    case "alumnos":

        $a = $get->obtener_reporte_alumnos($campus,$fecha_ini,$fecha_fin);
        $ca = $fn->cuentarray($a)

?>

<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
    <thead>
        <tr>
            <th> <?php echo ( "Nombre" ); ?> </th>
            <th> <?php echo ( "Campus" ); ?> </th>
            <th> <?php echo ( "Carrera" ); ?> </th>
            <th> <?php echo ( "Fecha de ingreso" ); ?> </th>
            <th> <?php echo ( "Correo" ); ?> </th>
            <th> <?php echo ( "Teléfono" ); ?> </th>
            <th> <?php echo ( "Matricula" ); ?> </th>
            <th> <?php echo ( "Fecha de nacimiento" ); ?> </th>
            <th> <?php echo ( "Genero" ); ?> </th>
            <th> <?php echo ( "Estado civil" ); ?> </th>
            <th> <?php echo ( "Dirección" ); ?> </th>
            <th> <?php echo ( "CURP" ); ?> </th>
            <th> <?php echo ( "Nombre de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Teléfono de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Institución" ); ?> </th>
            <th> <?php echo ( "Lugar de trabajo" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php 
            for($i = 0; $i < $ca; $i++){ ?>
            <tr>
                <td><?php echo utf8_encode($a['nombre'][$i].$a['paterno'][$i].$a['materno'][$i]); ?></td>
                <td><?php echo utf8_encode($a['campus'][$i]); ?></td>
                <td><?php echo utf8_encode($a['oferta'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_registro'][$i]); ?></td>
                <td><?php echo utf8_encode($a['correo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['matricula'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_nac'][$i]); ?></td>
                <td><?php echo utf8_encode($a['genero'][$i]); ?></td>
                <td><?php echo utf8_encode($a['estado_civil'][$i]); ?></td>
                <td><?php echo utf8_encode($a['direccion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['curp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_nombre'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['institucion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['lugar_trabajo'][$i]); ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php
    break;
    case "prospectos":
        $a = $get->obtener_reporte_prospectos($campus,$fecha_ini,$fecha_fin);
        $ca = $fn->cuentarray($a);
?>

<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
    <thead>
        <tr>
            <th> <?php echo ( "Nombre" ); ?> </th>
            <th> <?php echo ( "Campus" ); ?> </th>
            <th> <?php echo ( "Carrera" ); ?> </th>
            <th> <?php echo ( "Fecha de registro" ); ?> </th>
            <th> <?php echo ( "Correo" ); ?> </th>
            <th> <?php echo ( "Teléfono" ); ?> </th>
            <th> <?php echo ( "Horario" ); ?> </th>
            <th> <?php echo ( "Institución" ); ?> </th>
            <th> <?php echo ( "Medio" ); ?> </th>
            <th> <?php echo ( "Asesor en seguimiento" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < $ca; $i++){ ?>
            <tr>
                <td><?php echo utf8_encode($a['nombre'][$i]); ?></td> 
                <td><?php echo utf8_encode($a['campus'][$i]); ?></td>
                <td><?php echo utf8_encode($a['oferta'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_registro'][$i]); ?></td>
                <td><?php echo utf8_encode($a['correo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['horario'][$i]); ?></td>
                <td><?php echo utf8_encode($a['institucion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['medio'][$i]); ?></td>
                <td><?php echo utf8_encode($a['asesor'][$i]); ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php
    break;
    case "aspirantes":
        $a = $get->obtener_reporte_aspirantes($campus,$fecha_ini,$fecha_fin);
        $ca = $fn->cuentarray($a);
?>

<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
    <thead>
        <tr>
            <th> <?php echo ( "Nombre" ); ?> </th>
            <th> <?php echo ( "Campus" ); ?> </th>
            <th> <?php echo ( "Carrera" ); ?> </th>
            <th> <?php echo ( "Fecha de registro" ); ?> </th>
            <th> <?php echo ( "Correo" ); ?> </th>
            <th> <?php echo ( "Teléfono" ); ?> </th>
            <th> <?php echo ( "Fecha de nacimiento" ); ?> </th>
            <th> <?php echo ( "Genero" ); ?> </th>
            <th> <?php echo ( "Estado civil" ); ?> </th>
            <th> <?php echo ( "Dirección" ); ?> </th>
            <th> <?php echo ( "Municipio" ); ?> </th>
            <th> <?php echo ( "Codigo Postal" ); ?> </th>
            <th> <?php echo ( "CURP" ); ?> </th>
            <th> <?php echo ( "Nombre de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Teléfono de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Institución" ); ?> </th>
            <th> <?php echo ( "Lugar de trabajo" ); ?> </th>
            <th> <?php echo ( "Medio" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < $ca; $i++){ ?>
            <tr>
                <td><?php echo utf8_encode($a['nombre'][$i].$a['paterno'][$i].$a['materno'][$i]); ?></td>
                <td><?php echo utf8_encode($a['campus'][$i]); ?></td>
                <td><?php echo utf8_encode($a['oferta'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_registro'][$i]); ?></td>
                <td><?php echo utf8_encode($a['correo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_nac'][$i]); ?></td>
                <td><?php echo utf8_encode($a['genero'][$i]); ?></td>
                <td><?php echo utf8_encode($a['estado_civil'][$i]); ?></td>
                <td><?php echo utf8_encode($a['direccion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['municipio'][$i]); ?></td>
                <td><?php echo utf8_encode($a['cp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['curp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_nombre'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['institucion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['lugar_trabajo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['medio_llegada'][$i]); ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php
    break;
    case "completos":
        $a = $get->obtener_reporte_completos($campus,$fecha_ini,$fecha_fin);
        $ca = $fn->cuentarray($a);
?>

<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
    <thead>
        <tr>
            <th> <?php echo ( "Nombre" ); ?> </th>
            <th> <?php echo ( "Campus" ); ?> </th>
            <th> <?php echo ( "Carrera" ); ?> </th>
            <th> <?php echo ( "Fecha de registro" ); ?> </th>
            <th> <?php echo ( "Correo" ); ?> </th>
            <th> <?php echo ( "Teléfono" ); ?> </th>
            <th> <?php echo ( "Fecha de nacimiento" ); ?> </th>
            <th> <?php echo ( "Genero" ); ?> </th>
            <th> <?php echo ( "Estado civil" ); ?> </th>
            <th> <?php echo ( "Dirección" ); ?> </th>
            <th> <?php echo ( "Municipio" ); ?> </th>
            <th> <?php echo ( "Codigo Postal" ); ?> </th>
            <th> <?php echo ( "CURP" ); ?> </th>
            <th> <?php echo ( "Nombre de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Teléfono de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Institución" ); ?> </th>
            <th> <?php echo ( "Lugar de trabajo" ); ?> </th>
            <th> <?php echo ( "Medio" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < $ca; $i++){ ?>
            <tr>
                <td><?php echo utf8_encode($a['nombre'][$i].$a['paterno'][$i].$a['materno'][$i]); ?></td>
                <td><?php echo utf8_encode($a['campus'][$i]); ?></td>
                <td><?php echo utf8_encode($a['oferta'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_registro'][$i]); ?></td>
                <td><?php echo utf8_encode($a['correo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_nac'][$i]); ?></td>
                <td><?php echo utf8_encode($a['genero'][$i]); ?></td>
                <td><?php echo utf8_encode($a['estado_civil'][$i]); ?></td>
                <td><?php echo utf8_encode($a['direccion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['municipio'][$i]); ?></td>
                <td><?php echo utf8_encode($a['cp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['curp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_nombre'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['institucion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['lugar_trabajo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['medio_llegada'][$i]); ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php
    break;
    case "psicometrico":
        $a = $get->obtener_reporte_psicometricos($campus,$fecha_ini,$fecha_fin);
        $ca = $fn->cuentarray($a);
?>

<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
    <thead>
        <tr>
            <th> <?php echo ( "Nombre" ); ?> </th>
            <th> <?php echo ( "Campus" ); ?> </th>
            <th> <?php echo ( "Carrera" ); ?> </th>
            <th> <?php echo ( "Fecha de registro" ); ?> </th>
            <th> <?php echo ( "Correo" ); ?> </th>
            <th> <?php echo ( "Teléfono" ); ?> </th>
            <th> <?php echo ( "Fecha de nacimiento" ); ?> </th>
            <th> <?php echo ( "Genero" ); ?> </th>
            <th> <?php echo ( "Estado civil" ); ?> </th>
            <th> <?php echo ( "Dirección" ); ?> </th>
            <th> <?php echo ( "Municipio" ); ?> </th>
            <th> <?php echo ( "Codigo Postal" ); ?> </th>
            <th> <?php echo ( "CURP" ); ?> </th>
            <th> <?php echo ( "Nombre de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Teléfono de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Institución" ); ?> </th>
            <th> <?php echo ( "Lugar de trabajo" ); ?> </th>
            <th> <?php echo ( "Medio" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < $ca; $i++){ ?>
            <tr>
                <td><?php echo utf8_encode($a['nombre'][$i].$a['paterno'][$i].$a['materno'][$i]); ?></td>
                <td><?php echo utf8_encode($a['campus'][$i]); ?></td>
                <td><?php echo utf8_encode($a['oferta'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_registro'][$i]); ?></td>
                <td><?php echo utf8_encode($a['correo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_nac'][$i]); ?></td>
                <td><?php echo utf8_encode($a['genero'][$i]); ?></td>
                <td><?php echo utf8_encode($a['estado_civil'][$i]); ?></td>
                <td><?php echo utf8_encode($a['direccion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['municipio'][$i]); ?></td>
                <td><?php echo utf8_encode($a['cp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['curp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_nombre'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['institucion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['lugar_trabajo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['medio_llegada'][$i]); ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php
    break;
    case "diagnostico":
        $a = $get->obtener_reporte_diagnostico($campus,$fecha_ini,$fecha_fin);
        $ca = $fn->cuentarray($a);
?>

<table class="table table-striped table-bordered table-hover nowrap" id="tabla">
    <thead>
        <tr>
            <th> <?php echo ( "Nombre" ); ?> </th>
            <th> <?php echo ( "Campus" ); ?> </th>
            <th> <?php echo ( "Carrera" ); ?> </th>
            <th> <?php echo ( "Fecha de registro" ); ?> </th>
            <th> <?php echo ( "Correo" ); ?> </th>
            <th> <?php echo ( "Teléfono" ); ?> </th>
            <th> <?php echo ( "Fecha de nacimiento" ); ?> </th>
            <th> <?php echo ( "Genero" ); ?> </th>
            <th> <?php echo ( "Estado civil" ); ?> </th>
            <th> <?php echo ( "Dirección" ); ?> </th>
            <th> <?php echo ( "Municipio" ); ?> </th>
            <th> <?php echo ( "Codigo Postal" ); ?> </th>
            <th> <?php echo ( "CURP" ); ?> </th>
            <th> <?php echo ( "Nombre de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Teléfono de contacto de emergencia" ); ?> </th>
            <th> <?php echo ( "Institución" ); ?> </th>
            <th> <?php echo ( "Lugar de trabajo" ); ?> </th>
            <th> <?php echo ( "Medio" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php for($i = 0; $i < $ca; $i++){ ?>
            <tr>
                <td><?php echo utf8_encode($a['nombre'][$i].$a['paterno'][$i].$a['materno'][$i]); ?></td>
                <td><?php echo utf8_encode($a['campus'][$i]); ?></td>
                <td><?php echo utf8_encode($a['oferta'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_registro'][$i]); ?></td>
                <td><?php echo utf8_encode($a['correo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['fecha_nac'][$i]); ?></td>
                <td><?php echo utf8_encode($a['genero'][$i]); ?></td>
                <td><?php echo utf8_encode($a['estado_civil'][$i]); ?></td>
                <td><?php echo utf8_encode($a['direccion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['municipio'][$i]); ?></td>
                <td><?php echo utf8_encode($a['cp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['curp'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_nombre'][$i]); ?></td>
                <td><?php echo utf8_encode($a['emergencia_telefono'][$i]); ?></td>
                <td><?php echo utf8_encode($a['institucion'][$i]); ?></td>
                <td><?php echo utf8_encode($a['lugar_trabajo'][$i]); ?></td>
                <td><?php echo utf8_encode($a['medio_llegada'][$i]); ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>