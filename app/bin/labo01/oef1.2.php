<?php
$sentence = $argv[1];
$sentence = str_replace([',','.','?','!',';'], '',$sentence);
print_r($sentence);
$words = explode(' ', $sentence);

$frequencies = [];
foreach ($words as $word){
    $word = strtolower($word);
    if(!array_key_exists($word,$frequencies)){
        $frequencies[$word] = 0;
    }
    $frequencies[$word]++;
}
arsort($frequencies);
print_r($frequencies);
?>

