<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - Tables</title>
    <?php require ('all/links.php'); ?>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->

    <style>
        .custom-submit-btn {
            background-color: #2ec1ac !important;
            width: 100%;
        }
        .custom-submit-btn:hover {
            background-color: #279e8c !important;
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
</div>

<!-- Reservation Modal -->
<div class="modal fade" id="reservationModal" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reservationModalLabel">Reserve Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="reservationForm">
                    <div class="form-group">
                        <label for="guests">Number of Guests (Max: <span id="maxGuestsModal"></span>)</label>
                        <input type="number" class="form-control" id="guests" name="guests" required>
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
                                    2 - 4
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark rounded-0 fw-bold shadow-none">More
                                details</a>

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
                                    2 - 4
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark rounded-0 fw-bold shadow-none">More
                                details</a>

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
                                    2 - 4
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark rounded-0 fw-bold shadow-none">More
                                details</a>

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
                                    2 - 4
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark rounded-0 fw-bold shadow-none">More
                                details</a>

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
                                    2 - 4
                                </span>

                            </div>
                        </div>
                        <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-3">Book Now</a>
                            <a href="#" class="btn btn-sm w-100 btn-outline-dark rounded-0 fw-bold shadow-none">More
                                details</a>

                        </div>
                    </div>
                    <input type="hidden" id="tableIdModal" name="tableId">
                    <button type="submit" class="btn btn-primary custom-submit-btn">Reserve</button>
                </form>
            </div>
        </div>
    </div>
</div>



    <!-- footer -->
    <?php require ('all/footer.php'); ?>



</body>
</html>
