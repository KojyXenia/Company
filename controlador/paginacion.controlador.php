<?php

    class paginacionControlador{

        static public function ctrGetDatosPaginacion(){
            $datos = paginacionModelo::mdlGetDatosConsultaPaginacion();
            return $datos;
        }
    }
?>