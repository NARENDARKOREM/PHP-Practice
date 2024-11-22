<?php
session_start();
include 'config.php';

$name = $email = $password = "";
$nameErr = $emailErr = $passwordErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['name'])) {
        $nameErr = "Name is required.";
    } else {
        $name = sanitizeInput($_POST['name']);
        if (!preg_match("/^[A-Za-z ]*$/", $name)) {
            $nameErr = "Name should contain only letters.";
        }
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required.";
    } else {
        $email = sanitizeInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    if (empty($_POST['pwd'])) {
        $passwordErr = "Password is required.";
    } else {
        $password = sanitizeInput($_POST['pwd']);
        if (strlen($password) < 6) {
            $passwordErr = "Password must be at least 6 characters long.";
        }
    }

    if (empty($nameErr) && empty($emailErr) && empty($passwordErr)) {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO students (name, email, password) VALUES (?, ?, ?)";
        
        // Debugging: Check if the connection is still open
        if ($conn->ping()) {
            echo "Connection is still open.<br>";
        } else {
            die("Connection has been closed.<br>");
        }
        
        $stmt = $conn->prepare($sql);
        
        // Debugging: Check if the prepare statement was successful
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("sss", $name, $email, $hashPassword);
        if ($stmt->execute()) {
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

function sanitizeInput($data) {
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

$conn->close(); // Close the connection at the end of the script
?>
