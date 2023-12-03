<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .main {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
    background: url(https://t3.ftcdn.net/jpg/05/55/56/28/360_F_555562894_l0eyKvWMUaUONvjtnQq0wkO0l74yOWp8.jpg);
    background-repeat: no-repeat;
    background-size: cover; /* or background-size: 100% 100%; */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    padding: 20px 0;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    color: green;
    font-size: 20px;
}


.header .header-links {
    text-align: right;
}

.header a {
    text-decoration: none;
    color: green;
    margin: 0 20px;
    font-weight: bold;
    transition: color 0.3s;
}

.header a:hover {
    color: #9514ff;
}

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Set to three columns with equal width */
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 20px; /* Add some gap between cards */
        }

        .cards_item {
            display: flex;
            padding: 1rem;
            flex: 0 0 calc(33.33% - 20px); /* Set a fixed width for each card with gap considered */
        }

        .card_image {
            height: calc(13 * 1.2rem);
            padding: 1.2rem 1.2rem 0;
            position: relative;
        }

        .card_image:before,
        .card_image:after {
            content: "";
            position: absolute;
            width: 20px;
            left: 60%;
            top: 0;
            height: 45px;
            background: #e6e6e6b8;
            transform: rotate(45deg);
        }

        .card_image:after {
            transform: rotate(-45deg);
            top: auto;
            bottom: -22px;
            left: 40%;
        }

        .card_image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cards_item {
            filter: drop-shadow(0 0 5px rgba(0, 0, 0, 0.25));
        }

        .card {
            background-color: white;
            border-radius: 0.25rem;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            padding-left: 30px;
            background: repeating-linear-gradient(#0000 0 calc(1.2rem - 1px), #66afe1 0 1.2rem) right bottom / 100% 100%,
                linear-gradient(red 0 0) 30px 0/2px 100% #fff;
            background-repeat: no-repeat;
            line-height: 1.2rem;
            -webkit-mask: radial-gradient(circle .8rem at 2px 50%, #0000 98%, #000) 0 0/100% 2.4rem;
        }
        .card:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease-in-out;
}

        .card_content {
            padding: 1.2rem;
        }

        h2.card_title,
        p {
            margin: 1.2rem 0;
            color:black;
        }

        h2.card_title {
            font-size: 30px;
        }
        .subtitle{
            color:blue;
            font-size:20px;
        }
.writing{
    font-style:italic;
}
        body {
            background: url('https://i.pinimg.com/564x/3a/82/77/3a8277ca34dca66c2b9cc6b9f765f047.jpg') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            color: #fff; /* Set text color to white for better visibility on the background */

        }

        html {
            font-size: 15px;
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
    <div class="main">
        <ul class="cards">
            <?php
            $hostname = 'localhost';
            $username = 'root';
            $password = 'root';
            $database = 'microcalm';
            $connection = new mysqli($hostname, $username, $password, $database);
            $query = "SELECT * FROM content where sector='c'";
            $result = mysqli_query($connection, $query);

            // Loop through the results and generate cards
            while ($row = mysqli_fetch_assoc($result)) {
                // Extract data from the row
                $dishName = $row['title'];
                $ingredients = $row['ing'];
                $cookingSteps = $row['steps'];
                $chefsNote = $row['description'];
                $dishImage = $row['image'];

                // Generate HTML for the card
                echo '<li class="cards_item">';
                echo '<div class="card">';
                echo '<div class="card_image"><img src="' . $dishImage . '"></div>';
                echo '<div class="card_content">';
                echo '<h2 class="card_title">' . $dishName . '</h2>';
                echo '<div class="card_text">';
                echo '<p class="subtitle">Ingridients</p>';
                echo '<p class="writing">' . $ingredients . '</p>';
                 echo '<p class="subtitle">Steps</p>';
                echo '<p class="writing">' . $cookingSteps . '</p>';
                echo '<p class="subtitle"> Chef\'s note</p>';
                echo '<p class="writing">' . $chefsNote . '</p>';
                echo '</div>';
                echo ' </div>';
                echo '</div>';
                echo '</li>';
            }

            // Close the database connection
            mysqli_close($connection);
            ?>
        </ul>
    </div>

</body>

</html>
