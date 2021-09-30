<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Máy tính</title>
</head>
<body>
    <form action="Bai3_KQ.php" method="post" class="my-form">
        <div class="center">
            PHÉP TÍNH TRÊN HAI SỐ
        </div>
        <div class="grid-container">
            Chọn phép tính:
            <div>
                <input type="radio" name="phepTinh" value="cong" id="cong" checked />
                <label for="cong">Cộng</label>
                <input type="radio" name="phepTinh" value="tru" id="tru" />
                <label for="tru">Trừ</label>
                <input type="radio" name="phepTinh" value="nhan" id="nhan" />
                <label for="nhan">Nhân</label>
                <input type="radio" name="phepTinh" value="chia" id="chia" />
                <label for="chia">Chia</label>
            </div>
            Số thứ nhất:
            <div>
                <input type="number" step="any" name="soThuNhat" value="0">
            </div>
            Số thứ nhì:
            <div>
                <input type="number" step="any" name="soThuNhi" value="0">
            </div>
        </div>
        <div class="center">
            <input type="submit" value="Tính">
        </div>
    </form>
</body>
</html>