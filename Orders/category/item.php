<?php
    $tukhoa = isset($_POST['search']) ? $_POST['tukhoa'] : ''; // Lấy từ khóa tìm kiếm
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $query_sanpham = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.id_category=tbl_category.id_category AND tbl_sanpham.id_category='$category' AND tbl_sanpham.sanpham_name LIKE '%$tukhoa%' ORDER BY tbl_sanpham.id_category DESC");
    } else {
        // Xử lý trường hợp không có tham số category
        $query_sanpham = mysqli_query($con, "SELECT * FROM tbl_sanpham,tbl_category WHERE tbl_sanpham.id_category=tbl_category.id_category AND tbl_sanpham.sanpham_name LIKE '%$tukhoa%' ORDER BY tbl_sanpham.id_category DESC");
    } 
?>
<div class="product-list"> <!-- List of products -->
    <?php
    while ($row_sanpham = mysqli_fetch_array($query_sanpham)) {
    ?>
        <div class="item">
            <div class="inner">
                <a href ="order.php?quanly=sanpham&id=<?php echo $row_sanpham['sanpham_id']?>">
                <div class="field-img" style="height: 180.42px;">
                    <a title="<?php echo $row_sanpham['sanpham_name'] ?>" href="order.php?quanly=sanpham&id=<?php echo $row_sanpham['sanpham_id']?>">
                        <img alt="<?php echo $row_sanpham['sanpham_name'] ?>" src="../uploads/<?php echo $row_sanpham['sanpham_image'] ?>" style="object-fit: contain; width: 100%; max-height: 100%;">
                    </a>
                </div>
                <h3><a title="<?php echo $row_sanpham['sanpham_name'] ?>" href="order.php?quanly=sanpham&id=<?php echo $row_sanpham['sanpham_id']?>"><?php echo $row_sanpham['sanpham_name'] ?></a></h3>
                <div class="d-flex justify-content-between">
                    <div class="info">
                        <?php if($row_sanpham['sanpham_giakhuyenmai']==0){?>
                            <p class="price"><?php echo $row_sanpham['sanpham_gia'] ?> đ</p>
                        <?php
                        }else{
                        ?>
                        <p class="price"><?php echo $row_sanpham['sanpham_giakhuyenmai'] ?> đ</p>
                        <p class="discount-f">
                            <span class="price-old"><?php echo $row_sanpham['sanpham_gia'] ?> đ</span>
                        </p>
                        <?php }?>
                    </div>
                    <div class="btn-addtocart">
                        <form method="POST">
                            <button type="submit" name="id" class="btn btn-primary" title="Thêm vào giỏ hàng" value="<?php echo $row_sanpham['sanpham_id'] ?>">+</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    if (isset($_POST['id'])) {
        $id = (int)$_POST['id']; 
        if (isset($_SESSION['giohang']) && !empty($_SESSION['giohang'])) {
            $found = 0;
            foreach ($_SESSION['giohang'] as &$cart_item) {
                if ($cart_item['id'] == $id) {
                    $cart_item['soluong'] += 1; 
                    $found = 1;
                    break;
                }
            }
            unset($cart_item); 

            if ($found == 0) {
                $_SESSION['giohang'][] = array('id' => $id, 'soluong' => 1); 
            }
        } else {
            $_SESSION['giohang'] = array(array('id' => $id, 'soluong' => 1)); 
        }
    }
    ?>    
    </div>
</div>
