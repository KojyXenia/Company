<?php

require_once 'conDB.php';
    class paginacionModelo{
        static public function mdlGetDatosConsultaPaginacion(){
            $stmt = conDB::conectar()->prepare('call prc_getDatosPaginacion()');
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
?>