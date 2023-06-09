<?php

class conDB{
    static public function conectar(){
        try{
            $con = new PDO("mysql:host=localhost;dbname=company","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));        
            return $con;
} catch(PDOException $e) {
            echo 'Fallo la conexión:' . $e->getMessage();
        }
    }
}
// function get_mysqli() {
//   $host = "localhost";
//   $usuario = "root";
//   $contrasenia = "";
//   $base_de_datos = "company";
//   $mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
//   if ($mysqli->connect_errno) {
//     echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
//   }

// 	/* change character set to utf8mb4 */
// 	$mysqli->set_charset("utf8mb4");

//   return $mysqli;
// }

// function prepared_query($mysqli, $sql, $params, $types = "")
// {
		
//     $types = $types ?: str_repeat("s", count($params));
	
// 	$stmt = $mysqli->prepare($sql);
//     if (count($params) > 0) {
// 	  $stmt->bind_param($types, ...$params);
// 	}
//     $stmt->execute();
	
//     return $stmt;
// }