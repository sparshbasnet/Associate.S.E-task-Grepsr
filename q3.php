<?php
$date = 'Sep 20 2021';
$date2 = '09092021';
function dateConversion($string) {
    $arr = explode('and', $string);
    $date = $arr[0];
    $date2 = $arr[1];
    $date = date('Y-m-d', strtotime($date));
    $date2 = date('M-d-Y', strtotime(preg_replace('/(.{2})/', '$1-',trim($date2) , 2)));
    echo $date. " and " .$date2;
}

dateConversion("Sep 20 2021 and 09092021");


  ?>