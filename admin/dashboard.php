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
	<title>Welcome Admin</title>
	<link rel="stylesheet" href="text.css" />
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
</body>
</html>