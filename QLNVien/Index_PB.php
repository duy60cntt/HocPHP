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
    if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản ' . $_SESSION['use'];
    else header('Location: Login.php');
    ?>
    <form method="post" action="Logout.php">
        <input type="submit" value="Đăng xuất">
    </form>




    <div class="container">
        <div class="row">
            <h2 class="text-center" style="color: blue;">Danh sách Phòng ban</h2>
            <button type="button" class="btn btn-default btn-lg"><a href="Creat_PB.php">Thêm Phòng ban</a></button>
            <form action="Index_PB.php" method="get">
                <input name="keyword" placeholder="" value="">
                <input type="submit" value="Tìm phòng ban">
            </form>
            <table class="table" border="1">
                <thead>
                    <tr>

                        <th>Mã phòng ban</th>
                        <th>Tên phong ban</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $slq = "SELECT * FROM phongban";
                        if (!empty($_GET['keyword'])) {
                            $search = $_GET['keyword'];
                            $slq = "select * from phongban where tenphong like '%$search%'";
                        }

                        $kq = mysqli_query($dbc, $slq);
                        while ($dulieu = mysqli_fetch_array($kq)) {
                        ?>
                            <td><?php echo $dulieu['MAPHONG']; ?></td>
                            <td><?php echo $dulieu['TENPHONG']; ?> </td>
                            <td>
                                <a onclick=" return confirm('bạn có chắc muốn sửa không')" href="Update_PB.php?id=<?php echo $dulieu['MAPHONG']; ?>">Sửa
                                </a>
                            </td>
                            <td>
                                <a onclick=" return confirm('bạn có chắc muốn xóa không') " href="Delete_PB.php?id=<?php echo $dulieu['MAPHONG']; ?> ">Xóa
                                </a>
                            </td>
                    </tr>
                <?php     } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>