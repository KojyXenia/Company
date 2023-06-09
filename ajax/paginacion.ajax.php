<?php


require_once '../controlador/paginacion.controlador.php';
require_once '../modelo/paginacion.modelo.php';

class consultapaginacionAjax{
    public function getDatosPaginacion(){
        $datos = paginacionControlador::ctrGetDatosPaginacion();
        echo json_encode($datos);
    }
}

$datos = new consultapaginacionAjax();
$datos -> getDatosPaginacion();
?>