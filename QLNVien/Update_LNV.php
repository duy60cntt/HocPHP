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
    if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản '.$_SESSION['use'];
    else header('Location: Login.php');


    $id=$_GET['id'];
    $sql = "SELECT * FROM loainv WHERE MALOAINV='$id'";
    $kq = mysqli_query($dbc,$sql);
    $row = mysqli_fetch_assoc($kq);

    if(isset($_POST['sua'])){
        if(isset($_POST['TENLOAINV'])){
            $TENLOAINV = $_POST['TENLOAINV'];       
            $sql="UPDATE loainv SET TENLOAINV = '$TENLOAINV' WHERE MALOAINV = '$id'";      
            mysqli_query($dbc,$sql);      
            header("location:Index_LNV.php");
        }
        
    }


?>

<body>
<form method="post" action="Logout.php">
    <input type="submit" value="Đăng xuất" >
</form>



<form method="post" action="Update_LNV.php?id=<?php echo $id ?>">
    <table border="1" cellspacing="0" cellpadding="10">
        
        <tr>
            <td>Loại nhân viên</td>
            
            <td>
                <input type="text" disabled  value="<?php echo $id ?>"/>
            </td>
            <td>
                <input type="text" name="TENLOAINV" value="<?php echo $row['TENLOAINV']; ?>"/>
            </td>
        </tr>
        <tr>
            <td><input type="submit" value="Edit" name="sua"/></td>
        </tr>
    </table>
</form>




</body>
</html>