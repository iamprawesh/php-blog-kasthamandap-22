<?php
session_start();

include("../connection.php");

include("../session_check.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $userid = $_SESSION['id'];
    $uploadDir = '../uploads/'; 

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image'];
        $imageName = $image['name'];
        // str_replace(" ","_",$image['name']);
        $imageTmpName = $image['tmp_name'];
        $imagePath = $uploadDir . $imageName;
    

        if (move_uploaded_file($imageTmpName, $imagePath)) {
            $sql = "INSERT INTO posts (title, description, userid, image_url) VALUES ('$title', '$description', $userid, '$imagePath')";
            $result = mysqli_query($conn, $sql); // returns True if data is inserted

            if ($result === TRUE) {
                echo "Blog entry created successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Image not uploaded or upload error.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
</head>

<body>
    <a href="view.php" class="btn btn-info mb-4">View Blog</a>

    <h2>Create a New Blog Post</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br><br>

        <label for="image">Upload Image:</label>
        <input type="file" name="image" accept="image/*"><br><br>

        <button type="submit">Create Blog</button>
    </form>
</body>

</html>