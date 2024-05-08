<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - Profile</title>

    <?php require_once 'all/links.php'; ?>

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

    <!-- Include header -->
    <?php require_once 'all/header.php'; ?>

    <div class="my-4 px-4">
        <h2 class="fw-bold h-font text-center">MY PROFILE</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <!-- User Information -->
        <div class="user-info">
            <h3>User Information</h3>
            <p><strong>Name:</strong> <span id="profileName"></span></p>
            <p><strong>Email:</strong> <span id="profileEmail"></span></p>
            <p><strong>Phone:</strong> <span id="profilePhone"></span></p>
        </div>

        <!-- Change Password Form (if needed) -->
        <!-- You can include the change password form here -->

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

    <!-- Include necessary JavaScript files -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Fetch user data using AJAX
            $.ajax({
                type: 'GET',
                url: 'fetch_user_data.php',
                dataType: 'json',
                success: function(data) {
                    // Populate user profile information
                    $('#profileName').text(data.name);
                    $('#profileEmail').text(data.email);
                    $('#profilePhone').text(data.phone);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching user data:', error);
                    // Handle error gracefully (e.g., display an error message)
                }
            });
        });
    </script>

    <!-- Include footer -->
    <?php require_once 'all/footer.php'; ?>

</body>

</html>
