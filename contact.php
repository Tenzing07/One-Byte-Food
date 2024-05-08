<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - contact</title>

    <?php require ('all/links.php'); ?>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->

    <style>
        .box {
            border-top-color: #2ec1ac !important;
        }
    </style>
</head>

<body class="bg-light">

    <!-- header -->
    <?php require ('all/header.php'); ?>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>

        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Beatae molestias cumque adipisci et illum iure <br>blanditiis ipsum delectus
            commodi deleniti!
        </p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">

                    <iframe class="w-100 rounded mb-4" height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d113032.70910737834!2d85.17847586208751!3d27.70888202676265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1711638706371!5m2!1sen!2snp"
                        loading="lazy"></iframe>


                    <h5>Address</h5>
                    <a href="https://maps.app.goo.gl/2seFj1MxYHarDMBQ6" target="_blank"
                        class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> Kathmandu, Nepal
                    </a>


                    <h5 class="mt-4">Call us</h5>
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

                    <h5 class="mt-4">Follow us</h5>
                    <a href="#" class="d-inline-block text-dark fs-9 me-2">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-9">
                        <i class="bi bi-instagram"></i>
                    </a>

                </div>
            </div>

            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">

                <form method="post" action="contact_process.php">
                    <h5>Send a message</h5>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Name</label>
                        <input type="text" class="form-control shadow-none" name="name" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Email</label>
                        <input type="email" class="form-control shadow-none" name="email" required>
                    </div>

                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Subject</label>
                        <input type="text" class="form-control shadow-none" name="subject" required>
                    </div>
                    <div class="mt-3">
                        <label class="form-label" style="font-weight: 500;">Message</label>
                        <textarea class="form-control shadow-none" rows="5" style="resize: none;" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn text-white custom-bg mt-3">
                        SEND
                    </button>
                </form>


                </div>

            </div>
        </div>
    </div>



    <!-- footer -->
    <?php require ('all/footer.php'); ?>



</body>

</html>