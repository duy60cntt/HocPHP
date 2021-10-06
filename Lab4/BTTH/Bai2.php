<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../css/myStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
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
<body>
    <?php
    $daySo = $_POST['daySo'] ?? '';
    $tongDaySo = $_POST['tongDaySo'] ?? '';

    if (isset($_POST['submit'])){
        $mang = explode(',', $daySo);
        $tongDaySo = array_sum($mang);
    }
    ?>

<form action="" method="post">
        <table>
            <tr id="ten">
                <td colspan="3">
                   NHẬP VÀ TÍNH SỐ TRÊN DÃY SỐ
                </td>
            </tr>
            <tr>
                <td>
                   Nhập dãy số:
                </td>
                <td>
                <input type="text" name="daySo" value="<?php echo $daySo ?>">
                </td>
                <td style="color:red">(*)</td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                <input type="submit" name="submit" value="Tổng dãy số" class="half-size">
                </td>
            </tr>
            <tr>
                <td>
                   Tổng dãy số:
                </td>
                <td>
                <input type="text" name="tongDaySo" disabled value="<?php echo $tongDaySo ?>">
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                <span style="color: red;">(*)</span>Các số được nhập cách nhau bằng dấu ","
                </td>
            </tr>
            
        </table>
    </form>
</body>

</html>
