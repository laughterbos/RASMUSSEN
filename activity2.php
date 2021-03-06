﻿<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Write Every Day</title>

    <!-- Include meta tag to ensure proper rendering and touch zooming -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Include jQuery Mobile stylesheets -->
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

    <!-- Include the jQuery library -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Include the jQuery Mobile library -->
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>

</head>
<body>
    <div data-role="page">

        <div data-role="header">
            <h1>Welcome to writing every day</h1>
        </div>

        <div data-role="main" class="ui-content">

            <?php
            $servername = "us-cdbr-azure-southcentral-f.cloudapp.net";
            $username = "b13fe870529434";
            $password = "b3092936";
            $dbname = "acsm_9ab42719d04fd9b";

            $fname = (isset($_POST['fname'])    ? $_POST['fname']   : '');
            $lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql= "SELECT * FROM `module2table` WHERE fname = '$fname' or lname = '$lname'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<b>fname: " . $row["fname"]. "</b><br>";
            echo "<b>lname: " . $row["lname"]. "</b><br>";
            }
            } else {
            echo "Sorry there are no matches! Please check your entry and try again.";
            }

            mysqli_close($conn);
            ?>



        </div>

        <div data-role="footer">
            <h1>Footer</h1>
        </div>
    </div>
</body>
</html>