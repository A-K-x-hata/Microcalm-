<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Table with PHP</title>
    <style>
        /* Add some basic styling to the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        th.col {
            background-color: blue;
            color: #fff;
        }

        /* Style the table header */
        thead {
            background-color: #007bff;
            color: #fff;
        }

        /* Add some spacing for better readability */
        body {
            margin: 20px;
        }

        /* Style the "Go back" link */
        p {
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        a:hover {
            color: #0056b3;
        }

        /* Style the delete button */
        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #bd2130;
        }
    </style>
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">CID</th>
                <th scope="col">Title</th>
                <th scope="col" class="col">Sector</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Replace the database connection details
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "microcalm";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Replace this query with your actual query to fetch data
            $sql = "SELECT cid, title, sector FROM content";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $row["cid"] . "</th>";
                    echo "<td>" . $row["title"] . "</td>";

                    // Map sector values to human-readable labels
                    $sector = $row["sector"];
                    $sectorLabels = [
                        'q' => 'Quotes',
                        'm' => 'Entertainment',
                        't' => 'Technology',
                        'y' => 'Yoga',
                        'p' => 'Podcast',
                        'r' => 'Quiz',
                        'c' => 'Cooking',
                        'C' => 'Cooking',
                        'o' => 'Entertainment/Quiz',
                        'r' => 'Technology/Quiz',
                    ];

                    // Output the sector with a fallback to the original value
                    echo "<td>" . ($sectorLabels[$sector] ?? $sector) . "</td>";

                    // Output delete button
                    echo "<td><button class='delete-btn' onclick='deleteContent(" . $row["cid"] . ")'>Delete</button></td>";

                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
    <script>
    // JavaScript function to handle content deletion
    function deleteContent(cid) {
        // You can implement AJAX to delete the content from the database
        // For demonstration purposes, an alert is shown here
        var confirmDelete = confirm("Are you sure you want to delete this content?");
        if (confirmDelete) {
            // Implement AJAX request to delete content by sending the CID to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_content.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    alert(xhr.responseText);
                    // Reload the page or update the table using AJAX
                }
            };
            xhr.send("cid=" + cid);
        }
    }
</script>

</body>

</html>
