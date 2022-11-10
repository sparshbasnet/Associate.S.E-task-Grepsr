<?php

function checkint($a) {
    if (is_int($a)) {
        print $a . " is integer \n";
    } else {
        print $a . " is not integer \n";
    }
}

checkint(42);
checkint(66.9);

function checknumeric($a) {
    if (is_numeric($a)) {
        print $a . " is numeric \n";
    } else {
        print $a . " is not numeric \n";
    }
}

checknumeric(42);
checknumeric(45.8);
checknumeric("56");
checknumeric("Hello");

function checkinteger($a) {
    if (is_integer($a)) {
        print $a . " is integer \n";
    } else {
        print $a . " is not integer \n";
    }
}

checkinteger(42);
checkinteger("Hello");




?>