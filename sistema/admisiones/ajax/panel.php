<?php 
session_start();
error_reporting(E_ALL);
include("../../../includes/class/allClass.php");
include_once("../../../includes/funciones.php");
header('Content-Type: text/html; charset=utf-8');
// header('Content-Type: text/html; charset=iso-8859-1');

$campus     = filter_input(INPUT_POST, 'id_campus', FILTER_SANITIZE_NUMBER_INT);


use nsreportes\reportes;
use nsfunciones\funciones;

$fn = new funciones();
$get = new reportes();


$conDia = $get->convDia($_SESSION['campus'], 1);

if($conDia['entrada'][0] == 0){
    $conversiondeldia = array("Total" => 0, "registro" => 0, "alumno" => 0);
    $json['conversiondeldia'] = $conversiondeldia;
}else{
    $entraron = $conDia['entrada'][0];
    
    $sonalumnos = $conDia['total'][0];
    
    $conversiondia = round($sonalumnos * 100 / $entraron);

    $conversiondeldia = array("Total" => $conversiondia, "registro" => $entraron, "alumno" => $sonalumnos);
    $json['conversiondeldia'] = $conversiondeldia;
}

$conSemanal = $get->convDia($_SESSION['campus'], 2);
if($conSemanal['entrada'][0] == 0){
    $conversionsemanal = array("Total" => 0, "registro" => 0, "alumno" => 0);
    $json['conversionsemanal'] = $conversionsemanal;
}else{
    $entraron = $conSemanal['entrada'][0];
    
    $sonalumnos = $conSemanal['total'][0];
    
    $conversionsemana = round($sonalumnos * 100 / $entraron);

    $conversionsemanal = array("Total" => $conversionsemana, "registro" => $entraron, "alumno" => $sonalumnos);
    $json['conversionsemanal'] = $conversionsemanal;
}

$convMes = $get->convDia($_SESSION['campus'], 3);
if($convMes['entrada'][0] == 0){
    $conversiondelmes = array("Total" => 0, "registro" => 0, "alumno" => 0);
    $json['conversiondelmes'] = $conversiondelmes;
}else{
    $entraron = $convMes['entrada'][0];
    
    $sonalumnos = $convMes['total'][0];
    
    $conversionmes = round($sonalumnos * 100 / $entraron);

    $conversiondelmes = array("Total" => $conversionmes, "registro" => $entraron, "alumno" => $sonalumnos);
    $json['conversiondelmes'] = $conversiondelmes;
}

$convAnio = $get->convDia($_SESSION['campus'], 4);
if($convAnio['entrada'][0] == 0){
    $conversiondelanio = array("Total" => 0, "registro" => 0, "alumno" => 0);
    $json['conversiondelanio'] = $conversiondelanio;
}else{
    $entraron = $convAnio['entrada'][0];
    
    $sonalumnos = $convAnio['total'][0];
    
    $conversionanio = round($sonalumnos * 100 / $entraron);

    $conversiondelanio = array("Total" => $conversionanio, "registro" => $entraron, "alumno" => $sonalumnos);
    $json['conversiondelanio'] = $conversiondelanio;
}


$totalalumnos = $get->obtener_total_alumnos_inscritos_panel($campus);
$arreglototalinscritos = array("Total" => $totalalumnos['total'][0]);
$json['totalinscritos'] = $arreglototalinscritos;

$carrerasalumnos = $get->obtener_graficas_alumnos_panel($campus);
$arreglocarreras = array("Carreras" => array("administracion_mercadotecnia"                      => $carrerasalumnos['administracion_mercadotecnia'][0],
                                            "derecho"                                            => $carrerasalumnos['derecho'][0],
                                            "educacion_preescolar"                               => $carrerasalumnos['educacion_preescolar'][0],
                                            "educacion_primaria"                                 => $carrerasalumnos['educacion_primaria'][0],
                                            "enfermeria"                                         => $carrerasalumnos['enfermeria'][0],
                                            "fisioterapia"                                       => $carrerasalumnos['fisioterapia'][0],
                                            "nutricion"                                          => $carrerasalumnos['nutricion'][0],
                                            "psicologia"                                         => $carrerasalumnos['psicologia'][0],
                                            "enfermeria_cuidados_intensivos"                     => $carrerasalumnos['enfermeria_cuidados_intensivos'][0],
                                            "enfermeria_pediatrica"                              => $carrerasalumnos['enfermeria_pediatrica'][0],
                                            "enfermeria_quirurgica"                              => $carrerasalumnos['enfermeria_quirurgica'][0],
                                            "gestion_docencia_servicios_enfermeria"              => $carrerasalumnos['gestion_docencia_servicios_enfermeria'][0],
                                            "derecho_procesal_penal"                             => $carrerasalumnos['derecho_procesal_penal'][0],
                                            "innovacion_desarrollo_educativos"                   => $carrerasalumnos['innovacion_desarrollo_educativos'][0],
                                            "salud_publica"                                      => $carrerasalumnos['salud_publica'][0],
                                            "doctorado_educacion"                                => $carrerasalumnos['doctorado_educacion'][0],
                                            "medico_cirujano"                                    => $carrerasalumnos['medico_cirujano'][0],
                                            "turismo"                                            => $carrerasalumnos['turismo'][0]));

$json['graficascarrerasalumnos'] = $arreglocarreras;

$edadesalumnos = $get->obtener_rango_edad_alumnos_panel($campus);
for($i = 0; $i < count($edadesalumnos['id']); $i++){
    $json['graficasrangoedad']['rangos'][$i]  = array("edad" => $edadesalumnos['edad'][$i], "total" => $edadesalumnos['total'][$i]);
}

$institucionesalumnos = $get->obtener_graficas_instituciones_alumnos_panel($campus);
for ($i=0; $i < 10; $i++) { 
    $json['graficasinstitucionesalumnos']['instituciones'][$i]  = array("cantidad" => $institucionesalumnos['total'][$i], "nombre" => utf8_encode(html_entity_decode($institucionesalumnos['institucion'][$i])));
}

$generosalumnos = $get->obtener_generos_alumnos_panel($campus);
$arreglogeneros = array("generos" => array("masculino"  => $generosalumnos['masculino'][0], "femenino" => $generosalumnos['femenino'][0]));
$json['graficasgenero'] = $arreglogeneros;
    
//Graficas para prospectos
$totalprospectos = $get->obtener_total_prospectos_panel($campus);
$arreglototalprospectos = array("Total" => $totalprospectos['total'][0]);
$json['totalprospectos'] = $arreglototalprospectos;

$arreglomedios          = [];
$arreglocarreras        = [];
$arregloinstituciones   = [];
$arreglohorario         = [];

$mediosprospectos = $get->obtener_graficas_medios_prospectos_panel($campus);
$arreglomedios = array("Medios" => array("facebook"                          => $mediosprospectos['facebook'][0],
                                            "google"                         => $mediosprospectos['google'][0],
                                            "instagram"                      => $mediosprospectos['instagram'][0],
                                            "whatsapp"                       => $mediosprospectos['whatsapp'][0],
                                            "periodico"                      => $mediosprospectos['periodico'][0],
                                            "ferias_vocacionales"            => $mediosprospectos['ferias_vocacionales'][0],
                                            "espectaculares"                 => $mediosprospectos['espectaculares'][0],
                                            "visita_plantel"                 => $mediosprospectos['visita_plantel'][0],
                                            "publicidad_transporte_publico"  => $mediosprospectos['publicidad_transporte_publico'][0],
                                            "television"                     => $mediosprospectos['television'][0],
                                            "recomendacion"                  => $mediosprospectos['recomendacion'][0],
                                            "otros"                          => $mediosprospectos['otros'][0]));

$carrerasprospectos = $get->obtener_graficas_carreras_prospectos_panel($campus);
$arreglocarreras = array("Carreras" => array("administracion_mercadotecnia"                      => $carrerasprospectos['administracion_mercadotecnia'][0],
                                            "derecho"                                            => $carrerasprospectos['derecho'][0],
                                            "educacion_preescolar"                               => $carrerasprospectos['educacion_preescolar'][0],
                                            "educacion_primaria"                                 => $carrerasprospectos['educacion_primaria'][0],
                                            "enfermeria"                                         => $carrerasprospectos['enfermeria'][0],
                                            "fisioterapia"                                       => $carrerasprospectos['fisioterapia'][0],
                                            "nutricion"                                          => $carrerasprospectos['nutricion'][0],
                                            "psicologia"                                         => $carrerasprospectos['psicologia'][0],
                                            "enfermeria_cuidados_intensivos"                     => $carrerasprospectos['enfermeria_cuidados_intensivos'][0],
                                            "enfermeria_pediatrica"                              => $carrerasprospectos['enfermeria_pediatrica'][0],
                                            "enfermeria_quirurgica"                              => $carrerasprospectos['enfermeria_quirurgica'][0],
                                            "gestion_docencia_servicios_enfermeria"              => $carrerasprospectos['gestion_docencia_servicios_enfermeria'][0],
                                            "derecho_procesal_penal"                             => $carrerasprospectos['derecho_procesal_penal'][0],
                                            "innovacion_desarrollo_educativos"                   => $carrerasprospectos['innovacion_desarrollo_educativos'][0],
                                            "salud_publica"                                      => $carrerasprospectos['salud_publica'][0],
                                            "doctorado_educacion"                                => $carrerasprospectos['doctorado_educacion'][0],
                                            "medico_cirujano"                                    => $carrerasprospectos['medico_cirujano'][0],
                                            "turismo"                                            => $carrerasprospectos['turismo'][0]));

$horariosprefprospectos = $get->obtener_horario_preferencia_prospectos_panel($campus);
$arreglohorario = array("horario" => array("matutino"           => $horariosprefprospectos['Matutino'][0],
                                            "vespertino"        => $horariosprefprospectos['Vespertino'][0],
                                            "indistinto"        => $horariosprefprospectos['Indistinto'][0]));

$institucionesprospectos = $get->obtener_graficas_instituciones_prospectos_panel($campus);
for ($i=0; $i < 10; $i++) { 
    $json['graficasinstitucionesprospectos']['instituciones'][$i]  = array("cantidad" => $institucionesprospectos['total'][$i], "nombre" => utf8_encode(html_entity_decode($institucionesprospectos['institucion'][$i])));
}

$json['graficashorarioprospectos']        = $arreglohorario;
$json['graficascarreraprospectos']       = $arreglocarreras;
$json['graficasmedioprospectos']         = $arreglomedios;

$json = json_encode($json);
print_r($json);
    
    // case "aspirantes":
    //     $arreglomedios = [];
    //     $arreglocarreras = [];
    //     $g = $get->obtener_graficas_medios_aspirantes($campus,$fecha_ini,$fecha_fin);
    //     $arreglomedios = array("Medios" => array("facebook"                          => $g['facebook'][0],
    //                                                 "google"                         => $g['google'][0],
    //                                                 "instagram"                      => $g['instagram'][0],
    //                                                 "whatsapp"                       => $g['whatsapp'][0],
    //                                                 "periodico"                      => $g['periodico'][0],
    //                                                 "ferias_vocacionales"            => $g['ferias_vocacionales'][0],
    //                                                 "espectaculares"                 => $g['espectaculares'][0],
    //                                                 "visita_plantel"                 => $g['visita_plantel'][0],
    //                                                 "publicidad_transporte_publico"  => $g['publicidad_transporte_publico'][0],
    //                                                 "television"                     => $g['television'][0],
    //                                                 "recomendacion"                  => $g['recomendacion'][0],
    //                                                 "otros"                          => $g['otros'][0]));

    //     $h = $get->obtener_graficas_carreras_aspirantes($campus,$fecha_ini,$fecha_fin);
    //     $arreglocarreras = array("Carreras" => array("administracion_mercadotecnia"                      => $h['administracion_mercadotecnia'][0],
    //                                                 "derecho"                                            => $h['derecho'][0],
    //                                                 "educacion_preescolar"                               => $h['educacion_preescolar'][0],
    //                                                 "educacion_primaria"                                 => $h['educacion_primaria'][0],
    //                                                 "enfermeria"                                         => $h['enfermeria'][0],
    //                                                 "fisioterapia"                                       => $h['fisioterapia'][0],
    //                                                 "nutricion"                                          => $h['nutricion'][0],
    //                                                 "psicologia"                                         => $h['psicologia'][0],
    //                                                 "enfermeria_cuidados_intensivos"                     => $h['enfermeria_cuidados_intensivos'][0],
    //                                                 "enfermeria_pediatrica"                              => $h['enfermeria_pediatrica'][0],
    //                                                 "enfermeria_quirurgica"                              => $h['enfermeria_quirurgica'][0],
    //                                                 "gestion_docencia_servicios_enfermeria"              => $h['gestion_docencia_servicios_enfermeria'][0],
    //                                                 "derecho_procesal_penal"                             => $h['derecho_procesal_penal'][0],
    //                                                 "innovacion_desarrollo_educativos"                   => $h['innovacion_desarrollo_educativos'][0],
    //                                                 "salud_publica"                                      => $h['salud_publica'][0],
    //                                                 "doctorado_educacion"                                => $h['doctorado_educacion'][0],
    //                                                 "medico_cirujano"                                    => $h['medico_cirujano'][0],
    //                                                 "turismo"                                            => $h['turismo'][0]));
        
    //     $json['graficascarreras'] = $arreglocarreras;
    //     $json['graficasmedios'] = $arreglomedios;

    //     $e = $get->obtener_graficas_instituciones_aspirantes($campus,$fecha_ini,$fecha_fin);
    //     for ($i=0; $i < 10; $i++) { 
    //         $json['graficasinstituciones']['instituciones'][$i]  = array("cantidad" => $e['total'][$i], "nombre" => utf8_encode(html_entity_decode($e['institucion'][$i])));
    //     }

    //     $p = $get->obtener_generos_aspirantes($campus,$fecha_ini,$fecha_fin);
    //     $arreglogeneros = array("generos" => array("masculino"  => $p['masculino'][0], "femenino" => $p['femenino'][0]));
    //     $json['graficasgenero'] = $arreglogeneros;

    //     $n = $get->obtener_rango_edad_aspirates($campus,$fecha_ini,$fecha_fin);
    //     for($i = 0; $i < count($n['id']); $i++){
    //         $json['graficasrangoedad']['rangos'][$i]  = array("edad" => $n['edad'][$i], "total" => $n['total'][$i]);
    //     }
    //     // var_dump($json['graficasrangoedad']['rangos']);

    //     $m = $get->obtener_municipios_aspirantes($campus,$fecha_ini,$fecha_fin);
    //     for ($a=0; $a < 10; $a++) { 
    //         $json['graficasmunicipios']['municipios'][$a]  = array("cantidad" => $m['total'][$a], "nombre" => utf8_encode(html_entity_decode($m['municipio'][$a])));
    //     }

    //     $json = json_encode($json);
    //     print_r($json);
    // break;
