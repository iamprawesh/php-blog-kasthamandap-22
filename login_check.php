<?php
    if (isset($_SESSION['name'])) {
        // echo $_SERVER["REQUEST_URI"];
        header("location: dashboard.php");
    }
?>