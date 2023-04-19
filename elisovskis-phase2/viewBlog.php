<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/reset.css" type="text/css">
        <link rel="stylesheet" href="css/viewBlog.css" type="text/css">
        <script src="js/viewBlog.js"></script>
        <title>View Blog</title>
    </head>

    <body class="colour1">
        <?php include "header.php" ?>
        <?php 
            echo "<h1>Blog Posts</h1>"
        ?>        
        <div class="container"> 
            <section>
                <?php 
                    // button for add post / log in
                    if (isset($_SESSION['UserID'])) {
                        echo "<div class=\"center\"><button><a href=\"addpost.php\">Add a New Post</a></button></div>";    
                    }
                    else {
                        echo "<div class=\"center\"><button><a href=\"login.php\">Log In To Add a New Post</a></button></div>"; 
                    }
                    // connect to SQL server - parts of code taken from topic 9 exercise 6
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


                    // Select data from SQL database w3schools - https://www.w3schools.com/php/php_mysql_select.asp
                    $sql = "SELECT date, time, title, body FROM blogposts";
                    $result = mysqli_query($conn, $sql);

                    // initialise an array for all blogposts and a counter for storing blog posts into the array
                    $blogposts = array();
                    $counter = 0;
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                            $blogposts[$counter] = array($row["date"], $row["time"], $row["title"], $row["body"]);
                            $counter++;
                        }
                    } else {
                        echo "<h2>0 results</h2>";
                    }

                    // bubble sort used to sort by date and time (newest to oldest)
                    for ($i = 0; $i < count($blogposts) - 1; $i++) {
                        for ($j = 0; $j < count($blogposts) - $i - 1; $j++) {
                            $date1 = strtotime($blogposts[$j][0]);
                            $time1 = strtotime($blogposts[$j][1]);
                            $datetime1 = $date1 + $time1;
                            
                            $date2 = strtotime($blogposts[$j+1][0]);
                            $time2 = strtotime($blogposts[$j+1][1]);
                            $datetime2 = $date2 + $time2;
                            
                            if ($datetime1 > $datetime2) {
                                $temp = $blogposts[$j];
                                $blogposts[$j] = $blogposts[$j + 1];
                                $blogposts[$j + 1] = $temp;
                            }
                        }
                    }
                    
                    // store all blog posts into an array that stores arrays of each month that holds arrays of blog posts 
                    $blogByMonth = array();
                    $current_month = null;
                    foreach ($blogposts as $post) {
                        $date = $post[0];
                        $time = $post[1];
                        $title = $post[2];
                        $body = $post[3];

                        // Get the month from the date
                        $dateFormat = str_replace('/', '-', $date);
                        $timestamp = strtotime($dateFormat);
                        $monthYear = date('F Y', $timestamp);

                        // Store the post in the blogByMonth array
                        if (!isset($blogByMonth[$monthYear])) {
                            $blogByMonth[$monthYear] = array();
                        }
                        $blogByMonth[$monthYear][] = array(
                            'date' => $date,
                            'time' => $time,
                            'title' => $title,
                            'body' => $body
                        );
                    }

                    // DROP-DOWN menu
                    echo "<form method=\"POST\" action=\"\">";
                        echo "<select name=\"Select-Month\">";
                            echo "<datalist id=\"month-select\">";
                                echo "<option value=\"\">Select Month</option>";
                                // iterates over months in $blogByMonth, assigning month to $month and array of posts to $posts.
                                foreach ($blogByMonth as $month => $posts) {
                                    foreach ($posts as $post) {
                                        $date = $post["date"];
                                        $time = $post["time"];
                                        $title = $post["title"];
                                        $body = $post["body"];
                                        $dateFormat = str_replace('/', '-', $date);
                                        $timestamp = strtotime($dateFormat);
                                        $dateValue = date('F Y', $timestamp);
                                        echo "<option value=\"$dateValue\">$dateValue</option>";
                                        break; // Stop after the first post for each month
                                    }
                                }
                            echo "</datalist>";
                        echo "</select>";
                        echo "<input id=\"post-button\" type=\"submit\" value=\"Search\">";
                    echo "</form>";

                    //display all blog posts
                    foreach ($blogposts as $post) {
                        $date = $post[0];
                        $time = $post[1];
                        $title = $post[2];
                        $body = $post[3];

                         // Get the month from the date
                         $dateFormat = str_replace('/', '-', $date);
                         $timestamp = strtotime($dateFormat);
                         $monthYear = date('F Y', $timestamp);

                        // Display the month title only once per section
                        if ($monthYear !== $current_month || $current_month === null) {
                            echo "<div class=\"blog-post\">";
                                echo "<h2 style=\"text-decoration: underline;\">$monthYear</h2>";
                                echo "<br>";
                            echo "</div>";
                            $current_month = $monthYear;
                        }
                        echo "<article class=\"blog-post\">";
                            echo "<h2>$title</h2>";
                            echo "<p class=\"dateTime\">Date: $date</p>";
                            echo "<p class=\"dateTime\">Time: $time</p>";
                            echo "<br>";
                            echo "<p style=\"color: white\">$body</p>";
                        echo "</article>";
                    }


                    // take in form details and show the selected month
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        echo "<style type=\"text/css\">
                        .blog-post {
                            display: none;
                        }
                        </style>";
                        $selected_month = $_POST['Select-Month'];
                        if ($selected_month == '') {
                            echo "<h2>Please Select a Month</h2>";
                        }
                        echo "<h2 style=\"text-decoration: underline; margin-bottom: 1em;\">$selected_month</h2>";
                        foreach ($blogByMonth as $month => $posts) {
                            if ($month === $selected_month) {
                                foreach ($posts as $post) {
                                    $date = $post["date"];
                                    $time = $post["time"];
                                    $title = $post["title"];
                                    $body = $post["body"];
                                    echo "<article>";
                                        echo "<h2>$title</h2>";
                                        echo "<p class=\"dateTime\">Date: $date</p>";
                                        echo "<p class=\"dateTime\">Time: $time</p>";
                                        echo "<br>";
                                        echo "<p style=\"color: white\">$body</p>";
                                    echo "</article>";
                                }
                            }
                        }
                   }
                   // close connection
                   mysqli_close($conn);
                ?>  
            </section>
        </div>
        <footer id="copyright" class="colour1">
            <p>&#169; Eduards Lisovskis 2023</p>
        </footer>
    </body>
</html>