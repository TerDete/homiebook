<?php
  $current_category = isset($_GET['category']) ? (int)$_GET['category'] : 0;
  $query_category = mysqli_query($con,"SELECT * FROM tbl_category");
  $translateX =  90 - $current_category * 13.75;
?>
<div class="swiper-wrapper" style="transform: translate3d(<?php echo $translateX;?>px, 0px, 0px); transition: transform 0.3s ease;">
  <?php while($row_category = mysqli_fetch_array($query_category)) { ?>  
    <div class="swiper-slide" style="margin-right: 15px;">
      <a href="order.php?quanly=category&category=<?php echo $row_category['id_category'] ?>">
        <span class="img">
          <img src="../uploads/<?php echo $row_category['image_category'] ;?>" width="100" height="100" alt="<?php echo $row_category['name_category'] ?>" loading="eager" style="<?php echo ($current_category == $row_category['id_category']) ? 'border: 3px solid #787878;' : ''; ?>">
        </span>
        <span class="txt"><?php echo $row_category['name_category'] ?></span>
      </a>
    </div>
  <?php } ?>
</div>

