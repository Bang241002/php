<?php
$myDB = new mysqli('localhost', 'root', '', 'library');

if ($myDB->connect_error){
    die('connect Erroe ('. $myDB->connect_error . ')' . $myDB->connect_error);
}
$sql = "SELECT * FROM books WHERE available = 1 ORDER BY title";
$result = $myDB->query($sql);
?>

<table eellSpacing="2" eellSpacing="6" align="center" border="1">
    <tr>
        <td colspan="4">
            <h3 align="center">These Books are currently available</h3>
        </td>
    </tr>
    <tr>
        <td align="center">Title</td>
        <td align="center ">Year Publushed</td>
        <td align="center">ISBn</td>
    </tr>
<?php
While ($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>";

    echo stripslashes($row["title"]);
    echo "</td><td align='center'>";
    echo $row["pub_year"];
    echo "</td><td>";
    echo $row["ISBN"];
    echo "</td>";
    echo "</tr>";
}
?>


</table>
