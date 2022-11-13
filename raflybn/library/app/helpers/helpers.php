<?php
  
     function convert_date($value) {
        return date('d/m/y-H:i:s',strtotime($value));
     }
?>