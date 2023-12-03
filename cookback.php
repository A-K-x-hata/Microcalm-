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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["dishName"];
    $description = $_POST["chefsNote"];
    $ing = $_POST["ingredients"];
    $steps = $_POST["cookingSteps"];

    // Validate and handle the uploaded image
    if (isset($_FILES["dishImage"])) {
        $filename = $_FILES["dishImage"]["name"];
        $tempname = $_FILES["dishImage"]["tmp_name"];
        $folder = "images/" . $filename;

        // Move the uploaded file to the destination folder
        if (move_uploaded_file($tempname, $folder)) {
            echo "File uploaded successfully";
        } else {
            echo "Error uploading file";
        }
    }

    // Use prepared statement to prevent SQL injection
    $sql = "INSERT INTO content (title, description, image, ing, steps, sector) VALUES (?, ?, ?, ?, ?, 'c')";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("sssss", $title, $description, $folder, $ing, $steps);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$connection->close();
?>
