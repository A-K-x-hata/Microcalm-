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


    // Get the values from the form
    $emailOrId = $_POST["emailOrId"];
    $deleteOption = $_POST["deleteOption"];

    // Prepare the SQL statement based on the selected delete option
    if ($deleteOption === "email") {
        $sql = "DELETE FROM register WHERE info = ?";
    } elseif ($deleteOption === "id") {
        $sql = "DELETE FROM register WHERE userid = ?";
    } else {
        echo "Invalid delete option.";
        exit;
    }

    // Create a prepared statement
    $stmt = $connection->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("s", $emailOrId);

        // Execute the query
        if ($stmt->execute()) {
            if ($stmt->affected_rows > 0) {
                echo "user deleted successfully.";
            } else {
                echo "user with provided email/ID not found.";
            }
        } else {
            echo "Error deleting professional: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing the statement: " . $connection->error;
    }

    // Close the database connection
    $connection->close();
}
?>
