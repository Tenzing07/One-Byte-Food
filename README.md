<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - gallery</title>

    <?php require ('all/links.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .box {
            border-top-color: #2ec1ac !important;
        }
    

        .container {
            max-width: 3500px; /* Adjust as needed */
            width: 100%;
            text-align: center; /* Center the content inside container */
        }
        /* Media query for smaller devices */
        @media (max-width: 375px) {
            .swiper-button-next,
            .swiper-button-prev {
                font-size: 10px; /* Adjust the font size for smaller devices */
            }
        }
    </style>
</head>

<body class="bg-light">

    <!-- header -->
    <?php require ('all/header.php'); ?>
    <div class="my-4 px-4">
        <h2 class="fw-bold h-font text-center">GALLERY</h2>

        <div class="h-line bg-dark"></div>

    </div>


    <div class="container px-5 ">
        <!-- Swiper -->

        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
            <div class="swiper-wrapper mb-2">
                <div class="swiper-slide">
                <img src="restaurant_images/gallery1.jpg" class="w-100 "/>
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery2.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery3.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery4.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery5.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery6.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery7.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery8.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery9.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery10.jpg" class="w-100" />
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div thumbsSlider="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery1.jpg" class="w-100 " />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery2.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery3.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery4.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery5.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery6.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery7.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery8.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery9.jpg" class="w-100" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/gallery10.jpg" class="w-100" />
                </div>
            </div>
        </div>


    </div>






    <!-- footer -->
    <?php require ('all/footer.php'); ?>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });

    var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });

    // Setting arrow color to black
    document.querySelector(".swiper-button-next").style.color = "#000";
    document.querySelector(".swiper-button-prev").style.color = "#000";
</script>




</body>

</html>