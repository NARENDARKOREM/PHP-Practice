<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

echo "Welcome, " . $_SESSION['user_name'] . "!<br>";
echo "<a href='logout.php'>Logout</a>";
?>
