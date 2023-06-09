<?php


require_once '../controlador/regemp.controlador.php';
require_once '../modelo/regemp.modelo.php';

class regempAjax{

    public $fname;
    public $minit;
    public $lname;
    public $ssn;
    public $bdate;
    public $address;
    public $sex;
    public $salary;
    public $dno;

//Falta super ssn
    public function registrarEmpleado(){
            $datos = regempControlador::ctrRegistrarEmpleado(
                $this->fname, $this->minit, $this->lname, $this->ssn, $this->bdate, $this->address, $this->sex,
                $this->salary, $this->dno);
            echo json_encode($datos);
        }
    }
    $registrarEmpleado = new regempAjax();
    $registrarEmpleado -> fname = $_POST["fname"];
    $registrarEmpleado -> minit = $_POST["minit"];
    $registrarEmpleado -> lname = $_POST["lname"];
    $registrarEmpleado -> ssn = $_POST["ssn"];
    $registrarEmpleado -> bdate = $_POST["bdate"];
    $registrarEmpleado -> address = $_POST["address"];
    $registrarEmpleado -> sex = $_POST["sex"];
    $registrarEmpleado -> salary = $_POST["salary"];
    $registrarEmpleado -> dno = $_POST["dno"];

    $registrarEmpleado->registrarEmpleado();
