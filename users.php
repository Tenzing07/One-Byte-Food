<?php
// Include db_config.php to establish database connection
include('inc/db_config.php');

// Check if $con (database connection) is valid
if (!$con) {
    die("Database connection failed");
}

// SQL query to select id, name, email, and address from the user table
$sql = "SELECT id, name, email, address FROM user";
$result = mysqli_query($con, $sql);

// Check if query was executed successfully
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Display the fetched data
echo "<h2>User Details</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Close the database connection (optional if included in db_config.php)
mysqli_close($con);
?>
