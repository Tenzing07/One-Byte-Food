<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();

if(isset($_GET['del'])) {
    handleDelete($_GET['del']);
}

if (isset($_GET['edit'])) {
    // Handle the edit functionality here
    // For example, you can redirect to an edit page with the user ID ($_GET['edit']) in the URL
    $editUserId = $_GET['edit'];
    header("Location: edit_user.php?id=$editUserId");
    exit();
}

// Function to delete a user
function handleDelete($id) {
    global $con;
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if ($id !== false) {
        $q = "DELETE FROM `user` WHERE id=?";
        $values = [$id];
        if (delete($q, $values, 'i')) {
            alert('success', 'Data deleted!');
        } else {
            alert('error', 'Operation Failed');
        }
    } else {
        alert('error', 'Invalid user ID');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Users</title>
    <?php require('inc/link.php');?>
</head>
<body class="bg-light">
    <?php require('inc/header.php');?>
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Users</h3>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"width="20%">Phone Number</th>
                                        <th scope="col"width="20%">Address</th>
                                        <th scope="col"width="20%">Date of Birth</th>
                                        <th scope="col"width="20%">Created At</th>
                                        <!-- Add more headers if needed -->
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $q = "SELECT * FROM `user` ORDER BY id DESC"; // Modify the query according to your database structure
                                    $data = mysqli_query($con,$q);
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($data)) {
                                        $actions = "<a href='?edit=$row[id]' class='btn btn-sm rounded-pill btn-primary'>Edit</a> ";
                                        $actions .= "<a href='?del=$row[id]' class='btn btn-sm rounded-pill btn-danger'>Delete</a>";
                                        echo "<tr>";
                                        echo "<td>$i</td>";
                                        echo "<td>$row[name]</td>";
                                        echo "<td>$row[email]</td>";
                                        echo "<td>$row[phone_number]</td>";
                                        echo "<td>$row[address]</td>";
                                        echo "<td>$row[date_of_birth]</td>";
                                        echo "<td>$row[created_at]</td>";
                                        // Add more columns if needed
                                        echo "<td>$actions</td>";
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