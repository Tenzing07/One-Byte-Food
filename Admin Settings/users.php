<?php
// Include essentials and perform admin login check
require_once('inc/essentials.php');
adminLogin();

// Include database configuration
require_once('inc/db_config.php');

// Check if an AJAX request to fetch user details is made
if(isset($_POST['get_users'])) {
    $users = array();

    // SQL query to select user details from the database
    $sql = "SELECT id, name, email, address, phone_number FROM user";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Fetch user details and store them in an array
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }

    // Return user details as JSON response
    echo json_encode($users);
    exit; // Stop further execution
}

// Check if an AJAX request to delete a user is made
if(isset($_POST['delete_user'])) {
    $userId = $_POST['user_id'];

    // SQL query to delete user from the database
    $sql = "DELETE FROM user WHERE id = $userId";
    $result = mysqli_query($con, $sql);

    // Check if the deletion was successful
    if ($result) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Users</title>
    <!-- Include necessary CSS and JavaScript files -->
    <?php require_once('inc/link.php'); ?>
    <style>
        .delete-button {
            background-color: red; /* Set background color to red */
            color: white; /* Set text color to white */
            border: none; /* Remove border */
            padding: 5px 10px; /* Add padding */
            cursor: pointer; /* Change cursor to pointer on hover */
        }

        /* Optional: Add hover effect */
        .delete-button:hover {
            background-color: darkred; /* Darken background color on hover */
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
                <!-- Admin panel navigation links -->
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
            
            <!-- Main content area for user details -->
            <div class="col-lg-10 ms-auto overflow-hidden">
                <h3 class="mb-4">User Details</h3>

                <!-- User table to display user details -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        <!-- User details will be loaded dynamically here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Modal (for editing user details) -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="modal-header">
                <button onclick="closeEditModal()">&times;</button>
            </span>
            <h3>Edit User Details</h3>
            <div id="editForm"></div>
            <div class="modal-footer">
                <button onclick="saveChanges()">Save Changes</button>
            </div>
        </div>
    </div>

    <!-- Include necessary scripts -->
    <?php require_once('inc/scripts.php'); ?>

    <script>
        // Function to fetch and display user details
        function getUsers() {
            const userTableBody = document.getElementById('user-table-body');

            // Make an AJAX request to fetch user details
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'users.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
           
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const users = JSON.parse(xhr.responseText);

                    // Clear existing table rows
                    userTableBody.innerHTML = '';

                    // Populate the table with user details
                    users.forEach(user => {
                        const row = `
                            <tr>
                                <td>${user.id}</td>
                                <td class="editable" data-field="name" data-id="${user.id}">${user.name}</td>
                                <td>${user.email}</td>
                                <td class="editable" data-field="address" data-id="${user.id}">${user.address}</td>
                                <td class="editable" data-field="phone_number" data-id="${user.id}">${user.phone_number}</td>
                                <td>
                                    <button class="edit-button" onclick="openEditModal(${user.id})">Edit</button>
                                    <button class="delete-button" onclick="deleteUser(${user.id})">Delete</button>
                                </td>
                            </tr>
                        `;
                        userTableBody.innerHTML += row;
                    });
                } else {
                    console.error('Failed to fetch user details.');
                }
            };

            xhr.send('get_users'); // Send the request to fetch users
        }

        // Function to delete a user
        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                // Make an AJAX request to delete the user
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'users.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert('User deleted successfully.');
                            getUsers(); // Refresh user details after deleting
                        } else {
                            alert('Failed to delete user. Please try again.');
                        }
                    } else {
                        alert('Failed to delete user. Please try again.');
                    }
                };
                xhr.send(`delete_user=true&user_id=${userId}`);
            }
        }

        // Function to open the edit modal with user details
        function openEditModal(userId) {
            const modal = document.getElementById('editModal');
            modal.style.display = 'block';

            // Fetch the editable fields for the selected user and populate the modal
            const editableFields = document.querySelectorAll(`.editable[data-id="${userId}"]`);
            const editForm = document.getElementById('editForm');
            editForm.innerHTML = '';

            editableFields.forEach(field => {
                const currentValue = field.innerText;
                const inputField = `<input type="text" value="${currentValue}" data-field="${field.dataset.field}"><br>`;
                editForm.innerHTML += inputField;
            });

            // Store the user ID in a hidden input field inside the modal
            const hiddenInput = `<input type="hidden" id="editUserId" value="${userId}">`;
            editForm.innerHTML += hiddenInput;
        }

        // Function to close the edit modal
        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

        // Function to save changes to user details
        function saveChanges() {
            const userId = document.getElementById('editUserId').value;
            const inputFields = document.querySelectorAll('#editForm input');

            const data = {
                id: userId,
                fields: {}
            };

            inputFields.forEach(input => {
                const fieldName = input.dataset.field;
                const fieldValue = input.value;
                data.fields[fieldName] = fieldValue;
            });

            // Perform AJAX request to update user details in the database
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_user.php', true);
            xhr.setRequestHeader('Content-Type', 'application/json');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Changes saved successfully.');
                        closeEditModal();
                        getUsers(); // Refresh user details after saving changes
                    } else {
                        alert('Failed to save changes. Please try again.');
                    }
                } else {
                    alert('Failed to save changes. Please try again.');
                }
            };

            xhr.onerror = function() {
                alert('Failed to save changes. Please try again.');
            };

            xhr.send(JSON.stringify(data)); // Send the request to update user details
         }


        // Load user details when the page is fully loaded
        window.onload = function() {
            getUsers();
        };
    </script>
</body>
</html>
