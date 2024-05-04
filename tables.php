<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - tables</title>

    <?php require ('all/links.php'); ?>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .box {
            border-top-color: #2ec1ac !important;
        }

        .custom-submit-btn {
            background-color: #2ec1ac !important;
            /* Greenish color */
            width: 100%;
            /* Set button width to 100% */
        }

        .custom-submit-btn:hover {
            background-color: #279e8c !important;
            /* Darker greenish color on hover */
        }
    </style>
</head>

<body class="bg-light">

    <!-- header -->
    <?php require ('all/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR TABLES</h2>

        <div class="h-line bg-dark"></div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Booking Date</label>
                                <input type="date" class="form-control shadow-none">
                                <label class="form-label">Booking Time</label>
                                <input type="time" class="form-control shadow-none">
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                                <div>
                                    <label class="form-label">Number of Guests</label>
                                    <input type="number" class="form-control shadow-none">
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>

            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="restaurant_images/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-2 fw-bold">TableName 1</h5>
                            <p class="card-text"><small class="text-body-secondary">Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Explicabo, praesentium.</small>
                            </p>
                            <div class="guests">
                                <h6 class="mb-1 fw-bold">
                                    Guests
                                </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    4 (max)
                                </span>

                            </div>
                        </div>
                        <!-- <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>

                        </div> -->


                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <form class="reservation-form">
                                <input type="hidden" name="table_id" value="1">
                                <!-- Replace "1" with the actual table ID -->
                                <button type="button"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3 book-now-btn">Book
                                    Now</button>
                            </form>
                        </div>




                    </div>
                </div>

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="restaurant_images/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-2 fw-bold">TableName 2</h5>
                            <p class="card-text"><small class="text-body-secondary">Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Explicabo, praesentium.</small>
                            </p>
                            <div class="guests">
                                <h6 class="mb-1 fw-bold">
                                    Guests
                                </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                6 (max)
                                </span>

                            </div>
                        </div>
                        <!-- <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>

                        </div> -->

                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <form class="reservation-form">
                                <input type="hidden" name="table_id" value="2">
                                <!-- Replace "1" with the actual table ID -->
                                <button type="button"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3 book-now-btn">Book
                                    Now</button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="restaurant_images/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-2 fw-bold">TableName 3</h5>
                            <p class="card-text"><small class="text-body-secondary">Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Explicabo, praesentium.</small>
                            </p>
                            <div class="guests">
                                <h6 class="mb-1 fw-bold">
                                    Guests
                                </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                10 (max)
                                </span>

                            </div>
                        </div>
                        <!-- <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>

                        </div> -->

                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <form class="reservation-form">
                                <input type="hidden" name="table_id" value="3">
                                <!-- Replace "1" with the actual table ID -->
                                <button type="button"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3 book-now-btn">Book
                                    Now</button>
                            </form>
                        </div>



                    </div>
                </div>

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="restaurant_images/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-2 fw-bold">TableName 4</h5>
                            <p class="card-text"><small class="text-body-secondary">Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Explicabo, praesentium.</small>
                            </p>
                            <div class="guests">
                                <h6 class="mb-1 fw-bold">
                                    Guests
                                </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                15 (max)
                                </span>

                            </div>
                        </div>
                        <!-- <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>

                        </div> -->

                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <form class="reservation-form">
                                <input type="hidden" name="table_id" value="4">
                                <!-- Replace "1" with the actual table ID -->
                                <button type="button"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3 book-now-btn">Book
                                    Now</button>
                            </form>
                        </div>



                    </div>
                </div>

                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <img src="restaurant_images/1.jpg" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-2 fw-bold">TableName 5</h5>
                            <p class="card-text"><small class="text-body-secondary">Lorem, ipsum dolor sit amet
                                    consectetur adipisicing elit. Explicabo, praesentium.</small>
                            </p>
                            <div class="guests">
                                <h6 class="mb-1 fw-bold">
                                    Guests
                                </h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                20 (max)
                                </span>

                            </div>
                        </div>
                        <!-- <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>

                        </div> -->

                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <form class="reservation-form">
                                <input type="hidden" name="table_id" value="5">
                                <!-- Replace "1" with the actual table ID -->
                                <button type="button"
                                    class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3 book-now-btn">Book
                                    Now</button>
                            </form>
                        </div>




                    </div>
                </div>



            </div>

        </div>
    </div>

    <!-- Reservation Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel">Book Now</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="reservationForm">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="guests" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control" id="guests" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookingTime" class="form-label">Date</label>
                            <input type="date" class="form-control" id="bookingDate" required>
                        </div>

                        <div class="mb-3">
                            <label for="bookingTime" class="form-label">Booking Time</label>
                            <input type="time" class="form-control" id="bookingTime" required>
                        </div>

                        <button type="submit" class="btn btn-primary custom-submit-btn">Reserve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Add event listener to all "Book Now" buttons
            document.querySelectorAll('.book-now-btn').forEach(button => {
                button.addEventListener('click', function () {
                    // Open the reservation modal
                    $('#reservationModal').modal('show');
                });
            });

            // Handle form submission
            document.getElementById('reservationForm').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                // Retrieve form data
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const guests = document.getElementById('guests').value;
                const bookingTime = document.getElementById('bookingTime').value;
                const tableId = document.querySelector('.reservation-form input[name="table_id"]').value;

                // Here you can send the form data to your server using AJAX or any other method
                // For simplicity, let's just log the data to the console
                console.log('Name:', name);
                console.log('Email:', email);
                console.log('Phone Number:', phone);
                console.log('Number of Guests:', guests);
                console.log('Booking Time:', bookingTime);
                console.log('Table ID:', tableId);

                // Optionally, you can close the modal after form submission
                $('#reservationModal').modal('hide');
            });
        });
    </script>


    <!-- footer -->
    <?php require ('all/footer.php'); ?>



</body>

</html>