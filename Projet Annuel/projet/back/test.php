
<?php

date_default_timezone_set('Europe/Paris');

require('../bdd_connexion.php');

$bddConnexion = bddConnect();



function timeAgo($timestamp){
    $timeAgo = strtotime($timestamp);
    //var_dump($timeAgo);
    $currentTime = time();
    //var_dump($currentTime);
    $timeDifference = $currentTime - $timeAgo;
    //$var_dump($timeDifference);

    $seconds = $timeDifference;
    $minutes = round($seconds / 60 );   // => 60 seconds
    $hours = round($seconds / 3600);    // => 3600 60 min
    $days = round($seconds / 86400);    // => 86400 = 24*60*60
    $weeks = round($seconds / 604800);  // 7*27*60*60
    $months = round($seconds / 2629440); // ((365+365+365+365+365) / 5 / 12) * 24 * 60 * 60
    $years = round($seconds / 31553280);

    if($seconds <= 60){
        return 'Just Now';

    }else if($minutes <= 60){
        if($minutes == 1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }

    }else if($hours <= 24){
        if($hours == 1){
            return "an hour ago";
        }
        else{
            return "$hours hrs ago";
        }

    }else if($days <= 7){
        if($days == 1 ){
            return "Yesterday";
        }else {
            return "$days days ago";
        }

    }else if($weeks <= 4.3){
        if($weeks == 1){
            return "a week ago";
        }else {
            return "$weeks weeks ago";
        }

    }else if($months <= 12){
        if($months == 1){
            return "a month ago";
        }
        else {
            return "$months months ago";
        }

    }else {
        if($years == 1){
            return "one year ago";
        }else {
            return "$years years ago";
        }
    }




}




?>


