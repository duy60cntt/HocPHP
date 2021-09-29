<table border = "1px">
    <?php
        $a = array();
        $n = rand(2,5);
        $m = rand(2,5);
        echo "Ma Trận $n x $m: <br><br>";
        for($i = 0; $i < $n; $i++){
            echo "<tr>";
            for($j = 0; $j < $m; $j++)
                echo "<td>".$a[$i][$j]=rand(-100,100)."</td>";
            echo"</tr>";
        }
    ?>
</table>