<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - Tables</title>
    <?php require ('all/links.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .custom-submit-btn {
            background-color: #2ec1ac !important;
            width: 100%;
        }
        .custom-submit-btn:hover {
            background-color: #279e8c !important;
        }
    </style>
</head>
<body class="bg-light">

<!-- Header -->
<?php require ('all/header.php'); ?>




<div class="container mt-5">
    <h2 class="fw-bold text-center mb-4">OUR TABLES</h2>
    <div class="row">
        <?php
        // Include database connection
        require_once 'all/db_connection.php';

        // Fetch tables from the database
        $sql = "SELECT * FROM tables";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tableName = $row['table_name'];
                $maxGuests = $row['max_guests'];
                $tableId = $row['id'];

                // Generate HTML for each table entry
                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '<div class="card border-0 shadow">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title fw-bold">' . $tableName . '</h5>';
                echo '<p class="card-text">Maximum Guests: ' . $maxGuests . '</p>';
                echo '<button type="button" class="btn btn-sm w-100 text-white custom-submit-btn reserve-btn" 
                        data-table-name="' . $tableName . '" data-max-guests="' . $maxGuests . '" 
                        data-table-id="' . $tableId . '">Reserve Now</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p>No tables found.</p></div>';
        }
        ?>
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
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="bookingDate">Date</label>
                        <input type="date" class="form-control" id="bookingDate" name="bookingDate" required>
                    </div>
                    <div class="form-group">
                        <label for="bookingTime">Booking Time</label>
                        <input type="time" class="form-control" id="bookingTime" name="bookingTime" required>
                    </div>
                    <input type="hidden" id="tableIdModal" name="tableId">
                    <button type="submit" class="btn btn-primary custom-submit-btn">Reserve</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom Script -->
<script>
    $(document).ready(function() {
        // Handle reserve button click
        $(document).on('click', '.reserve-btn', function() {
            var tableName = $(this).data('table-name');
            var maxGuests = $(this).data('max-guests');
            var tableId = $(this).data('table-id');

            $('#maxGuestsModal').text(maxGuests);
            $('#tableIdModal').val(tableId);
            $('#reservationModal').modal('show');
        });

        // Handle form submission
        $('#reservationForm').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: 'reserve_table.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        alert('Reservation successfully made!');
                        $('#reservationForm')[0].reset();
                        $('#reservationModal').modal('hide');
                    } else {
                        alert('Error: ' + response.error);
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error making reservation. Please try again.');
                    console.log(error);
                }
            });
        });
    });
</script>

<!-- Include Bootstrap JS (Ensure it's included after jQuery) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
