<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "realm");

// Create database connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$email = $password = "";
$emailErr = $passwordErr = "";
$loginErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email'])) {
        $emailErr = "Email is required.";
    } else {
        $email = sanitizeInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password is required.";
    } else {
        $password = sanitizeInput($_POST['password']);
    }

    if (empty($emailErr) && empty($passwordErr)) {
        $sql = "SELECT id, name, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $name, $hashedPassword);
                $stmt->fetch();

                if (password_verify($password, $hashedPassword)) {
                    session_start();
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $email;
                    header("Location: welcome.php");
                    exit;
                } else {
                    $loginErr = "Invalid email or password.";
                }
            } else {
                $loginErr = "Invalid email or password.";
            }
            $stmt->close();
        } else {
            $loginErr = "Database query error.";
        }
    }
}

function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h3>Login Form</h3>
    <form action="" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter you email" value="<?php echo htmlspecialchars($email); ?>">
        <span class="error"><?php echo $emailErr; ?></span>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <span class="error"><?php echo $passwordErr; ?></span>
        <br><br>

        <input type="submit" value="Login">
    </form>

    <?php if (!empty($loginErr)) { ?>
        <p class="error"><?php echo $loginErr; ?></p>
    <?php } ?>
</body>

</html>
