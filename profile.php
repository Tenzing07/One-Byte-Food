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
        .btn-cancel {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }
        .btn-cancel:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body class="bg-light">
    <!-- header included -->
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
        <!-- Booking Histories -->
        <div class="booking-history">
            <h4 class="fw-bold">Booking Histories</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Table</th>
                        <th>Guests</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="bookingHistoryBody">
                  
                </tbody>
            </table>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Function to fetch user data and bookings
            function fetchUserDataAndBookings() {
                
                $.ajax({
                    type: 'GET',
                    url: 'fetch_user_data.php',
                    dataType: 'json',
                    success: function(userData) {
                        // Populate user profile information
                        $('#profileName').text(userData.name);
                        $('#profileEmail').text(userData.email);
                        $('#profilePhone').text(userData.phone);

                        // Fetch and populate booking history for the logged-in user
                        fetchBookingHistory();
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching user data:', error);
                        // Handle error gracefully (e.g., display an error message)
                    }
                });
            }

            // Function to fetch booking history and populate the table
            function fetchBookingHistory() {
                $.ajax({
                    type: 'GET',
                    url: 'fetch_booking_history.php',
                    dataType: 'json',
                    success: function(bookings) {
                        var tbody = $('#bookingHistoryBody');
                        tbody.empty(); // Clear existing rows

                        if (bookings.length > 0) {
                            // Populate booking history table
                            $.each(bookings, function(index, booking) {
                                var row = '<tr>' +
                                    '<td>' + booking.booking_date + '</td>' +
                                    '<td>' + booking.booking_time + '</td>' +
                                    '<td>' + booking.table_name + '</td>' +
                                    '<td>' + booking.guests + '</td>' +
                                    '<td><button class="btn-cancel" data-booking-id="' + booking.id + '">Cancel</button></td>' +
                                    '</tr>';
                                tbody.append(row);
                            });

                            // Attach click event handler to Cancel buttons
                            $('.btn-cancel').click(function() {
                                var bookingId = $(this).data('booking-id');

                                // Send DELETE request to cancel booking
                                $.ajax({
                                    type: 'DELETE',
                                    url: 'fetch_booking_history.php',
                                    contentType: 'application/json',
                                    data: JSON.stringify({ booking_id: bookingId }),
                                    success: function(response) {
                                        // Refresh booking history after cancellation
                                        fetchBookingHistory();
                                        alert('Booking canceled successfully');
                                    },
                                    error: function(xhr, status, error) {
                                        console.error('Error canceling booking:', error);
                                        alert('Failed to cancel booking');
                                    }
                                });
                            });
                        } else {
                            // Display message if no booking history found
                            var messageRow = '<tr><td colspan="5">No booking history found.</td></tr>';
                            tbody.append(messageRow);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching booking history:', error);
                        // Handle error gracefully (e.g., display an error message)
                    }
                });
            }

            // Call this function when the document is ready to fetch user data and bookings
            fetchUserDataAndBookings();
        });

    </script>
    <!-- Include footer -->
    <?php require_once 'all/footer.php'; ?>
</body>
</html>