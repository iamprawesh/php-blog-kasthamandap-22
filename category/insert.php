<?php
session_start();

include("../connection.php");

include("../session_check.php");


$nameErr = "";
$name = "";
$hasError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["cat_name"])){
        $hasError = true;
        $nameErr = "Name is Required";
    } else {
        $nameErr = "";
        $name = $_POST["cat_name"];
    }
    if(!$hasError){
        // insert into database
        $sql = "insert into category(name) values('$name')";

        $result = mysqli_query($conn, $sql); // returns True if data is inserted
        if ($result) {
         // f - Redirect user on view
        //   header('Location: view.php?created=true');
          header('Location: view.php');
        //   echo "Item Inserted Successfully ";

        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="container">


    <h1 class="text-center">Create Category</h1>
    <div class="mt-5">


        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $nameErr ?>
        </div>
        <?php endif ?>




        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input name="cat_name" type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
    </div>

</body>

</html>