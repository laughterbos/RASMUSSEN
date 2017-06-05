<!DOCTYPE html>

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

            $id = (isset($_POST['id'])    ? $_POST['id']   : '');

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            }

            $sql= "SELECT module3table1.Fname + ' ' + module3table1.Lname As 'Name', module3table2.Address, module3table2.City, module3table2.State, module3table2.Country, module3table2.zip FROM Module3table1 LEFT JOIN module3table2 ON module3table1.departmentID = module3table2.id WHERE module3table1.id = '$id'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
            echo "<b>Name: " . $row["Name"]. "</b><br>";
            echo "<b>Work Street: " . $row["Address"]. "</b><br>";
			echo "<b>Work City: " . $row["City"]. "</b><br>";
			echo "<b>Work State: " . $row["State"]. "</b><br>";
			echo "<b>Work Country: " . $row["Country"]. "</b><br>";
			echo "<b>Work Zip: " . $row["Zip"]. "</b><br>";
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
