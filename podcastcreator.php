<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
             body {
            background: url('https://images.unsplash.com/photo-1593697909683-bccb1b9e68a4?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBvZGNhc3R8ZW58MHx8MHx8fDA%3D') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
            color: #fff; /* Set text color to white for better visibility on the background */
        }
        .form-container {
            background: rgba(255, 255, 255, 0.3); /* Fully transparent white background */
            padding: 60px;
            border-radius: 10px;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            margin-top:50px;
        }
        .custom-file-label::after {
            content: "Browse";
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-container">
                    <h1 class="display-4 text-center">Podcast Submission</h1>
                    <form action="podback.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="podcaster_name">Podcast title:</label>
                            <input type="text" class="form-control" id="podcaster_name" name="podcaster_name" placeholder="Enter the podcast title" required>
                        </div>
                        <div class="form-group">
                            <label for="podcast_description">Podcaster Description:</label>
                            <input type="text" class="form-control" id="podcaster_description" name="podcast_description" placeholder="Enter the podcast description" required>
                        </div>
 
                        <div class="form-group">
                            <label for="podcast_audio">Podcast Audio:</label>
                            <input type="file" class="form-control" id="podcast_audio" name="podcast_audio" accept="audio/*" required>
                        </div>

                        <div class="form-group">
                            <label for="podcast_image">Podcast Image:</label>
                            <input type="file" class="form-control" id="podcast_image" name="podcast_image" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>