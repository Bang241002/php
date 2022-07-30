<?php
if (isset($_POST["id"]) && !empty($_POST["id"])){
    require_once 'connect.php';

    $sql = "Delete from book where id = ?";

    if ($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt,"i",$param_id);

        $param_id = trim($_POST["id"]);

        if (mysqli_stmt_execute($stmt)) {
            header("location: index.php");
            exit();
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    mysqli_stmt_close($stmt);

    mysqli_close($link);
}else{
    if (empty(trim($_GET["id"]))){
        header("location: index.php");
        exit();
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>book</title>
</head>
<body>
<div>
    <div>
        <h2>Delete </h2>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
            <p>Are you sure you want to delete this record?</p><br>
            <p>
                <input type="submit" value="Yes" >
                <a href="index.php">No</a>
            </p>
        </div>
    </form>
</div>
</body>
</html>
