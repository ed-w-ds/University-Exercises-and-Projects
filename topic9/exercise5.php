

<!DOCTYPE html>
<html>
<head>
	<title>Order Summary</title>
</head>
<body>
	<?php
		$name = $_POST['name'];
		$bulbs = $_POST['bulbs'];
		$batteryPacks = $_POST['bulb_packs'];
		$payment = $_POST['Payment'];
       
		
		$bulbPrices = [
			"Four Regular" => 2.39,
			"Eight Regular" => 4.29,
			"Four Long Lasting" => 3.95,
			"Eight Long Lasting" => 7.49
		];
        
		$x = 0;
		$totalCost = $batteryPacks * 10.42;
        foreach ($bulbPrices as $key => $value) {
            if (!isset($bulbs[$x])) {
                $bulbs[$x] = "off";
            }
            else if ($bulbs[$x] == "on") {
                $totalCost += $value;
            }
        }

        $totalCost *= 1.2;

		
		echo "<h2>Order Summary for $name:</h2>";
		
		echo "<table>";
		echo "<tr><th>Item</th><th>Price</th><th>Order</th></tr>";
        $x = 0;
		foreach ($bulbPrices as $key => $value) {
            if (!isset($bulbs[$x])) {
                $bulbs[$x] = "off";
            }
            print( "<tr> <td>".  $key. "</td>". "<td>". $value."</td><td>". $bulbs[$x]. "</td>"."</tr>");
            $x+=1;
            
        }
        print("<tr><td>"). "Battery Packs</td>". "<td>". $batteryPacks. "</td>";
        if ($batteryPacks > 0) {
            echo "<td> on </td></tr>";
        }
        else {
            echo "<td> off </td></tr>";
        }
        print("<tr><td>Total Sum (20% VAT):</td><td> £". $totalCost. "</td></tr>");
        print("<tr><td>PAYMENT METHOD: ". "<td>". $payment. "</td>". "</td></tr>");

        echo "</table>";
