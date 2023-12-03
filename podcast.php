<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast Display</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1478737270239-2f02b77fc618?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cG9kY2FzdCUyMHF1b3Rlc3xlbnwwfHwwfHx8MA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            color: #fff; /* Set text color to white for better visibility on the background */
        }
           
    .header {
     background-color: rgba(255, 255, 255, 0.1);
     box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    padding: 30px 0;
    display: flex;
    justify-content: flex-end; /* Adjusted to push items to the right */
    align-items: center;
    color: white;
    font-size: 20px;
}

.header .header-links {
    text-align: right;
}

.header a {
    text-decoration: none;
    color:purple;
    margin: 0 20px;
    font-weight: bold;
    transition: color 0.3s;
}

.header a:hover {
    color: red;
}
        .container {
            margin-top: 0px;
           
        }
            .card-container {
            display: grid;
            grid-template-columns: repeat(3, auto); /* Set to three columns with equal width */
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 20px;
        }
        h5{
            color:black;
        }
        p{
            color:olive;
            font-style:italic;
            font-weight:bold;

        }
        .card {
    width: 300px; /* Set your desired width */
    height: auto; /* Automatically adjust height to maintain aspect ratio */
    margin: 20px;
    background: rgba(255, 255, 255, 0.7); /* Transparent white background */
    border-radius: 10px;
    padding: 15px;
    text-align: center;
    overflow: hidden; /* Ensure content does not overflow */
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Maintain aspect ratio while covering the entire container */
    border-radius: 8px;
}
        .card audio {
            max-width: 100%; /* Set maximum width for audio element */
        }
        .row{
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
        }
    </style>
</head>
<body>
<div class="header">
        <div class="header-links">
            <a href="homepage.html">Home</a>
            <a href="register.html">Register</a>
            <a href="contact.html">Contact Us</a>
        </div>
    </div>
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

// Fetch podcasts from the database
$query = "SELECT * FROM content where sector='p'";
$result = $connection->query($query);
echo '<div class="container">';
        echo '<div class="row">';
        echo '<div class="col-md-12">';
        echo '<div class="card-container">';
// Check if there are podcasts
if ($result->num_rows > 0) {
    // Loop through the results and generate cards
    while ($row = $result->fetch_assoc()) {
        $title = $row['title'];
        $description = $row['description'];
        $image = $row['image'];
        $audio = $row['video'];

        // Output the HTML for the podcast card
        echo '<div class="card">';
        echo '<img src="' . $image . '" class="card-img-top" alt="Podcast Image">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $title . '</h5>';
        echo '<p class="card-text"> ' . $description . '</p>';
        echo '<audio controls preload="none">';
        echo '<source src="' . $audio . '" type="audio/mp3">';
        echo 'Your browser does not support the audio tag.';
        echo '</audio>';
        echo '</div>';
        echo '</div>';
       
    }
}
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
// Close the database connection
$connection->close();
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
