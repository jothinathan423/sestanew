<?php
$hostname = "localhost";
$username = "id21402454_jothinathan";
$password = "Jothi422@";
$database = "id21402454_mecsesta";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
