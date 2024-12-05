<?php
// PHP Server-side validation
$errors = [];
$successMessage = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and trim any extra spaces
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Server-side validation
    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long.";
    }

    // If there are no errors, display a success message
    if (empty($errors)) {
        $successMessage = "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script>
    // JavaScript Client-side validation
    function validateForm() {
        // Get form values
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Validate name
        if (name === "") {
            alert("Name is required.");
            return false;
        }

        // Validate email
        const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (email === "") {
            alert("Email is required.");
            return false;
        } else if (!email.match(emailPattern)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Validate password
        if (password === "") {
            alert("Password is required.");
            return false;
        } else if (password.length < 6) {
            alert("Password must be at least 6 characters long.");
            return false;
        }
        // If everything is okay, allow the form to submit
        return true;
    }
    </script>
</head>

<body>
    <h1>Form Validation Example</h1>

    <!-- Display success message if form submitted successfully -->
    <?php if ($successMessage): ?>
    <p style="color: green;"><?= $successMessage ?></p>
    <?php endif; ?>

    <!-- Display validation errors -->
    <?php foreach ($errors as $error): ?>
    <p style="color: red;"><?= $error ?></p>
    <?php endforeach; ?>

    <!-- Form -->
    <form id="myForm" method="POST" action="" onsubmit="return validateForm()">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"
            value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>"><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password"
            value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>