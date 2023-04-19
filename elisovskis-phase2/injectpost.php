<?php  
    // parts of code taken from topic 9 exercise 6
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

    $title = $_POST["title"];
    $text = $_POST["blog-post"];

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO blogposts (date, time, title, body)
        VALUES (date_format(curdate(), '%d/%m/%Y'), date_format(CURTIME(), '%H:%i'), '$title', '$text')";
        if ($conn->query($sql) === TRUE) {
            header("Location: viewBlog.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }


?>