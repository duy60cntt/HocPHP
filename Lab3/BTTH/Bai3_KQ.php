<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="myStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả máy tính</title>
</head>

<body>
    <?php
    $phepTinh = $_POST['phepTinh'];

    $soThuNhat = isset($_POST['soThuNhat']) && is_numeric($_POST['soThuNhat']) ? $_POST['soThuNhat'] : 0;
    $soThuNhi = isset($_POST['soThuNhi']) && is_numeric($_POST['soThuNhi']) ? $_POST['soThuNhi'] : 0;

    if ($phepTinh == 'cong') {
        $tenPhepTinh = 'Cộng';
        $ketQua = $soThuNhat + $soThuNhi;
    }
    if ($phepTinh == 'tru') {
        $tenPhepTinh = 'Trừ';
        $ketQua = $soThuNhat - $soThuNhi;
    }
    if ($phepTinh == 'nhan') {
        $tenPhepTinh = 'Nhân';
        $ketQua = $soThuNhat * $soThuNhi;
    }
    if ($phepTinh == 'chia') {
        $tenPhepTinh = 'Chia';
        if ($soThuNhi != 0) {
            $ketQua = $soThuNhat / $soThuNhi;
        }
        else{
            $ketQua = 'Không thể chia cho 0';
        }
    }
    ?>

    <div class="my-form">
        <div class="center">
            PHÉP TÍNH TRÊN HAI SỐ
        </div>
        <div class="grid-container">
            Chọn phép tính:
            <?php echo '<p>'. $tenPhepTinh .'</p> '  ?>
            Số thứ nhất:
            <div>
                <input type="text" disabled value="<?php echo $soThuNhat ?>" >
            </div>
            Số thứ nhì:
            <div>
                <input type="text" disabled value="<?php echo $soThuNhi ?>" >
            </div>
            Kết quả
            <div>
                <input type="text" disabled value="<?php echo $ketQua ?>" >
            </div>
        </div>
        <a href="javascript:window.history.back(-1);" class="center">Trở về trang trước</a>
    </div>
</body>

</html>