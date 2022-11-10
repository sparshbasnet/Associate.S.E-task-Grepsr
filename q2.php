<?php
function convert($num, $precision) {
    $num_break=explode(".", $num);
    $num_break[1]=substr_replace($num_break[1],".",$precision,0);

    $num_break[1]=floor($num_break[1]);

    $floor_num= array($num_break[0],$num_break[1]);
    return implode(".",$floor_num);
}
print convert(2.99999,2)."\n";
print convert(199.99999,4)."\n";
?>