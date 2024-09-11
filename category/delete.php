<?php
        session_start();

    include("../connection.php");

    include("../session_check.php");
    $catId = $_GET['id'];
    $sql = "delete from category where id=$catId";

    $result = mysqli_query($conn, $sql); // returns True if data is inserted
    if ($result) {
      header('Location: view.php?deleted=true');
    }
?>