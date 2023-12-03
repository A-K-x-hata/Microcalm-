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
    // Get the form data
    $quote = $_POST["quote"] ;
    $author = $_POST["author"];

$sql="INSERT INTO content (description,title,sector) values('$quote','$author','q')";
if ($connection->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}
}
?>




