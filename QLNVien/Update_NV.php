<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>them</title>
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
if (isset($_POST['HOTEN'])) $HOTEN = ($_POST['HOTEN']); else $HOTEN = "";
if (isset($_POST['NGASINH'])) $NGASINH = $_POST['NGASINH']; else $NGASINH = "";
if (isset($_POST['GIOITINH'])) $GIOITINH = $_POST['GIOITINH']; else $GIOITINH = "";
if (isset($_POST['DIACHI'])) $DIACHI = strval($_POST['DIACHI']); else $DIACHI = "";

if (isset($_POST['HOTEN']))
{
    $target_dir = "Image/";
    $target_file = $target_dir . basename($_FILES["ANH"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["ANH"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["ANH"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Không thêm đc";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["ANH"]["tmp_name"], $target_file)) {
            echo "Thêm thành công";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}


if (isset($_FILES['ANH'])) $ANH = $_FILES['ANH']["name"]; else $ANH = "2";


if (isset($_POST['MALOAINV'])) $MALOAINV = $_POST['MALOAINV']; else $MALOAINV = "2";
if (isset($_POST['MAPHONG'])) $MAPHONG = $_POST['MAPHONG']; else $MAPHONG = "2";


$id = $_GET['id'];
$row_sql = "SELECT * FROM `nhanvien` WHERE `nhanvien`.`MANV` = '$id'";
$row_thucthi = mysqli_query($dbc, $row_sql);
$row_dulieu = mysqli_fetch_assoc($row_thucthi);

if(isset($_POST['sua'])){
    if(isset($_POST['HOTEN'])){
        $HOTEN = $_POST['HOTEN'];       
        $sql = "UPDATE `nhanvien` SET `HOTEN` = '$HOTEN', `NGASINH` ='$NGASINH', `GIOITINH` = '$GIOITINH', `DIACHI` = '$DIACHI', `ANH` = '$ANH', `MALOAINV` = '$MALOAINV', `MAPHONG` = '$MAPHONG' WHERE `nhanvien`.`MANV` = '$id';";

    if (mysqli_query($dbc, $sql)) {
        header("location:Index_NV.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($dbc);
    }
    }
    
}
?>

<form method="post" action="Logout.php">
    <input type="submit" value="Đăng xuất">
</form>


<form method="post" enctype="multipart/form-data" action="Update_NV.php?id=<?php echo $id ?>">
    <table border="1" cellspacing="0" cellpadding="10">
    <tr>
            <td>Mã NV</td>
            <td>
                <input type="text" disabled  value="<?php echo $id ?>"/>
            </td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td>
                <input type="text" name="HOTEN" value="<?php echo $row_dulieu['HOTEN']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td>
                <input type="date" name="NGASINH" value="<?php echo $row_dulieu['NGASINH']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>

                Nam <input type="radio" name="GIOITINH" value="1"
                    <?php
                    if ($row_dulieu['GIOITINH'] == 1) echo "checked";
                    ?>
                />
                Nữ <input type="radio" name="GIOITINH" value="0"
                    <?php
                    if ($row_dulieu['GIOITINH'] == 0) echo "checked";
                    ?>
                />
            </td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td>
                <input type="text" name="DIACHI" value="<?php echo $row_dulieu['DIACHI']; ?>"/>
            </td>
        </tr>
        <tr>
            <td>Ảnh
                <input type="file" name="ANH" accept="Image/*" />
            </td>

            <td><img src="<?php echo 'Image/'.$row_dulieu['ANH']; ?>" alt="Avatar" class="avatar"></td>
        </tr>
        <tr>
            <td>Loại nhân viên</td>
            <td>
                <!--                <input type="text" name="MALOAINHANVIEN" />-->

                <select name="MALOAINV">
                    <?php
                    $row_sql = "SELECT * FROM loainv";
                    $row_thuchien = mysqli_query($dbc, $row_sql);
                    while ($dulieu = mysqli_fetch_array($row_thuchien)) {
                        $value = $dulieu['MALOAINV'];
                        $name = $dulieu['TENLOAINV'];
                        ?>
                        <?php
                        //Kiểm tra xem cái nào đã được check từ trước
                        if ($row_dulieu['MALOAINV'] == $dulieu['MALOAINV'])
                            echo "<option value='$value' selected>$name</option>";
                        else
                            echo "<option value='$value'>$name</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Phòng ban</td>
            <td>
                <!--                <input type="text" name="MAPHONG" />-->
                <select name="MAPHONG">
                    <?php
                    $row_sql = "SELECT * FROM phongban";
                    $row_thuchien = mysqli_query($dbc, $row_sql);
                    while ($dulieu = mysqli_fetch_array($row_thuchien)) {
                        $value = $dulieu['MAPHONG'];
                        $name = $dulieu['TENPHONG'];
                        ?>
                        <?php
                        //Kiểm tra xem cái nào đã được check từ trước
                        if ($row_dulieu['MAPHONG'] == $dulieu['MAPHONG'])
                            echo "<option value='$value' selected>$name</option>";
                        else
                            echo "<option value='$value'>$name</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="sua" value="Cập nhật"/></td>
        </tr>
    </table>
</form>

</body>
</html>