<?php
session_start();

include("../connection.php");

include("../session_check.php");

$catId = $_GET['id'];
$nameErr = "";
$hasError = false;

$category_name = "";
echo $catId;

// fetching data and displaying


$sqlfetch = "Select * from  `category` where id=$catId";

$res = mysqli_query($conn, $sqlfetch); // returns True if data is inserted
    
if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res); // fetch data from our table
    $category_name = $row['name'];
}

echo $category_name;

// // updating data to server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["cat_name"])){
        $hasError = true;
        $nameErr = "Name is Required";
    } else {
        $nameErr = "";
        $name = $_POST["cat_name"];
    }
    if(!$hasError){

        $sql = "update `category` set name='$name'  where id=$catId";

        $result = mysqli_query($conn, $sql); // returns True if data is inserted
        if ($result) {
          header('Location: view.php');
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


    <h1 class="text-center">Update Category</h1>
    <div class="mt-5">


        <?php if($hasError): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $nameErr ?>
        </div>
        <?php endif ?>





        <form method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input value="<?php echo $category_name; ?>" name="cat_name" type="text" class="form-control"
                    id="exampleInputEmail1">
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>

</body>

</html>