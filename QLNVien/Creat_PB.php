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
if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản '.$_SESSION['use'];
else header('Location: Login.php');

if (isset($_POST['TENPHONG'])) $TENPHONG = ($_POST['TENPHONG']); else $TENPHONG = "";
if (isset($_POST['MAPHONG'])) $MAPHONG = ($_POST['MAPHONG']); else $MAPHONG = "";

if (isset($_POST['TENPHONG']) && isset($_POST['MAPHONG'])) {
    $sql = "INSERT INTO `phongban` (`MAPHONG`, `TENPHONG`) VALUES ('$MAPHONG', '$TENPHONG');";

    if (mysqli_query($dbc, $sql)) {
        header("location:Index_PB.php");
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
            <td>Phong Ban</td>
            
            <td>
            <input type="text" name="MAPHONG" />
            </td>
            <td>
                <input type="text" name="TENPHONG" />
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Thêm" /></td>
        </tr>
    </table>
</form>

</body>
</html>