<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <title>Thanh Toán Tình Điện</title>
    <style>
        table {
            width: 450px;
            margin: auto;
            background-color: gray;
        }

        #ten {
            text-align: center;
            background: #ffa500;
            color: #ffffff;
            font-family: cursive;
            font-size: 30px;
        }

        td {
            
        }

        .center {
            text-align: center;
        }

        input {
            width: 300px;
        }
    </style>
</head>

<body>
    <?php 

        $socu = isset($_POST['socu']) ? trim($_POST['socu']) : 0;
        $somoi = isset($_POST['somoi']) ? trim($_POST['somoi']) : 0;
        $dongia = isset($_POST['dongia']) ? trim($_POST['dongia']) : 2000;
        if(isset($_POST['tinh'])) {
            if(is_numeric($socu) && is_numeric($somoi))
                $sotien = ($somoi -$socu)*$dongia;
                else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $sotien="";
                }
        }
        else $sotien = 0;
                
            
    ?>
    <form action="" method="post">
        <table>
            <tr id="ten">
                <td colspan="3">
                    THANH TOÁN TIỀN ĐIỆN
                </td>
            </tr>
            <tr>
                <td>
                    Tên chủ hộ:
                </td>
                <td>
                    <input type="text" name="tench">
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số cũ:
                </td>
                <td>
                    <input type="text" name="socu" value="<?php echo $socu;?>">
                </td>
                <td>
                    <p>(Kw)</p>
                </td>
            </tr>
            <tr>
                <td>
                    Chỉ số mới:
                </td>
                <td>
                    <input type="text" name="somoi"value="<?php echo $somoi;?>"> 
                </td>
                <td>
                    <p>(Kw)</p>
                </td>
            </tr>
            <tr>
                <td>
                    Đơn giá:
                </td>
                <td>
                    <input type="text" name="dongia"value="<?php echo $dongia;?>">
                </td>
                <td>
                    <p>(VNĐ)</p>
                </td>
            </tr>
            <tr>
                <td>
                    Số tiền thanh toán:
                </td>
                <td>
                    <input type="text" name="sotien" disabled="disabled" value="<?php echo $sotien; ?>">
                </td>
                <td>
                    <p>(VNĐ)</p>
                </td>
            </tr>
            <tr class="center">
                <td colspan="2">
                    <button type="submit" name="tinh">TÍNH</button>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>