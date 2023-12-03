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

    // Retrieve form data
    $title = $_POST["yogaName"];
    $description = $_POST["benefits"];
    $video=$_POST["videoLink"];

    // File upload for movie image
    $yogaimg = $_FILES["imageUpload"]["name"];
    $yogatemp = $_FILES["imageUpload"]["tmp_name"];
    $yogapath = "images/" . $yogaimg;
    

    // Move the uploaded file to the specified directory
    move_uploaded_file($yogatemp, $yogapath);

   $sql="INSERT into content (title,description,image,sector,video) values ('$title','$description','$yogapath','y','$video')";
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
