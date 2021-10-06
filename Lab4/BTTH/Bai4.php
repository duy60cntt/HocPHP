<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $gt_n = $_POST['gt_n'] ?? 0;
    $gt_m = $_POST['gt_m'] ?? 0;
    $maTran = array();
    $ketQua = '';

    if (isset($_POST['submit'])) {
        if (is_numeric($gt_n) && is_numeric($gt_m) && $gt_n > 0 && $gt_m > 0) {
            // tạo ma trận
            for ($hang = 0; $hang < $gt_n; $hang++) {
                for ($cot = 0; $cot < $gt_m; $cot++) {
                    $maTran[$hang][$cot] = rand(-200, 200);
                }
            }

            // đếm số phần tử có số cuối là số lẻ
            function demPhanTuLe($maTran, $n, $m)
            {
                $soPhanTuLe = 0;
                for ($hang = 0; $hang < $n; $hang++) {
                    for ($cot = 0; $cot < $m; $cot++) {
                        if ($maTran[$hang][$cot] % 2 != 0) {
                            $soPhanTuLe++;
                        }
                    }
                }
                return $soPhanTuLe;
            }

            // thay thế các phần từ khác 0 thành 1
            function thayTheCacPhanTu($maTran, $n, $m)
            {
                for ($hang = 0; $hang < $n; $hang++) {
                    for ($cot = 0; $cot < $m; $cot++) {
                        if ($maTran[$hang][$cot] != 0) {
                            $maTran[$hang][$cot] = 1;
                        }
                    }
                }
                return $maTran;
            }

            // hàm in ma trận
            function inMaTran($maTran, $n, $m)
            {
                $chuoiMaTran = '';
                for ($hang = 0; $hang < $n; $hang++) {
                    for ($cot = 0; $cot < $m; $cot++) {
                        $chuoiMaTran .= $maTran[$hang][$cot] . "\t";
                    }
                    $chuoiMaTran .= "\n";
                }
                return $chuoiMaTran;
            }

            // in ma trận vừa tạo
            $ketQua = inMaTran($maTran, $gt_n, $gt_m) . "\n";
            // đếm số phần tử có chữ số cuối là số lẻ
            $ketQua .= "Số phần tử có chữ số cuối là số lẻ: " . demPhanTuLe($maTran, $gt_n, $gt_m)
                . "\n";
            // Thay thế các phần tử khác 0 thành 1. In ra ma trận sau khi thay thế.
            $maTran = thayTheCacPhanTu($maTran, $gt_n, $gt_m);
            $ketQua .= "Thay thế các phần tử khác 0 thành 1. In ra ma trận sau khi thay thế.\n";
            $ketQua .= inMaTran($maTran, $gt_n, $gt_m);
        }
        else{
            $ketQua = 'Giá trị n và m phải lớn hơn 0';
        }
    }
    ?>

    <form action="" method="POST" class="my-form">
        <div class="grid-container">
            Nhập n:
            <input type="number" name="gt_n" value="<?php echo $gt_n ?>">
            Nhập m:
            <input type="number" name="gt_m" value="<?php echo $gt_m ?>">
        </div>
        <div class="center">
            <input type="submit" name="submit" value="Submit">
        </div>
        <textarea rows="20" cols="70"><?php echo $ketQua ?></textarea>
    </form>
</body>

</html>