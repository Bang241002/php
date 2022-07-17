<?php
function myTest() {
    static $x = 0;
    echo $x ;
    $x++;
}
myTest();
echo "<br>\n";
myTest();
echo "<br>\n";
myTest();
?>
