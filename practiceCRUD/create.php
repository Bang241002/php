<?php

require_once 'connect.php';
$name_err = $author_err = $year_err = "";
$name = $author = "";
$year = 0;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Vui lòng nhập tên";
    } else {
        $name = $input_name;
    }

    $input_author = trim($_POST["author"]);
    if (empty($input_author)) {
        $author_err = 'Please enter an address.';
    } elseif (!filter_var(trim($_POST["author"]), FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z'-.\s]+$/")))) {
        $author_err = 'Vui lòng nhập tên hợp lệ';
    } else {
        $author = $input_author;
    }

    $input_year = trim($_POST['year']);
    $year = $input_year;


    if (empty($name_err) && empty($author_err) && empty($year_err)) {
        $sql = "INSERT INTO  (name, author, year) VALUES (?,?,?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssi", $param_name, $param_author, $param_year);

            $param_name = $name;
            $param_author = $author;
            $param_year = $year;

            if (mysqli_stmt_execute($stmt)) {
                header("location: index.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>book</title>
</head>
<body>
<div>
    <div>
        <h2>Create Record</h2>
    </div>
    <p>Vui lòng điền vào biểu mẫu này và gửi để thêm hồ sơ nhân viên vào cơ sở dữ liệu.</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label>Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <span><?php echo $name_err; ?></span>
        </div>
        <div>
            <label>Author</label>
            <input name="author" value="<?php echo $author; ?>">
            <span><?php echo $author_err; ?></span>
        </div>
        <div>
            <label>Year</label>
            <input type="text" name="year" class="form-control" value="<?php echo $year; ?>">
            <span><?php echo $year_err; ?></span>
        </div>
        <input type="submit" value="Submit">
        <a href="index.php">Cancel</a>
    </form>
</div>
</body>
</html>