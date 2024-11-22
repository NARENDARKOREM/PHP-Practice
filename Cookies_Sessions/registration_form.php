<?php
session_start(); // Start session to manage user data

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
$name = $email = $phone = $password = $confirmPassword = "";
$nameErr = $emailErr = $phoneErr = $passwordErr = $confirmPasswordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $phone = sanitizeInput($_POST['phone']);
    $password = sanitizeInput($_POST['password']);
    $confirmPassword = sanitizeInput($_POST['confirmPassword']);

    // Validation
    if (empty($name)) $nameErr = "Name is required";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $emailErr = "Valid email is required";
    if (empty($phone) || !preg_match("/^\d{10}$/", $phone)) $phoneErr = "Valid phone number is required";
    if (empty($password) || strlen($password) < 8) $passwordErr = "Password must be at least 8 characters";
    if ($password !== $confirmPassword) $confirmPasswordErr = "Passwords do not match";

    // Check if email already exists
    if (empty($emailErr)) {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $emailErr = "Email already registered. Please choose another.";
        } else {
            // If no errors and email doesn't exist, proceed with registration
            if (empty($nameErr) && empty($phoneErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $name, $email, $phone, $hashedPassword);
                if ($stmt->execute()) {
                    $_SESSION['success'] = "Registration successful. Please log in!";
                    header("Location: login_form.php");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
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
    <title>Registration Form</title>
</head>
<body>
<h2>Registration Form</h2>
<form action="" method="POST">
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br>
    <span><?php echo $nameErr; ?></span><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
    <span><?php echo $emailErr; ?></span><br>

    <label for="phone">Phone:</label>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br>
    <span><?php echo $phoneErr; ?></span><br>

    <label for="password">Password:</label>
    <input type="password" name="password"><br>
    <span><?php echo $passwordErr; ?></span><br>

    <label for="confirmPassword">Confirm Password:</label>
    <input type="password" name="confirmPassword"><br>
    <span><?php echo $confirmPasswordErr; ?></span><br>

    <input type="submit" value="Register">
</form>

</body>
</html>
