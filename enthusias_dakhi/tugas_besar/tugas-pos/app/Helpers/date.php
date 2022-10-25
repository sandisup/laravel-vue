<?php

    function convert_date2($value) {
        return date('d m Y', strtotime($value));
    }

?> 

<?php

    function convert_date1($value) {
        return date('d M Y', strtotime($value));
    }

?> 

<?php

    function convert_date($value) {
        return date('h:i:s, d M Y', strtotime($value));
    }

?> 

<?php

    function convert_date3($value) {
        return date('h:i:s', strtotime($value));
    }

?> 