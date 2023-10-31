<!DOCTYPE html>
<html>
<head>
    <title>Ejemplo de PHP embebido</title>
</head>
<body>
    <h1>Ejemplo de PHP embebido</h1>

    <?php
    // Código PHP embebido
    $radio = 4;
    $PI= round(M_PI, 4);
    $longitud = 2 * $PI * $radio;
    $superficie= $PI * $radio ** 2;
    $volumen = 4/3 * $PI * $radio;
    echo "<h1>Longitud: $longitud </h1>" ;
    echo "<h2>Superficie: $superficie </h2>"; 
    echo "<h3>Volumen: $volumen </h3>" ;
    echo date('d-m-Y');
    $hoy= date("d-m-y");
    $mañana = date("d-m-y",strtotime("+1 day"));
    $ayer = date("d-m-y",strtotime("-1 day"));
    echo "$hoy</br>";
    echo "$mañana</br>";
    echo "$ayer</br>";
    echo "</br>";
    $hoy= "31 de Diciembre de 1942";

    $dia = substr($hoy, 0 , strpos($hoy, ' de'));
    echo "$dia";
    echo "</br>";
    $mes= substr($hoy, strpos($hoy, ' de ')+3 , strrpos($hoy, ' de ')-strpos($hoy, ' de ')-3);
    echo "$mes";
    echo "</br>";
    $anio= substr($hoy , -4 , 4);
    echo "$anio";
    echo "</br>";
    echo date("l"),", ",date("d")," de ",date("F"), " de ", date("Y") , "</br>";
    echo substr("Pedro", 0, 3);
    ?>

    <p>Este es un ejemplo de cómo embeber código PHP en una página HTML.</p>
</body>
</html>