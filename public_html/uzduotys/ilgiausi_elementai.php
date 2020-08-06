<?php

$arr = ["abcd", "abc", "de", "hjjj", "g", "wer"];

$maxLenght = 0;
$minLenght = 999999;

foreach ($arr as $value) {
    if(strlen($value) > $maxLenght){
        $maxItem = $value;
        $maxLenght = strlen($value);
    }
}
foreach ($arr as $value) {
    if(strlen($value) < $minLenght){
        $minItem = $value;
        $minLenght = strlen($value);
    }
}

echo "DID: ". $maxItem;
echo "<br>MIN: ". $minItem;