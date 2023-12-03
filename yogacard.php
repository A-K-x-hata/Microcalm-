<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Image Gallery</title>
  <style>
    /* Provided CSS */
    @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

    body {
      background: url('https://img.freepik.com/premium-photo/serenity-nature-woman-finds-balance-practicing-yoga-peaceful-solitude_477306-573.jpg') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    .container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
    }
    .header {
    position: relative;
    z-index: 1;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    padding: 30px 0;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-size: 20px;
}


.header .header-links {
    text-align: right;
}

.header a {
    text-decoration: none;
    color:white;
    margin: 0 20px;
    font-weight: bold;
    transition: color 0.3s;
}

.header a:hover {
    color: #9514ff;
}

    figure {
      background-color: #b0e0e6; /* Light Blue */
      color: #000000;
      position: relative;
      overflow: hidden;
      min-width: 250px;
      max-width: 350px;
      width: 100%;
      text-align: left;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      cursor: pointer;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out;
    }

    figure:hover {
      transform: scale(1.05);
    }

    figure * {
      box-sizing: border-box;
      transition: all 0.35s ease-in-out;
    }

    figure img {
      vertical-align: top;
      width: 100%;
      transition: all 0.5s ease-in-out;
    }

    figure figcaption {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 20px;
      background: rgba(176, 224, 230, 0.9); /* Light Blue */
      text-align: center;
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.5s ease-in-out;
    }

    figure h2 {
      margin: 0 0 10px;
      color: #000000;
      font-size: 1.2em;
    }

    figure p {
      margin: 0;
      color: #000000;
    }

    figure a {
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      position: absolute;
      z-index: 1; /* Ensure it's on top for clicking */
    }

    figure:hover img {
      opacity: 0.7;
      filter: grayscale(50%);
    }

    figure:hover figcaption {
      background: rgba(224, 255, 255, 0.95); /* Light Bluish White on Hover */
      opacity: 1;
      visibility: visible;
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
  <div class="container">
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

    // Fetch data from the database
    $query = "SELECT * FROM content where sector='y'  ORDER BY cid DESC";
    $result = $connection->query($query);

    // Check if there is data
    if ($result->num_rows > 0) {
        // Loop through the results and generate cards
        while ($row = $result->fetch_assoc()) {
            $category = $row['title'];
            $heading = $row['description'];
            $imageURL = $row['image'];
            $videolink = $row['video'];

            echo '<figure onclick="window.location.href=\'' . $videolink . '\'">';
            echo '<img src="' . $imageURL . '" alt="Image"/>';
            echo '<figcaption>';
            echo '<h2>' . $category . '</h2>';
            echo '<p>' . $heading . ' </p>';
            echo '</figcaption>';
            echo '</figure>';
        }
    }

    // Close the database connection
    $connection->close();
    ?>
  </div>
</body>
</html>
