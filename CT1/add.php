    <form action="" method="POST">
        <label for="" >Enter Your Name</label>
        <input type="text" name="name">
        <br>
        <label for="">Enter Your age</label>
        <input type="text" name="age" id="">
        <br>
        <label for="">Gender</label>
        <input type="text" name="gender" id="">
        <br>
        <label for="">Disease</label>
        <input type="text" name="disease" id="">
        <br>
        <input type="submit" name="submit" value="Submit">
        <br>
    </form>

<?php
include 'dbcon.php';

$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$disease = $_POST['disease'];

$q1 = "INSERT INTO patient (name, age, gender, disease) VALUES ('$name', '$age', '$gender', '$disease')";

if(isset($_POST['submit'])){
    $res = $conn->query($q1);
}

if($res){
    echo "Done inserting. Heading back";
    header("refresh:1 url=index.html");
    exit();
}
?>