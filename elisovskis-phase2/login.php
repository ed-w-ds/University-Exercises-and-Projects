<?php 
    if (session_id() === '') {
        session_start();
    }
    // if the user is already logged in, redirect to addpost.php
    if (isset($_SESSION['UserID'])) {
        header('Location: addpost.php');
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/login.css" type="text/css">
        <script src="./js/login.js"></script>
        <title>Login - Blog</title>
    </head>

    <body class="colour1">

        <?php include "header.php" ?>

        <div class="container"> 
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="login-form">
                <fieldset>
                    <legend>Login</legend>
                        <!-- <label>Email address</label> -->
                        <div class="email-password">
                            <p>
                                <input type="email" name="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="email" autofocus>
                            </p>
                            <!-- <label>Password</label> -->
                            <p>
                                <input type="password" name="Password" required placeholder="password">
                            </p>
                        </div>
                        <div id="div1">
                            
                        </div>
                        <div class="submit">
                            <button id="submit-button" type="submit" value="Login">Login</button>
                        </div>
                </fieldset>
            </form>

        </div>

        <footer id="copyright" class="colour1">
            <p>&#169; Eduards Lisovskis 2023</p>
        </footer>
        
    </body>

</html>

<?php
$inalidLogin = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'ecs417';

    // create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    $email = $_POST['Email'];
    $password = $_POST['Password'];

    // prepare SQL statement
    $stmt = $conn->prepare('SELECT id FROM users WHERE email = ? AND password = ?');
    // ss shows that they are both strings, prevents SQL injection attacks, prevetns special characters
    $stmt->bind_param('ss', $email, $password);
    // executes the prepared statement ($stmt = $conn->prepare)
    $stmt->execute();
    // gets the result after the event is executed
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // login successful, store user ID in session
        $row = $result->fetch_assoc();  
        $_SESSION['UserID'] = $row['id'];
        header('Location: addpost.php');
    } else {
        // login failed, display error message 
        echo 
        '<script type="text/javascript">',
            'invalidLogin();',
        '</script>'
;
    }

    $stmt->close();
    $conn->close();
}
?>

