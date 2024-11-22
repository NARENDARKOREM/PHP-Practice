<?php
session_start();
include 'config.php';

$email = $password = "";
$emailErr = $passwordErr = "";
$loginErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = sanitizeInput($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format.";
        }
    }

    if (empty($_POST['pwd'])) {
        $passwordErr = "Password is required";
    } else {
        $password = sanitizeInput($_POST['pwd']);
    }

    if (empty($emailErr) && empty($passwordErr)) {
        $sql = "SELECT id, name, password FROM students WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['name'];
                header('Location: welcome.php');
                exit();
            } else {
                $loginErr = "Invalid email or password";
            }
        } else {
            $loginErr = "No account is found with this email.";
        }
        // $stmt->close();
    }
}

function sanitizeInput($data) {
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    $data = trim($data);
    return $data;
}

$conn->close();
?>
