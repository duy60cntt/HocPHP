<!DOCTYPE html>
<html>
    <body>
        <?php
        $n = 0;
        $nerr = "";
        $oke = 0;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $n = test_input($_POST['n']);
            if(check_input($n) == 1)
                $oke = 1;
            else
                $nerr = "Nhập lại [10,1000]";
        }
        function check_input($data) {
            //kiem tra so co hop le khong
            if(is_numeric($data) == 1)
                if($data >= 10 && $data <= 1000)
                    return 1;
                else    return 0;
        }
        function test_input($data){
            $data = str_replace('','',$data);
            if (strlen($data) >2 && $data[0] == '0')
                for ($i = 0; $strlen($data); $i++)
                    if($data[$i] !=0){
                        $data = substr($data, $i, 1);
                        break;
                    }
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }
        ?>
    <form method="post" action="Bai4.php">
        <table>
            <tr>
                <th colspan="3">Xử ly số N</th>
            </tr>
            <tr>
                <td><Label for="n"Nhập số N:></Label></td>
                <td><input type="text" id = "n" name = "n" value = "<?php echo $n ?>"></td>
                <td> <?php echo $nerr ?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <textarea readonly name="kq" id = "kq" cols = "50" rows = "10">
                        <?php
                            if($oke == 1){
                                echo "Cau a so n la: $n \n";
                                for ($i = 1; $i <= $n; $i++){
                                    $is_nguyento = true;
                                    for ($x = 2;$x < $i;$x++){
                                        if($i % $x == 0)
                                            $is_nguyento = false;
                                        }
                                        if($is_nguyento == true)
                                            echo " $i, ";
                                    }

                                    $len = strlen((string)$n);
                                    echo " \n  So n co $len chu so \n";


                                    $strn = (string)$n;
                                    $max = 0;
                                    for ($i = 0; $i < $len; $i++){
                                        if($max <= (int) $strn[$i])
                                            $max = (int) $strn[$i];
                                    }
                                    echo "\n  So max la $max \n";
                                }
                        ?>
                        
                    </textarea>
                </td>
            </tr>
            <tr>
                <td><input type="submit" value = "Tinh"></td>
            </tr>
        </table>
    </form>

    </body>
</html>