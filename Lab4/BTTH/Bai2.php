<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<style>
        table {
            width: 600px;
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
    $dayso=trim($_POST['dayso1']); 
    $arr=array($dayso);
    if(isset($_POST['tinh'])) {
        $ketqua="Mảng được tạo là: " .implode(" ",$arr)."&#13;&#10;";
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
                    <input type="text" name="dayso1" value="">
                </td>
                <td style="color:red">(*)</td>
            </tr>
            <tr>
                <td>
                    
                </td>
                <td>
                <button type="submit" name="tinh">Tổng dãy số</button>
                </td>
            </tr>
            <tr>
                <td>
                   Tổng dãy số:
                </td>
                <td>
                    <input type="text" name="ht" disabled="disabled" value="<?php echo $ketqua; ?>">
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>