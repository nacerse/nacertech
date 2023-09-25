<?php
// Start a session (if not already started)
session_start();

// Define the valid username and password
$valid_username = "nacer"; // Replace with your desired username
$valid_password = "nacer"; // Replace with your desired password

// Check if the user submitted the login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $submitted_username = $_POST["username"];
    $submitted_password = $_POST["password"];

    // Validate the submitted username and password
    if ($submitted_username === $valid_username && $submitted_password === $valid_password) {
        // Authentication successful
        // Store user information in a session variable (e.g., user ID)
        $_SESSION["user_id"] = 1; // You can use a user ID or any identifier

        // Redirect to a protected page (e.g., dashboard)
        header("Location: dashboard.php");
        exit;
    } else {
        // Authentication failed
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Your HTML head content -->
</head>
<body>
    <div class="form">
        <h2>Login Here</h2>
        <form action="" method="post">
            <input type="text" name="username" placeholder="Enter username Here" required>
            <input type="password" name="password" placeholder="Enter Password Here" required>
            <button type="submit" class="btnn">Login</button>
        </form>

        <?php
        // Display an error message (if authentication failed)
        if (isset($error_message)) {
            echo "<p>$error_message</p>";
        }
        ?>
    </div>
</body>
</html>
