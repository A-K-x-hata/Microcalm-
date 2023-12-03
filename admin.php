<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'microcalm';

// Create a database connection
$connection = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $adminId = $_POST['id'];
    $ii = 'A';

    $sql = "INSERT INTO register(info, password, userid, id, name) VALUES (?, ?, ?, ?, ?)";
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bind_param('ssiss', $email, $password, $adminId, $ii, $name);

    if ($stmt->execute()) {
        // Admin added successfully
        echo 'Admin added successfully.';
    } else {
        // Error adding admin
        echo 'Error adding admin: ' . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $connection->close();
}
?>
