<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "realm");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

$name = $email = $phone = $password = $confirmPassword = "";
$nameErr = $emailErr = $phoneErr = $passwordErr = $confirmPasswordErr = $loginErr = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $nameErr = "Name is Required";
    } else {
        $name = sanitizeInput($_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and spaces allowed";
        }
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is Required";
    } else {
        $email = sanitizeInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    if (empty($_POST['phone'])) {
        $phoneErr = "Phone Number is Required";
    } else {
        $phone = sanitizeInput($_POST['phone']);
        if (!preg_match("/^\d{10}$/", $phone)) {
            $phoneErr = "Invalid Mobile Number. Must be 10 digits";
        }
    }

    if (empty($_POST['password'])) {
        $passwordErr = "Password is Required";
    } else {
        $password = sanitizeInput($_POST['password']);
        if (strlen($password) < 8) {
            $passwordErr = "Password must be at least 8 characters long.";
        }
    }

    if (empty($_POST['confirmPassword'])) {
        $confirmPasswordErr = "Confirm the Password";
    } else {
        $confirmPassword = sanitizeInput($_POST['confirmPassword']);
        if ($password !== $confirmPassword) {
            $confirmPasswordErr = "Passwords do not match";
        }
    }

    if (empty($nameErr) && empty($emailErr) && empty($phoneErr) && empty($passwordErr) && empty($confirmPasswordErr)) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$hashedPassword')";

        if ($conn->query($sql) === TRUE) {
            $successMessage = "Form submitted and data inserted into database";
            echo "<script>
                alert('$successMessage');
                window.location.href = 'login_form.php';
            </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


function sanitizeInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            color: red;
        }
        .success{
            color: green;
        }
        .required{
            color: red;
        }
    </style>
</head>

<body>
    <h3>Registration Form</h3>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name">
        <span class="required">*</span>
        <br><br>

        <label for="email">E-Mail:</label>
        <input type="email" name="email">
        <span class="required">*</span>
        <br><br>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="">
        <span class="required">*</span>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" name="password">
        <span class="required">*</span>
        <br><br>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmPassword">
        <span class="required">*</span>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>