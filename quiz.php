<?php
 $filenam= $_FILES["uploadfile"]["name"];
 $tempnam= $_FILES["uploadfile"]["tmp_name"];
 $fol="newimg/".$filenam;
 move_uploaded_file($tempnam,$fol);
 ?>
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
    $quizTitle = $_POST["title"];
    $question = $_POST["question"];
    $c1 = $_POST["option1"];
    $c2 = $_POST["option2"];
    $c3 = $_POST["option3"];
    $c4 = $_POST["option4"];
    $answer = $_POST["right"];

    $sql = "INSERT INTO content (title, question, opt1, opt2, opt3, opt4, answer, image,sector) VALUES ('$quizTitle', '$question', '$c1', '$c2', '$c3', '$c4', '$answer', '$fol','o')";
    
    if ($connection->query($sql) === TRUE) {
       header("Location:upload.php");
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();
?>
