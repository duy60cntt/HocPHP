<table border ="1px">
    <?php
    for ($i = 1; $i <= 10; $i++){
        echo "<td>";
        echo "Bảng CC $i <br>";
        for ($j = 1; $j <= 10; $j++)
            echo "$i x $j = ".($i*$j)."<br>";       
        echo "</td>";
    }
    ?>
</table>