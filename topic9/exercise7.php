<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/exercise7.css" type="text/css">
        <script src="exercise7.js"></script>
        <noscript> Your browser doesn't support JavaScript! </noscript>
        <title>Topic 9 - Exercise 7</title>
    </head>

 
    <body>
        <div class="container" <?php echo $style="";?>>
        <!-- htmlspecialchars used for more rigid validation to prevent PHP_SELF exploitation-->
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="login-form" onsubmit="verifyPassword()">
                <fieldset>
                    <legend>Login</legend>
                        <!-- <label>Email address</label> -->
                        <div class="email-password">
                            <!-- <p>
                                <input type="name" name="Name" required placeholder="name" autofocus>
                            </p>
                            <p>
                                <input type="surname" name="Surname" required placeholder="surname" autofocus>
                            </p> -->
                            <p>
                                <input type="email" name="Email" required placeholder="email" autofocus>
                            </p>
                            <!-- <label>Password</label> -->
                            <p>
                                <input type="password" name="Password" placeholder="password">
                            </p>
                            <!-- <p>
                                <input type="password" name="Password_Confirmation" placeholder="confirm password">
                            </p> -->
                            <p id="message"></p>
                        </div>
                        <div class="submit">
                            <button id="submit-button" type="submit" value="Login">Login</button>
                        </div>
                </fieldset>
            </form>
        </div>
    </body>
    

</html>


<?php
session_start();

if (isset($_SESSION['UserID'])) {
    // user is already logged in, redirect to logout.php
    $style = "style='display:none;'";
    echo "<h1>WELCOME BACK</h1>";
    echo "<a href=\"logout.php\">logout</a>";
}

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
    // ss shows that they are both strings
    $stmt->bind_param('ss', $email, $password);
    // executes the prepared statement ($stmt = $conn->prepare)
    $stmt->execute();
    // gets the result after the event is executed
    $result = $stmt->get_result();

    //
    if ($result->num_rows > 0) {
        // login successful, store user ID in session
        $row = $result->fetch_assoc();
        $_SESSION['UserID'] = $row['id'];
        $style = "style='display:none;'";
        echo "<h1>WELCOME BACK</h1>";
        echo "<a href=\"logout.php\">logout</a>";
    } else {
        // login failed, display error message
        echo '<h1>Details incorrect</h1>';
    }

    $stmt->close();
    $conn->close();
}
?>

