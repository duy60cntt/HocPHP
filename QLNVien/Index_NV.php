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

    <?php
    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }
    ?>
    <form method="post" action="Logout.php">
        <input type="submit" value="Đăng xuất">
    </form>


    <div class="container">
        <div class="row">
            <h2 class="text-center" style="color: blue;">Danh sách nhân viên</h2>
            <button type="button" class="btn btn-default btn-lg"><a href="Creat_NV.php">Thêm nhân viên</a></button>
            <form action="Index_NV.php" method="get">
                <input name="keyword" placeholder="" value="">
                <input type="submit" value="Tìm nhân viên">
            </form>
            <table class="table" border="1">
                <thead>
                    <tr>

                        <th>Mã</th>
                        <th>Họ và tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Ảnh</th>
                        <th>Loại nhân viên</th>
                        <th>Phòng ban</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php              
                        $sql = 'SELECT * FROM NHANVIEN';
                        $results_per_page = 2;
                        $result = mysqli_query($dbc, $sql);
                        $number_of_results = mysqli_num_rows($result);
                        $number_of_pages = ceil($number_of_results / $results_per_page);
                        $this_page_first_result = ($page - 1) * $results_per_page;
                        $slq1 = "SELECT MANV,HOTEN,NGASINH,GIOITINH,DIACHI,ANH,loainv.TENLOAINV,phongban.TENPHONG from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MALOAINV = loainv.MALOAINV and nhanvien.MAPHONG = phongban.MAPHONG LIMIT " . $this_page_first_result . ',' . $results_per_page;
                        if (!empty($_GET['keyword'])) {
                            $search = $_GET['keyword'];
                            $slq1 = "SELECT MANV,HOTEN,NGASINH,GIOITINH,DIACHI,ANH,loainv.TENLOAINV,phongban.TENPHONG from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MALOAINV = loainv.MALOAINV and nhanvien.MAPHONG = phongban.MAPHONG and HOTEN like '%$search%' LIMIT " . $this_page_first_result . ',' . $results_per_page;
                        }
                        $kq = mysqli_query($dbc, $slq1);
                        while ($dulieu = mysqli_fetch_array($kq)) {
                        ?>
                            <td><?php echo $dulieu['MANV']; ?></td>
                            <td><?php echo $dulieu['HOTEN']; ?> </td>
                            <td><?php echo $dulieu['NGASINH']; ?></td>
                            <td><?php
                                if ($dulieu['GIOITINH'] == '1')
                                    echo ('Nam');
                                else
                                    echo ('Nữ');

                                ?></td>
                            <td><?php echo $dulieu['DIACHI']; ?></td>
                            <td><img src="<?php echo 'Image/' . $dulieu['ANH']; ?>" style="width: 100px;height: 80px;" alt="Avatar" class="avatar"></td>
                            <td><?php echo $dulieu['TENLOAINV']; ?></td>
                            <td><?php echo $dulieu['TENPHONG']; ?></td>
                            <td>
                                <a onclick=" return confirm('bạn có chắc muốn sửa không')" href="Update_NV.php?id=<?php echo $dulieu['MANV'] ?>">Sửa
                                </a>
                            </td>
                            <td>
                                <a onclick=" return confirm('bạn có chắc muốn xóa không') " href="Delete_NV.php?id=<?php echo $dulieu['MANV']; ?>">Xóa
                                </a>
                            </td>
                    </tr>
                <?php     } ?>
                </tbody>
            </table>
            <?php

            if ($page != 1)
                echo '<a href="Index_NV.php?page=' . (1) . '" style="padding-right: 3px;padding-left: 3px;color: red">' . '<<' . '</a>';
            
                if ($page != 1) echo '<a href="Index_NV.php?page=' . ($page - 1) . '" style="padding-right: 3px;padding-left: 3px;">' . '<' . '</a>';
            for ($page_a = 1; $page_a <= $number_of_pages; $page_a++) {
                if ($page_a == $page)
                    echo '<b><a href="Index_NV.php?page=' . $page_a . '"  style="border-style: dashed;padding-right: 3px;padding-left: 3px;">' . $page_a . '</a></b> ';
                else
                    echo '<a href="Index_NV.php?page=' . $page_a . '" style="padding-right: 3px;padding-left: 3px;">' . $page_a . '</a>';
            }

            if ($page != $number_of_pages) echo '<a href="Index_NV.php?page=' . ($page + 1) . '" style="padding-right: 3px;padding-left: 3px;">' . '>' . '</a>';

            if ($page != $number_of_pages)
                echo '<a href="Index_NV.php?page=' . ($number_of_pages) . '" style="padding-right: 3px;padding-left: 3px;color: red">' . '>>' . '</a>';
            ?>
        </div>
    </div>

</body>
</html>