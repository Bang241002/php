<?php
$a = 0;
$b = 10;
if( $a && $b ) {
    echo "TEST1 : Both a and b are true<br/>";
}else {
    echo "TEST1 : Either a or bis false<br/>";
}
if( $a and $b ) {
    echo "TEST2 : Both a and b are true<br/>";
}else {
    echo "TEST2 : Either a or b is false<br/>";
}
if( $a || $b ) {
    echo "TEST3 : Either a or bis true<br/>";
}else {
    echo "TEST3 : Both a and b are false<br/>";
}
if( $a or $b ) {
    echo "TEST4 : Either a or b is true<br/>";
}else {
    echo "TEST4 : Both a and b are false<br/>";
}
$a = 10;
$b = 0;
if( $a ) {
    echo "TESTS : a is true <br/>";
}else {
    echo "TESTS : a is false<br/>";
}
if( $b ) {
    echo "TEST6 : bis true <br/>";
}else {
    echo "TEST6 : bis false<br/>";
}
if(!$a ){
    echo "TEST7 : а is true <br/>";
}else {
    echo "TEST] : a is false<br/>";
}
if(!$b ){
    echo "TEST8 : b is true <br/>";
}else {
    echo "TESTB : b is false<br/>";
}
?>