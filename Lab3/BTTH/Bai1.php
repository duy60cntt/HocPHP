<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>

<head>
    <title>Hình chữ nhật</title>
    <style>
        table {
            width: 500px;
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
            padding: 10px;
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

        $dai = isset($_POST['dai']) ? trim($_POST['dai']) : 0;
        $rong = isset($_POST['rong']) ? trim($_POST['rong']) : 0;
        if(isset($_POST['tinh'])) {
            if(is_numeric($dai) && is_numeric($rong))
                $dientich = $dai * $rong;
                else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $dientich="";
                }
        }
        else $dientich = 0;
                
            
    ?>
    <form action="" method="post">
        <table>
            <tr id="ten">
                <td colspan="2">
                    DiỆN TÍCH HÌNH CHỮ NHẬT
                </td>
            </tr>
            <tr>
                <td>
                    Chều dài:
                </td>
                <td>
                    <input type="text" name="dai" value="<?php echo $dai;?>">
                </td>
            </tr>
            <tr>
                <td>
                    Chều rộng:
                </td>
                <td>
                    <input type="text" name="rong"value="<?php echo $rong;?>"> 
                </td>
            </tr>
            <tr>
                <td>
                    Diện tích:
                </td>
                <td>
                    <input type="text" name="dientich" disabled="disabled" value="<?php echo $dientich; ?>">
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