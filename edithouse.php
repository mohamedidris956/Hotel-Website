<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit House</title>
</head>
<body>

<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "housing";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Get the form data
    $id = $_POST["id"];
    $location = $_POST["location"];
    $rooms = $_POST["rooms"];
    $size = $_POST["size"];
    $furnished = isset($_POST["furnished"]) ? "Yes" : "No";
    $parking = isset($_POST["parking"]) ? "Yes" : "No";
    $price = $_POST["price"];

    // Execute UPDATE query to update existing entry in the database
    $sql = "UPDATE Houses SET location='$location', rooms='$rooms', size='$size', furnished='$furnished', parking='$parking', price='$price' WHERE id='$id'";

    $successMessageEdit = "";
    if (mysqli_query($conn, $sql)) {
        $successMessageEdit = "Location: $location, ID: $id has been successfully edited";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }      
}

// Check if the house ID is provided as a URL parameter
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Retrieve the existing house data from the database
    $sql = "SELECT * FROM Houses WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $location = $row["location"];
        $rooms = $row["rooms"];
        $size = $row["size"];
        $furnished = $row["furnished"];
        $parking = $row["parking"];
        $price = $row["price"];
    } else {
        
    }
}

  

// Close connection
mysqli_close($conn);
?>

<div class="topnav">
        <a href="home.html">Home</a>
        <a class="active" href="house.php">Houses</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
        <a href="index.php">Log Out</a>
</div>

<div class="select-house">
    <h2>Select a House to Edit</h2>
    <form method="get">
        <label for="id">House ID:</label>
        <input type="text" name="id" required>
        <input type="submit" value="Edit">
    </form>
    <?php if (isset($_GET["id"]) && mysqli_num_rows($result) == 0) { ?>
        <div class="error">
            <p style="color:red">House ID not found.</p>
        </div>
    <?php } ?>
</div>


<div class="edit">
    <?php if (isset($id) && mysqli_num_rows($result) > 0) { ?>
        <h2 style="color:green">Edit House ID: <?php echo $id; ?></h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="location">Location:</label>
            <input type="text" name="location" value="<?php echo $location; ?>" required>
            <br><br>
            <label for="rooms">Rooms:</label>
            <input type="number" name="rooms" value="<?php echo $rooms; ?>" required>
            <br><br>
            <label for="size">Size:</label>
            <select name="size" id="size">
                <option value="Small">Small</option>
                <option value="Medium">Medium</option>
                <option value="Large">Large</option>
            </select>   
            <br><br>
            <label for="furnished">Furnished:</label>
            <select name="furnished" required>
                <option value="1" <?php if ($furnished == 1) echo "selected"; ?>>Yes</option>
                <option value="0" <?php if ($furnished == 0) echo "selected"; ?>>No</option>
            </select>
            <br><br>
            <label for="parking">Parking:</label>
            <select name="parking" required>
                <option value="1" <?php if ($parking == 1) echo "selected"; ?>>Yes</option>
                <option value="0" <?php if ($parking == 0) echo "selected"; ?>>No</option>
            </select>
            <br><br>
            <label for="price">Price:</label>
            <input type="number" name="price" value="<?php echo $price; ?>" required>
            <br><br>
            <input type="submit" name="submit" value="Update Entry">
            <div class="success-message <?php echo $successMessageEdit ? 'visible' : ''; ?>"><?php echo $successMessageEdit; ?></div>
        </form>

    <?php } else if (isset($_POST["submit"])) { ?>
        <p>House not found.</p>
    <?php } else { ?>
        <p style="color:red; padding: 10px">No house selected for editing.</p>
    <?php } ?>

</div>



