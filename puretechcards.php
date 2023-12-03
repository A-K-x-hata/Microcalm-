<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <title>Document</title>
    <style>
    body{
  display:flex;
  margin:0;
  padding:0;
  min-height: 100vh;
  background-image:url('https://images.unsplash.com/photo-1531297484001-80022131f5a1?q=80&w=2020&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
 background-attachment: fixed;
  justify-content: center;
  align-items: center;
  font-family: arial;
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
  position: fixed;
  top: 0;
  width: 100%;
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
.container{
  width: 1000px;
  position: relative;
  display: flex;
  justify-content: space-between;
  flex-wrap:wrap;
  
}

.container .card{
  position: relative;
}

.container .card .face{
  width:300px;
  height: 200px;
  transition:.4s;
  
}

.container .card .face.face1{
  position: relative;
  background: #333;
  display: flex;
  justify-content: center;
  align-content:center;
  align-items: center;
  z-index: 1;
  transform: translateY(100px);
}

.container .card:hover .face.face1{
  transform: translateY(0);
  box-shadow:
    inset 0 0 60px whitesmoke,
    inset 20px 0 80px #f0f,
    inset -20px 0 80px #0ff,
    inset 20px 0 300px #f0f,
    inset -20px 0 300px #0ff,
    0 0 50px #fff,
    -10px 0 80px #f0f,
    10px 0 80px #0ff;
   
}


.container .card .face.face1 .content{
  opacity: .2;
  transition:  0.5s;
  text-align: center;
  
   
  
  
 

}

.container .card:hover .face.face1 .content{
  opacity: 1;
 
}

.container .card .face.face1 .content i{
  font-size: 3em;
  color: white;
  display: inline-block;
   
}

.container .card .face.face1 .content h3{
  font-size: 1em;
  color: white;
  text-align: center;
  

}

.container .card .face.face1 .content a{
   transition: .5s;
}

.container .card .face.face2{
   position: relative;
   background: whitesmoke;
   display: flex;
   align-items: center;
   justify-content: center;
   padding: 20px;
  box-sizing: border-box;
  box-shadow: 0 20px 50px rgba(0,0,0,.8);
  transform: translateY(-100px);
}

.container .card:hover .face.face2{
    transform: translateY(0);


}

.container .card .face.face2 .content p, a{
  font-size: 10pt;
  margin: 0 ;
  padding: 0;
  color:#333;
}

.container .card .face.face2 .content a{
  text-decoration:none;
  color: black;
  box-sizing: border-box;
  outline : 1px dashed #333;
  padding: 10px;
  margin: 15px 0 0;
  display: inline-block;
}

.container .card .face.face2 .content a:hover{
  background: #333 ;
  color: whitesmoke; 
  box-shadow: inset 0px 0px 10px rgba(0,0,0,0.5);
}
</style>
</head>
<body>
<div class="header">
        <div class="header-links">
            <a href="homepage.html">Home</a>
            <a href="techcard.php">Play quiz</a>
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
            $query = "SELECT * FROM content where sector='t'";
            $result = $connection->query($query);
            // Check if there is data
            if ($result->num_rows > 0) {
                // Loop through the results and generate cards
                while ($row = $result->fetch_assoc()) {
                    $category = $row['title'];
                    $heading = $row['description'];
                    $imageURL = $row['image'];
                    $videolink=$row['video'];

                    echo '<div class="card">';
                    echo '  <div class="face face1">';
                    echo '    <div class="content">';
                    echo '      <i class="' . $imageURL . '"></i>';
                    echo '      <h3>' .$category. '</h3>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '  <div class="face face2">';
                    echo '    <div class="content">';
                    echo '      <p>' . $heading . '</p>';
                    echo '      <a href=" '.$videolink.'" type="button">Read More</a>';
                    echo '    </div>';
                    echo '  </div>';
                    echo '</div>';
                
                }
            }

            // Close the database connection
            $connection->close();
            ?>
        </div>
</body>
</html>
