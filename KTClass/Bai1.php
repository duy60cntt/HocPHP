<?php
    $a = rand(1,4);
    $b = rand(10,100);
    switch ($a){
        case 1:
            echo "Hình Vuông <br>";
            echo "Chu vi = ".($b * 4);
            echo "<br> Diện tích = ".($b * $b);
            break;
        case 2:
            echo "Hình Tròn <br>";
            echo "Chu vi = ".(2*$b * 3.14);
            echo "<br> Diện tích = ".($b * $b * 3.14);
            break;
        case 3:
            echo "Hình Tam giác đều <br>";
            echo "Chu vi = ".(3*$b );
            echo "<br> Diện tích = ".($b * $b * sqrt(3)/4);
            break;
        case 4:
            echo "Hình Chữ Nhật<br>";
            echo "Chu vi = ".(2*($a+$b));
            echo "<br> Diện tích = ".($a*$b);
            break;
    }
?>