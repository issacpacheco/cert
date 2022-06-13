<?php 
session_start();
error_reporting(E_ALL);
include("../../../includes/class/allClass.php");
include_once("../../../includes/funciones.php");
header('Content-Type: text/html; charset=utf-8');
// header('Content-Type: text/html; charset=iso-8859-1');

$tipo       = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_SPECIAL_CHARS);
$campus     = filter_input(INPUT_POST, 'campus', FILTER_SANITIZE_NUMBER_INT);
$fecha      = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_SPECIAL_CHARS);

use nsreportes\reportes;
use nsfunciones\funciones;

$fn = new funciones();
$get = new reportes();

//Formateo de fechas
$fecha1 = substr( $fecha, 0, 2 ) . '/' . substr( $fecha, 3, 2 ) . '/' . substr( $fecha, 6, 4 );
$fecha2 = substr( $fecha, 13, 2 ) . '/' . substr( $fecha, 16, 2 ) . '/' . substr( $fecha, 19, 4 );

$fecha_ini = FormatoFechaReportes($fecha1);
$fecha_fin = FormatoFechaReportes($fecha2);

switch ($tipo){
    case "alumnos":
        $h = $get->obtener_graficas_alumnos($campus,$fecha_ini,$fecha_fin);
        $arreglocarreras = array("Carreras" => array("administracion_mercadotecnia"                      => $h['administracion_mercadotecnia'][0],
                                                    "derecho"                                            => $h['derecho'][0],
                                                    "educacion_preescolar"                               => $h['educacion_preescolar'][0],
                                                    "educacion_primaria"                                 => $h['educacion_primaria'][0],
                                                    "enfermeria"                                         => $h['enfermeria'][0],
                                                    "fisioterapia"                                       => $h['fisioterapia'][0],
                                                    "nutricion"                                          => $h['nutricion'][0],
                                                    "psicologia"                                         => $h['psicologia'][0],
                                                    "enfermeria_cuidados_intensivos"                     => $h['enfermeria_cuidados_intensivos'][0],
                                                    "enfermeria_pediatrica"                              => $h['enfermeria_pediatrica'][0],
                                                    "enfermeria_quirurgica"                              => $h['enfermeria_quirurgica'][0],
                                                    "gestion_docencia_servicios_enfermeria"              => $h['gestion_docencia_servicios_enfermeria'][0],
                                                    "derecho_procesal_penal"                             => $h['derecho_procesal_penal'][0],
                                                    "innovacion_desarrollo_educativos"                   => $h['innovacion_desarrollo_educativos'][0],
                                                    "salud_publica"                                      => $h['salud_publica'][0],
                                                    "doctorado_educacion"                                => $h['doctorado_educacion'][0],
                                                    "medico_cirujano"                                    => $h['medico_cirujano'][0],
                                                    "turismo"                                            => $h['turismo'][0]));

        $json['graficascarreras'] = $arreglocarreras;

        $e = $get->obtener_rango_edad_alumnos($campus,$fecha_ini,$fecha_fin);
        for($i = 0; $i < count($e['id']); $i++){
            $json['graficasrangoedad']['rangos'][$i]  = array("edad" => $e['edad'][$i], "total" => $e['total'][$i]);
        }

        $a = $get->obtener_graficas_instituciones_alumnos($campus,$fecha_ini,$fecha_fin);
        for ($i=0; $i < 10; $i++) { 
            $json['graficasinstituciones']['instituciones'][$i]  = array("cantidad" => $a['total'][$i], "nombre" => utf8_encode(html_entity_decode($a['institucion'][$i])));
        }

        $g = $get->obtener_generos_alumnos($campus,$fecha_ini,$fecha_fin);
        $arreglogeneros = array("generos" => array("masculino"  => $g['masculino'][0], "femenino" => $g['femenino'][0]));
        $json['graficasgenero'] = $arreglogeneros;


        $json = json_encode($json);
        print_r($json);
    break;
    case "prospectos":
        $arreglomedios          = [];
        $arreglocarreras        = [];
        $arregloinstituciones   = [];
        $arreglohorario         = [];

        $g = $get->obtener_graficas_medios_prospectos($campus,$fecha_ini,$fecha_fin);
        $arreglomedios = array("Medios" => array("facebook"                          => $g['facebook'][0],
                                                    "google"                         => $g['google'][0],
                                                    "instagram"                      => $g['instagram'][0],
                                                    "whatsapp"                       => $g['whatsapp'][0],
                                                    "periodico"                      => $g['periodico'][0],
                                                    "ferias_vocacionales"            => $g['ferias_vocacionales'][0],
                                                    "espectaculares"                 => $g['espectaculares'][0],
                                                    "visita_plantel"                 => $g['visita_plantel'][0],
                                                    "publicidad_transporte_publico"  => $g['publicidad_transporte_publico'][0],
                                                    "television"                     => $g['television'][0],
                                                    "recomendacion"                  => $g['recomendacion'][0],
                                                    "otros"                          => $g['otros'][0]));

        $h = $get->obtener_graficas_carreras_prospectos($campus,$fecha_ini,$fecha_fin);
        $arreglocarreras = array("Carreras" => array("administracion_mercadotecnia"                      => $h['administracion_mercadotecnia'][0],
                                                    "derecho"                                            => $h['derecho'][0],
                                                    "educacion_preescolar"                               => $h['educacion_preescolar'][0],
                                                    "educacion_primaria"                                 => $h['educacion_primaria'][0],
                                                    "enfermeria"                                         => $h['enfermeria'][0],
                                                    "fisioterapia"                                       => $h['fisioterapia'][0],
                                                    "nutricion"                                          => $h['nutricion'][0],
                                                    "psicologia"                                         => $h['psicologia'][0],
                                                    "enfermeria_cuidados_intensivos"                     => $h['enfermeria_cuidados_intensivos'][0],
                                                    "enfermeria_pediatrica"                              => $h['enfermeria_pediatrica'][0],
                                                    "enfermeria_quirurgica"                              => $h['enfermeria_quirurgica'][0],
                                                    "gestion_docencia_servicios_enfermeria"              => $h['gestion_docencia_servicios_enfermeria'][0],
                                                    "derecho_procesal_penal"                             => $h['derecho_procesal_penal'][0],
                                                    "innovacion_desarrollo_educativos"                   => $h['innovacion_desarrollo_educativos'][0],
                                                    "salud_publica"                                      => $h['salud_publica'][0],
                                                    "doctorado_educacion"                                => $h['doctorado_educacion'][0],
                                                    "medico_cirujano"                                    => $h['medico_cirujano'][0],
                                                    "turismo"                                            => $h['turismo'][0]));

        $o = $get->obtener_horario_preferencia_prospectos($campus,$fecha_ini,$fecha_fin);
        $arreglohorario = array("horario" => array("matutino"           => $o['Matutino'][0],
                                                    "vespertino"        => $o['Vespertino'][0],
                                                    "indistinto"        => $o['Indistinto'][0]));

        $e = $get->obtener_graficas_instituciones_prospectos($campus,$fecha_ini,$fecha_fin);
        for ($i=0; $i < 10; $i++) { 
            $json['graficasinstituciones']['instituciones'][$i]  = array("cantidad" => $e['total'][$i], "nombre" => utf8_encode(html_entity_decode($e['institucion'][$i])));
        }

        $json['graficashorario']        = $arreglohorario;
        $json['graficascarreras']       = $arreglocarreras;
        $json['graficasmedios']         = $arreglomedios;

        $json = json_encode($json);
        print_r($json);
    break;
    case "aspirantes":
        $arreglomedios = [];
        $arreglocarreras = [];
        $g = $get->obtener_graficas_medios_aspirantes($campus,$fecha_ini,$fecha_fin);
        $arreglomedios = array("Medios" => array("facebook"                          => $g['facebook'][0],
                                                    "google"                         => $g['google'][0],
                                                    "instagram"                      => $g['instagram'][0],
                                                    "whatsapp"                       => $g['whatsapp'][0],
                                                    "periodico"                      => $g['periodico'][0],
                                                    "ferias_vocacionales"            => $g['ferias_vocacionales'][0],
                                                    "espectaculares"                 => $g['espectaculares'][0],
                                                    "visita_plantel"                 => $g['visita_plantel'][0],
                                                    "publicidad_transporte_publico"  => $g['publicidad_transporte_publico'][0],
                                                    "television"                     => $g['television'][0],
                                                    "recomendacion"                  => $g['recomendacion'][0],
                                                    "otros"                          => $g['otros'][0]));

        $h = $get->obtener_graficas_carreras_aspirantes($campus,$fecha_ini,$fecha_fin);
        $arreglocarreras = array("Carreras" => array("administracion_mercadotecnia"                      => $h['administracion_mercadotecnia'][0],
                                                    "derecho"                                            => $h['derecho'][0],
                                                    "educacion_preescolar"                               => $h['educacion_preescolar'][0],
                                                    "educacion_primaria"                                 => $h['educacion_primaria'][0],
                                                    "enfermeria"                                         => $h['enfermeria'][0],
                                                    "fisioterapia"                                       => $h['fisioterapia'][0],
                                                    "nutricion"                                          => $h['nutricion'][0],
                                                    "psicologia"                                         => $h['psicologia'][0],
                                                    "enfermeria_cuidados_intensivos"                     => $h['enfermeria_cuidados_intensivos'][0],
                                                    "enfermeria_pediatrica"                              => $h['enfermeria_pediatrica'][0],
                                                    "enfermeria_quirurgica"                              => $h['enfermeria_quirurgica'][0],
                                                    "gestion_docencia_servicios_enfermeria"              => $h['gestion_docencia_servicios_enfermeria'][0],
                                                    "derecho_procesal_penal"                             => $h['derecho_procesal_penal'][0],
                                                    "innovacion_desarrollo_educativos"                   => $h['innovacion_desarrollo_educativos'][0],
                                                    "salud_publica"                                      => $h['salud_publica'][0],
                                                    "doctorado_educacion"                                => $h['doctorado_educacion'][0],
                                                    "medico_cirujano"                                    => $h['medico_cirujano'][0],
                                                    "turismo"                                            => $h['turismo'][0]));
        
        $json['graficascarreras'] = $arreglocarreras;
        $json['graficasmedios'] = $arreglomedios;

        $e = $get->obtener_graficas_instituciones_aspirantes($campus,$fecha_ini,$fecha_fin);
        for ($i=0; $i < 10; $i++) { 
            $json['graficasinstituciones']['instituciones'][$i]  = array("cantidad" => $e['total'][$i], "nombre" => utf8_encode(html_entity_decode($e['institucion'][$i])));
        }

        $p = $get->obtener_generos_aspirantes($campus,$fecha_ini,$fecha_fin);
        $arreglogeneros = array("generos" => array("masculino"  => $p['masculino'][0], "femenino" => $p['femenino'][0]));
        $json['graficasgenero'] = $arreglogeneros;

        $n = $get->obtener_rango_edad_aspirates($campus,$fecha_ini,$fecha_fin);
        for($i = 0; $i < count($n['id']); $i++){
            $json['graficasrangoedad']['rangos'][$i]  = array("edad" => $n['edad'][$i], "total" => $n['total'][$i]);
        }
        // var_dump($json['graficasrangoedad']['rangos']);

        $m = $get->obtener_municipios_aspirantes($campus,$fecha_ini,$fecha_fin);
        for ($a=0; $a < 10; $a++) { 
            $json['graficasmunicipios']['municipios'][$a]  = array("cantidad" => $m['total'][$a], "nombre" => utf8_encode(html_entity_decode($m['municipio'][$a])));
        }

        $json = json_encode($json);
        print_r($json);
    break;
}