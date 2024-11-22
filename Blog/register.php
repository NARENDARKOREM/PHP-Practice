<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "spaces";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $confirm_pwd = $_POST['confirm_password'];

    // Validate user input
    if ($pwd != $confirm_pwd) {
        echo "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

        // Insert user data into database
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful!";
            header("Location: login.php"); // Redirect to login page after registration
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
    }
    
    $conn = null; // Close connection
}
?>
