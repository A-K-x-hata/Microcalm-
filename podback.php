<?php
$image_name = $_FILES["podcast_image"]["name"];
$temp_image = $_FILES["podcast_image"]["tmp_name"];
$image_path = "combined/" . $image_name;
move_uploaded_file($temp_image, $image_path);

// File upload for podcast audio
$audio_name = $_FILES["podcast_audio"]["name"];
$temp_audio = $_FILES["podcast_audio"]["tmp_name"];
$audio_path = "combined/" . $audio_name;
move_uploaded_file($temp_audio, $audio_path);

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST["podcaster_name"];
    $description = $_POST["podcast_description"];

    // Prepare the SQL statement
    $sql = "INSERT INTO content (title, description, image, video,sector) VALUES ('$title', '$description', '$image_path', '$audio_path','p')";

    // Execute the query
    if ($connection->query($sql) === TRUE) {
        echo "Podcast inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();
?>
