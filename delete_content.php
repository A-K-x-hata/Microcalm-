<?php
// Assuming this file is delete_content.php

// Replace the database connection details
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "microcalm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the CID is provided in the request
if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM content WHERE cid = ?");
    $stmt->bind_param("i", $cid);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Content with CID $cid deleted successfully!";
    } else {
        echo "Error deleting content: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "CID not provided in the request.";
}

// Close connection
$conn->close();
?>
