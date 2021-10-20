<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>danh sach</title>
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
?>
<form method="post" action="Logout.php">
    <input type="submit" value="Đăng xuất" >
</form>




<div class="container">
    <div class="row">
        <h2 class="text-center" style="color: blue;">Danh sách loại nhân viên</h2>
        <button type="button" class="btn btn-default btn-lg"><a href="Creat_LNV.php">Thêm loại nhân viên</a></button>
        <form action="Index_LNV.php" method="get">
            <input name="keyword" placeholder="" value="">
            <input type="submit" value="Tìm loại nhân viên">
        </form>
        <table border="1" class="table" >
            <thead>
            <tr>

                <th>Mã loại nhân viên</th>
                <th>Tên loại nhân viên</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $row_sql = "SELECT * FROM loainv";
                if (!empty($_GET['keyword']))
                    {
                        $search = $_GET['keyword'];
                         $row_sql = "select * from loainv where tenloainv like '%$search%'";
                    }

                $row_thuchien=mysqli_query($dbc,$row_sql);
                //                        var_dump(mysqli_fetch_array($row_thuchien));
                while($dulieu =mysqli_fetch_array($row_thuchien)){
                ?>
                <td><?php echo $dulieu['MALOAINV']; ?></td>
                <td><?php echo $dulieu['TENLOAINV']; ?> </td>
                <td>
                    <a onclick=" return confirm('bạn có chắc muốn sửa không')" href="Update_LNV.php?id=<?php echo $dulieu['id'] ?>" title="sửa">Sửa
                    </a>
                </td>
                <td>
                    <a onclick=" return confirm('bạn có chắc muốn xóa không') " href="Delete_LNV.php?id=<?php echo $dulieu['MALOAINV']; ?>" >Xóa
                    </a>
                </td>
            </tr>
            <?php 	} ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    function dang_Xuat(){
            location.replace("Login.php");
        }
</script>

</body>
</html>