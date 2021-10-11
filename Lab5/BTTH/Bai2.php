<!DOCTYPE html >
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Bài 2</title>
</head>

<body>
    <?php
    class PHAN_SO
    {
        var $tuSo, $mauSo;
        function getTuSo()
        {
            return $this->tuSo;
        }
        function getMauSo()
        {
            return $this->mauSo;
        }
        function __construct($p_ts = 1, $p_ms = 1)
        {
            $this->tuSo = $p_ts;
            $this->mauSo = $p_ms;
        }
        // kiểm tra mẫu số khác 0 và tử số và mẫu số là số tự nhiên
        function laPhanSo()
        {
            return $this->mauSo != 0
                && is_numeric($this->tuSo) && is_numeric($this->mauSo);
        }
        //tìm ước chung lớn nhất của a và b
        function uocChungLonNhat($a, $b)
        {
            return ($a % $b) ? $this->uocChungLonNhat($b, $a % $b) : $b;
        }

        function toiGianPhanSo()
        {
            $uocChungLonNhat = $this->uocChungLonNhat($this->tuSo, $this->mauSo);
            $this->tuSo = $this->tuSo / $uocChungLonNhat;
            $this->mauSo = $this->mauSo / $uocChungLonNhat;
            // tử số dương và mẫu số âm thì chuyển dấu - lên tử số
            if($this->tuSo > 0 && $this->mauSo < 0){
                $this->tuSo = -$this->tuSo;
                $this->mauSo = -$this->mauSo;
            }
        }

        function tongHaiPhanSo($p_tuso, $p_mauso)
        {
            $ps = new PHAN_SO($p_tuso, $p_mauso);
            $ps->tuSo = ($this->tuSo * $ps->mauSo) + ($ps->tuSo * $this->mauSo);
            $ps->mauSo = $this->mauSo * $ps->mauSo;
            $ps->toiGianPhanSo();
            return $ps;
        }

        function hieuHaiPhanSo($p_tuso, $p_mauso)
        {
            $ps = new PHAN_SO($p_tuso, $p_mauso);
            $ps->tuSo = ($this->tuSo * $ps->mauSo) - ($ps->tuSo * $this->mauSo);
            $ps->mauSo = $this->mauSo * $ps->mauSo;
            $ps->toiGianPhanSo();
            return $ps;
        }

        function tichHaiPhanSo($p_tuso, $p_mauso)
        {
            $ps = new PHAN_SO($p_tuso, $p_mauso);
            $ps->tuSo = $this->tuSo * $ps->tuSo;
            $ps->mauSo = $this->mauSo * $ps->mauSo;
            $ps->toiGianPhanSo();
            return $ps;
        }
    }
    $tuSo_1 = $_POST['tuSo_1'] ?? '';
    $mauSo_1 = $_POST['mauSo_1'] ?? '';
    $tuSo_2 = $_POST['tuSo_2'] ?? '';
    $mauSo_2 = $_POST['mauSo_2'] ?? '';
    $phepTinh = $_POST['phepTinh'] ?? 'cộng';

    $ps_1 = new PHAN_SO($tuSo_1, $mauSo_1);
    $ps_2 = new PHAN_SO($tuSo_2, $mauSo_2);

    $ketQua = '';
    $chuoiKetQua = '';
    if (isset($_POST['tinh'])) {
        if ($ps_1->laPhanSo() && $ps_2->laPhanSo()) {
            switch ($phepTinh) {
                case "cộng":
                    $ps = new PHAN_SO();
                    $ps = $ps_1->tongHaiPhanSo($ps_2->tuSo, $ps_2->mauSo);
                    $ketQua = $ps_1->getTuSo() . "/" . $ps_1->getMauSo() . " + " . $ps_2->getTuSo() . "/" . $ps_2->getMauSo() . " = " . $ps->getTuSo() . "/" . $ps->getMauSo();
                    break;
                case "trừ":
                    $ps = new PHAN_SO();
                    $ps = $ps_1->hieuHaiPhanSo($ps_2->tuSo, $ps_2->mauSo);
                    $ketQua = $ps_1->getTuSo() . "/" . $ps_1->getMauSo() . " - " . $ps_2->getTuSo() . "/" . $ps_2->getMauSo() . " = " . $ps->getTuSo() . "/" . $ps->getMauSo();
                    break;
                case "nhân":
                    $ps = new PHAN_SO();
                    $ps = $ps_1->tichHaiPhanSo($ps_2->tuSo, $ps_2->mauSo);
                    $ketQua = $ps_1->getTuSo() . "/" . $ps_1->getMauSo() . " * " . $ps_2->getTuSo() . "/" . $ps_2->getMauSo() . " = " . $ps->getTuSo() . "/" . $ps->getMauSo();
                    break;
                case "chia":
                    $ps = new PHAN_SO();
                    // chia phân số là nhân nghịch đảo phân số
                    $ps = $ps_1->tichHaiPhanSo($ps_2->mauSo, $ps_2->tuSo);
                    $ketQua = $ps_1->getTuSo() . "/" . $ps_1->getMauSo() . " : " . $ps_2->getTuSo() . "/" . $ps_2->getMauSo() . " = " . $ps->getTuSo() . "/" . $ps->getMauSo();
                    break;
            }
            $chuoiKetQua = "Phép " . $phepTinh . " là : " . $ketQua;
        } else {
            $chuoiKetQua = 'Phân số không hợp lệ';
        }
    }
    ?>

    <form method="post" action="" class="my-form">
        <p style="color: blue; font-weight: bold;">Chọn phép tính trên phân số</p>
        <p>Nhập phân số thứ 1: Tử số:
            <input name="tuSo_1" type="text" maxlength="10" value="<?php echo $tuSo_1 ?>" />
            Mẫu số:
            <input name="mauSo_1" type="text" maxlength="10" value="<?php echo $mauSo_1 ?>" />
        </p>
        <p>Nhập phân số thứ 2: Tử số:
            <input name="tuSo_2" type="text" maxlength="10" value="<?php echo $tuSo_2 ?>" />
            Mẫu số:
            <input name="mauSo_2" type="text" maxlength="10" value="<?php echo $mauSo_2 ?>" />
        </p>
        <fieldset>
            <legend>Chọn phép tính</legend>
            <label>
                <input type="radio" name="phepTinh" value="cộng" <?php if ($phepTinh == "cộng") echo 'checked' ?> />Cộng
            </label>
            <label>
                <input type="radio" name="phepTinh" value="trừ" <?php if ($phepTinh == "trừ") echo 'checked' ?> />Trừ
            </label>
            <label>
                <input type="radio" name="phepTinh" value="nhân" <?php if ($phepTinh == "nhân") echo 'checked' ?> />Nhân
            </label>
            <label>
                <input type="radio" name="phepTinh" value="chia" <?php if ($phepTinh == "chia") echo 'checked' ?> />Chia
            </label>
        </fieldset>
        <br>
        <div class="center">
            <input name="tinh" type="submit" value="Kết quả" />
        </div>
    </form>

    <?php
    echo $chuoiKetQua;
    ?>
</body>

</html>