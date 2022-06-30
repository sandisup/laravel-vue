<?php

    function convert_date($value) {
        return date('h:i:s, d M Y', strtotime($value));
    }

?> 