<?php 
    $now = new dateTime('now', new DateTimeZone('Europe/London')); 
    $date = new DateTime($_POST["date"]);
    $interval = $now->diff($date);
    $totalSeconds = $interval->s + ($interval->i * 60) + ($interval->h * 3600) + ($interval->days * 86400);
    $totalMinutes = $interval->i + ($interval->h * 60) + ($interval->days * 1440);
    $totalHours = $interval->h + ($interval->days * 24);
    $totalDays = $interval->days;
    $totalYears = $interval->y;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/exercise2.css"  type="text/css">
        <script type="text/javascript" src="js/exercise2.js" defer></script>
        <title>Topic 8 - Exercise 2</title>
    </head>

    <body>

            
                <p>
                    Hi <?php echo $_POST["name"]; ?>, your birthday is on: <?php echo $date->format('d-M-Y'); ?>
                </p>
                <p>
                    Today's date is <?php echo $now->format('j F Y') ?>
                </p>
                <p>
                    Since your birthday, <?php echo $totalSeconds ?> seconds, or <?php echo $totalMinutes ?> minutes, or <?php echo $totalHours ?> hours, or <?php echo $totalDays ?> days, or <?php echo $totalYears ?> years have passed.
                </p>


    </body>

</html>