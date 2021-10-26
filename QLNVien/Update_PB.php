<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>them</title>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap.min.css">
    <script src="vendor/bootstrap.min.js"></script>
</head>
<?php
include('connectnv.php');
include('H.php');
session_start();
?>
<?php
if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản ' . $_SESSION['use'];
else header('Location: Login.php');
$id = $_GET['id'];
$sql = "SELECT * FROM phongban WHERE MAPHONG='$id'";
$kq = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($kq);
if (isset($_POST['sua'])) {
    if (isset($_POST['TENPHONG'])) {
        $TENPHONG = $_POST['TENPHONG'];
        $sql = "UPDATE phongban SET TENPHONG = '$TENPHONG' WHERE MAPHONG = '$id'";
        mysqli_query($dbc, $sql);
        header("location:Index_PB.php");
    }
}
?>6

<body>
    <form method="post" action="Logout.php">
        <input type="submit" value="Đăng xuất">
    </form>
    <form method="post" action="Update_PB.php?id=<?php echo $id ?>">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>Phòng ban</td>

                <td>
                    <input type="text" disabled value="<?php echo $id ?>" />
                </td>
                <td>
                    <input type="text" name="TENPHONG" value="<?php echo $row['TENPHONG']; ?>" />
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="Edit" name="sua" /></td>
            </tr>
        </table>
    </form>
</body>

</html>