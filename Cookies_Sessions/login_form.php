<?php
session_start(); // Start session

// Database connection
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "realm");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Variables and error messages
$email = $password = "";
$emailErr = $passwordErr = $loginErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);

    // Validate inputs
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Valid email is required.";
    }

    if (empty($password)) {
        $passwordErr = "Password is required.";
    }

    // If no validation errors, attempt login
    if (empty($emailErr) && empty($passwordErr)) {
        $sql = "SELECT * FROM users WHERE email = ?";   
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Debugging lines
            echo 'Hashed Password in DB: ' . $user['password']; 
            echo 'Password entered: ' . $password;

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: welcome.php");
                exit();
            } else {
                $loginErr = "Incorrect password.";
            }
        } else {
            $loginErr = "No account found with that email.";
        }
    }
}

// Sanitize input function
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
<h2>Login Form</h2>
<form action="" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
    <span><?php echo $emailErr; ?></span><br>

    <label for="password">Password:</label>
    <input type="password" name="password"><br>
    <span><?php echo $passwordErr; ?></span><br>

    <input type="submit" value="Login">
</form>

<span><?php echo $loginErr; ?></span>

</body>
</html>
