<?php
include 'dbcon.php';

echo '<h1>Update Manager</h1>';
?>

<form action="" method="POST">
    <input type="number" name="id" required>
    <input type="submit" name="search_btn" value="Find Patient">
</form>

<?php
if (isset($_POST['search_btn'])) {
    $id = $_POST['id'];

    $query = "SELECT * FROM `patient` WHERE id = '$id'";
    $res = $conn->query($query);

    if ($res && $res->num_rows > 0) {
        $data = $res->fetch_assoc();
        ?>

        <h3>Editing Record for ID: <?php echo $data['id']; ?></h3>

        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

            <label>Enter New Name:</label>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
            <br><br>
            <label>Enter New Age:</label>
            <input type="number" name="age" value="<?php echo $data['age']; ?>" required>
            <br><br>

            <label>Enter New Gender:</label>
            <input type="text" name="gender" value="<?php echo $data['gender']; ?>" required>
            <br><br>

            <label>Enter New Disease:</label>
            <input type="text" name="disease" value="<?php echo $data['disease']; ?>" required>
            <br><br>

            <input type="submit" name="update_btn" value="Update Patient" style="color:green">
        </form>

        <?php
    } else {
        echo "<p style='color: red;'>No patient found with ID: $id</p>";
    }
}

if (isset($_POST['update_btn'])) {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $age = $_POST['age'];
    $gender  = $_POST['gender'];
    $disease  = $_POST['disease'];

    $q1 = "UPDATE patient set name='$name', age='$age', gender='$gender', disease='$disease' where id='$id'";

    $res = $conn->query($q1);

    if ($res) {
        echo "<p style='color: green;'>Done updating!</p>";
        header("refresh:1; url=index.html");
        exit();
    }
}
?>