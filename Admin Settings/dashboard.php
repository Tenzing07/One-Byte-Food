<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/link.php'); ?>
    <style>
        /* Custom Styles for Boxes */
        .card {
            background-color: #f0f6f4; /* Light blue-gray */
            border: 1px solid #c5d1cb; /* Light gray */
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            padding: 20px;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .card h6 {
            font-size: 24px; /* Increased font size */
            margin-bottom: 15px;
            color: #333; /* Dark gray */
        }

        .card p {
            font-size: 32px; /* Increased font size */
            font-weight: bold;
            margin: 0;
            color: #555; /* Dark gray */
        }

        .card.total-users {
            background-color: #ffe6cc; /* Light orange */
        }

        .card.total-reservations {
            background-color: #cce5ff; /* Light blue */
        }

        .card.reviews {
            background-color: #ffd8d8; /* Light red */
        }

        .card.remaining-tables {
            background-color: #e0e0e0; /* Light gray */
        }

        .badge {
            font-size: 14px;
        }
    </style>
</head>
<body class="bg-light">
    <?php require('inc/header.php'); ?>
    
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto overflow-hidden">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3>DASHBOARD</h3> 
                </div>

                <!-- Section for Table Reservations, Reviews, Total Users and Contact Information -->
                <div class="row mb-4">
                    <div class="col-md-3 mb-4">
                        <a href="#">
                            <div class="card text-center p-3 total-users">
                                <h6>Total Users</h6>
                                <p><?php echo getRowCount('user'); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="#">
                            <div class="card text-center p-3 total-reservations">
                                <h6>Total Reservations</h6>
                                <p><?php echo getRowCount('reservations'); ?></p>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 mb-4">
                        <a href="user_queries.php">
                            <div class="card text-center p-3 reviews">
                                <h6>Reviews</h6>
                                <p><?php echo getRowCount('contact'); ?></p>
                            </div>
                        </a>
                    </div> 
                    <div class="col-md-3 mb-4">
                        <a href="#">
                            <div class="card text-center p-3 remaining-tables">
                                <h6>Remaining tables</h6>
                                <p><?php echo getRowCount('tables'); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require('inc/scripts.php'); ?>

    <?php
    // Function to get row count from a table
    function getRowCount($tableName) {
        // Replace with your database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "one-byte-food";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query to get row count
        $sql = "SELECT COUNT(*) AS count FROM $tableName";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row["count"];
        } else {
            return 0;
        }

        $conn->close();
    }
    ?>
</body>
</html>
