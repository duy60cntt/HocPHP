<!DOCTYPE html>
<head>

</head>
<body>
    <?php
        class Nguoi{
            protected $hoTen;
            protected $diaChi;
            protected $gioiTinh;
            public function sethoTen(){
                 $this->$hoTen;
            }
            public function setdiaChi(){
                 $this->$diaChi;
            }
            public function setgioiTinh(){
                 $this->$gioiTinh;
            }
            public function gethoTen(){
                return $this->hoTen;
            }
            public function getdiaChi(){
                return $this->diaChi;
            }
            public function getgioiTinh(){
                return $this->gioiTinh;
            }
        }
        class HocSinh extends Nguoi{
            protected $lopHoc;
            protected $nganhHoc;
            function getlopHoc(){
                return $this->lopHoc;
            }
            function getnganhHoc(){
                return $this->nganhHoc;
            }
            public function setNganhHoc($nganhHoc){
                $this->nganhHoc=$nganhHoc;
            }
            //phuongthuc
            private function tinhDiemThuong(){
                if($this->nganhHoc==="CNTT")
                    return 1;
                else
                    if($this->nganhHoc==="KinhTe")
                        return 1.5;
                    else
                        return 0;
            }

        }
        class GiangVien extends Nguoi{
            protected $trinhDo; 
            function gettranhDo(){
                return $this->trinhDo;
            }
            const luongcb = 1500000;
            public function setTrinhDo($trinhDo){
                $this->trinhDo=$trinhDo;
            }
            // phuong thuc
            private function tinhLuongCB(){
                if($this->trinhDo==="CuNhan")
                    return self :: luongcb*2.34;
                else
                    if($this->trinhDo==="ThacSi")
                        return self :: luongcb*3.67;
                    else
                        return self :: luongcb*5.66;
            }
        }


        $str=NULL;
        if(isset($_POST['show'])){
            if(isset($_POST['sinhvien']) && ($_POST['sinhvien'])=="sv"){
                $sv=new HocSinh();
                $sv->sethoTen($_POST['ten']);
                $sv->setdiaChi($_POST['diachi']);
                $sv->setgioiTinh($_POST['gt']);
                $str= "T??n ".$sv->gethoTen().
                    "?????a ch???".$sv->getdiaChi().
                    "Gi???i t??nh".$sv->getgioiTinh();
            }           
        }
    ?>


<form action="" method="post">
<fieldset>
	<legend>NH???P TH??NG TIN</legend>
	<table border='0'>

		<tr>
            <td>Nh???p t??n:</td>
            <td><input type="text"  name="ten" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>"></td>     
		</tr>
		<tr>
			<td>?????a ch???:</td>
			<td><input type="text"  name="diachi" value="<?php if(isset($_POST['diachi'])) echo $_POST['diachi'];?>"/></td>
		</tr>
		<tr>
			<td>Gi???i t??nh</td>
			<td>
                <input type="radio" name="gt" value="nam" 
				    <?php if(isset($_POST['gt'])&&($_POST['gt'])=="nam") echo 'checked'?>/>Nam
			    <input type="radio" name="gt" value="nu"
				    <?php if(isset($_POST['gt'])&&($_POST['gt'])=="nu") echo 'checked'?>/> N???
            </td>
		</tr>
        <tr>
        <td>
            <input type="radio" name="sinhvien" value="sv" 
				<?php if(isset($_POST['sinhvien'])&&($_POST['sinhvien'])=="sv") echo 'checked'?>/>H???c Sinh
			<input type="radio" name="hs" value="ht"
				<?php if(isset($_POST['gv'])&&($_POST['gv'])=="gv") echo 'checked'?>/> Gi???ng vi??n
			</td>
        </tr>
		
		<tr>
			<td colspan="2" align="center"><input type="submit" name="show" value="Show th??ng tin"/></td>
		</tr>
        <tr><td>K???t qu???:</td>
			<td><textarea name="ketqua" cols="70" rows="4" disabled="disabled"><?php echo $str;?></textarea></td>
		</tr>
	</table>
</fieldset>
</form>
</body>
</html>