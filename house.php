<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Residence Management</title>
</head>
<body>
    <div class="topnav">
        <a href="home.html">Home</a>
        <a class="active" href="#houses">Houses</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
        <a href="index.php">Log Out</a>
        </div>
    </div>
    <?php 
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "product";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $housing);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
    
    <div class="container">
    <a href="viewhouse.php" class="icon-button">
        <img src="view.png" alt="View Houses Icon">
        <h3>View houses currently in the database</h3>
    </a>
    <a href="addhouse.php" class="icon-button">
        <img src="add.png" alt="Add House Icon">
        <h3>Add new house to the database</h3>
    </a>
    <a href="edithouse.php" class="icon-button">
        <img src="edit.png" alt="Edit House Icon">
        <h3>Edit house in the database</h3>
    </a>
    <a href="deletehouse.php" class="icon-button">
        <img src="delete.png" alt="Delete House Icon">
        <h3>Delete a house from the database</h3>
    </a>
</div>


</body>
</html>