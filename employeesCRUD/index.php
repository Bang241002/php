<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <title>Dashboard</title>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2 {
            table tr td: last-child a{
                margin-right:15px ;
            }
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function (){
           $('[data-topbar="tooltip"]'.tooltip());
        });
    </script>

</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-hear clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add new Employee</a>
                    </div>
                    <?php
                    require_once 'config.php';

                    $sql = "SELECT * FROM employees";
                    if ($result = mysqli_query($link, $sql)){
                        if (mysqli_num_rows($result) > 0){
                            echo"<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th># </th>";
                            echo "<th>name </th>";
                            echo "<th>address </th>";
                            echo "<th>salary </th>";
                            echo "<th>Action </th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>" ;
                                echo "<td>" . $row['name'] ."</td>" ;
                                echo "<td>" . $row['address'] ."</td>" ;
                                echo "<td>" . $row['salary'] ."</td>" ;
                                echo "<td>";
                                echo "<a href='read.php?id= ".$row ['id'] . "' title='View Record' data-topbar='tooltip' ><span class='glyphicon glyphicon-eye-open'></span> </a>";
                                echo "<a href='update.php?id= ".$row ['id'] . "' title='Update Record' data-topbar='tooltip' ><span class='glyphicon glyphicon-pencil '></span> </a>";
                                echo "<a href='delete.php?id= ".$row ['id'] . "' title='Delete Record' data-topbar='tooltip' ><span class='glyphicon glyphicon-trash'></span> </a>";
                                "</td>" ;
                                "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        }else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }

                    }else{
                        echo "ERROR : Could not able to execute $sql" . mysqli_error($link);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>