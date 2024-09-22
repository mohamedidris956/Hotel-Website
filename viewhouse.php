
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View House</title>
</head>
<body>

    <div class="topnav">
            <a href="home.html">Home</a>
            <a class="active" href="house.php">Houses</a>
            <a href="contact.html">Contact</a>
            <a href="about.html">About</a>
            <a href="index.php">Log Out</a>
    </div>


    <?php
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "housing";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM Houses";
    $result = mysqli_query($conn, $sql);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p class='view";
            if ($row["furnished"] == "Yes") {
                echo " furnished";
            }
            echo "'>";
            echo "<b>Location:</b> " . $row["location"] . "<br>";
            echo "<b>Rooms:</b> " . $row["rooms"] . "<br>";
            echo "<b>Size:</b> " . $row["size"] . "<br>";
            echo "<b>Furnished:</b> " . $row["furnished"] . "<br>";
            echo "<b>Parking:</b> " . $row["parking"] . "<br>";
            echo "<b>Price:</b> " . $row["price"] . "<br>";
            echo "<b>ID:</b> " . $row["id"] . "<br>";
            echo "</p>";
        }        
    } else {
        echo "No houses found.";
    }

    // Close connection
    mysqli_close($conn);
    ?>

</body>
</html>
