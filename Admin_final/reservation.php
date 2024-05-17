<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if(isset($_GET['del'])) {
    handleDelete($_GET['del']);
}

// Function to delete a reservation
function handleDelete($id) {
    global $con;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if ($id !== false) {
        $q = "DELETE FROM `reservations` WHERE id=?";
        $stmt = $con->prepare($q);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            alert('success', 'Data deleted!');
        } else {
            alert('error', 'Operation Failed');
        }
    } else {
        alert('error', 'Invalid reservation ID');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Reservation</title>
    <?php require('inc/link.php');?>
</head>
<body class="bg-light">
    <?php require('inc/header.php');?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Reservations</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <!-- Add any additional buttons/actions here -->
                        </div>
                        <div class="table-responsive-md" style="height: 150px; overflow-y: scroll;">
                            <table class="table-hover border">
                                <thead class="sticky-top">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Table ID</th>
                                        <th scope="col" width="20%">Guests</th>
                                        <th scope="col"width="20%">Name</th>
                                        <th scope="col"width="20%">Email</th>
                                        <th scope="col"width="20%">Phone</th>
                                        <th scope="col">Booking Date</th>
                                        <th scope="col">Booking Time</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM `reservations` ORDER BY id DESC"; // Modify the query according to your database structure
                                    $result = $con->query($q);
                                    $i = 1;
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>{$row['table_id']}</td>";
                                        echo "<td>{$row['guests']}</td>";
                                        echo "<td>{$row['name']}</td>";
                                        echo "<td>{$row['email']}</td>";
                                        echo "<td>{$row['phone']}</td>";
                                        echo "<td>{$row['booking_date']}</td>";
                                        echo "<td>{$row['booking_time']}</td>";
                                        echo "<td>{$row['created_at']}</td>";
                                        echo "<td><a href='?del={$row['id']}' class='btn btn-sm rounded-pill btn-danger'>Delete</a></td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require("inc/scripts.php");?>
</body>
</html>
