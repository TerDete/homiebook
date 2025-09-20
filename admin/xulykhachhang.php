<?php
	require_once('config/config.php');
?>

<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Khách hàng</title>
	<link rel="stylesheet" type="text/css" href="text.css" media="all" />
</head>
<body>
<p>Xin chào : <b><?php echo $_SESSION['dangnhap'] ?></b> <a href="?login=dangxuat" style="float:inline-end">Đăng xuất</a></p>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
	    </ul>
	  </div>
	</nav> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php
				if (isset($_GET['taikhoan']))
				{
					?>
					<h4>Liệt kê lịch sử đơn hàng của <?php echo $_GET['taikhoan']; ?> :</h4>
					<table class="table table-bordered ">
						<tr>
							<th>Thứ tự</th>
							<th>Mã giao dịch</th>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							
						</tr>
					<?php
					$taikhoan = $_GET['taikhoan'];
					$cart = mysqli_query($con, "SELECT id_cart FROM tbl_cart WHERE tbl_cart.taikhoan= '$taikhoan'");
					$i = 0;
					while($row_hang = mysqli_fetch_array($cart)){ 
						$don_hang=$row_hang['id_cart'];
						$sql_select = mysqli_query($con,"SELECT tbl_cart_detail.id_cart,tbl_cart_detail.soluong_mua,tbl_sanpham.sanpham_name FROM tbl_cart_detail JOIN tbl_sanpham ON tbl_cart_detail.sanpham_id = tbl_sanpham.sanpham_id WHERE tbl_cart_detail.id_cart='$don_hang'");
						while($row_donhang = mysqli_fetch_array($sql_select)){ 
							$i++;
							?>
							<tr>
							<td><?php echo $i; ?></td>
							
							<td><?php echo $row_donhang['id_cart']; ?></td>
						
							<td><?php echo $row_donhang['sanpham_name']; ?></td>
							
							<td><?php echo $row_donhang['soluong_mua'] ?></td>

						</tr>
							<?php
						}
					}
				}
				else{
				?>
				
					<h4>Khách hàng</h4>
					<?php
					$sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang "); 
					?> 
					<table class="table table-bordered ">
						<tr>
							<th>Thứ tự</th>
							<th>Tên khách hàng</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Mật khẩu</th>
						</tr>
						<?php
						$i = 0;
						while($row_khachhang = mysqli_fetch_array($sql_select_khachhang)){ 
							$i++;
						?> 
						<tr>
							<td><?php echo $i; ?></td>
							<td><a style="color:brown;" href="xulykhachhang.php?taikhoan=<?php echo $row_khachhang['taikhoan']; ?>"><?php echo $row_khachhang['taikhoan']; ?></a></td>
							<td><?php echo $row_khachhang['phone']; ?></td>
							<td><?php echo $row_khachhang['address']; ?></td>
							<td><?php echo $row_khachhang['matkhau'] ?></td>
						</tr>
						<?php
						} 
						?> 
					</table>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</body>
</html>