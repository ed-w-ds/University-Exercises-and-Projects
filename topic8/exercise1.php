<?php 
    $salary1 = "£25,000";
    $salary2 = "£37,00";
    $salary3 = "$45,000";
    $name1 = "David";
    $name2 = "John";
    $name3 = "Mark";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/exercise1.css"  type="text/css">
        <title>Topic 8 - Exercise 1</title>
    </head>

    <body>
        <table>
            <span><caption>Employee Salaries</caption></span>

            <thead class="solid">
                <tr>
                    <th>Name</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody class="solid">
                <tr>
                    <td><?php echo $name1 ?></td>
                    <td><?php print $salary1 ?></td>
                </tr>
                <tr>
                    <td><?php printf($name2) ?></td>
                    <td><?php echo $salary2 ?></td>
                </tr>
                <tr>
                    <td><?php echo $name3 ?></td>
                    <td><?php echo $salary3 ?></td>
                </tr>
            </tbody>

        </table>


    </body>

</html>