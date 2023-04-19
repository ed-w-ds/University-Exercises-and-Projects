<?php 
    $nums = array(1, 2, 3, 4, 5, 6, 10);
    function avg_med($nums) {
        $average = 0;
        $median = 0;
        $size = sizeof($nums);
        $sum = 0;

        for ($i = 0; $i < $size; $i++) {
            $sum += $nums[$i];
            if (($size % 2) == 0) {
                $median = ($nums[($size/2) - 1] + $nums[($size/2)]) / 2;
            }
            else {
                $median = $nums[($size/2) - 1/2];
            }
        }

        $average = $sum / $size;
        $averageMedian = array($average, $median);

        return $averageMedian;
    }
    $averageMedian = avg_med($nums);
    foreach($averageMedian as $value) {
        echo $value . "<br>";
    }

    
?>