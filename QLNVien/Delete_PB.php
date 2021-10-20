<?php
include('connectnv.php');
session_start();
// Check user login or not
if (isset($_SESSION['use'])) echo 'Bạn đã đăng nhập với tên tài khoản'.$_SESSION['use'];
else header('Location: login.php');




$id=$_GET['id'];
//$sql="DELETE FROM nhanvien WHERE id='$id' ";
$sql="DELETE FROM `phongban` WHERE `phongban`.`MAPHONG` = '$id'";
var_dump(mysqli_query($dbc,$sql));
var_dump($sql);
header("location:Index_PB.php");
?>