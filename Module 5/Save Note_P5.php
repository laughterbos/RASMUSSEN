<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml"><head>    <meta charset="utf-8" />    <title>Write Every Day</title>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Include jQuery Mobile stylesheets -->    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <!-- Include the jQuery library -->    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <!-- Include the jQuery Mobile library -->    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head><body>    <div data-role="page">
        <div data-role="header">            <h1>Welcome to writing every day</h1>        </div>
        <div data-role="main" class="ui-content">
        <?php            $servername = "us-cdbr-azure-southcentral-f.cloudapp.net";            $username = "b13fe870529434";            $password = "b3092936";            $dbname = "acsm_9ab42719d04fd9b";
                $note = (isset($_POST['note'])    ? $_POST['note']   : '');                $UserID = (isset($_POST['User ID'])    ? $_POST['User ID']   : '');
            // Create connection            $conn = mysqli_connect($servername, $username, $password, $dbname);            // Check connection            if (!$conn) {                die("Connection failed: " . mysqli_connect_error());            }
            $sql= "Insert Into 'Notes' ('id','Text','User','date') Values(NULL,$note,$UserID,NULL)";
            mysqli_close($conn);        ?>
        Note successfully added
        </div>
        <div data-role="footer">            <h1>Footer</h1>        </div>    </div></body></html>
