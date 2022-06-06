<?php
$conexion = mysqli_connect("localhost","root","fabricandomarcas","examen_diagnostico");
mysqli_query($conexion,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
ini_set('memory_limit', '512M');
date_default_timezone_set('America/Mexico_City');
$hoy = date("Y-m-d");
$anio = substr($hoy,0,4);

$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$pos = strrpos($url, '/');
$pagina = $pos === false ? $url : substr($url, $pos + 1);

function mb_ucfirst($string, $encoding)
{
    $strlen = mb_strlen($string, $encoding);
    $firstChar = mb_substr($string, 0, 1, $encoding);
    $then = mb_substr($string, 1, $strlen - 1, $encoding);
	$then = mb_strtolower($then, $encoding);
    return mb_strtoupper($firstChar, $encoding) . $then;
}

session_start();
if (!isset($_SESSION['id_admin']))
{
	header("location:login");
}

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
function BorrarCarpeta($dir) 
{
	$Res = false;
	if ( file_exists($dir) )
	{
		$dh = opendir($dir);
		while ($file=readdir($dh)) 
		{
			if ($file!="." && $file!="..") 
			{
				$fullpath = $dir."/".$file;
				if (!is_dir($fullpath)) 
				{
					unlink($fullpath);
				} 
				else 
				{
					BorrarCarpeta($fullpath);
				}
			}
		}
		closedir($dh);
		if (rmdir($dir)) 
		{
			$Res = true;
		} 
	}
	return $Res;
}
function tildes($cadena) 
{
	// Tranformamos todo a minusculas
	$cadena = strtolower($cadena);

	//Rememplazamos caracteres especiales latinos
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	$repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
	$cadena = str_replace ($find, $repl, $cadena);
	return $cadena;

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

function esArchivo($nombreArchivo, $extensionesPermitidas ) 
{
	$extension = substr(strrchr($nombreArchivo, '.'), 1);
	foreach ($extensionesPermitidas as $extensiones)
	{
		if(!strcasecmp($extension, $extensiones)) 
		{
			return true;
		}
	}
}

function LeerImagenes($path)
{
	$dir = opendir($path);
	while ($elemento = readdir($dir)) 
	{
		if($elemento == '.' || $elemento == '..') {}
		elseif (esArchivo($elemento,array("jpeg", "jpg","png","gif"))) 
		{						
			$elementos[] = $elemento;
		}
	}
	return $elementos;
	closedir($dir); 
}

function CalculaEdad( $fecha ) {
    $fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
	$fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
	$edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
	return $edad;
}
?>