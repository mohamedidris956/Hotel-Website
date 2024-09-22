<?php
    $ErrorMessage = "";

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
    if (isset($_POST["login"])) {
        // Get the form data
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Execute SELECT query to check if user exists in the database
        $sql = "SELECT * FROM User WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Login successful.";
            // Redirect to the house.php page
            header("Location: home.html");
            exit();
        } else {
            $ErrorMessage = "Invalid Email or Password";
        }
    }

    // Close connection
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    
    <div class="topnav">
            <a class="active" href="index.php">Login</a>
            <a href="register.php">Register</a>
            <a href="contact2.html">Contact</a>
            <a href="about2.html">About</a>
    </div>

    <div class="login-form">
        <h2>Login</h2>
        <form method="post">
            <label for="email">Email:</label>
            <input type="text" name="email" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <br><br>
            <input type="submit" name="login" value="Login">
        </form>
        <button><a href="register.php">Register</a></button>
        <div class="error-message" <?php echo $ErrorMessage ? 'visible' : ''; ?>><?php echo $ErrorMessage; ?></div>
    </div>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>