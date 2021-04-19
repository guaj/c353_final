<?php

$servername = "localhost:3306";
$username = "root";
$password = "Jasmin98";
$database = "wec353_4";

try {
    $conn = mysqli_connect($servername, $username, $password, $database);
}catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
?>
