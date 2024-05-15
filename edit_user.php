<?php
require('inc/essentials.php');
require('inc/db_config.php');

if(isset($_GET['id'])) {
    $userId = $_GET['id'];

    // Fetch user details from the database based on the user ID
    $q = "SELECT * FROM `user` WHERE id=?";
    $values = [$userId];
    // Add the data types for the prepared statement parameters ('i' for integer)
    $result = select($con, $q, $values, 'i');

    if(mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Handle form submission
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve updated user details from the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];

            // Update user details in the database
            $updateQuery = "UPDATE `user` SET name=?, email=?, phone_number=?, address=? WHERE id=?";
            $updateValues = [$name, $email, $phone_number, $address, $userId];
            // Adjust the update function call accordingly if it's similar to the select function
            if(update($updateQuery, $updateValues, 'ssssi')) {
                alert('success', 'User details updated successfully.');
                // Redirect back to the user list page or any other desired page
                header('Location: users.php');
                exit();
            } else {
                alert('error', 'Failed to update user details.');
            }
        }
    } else {
        alert('error', 'User not found.');
        // Redirect to an error page or any other desired page
        header('Location: error.php');
        exit();
    }
} else {
    alert('error', 'User ID not provided.');
    // Redirect to an error page or any other desired page
    header('Location: error.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <?php require('inc/link.php');?>
</head>
<body class="bg-light">
    <?php require('inc/header.php');?>
    <div class="container-fluid" id ="main-content">
        <div class="row">
            <div class="col-lg-6 mx-auto p-4">
                <h3 class="mb-4">Edit User</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="<?php echo $user['phone_number']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required><?php echo $user['address']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php');?>
</body>
</html>