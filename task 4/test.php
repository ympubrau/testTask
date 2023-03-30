<?php
$array = [[5,3,3,1,3,2,8,0,989],[1,2,37,6,888,9,21,23],[5,4,3,2,1]];

echo "Before sort<br>";
for ($i = 0; $i < count($array); $i++){
    for ($j = 0; $j < count($array[$i]); $j++){
        echo $array[$i][$j];
        echo " ";
    }
    echo '<br>';
}

echo '<br>';


for ($i = 0; $i < count($array); $i++){
    quickSort($array[$i], 0,count($array[$i]) - 1);
}

echo "After sort<br>";
for ($i = 0; $i < count($array); $i++){
    for ($j = 0; $j < count($array[$i]); $j++){
        echo $array[$i][$j];
        echo " ";
    }
    echo '<br>';
}

function quickSort(&$arr, $low, $high) {
    $i = $low;
    $j = $high;
    $middle = $arr[ round(($low + $high)/2, 0, PHP_ROUND_HALF_DOWN)  ];  // middle — опорный элемент; в нашей реализации он находится посередине между low и high
    do {
        while($arr[$i] < $middle) ++$i;
        while($arr[$j] > $middle) --$j;
        if($i <= $j) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
            $i++; $j--;
        }
    } while($i < $j);

    if($low < $j){
        quickSort($arr, $low, $j);
    }

    if($i < $high){
        quickSort($arr, $i, $high);
    }
}

