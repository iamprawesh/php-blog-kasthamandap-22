<?php
include 'connection.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($fullName) && !empty($email) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'admin'; // Fixed role for admin
        $sql = "INSERT INTO users (full_name, email, password, role) VALUES ('$fullName', '$email', '$hashedPassword', '$role')";

        if ($conn->query($sql) === TRUE) {
            header("Location: admin_login.php");
            exit();
        } else {
            $error = "Error: " . $conn->error;
        }
    } else {
        $error = "All fields are required!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Signup</title>
</head>

<body>
    <h2>Admin Signup</h2>
    <form method="POST">
        <input type="text" name="full_name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Signup</button>
        <p><?php echo $error; ?></p>
    </form>
</body>

</html>