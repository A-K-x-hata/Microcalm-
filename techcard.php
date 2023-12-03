<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Questions</title>
    <style>
   body {
    background-image: url('https://i.pinimg.com/564x/16/c8/b5/16c8b5710027382a8426a48b77e20063.jpg');
    background-size: cover; /* Adjust the size as needed */
    background-repeat: no-repeat; /* Prevent the GIF from repeating */
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
    margin-top:0px;
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
        .quiz-card {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(247, 247, 247, 0.9);
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
        }

        .quiz-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .question-container {
            flex-grow: 1;
            padding-right: 20px;
        }

        h2 {
            color: purple;
        }

        .question {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .options {
            list-style-type: none;
            padding: 0;
        }

        .option {
            margin: 10px 0;
        }

        .answer {
            font-weight: bold;
            color: #007000;
            display: none;
        }

        .question-image-container {
            flex-shrink: 0;
        }

        .question-image {
            max-width: 150px;
            height: auto;
        }

        .submit-button button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button button:hover {
            background-color:blue;
        }

        .submit-button {
            text-align: center;
            margin-top: 20px;
        }
        #result {
            color: white; /* Set the score color to white */
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

    $connection = new mysqli($hostname, $username, $password, $database);
    $query = "SELECT * FROM content where sector='r'";
    $result = mysqli_query($connection, $query);

    // Loop through the results and generate quiz cards
    while ($row = mysqli_fetch_assoc($result)) {
        // Extract data from the row
        $title = $row['title'];
        $question = $row['question'];
        $c1 = $row['opt1'];
        $c2 = $row['opt2'];
        $c3 = $row['opt3'];
        $c4 = $row['opt4'];
        $answer = $row['answer'];
        $image = $row['image'];

        // Create a quiz card for each question
        echo '<div class="quiz-card">';
        echo '<div class="question-container">';
        echo '<h2>' . $title . '</h2>';
        echo '<p class="question">' . $question . '</p>';
        echo '<ul class="options">';
        // Radio buttons for each option
        echo '<li class="option"><label><input type="radio" name="' . $title . '" value="1">' . $c1 . '</label></li>';
echo '<li class="option"><label><input type="radio" name="' . $title . '" value="2">' . $c2 . '</label></li>';
echo '<li class="option"><label><input type="radio" name="' . $title . '" value="3">' . $c3 . '</label></li>';
echo '<li class="option"><label><input type="radio" name="' . $title . '" value="4">' . $c4 . '</label></li>';


        echo '</ul>';
        echo '<p class="answer">Correct Answer: ' . $answer . '</p>';
        echo '</div>';
        
        // Display the question image to the right of the question
        if (!empty($image)) {
            echo '<div class="question-image-container">';
            echo '<img class="question-image" src="' . $image . '" alt="Question Image">';
            echo '</div>';
        }
        
        echo '</div>';
    }
    ?>

    <div class="submit-button">
        <button onclick="checkAnswers()">Submit</button>
        <p id="result"></p>
    </div>

   <script>
   function checkAnswers() {
    const quizCards = document.querySelectorAll('.quiz-card');
    let correctAnswers = 0;

    quizCards.forEach((quizCard, index) => {
        const selectedOption = quizCard.querySelector('input[type="radio"]:checked');
        const answer = quizCard.querySelector('.answer');
        if (selectedOption) {
            const selectedValue = parseInt(selectedOption.value);
            const correctAnswer = parseInt(answer.innerText.split(":")[1].trim());
            if (selectedValue === correctAnswer) {
                correctAnswers++;
                answer.style.color = 'green';
            } else {
                answer.style.color = 'red';
            }
        } else {
            answer.style.color = 'black';
        }
        answer.style.display = 'block';
    });

    document.getElementById('result').innerText = `Correct Answers: ${correctAnswers}/${quizCards.length}`;
}

</script>

</body>
</html>
