<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "school";

$conn = mysqli_connect($server, $username, $password, $dbname);

if($conn){
    echo "Your bluetooth device conectec successfully!!!";
}

?>