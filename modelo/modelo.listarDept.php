
<?php
require_once 'conDB.php';
class modeloDept{

    static public function getDept(){
        $stmt = conDB::conectar()->prepare('call prc_getDepartamentos()');
        $stmt->execute();
        $data = $stmt-> fetchAll();
        return $data;
    }  
}
if (isset($_GET['action']) && $_GET['action'] === 'getDept') {
    $deptData = modeloDept::getDept();
    header('Content-Type: application/json');
    echo json_encode($deptData);
    exit;
}
  
?>