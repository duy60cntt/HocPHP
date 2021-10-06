<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Xử lý n</title>
</head>
<body>
<?php
	if(isset($_POST['n'])) $n=$_POST['n'];
	else $n=0;

	$ketqua="";
	if(isset($_POST['hthi'])) 
	{	//Tạo mảng có n phần tử, các phần tử có giá trị [-100,100]
		$arr=array();
		for($i=0;$i<$n;$i++)
		{
			$x=rand(-200,200);
			$arr[$i]=$x;
		}
		//In ra mảng vừa tạo
		$ketqua="Mảng được tạo là: " .implode(" ",$arr)."&#13;&#10;";

		//Sắp xếp mảng tăng dần
        sort($arr);           
        $ketqua.="Mảng sắp xếp: " .implode(" ",$arr)."&#13;&#10;";
		// Chen số 10 vào mang vị trí bắt kỳ	
		$phan_tu_can_chen = '10';  
		$vitri = rand(0,$n);
		array_splice( $arr, $vitri, 0, $phan_tu_can_chen );  
		$ketqua.="Mảng thêm phần thử: " .implode(" ",$arr)."&#13;&#10;";	
	}
?>
<form action="" method="post">
	Nhập n: <input type="text" name="n" value="<?php echo $n?>"/>
	<input type="submit" name="hthi" value="Hiển thị"/>
	Kết quả: <br>
	<textarea cols="70" rows="10" name="ketqua"> <?php echo $ketqua?></textarea>
</form>
</body>
</html>
