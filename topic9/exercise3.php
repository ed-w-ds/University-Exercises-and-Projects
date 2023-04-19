<?php 
    $employeeSalary["Mary"] = "50000";
    $employeeSalary["David"] = "27000";
    $employeeSalary["Humphrey"] = "87000";
    echo "<h2>before sorting: </h2>";
    foreach ($employeeSalary as $key => $value) {
        echo "name: ". $key. " salary: ".$value. "<br>";
    }

    echo "<h2>after sorting by value: </h2>";
    asort($employeeSalary);
    foreach ($employeeSalary as $key => $value) {
        echo "name: ". $key. " salary: ".$value. "<br>";
    }

    echo "<h2>after sorting by name: </h2>";
    ksort($employeeSalary);
    foreach ($employeeSalary as $key => $value) {
        echo "name: ". $key. " salary: ".$value. "<br>";
    }
?>