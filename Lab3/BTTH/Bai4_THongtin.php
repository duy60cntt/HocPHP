<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nhập thông tin</title>
</head>

<body>
    <fieldset class="my-form">
        <legend>Enter your information</legend>
        <form action="Bai4_KQ.php" method="post" class="my-form no-border">
            <div class="grid-container">
                Họ tên:
                <input type="text" name="hoTen">
                Địa chỉ:
                <input type="text" name="diaChi">
                Số điện thoại:
                <input type="text" name="soDienThoai">
                Giới tính:
                <div>
                    <input type="radio" name="gioiTinh" value="Nam" id="nam" checked />
                    <label for="nam">Nam</label>
                    <input type="radio" name="gioiTinh" value="Nữ" id="nu" />
                    <label for="nu">Nữ</label>
                </div>
                Quốc tịch:
                <div>
                    <select name="quocTich">
                        <option value="Việt Nam" selected>
                            Việt Nam
                        </option>
                        <option value="Hoa Kỳ">
                            Hoa Kỳ
                        </option>
                        <option value="Vương quốc Anh">
                            Vương quốc Anh
                        </option>
                    </select>
                </div>
                Các môn đã học:
                <div>
                    <input type="checkbox" name="monHoc[]" id="checkbox1" value="PHP & MySQL"/>
                    <label for="checkbox1">PHP & MySQL</label>
                    <input type="checkbox" name="monHoc[]" id="checkbox2" value="C#"/>
                    <label for="checkbox2">C#</label>
                    <input type="checkbox" name="monHoc[]" id="checkbox3" value="XML"/>
                    <label for="checkbox3">XML</label>
                    <input type="checkbox" name="monHoc[]" id="checkbox4" value="Python"/>
                    <label for="checkbox4">Python</label>
                </div>
                Ghi chú:
                <textarea name="ghiChu"></textarea>
            </div>
            <div class="center">
                <div class="grid-container">
                    <input type="submit" value="Gửi">
                    <input type="reset" value="Huỷ">
                </div>
            </div>
        </form>
    </fieldset>
</body>

</html>