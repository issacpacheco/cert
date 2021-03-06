<?php
namespace nsaspirantes;
use conexionbd\mysqlconsultas;

class aspirantes extends mysqlconsultas{
    public function obtener_aspirantes(){
        $qry = "SELECT * FROM aspirantes";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_aspirantes_reimpresion($campus){
        $qry = "SELECT a.*, o.nombre as oferta_educativa FROM aspirantes a LEFT JOIN oferta_educativa o ON o.id = a.id_oferta WHERE a.id_campus = '".$campus."' ORDER BY a.fecha_registro";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_correo($correo){
        $qry = "SELECT correo FROM aspirantes WHERE correo = '$correo'";
        $res = $this->consulta($qry);
        return $res;
    }

    public function obtener_telefono($telefono){
        $qry = "SELECT telefono FROM aspirantes WHERE telefono = '$telefono'";
        $res = $this->consulta($qry);
        return $res;
    }
}

?>