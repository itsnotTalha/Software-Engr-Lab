    <form action="" method="POST">
        <label for="" >Enter Your Name</label>
        <input type="text" name="name">
        <br>
        <label for="">Enter Your Phone Number</label>
        <input type="text" name="phone" id="">
        <br>
        <label for="">Department</label>
        <input type="text" name="dept" id="">
        <br>
        <input type="submit" value="Submit">
        <br>
    </form>

<?php
include 'dbcon.php';

$name = $_POST['name'];
$phone = $_POST['phone'];
$dept = $_POST['dept'];

$q1 = "INSERT INTO school_db (name, phone, dept) VALUES ('$name', '$phone', '$dept')";

if($name!="" && $phone!=""){
    $res = $conn->query($q1);
}

if($res){
    echo "Done inserting. Heading back";
    header("Location: index.html");
    exit();
}
?>