<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
<div class="topnav">
            <a href="index.php">Login</a>
            <a class="active" href="register.php">Register</a>
            <a href="contact2.html">Contact</a>
            <a href="about2.html">About</a>
    </div>

    <div class="login-form">
        <h2>Register</h2>
        <form method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" name="Register" value="Register">
        </form>
        <button><a href="index.php">Login</a></button>
        <?php
            $regmessage = "";
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
            if (isset($_POST["Register"])) {
                // Get the form data
                $email = $_POST["email"];
                $password = $_POST["password"];

                // Execute INSERT query to add new entry to the database
                $sql = "INSERT INTO User (email, password) VALUES ('$email', '$password')";

                if (mysqli_query($conn, $sql)) {
                    $regmessage = "New Account Created Successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }

            // Close connection
            mysqli_close($conn);

            // Display message if it's not empty
            if (!empty($regmessage)) {
                echo '<div class="error-message">' . $regmessage . '</div>';
            }
        ?>
    </div>
</body>
</html>
