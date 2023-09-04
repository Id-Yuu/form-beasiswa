<?php
include "connection.php";
$del = $_GET['id'];
$query = mysqli_query($conn, "DELETE FROM daftar WHERE id='$del'");
if ($query) {
    header("location: ../hasil.php");
}
?>