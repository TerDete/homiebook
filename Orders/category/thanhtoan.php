 <?php
    if($_SESSION['taikhoan']){
        $taikhoan = $_SESSION['taikhoan'];
        $code_order =rand(0,999);
        $insert_cart = "INSERT INTO `tbl_cart`(`id_cart`, `taikhoan`, `status_cart`) VALUES ('".$code_order."','".$taikhoan."','1')";
        $cart_query = mysqli_query($con,$insert_cart);
        
            foreach ($_SESSION['giohang'] as $cart_item){
                $id_sanpham = $cart_item['id'];
                $soluong_mua = $cart_item['soluong'];
                $insert_cart_detail = "INSERT INTO `tbl_cart_detail`(`id_cart`, `sanpham_id`, `soluong_mua`) VALUES ('".$code_order."','".$id_sanpham."','".$soluong_mua."')";
                $cart_detail_query = mysqli_query($con,$insert_cart_detail);
                $tru_sanpham =mysqli_query($con," UPDATE `tbl_sanpham` SET `soluong` = `soluong` - $soluong_mua WHERE `sanpham_id` = $id_sanpham");
            }
        unset($_SESSION['giohang']); 
        header('Location: category/thankyou.php');
    }
    else{
        header('Location:../Login/dangnhap.php');
    }
 ?>