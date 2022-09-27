<?php
$alphabet = array();
for($i = 97; $i < 123; $i++){
    $alphabet[] = chr($i);
}
var_dump($alphabet);
$keyValues = '';
foreach ($alphabet as $key => $value){
    $keyValues .= ($key+1).$value;
}
var_dump($keyValues);
var_dump(implode(',', $alphabet));
var_dump(count($alphabet));
var_dump(array_shift($alphabet));
var_dump(count($alphabet));
$cities = array(9000 => 'Gent', 1000 => 'Brussel', 2000 => 'Antwerpen', 8500 => 'Kortrijk', 3000 => 'Leuven', 3500 =>'Hasselt');
$zips = array_keys($cities);
var_dump(array_sum($zips));
asort($cities);
var_dump($cities);
krsort($cities);
var_dump($cities);

for ($i = 0; $i < 10000; $i+=1000) {
    if (array_key_exists($i, $cities)) {
        echo strtoupper($cities[$i]) . PHP_EOL;
    }
}
?>
