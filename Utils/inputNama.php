<?php
include('../functions/connection.php'); 
$searchTerm = $_GET['term'];
$sql = "SELECT * FROM data_mhs WHERE nama LIKE '%".$searchTerm."%'"; 

$result = $conn->query($sql); 
    if ($result->num_rows > 0) {
        $dataNama = array(); 
        while($row = $result->fetch_assoc()) {
            $data['id']    = $row['id']; 
            $data['value'] = $row['nama'];
            array_push($dataNama, $data);
        } 
    }
echo json_encode($dataNama);
?>