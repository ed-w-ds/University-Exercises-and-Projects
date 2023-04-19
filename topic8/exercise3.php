<?php 
    $x = $i = $sum1 = $sum2 = $sum3 = 0;

    while ($x < 101) {
        $sum1 += $x;
        $x++;
    }

    for ($y = 0; $y < 101; $y++){
        $sum2 += $y;
    }

    do { 
        $sum3 += $i;
        $i++;
    }
    while ($i < 101)

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/exercise1.css"  type="text/css">
        <title>Topic 8 - Exercise 3</title>
    </head>

    <body>
        
        <h1>While Loop Sum: <?php echo $sum1 ?><h1>
        <h1>For Loop Sum: <?php echo $sum2 ?><h1>
        <h1>Do While Loop Sum: <?php echo $sum3 ?><h1>



    </body>

</html>