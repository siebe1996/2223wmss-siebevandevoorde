<?php
$sentence = $argv[1];
$alphabet = array();
for($i = 97; $i < 123; $i++){
    $alphabet[] = chr($i);
}
$sentence = str_replace([',','.','?','!',';',' '], '',$sentence);
$sentence = strtolower($sentence);
$missing = array();
foreach ($alphabet as $char){
    if (strpos($sentence, $char) === false){
        $missing[] = $char;
    }
}
var_dump($missing);

