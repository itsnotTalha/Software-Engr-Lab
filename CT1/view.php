<?php
include 'dbcon.php';

echo "<h1>Medical Home Page!</h1>";

$result = $conn->query("SELECT * FROM patient");

if ($result->num_rows > 0) {
    echo "<table border='2' cellpadding='8'>";
    echo "<tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Disease</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['age'] . "</td>";
        echo "<td>" . $row['gender'] . "</td>";
        echo "<td>" . $row['disease'] . "</td>";
        echo "</tr>";
    }
    echo "<hr>";
    echo "<a href='index.html'>Go back to Dashboard</a>";
    echo "</table>";
} else {
    echo "No records found.";
}
?>

