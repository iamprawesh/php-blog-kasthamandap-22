<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <script src="script.js"></script>
</head>

<body>
    <?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and trim any extra spaces
    $name = trim($_POST['name']); 
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Server-side validation
    $errors = [];


    // Validate name
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    // Validate password
    if (empty($password)) {
        $errors[] = "Phone Number is required.";
    } elseif (strlen($password) < 6) {
        $errors[] = "Phone Number must be at least 6 characters long.";
    }

    // If there are errors, display them; otherwise, process the data
    if (!empty($errors)) {
        foreach ($errors as  $item) { 
            echo "<p style='color: red;'>$item</p>";
        }
    } else {
        // Process the form data (for example, save it to the database)
        echo "<p>Form submitted successfully!</p>";
        // Note: Never trust user input without validation and sanitization
    }
}
?>


    <form id="myForm" method="POST" onsubmit="return validateForm()">
        <label for="name">Name:</label> <span></span>
        <input type="text" id="name" name="name">
        <p id="pError" style="color:red;"></p>
        <label for=" email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <p id="pError2" style="color:red;"></p>

        <label for="password">Phone Number:</label>
        <input type="password" id="password" name="password"><br><br>
        <p id="pError3" style="color:red;"></p>

        <input type="submit" value="Submit">
    </form>

    <script src="script.js">

    </script>
</body>

</html>