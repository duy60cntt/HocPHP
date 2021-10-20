<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>them</title>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
	<script src="vendor/bootstrap.min.js"></script>
</head>
<body>

<?php
include('connectnv.php');
include('H.php');
session_start();
?>

<?php
if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản'.$_SESSION['use'];
else header('Location: Login.php');

if (isset($_POST['TENLOAINV'])) $TENLOAINV = ($_POST['TENLOAINV']); else $TENLOAINV = "";
if (isset($_POST['MALOAINV'])) $MALOAINV = ($_POST['MALOAINV']); else $MALOAINV = "";

if (isset($_POST['TENLOAINV']) && isset($_POST['MALOAINV'])) {
    $sql = "INSERT INTO `loainv` (`MALOAINV`, `TENLOAINV`) VALUES ('$MALOAINV', '$TENLOAINV');";

    if (mysqli_query($dbc, $sql)) {
        header("location:Index_LNV.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    }
}
?>

<form method="post" action="Logout.php">
    <input type="submit" value="Đăng xuất" >
</form>



<form method="post">
    <table border="1" cellspacing="0" cellpadding="10">
        
        <tr>
            <td>Loại nhân viên</td>
            
            <td>
            <input type="text" name="MALOAINV" />
            </td>
            <td>
                <input type="text" name="TENLOAINV" />
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Thêm" /></td>
        </tr>
    </table>
</form>

</body>
</html>