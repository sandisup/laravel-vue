<?php
$nilai= 100;

switch ($nilai) {
    case (($nilai >=90) && ($nilai <=100)):
        echo "nilai A";
        break;
    case (($nilai >=80) && ($nilai <=89)):
        echo "nilai B";
        break;
    case (($nilai >=70) && ($nilai <=79)):
        echo "nilai C";
        break;
    case (($nilai >=0) && ($nilai <=69)):
        echo "nilai D";
        break;
    default:
        echo "masukkan nilai yang benar";
        break;
}
?>