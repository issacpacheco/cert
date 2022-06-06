<?php
error_reporting(0);
session_start();
function Fecha($f)
{
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
	return substr($f,8,2)." de ". $meses[intval(substr($f,5,2))-1]." de ".substr($f,0,4);
}
function FechaCorta($f)
{
	return substr($f,8,2)."-". substr($f,5,2)."-".substr($f,0,4);
}

function Mes($mes)
{
	$meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
	return $meses[$mes-1];
}
function CrearToken()
{
	$length=40;
    $source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890.#-';
    if($length>0)
	{
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++)
		{
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
function CalculaEdad( $fecha ) {
    $fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
	$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
	$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
	return $edad;
}
function CrearPass($length)
{
    $source = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    if($length>0)
	{
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++)
		{
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
 
    }
    return $rstr;
}
?>