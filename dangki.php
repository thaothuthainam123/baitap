<?php

error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
?>

<html>
<head><title>tân</title>

<link rel="stylesheet" type="text/css" href="dangki.css" />

</head>

<body>


<?php
if($_POST["submit_name"]){
	
	
	if($_POST["ho_ten"]){
		$ho_ten = $_POST["ho_ten"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
		
	if($_POST["dia_chi"]){
		$dia_chi = $_POST["dia_chi"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
		
		
		if($_POST["so_dien_thoai"]){
		$so_dien_thoai = $_POST["so_dien_thoai"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}	
	
	
	
	
	if($_POST["ngay_dang_ki"]){
		$ngay_dang_ki = $_POST["ngay_dang_ki"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
	
	
	
	
		
		
	if($_POST["so_phong"] !=0){
		$so_phong = $_POST["so_phong"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
	
	
	if($_POST["thoi_gian1"] !=0){
		$thoi_gian1 = $_POST["thoi_gian1"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
	
	if($_POST["thoi_gian2"] !=0){
		$thoi_gian2 = $_POST["thoi_gian2"];
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
	if($_FILES["image_upload"]["name"]){
		$image_name = $_FILES["image_upload"]["name"];								// khai báo tên file
		$image_path = $_FILES["image_upload"]["tmp_name"];							// khai báo dường dẫn tạm
	}
	else{
		$bao_loi = "Không được để trống trường nội dung nào!";
	}
	
	if($bao_loi){
		echo "<script>alert(\"$bao_loi\")</script>";
		echo "<meta http-equiv=\"refresh\" content=\"0;url=dangki.php\">";
	}
	else{
		
		$new_image_path = "../anhdaidien/".$image_name;					 // duong dan moi $new_image_path = "../anhdaidien/".tên file
		$image_upload = move_uploaded_file($image_path, $new_image_path);
		
		
		
		$connect_db = mysql_connect("localhost", "root", "");
		$select_db = mysql_select_db("baitap", $connect_db);
		$set_lang = mysql_query("SET NAMES 'utf8'");	
		$sql = "INSERT INTO nguoidung(ho_ten, dia_chi, so_dien_thoai, anh_dd) 
				VALUES('$ho_ten', '$dia_chi', '$so_dien_thoai', '$image_name' )";
		$query = mysql_query($sql);
		
		
		$connect_db = mysql_connect("localhost", "root", "");
		$select_db = mysql_select_db("baitap", $connect_db);
		$set_lang = mysql_query("SET NAMES 'utf8'");	
		$sql = "INSERT INTO dangki(gio_dang_ki, gio_ket_thuc, so_phong, ngay_dang_ki) 
				VALUES('$thoi_gian1', '$thoi_gian2', '$so_phong', '$ngay_dang_ki')";
		$query = mysql_query($sql);
		
	
		
		$thanhcong =  "bạn đã đăng kí thành công ";
		echo "<script>alert(\"$thanhcong\")</script>";
		
		
		header("location:thanhcong.php");
		
		
		
		
		
		
		
		
	}
}
else{
	$connect_db = mysql_connect("localhost", "root", "");
	$select_db = mysql_select_db("baitap", $connect_db);
	$set_lang = mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT * FROM phonghop";
	$query = mysql_query($sql);
	
	
	$connect_db = mysql_connect("localhost", "root", "");
	$select_db = mysql_select_db("baitap", $connect_db);
	$set_lang = mysql_query("SET NAMES 'utf8'");
	$sqld = "SELECT * FROM di";
	$queryd = mysql_query($sqld);
	
	
	$connect_db = mysql_connect("localhost", "root", "");
	$select_db = mysql_select_db("baitap", $connect_db);
	$set_lang = mysql_query("SET NAMES 'utf8'");
	$sqldd = "SELECT * FROM den";
	$querydd = mysql_query($sqldd);
	
	
	
	
	
}
?>
            <!-- Main Content -->
            <form method="post" enctype="multipart/form-data">
            <table   id="main-content" >
            	<tr id="main-navbar" height="36px">
                	<td  id="tan" colspan="6">ĐĂNG KÍ PHÒNG HỌP</td>
                </tr>
                <tr height="50">
                	<td class="form"><label>HỌ VÀ TÊN</label><br><input size="35px" type="text" name="ho_ten" /></td>
                </tr>
                <tr height="50">
                	<td class="form"><label>ĐỊA CHỈ</label><br><input size="35px" type="text" name="dia_chi" /></td>
                </tr>
                
                 <tr height="50">
                	<td class="form"><label>SỐ ĐIỆN THOẠI</label><br><input type="text" name="so_dien_thoai" /></td>
                </tr>
                
                
                
                
                
                
                
                <tr height="50">
                	<td class="form"><label>NGÀY ĐĂNG KÍ</label><br><input type="date" name="ngay_dang_ki" /></td>
                </tr>
                
                
                
                
                
                
                
                
                <tr height="50">
                	<td class="form"><label>SỐ PHÒNG</label><br>
                    	<select name="so_phong">
                        	<option value=0 selected="selected">--- CHỌN SỐ PHÒNG ---</option>
<?php
while($row = mysql_fetch_array($query)){
?>                            
                        	<option value=<?php echo $row["so_phong"];?>><?php echo $row["so_phong"];?></option>
<?php
}
?>                            
                        </select>                    	
                    </td>
                </tr>
                
                
                <tr height="50">
                	<td class="form"><label>THỜI GIAN BẮT ĐÂU</label><br>
                    	<select name="thoi_gian1">
                        	<option value=0 selected="selected">--- CHỌN THỜI GIAN ---</option>
<?php
while($rowd = mysql_fetch_array($queryd)){
?>                            
                        	<option value=<?php echo $rowd["thoi_gian1"];?>><?php echo $rowd["thoi_gian1"];?></option>
<?php
}
?>                            
                        </select>                    	
                    </td>
                </tr>
                
                
                <tr height="50">
                	<td class="form"><label>THỜI GIAN KẾT THÚC</label><br>
                    	<select name="thoi_gian2">
                        	<option value=0 selected="selected">--- CHỌN THỜI GIAN ---</option>
<?php
while($rowdd = mysql_fetch_array($querydd)){
?>                            
                        	<option value=<?php echo $rowdd["thoi_gian2"];?>><?php echo $rowdd["thoi_gian2"];?></option>
<?php
}
?>                            
                        </select>                    	
                    </td>
                </tr>
                
                
              <tr height="50">
                	<td class="form"><label>ẢNH ĐẠI DIỆN</label><br><input type="file" name="image_upload" /></td>
                </tr>
                
                
                <tr height="50">
                	<td class="form"><input type="submit" name="submit_name" value="Thêm sản phẩm" /> </td>
                </tr>
                
              
                
            </table>
            </form>
            <!-- End Main Content -->
            </body>