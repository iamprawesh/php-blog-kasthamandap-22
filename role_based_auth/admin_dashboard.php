<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Welcome to Admin Dashboard, <?php echo $_SESSION['name']; ?>!</h1>
    <a href="logout.php">Logout</a>
</body>

</html>