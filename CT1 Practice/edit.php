<?php
include 'dbcon.php';

echo '<h1>Update Manager</h1>';
?>

<!-- STEP 1: Search Form -->
<form action="" method="POST">
    <label>Enter Student ID to Edit:</label>
    <input type="number" name="id" required>
    <input type="submit" name="search_btn" value="Find Student">
</form>

<hr>

<?php
// Handle Search Operation
if (isset($_POST['search_btn'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `school_db` WHERE id = '$id'";
    $res = $conn->query($query);

    if ($res && $res->num_rows > 0) {
        $data = $res->fetch_assoc();
        ?>

        <!-- STEP 2: Edit Form (Pre-filled with existing data) -->
        <h3>Editing Record for ID: <?php echo $data['id']; ?></h3>

        <form action="" method="POST">
            <!-- Hidden input to remember the ID during update submission -->
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <label>Enter New Name:</label>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
            <br><br>

            <label>Enter New Phone Number:</label>
            <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required>
            <br><br>

            <label>Enter New Department:</label>
            <input type="text" name="dept" value="<?php echo $data['dept']; ?>" required>
            <br><br>

            <input type="submit" name="update_btn" value="Update Student" style="color:green">
        </form>

        <?php
    } else {
        echo "<p style='color: red;'>No student found with ID: $id</p>";
    }
}

// Handle Update Operation
if (isset($_POST['update_btn'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $phone = $_POST['phone'];
    $dept  = $_POST['dept'];

    // Added single quotes around string values ('$name', '$phone', '$dept')
    $q1 = "UPDATE school_db SET name='$name', phone='$phone', dept='$dept' WHERE id='$id'";

    $res = $conn->query($q1);

    if ($res) {
        echo "<p style='color: green;'>Done updating! Heading back...</p>";
        // Wait 2 seconds before redirecting so the user can see the success message
        header("refresh:2; url=index.html");
        exit();
    } else {
        echo "<p style='color: red;'>Update failed: " . $conn->error . "</p>";
    }
}
?>