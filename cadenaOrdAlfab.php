<?php
    $cadena="zapato Zien Aomo estas";
    $arrayCadena=explode(" ",$cadena);
    sort($arrayCadena, SORT_STRING | SORT_FLAG_CASE);
    $cadenaOrdenada=implode(" ",$arrayCadena);
    print_r($cadenaOrdenada);
?>