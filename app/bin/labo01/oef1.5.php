<?php
$parameter = $argv[1];
if (isPalinDrome($parameter)){
    print_r($parameter . ' is a palindrome' . PHP_EOL);
}
else {
    print_r($parameter . ' is not a palindrome' . PHP_EOL);
}
function isPalinDrome(string $string): bool
{
    return strrev($string) === $string;
}

$p = $argv[2];
if (isLeap($p)){
    print_r($p . ' is a leapyear' . PHP_EOL);
}
else {
    print_r($p . ' is not a leapyear' . PHP_EOL);
}
function isLeap($year): bool{
    return (date('L', mktime(0, 0, 0, 1, 1, $year)) == 1);
}

$kw = $argv[3];
$kinderen = $argv[4];

print_r('het totaal is '.cost($kw, $kinderen).PHP_EOL);
function cost($kw, $kinderen):float{
    $total = 0;
    if($kw > 150){
        $total += ($kw - 150) * 0.3;
        $kw -= ($kw - 150);
    }
    if($kw > 50 && $kw <= 150){
        $total += ($kw - 50) * 0.25;
        $kw -= ($kw - 50);
    }
    $total += $kw * 0.15;
    if ($kinderen > 2){
        $total *= 0.9;
    }
    return $total;
}