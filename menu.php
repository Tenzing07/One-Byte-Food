<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - menu</title>

    <?php require ('all/links.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .box {
            border-top-color: #2ec1ac !important;
        }


        .container {
            padding-left: 20px;
            padding-right: 20px;
        }

        /* Media query for smaller devices */
        @media (max-width: 375px) {

            .swiper-button-next,
            .swiper-button-prev {
                font-size: 10px;
                /* Adjust the font size for smaller devices */
            }
        }



        /* Custom CSS styles */
        .menu-list {
            list-style: none;
            padding: 0;
        }

        .food-item {
            cursor: pointer;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between; /* Align food names to left and prices to right */
            align-items: center;
        }


        .food-item:hover {
            text-decoration: underline;
        }

        /* Style for the modal */
        .food-image {
            max-width: 100%;
            height: auto;
        }
        .menu-category {
            margin-bottom: 40px;
        }

    </style>
</head>

<body class="bg-light">

   <!-- header -->
   <?php require ('all/header.php'); ?>
    <div class="my-4 px-4">
        <h2 class="fw-bold h-font text-center">OUR MENU</h2>

        <div class="h-line bg-dark"></div>

    </div>


    <div class="container mt-5 shadow p-5">

        <!-- Appetizers -->
        <div class="menu-category">
            <h3>Appetizers</h3>
            <ul class="menu-list">
                <li class="food-item" data-img="bruschetta.jpg" data-price="200">
                    <span class="food-name">Bruschetta</span>
                    <span class="food-price ms-3">Rs. 200</span>
                </li>
                <li class="food-item" data-img="caprese_salad.jpg" data-price="250">
                    <span class="food-name">Caprese Salad</span>
                    <span class="food-price ms-3">Rs. 250</span>
                </li>
                <li class="food-item" data-img="spring_rolls.jpg" data-price="180">
                    <span class="food-name">Spring Rolls</span>
                    <span class="food-price ms-3">Rs. 180</span>
                </li>
                <li class="food-item" data-img="garlic_bread.jpg" data-price="150">
                    <span class="food-name">Garlic Bread</span>
                    <span class="food-price ms-3">Rs. 150</span>
                </li>
                <li class="food-item" data-img="stuffed_mushrooms.jpg" data-price="220">
                    <span class="food-name">Stuffed Mushrooms</span>
                    <span class="food-price ms-3">Rs. 220</span>
                </li>
            </ul>
        </div>

        <!-- Lunch -->
        <div class="menu-category">
            <h3>Lunch</h3>
            <ul class="menu-list">
                <li class="food-item" data-img="grilled_chicken_sandwich.jpg" data-price="350">
                    <span class="food-name">Grilled Chicken Sandwich</span>
                    <span class="food-price ms-3">Rs. 350</span>
                </li>
                <li class="food-item" data-img="veggie_burger.jpg" data-price="300">
                    <span class="food-name">Veggie Burger</span>
                    <span class="food-price ms-3">Rs. 300</span>
                </li>
                <li class="food-item" data-img="margherita_pizza.jpg" data-price="400">
                    <span class="food-name">Margherita Pizza</span>
                    <span class="food-price ms-3">Rs. 400</span>
                </li>
                <li class="food-item" data-img="spaghetti_carbonara.jpg" data-price="380">
                    <span class="food-name">Spaghetti Carbonara</span>
                    <span class="food-price ms-3">Rs. 380</span>
                </li>
                <li class="food-item" data-img="chicken_caesar_salad.jpg" data-price="320">
                    <span class="food-name">Chicken Caesar Salad</span>
                    <span class="food-price ms-3">Rs. 320</span>
                </li>
            </ul>
        </div>

        <!-- Snacks -->
        <div class="menu-category">
            <h3>Snacks</h3>
            <ul class="menu-list">
                <li class="food-item" data-img="french_fries.jpg" data-price="120">
                    <span class="food-name">French Fries</span>
                    <span class="food-price ms-3">Rs. 120</span>
                </li>
                <li class="food-item" data-img="onion_rings.jpg" data-price="150">
                    <span class="food-name">Onion Rings</span>
                    <span class="food-price ms-3">Rs. 150</span>
                </li>
                <li class="food-item" data-img="popcorn.jpg" data-price="100">
                    <span class="food-name">Popcorn</span>
                    <span class="food-price ms-3">Rs. 100</span>
                </li>
                <li class="food-item" data-img="nachos.jpg" data-price="200">
                    <span class="food-name">Nachos</span>
                    <span class="food-price ms-3">Rs. 200</span>
                </li>
                <li class="food-item" data-img="mozzarella_sticks.jpg" data-price="250">
                    <span class="food-name">Mozzarella Sticks</span>
                    <span class="food-price ms-3">Rs. 250</span>
                </li>
            </ul>
        </div>

        <!-- Nepali Food -->
        <div class="menu-category">
            <h3>Nepali Food</h3>
            <ul class="menu-list">
                <li class="food-item" data-img="dal_bhat.jpg" data-price="200">
                    <span class="food-name">Dal Bhat (Lentil Soup with Rice)</span>
                    <span class="food-price ms-3">Rs. 200</span>
                </li>
                <li class="food-item" data-img="momos.jpg" data-price="180">
                    <span class="food-name">Momos (Dumplings)</span>
                    <span class="food-price ms-3">Rs. 180</span>
                </li>
                <li class="food-item" data-img="thukpa.jpg" data-price="220">
                    <span class="food-name">Thukpa (Noodle Soup)</span>
                    <span class="food-price ms-3">Rs. 220</span>
                </li>
                <li class="food-item" data-img="aloo_tama.jpg" data-price="250">
                    <span class="food-name">Aloo Tama (Potato and Bamboo Shoot Curry)</span>
                    <span class="food-price ms-3">Rs. 250</span>
                </li>
                <li class="food-item" data-img="sel_roti.jpg" data-price="150">
                    <span class="food-name">Sel Roti (Sweet Fried Bread)</span>
                    <span class="food-price ms-3">Rs. 150</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Popup modal -->
    <div class="modal" id="foodModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="foodModalLabel">Food Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" class="food-image img-fluid" alt="Food Image">
                    <p class="food-price-modal">Price: Rs. <span></span></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // JavaScript for handling popup modal
        document.addEventListener("DOMContentLoaded", function () {
            const foodItems = document.querySelectorAll(".food-item");

            foodItems.forEach(function (item) {
                item.addEventListener("click", function () {
                    const foodModal = document.getElementById("foodModal");
                    const foodImage = foodModal.querySelector(".food-image");
                    const foodPrice = foodModal.querySelector(".food-price-modal span");

                    foodImage.src = item.dataset.img;
                    foodPrice.textContent = item.dataset.price;

                    const foodName = item.querySelector(".food-name").textContent;
                    document.getElementById("foodModalLabel").textContent = foodName;

                    const modal = new bootstrap.Modal(foodModal);
                    modal.show();
                });
            });
        });

    </script>



    <!-- footer -->
    <?php require ('all/footer.php'); ?>

    <!-- Swiper JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script> -->


    <!-- <script>
        // JavaScript for handling popup modal
        document.addEventListener("DOMContentLoaded", function () {
            const foodItems = document.querySelectorAll(".food-item");

            foodItems.forEach(function (item) {
                item.addEventListener("click", function () {
                    const foodModal = document.getElementById("foodModal");
                    const foodImage = foodModal.querySelector(".food-image");
                    const foodPrice = foodModal.querySelector(".food-price-modal span");

                    foodImage.src = item.dataset.img;
                    foodPrice.textContent = item.dataset.price;

                    const foodName = item.querySelector(".food-name").textContent;
                    document.getElementById("foodModalLabel").textContent = foodName;

                    const modal = new bootstrap.Modal(foodModal);
                    modal.show();
                });
            });
        });

    </script>

 -->

</body>

</html>