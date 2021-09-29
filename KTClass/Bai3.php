<!DOCTYPE html>
<html>
<head>
    <title>Hình chữ nhật</title>
    <style>
        table{
            width: 500px;
            margin: auto;  
            background-color: gray;         
        }
        #ten{
            text-align: center;
            background: #ffa500;
            color: #ffffff;
            font-family: cursive;
            font-size:30px;
        }
        td{
            padding: 10px;
        }
        .center{
            text-align: center;
        }
        input{
            width: 300px;
        }

    </style>
</head>
<body>
<?php
    if(isset($_POST['bankinh']))  
        $bankinh=trim($_POST['bankinh']); 
    else $bankinh=0;
    
    if(isset($_POST['dientich']))
            if (is_numeric($bankinh) )
                $dientich = $bankinh * $bankinh * 3.14 ;
            else {
                    echo "<font color='red'>Vui lòng nhập vào số! </font>"; 
                    $dientich="";
                }
    else $dientich=0;
?>
    <form action="" method="post">
        <table>
            <tr id="ten">
                <td colspan="2">
                    DiỆN TÍCH HÌNH TRÒN
                </td>
            </tr>
            <tr>
                <td>
                    Bán kính
                </td>
                <td>
                    <input type="text" name="bankinh" value="<?php echo $bankinh; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Diện tích
                </td>
                <td>
                    <input type="text" name="dientich" disabled value="<?php echo $dientich; ?>">
                </td>
            </tr>
            <tr class="center">
                <td colspan="2">
                    <button type="submit">TÍNH</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>