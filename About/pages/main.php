<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

a{
    text-decoration: none;
    color: black ;
}
li{
    list-style: none;
}
.row{
    display: flex;
    flex-wrap: wrap;
}
/*----phần đầu giới thiệu giám đốc---*/
/* Đặt lại mặc định */
body, h1, h2, p {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  box-sizing: border-box;
}

body {
  background-color: #f4f4f9;
  color: #333;
  line-height: 1.6;
}

/* Header */
.site-header {
  background-color: #0044cc;
  color: #fff;
  padding: 20px;
  text-align: center;
}

.site-header h1 {
  font-size: 24px;
}

/* Giới thiệu giám đốc */
.director-intro {
  display: flex;
  width: 80%;
  max-width: 1200px;
  margin: 80px auto; /* Thêm khoảng cách với phần header */
  background: white;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 10px;
  overflow: hidden;
  justify-items: center;
}

.left-panel {
  width: 50%;
  overflow: hidden;
  position: relative;
}

.image-slider {
  position: relative;
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.image-slider img {
  width: 100%;
  height: auto;
  display: none;
}

.image-slider img.active {
  display: block;
}

.right-panel {
  width: 50%;
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  background-color: #fdfdfd;
}

.right-panel .content {
  display: none;
}

.right-panel .content.active {
  display: block;
}

h2 {
  margin: 0 0 10px;
  color: #333;
}

p {
  color: #666;
}

/*--ảnh giám đốc--*/
.image-slider{
    width: 250px;
    margin: 50px 50px 50px 100px;
}
.image-slider img {
    width: 250px;
}
.bullet::before {
    content: "• "; /* Ký hiệu chấm tròn */
    color: black;  /* Màu sắc của chấm */
    font-size: 1.2em; /* Kích thước chấm */
    margin-right: 5px; /* Khoảng cách giữa chấm và văn bản */
}

/*----------------------------nội dung từng cơ sở-------------------------------*/

/* Phần giới thiệu cơ sở */
.facility-intro {
  margin: 40px auto;
  width: 90%;
  max-width: 1200px;
}

.facility-item {
  display: flex;
  margin-bottom: 30px;
  justify-content: space-between;
  align-items: center;
}

.facility-item.reverse {
  flex-direction: row-reverse; /* Đảo chiều ảnh và nội dung cho cơ sở 2 */
}

.facility-image {
  width: 45%;
  transition: transform 0.3s ease-in-out;
}

.facility-img {
  width: 100%;
  height: auto;
  object-fit: cover;
  /* filter: grayscale(100%); Ảnh mặc định là đen trắng */
  transition: filter 0.3s ease-in-out;
  border-radius: 8px; /* Bo góc ảnh */
}

.facility-image:hover .facility-img {
  filter: grayscale(0%); /* Chuyển ảnh sang màu khi hover */
}

.facility-content {
  width: 50%;
  padding: 20px;
}

h2 {
  font-size: 24px;
  margin-bottom: 10px;
}

p {
  color: #666;
  line-height: 1.6;
}

/* Responsive cho màn hình nhỏ */
@media (max-width: 768px) {
  .facility-item {
    flex-direction: column;
  }

  .facility-image, .facility-content {
    width: 100%;
  }

  .facility-image {
    margin-bottom: 20px;
  }
}
/* -------------------Phần đánh giá khách hàng -----------------------------*/
/* Nhận xét của khách hàng */
.customer-reviews-section {
    background-color: #5f6c73;
    padding: 50px 0;
    text-align: center;
}

.customer-reviews-section h2 {
    font-size: 36px;
    color: #fff;
    margin-bottom: 30px;
}

.swiper-container {
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
}

.swiper-slide {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    opacity: 0; /* Ẩn tất cả slide mặc định */
    transition: opacity 0.5s ease; /* Tạo hiệu ứng chuyển đổi */
}

.swiper-slide-active {
    opacity: 1; /* Chỉ hiện slide ở giữa */
}

.swiper-slide img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    margin-bottom: 15px;
}

.swiper-slide h3 {
    font-size: 22px;
    color: #fff;
    margin-bottom: 10px;
}

.swiper-slide p {
    font-size: 16px;
    color: #ccc;
    padding-top: 20px;
}

.swiper-button-next, .swiper-button-prev {
    color: #fff;    
}
.swiper-pagination-bullet {
    background: #fff;  
}

</style>

<section1>
  <div class="director-intro">
    <div class="left-panel">
      <div class="image-slider">
        <img src="image/giamdoc1.PNG" alt="Giám đốc 1" class="slide active">
        <img src="image/giamdoc2.PNG" alt="Giám đốc 2" class="slide">
        <img src="image/giamdoc3.PNG" alt="Giám đốc 3" class="slide">
      </div>
    </div>
    <div class="right-panel">
      <div class="content active" id="content-1">
        <h2>Giám đốc 1</h2>
        <P><b> Họ và Tên:</b> <A>Hoàng Mạnh Tuân</A></P>
        <P><b>Vai Trò:</b> <A>Tổng Giám đốc Điều hành</A></P>
        <p><b>Giới thiệu:</b></p>
        <p>Ông A là người sáng lập công ty và đã có nhiều năm kinh nghiệm trong lĩnh vực quản lý doanh nghiệp.</p>
        <p><b>Thành Tựu</b></p>
        <p class="bullet">Xây dựng và phát triển công ty trở thành thương hiệu hàng đầu trong ngành.</p>
        <p class="bullet">Nhận giải thưởng "Doanh nhân tiêu biểu năm 2023".</p>
      </div>
      <div class="content" id="content-2">
        <h2>Giám đốc 2</h2>
        <P>Họ và tên: Quynh Anh</P>
        <P><b>Vai Trò:</b> <A>Giám đốc Tài chính</A></P>
        <p><b>Giới thiệu:</b></p>
        <p>là chuyên gia tài chính với hơn 15 năm kinh nghiệm làm việc trong các tập đoàn quốc tế. Bà đảm nhiệm vai trò quản lý các chiến lược tài chính, kiểm soát ngân sách và tối ưu hóa hiệu suất tài chính của công ty.</p>
        <p><b>Thành Tựu</b></p>
        <p class="bullet">Xây dựng hệ thống quản lý tài chính tiên tiến, giúp công ty tiết kiệm 20% chi phí hoạt động.</p>
        <p class="bullet">Được vinh danh là "Giám đốc tài chính xuất sắc năm 2022".</p>
      </div>
      <div class="content" id="content-3">
        <h2>Giám đốc 3</h2>
        <P>Họ và tên: Hoàng Văn Quyền</P>
        <P><b>Vai Trò:</b> <A>Giám đốc Marketing</A></P>
        <p><b>Giới thiệu:</b></p>
        <p>là một nhà lãnh đạo sáng tạo, chuyên gia trong lĩnh vực tiếp thị và xây dựng thương hiệu. Với tầm nhìn chiến lược và sự nhạy bén về thị trường, ông đã góp phần đưa thương hiệu của công ty đến gần hơn với khách hàng trong và ngoài nước.</p>
        <p><b>Thành Tựu</b></p>
        <p class="bullet">Triển khai thành công chiến dịch "Thương hiệu quốc dân", đạt doanh thu kỷ lục 500 tỷ đồng.</p>
        <p class="bullet">Giành giải thưởng "Chiến lược Marketing sáng tạo 2023".</p>
      </div>
    </div> 
  </div>


  <!-- Phần giới thiệu cơ sở 1 -->
  <div class="facility-intro">
    <div class="facility-item">
      <div class="facility-image">
        <img src="image/coso1.png" alt="Cơ sở 1" class="facility-img">
      </div>
      <div class="facility-content">
        <h2>Cơ sở 1</h2>
        <p>Đặt tại Trường Đại Học Giao Thông Vận Tải - Số 3 Đ. Cầu Giấy, Ngọc Khánh, Đống Đa, Hà Nội. Là trụ sở chính của Công ty Cổ phần Homie Book.</p>
      </div>
    </div>

    <!-- Phần giới thiệu cơ sở 2 -->
    <div class="facility-item reverse">
      <div class="facility-content">
        <h2>Cơ sở 2</h2>
        <p>Cơ sở 2 nằm ở 72x/22 Trần Hưng Đạo, P2, Q5. Với môi trường làm việc chuyên nghiệp, cơ sở này đóng vai trò quan trọng trong việc hỗ trợ các dự án lớn của công ty.</p>
      </div>
      <div class="facility-image">
        <img src="image/coso2.png" alt="Cơ sở 2" class="facility-img">
      </div>
    </div>
  </div>
<!--  -->
  <!-- Phần đánh giá khách hàng -->
  <div class="customer-reviews-section">
    <h2>Nhận Xét Của Khách Hàng</h2>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="image/giamdoc1.png" alt="Team Hoàng Sang Logo">
                <h3>Hoàng Mạnh Tuân</h3>
                <p>Mới ngày nào tôi còn làm bảo vệ ở đây  vậy mà chỉ sau 1 lần trúng số tôi đã mua lại cửa hành và thành giám đốc</p>
            </div>
            <div class="swiper-slide">
                <img src="image/giamdoc2.png" alt="Khách hàng 2">
                <h3>Khách Hàng 2</h3>
                <p>Sản phẩm tuyệt vời và dịch vụ chuyên nghiệp.</p>
            </div>
            <div class="swiper-slide">
                <img src="image/giamdoc3.png" alt="Khách hàng 3">
                <h3>Khách Hàng 3</h3>
                <p>1 nhà chúa tể markettinh như tôi nhận định cửa hàng có những chiến thuật quảng bá vô cùng độc đáo</p><br>
            </div>
        </div>
        
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>


<script>
const slides = document.querySelectorAll('.image-slider .slide');
const contents = document.querySelectorAll('.right-panel .content');
let currentIndex = 0;

function changeSlide() {
  // Remove active class from current slide and content
  slides[currentIndex].classList.remove('active');
  contents[currentIndex].classList.remove('active');

  // Increment index or reset to 0 if it's the last slide
  currentIndex = (currentIndex + 1) % slides.length;

  // Add active class to the new slide and content
  slides[currentIndex].classList.add('active');
  contents[currentIndex].classList.add('active');
}

// Change slide every 5 seconds
setInterval(changeSlide, 5000);
</script>


<!-- Link Swiper's CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- Initialize Swiper -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false, // Vẫn tiếp tục autoplay dù người dùng tương tác
        },
        effect: 'fade', // Sử dụng hiệu ứng fade để ẩn hiện slide
        fadeEffect: {
            crossFade: true // Đảm bảo chuyển mượt mà giữa các slide
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>
