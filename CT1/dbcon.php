<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "united_medical_college_hospital";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bluetooth connection failed: " . $conn->connect_error);
}

echo "<script>console.log('Bluetooth device connected successfully!');</script>";
?>