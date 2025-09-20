<?php
	require_once('config/config.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';

		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sanpham(sanpham_name,sanpham_chitiet,sanpham_mota,sanpham_gia,sanpham_giakhuyenmai,sanpham_soluong,sanpham_image,id_category) values ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$soluong','$hinhanh','$danhmuc')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$giakhuyenmai = $_POST['giakhuyenmai'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',id_category='$danhmuc' WHERE sanpham_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_mota='$mota',sanpham_gia='$gia',sanpham_giakhuyenmai='$giakhuyenmai',sanpham_soluong='$soluong',sanpham_image='$hinhanh',id_category='$danhmuc' WHERE sanpham_id='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
		header('Location: xulysanpham.php');
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");
	} 
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
	<title>Sản phẩm</title>
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
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['id_category'];
		?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				<form action="" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label>Tên sản phẩm</label></td>
							<td>
							<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>"><br>
							<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>">
							</td>
						</tr>
						<tr>	
							<td><label>Hình ảnh</label></td>
							<td>
							<input type="file" class="form-control" name="hinhanh"><br>
							<img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80"><br>
							</td>
						</tr><tr>	
							<td><label>Giá</label></td>
							<td><input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br></td>
						</tr><tr>	
						<td><label>Giá khuyến mãi</label></td>
						<td><input type="text" class="form-control" name="giakhuyenmai" value="<?php echo $row_capnhat['sanpham_giakhuyenmai'] ?>"></td>
					</tr>
					<tr>	
						<td><label>Số lượng</label></td>
						<td><input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>"></td>
					</tr>
					<tr>	
						<td><label>Mô tả</label></td>
						<td><textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['sanpham_mota'] ?></textarea></td>
					</tr>
					<tr>	
						<td><label>Chi tiết</label></td>
						<td><textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea></td>
					</tr>
					<tr>	
						<td><label>Danh mục</label></td>
						<td>
							<?php
							$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY id_category DESC"); 
							?>
							<select name="danhmuc" class="form-control">
								<option value="0">-----Chọn danh mục-----</option>
								<?php
								while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
									if($id_category_1==$row_danhmuc['id_category']){
								?>
								<option selected value="<?php echo $row_danhmuc['id_category'] ?>"><?php echo $row_danhmuc['name_category'] ?></option>
								<?php 
									}else{
								?>
								<option value="<?php echo $row_danhmuc['id_category'] ?>"><?php echo $row_danhmuc['name_category'] ?></option>
								<?php
									}
								}
								?>
							</select>
						</td>
					</tr>	
				</table>					
				<input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default" style="cursor: pointer;">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm sản phẩm</h4>
				<form action="" method="POST" enctype="multipart/form-data">
					<table>
						<tr>
							<td><label for="tensanpham">Tên sản phẩm</label></td>
							<td><input type="text" class="form-control" name="tensanpham" id="tensanpham" placeholder="Tên sản phẩm"></td>
						</tr>
						<tr>
							<td><label for="hinhanh">Hình ảnh</label></td>
							<td><input type="file" class="form-control" name="hinhanh" id="hinhanh"></td>
						</tr>
						<tr>
							<td><label for="giasanpham">Giá</label></td>
							<td><input type="text" class="form-control" name="giasanpham" id="giasanpham" placeholder="Giá sản phẩm"></td>
						</tr>
						<tr>
							<td><label for="giakhuyenmai">Giá khuyến mãi</label></td>
							<td><input type="text" class="form-control" name="giakhuyenmai" id="giakhuyenmai" placeholder="Giá khuyến mãi"></td>
						</tr>
						<tr>
							<td><label for="soluong">Số lượng</label></td>
							<td><input type="text" class="form-control" name="soluong" id="soluong" placeholder="Số lượng"></td>
						</tr>
						<tr>
							<td><label for="mota">Mô tả</label></td>
							<td><textarea class="form-control" name="mota" id="mota"></textarea></td>
						</tr>
						<tr>
							<td><label for="chitiet">Chi tiết</label></td>
							<td><textarea class="form-control" name="chitiet" id="chitiet"></textarea></td>
						</tr>
						<tr>
							<td><label for="danhmuc">Danh mục</label></td>
							<td>
								<?php
								$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_category"); 
								?>
								<select name="danhmuc" class="form-control" id="danhmuc">
									<option value="0">-----Chọn danh mục-----</option>
									<?php
									while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
									?>
									<option value="<?php echo $row_danhmuc['id_category'] ?>"><?php echo $row_danhmuc['name_category'] ?></option>
									<?php 
									}
									?>
								</select>
							</td>
						</tr>
					</table>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default" style="cursor: pointer;">
				</form>

				</div>
				<?php
					} 
					$result = mysqli_query($con, "select count(sanpham_id) as total from tbl_sanpham");
					$row = mysqli_fetch_assoc($result);
					$total_records = $row['total'];
					echo " Tổng số sản phẩm :" .$total_records;
					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					$limit = 5	;
					$total_page = ceil($total_records / $limit);
					if ($current_page > $total_page){
						$current_page = $total_page;
						}
					else if ($current_page < 1){
						$current_page = 1;
					}
					$start = ($current_page - 1) * $limit;
				?>
			<div class="col-md-8">
				<h4>Liệt kê sản phẩm</h4>
				<?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.id_category=tbl_category.id_category ORDER BY tbl_sanpham.sanpham_id DESC LIMIT $start, $limit"); 
				?> 
				<table class="table table-bordered " style="align-items: center;">
					<tr>
						<th>Thứ tự</th>
						<th>Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
						<th>Danh mục</th>
						<th>Giá sản phẩm</th>
						<th>Giá khuyến mãi</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['sanpham_name'] ?></td>
						<td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" height="100" width="80"></td>
						<td><?php echo $row_sp['sanpham_soluong'] ?></td>
						<td><?php echo $row_sp['name_category'] ?></td>
						<td><?php echo number_format($row_sp['sanpham_gia']).' vnđ' ?></td>
						<td><?php echo number_format($row_sp['sanpham_giakhuyenmai']).' vnđ' ?></td>
						<td><a style="color:red;" href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">Cập nhật</a></td>
					</tr>
				<?php
					} 
					?> 
				</table>
				<?php
				if ($current_page > 1 && $total_page > 1){
						echo '<a class="page" href="xulysanpham.php?page='.($current_page-1).'">Prev</a>';
						}
						for ($i = 1; $i <= $total_page; $i++){
						if ($i == $current_page){
						echo '<span>'.$i.'</span>  ';
						}
						else{
						echo '<a class="page" href="xulysanpham.php?page='.$i.'">'.$i.'</a> ';
						}
						}
						if ($current_page < $total_page && $total_page > 1){
						echo '<a class="page" href="xulysanpham.php?page='.($current_page+1).'">Next</a>';
						} 
				?>
			</div>
		</div>
	</div>
	
</body>
</html>