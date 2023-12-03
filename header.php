<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Header with Sidebar</title>
    
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: white; /* Background color for the body */
        }

        .sidebar {
            height: 100%;
            width: 250px; /* Width of the sidebar */
            position: fixed;
            margin-top:99px;
            left: 0;
            background-color:#0091D5; /* Background color for the sidebar */
            overflow-y: auto; /* Enable vertical scrolling if content overflows */
        }

        .sidebar ul {
            padding: 0;
        }

        .sidebar li {
            margin: 0;
            padding: 10px; /* Adjust the spacing between sidebar items */
        }

        .sidebar a {
            text-decoration: none;
            color: #fff; /* Text color for sidebar items */
            display: block; /* Display items as block elements for full width */
            transition: background-color 0.3s; /* Smooth background color transition on hover */
        }

        .sidebar a:hover {
            color: black; /* Text color changes to blue on hover */
        }

        header {
            background-color: #0077A6;
            color: black;
            padding: 10px;
            margin-left: 0px; /* Adjust the margin to match the sidebar width */
            text-align: right; /* Push contents to the right end */
        }

        .push ul {
            list-style: none;
            padding: 0;
        }

        .push {
            display: flex; /* Use flex layout for centering */
            justify-content: flex-end; /* Push contents to the right */
            align-items: center; /* Center items vertically */
        }

        li {
            display: inline-block;
            margin-right: 20px;
            font-size: 17px;
        }

        li:hover {
            color: black;
        }

        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        a:hover {
            color: black;
        }

        img {
            height: 40px;
            width: 40px;
            border-radius: 50%;
        }

        ul:last-child li:last-child {
            margin-right: 0;
        }
        .sidebar ul{
            margin-top:60px;
        }
        .sidebar li{
            display:block;
        }
        .push ul li:hover{
            color:black;
        }
        .simply {
    margin-left: 500px;
    font-size: 30px;
}

.subtitle {
    color: #0091D5;
    font-size: 18px;
    display: block;
    margin-top: 10px;
    transition: color 0.3s;
}

.subtitle:hover {
    color: #0078A8;
}
.main{
    list-style:none;
    margin-top:0px;
}


    </style>
</head>
<body>
    <div class="sidebar">
        <ul class="main">
            <li><a href="javascript:void(0);" id="usersLink">Users</a></li>
            <li><a href="javascript:void(0);" id="professionalsLink">Add Professionals</a></li>
            <li><a href="javascript:void(0);" id="professionalsdLink">Delete Professionals</a></li>
            <li><a href="javascript:void(0);" id="adminLink">Add admins</a></li>
            <li><a href="content.php" id="contentLink">View Contents</a></li>
        </ul>
    </div>

    <header>
        <div class="push">
            <ul>
                <li><a href="homepage.html">View as a User</a></li>
                <li>
                <span style="color: #black; font-size: 30px;">
                    <?php
                    if (isset($_GET['name'])) {
                        $adminName = urldecode($_GET['name']);
                        echo $adminName;
                    }
                    ?>
                </li>
                <li><img src="https://cdn-icons-png.flaticon.com/512/1794/1794749.png"></li>
            </ul>
        </div>
    </header>
    <div id="professionalsFormContainer">
        <!-- The form will be loaded here using JavaScript -->
    </div>

    <p class="simply" id="welcomeMessage">Hello,<?php
                    if (isset($_GET['name'])) {
                        $adminName = urldecode($_GET['name']);
                        echo $adminName;
                    }
                    ?> ! <span class="subtitle">Manage your professionals and users with ease.</span></p>

<script>
    // JavaScript function to load the "Add Professional" form
    document.getElementById("professionalsLink").addEventListener("click", function () {
        var formContainer = document.getElementById("professionalsFormContainer");
        var welcomeMessage = document.getElementById("welcomeMessage");
        
        // Remove the welcome message
        welcomeMessage.innerHTML = "";
        professionalsFormContainer.innerHTML="";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "addprof.html", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                formContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>
<script>
    // JavaScript function to load the "Add Professional" form
    document.getElementById("usersLink").addEventListener("click", function () {
        var formContainer = document.getElementById("professionalsFormContainer");
        var welcomeMessage = document.getElementById("welcomeMessage");
        
        // Remove the welcome message
        welcomeMessage.innerHTML = "";
        professionalsFormContainer.innerHTML="";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delusers.html", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                formContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>
<script>
    // JavaScript function to load the "Add Professional" form
    document.getElementById("professionalsdLink").addEventListener("click", function () {
        var formContainer = document.getElementById("professionalsFormContainer");
        var welcomeMessage = document.getElementById("welcomeMessage");
        
        // Remove the welcome message
        welcomeMessage.innerHTML = "";
        professionalsFormContainer.innerHTML="";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delprof.html", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                formContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>
<script>
    // JavaScript function to load the "Add Professional" form
    document.getElementById("adminLink").addEventListener("click", function () {
        var formContainer = document.getElementById("professionalsFormContainer");
        var welcomeMessage = document.getElementById("welcomeMessage");
        
        // Remove the welcome message
        welcomeMessage.innerHTML = "";
        professionalsFormContainer.innerHTML="";
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "addadmin.html", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                formContainer.innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
</script>
</body>
</html>
