<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - profile</title>

    <?php require ('all/links.php'); ?>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        .user-info {
            margin-bottom: 30px;
        }

        .user-info h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .booking-history table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .booking-history th,
        .booking-history td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .booking-history th {
            background-color: #f2f2f2;
        }

        .booking-history tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-primary {
            background-color: #2ec1ac;
          
        }

        .btn-primary:hover {
            background-color: #279e8c;
           
        }
    </style>

</head>

<body class="bg-light">

    <!-- header -->
    <?php require ('<all/header.php'); ?>
    <div class="my-4 px-4">
        <h2 class="fw-bold h-font text-center">MY PROFILE</h2>

        <div class="h-line bg-dark"></div>

    </div>



    <div class="container">
        <!-- User Information -->
        <div class="user-info">
            
            <p><strong>Username:</strong> BristinaPrajapati</p>
            <p><strong>Email:</strong> bristinaprajapati@gmail.com</p>
            <p><strong>Phone:</strong> 9876543212</p>
            <!-- Change Password Form -->
            <form id="change-password-form">
            <h4 class="fw-bold">Change Password</h4>
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" class="form-control" id="current-password" required>
                </div>
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new-password" required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>
        <!-- Booking Histories -->
        <div class="booking-history">
            <h4 class="fw-bold">Booking Histories</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Table</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Booking history data will be dynamically populated here -->
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>









    <!-- footer -->
    <?php require ('all/footer.php'); ?>






</body>

</html>