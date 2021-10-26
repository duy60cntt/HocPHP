<?php
include('connectnv.php');
session_start();

$id=$_GET['id'];
$sql="DELETE FROM `loainv` WHERE `loainv`.`MALOAINV` = '$id'";
var_dump(mysqli_query($dbc,$sql));
var_dump($sql);
header("location:Index_LNV.php");
?>