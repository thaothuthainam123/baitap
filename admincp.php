<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
ob_start();
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Control Panel</title>
<link rel="stylesheet" type="text/css" href="admincp.css" />
<body style="background: url(images/123.jpg)">
<?php
switch(isset($_GET["page"])){
			
case "dsnguoidung": echo "<link rel='stylesheet' type='text/css' href='dsnguoidung.css' />";
break;
case "formdsnguoidung": echo "<link rel='stylesheet' type='text/css' href='formdsnguoidung.css' />";
break;
case "suadsnguoidung": echo "<link rel='stylesheet' type='text/css' href='suadsnguoidung.css' />";
break;
case "xoadsnguoidung": echo "<link rel='stylesheet' type='text/css' href='xoadsnguoidung.css' />";
break;
case "qlphonghop": echo "<link rel='stylesheet' type='text/css' href='qlphonghop.css' />";
break;
case "formqlphonghop": echo "<link rel='stylesheet' type='text/css' href='formqlphonghop.css' />";
break;
case "lichdk": echo "<link rel='stylesheet' type='text/css' href='lichdk.css' />";
break;
case "dangki": echo "<link rel='stylesheet' type='text/css' href='dangki.css' />";
break;
case "ttnguoidung": echo "<link rel='stylesheet' type='text/css' href='ttnguoidung.css' />";
break;
default: echo "<link rel='stylesheet' type='text/css' href='gioithieu.css' />";
}
?>
</head>
<body>
<?php
if($_SESSION["user"]&& $_SESSION["pass"] && $_SESSION['nam'] == 2) {
?>
<table id="wrapper" width="900px" border="0px" cellpadding="0px" cellspacing="0px">
	<!-- Header -->
	<tr>
    	<td colspan="2" id="header">
        	<table border="0px" cellpadding="0px" cellspacing="0px">
            	
            
                    
                <tr height="31px">
                	
              </tr>
            </table>
       	<img src="images/admincp-banner.gif" width="900" height="200" />        </td>
    </tr>
    <!-- End Header -->
    
    <!-- Body -->
    <tr id="body">
    	<td align="left" valign="top" width="250px">
        	<!-- Left Menu -->
            <table width="250px" class="left-menu" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr class="bg-leftbar" height="36px">
                	<td>quản lý thực đơn</td>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=dsnguoidung">quản lý danh sách người dùng</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=qlphonghop">quản lý danh sách phòng họp</a></td>
                </tr>
                 <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=sanpham">quản lý danh sách phòng họp đã đăng ký</a></td>
                </tr>
                <tr class="menu-item" height="30px">
                    <td><a href="admincp.php?page=ttnguoidung">thông tin người dùng</a></td>
                </tr>
                <tr height="30px">
                    <td></td>
                </tr>
            </table>
            <!-- End Left Menu -->
            
            <!-- User -->
            <table width="250px" class="left-menu" border="0px" cellpadding="0px" cellspacing="0px">
            	<tr class="bg-leftbar" height="36px">
                	<td>thông tin đăng nhập</td>
                </tr>
                <tr height="30px">
                	<td id="user-info">Xin chào <b><?php echo $_SESSION["user"]?></b> đã đăng nhập thành công vào hệ thống quản trị!</td>
                </tr>
                <tr height="30px">
                	<td id="logout" align="right"><a href="dangxuat.php">đăng xuất</a></td>
                </tr>
            </table>
            <!-- End User -->
        </td>
            
        <td align="right" valign="top" width="650px">
            <!-- Main Content -->
           <?php
			switch(($_GET["page"]))
			{
				case "ttnguoidung": include_once("ttnguoidung.php");
				break;
				case "dsnguoidung": include_once("dsnguoidung.php");
				break;
				case "formdsnguoidung": include_once("formdsnguoidung.php");
				break;
				case "suadsnguoidung": include_once("suadsnguoidung.php");
				break;
				case "xoadsnguoidung": include_once("xoadsnguoidung.php");
				break;
				case "formqlphonghop": include_once("formqlphonghop.php");
				break;
				case "lichdk": include_once("lichdk.php");
			    break;
				case "dangki": include_once("dangki.php");
			    break;
				case "qlphonghop":include_once("qlphonghop.php");
				break;
				
				
								
			}
			?>
            
            <!-- End Main Content -->
        </td>
    </tr>
    <!-- End Body -->
    
    <!-- Footer -->
    <tr height="62px">
    	<td id="footer" colspan="2" align="center" valign="middle">****** Chào mừng bạn đến với Form quản lý phòng họp ****** </td>
    </tr>
    <!-- End Footer -->
</table>
<?php
}
else{
	header("location:index.php");
}
?>
</body>
</html>
