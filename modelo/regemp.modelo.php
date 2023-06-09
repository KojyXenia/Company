<?php

require_once 'conDB.php';
    class regempModelo{
        static public function mdlregempEmpleado($fname, $minit, $lname,$ssn, $bdate, $address, $sex, $salary, $dno)    {
            try{
                $stmt = conDB::conectar()->prepare("INSERT INTO employee(
                fname, 
                minit, 
                lname, 
                ssn, 
                bdate, 
                address, 
                sex, 
                salary, 
                super_ssn,
                dno
                ) 
                VALUES (:fname,
                        :minit,
                        :lname,
                        :ssn,
                        :bdate,
                        :address,
                        :sex,
                        :salary,
                        :super_ssn,
                        :dno)");
                        
                        $super_ssn = NULL;
                        $stmt -> bindParam(":fname", $fname , PDO::PARAM_STR);
                        $stmt -> bindParam(":minit", $minit , PDO::PARAM_STR);
                        $stmt -> bindParam(":lname", $lname , PDO::PARAM_STR);
                        $stmt -> bindParam(":ssn", $ssn , PDO::PARAM_STR);
                        $stmt -> bindParam(":bdate", $bdate , PDO::PARAM_STR);
                        $stmt -> bindParam(":address", $address , PDO::PARAM_STR);
                        $stmt -> bindParam(":sex", $sex , PDO::PARAM_STR);
                        $stmt -> bindParam(":salary", $salary , PDO::PARAM_STR);
                        $stmt -> bindParam(":super_ssn",$super_ssn , PDO::PARAM_STR);
                        $stmt -> bindParam(":dno", $dno , PDO::PARAM_STR);

                        if($stmt -> execute()){
                            $resultado = "Valores ingresados:" . "-"
                            . "First Name: " . $fname .  "-"
                            . "Initial: " . $minit . "-"
                            . "Last Name: " . $lname . "-"
                            . "SSN: " . $ssn .  "-"
                            . "BirthDate: " . $bdate . "-"
                            . "Address: " . $sex .  "-"
                            . "Sex:" . $sex   . "-"
                            . "Salary:" . $salary . "-"
                            . "Supper SSn:" . $super_ssn . "-"
                            . "dno: " .$dno . "-"
                            ;
                        }else{
                            $resultado = "error";
                        }  
                        
                    }catch (Exception $e) {
                        $resultado = 'Excepción capturada: '.  $e->getMessage(). "\n";
                    }
                    
                    return $resultado;
                }
    }
?>
