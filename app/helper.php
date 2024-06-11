<?php
function CodeGenerator($length) {
    // Define the characters that can be used in the string
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    
    // Generate the random string
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    
    return $randomString;
}

function timeFormat($time) {
    list($hours, $minutes) = explode(':', $time);

    $hours = (int)$hours;
    $minutes = (int)$minutes;
    $ampm = $hours >= 12 ? 'PM' : 'AM';

    $hours = $hours % 12;
    if ($hours == 0) {
        $hours = 12;
    }

    $minutes = str_pad($minutes, 2, '0', STR_PAD_LEFT);
    return "{$hours}:{$minutes} {$ampm}";
}