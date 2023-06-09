<?php

    class regempControlador{

        static public function ctrRegistrarEmpleado($fname, $minit, $lname,$ssn, $bdate, $address, $sex, $salary, $dno){
            $datos = regempModelo::mdlregempEmpleado($fname, $minit, $lname,$ssn, $bdate, $address, $sex, $salary, $dno);
            return $datos;
        }

    }

?>