<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Quote Generator</title>
    <link rel="stylesheet" href="path-to-fontawesome.css"> <!-- Make sure to include the Font Awesome stylesheet -->
    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            background-image: url('https://giffiles.alphacoders.com/144/14465.gif');
            background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; /* Remove default margin to avoid unwanted space */
        }
        .header-container {
    position: fixed;
    top: 0;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.1);
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    padding: 30px 0;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    color: white;
    font-size: 20px;
}

.header .header-links {
    text-align: right;
    margin-left:30px;
}

.header a {
    text-decoration: none;
    color: white;
    margin-left: 20px; /* Adjusted to create a gap */
    font-weight: bold;
    transition: color 0.3s;
}

.header a:first-child {
    margin-left: 0; /* No margin on the first link */
}

.header a:hover {
    color: #9514ff;
}
a{
    color:white;
    text-decoration:none;
    margin-left:30px;
}
a:hover{
    color:green;
}



        .box {
            background-color: transparent;
            border-radius: 3px;
            color: #fff;
            position: relative;
            width: 400px;
            height: 300px;
            transform-style: preserve-3d;
            perspective: 2000px;
            transition: .4s;
            text-align: center;
            margin: auto;
        }

        .box:before,
        .box:after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            box-sizing: border-box;
        }

        .box:before {
            border-top: 20px solid #fff;
            border-left: 20px solid #fff;
        }

        .box:after {
            border-bottom: 20px solid #fff;
            border-right: 20px solid #fff;
        }

        .fas {
            font-size: 25px;
            height: 50px;
            width: 50px;
            line-height: 50px !important;
            background-color: #fff;
            color: #2C3A47;
        }

        .fa2 {
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: 1;
        }

        .text {
            position: absolute;
            top: 30px;
            left: -30px;
            width: calc(100% + 60px);
            height: calc(100% - 60px);
            background-color: #2C3A47;
            border-radius: 3px;
            transition: .4s;
        }

        .text .fa1 {
            position: absolute;
            top: 0;
            left: 0;
        }

        .text div {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            text-align: center;
            width: 100%;
            padding: 30px 60px;
            line-height: 1.5;
            box-sizing: border-box;
        }

        .text div h3 {
            font-size: 30px;
            margin-bottom: 5px;
        }

        .text div p {
            font-size: 15px;
        }

        .box:hover .text {
            transform: rotateY(20deg) skewY(-3deg);
        }

        .box:hover {
            transform: rotateY(-20deg) skewY(3deg);
        }

        #regenerate-btn {
            position: fixed;
            bottom: 100px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        #regenerate-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>

<body>
    <div class="header-container">
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

    // Function to fetch a random quote from the database
    function getRandomQuote($connection)
    {
        $query = "SELECT * FROM content where sector='q' ORDER BY RAND() LIMIT 1";
        $result = $connection->query($query);
        return $result->fetch_assoc();
    }

    // Fetch a random quote initially
    $row = getRandomQuote($connection);
    ?>

    <div class="box">
        <i class="fas fa-quote-left fa2"></i>
        <div class="text">
            <i class="fas fa-quote-right fa1"></i>
            <div>
                <h3><?= htmlspecialchars($row['title']) ?></h3>
                <p><?= htmlspecialchars($row['description']) ?></p>
            </div>
        </div>
    </div>

    <!-- Regenerate button -->
    <button id="regenerate-btn" onclick="regenerateQuote()">Regenerate</button>

    <script>
        function regenerateQuote() {
            // Use JavaScript to reload the page, fetching a new random quote from the database
            location.reload();
        }
    </script>

    <?php
    // Close the database connection
    $connection->close();
    ?>
</body>

</html>
