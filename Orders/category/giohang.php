<?php

$product=array();
if(isset($_SESSION['giohang']) && isset($_GET['xoa'])){
    $id =$_GET['xoa'];
    foreach ($_SESSION['giohang'] as $cart_item){
        if($cart_item['id']!=$id){
            $product[] = array(
                'tensanpham' => $cart_item['tensanpham'],  
                'id'        => $cart_item['id'],           
                'soluong'   => $cart_item['soluong'] ,               
                'giasp'     => $cart_item['giasp'],        
                'hinhanh'   => $cart_item['hinhanh'],      
                'masp'      => $cart_item['masp']      
            );
        }
    }
    $_SESSION['giohang']=$product;
    header('Location:order.php?quanly=giohang');
}

if (isset($_GET['action']) && $_GET['action'] == 'increment' && isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['giohang'] as &$cart_item) {
        if ($cart_item['id'] == $id) {
            $cart_item['soluong'] += 1;
            break;
        }
    }
    header('Location: order.php?quanly=giohang');
    exit();
}


if (isset($_GET['action']) && $_GET['action'] == 'decrement' && isset($_GET['id'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['giohang'] as &$cart_item) {
        if ($cart_item['id'] == $id && $cart_item['soluong'] > 1) {
            $cart_item['soluong'] -= 1;
            break;
        }
    }
    header('Location: order.php?quanly=giohang');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 50px;
            height: auto;
        }
        .delete-btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        .delete-btn:hover {
            background-color: #ff0000;
        }
        .total {
            text-align: right;
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .button-container {
            text-align: right;
            margin-top: 20px;
        }

        .payment-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .payment-btn:hover {
            background-color: #45a049;
        }

        .empty-cart {
            text-align: center;
            font-size: 1.2em;
            margin-top: 50px;
        }
        .quantity-btn{
            color: white;
            background-color: #ff4d4d;
            padding :1px 5px;
            margin:0px 2px;
        }
        
    </style>
</head>
<body>

<?php

if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
    ?>
    <h1 style="margin-top: 100px">Giỏ hàng</h1>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 1;
            $tongtien=0;
            foreach ($_SESSION['giohang'] as $cart_item) {
                $id = $cart_item['id'];
                $soluong = $cart_item['soluong'];

                $sql = "SELECT * FROM tbl_sanpham WHERE sanpham_id = '$id' LIMIT 1";
                $query = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($query);

                if ($row) {
                    $hinhanh = $row['sanpham_image'];
                    $tensanpham = $row['sanpham_name'];
                    $giasp = $row['sanpham_giakhuyenmai'];
                    $thanhtien = $soluong * $giasp; // 
                    $tongtien+=$thanhtien;
                    echo "<tr>";
                    echo "<td>$stt</td>";
                    echo "<td><img src='../uploads/$hinhanh' alt='$tensanpham'></td>";
                    echo "<td>$tensanpham</td>";
                    echo "<td>
                            <a href='order.php?quanly=giohang&action=decrement&id=$id' class='quantity-btn'>-</a>
                            $soluong
                            <a href='order.php?quanly=giohang&action=increment&id=$id' class='quantity-btn'>+</a>
                          </td>";
                    echo "<td>" . number_format($giasp, 0, '.', '.') . " đ</td>";
                    echo "<td>" . number_format($thanhtien, 0, '.', '.') . " đ</td>";
                    echo "<td><a href='order.php?quanly=giohang&xoa=$id' class='delete-btn'>Xóa</a></td>";
                    echo "</tr>";
                    $stt++;
                }
            }
            ?>
        </tbody>
    </table>
    <?php
    echo "<p class='total'>Tổng tiền: " . number_format($tongtien, 0, '.', '.') . " đ</p>";
    echo "<div class='button-container'>";
    echo "<a href='order.php?quanly=thanhtoan' class='payment-btn'>Thanh toán</a>";
    echo "</div>";
} else {
    echo "<p class='empty-cart'>Không có sản phẩm trong giỏ hàng</p>";
}
?>
</body>
</html>
