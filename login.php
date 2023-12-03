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

// Fetch username and password from GET data
if (isset($_GET['user']) && isset($_GET['pass'])) {
    $username = $connection->real_escape_string($_GET['user']);
    $password = $connection->real_escape_string($_GET['pass']);

    // Check for admin login
    $sqln = "SELECT * FROM register WHERE info = '$username' AND password = '$password' and id='A'";
    $resultn = $connection->query($sqln);

        if ($resultn->num_rows == 1) {
            // Admin login successful
            $row = $resultn->fetch_assoc();
            $name = $row['name'];
            // Encode the name to include it in the URL
            $encodedName = urlencode($name);
            header("Location: header.php?name=$encodedName");
            exit();
        }
    

    // Check for professional login
    $sqlp = "SELECT * FROM professional WHERE info = '$username' AND password = '$password'";
    $resultp = $connection->query($sqlp);

    if ($resultp->num_rows == 1) {
        $row = $resultp->fetch_assoc();
        $sector = $row['sector'];

        switch ($sector) {
            case 'c':
                header("Location: cooking.php");
                break;
            case 'm':
                header("Location: moviecreator.html");
                break;
            case 'q':
                header("Location: quotecreator.html");
                break;
            case 't':
                header("Location: techcreator.html");
                break;
            case 'p':
                header("Location: podcastcreator.php");
                break;
            default:
                header("Location: yoga.html");
                break;
        }

        exit();
    }

    // User login
    $sql = "SELECT * FROM register WHERE info = '$username' AND password = '$password' and id ='U'";
    $result = $connection->query($sql);

    if ($result->num_rows == 1) {
        header("Location: homepage.html");
        exit();
    } else {
        header("Location: invalid.html");
        exit();
    }
} else {
    echo "Query error: " . $connection->error;
}

// Close the database connection
$connection->close();
?>
