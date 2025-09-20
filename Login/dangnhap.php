<?php
session_start();
include('../admin/config/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = '';

    if (isset($_POST['dangki'])) {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];

        if (strlen($taikhoan) < 4) {
            $error = "Tài khoản cần có 4 kí tự trở lên";
        }
        
        elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,32}$/", $matkhau)) {
            $error = "Mật khẩu độ dài từ 8-32 ký tự, cần có cả chữ và số";
        }

        elseif (!preg_match("/^\d{10}$/", $phone)) {
            $error = "Số điện thoại cần có 10 số";
        }

        if (empty($error)) {
            $sql_insert_khachhang = mysqli_query($con, "INSERT INTO tbl_khachhang (taikhoan, matkhau, address, phone) VALUES ('$taikhoan', '$matkhau', '$address', '$phone')");
            if ($sql_insert_khachhang) {
                $_SESSION['taikhoan'] = $taikhoan;
                header('Location: ../Orders/order.php');
                exit();
            } else {
                $error = "Có lỗi xảy ra khi đăng kí";
            }
        }
    }

    if (isset($_POST['dangnhap'])) {
        $taikhoan = $_POST['taikhoan'];
        $matkhau = $_POST['matkhau'];

        $sql_khachhang = mysqli_query($con, "SELECT taikhoan, matkhau FROM tbl_khachhang WHERE taikhoan='" . $taikhoan . "' AND matkhau='" . $matkhau . "' LIMIT 1");
        $count = mysqli_num_rows($sql_khachhang);
        $row_dangnhap = mysqli_fetch_array($sql_khachhang);

        if ($count > 0) {
            $_SESSION['taikhoan'] = $row_dangnhap['taikhoan'];
            header('Location: ../Orders/order.php');
            exit();
        } else {
            $error = "Tài khoản hoặc mật khẩu sai";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="flex-direction: column-reverse;">
    <div class="container">
        <div class="logo">
            <img src="../page/logo.png" alt="homeBook Logo" style="width: 200px; height: auto; display: block; margin: 0 auto;">
        </div>
        <?php if(isset($_GET['login'])=='dangki'){ ?>    
        <h2>Tạo tài khoản</h2>
        <form action="" method="POST">
            <input type="text" placeholder="Số tài khoản" name="taikhoan" required>
            <input type="password" placeholder="Mật khẩu" name="matkhau" required>
            <input type="text" placeholder="Địa chỉ" name="address" required>
            <input type="number" placeholder="Số điện thoại" name="phone" required>
            <button type="submit" class="primary-btn" name="dangki">Đăng kí</button>
        </form>
        <?php
            if (!empty($error)) {
                echo '<p style="color: red;">' . $error . '</p>';
            }
        ?>
        <?php } else { ?>    
        <h2>Đăng nhập</h2>
        <form action="" method="POST">
            <input type="text" placeholder="Số tài khoản" name="taikhoan" required>
            <input type="password" placeholder="Mật khẩu" name="matkhau" required>
            <button type="submit" class="primary-btn" name="dangnhap">Đăng nhập</button>
            <div class="divider"><span>hoặc</span></div>
        </form>
        <div style="text-align: center;"><a href="dangnhap.php?login=dangki" style="text-decoration: none;">Đăng kí</a></div>
        <?php
            if (!empty($error)) {
                echo '<p style="color: red;">' . $error . '</p>';
            }
        ?>
        <?php } ?>
    </div>
</body>
</html>
