<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods</title>

    <?php require ('all/links.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .availability-form {
            margin-top: -140px;
            margin-bottom: -100px;
            z-index: 11;
            position: relative;

        }

        @media screen and (max-width: 575px) {

            .availability-form {
                margin-top: 20px;
                padding: 0 35px;

            }
        }
    </style>

</head>

<body class="bg-light">

    <?php require ('all/header.php'); ?>

    <div class="container-fluid">
        <!-- Swiper -->
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="restaurant_images/1.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/2.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/3.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/4.jpg" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="restaurant_images/5.jpg" class="w-100 d-block" />
                </div>
            </div>


        </div>

    </div>


    <br><br><br>
    <br><br><br>

    <!-- Tables -->
    <h2 class="mt-5 pt-4 mb-5 text-center fw-bold h-font">OUR TABLES</h2>
    <div class="container ">
        <div class="row">
            <div class="col-lg-4 col-md-6 my-3">

                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="restaurant_images/1.jpg" class="card-img-top">

                    <div class="card-body">
                        <h5>Simple Table Name</h5>
                        <div class="guests mb-4">
                            <h6 class=mb-1>
                                Guests
                            </h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                2 - 4 
                            </span>
                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>


                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                                Details</a>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 my-3">

                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="restaurant_images/8.jpg" class="card-img-top">

                    <div class="card-body">
                        <h5>Simple Table Name</h5>
                        <div class="features mb-4">
                            <h6 class=mb-1>
                                Seats
                            </h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3-5 guests
                            </span>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>


                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                                Details</a>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-4 col-md-6 my-3">

                <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                    <img src="restaurant_images/3.jpg" class="card-img-top">

                    <div class="card-body">
                        <h5>Simple Table Name</h5>
                        <div class="features mb-4">
                            <h6 class=mb-1>
                                Seats
                            </h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                                3-5 guests
                            </span>

                        </div>
                        <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>


                        </div>
                        <div class="d-flex justify-content-evenly mb-2">
                            <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
                            <a href="" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More
                                Details</a>
                        </div>


                    </div>
                </div>

            </div>








            <div class="col-lg-l2 text-center mt-5">
                <a href="tables.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Tables>>></a>

            </div>
        </div>
    </div>

    <!-- TESTIMONIALS -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">TESTIMONIALS</h2>

    <div class="container mt-5">
        <div class="swiper swiper-testimonials">
            <div class="swiper-wrapper mb-5">

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center">
                        <!-- <img src="restaurant_images/1.jpg" width="30px"> -->
                        <h6 class="m-0 mb-3">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Mollitia veniam natus odio dolore temporibus. Officia consectetur expedita laboriosam quaerat
                        neque.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center ">
                        <!-- <img src="restaurant_images/1.jpg" width="30px"> -->
                        <h6 class="m-0 mb-3">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Mollitia veniam natus odio dolore temporibus. Officia consectetur expedita laboriosam quaerat
                        neque.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

                <div class="swiper-slide bg-white p-4">
                    <div class="profile d-flex align-items-center ">
                        <!-- <img src="restaurant_images/1.jpg" width="30px"> -->
                        <h6 class="m-0 mb-3">Random User1</h6>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Mollitia veniam natus odio dolore temporibus. Officia consectetur expedita laboriosam quaerat
                        neque.
                    </p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>

            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="col-lg-l2 text-center mt-5">
            <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">Know more>>></a>

        </div>

    </div>



    <!-- REACH US-->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">

                <iframe class="w-100 rounded" height="320px"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.70910737834!2d85.17847586208751!3d27.70888202676265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1711638706371!5m2!1sen!2snp"
                    loading="lazy"></iframe>
            </div>
            <div class="col-lg-4 col-md-4">
                <!-- call us -->
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Call us</h5>
                    <a href="tel: +977 1-4567890" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +977 1-4567890
                    </a>
                    <br>
                    <a href="tel: +977 1-4567890" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i> +977 1-4567891
                    </a>
                    <h5 class="mt-4">Email</h5>
                    <a href="mailto: bristinaprajapati@gmail.com" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> bristinaprajapati@gmail.com
                    </a>

                </div>

                <!-- follow us -->
                <div class="bg-white p-4 rounded mb-4">
                    <h5>Follow us</h5>

                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram"></i> Instagram
                        </span>
                    </a>



                </div>

            </div>


        </div>
    </div>

    <!-- footer -->
    <?php require ('all/footer.php'); ?>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper-container", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,


            }

        });

        var swiper = new Swiper(".swiper-testimonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            loop: true,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    </script>

</body>

</html> 