<?php
// Database connection information
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

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user and password from the form
    $user = $connection->real_escape_string($_POST['user']);
    $pass = $connection->real_escape_string($_POST['pass']);
    $i=1;
    $ii='U';
    // Sanitize and validate the data
    if (strlen($pass) < 8) {
        header('Location:length.html');
    } else {
        // Check if the username or email already exists in the database
        $checkQuery = "SELECT * FROM register WHERE info = '$user'";
        $checkResult = $connection->query($checkQuery);

        if ($checkResult->num_rows > 0) {
            header('Location: exists.html');
             exit;

        } else {
            $maxUserIdQuery = "SELECT MAX(userid) AS maxUserId FROM register";
            $maxUserIdResult = $connection->query($maxUserIdQuery);
            $row = $maxUserIdResult->fetch_assoc();
            $maxUserId = $row['maxUserId'];

            // Increment the userid for the new user
            $i = $maxUserId + 1;

            $sql = "INSERT INTO register (info, password,userid,id) VALUES ('$user', '$pass','$i','$ii')";
           

            if ($connection->query($sql) === TRUE) {
                echo "Registration successful!";
            } else {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
        }
    }

    if (isset($error_message)) {
        echo '<script>var errorMessage = "' . $error_message . '";</script>';
    }

    // Close the database connection
    $connection->close();
}
?>
