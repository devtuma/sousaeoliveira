<?php
$servername = "localhost";
$username = "u500626236_db_advs";
$password = "Q9MLj67QY!c";
$dbname = "u500626236_sousaeoliveira";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
