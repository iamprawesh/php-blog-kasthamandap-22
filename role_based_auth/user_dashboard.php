<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    header("Location: user_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Dashboard</title>
</head>

<body>
    <h1>Welcome to User Dashboard, <?php echo $_SESSION['name']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>

</html>