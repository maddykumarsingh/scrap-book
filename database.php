<?php
// db_connection.php

// $db_host = "localhost";
// $db_user = "dataenrichmentmy_root";
// $db_password = "rYE*VydaV.#U";
// $db_name = "dataenrichmentmy_scrap_book";
// $db_port = 3307;


$db_host = "localhost";
$db_user = "root";
$db_password = "root";
$db_name = "scrap_book";
$db_port = 3307;


// Create a new mysqli connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
