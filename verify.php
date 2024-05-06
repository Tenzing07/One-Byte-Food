<?php
session_start();

require_once "db_connection.php"; // Include the file that contains database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
    $verification_code = isset($_POST["verification_code"]) ? htmlspecialchars($_POST["verification_code"]) : '';

    // Validate form data
    if (empty($email) || empty($verification_code)) {
        echo "Email and verification code are required.";
        exit;
    }

    // Prepare SQL statement to verify the user based on email and verification code
    $sql = "SELECT id FROM user WHERE email = ? AND verification_code = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        exit;
    }

    $stmt->bind_param("ss", $email, $verification_code);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Verification successful, update user status and set session variables
        $row = $result->fetch_assoc();
        $user_id = $row["id"];

        $update_sql = "UPDATE user SET verified = 1 WHERE id = ?";
        $stmt_update = $conn->prepare($update_sql);

        if (!$stmt_update) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
            exit;
        }

        $stmt_update->bind_param("i", $user_id);
        
        if ($stmt_update->execute()) {
            $_SESSION['loggedin'] = true;
            header("Location: ../");
            exit;
        } else {
            echo "Error updating user status: " . $stmt_update->error;
        }
    } else {
        echo "Invalid verification code. Please try again.";
    }

    $stmt->close();
} else if ($_SERVER["REQUEST_METHOD"] != "POST")
 {
   echo "."; // Displayed if accessed directly without POST request
}
else{
    echo "invalid ";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8; /* Light gray background */
            color: #000; /* Black text */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh; /* Minimum height of viewport */
            box-sizing: border-box; /* Include padding in element's total width and height */
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff; /* White background for the container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center; /* Center align text content inside container */
            margin-top: 20px; /* Top margin for spacing */
        }

        h2 {
            color: #000;
            margin-bottom: 20px;
        }

        form {
            text-align: left; /* Left align form content */
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #000;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #333; /* Darker shade of black on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Email Verification</h2>
        <form action="verify.php" method="post">
            <input type="hidden" name="email" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>">
            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>


