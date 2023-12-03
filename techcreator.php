<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Quiz</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .quiz-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .quiz-container h2 {
            text-align: center;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h2>Create a Quiz</h2>
        <form action="techback.php" method="post" enctype="multipart/form-data">
            Title:<input class="form-input" type="text" name="title"><br>
            Image: <input type="file" name="uploadfile" ><br><br>
            Question:<input class="form-input" type="text" name="question"><br>
            <label>
                1. <input class="form-input" type="text" name="option1">
            </label><br>
            <label>
                2. <input class="form-input" type="text" name="option2">
            </label><br>
            <label>
                3. <input class="form-input" type="text" name="option3">
            </label><br>
            <label>
                4. <input class="form-input" type="text" name="option4">
            </label><br>
            Right choice:<input class="form-input" type="number" min="1" max="4" name="right"><br>
            <button class="submit-button" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
