<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Kiểm tra Dương Văn Duy _ 60135341</title>
</head>

<body>
    <?php
    $mt1_n = $_POST['mt1_n'] ?? 0;
    $mt1_m = $_POST['mt1_m'] ?? 0;
    $maTran = array();
    $ketQua = '';
    $mt2_n = $_POST['mt2_n'] ?? 0;
    $mt2_m = $_POST['mt2_m'] ?? 0;
    $maTran2 = array();
    $ketQua2 = '';
    $ketQua3 = '';
    
    // ma tran 1
    if (isset($_POST['submit'])) {
        if (is_numeric($mt1_n) && is_numeric($mt1_m) && $mt1_n > 0 && $mt1_m > 0) {
            // tạo ma trận 1
            for ($hang = 0; $hang < $mt1_n; $hang++) {
                for ($cot = 0; $cot < $mt1_m; $cot++) {
                    $maTran[$hang][$cot] = rand(-100, 100);
                }
            }

            // hàm in ma trận
            function inMaTran($maTran, $n1, $m1)
            {
                $chuoiMaTran = '';
                for ($hang = 0; $hang < $n1; $hang++) {
                    for ($cot = 0; $cot < $m1; $cot++) {
                        $chuoiMaTran .= $maTran[$hang][$cot] . "\t";
                    }
                    $chuoiMaTran .= "\n";
                }
                return $chuoiMaTran;
            }

            // in ma trận vừa tạo
            $ketQua = inMaTran($maTran, $mt1_n, $mt1_m) . "\n";   
        }
        else{
            $ketQua = 'Giá trị n và m phải lớn hơn 0';
        }
    }

    // ma tran 2
    if (isset($_POST['submit'])) {
        if (is_numeric($mt2_n) && is_numeric($mt2_m) && $mt2_n > 0 && $mt2_m > 0) {
            // tạo ma trận 2
            for ($hang = 0; $hang < $mt2_n; $hang++) {
                for ($cot = 0; $cot < $mt2_m; $cot++) {
                    $maTran2[$hang][$cot] = rand(-200, 200);
                }
            }

            // hàm in ma trận
            function inMaTran2($maTran2, $n2, $m2)
            {
                $chuoiMaTran2 = '';
                for ($hang = 0; $hang < $n2; $hang++) {
                    for ($cot = 0; $cot < $m2; $cot++) {
                        $chuoiMaTran2 .= $maTran2[$hang][$cot] . "\t";
                    }
                    $chuoiMaTran2 .= "\n";
                }
                return $chuoiMaTran2;
            }
            // in ma trận vừa tạo
            $ketQua2 = inMaTran2($maTran2, $mt2_n, $mt2_m) . "\n";   
        }
        else{
            $ketQua2 = 'Giá trị n và m phải lớn hơn 0';
        }
    }
    // kiem tra 2 ma tran bang nhau khong
    if (isset($_POST['submit'])) {
        if (is_numeric($mt1_n) && is_numeric($mt1_m) && is_numeric($mt2_n) && is_numeric($mt2_m)&& $mt1_n > 0 && $mt1_m > 0 && $mt2_n >0 && $mt2_m > 0) {
            function kiemtra($mt1_n,$mt1_m, $mt2_n,$mt2_m)
            {
                if($mt1_n != $mt2_n || $mt1_m != $mt2_m) 
                    return $ketQua3 = 'Hai Ma Trận Không bằng nhau'; 
                else {
                    return $ketQua3 = 'Hai Ma Trận Bằng nhau';                              
                }                   
            }             
            $ketQua3 = kiemtra($mt1_n,$mt1_m, $mt2_n,$mt2_m);         
        }
    }
    ?>

    <form action="" method="POST" class="my-form">
        <p>Nhập giá trị ma trận 1</p>
        <div class="grid-container">           
            Nhập n:
            <input type="number" name="mt1_n" value="<?php echo $mt1_n ?>">
            Nhập m:
            <input type="number" name="mt1_m" value="<?php echo $mt1_m ?>">
        </div>
        <p>Nhập giá trị ma trận 2</p>
        <div class="grid-container">
            Nhập n:
            <input type="number" name="mt2_n" value="<?php echo $mt2_n ?>">
            Nhập m:
            <input type="number" name="mt2_m" value="<?php echo $mt2_m ?>">
        </div>
        <div class="center">
            <br>
            <input type="submit" name="submit" value="Submit">
        </div>
        <br>
        <textarea rows="20" cols="70"><?php echo $ketQua . $ketQua2 . $ketQua3 ?></textarea>
    </form>
</body>

</html>