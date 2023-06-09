<?php

require_once 'conDB.php';
    class consulta_simple{
        static public function Empleados($fname, $lname, $dno, $ssn) {

                $query = "SELECT e.Fname, e.Lname, e.Ssn, e.Bdate, e.Address, d.Dname 
                    FROM employee AS e 
                    INNER JOIN department AS d ON e.Dno = d.Dnumber";
    
                if (!empty($fname)) {
                    $query .= " WHERE e.Fname LIKE :fname";
                }
    
                if (!empty($lname)) {
                    $query .= " AND e.Lname LIKE :lname";
                }
    
                if (!empty($dno)) {
                    $query .= " AND d.Dnumber LIKE :dno";
                }
    
                if (!empty($ssn)) {
                    $query .= " AND e.Ssn LIKE :ssn";
                }
    
                $stmt = conDB::conectar()->prepare($query);
    
                if (!empty($fname)) {
                    $stmt->bindValue(":fname", '%' . $fname . '%', PDO::PARAM_STR);
                }
    
                if (!empty($lname)) {
                    $stmt->bindValue(":lname", '%' . $lname . '%', PDO::PARAM_STR);
                }
    
                if (!empty($dno)) {
                    $stmt->bindValue(":dno", '%' . $dno . '%', PDO::PARAM_STR);
                }
    
                if (!empty($ssn)) {
                    $stmt->bindValue(":ssn", '%' . $ssn . '%', PDO::PARAM_STR);
                }
    
                $stmt->execute();
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $resultado;
        }
    }

    if (isset($_GET['action']) && $_GET['action'] === 'Empleados') {
        $resultado = $_GET['resultado'] ?? '';
        $fname = $_GET['fname'] ?? '';
        $lname = $_GET['lname'] ?? '';
        $ssn = $_GET['ssn'] ?? '';
        $dno = $_GET['dno'] ?? '';
        $resultado = consulta_simple::Empleados($fname, $lname, $ssn, $dno);
        $html = '<table>';
        $html .= '<tr><th>Fname</th><th>Lname</th><th>Ssn</th><th>Bdate</th><th>Address</th><th>Dname</th></tr>';
        foreach ($resultado as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['Fname'] . '</td>';
            $html .= '<td>' . $row['Lname'] . '</td>';
            $html .= '<td>' . $row['Ssn'] . '</td>';
            $html .= '<td>' . $row['Bdate'] . '</td>';
            $html .= '<td>' . $row['Address'] . '</td>';
            $html .= '<td>' . $row['Dname'] . '</td>';
            $html .= '</tr>';

        }
        $html .= '</table>';

        header('Content-Type: application/json');
        echo json_encode(['html' => $html]);
 exit;
    }
?>
