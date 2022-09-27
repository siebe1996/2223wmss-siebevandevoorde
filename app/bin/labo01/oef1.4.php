<?php
$dateString = $argv[1];
try {
    $dateTimeObject = new DateTime($dateString);
    $date['timestamp'] = date_timestamp_get($dateTimeObject);
    $timezone = date_timezone_get($dateTimeObject);
    $date['timezone'] = $timezone->getName();
    $date['day'] = $dateTimeObject->format('l');
    $date['date'] = $dateTimeObject->format('dmY');
    $date['time'] = $dateTimeObject->format('h:i A');
    $date['dateFull'] = $dateTimeObject->format('d F Y');
    print_r($date);
    //echo $dateTimeObject->format('y-d-m');
}catch (\Exception $e){
    echo  $dateString.' is not a valid date.';
}

