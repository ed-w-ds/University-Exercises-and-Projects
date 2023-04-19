<?php 
echo "<h1>User Registration Form</h1>";

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecs417";
// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fname = $_POST["Name"];
$sname = $_POST["Surname"];
$email = $_POST["Email"];
$password = $_POST["Password"];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO USERS (firstName, lastName, email, password)
    VALUES ('$fname', '$sname', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        //YOUR CODE GOES HERE
        echo "<p style=\"text-align-center\">Registration Successful</p>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

?>