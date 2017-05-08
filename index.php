<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng Nhập</title>
</head>
<link rel="stylesheet" type="text/css" href="index.css" />
<body style="background: url(images/body_bg.jpg)">

<?php
if(isset($_POST["submit_name"]))
{
	if($_POST["user"] && $_POST["pass"])
	{
		$user = $_POST["user"];
		$pass = $_POST["pass"];
	
		$connect_db = mysql_connect("localhost", "root", "");
		$select_db = mysql_select_db("hocmysql", $connect_db);
		$set_lang = mysql_query("SET NAMES 'utf8'");
		
		$sql = "SELECT * FROM thanhvien WHERE tai_khoan = '$user' AND mat_khau = '$pass'";
		$query = mysql_query($sql);
		$num_row = mysql_num_rows($query);
		if($num_row > 0){
			$row=mysql_fetch_array($query);
			if($row['quyen_truy_cap']==2) {
			$_SESSION['nam'] = $row[quyen_truy_cap];
			$_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;
			header("location:admincp.php?page=dsnguoidung");
		} else{
			$_SESSION['nam'] = $row[quyen_truy_cap];
			$_SESSION["user"] = $user;
			$_SESSION["pass"] = $pass;
			$_SESSION['nam'] = "1";
			header("location:member.php");
			
			}	
		}
		
		}
		else
		{
			echo "<script>alert('Tài khoản không hợp lệ!')</script>";
		}
		}

?>
<?php
if(!isset($_SESSION["user"]) && !isset($_SESSION["pass"])
){
?>
<form method="post">
<table id="login-main" border="0px" cellpadding="0px" cellspacing="0px">
	<tr>
    	<td id="login-navbar" height="50px" colspan="2">đăng nhập hệ thống quản trị</td>
    </tr>
    <tr height="50px">
     <center>
        <td class="login-input"> <center><input type="text"  name="user" id="login" placeholder="Username" /></center> </td>
     </center>   
    </tr>
    <tr height="50px">
    <center>
        <td class="login-input"><center>
          
        <input type="password"  name="pass" id="password" placeholder="Password"> </center> </td>
    </center>    
    </tr>
    <tr height="50px">
        <td id="login-button"><center><input type="submit" name="submit_name" value="Đăng Nhập" /></center> </td>
    </tr>
</table>
</form>


<?php
}
else{
	header("location:admincp.php?page=dsnguoidung");
}
?>

</body>
</html>