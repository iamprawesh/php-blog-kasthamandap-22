<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document11</title>
</head>


<body>
    <?php
$error = "";
 
if(isset($_POST['button1'])) {
    // echo "This is Button1 that is selected";
    $error = "Button1";

}
if(isset($_POST['button2'])) {
    $error = "Button2";
    header('Location: login.php');

    // echo "This is Button2 that is selected";
}

?>
    <span><?php echo $error; ?></span>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="submit" name="button1" class="button" value="Button1" />
        <input type="submit" name="button2" class="button" value="Button2" />
    </form>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <input type="submit" name="button3" class="button" value="Button3" />
        <input type="submit" name="button4" class="button" value="Button4" />
    </form>

</body>

</html>