<?php

    function convert_date($value){
        return date('H:i:s - d M Y', strtotime($value));
    }

    function interval_date($date_start, $date_end){
        // $diff = strtotime($date_end) - strtotime($date_start);
        $interval = $date_end->difd($date_start);
        return $interval;
    }

?>