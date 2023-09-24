<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "vsga-beasiswa-ayyub"; // cek database di "localhost/phpmyadmin", cek juga data sql yang sudah disediakan.

    try {
        $conn = mysqli_connect($server, $user, $pass, $db);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());            
        }
    } catch(Exception $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>
