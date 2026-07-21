<?php
include 'dbcon.php';

echo "<h1>Home Page Loaded Successfully!</h1>";

$result = $conn->query("SELECT * FROM school_db");

if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='8'>";
    echo "<tr><th>ID</th><th>Name</th><th>Phone</th><th>Department</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['dept'] . "</td>";
        echo "</tr>";
    }
    echo "<tr><td><a href='index.html'>Go back to Dashboard</a></td></tr>";
    echo "</table>";
} else {
    echo "No records found.";
}
?>