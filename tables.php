<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Byte Foods - Tables</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS styles */
        .custom-submit-btn {
            background-color: #2ec1ac !important;
            width: 100%;
        }
        .custom-submit-btn:hover {
            background-color: #279e8c !important;
        }
        .btn-booked {
            background-color: #ccc !important;
            cursor: not-allowed;
        }
    </style>
</head>
<body class="bg-light">

<!-- Header -->
<?php require_once 'all/header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="mb-4">Check Booking Availability</h5>
            <form id="availabilityForm">
                <div class="row align-items-end">
                    <div class="col-lg-4 mb-3">
                        <label class="form-label" style="font-weight: 500;">Booking Date</label>
                        <input type="date" class="form-control shadow-none" id="bookingDate" name="bookingDate" required>
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-label" style="font-weight: 500;">Time</label>
                        <input type="time" class="form-control shadow-none" id="bookingTime" name="bookingTime" required>
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">People</label>
                        <select class="form-select shadow-none" id="numberOfPeople" name="numberOfPeople" required>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            <option value="4">Four</option>
                            <option value="5">Five</option>
                            <option value="6">Six</option>
                            <option value="7">Seven</option>
                            <option value="8">Eight</option>
                            <option value="9">Nine</option>
                            <option value="10">Ten</option>
                        </select>
                    </div>
                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn text-white shadow-none custom-submit-btn">Check</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <h2 class="fw-bold text-center my-4">OUR TABLES</h2>
    <div class="row" id="tablesContainer">
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

                // Check if the table is already booked
                $isBooked = false;

                // Query to check if there's an existing reservation for this table
                $reservationSql = "SELECT COUNT(*) as count FROM reservations WHERE table_id = $tableId";
                $reservationResult = $conn->query($reservationSql);

                if ($reservationResult->num_rows > 0) {
                    $reservationData = $reservationResult->fetch_assoc();
                    if ($reservationData['count'] > 0) {
                        $isBooked = true; // Set as booked if there's at least one reservation
                    }
                }

                // Generate HTML for each table entry
                echo '<div class="col-lg-4 col-md-6 mb-4">';
                echo '<div class="card border-0 shadow">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title fw-bold">' . $tableName . '</h5>';
                echo '<p class="card-text">Maximum Guests: ' . $maxGuests . '</p>';

                if ($isBooked) {
                    echo '<button type="button" class="btn btn-sm w-100 text-white btn-booked" disabled>Booked</button>';
                } else {
                    echo '<button type="button" class="btn btn-sm w-100 text-white custom-submit-btn reserve-btn" 
                            data-table-name="' . $tableName . '" data-max-guests="' . $maxGuests . '" 
                            data-table-id="' . $tableId . '">Reserve Now</button>';
                }

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<div class="col-12 text-center"><p>No tables found.</p></div>';
        }

        // Close database connection
        $conn->close();
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle availability form submission
        $('#availabilityForm').submit(function(e) {
            e.preventDefault();

            var formData = {
                bookingDate: $('#bookingDate').val(),
                bookingTime: $('#bookingTime').val(),
                numberOfPeople: $('#numberOfPeople').val()
            };

            // Perform AJAX request to check availability and filter tables
            $.ajax({
                type: 'POST',
                url: 'check_availability.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response && response.length > 0) {
                        // Clear existing table cards
                        $('#tablesContainer').empty();

                        // Append table cards for available tables
                        response.forEach(function(table) {
                            var cardHtml = `
                                <div class="col-lg-4 col-md-6 mb-4">
                                    <div class="card border-0 shadow">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold">${table.tableName}</h5>
                                            <p class="card-text">Maximum Guests: ${table.maxGuests}</p>
                                            <button type="button" class="btn btn-sm w-100 text-white ${
                                                table.isBooked ? 'btn-booked' : 'custom-submit-btn reserve-btn'
                                            }" data-table-id="${table.tableId}" ${
                                                table.isBooked ? 'disabled' : ''
                                            }>
                                                ${table.isBooked ? 'Booked' : 'Reserve Now'}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            `;
                            $('#tablesContainer').append(cardHtml);
                        });
                    } else {
                        // No available tables found
                        $('#tablesContainer').html('<div class="col-12 text-center"><p>No tables available.</p></div>');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    alert('Error checking availability. Please try again.');
                }
            });
        });

        // Handle reserve button click (delegated event)
        $(document).on('click', '.reserve-btn', function() {
            var tableId = $(this).data('table-id');
            // Implement reservation functionality here (e.g., show reservation modal)
            $('#reservationModal').modal('show');
            $('#tableIdModal').val(tableId); // Set the table ID in the hidden field
        });

        // Handle reservation form submission
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

                        // Update button to "Booked" after successful reservation
                        var tableId = $('#tableIdModal').val();
                        $('.reserve-btn[data-table-id="' + tableId + '"]').removeClass('custom-submit-btn')
                            .addClass('btn-booked')
                            .text('Booked')
                            .prop('disabled', true);
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

</body>
</html>
