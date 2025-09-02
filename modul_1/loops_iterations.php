<?php
//for loop
for ($i = 0; $i < 20; $i++) {
    echo "i value = " . $i;
}

//while loop
$number = 1;
while ($number < 10) {
    echo 'value : ' . $number ;
    $number += 1;
}

//do while
$number = 1;
do {
    echo 'value : ' . $number ;
    $number += 1;
} while ($number < 10);

// foreach with break / continue exemple
$values = ['one', 'two', 'three'];
foreach ($values as $value) {
    if ($value === 'two') {
        break; // exit loop
    } elseif ($value === 'three') {
        continue; // next loop iteration
    }
}
?>