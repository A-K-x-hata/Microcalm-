<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <title>Document</title>
    <style>
                
 
        :root {
            --background-dark:#2d3548;
            --text-light: rgba(255, 255, 255, 0.6);
            --text-lighter: rgba(255, 255, 255, 0.9);
            --spacing-s: 8px;
            --spacing-m: 16px;
            --spacing-l: 24px;
            --spacing-xl: 32px;
            --spacing-xxl: 64px;
            --width-container: 1200px;
            
            
        }


        .header {
    position: relative;
    z-index: 1;
    background-image:url('https://i.pinimg.com/564x/85/3d/f0/853df0d5af918c9921f66f7a50915b11.jpg');
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
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
        * {
            border: 0;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            height: 100%;
            font-family: 'Montserrat', sans-serif;
            font-size: 14px;
        }

        body {
            height: 100%;
            background-color: white;
        }

        .hero-section {
            align-items: flex-start;
            background-image: linear-gradient(15deg, #0f4667 0%, #2a6973 150%);
            display: flex;
            min-height: 100%;
            justify-content: center;
            padding: var(--spacing-xxl) var(--spacing-l);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-column-gap: var(--spacing-l);
            grid-row-gap: var(--spacing-l);
            max-width: var(--width-container);
            width: 100%;
        }

        @media(min-width: 540px) {
            .card-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(min-width: 960px) {
            .card-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .card {
            list-style: none;
            position: relative;
        }

        .card:before {
            content: '';
            display: block;
            padding-bottom: 150%;
            width: 100%;
        }

        .card__background {
            background-size: cover;
            background-position: center;
            border-radius: var(--spacing-l);
            bottom: 0;
            filter: brightness(0.75) saturate(1.2) contrast(0.85);
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transform-origin: center;
            transform: scale(1) translateZ(0);
            transition: filter 200ms linear, transform 200ms linear;
        }

        .card:hover .card__background {
            transform: scale(1.05) translateZ(0);
            width: 100%;
        }

        .card-grid:hover > .card:not(:hover) .card__background {
            filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
        }

        .card__content {
            left: 0;
            padding: var(--spacing-l);
            position: absolute;
            top: 0;
            transition: opacity 200ms linear;
            opacity: 1; /* Initially visible */
        }

        .card:hover .card__content {
            opacity: 0; /* Make the description disappear on hover */
        }

        .card__category {
            color:yellow;
            font-size: 20px;
            margin-bottom: var(--spacing-s);
            text-transform: uppercase;
            max-height: 100px; /* Set your desired maximum height */
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .card__heading {
            color: white;
            font-style: italic;
            font-weight: lighter;
            margin-top: 10px;
            font-size: 18px;
        }

        /* Add filter to blur the image when not hovered */
        .card:not(:hover) .card__background {
            filter: brightness(0.5) saturate(0) contrast(1.2) blur(20px);
        }
        body {
    height: 100%;
    background-image:url('https://i.pinimg.com/236x/d3/b1/2b/d3b12b53c209148feb9d89df6144adbf.jpg');
  
}
    </style>
</head>
<body>
<div class="header">
        <div class="header-links">
            <a href="homepage.html">Home</a>
            <a href="quizcard.php">Play quiz</a>
            <a href="contact.html">Contact Us</a>
        </div>
    </div>
    <section class="hero-section">
        <div class="card-grid">
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
            $query = "SELECT * FROM content where sector='m'";
            $result = $connection->query($query);
            // Check if there is data
            if ($result->num_rows > 0) {
                // Loop through the results and generate cards
                while ($row = $result->fetch_assoc()) {
                    $category = $row['title'];
                    $heading = $row['description'];
                    $imageURL = $row['image'];
                    $videolink=$row['video'];

                    // Output the HTML for the dynamic card
                    echo '<a class="card" href="' . htmlspecialchars($videolink) . '" target="_blank">';
                    echo '<div class="card__background" style="background-image: url(' . $imageURL . ')"></div>';
                    echo '<div class="card__content">';
                    echo '<p class="card__category">' . $category . '</p>';
                    echo '<h3 class="card__heading">' . $heading . '</h3>';
                    echo '</div>';
                    echo '</a>';
                }
            }

            // Close the database connection
            $connection->close();
            ?>
        </div>
    </section>
</body>
</html>
