
<style>
        /* Vùng chứa chính của slider */
        #slider {
            padding-top: 140px;
            border-bottom: 2px solid #000;
            height: 650px;
            overflow: hidden;
            position: relative;
            max-width: 1100px;
            margin: 0 auto;
            border-radius: 8px;
        }

        /* Định dạng các ảnh bên trong */
        .aspect-ratio-169 {
            display: flex;
            width: 100%;
            height: 100%;
            position: relative;
            transition: 0.3s;
        }

        .aspect-ratio-169 img {
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            object-fit: cover; /* Giữ đúng kích thước ảnh */
        }

        /* Định dạng các dấu chấm (dot) */
        .dot-container {
            position: absolute;
            bottom: 10px;
            height: 30px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .dot {
            height: 15px;
            width: 16px;
            background-color: #ccc;
            border-radius: 50%;
            margin-right: 12px;
            cursor: pointer;
        }

        .dot.active {
            background-color: #333;
        }

        
    </style>


    
     

    <!-- Slider Section -->
    <section id="slider">
    <h1 id="wel" style="border-bottom: 2px solid #000; text-align: center;">🎉 Chào mừng đến với <span style="font-size: 40px; color: #ff5b6a;">HomieBook!!!</span> 🎉
</h1>

   
        <div class="aspect-ratio-169">
            <img src="1.png" alt="Slide 1">
            <img src="2.png" alt="Slide 2">
            <img src="3.png" alt="Slide 3">
            <img src="4.png" alt="Slide 4">
            <img src="5.png" alt="Slide 5">
            <img src="6.png" alt="Slide 6">
        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>

    <!-- JavaScript -->
    <script>
        const imPosition = document.querySelectorAll(".aspect-ratio-169 img");
        const imgContainer = document.querySelector('.aspect-ratio-169');
        const dotitem = document.querySelectorAll(".dot");
        let imgNumber = imPosition.length;
        let index = 0;

        imPosition.forEach(function (image, index) {
            dotitem[index].addEventListener("click", function () {
                slider(index);
                resetInterval();
            });
            image.style.left = index * 100 + "%";
        });

        function imgslide() {
            index++;
            if (index >= imgNumber) { index = 0; }
            slider(index);
        }

        function slider(index) {
            imgContainer.style.left = "-" + index * 100 + "%";
            const dotactive = document.querySelector('.active');
            dotactive.classList.remove("active");
            dotitem[index].classList.add('active');
        }

        function resetInterval() {
            clearInterval(slideInterval);
            slideInterval = setInterval(imgslide, 5000);
        }

        let slideInterval = setInterval(imgslide, 5000);
    </script>
