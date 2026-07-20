<?php
include 'dbcon.php';
?>

<!-- STEP 1: Search Form -->
<form action="" method="post">
    <label>Enter Student ID to delete:</label>
    <input type="number" name="id" required>
    <!-- Fixed: button name matches PHP check below -->
    <input type="submit" value="Find" name="found">
</form>

<hr>

<?php
// 1. Handle "Find" button click
if (isset($_POST['found'])) {
    $id = $_POST['id']; // Fixed: added quotes around 'id'

    $query = "SELECT * FROM `school_db` WHERE id = '$id'";
    $res = $conn->query($query);

    if ($res && $res->num_rows > 0) {
        $data = $res->fetch_assoc();

        // Display record details so user confirms before deleting
        echo "<h3>Confirm Deletion for: " . $data['name'] . " (ID: " . $data['id'] . ")</h3>";
        echo "<p>Department: " . $data['dept'] . " | Phone: " . $data['phone'] . "</p>";
        
        ?>
        <!-- STEP 2: Confirmation & Delete Form -->
        <form action="" method="post">
            <!-- Hidden input to send the ID to the delete block -->
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <input type="submit" name="delete" value="PERMANENTLY DELETE" style="color: red;">
        </form>
        <?php
    } else {
        echo "<p style='color: red;'>No record found with ID: $id</p>";
    }
}

// 2. Handle "Delete" button click (Outside of 'found' block)
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $q = "DELETE FROM `school_db` WHERE id = '$id'";
    $res = $conn->query($q);

    if ($res) {
        echo "<p style='color: green;'>Data deleted successfully! Heading back...</p>";
        header("refresh:2; url=index.html");
        exit();
    } else {
        echo "<p style='color: red;'>Error deleting record: " . $conn->error . "</p>";
    }
}
?>