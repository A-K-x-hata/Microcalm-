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
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define the upload directory
    $uploadDirectory = "movie_images/";

    // Retrieve form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $video=$_POST["link"];

    // File upload for movie image
    $movieimg = $_FILES["image"]["name"];
    $movietemp = $_FILES["image"]["tmp_name"];
    $moviepath = "images/" . $movieimg;
    

    // Move the uploaded file to the specified directory
    move_uploaded_file($movietemp, $moviepath);

   $sql="INSERT into content (title,description,image,sector,video) values ('$title','$description','$moviepath','m','$video')";
   if ($connection->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: moviecreator.html");
    exit();
}
?>
