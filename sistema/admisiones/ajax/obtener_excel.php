<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('America/Mexico_City');
require_once '../../../includes/conexion.php';
header('Content-Type: text/html; charset=utf-8');
header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=alumnos.xls");
?>
<table class="table table-striped table-bordered table-hover nowrap">
    <thead>
        <tr>
            <th> <?php echo utf8_decode( "Nombre" ); ?> </th>
            <th> <?php echo utf8_decode( "Oferta" ); ?> </th>
            <th> <?php echo utf8_decode( "Fecha de registro" ); ?> </th>
            <th> <?php echo utf8_decode( "Matricula" ); ?> </th>
            <th> <?php echo utf8_decode( "Correo" ); ?> </th>
            <th> <?php echo utf8_decode( "Teléfono" ); ?> </th>
            <th> <?php echo utf8_decode( "Genero" ); ?> </th>
            <th> <?php echo utf8_decode( "Estado civil" ); ?> </th>
            <th> <?php echo utf8_decode( "Dirección" ); ?> </th>
            <th> <?php echo utf8_decode( "CURP" ); ?> </th>
            <th> <?php echo utf8_decode( "Nombre de contacto de emergencia" ); ?> </th>
            <th> <?php echo utf8_decode( "Telefeno de contacto de emergencia" ); ?> </th>
            <th> <?php echo utf8_decode( "Institución" ); ?> </th>
            <th> <?php echo utf8_decode( "Lugar de trabajo" ); ?> </th>
            <th> <?php echo utf8_decode( "Medio" ); ?> </th>
        </tr>
    </thead>
    <tbody>
    <?php $consulta = mysqli_query($conexion,	"SELECT a.*, o.nombre as oferta FROM alumnos a LEFT JOIN oferta_educativa o ON o.id = a.id_oferta WHERE a.id_campus = '".$_SESSION['campus']."' ORDER BY a.fecha_registro");
            while ($d = mysqli_fetch_array($consulta)){ ?>
            <tr>
                <td><?php echo utf8_decode($d['nombre'].$d['paterno'].$d['materno']) ?></td>
                <td><?php echo utf8_decode($d['oferta']) ?></td>
                <td><?php echo $d['fecha_registro'] ?></td>
                <td><?php echo utf8_decode($d['matricula']) ?></td>
                <td><?php echo utf8_decode($d['correo']) ?></td>
                <td><?php echo utf8_decode($d['telefono']) ?></td>
                <td><?php echo utf8_decode($d['genero']) ?></td>
                <td><?php echo utf8_decode($d['estado_civil']) ?></td>
                <td><?php echo utf8_decode($d['direccion']) ?></td>
                <td><?php echo utf8_decode($d['curp']) ?></td>
                <td><?php echo utf8_decode($d['emergencia_nombre']) ?></td>
                <td><?php echo utf8_decode($d['emergencia_telefono']) ?></td>
                <td><?php echo utf8_decode($d['institucion']) ?></td>
                <td><?php echo utf8_decode($d['lugar_trabajo']) ?></td>
                <td><?php echo utf8_decode($d['medio']) ?></td>
            </tr>
    <?php } ?>
    </tbody>
</table>