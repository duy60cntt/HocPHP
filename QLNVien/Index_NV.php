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
		if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản '.$_SESSION['use'];
		else header('Location: Login.php');
	?>

    <?php
        // determine which page number visitor is currently on
        //Xác định số của trang hiện tại mà mình đang xem
        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }
    ?>
<form method="post" action="Logout.php">
    <input type="submit" value="Đăng xuất" >
</form>


	<div class="container">
		<div class="row">
			<h2 class="text-center" style="color: blue;">Danh sách nhân viên</h2>
            <button type="button" class="btn btn-default btn-lg"><a href="Creat_NV.php">Thêm nhân viên</a></button>
            <form action="Index_NV.php" method="get">
                <input name="keyword" placeholder="" value="">
                <input type="submit" value="Tìm nhân viên">
            </form>
			<table class="table" border="1" >
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

//                        var_dump(mysqli_fetch_array($row_thuchien));

                        //Lệnh sql này chưa quan tâm đến join các table khác, chỉ để tính toán cho việc phân trang
                        $sql='SELECT * FROM NHANVIEN';
                        //XÁc định có bao nhiêu kết quả trong mỗi trang
                        $results_per_page = 2;
                        $result = mysqli_query($dbc, $sql);
                        //Đếm số dòng trong câu lệnh select ở trên
                        $number_of_results = mysqli_num_rows($result);
                        // Tính toán xem có bao nhiêu trang cần chia ra
                        $number_of_pages = ceil($number_of_results/$results_per_page);



                        // determine the sql LIMIT starting number for the results on the displaying page
                        // Xác định phạm vi số thứ tự bắt đầu và kết thúc để hiển thị kết quả trên trang
                        $this_page_first_result = ($page-1)*$results_per_page;
                        $row_sql="SELECT MANV,HOTEN,NGASINH,GIOITINH,DIACHI,ANH,loainv.TENLOAINV,phongban.TENPHONG from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MALOAINV = loainv.MALOAINV and nhanvien.MAPHONG = phongban.MAPHONG LIMIT ".$this_page_first_result.','.$results_per_page;
                        if (!empty($_GET['keyword']))
                        {
                            $search = $_GET['keyword'];
                            $row_sql = "SELECT MANV,HOTEN,NGASINH,GIOITINH,DIACHI,ANH,loainv.TENLOAINV,phongban.TENPHONG from nhanvien JOIN loainv JOIN phongban WHERE nhanvien.MALOAINV = loainv.MALOAINV and nhanvien.MAPHONG = phongban.MAPHONG and HOTEN like '%$search%' LIMIT ".$this_page_first_result.','.$results_per_page;
                        }
                        $row_thuchien=mysqli_query($dbc,$row_sql);


						while($dulieu =mysqli_fetch_array($row_thuchien)){
							?>
							<td><?php echo $dulieu['MANV']; ?></td>
							<td><?php echo $dulieu['HOTEN']; ?> </td>
							<td><?php echo $dulieu['NGASINH']; ?></td>
							<td><?php 
                            if($dulieu['GIOITINH']=='1')
                                echo ('Nam');
                            else
                                echo ('Nữ');
                                                                            
                            ?></td>
							<td><?php echo $dulieu['DIACHI']; ?></td>
                        <td><img src="<?php echo 'Image/'.$dulieu['ANH']; ?>" style="width: 100px;height: 80px;" alt="Avatar" class="avatar"></td>
							<td><?php echo $dulieu['TENLOAINV']; ?></td>
							<td><?php echo $dulieu['TENPHONG']; ?></td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn sửa không')" href="Update_NV.php?id=<?php echo $dulieu['MANV'] ?>">Sửa
								</a>
							</td>
							<td>
								<a onclick=" return confirm('bạn có chắc muốn xóa không') " href="Delete_NV.php?id=<?php echo $dulieu['MANV']; ?>" >Xóa
								</a>
							</td>
						</tr>					
					<?php 	} ?>
				</tbody>
			</table>
            <?php
            // Hiển thị liên kết đến các trang

            if ($page!=1)
            echo '<a href="Index_NV.php?page='.(1).'" style="padding-right: 3px;padding-left: 3px;color: red">'.'<<'.'</a>';


            //Kiểm tra xem, nếu trang hiện tại không phải là trang 1 thì có nút "Trước" để lùi về trang trước
            if ($page!=1) echo '<a href="Index_NV.php?page='.($page-1).'" style="padding-right: 3px;padding-left: 3px;">'.'<'.'</a>';

            for ($page_a=1;$page_a<=$number_of_pages;$page_a++) {
              if ($page_a==$page)
                  echo '<b><a href="Index_NV.php?page='.$page_a.'"  style="border-style: dashed;padding-right: 3px;padding-left: 3px;">' . $page_a . '</a></b> ';
              else
                  echo '<a href="Index_NV.php?page='.$page_a.'" style="padding-right: 3px;padding-left: 3px;">' . $page_a . '</a>';
            }

            //Kiểm tra xem, nếu trang hiện tại không phải là trang cuối thì có nút "Sau" để tiến tới trang sau
            if ($page!=$number_of_pages) echo '<a href="Index_NV.php?page='.($page+1).'" style="padding-right: 3px;padding-left: 3px;">'.'>'.'</a>';

            if ($page!=$number_of_pages)
            echo '<a href="Index_NV.php?page='.($number_of_pages).'" style="padding-right: 3px;padding-left: 3px;color: red">'.'>>'.'</a>';
            ?>
		</div>
	</div>


</body>
</html>