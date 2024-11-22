<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php"); 
    exit;
}

if (!isset($_SESSION['refreshed']) || $_SESSION['refreshed'] !== true) {
    $_SESSION['refreshed'] = true;

    echo '<script type="text/javascript">window.location.reload();</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_name']; ?>!</h1>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
