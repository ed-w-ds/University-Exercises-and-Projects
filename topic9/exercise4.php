<?php 



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/exercise4.css"  type="text/css">
        <title>Topic 9 - Exercise 4</title>
    </head>

    <body>

        <table>
            <caption>multiplication table</caption>
            <thead>
                <tr>
                    <td>X</td>
                    <?php 
                        for ($i = 1; $i<=15; $i++) {
                            echo "<td>". $i. "</td>";
                        }
                    ?>
                </tr>
            </thead>

            <tbody id="mulTable">

            <?php  
                
                for ($i = 1; $i<=15; $i++) {
                    echo "<tr>";
                    echo "<td id=\"col\">". $i. "</td>";
                    for ($j = 1; $j <=15; $j++) {
                        echo "<td>". ($i * $j). "</td>"; 
                        
                    }
                    echo "</tr>";
                }
                
            ?>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="16">PHP</td>
                </tr>
            </tfoot>
        </table>

    </body>
</html>