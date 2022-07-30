<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>book</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        td ,th{
            border: 1px solid #47b5ff;
            padding: 5px;
        }
        #title {
            display: flex;
            align-items: center;
        }
        #title button {
            background-color: #47b5ff;
            margin-left: 60px;
            padding: 10px;
        }
    </style>
</head>
<body>
<div id="table">
    <div id="title">
        <h2>Book</h2>
        <button><a href="create.php">Add new book</a></button>
    </div>
    <?php
    require_once 'connect.php';

    $sql = "Select * from book";
    $result = mysqli_query($link,$sql);
    if ($result) {
        if (mysqli_num_rows($result)>0) {
            echo "<table >";
            echo "<thead>";
            echo "<tr>";
            echo "<th>#</th>";
            echo "<th>Name</th>";
            echo "<th>Author</th>";
            echo "<th>Year</th>";
            echo "<th>Action</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['author'] . "</td>";
                echo "<td>" . $row['year'] . "</td>";
                echo "<td>";
                echo "<a href='read.php?id=" . $row['id'] ."' > <i class='fa-solid fa-eye'></i> </a>";
                echo "<a href='updatep.php?id=" . $row['id'] ."' > <i class='fa-solid fa-pen'></i> </a>";
                echo "<a href='delete.php?id=" . $row['id'] ."' > <i class='fa-solid fa-trash'></i> </a>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            mysqli_free_result($result);
        }else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
    mysqli_close($link);
    ?>
</div>
</body>
</html>
