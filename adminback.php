<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'microcalm';

$connection = new mysqli($hostname, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     $email = $connection->real_escape_string($_POST['email']);
    $password = $connection->real_escape_string($_POST['password']); 
    $sector = $connection->real_escape_string($_POST['sector']);
    $id = $connection->real_escape_string($_POST['id']);
    $name = $connection->real_escape_string($_POST['nam']);

    $sql = "INSERT INTO professional (info, password, sector,pid,name) VALUES ('$email', '$password', '$sector','$id','$name')";

    if ($connection->query($sql) === TRUE) {
        echo "Professional added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>
