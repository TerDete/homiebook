<?php
	session_start();
 	require_once('config/config.php'); 
?>
<?php
	if(isset($_POST['dangnhap'])) {
		$taikhoan = $_POST['taikhoan'];
		$matkhau = ($_POST['matkhau']);
		if($taikhoan=='' || $matkhau ==''){
			echo '<p> Xin nhập đủ</p>';
		}else{
            $sql = "SELECT * FROM tbl_admin WHERE user_name='" . $taikhoan . "' AND password='" . $matkhau . "' LIMIT 1";
			$sql_select_admin = mysqli_query($con, $sql);
            $count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
			if($count>0){
				$_SESSION['dangnhap'] = $row_dangnhap['user_name'];
				header('Location: dashboard.php');
			}else{
				echo '<p>Tài khoản hoặc mật khẩu sai</p>';
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" type="text/css" media="all" href="styles.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #000000;
            margin-bottom: 20px;
        }

        .login-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        .form-group label {
            font-size: 14px;
            color: #333;
            display: block;
            text-align: left;
            margin-bottom: 8px;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #0072ff;
            outline: none;
        }

        .btn {
            background-color: #0072ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #005bb5;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập Admin</h2>
        <div class="form-group">
            <form action="" method="POST">
                <label for="taikhoan">Tài khoản</label>
                <input type="text" id="taikhoan" name="taikhoan" placeholder="Điền Email" class="form-control">
                <label for="matkhau">Mật khẩu</label>
                <input type="password" id="matkhau" name="matkhau" placeholder="Điền mật khẩu" class="form-control">
                <input type="submit" name="dangnhap" class="btn btn-primary" value="Đăng nhập Admin">
            </form>
        </div>
    </div>
</body>
</html>
