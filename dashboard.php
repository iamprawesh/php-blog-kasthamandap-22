<?php
session_start();

include("connection.php");
include("session_check.php");

// echo $_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="container">
    <h1>dashboard</h1>

    <a class="btn btn-info text-white" href="category/view.php">View Category</a>
    <a class="btn btn-info text-white" href="category/view.php">Students</a>
    <a class="btn btn-info text-white" href="blog/insert.php">Posts</a>


</body>

</html>