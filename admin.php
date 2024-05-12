<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Table Management</title>
    <!-- Include necessary CSS and JavaScript files -->
    <?php require_once('inc/link.php'); ?>
    <link rel="stylesheet" href="admin.css"> 
    <style>
        /* Reset and General Styles */
     * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        h1, h2, h3 {
            color: #343a40;
            margin-bottom: 20px;
        }

        /* Form Styles */
        form {
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Table Styles */
        .table-item {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .table-item h3 {
            color: #343a40;
            margin-bottom: 10px;
        }

        .table-item p {
            color: #666;
            margin-bottom: 15px;
        }

        .delete-form {
            display: inline-block;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }

    </style>
</head>
<body class="bg-light">
    <!-- Include header -->
    <?php require_once('inc/header.php'); ?>
    
    <div class="container-fluid" id="main-content">
        <div class="row">
            <!-- Admin panel navigation menu -->
            <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
                <!-- Admin panel navigation links -->
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2 text-light">Admin Panel</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="users.php">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="admin.php">Table</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="settings.php">Settings</a>
                                </li>
                                <!-- Add more navigation links as needed -->
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            
            <!-- Main content area for table management -->
            <div class="col-lg-10 ms-auto overflow-hidden">
                <div class="container">
                    <h1>Add New Table</h1>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <label for="tableName">Table Name:</label>
                        <input type="text" id="tableName" name="tableName" required>
                        <br><br>
                        <label for="maxGuests">Maximum Guests:</label>
                        <input type="number" id="maxGuests" name="maxGuests" required>
                        <br><br>
                        <button type="submit" name="submit">Add Table</button>
                    </form>

                    <hr>

                    <h1>Existing Tables</h1>
                    <?php
                    // Include the essentials and database configuration files
                    require_once('inc/essentials.php');
                    require_once('inc/db_config.php');

                    // Check if $con (database connection) is set and valid
                    if ($con) {
                        // Display existing tables
                        $sql = "SELECT * FROM tables";
                        $result = $con->query($sql);

                        if ($result && $result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='table-item'>";
                                echo "<h3>" . htmlspecialchars($row['table_name']) . "</h3>";
                                echo "<p>Maximum Guests: " . $row['max_guests'] . "</p>";
                                echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post' class='delete-form'>";
                                echo "<input type='hidden' name='tableId' value='" . $row['id'] . "'>";
                                echo "<button type='submit' name='delete' class='delete-btn'>Delete Table</button>";
                                echo "</form>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No tables found</p>";
                        }

                        // Process form submission for adding a new table
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                            $tableName = filter_input(INPUT_POST, 'tableName', FILTER_SANITIZE_STRING);
                            $maxGuests = filter_input(INPUT_POST, 'maxGuests', FILTER_VALIDATE_INT);

                            if ($tableName && $maxGuests !== false) {
                                $sqlInsert = "INSERT INTO tables (table_name, max_guests) VALUES (?, ?)";
                                $stmt = $con->prepare($sqlInsert);
                                if ($stmt) {
                                    $stmt->bind_param("si", $tableName, $maxGuests);
                                    if ($stmt->execute()) {
                                        echo "<script>alert('Table added successfully');</script>";
                                        // Redirect to avoid form resubmission
                                        echo "<script>window.location.replace('{$_SERVER['PHP_SELF']}');</script>";
                                    } else {
                                        echo "Error: " . $stmt->error;
                                    }
                                    $stmt->close();
                                } else {
                                    echo "Error: " . $con->error;
                                }
                            } else {
                                echo "Invalid input data";
                            }
                        }

                        // Process form submission for deleting a table
                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                            $tableId = $_POST['tableId'];
                            $sqlDelete = "DELETE FROM tables WHERE id = ?";
                            $stmt = $con->prepare($sqlDelete);
                            if ($stmt) {
                                $stmt->bind_param("i", $tableId);
                                if ($stmt->execute()) {
                                    echo "<script>alert('Table deleted successfully');</script>";
                                    // Redirect to avoid form resubmission
                                    echo "<script>window.location.replace('{$_SERVER['PHP_SELF']}');</script>";
                                } else {
                                    echo "Error: " . $stmt->error;
                                }
                                $stmt->close();
                            } else {
                                echo "Error: " . $con->error;
                            }
                        }
                    } else {
                        echo "Database connection error";
                    }

                    // Close the database connection
                    if ($con) {
                        $con->close();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Include necessary scripts -->
    <?php require_once('inc/scripts.php'); ?>

</body>
</html>
