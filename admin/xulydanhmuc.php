<?php
	require_once('config/config.php');
?>
<?php
	if(isset($_POST['themdanhmuc'])){
		$tendanhmuc = $_POST['danhmuc'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$path = '../uploads/';
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert = mysqli_query($con,"INSERT INTO tbl_category(name_category,image_category) values ('$tendanhmuc','$hinhanh')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatdanhmuc'])){
		$id_post = $_POST['id_danhmuc'];
		$tendanhmuc = $_POST['danhmuc'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update = mysqli_query($con,"UPDATE tbl_category SET name_category='$tendanhmuc' WHERE id_category='$id_post'");
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update = mysqli_query($con,"UPDATE tbl_category SET name_category='$tendanhmuc', image_category='$hinhanh' WHERE id_category='$id_post'");
		}
		header('Location:xulydanhmuc.php');
	}
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_category WHERE id_category='$id'");
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
	<title>Danh mục</title>
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
				$id_capnhat = $_GET['id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_category WHERE id_category='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				?>
				<div class="col-md-4">
				<h4>Cập nhật danh mục</h4>
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên danh mục</label>
					<input type="text" class="form-control" name="danhmuc" value="<?php echo $row_capnhat['name_category'] ?>"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['image_category'] ?>" height="80" width="80"><br>
					<input type="hidden" class="form-control" name="id_danhmuc" value="<?php echo $row_capnhat['id_category'] ?>">
					<input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?>
				<div class="col-md-4">
				<h4>Thêm danh mục</h4>
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên danh mục</label>
					<input type="text" class="form-control" name="danhmuc" placeholder="Tên danh mục"><br>
					<label for="hinhanh">Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh" id="hinhanh">
					<input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-default" style="cursor: pointer;">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê danh mục</h4>
				<?php
				$sql_select = mysqli_query($con,"SELECT * FROM tbl_category ORDER BY id_category DESC"); 
				?>
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên danh mục</th>
						<th>Hình ảnh</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_category = mysqli_fetch_array($sql_select)){ 
						$i++;
					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $row_category['name_category'] ?></td>
						<td><img src="../uploads/<?php echo $row_category['image_category'] ?>" height="80" width="80"></td>
						<td><a id="xoa" href="?xoa=<?php echo $row_category['id_category'] ?>">Xóa</a> || <a id="capnhat" href="?quanly=capnhat&id=<?php echo $row_category['id_category'] ?>">Cập nhật</a></td>
					</tr>
					<?php
					} 
					?>
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>
