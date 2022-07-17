<?php
    header('Content-type: text/plain');
    $name = "William";
    $str = '$name is displayed. \\n';
    echo ($str);
    echo "\n";
    $str = "$name is displayed \n". "Goodbye";
    echo($str);
?>

