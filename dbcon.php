<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "crud_first";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

echo "<script>console.log('Database connected successfully!');</script>";
?>