<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8; /* Light gray background */
            color: #000; /* Black text */
            margin: 0;
            padding: 20px;
            box-sizing: border-box; /* Include padding in element's total width and height */
        }

        h2 {
            color: #000;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000; /* Black border for table cells */
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #000;
            color: #fff; /* White text for table header */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray background for even rows */
        }

        tr:hover {
            background-color: #ddd; /* Darker gray background on hover */
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .edit-button {
            padding: 8px 16px;
            background-color: #4CAF50; /* Green color for edit button */
            color: #fff;
            border: none;
            cursor: pointer;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modal-header, .modal-footer {
            text-align: right;
        }
    </style>
</head>
<body>
    <h2>User Details</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>

        <?php
        // Include db_config.php to establish database connection
        include('inc/db_config.php');

        // Check if $con (database connection) is valid
        if (!$con) {
            die("Database connection failed");
        }

        // SQL query to select id, name, email, address, and phone_number from the user table
        $sql = "SELECT id, name, email, address, phone_number FROM user";
        $result = mysqli_query($con, $sql);

        // Check if query was executed successfully
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        // Display the fetched data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td class='editable' data-field='name' data-id='" . $row['id'] . "'>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td class='editable' data-field='address' data-id='" . $row['id'] . "'>" . $row['address'] . "</td>";
            echo "<td class='editable' data-field='phone_number' data-id='" . $row['id'] . "'>" . $row['phone_number'] . "</td>";
            echo "<td><button class='edit-button' onclick='openEditModal(" . $row['id'] . ")'>Edit</button></td>";
            echo "</tr>";
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </table>

    <!-- Edit Modal -->
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

    <script>
        function openEditModal(userId) {
            const modal = document.getElementById('editModal');
            modal.style.display = 'block';

            // Fetch the editable fields for the selected user and populate the modal
            const editableFields = document.querySelectorAll('.editable[data-id="' + userId + '"]');
            const editForm = document.getElementById('editForm');
            editForm.innerHTML = ''; // Clear previous content

            editableFields.forEach(field => {
                const currentValue = field.innerText;
                const inputField = '<input type="text" value="' + currentValue + '" data-field="' + field.dataset.field + '"><br>';
                editForm.innerHTML += inputField;
            });

            // Store the user ID in a hidden input field inside the modal
            const hiddenInput = '<input type="hidden" id="editUserId" value="' + userId + '">';
            editForm.innerHTML += hiddenInput;
        }

        function closeEditModal() {
            const modal = document.getElementById('editModal');
            modal.style.display = 'none';
        }

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

            // Perform AJAX request to update the database with the new values
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_user.php', true);
            xhr.setRequestHeader('Content-type', 'application/json');
            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    alert('Changes saved successfully.');
                    closeEditModal();
                    // You may reload the page or update the table dynamically here
                } else {
                    alert('Failed to save changes. Please try again.');
                }
            };
            xhr.onerror = function() {
                alert('Failed to save changes. Please try again.');
            };
            xhr.send(JSON.stringify(data));
        }
    </script>
</body>
</html>
