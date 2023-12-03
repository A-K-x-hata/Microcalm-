<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Dish</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1572715376701-98568319fd0b?auto=format&fit=crop&q=60&w=1920&h=1080&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2hlZnxlbnwwfHwwfHx8MA%3D%3D') no-repeat center center fixed;
            background-size: cover;
            background-attachment: fixed;
        }
        .form-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
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
                    <h1 class="display-4 text-center">Add a Dish</h1>
                    <form action="cookback.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="dishName">Dish Name:</label>
                            <input type="text" class="form-control" id="dishName" name="dishName" placeholder="Enter the dish name">
                        </div>
                        <div class="form-group">
                            <label for="dishImage">Dish Image:</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="dishImage" name="dishImage" accept="image/*">
                                <label class="custom-file-label" for="dishImage"></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ingredients">Ingredients:</label>
                            <textarea class="form-control" id="ingredients" name="ingredients" rows="4" placeholder="Enter the ingredients"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="cookingSteps">Cooking Steps:</label>
                            <textarea class="form-control" id="cookingSteps" name="cookingSteps" rows="4" placeholder="Enter the cooking steps"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="chefsNote"><i>Chef's Note:</i></label>
                            <textarea class="form-control" id="chefsNote" name="chefsNote" rows="4" placeholder="Add any additional tips or notes from the chef here."></textarea>
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
    <script>/*not required*/
        // Update the custom file label when a file is selected
        document.querySelector('.custom-file-input').addEventListener('change', function (e) {
            var fileName = e.target.files[0].name;
            document.querySelector('.custom-file-label').textContent = fileName;
        });
    </script>
    
</body>
</html>

