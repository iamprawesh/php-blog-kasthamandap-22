<?php
session_start();

// Database connection
include("../connection.php");
include("../session_check.php");

// Check for any messages
// if (isset($_GET['deleted'])) {
//     echo "<div class='alert alert-success' role='alert'>Item has been deleted</div>";
// }
// ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1 class="my-4">List of Blogs</h1>
    <a href="insert.php" class="btn btn-info mb-4">Create New Blog</a>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">User ID</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT posts.id,posts.title,posts.description,posts.image_url, users.full_name as created_by FROM posts INNER join users on posts.userid=users.id;";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $user = $row['created_by'];
                        $imageUrl = ($row['image_url']);
                        
                        // Display each row
                        echo "
                        <tr>
                            <th scope='row'>$id</th>
                            <td>$title</td>
                            <td>$description</td>
                            <td>$user</td>
                            <td><img src='$imageUrl' alt='Image' style='width: 100px; height: auto;'></td>
                            <td>
                                <a href='update_blog.php?id=$id' class='btn btn-info'>Update</a>
                                <a href='delete_blog.php?id=$id' class='btn btn-danger'>Delete</a>
                            </td>
                        </tr>
                        ";
                    }
                } else {
                    echo "<tr><td colspan='6'>No blog entries found.</td></tr>";
                }

                // Close the connection
                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>

</html>