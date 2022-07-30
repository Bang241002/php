<?php
require_once 'connect.php';
$name_err =$year_err=$author_err="";
if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql = "select * from book where id=".$id;
    if($result=mysqli_query($link,$sql)){
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $author = $row["author"];
        $year = $row["year"];
    }
}else{
    header("location: error.php");
    exit();
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $post_name =  $_POST["name"];
    $post_author = $_POST["author"];
    $post_year = $_POST["year"];
    $name = $post_name;
    $author = $post_author;
    $year = $post_year;
    //Xử lí lỗi
    $match_name = preg_match("/[\w]+/",$post_name);
    $match_author = preg_match("/[\w]+/",$post_author);
    $match_year = preg_match("/[\d]{4}/",$post_year);
    if(!$match_year){
        $year_err = "Năm không đúng định dạng: YYYY";
    }
    if(!$match_author){
        $author_err = "bắt buộc";
    }
    if(!$match_name){
        $name_err = "Bắt buộc";
    }
    //

    if($match_name && $match_author && $match_year){
        $sql = "update book set name = ?,author = ?, year =? where  id = ?";
        if($stm=mysqli_prepare($link,$sql)){
            mysqli_stmt_bind_param($stm,'ssii',$post_name,$post_author,$post_year,$id);
            if(mysqli_stmt_execute($stm)){
                header("location: index.php");
                exit();
            }else{
                echo "Something went wrong. Please try again later.";
            }
        }
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
        <h2>Update </h2>
        <p>Vui lòng chỉnh sửa các giá trị ipput và gửi để cập nhật hồ sơ.</p>
    </div>
    <form action="" method="post">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?=$name?>">
            <span style="color: #bf3400"><?php echo $name_err; ?></span>
        </div>
        <div>
            <label>Author</label>
            <input type="text" name="author" value="<?=$author?>">
            <span style="color: #47b5ff"><?php echo $author_err; ?></span>
        </div>
        <div>
            <label>Year</label>
            <input type="text" name="year" value="<?=$year?>">
            <span style="color: #47b5ff"><?php echo $year_err; ?></span>
        </div>
        <input type="hidden" name="id" value="">
        <input type="submit" value="Submit">
        <a href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>
