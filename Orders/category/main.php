<?php
if (isset($_GET['quanly'])) {
    $quanly = $_GET['quanly'];
} else {
    $quanly = '';
}
?>    
<div class="wrapper"> 
  <div class="main"> 
    <div class="container">
      <div class="cate-menu-list" style="margin-top: 10px; width:100%">
        <?php
        if($quanly=="sanpham"){
          include("category/sanpham.php");
        }
        else if($quanly=="thanhtoan"){
          include("category/thanhtoan.php");
        }else if($quanly=="giohang"){
          include("category/giohang.php");
        }
        else{
        ?>
          <div class="swiper swiper-initialized swiper-horizontal swiper-pointer-events"> 
            <?php include("category/menu.php");?>
          </div>
          <?php include("category/item.php");
          }
          ?>
      </div>
    </div>
  </div>
</div>    


