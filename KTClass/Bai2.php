
<html>
    <h1>Xổ số Khánh Hòa <?php $date = getdate(); echo $date['mday']."-".$date['mon']."-". $date['year']; ?></h1>
    <table border="1px">
        <tr>
            <td>Giải 8</td>
            <td style="width: 400px; color: red;"><?php echo $a=rand(00,99) ?></td>
        </tr>
        <tr>
            <td>Giải 7</td>
            <td><?php echo $b=rand(000,999) ?></td>
        </tr>
        <tr>
            <td>Giải 6</td>
            <td><?php echo $c1 = rand(0000,9999) ."--".$c2 = rand(0000,9999)."--".$c3= rand(0000,9999) ?></td>
        </tr>
        <tr>
            <td>Giải 5</td>
            <td><?php echo $d= rand(0000,9999) ?></td>
        </tr>
        <tr>
            <td>Giải 4</td>
            <td><?php echo $e1 = rand(00000,99999) ."--".$e2 = rand(00000,99999)."--".$e3= rand(00000,99999)."--".$e4 = rand(00000,99999)
            ."--".$e5 = rand(00000,99999)."--".$e6 = rand(00000,99999)."--".$e7 = rand(00000,99999) ?></td>
        </tr>
        <tr>
            <td>Giải 3</td>
            <td><?php echo $f1 = rand(00000,99999) ."--".$f2 = rand(00000,99999)?></td>
        </tr>
        <tr>
            <td>Giải 2</td>
            <td><?php echo $g= rand(00000,99999) ?></td>
        </tr>
        <tr>
            <td>Giải 1</td>
            <td><?php echo $h= rand(00000,99999) ?></td>
        </tr>
        <tr>
            <td>ĐB</td>
            <td style="color: red;"><?php echo $t= rand(000000,999999) ?></td>
        </tr>
    </table>


</html>